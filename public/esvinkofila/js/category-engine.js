/* category-engine.js
   Shared quiz engine for category inner pages (category-*.html).
   Adapted from the existing exam engine in index.html/test.html — same
   rendering rules for image/sign/no-image questions, same wrong-answer
   explanation modal — but reads a category-filtered question pool instead
   of the full bank, and behaves like "test mode" (continue past wrong
   answers, pass/fail decided at the end) since these are practice pages.

   Requires, in this order, before this script on the page:
     <script>window.CATEGORY_ID = 'AM';</script>
     <script src="js/i18n.js"></script>
     <script src="js/category-filter.js"></script>
   and these elements to exist in the DOM (see category-am.html etc.):
     #catTitle #catDesc #catSubtitle #catCount #catHero #mainCard #emptyState
     #media #mainMedia #qOverlay #zone #questionSlot #answers #content
     #progress #timer #rightCount #wrongCount
     #resultModal #resultTitle #resultText
     #explainModal #explainText #explainClose #explainContinue
*/
let questions = [], examQuestions = [], current = 0, locked = false, right = 0, wrong = 0, answered = 0, timeLeft = 1800, finished = false;
let TOTAL = 20, PASS_MAX_WRONG = 5;
let RAW_POOL = [], RAW_CATEGORY = null, RAW_RESULT = null;
const $ = id => document.getElementById(id);
const media = $('media'), img = $('mainMedia'), qOverlay = $('qOverlay'), zone = $('zone'), qSlot = $('questionSlot'), answers = $('answers'), content = $('content'), progress = $('progress'), timer = $('timer'), rightEl = $('rightCount'), wrongEl = $('wrongCount');

function asset(p) { return p ? p.replace(/^\/+/, '') : ''; }
function shuffle(a) { a = [...a]; for (let i = a.length - 1; i > 0; i--) { let j = Math.floor(Math.random() * (i + 1));[a[i], a[j]] = [a[j], a[i]]; } return a; }
function isSignTopic(q) {
  const id = Number(q.topic_id);
  const txt = ((q._origTopicName || q.topic_name || '') + ' ' + (q._origQuestion || q.question || '')).toLowerCase();
  return (id >= 3 && id <= 9)
    || txt.includes('საგზაო ნიშ')
    || txt.includes('ნიშანი')
    || txt.includes('ნიშნის')
    || txt.includes('მოცემული საგზაო');
}
function cutoffClass(q) {
  const len = (q.question || '').length;
  const ansCount = (q.answers || []).filter(a => a.text).length;
  if (len > 120 || ansCount >= 4) return 'cutoff-3';
  if (len > 75 || ansCount >= 3) return 'cutoff-2';
  return 'cutoff-1';
}
function answerLenClass(q) {
  const maxLen = Math.max(0, ...(q.answers || []).map(a => (a.text || '').length));
  if (maxLen > 90) return 'ansLen-3';
  if (maxLen > 40) return 'ansLen-2';
  return 'ansLen-1';
}
function signQLenClass(q) {
  const len = (q.question || '').length;
  if (len > 200) return 'qLen-3';
  if (len > 110) return 'qLen-2';
  return 'qLen-1';
}
let WIDE_ZONE_IMAGES = new Set();

Promise.all([
  fetch('data/questions.json?v=' + Date.now()).then(r => r.json()),
  fetch('data/categories.json?v=' + Date.now()).then(r => r.json()),
  fetch('data/image_zones.json?v=' + Date.now()).then(r => r.json()).catch(() => ({ wide: [] })),
  window.DrivelabI18n.loadTranslationData()
]).then(([allQuestions, categoriesData, zones, i18nData]) => {
  questions = allQuestions;
  WIDE_ZONE_IMAGES = new Set((zones && zones.wide) || []);

  const catId = window.CATEGORY_ID;
  // Filtering runs on the raw Georgian data (category-filter.js keyword
  // matching is Georgian-only), *before* any translation is applied.
  const result = CategoryFilter.getCategoryQuestions(allQuestions, catId, categoriesData);
  const category = result.category;
  RAW_CATEGORY = category;
  RAW_RESULT = result;

  if (!category) {
    showEmpty(window.DrivelabI18n.t('category_not_found'), '');
    return;
  }

  renderCategoryLabels(category, result, i18nData);

  const poolCount = result.pool.length;
  if (poolCount === 0) {
    showEmpty(
      window.DrivelabI18n.t('no_category_questions_title'),
      window.DrivelabI18n.t('no_category_questions_text').replace('%d', questions.length)
    );
    return;
  }

  RAW_POOL = result.pool;
  TOTAL = Math.min(30, poolCount);
  PASS_MAX_WRONG = Math.max(1, Math.round(TOTAL * 5 / 30));
  const translatedPool = window.DrivelabI18n.translateQuestions(result.pool, i18nData.topics, i18nData.questions);
  examQuestions = shuffle(translatedPool).slice(0, TOTAL);

  render();
  preloadExam();
  startTimer();
}).catch(err => {
  console.error(err);
  showEmpty(window.DrivelabI18n.t('load_error_title'), window.DrivelabI18n.t('load_error_text'));
});

function renderCategoryLabels(category, result, i18nData) {
  const displayCategory = window.DrivelabI18n.translateCategory(category, i18nData.categories);
  $('catTitle').textContent = displayCategory.title;
  $('catDesc').textContent = displayCategory.description;
  const subtitleEl = $('catSubtitle');
  if (subtitleEl) subtitleEl.textContent = displayCategory.title + ' — ' + window.DrivelabI18n.t('practice_mode');
  document.title = displayCategory.title + ' — Drivelab.ge';

  const specificCount = result.specific.length;
  const poolCount = result.pool.length;
  let countLabel = window.DrivelabI18n.t('specific_count_label').replace('%d', specificCount);
  if (poolCount > specificCount) {
    countLabel += window.DrivelabI18n.t('generic_filler_label').replace('%d', poolCount - specificCount);
  }
  $('catCount').textContent = countLabel;
  if (specificCount === 0) {
    $('catCount').parentElement.querySelector('span').classList.add('warn');
  }
}

/* Re-translates the in-progress category practice session in place when
   the language switcher changes locale, instead of reloading the page
   (which would reshuffle the question set and reset progress/timer).
   Falls back to the switcher's own page reload if the page hasn't
   finished its first load yet (see i18n.js setLocale()). */
document.addEventListener('drivelab:localechange', function (e) {
  if (!RAW_CATEGORY) return;
  e.preventDefault();
  window.DrivelabI18n.loadTranslationData().then(function (i18nData) {
    renderCategoryLabels(RAW_CATEGORY, RAW_RESULT, i18nData);
    if (!RAW_POOL.length) return;
    const translatedPool = window.DrivelabI18n.translateQuestions(RAW_POOL, i18nData.topics, i18nData.questions);
    const byId = {};
    translatedPool.forEach(q => { byId[q.id] = q; });
    examQuestions = examQuestions.map(q => byId[q.id] || q);
    render();
  });
});

function showEmpty(title, text) {
  $('catHero').style.display = '';
  $('mainCard').style.display = 'none';
  const empty = $('emptyState');
  empty.style.display = '';
  empty.querySelector('h2').textContent = title;
  empty.querySelector('p').textContent = text;
}

function preloadExam() {
  examQuestions.forEach(q => {
    if (q.image) { const im = new Image(); im.decoding = 'async'; im.src = asset(q.image); }
  });
}

function render() {
  locked = false;
  const q = examQuestions[current]; if (!q) return;
  const hasImage = !!q.image;
  const signMode = hasImage && isSignTopic(q);

  media.className = 'media';
  media.dataset.ticket = q.ticket_number || q.id || (current + 1);
  media.classList.add(signMode ? 'signMode' : 'normalMode');
  media.classList.add(cutoffClass(q));
  if (hasImage) {
    media.classList.add(answerLenClass(q));
    if (signMode) media.classList.add(signQLenClass(q));
    if (WIDE_ZONE_IMAGES.has(q.image)) media.classList.add('wideZone');
  }

  if (hasImage) {
    media.style.display = 'block';
    img.src = asset(q.image);
    qOverlay.textContent = q.question;
    qSlot.innerHTML = '';
    qOverlay.style.display = 'none';
    if (qOverlay.parentElement !== zone) zone.appendChild(qOverlay);
    if (answers.parentElement !== zone) zone.appendChild(answers);
    qOverlay.style.display = 'flex';
  } else {
    media.style.display = 'none';
    img.removeAttribute('src');
    qSlot.innerHTML = '<div class="noImageQuestion">' + q.question + '</div>';
    const next = document.querySelector('.next');
    if (answers.parentElement !== content) content.insertBefore(answers, next);
  }

  answers.innerHTML = '';
  q.answers.forEach((a, i) => {
    let b = document.createElement('button');
    b.className = 'answer';
    b.innerHTML = `<span class="num">${i + 1}</span><span>${a.text}</span><span class="radio"></span>`;
    b.onclick = () => choose(b, a, q);
    answers.appendChild(b);
  });
  if (q.answers.length % 2 === 1) {
    answers.lastElementChild.classList.add('full');
  }
}

function choose(btn, a, q) {
  if (locked || finished) return;
  locked = true; answered++;
  document.querySelectorAll('.answer').forEach(b => b.disabled = true);
  if (a.is_correct) { btn.classList.add('correct'); right++; }
  else { btn.classList.add('wrong'); wrong++;[...answers.children].forEach((b, i) => { if (q.answers[i]?.is_correct) b.classList.add('correct'); }); }
  update();
  if (answered >= TOTAL) setTimeout(() => finish(), 700);
}

function nextQuestion() { if (finished) return; if (answered >= TOTAL) { finish(); return; } current = (current + 1) % examQuestions.length; render(); }
function update() { rightEl.textContent = right; wrongEl.textContent = wrong; progress.style.width = Math.min(100, answered / TOTAL * 100) + '%'; }
function startTimer() {
  setInterval(() => {
    if (finished) return;
    timeLeft--;
    let m = String(Math.floor(timeLeft / 60)).padStart(2, '0'), s = String(timeLeft % 60).padStart(2, '0');
    timer.textContent = m + ':' + s;
    if (timeLeft <= 0) finish();
  }, 1000);
}
function finish() {
  finished = true;
  const passed = wrong <= PASS_MAX_WRONG;
  $('resultTitle').textContent = passed ? window.DrivelabI18n.t('test_pass_title') : window.DrivelabI18n.t('test_fail_title');
  $('resultText').textContent = `${window.DrivelabI18n.t('correct_label')}: ${right}/${TOTAL}, ${window.DrivelabI18n.t('wrong_label')}: ${wrong}.`;
  $('resultModal').classList.add('show');
}

/* Wrong-answer explanation popup. Purely additive: listens for clicks that
   choose() above already resolved, and never touches quiz state. */
(function () {
  var explainModal = document.getElementById('explainModal');
  var explainText = document.getElementById('explainText');
  var explainClose = document.getElementById('explainClose');
  var explainContinue = document.getElementById('explainContinue');
  var answersEl = document.getElementById('answers');

  function openExplain(text) {
    explainText.textContent = text || window.DrivelabI18n.t('explain_fallback');
    explainModal.classList.add('show');
    document.addEventListener('keydown', onKeydown);
  }
  function closeExplain() {
    explainModal.classList.remove('show');
    document.removeEventListener('keydown', onKeydown);
  }
  function onKeydown(e) { if (e.key === 'Escape') closeExplain(); }

  explainClose.addEventListener('click', closeExplain);
  explainContinue.addEventListener('click', closeExplain);
  explainModal.addEventListener('click', function (e) { if (e.target === explainModal) closeExplain(); });

  answersEl.addEventListener('click', function (e) {
    var btn = e.target.closest('.answer');
    if (!btn || !answersEl.contains(btn)) return;
    if (btn.classList.contains('wrong')) {
      var q = (typeof examQuestions !== 'undefined') ? examQuestions[current] : null;
      openExplain(q && q.explanation_simple);
    }
  });
})();
