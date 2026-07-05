/* category-engine.js
   Shared quiz engine for category inner pages (category-*.html).
   Adapted from the existing exam engine in index.html/test.html — same
   rendering rules for image/sign/no-image questions, same wrong-answer
   explanation modal — but reads a category-filtered question pool instead
   of the full bank, and behaves like "test mode" (continue past wrong
   answers, pass/fail decided at the end) since these are practice pages.

   Requires, in this order, before this script on the page:
     <script>window.CATEGORY_ID = 'AM';</script>
     <script src="js/category-filter.js"></script>
   and these elements to exist in the DOM (see category-am.html etc.):
     #catTitle #catDesc #catCount #catHero #mainCard #emptyState
     #media #mainMedia #qOverlay #zone #questionSlot #answers #content
     #progress #timer #rightCount #wrongCount
     #resultModal #resultTitle #resultText
     #explainModal #explainText #explainClose #explainContinue
*/
let questions = [], examQuestions = [], current = 0, locked = false, right = 0, wrong = 0, answered = 0, timeLeft = 1800, finished = false;
let TOTAL = 20, PASS_MAX_WRONG = 5;
const $ = id => document.getElementById(id);
const media = $('media'), img = $('mainMedia'), qOverlay = $('qOverlay'), zone = $('zone'), qSlot = $('questionSlot'), answers = $('answers'), content = $('content'), progress = $('progress'), timer = $('timer'), rightEl = $('rightCount'), wrongEl = $('wrongCount');

function asset(p) { return p ? p.replace(/^\/+/, '') : ''; }
function shuffle(a) { a = [...a]; for (let i = a.length - 1; i > 0; i--) { let j = Math.floor(Math.random() * (i + 1));[a[i], a[j]] = [a[j], a[i]]; } return a; }
function isSignTopic(q) {
  const id = Number(q.topic_id);
  const txt = ((q.topic_name || '') + ' ' + (q.question || '')).toLowerCase();
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
  fetch('data/image_zones.json?v=' + Date.now()).then(r => r.json()).catch(() => ({ wide: [] }))
]).then(([allQuestions, categoriesData, zones]) => {
  questions = allQuestions;
  WIDE_ZONE_IMAGES = new Set((zones && zones.wide) || []);

  const catId = window.CATEGORY_ID;
  const result = CategoryFilter.getCategoryQuestions(allQuestions, catId, categoriesData);
  const category = result.category;

  if (!category) {
    showEmpty('კატეგორია ვერ მოიძებნა.', '');
    return;
  }

  $('catTitle').textContent = category.title;
  $('catDesc').textContent = category.description;

  const specificCount = result.specific.length;
  const poolCount = result.pool.length;
  let countLabel = specificCount + ' სპეციფიკური კითხვა ბაზაში';
  if (poolCount > specificCount) {
    countLabel += ' + ' + (poolCount - specificCount) + ' ზოგადი საგზაო წესი (სავარჯიშოს შესავსებად)';
  }
  $('catCount').textContent = countLabel;
  if (specificCount === 0) {
    $('catCount').parentElement.querySelector('span').classList.add('warn');
  }

  if (poolCount === 0) {
    showEmpty(
      'ამ კატეგორიისთვის კითხვები ვერ მოიძებნა',
      'ამჟამინდელ მონაცემთა ბაზაში (' + questions.length + ' კითხვა, B/B1 ბილეთების ბაზაზე დაფუძნებული) ამ კატეგორიისთვის სპეციფიკური ან ზოგადი კითხვები ვერ დაფიქსირდა.'
    );
    return;
  }

  TOTAL = Math.min(30, poolCount);
  PASS_MAX_WRONG = Math.max(1, Math.round(TOTAL * 5 / 30));
  examQuestions = shuffle(result.pool).slice(0, TOTAL);

  render();
  preloadExam();
  startTimer();
}).catch(err => {
  console.error(err);
  showEmpty('კითხვების ჩატვირთვა ვერ მოხერხდა', 'სცადეთ გვერდის განახლება.');
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
  $('resultTitle').textContent = passed ? 'ჩააბარეთ' : 'ვერ ჩააბარეთ';
  $('resultText').textContent = `სწორი: ${right}/${TOTAL}, არასწორი: ${wrong}.`;
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
  var FALLBACK = 'ეს პასუხი არასწორია. სცადეთ დაიმახსოვროთ სწორი წესი შემდეგი კითხვისთვის.';

  function openExplain(text) {
    explainText.textContent = text || FALLBACK;
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
