/*
 * Drivelab.ge lightweight i18n bridge.
 *
 * The Laravel app (autoschool) sets a plain, non-HttpOnly cookie called
 * "site_locale" whenever the visitor picks a language from the homepage
 * switcher (or from the switcher this file injects on every quiz page).
 * Georgian ("ka") is always the default/fallback.
 */
window.DrivelabI18n = (function () {
    var LOCALES = ['ka', 'en', 'ru', 'tr', 'az'];
    var LOCALE_NAMES = {
        ka: 'ქართული',
        en: 'English',
        ru: 'Русский',
        tr: 'Türkçe',
        az: 'Azərbaycan',
    };

    var DICT = {
        ka: {
            tagline_exam: 'წარმატებებს გისურვებთ გამოცდაზე',
            tagline_test: 'სატესტო რეჟიმი — გააგრძელეთ ბოლომდე',
            correct_label: 'სწორი',
            wrong_label: 'არასწორი',
            next_question: 'შემდეგი კითხვა',
            new_exam: 'ახალი გამოცდა',
            new_test: 'ახალი ტესტი',
            retry: 'თავიდან ცდა',
            close: 'დახურვა',
            why_wrong: 'რატომ არის არასწორი?',
            continue_label: 'გაგრძელება',
            exam_pass_title: 'გილოცავთ, გამოცდა ჩაბარებულია!',
            exam_fail_title: 'გამოცდა ვერ ჩააბარეთ',
            test_pass_title: 'ჩააბარეთ',
            test_fail_title: 'ვერ ჩააბარეთ',
            pass_requirement: 'ჩასაბარებლად საჭიროა %d.',
            loading: 'იტვირთება…',
            back_to_categories: 'კატეგორიების სიაში დაბრუნება',
            explain_fallback: 'ეს პასუხი არასწორია. სცადეთ დაიმახსოვროთ სწორი წესი შემდეგი კითხვისთვის.',

            home_label: 'მთავარი გვერდი',
            practice_mode: 'სავარჯიშო რეჟიმი',
            category_list_short: 'კატეგორიების სია',
            category_not_found: 'კატეგორია ვერ მოიძებნა.',
            no_category_questions_title: 'ამ კატეგორიისთვის კითხვები ვერ მოიძებნა',
            no_category_questions_text: 'ამჟამინდელ მონაცემთა ბაზაში (%d კითხვა, B/B1 ბილეთების ბაზაზე დაფუძნებული) ამ კატეგორიისთვის სპეციფიკური ან ზოგადი კითხვები ვერ დაფიქსირდა.',
            load_error_title: 'კითხვების ჩატვირთვა ვერ მოხერხდა',
            load_error_text: 'სცადეთ გვერდის განახლება.',
            specific_count_label: '%d სპეციფიკური კითხვა ბაზაში',
            generic_filler_label: ' + %d ზოგადი საგზაო წესი (სავარჯიშოს შესავსებად)',
            categories_hub_title: 'მართვის მოწმობის კატეგორიები',
            categories_hub_intro: 'აირჩიეთ თქვენი კატეგორია და ივარჯიშეთ მხოლოდ მისთვის შერჩეულ კითხვებზე. თითოეული გვერდი იყენებს იმავე კითხვებსა და სურათებს, რაც ძირითად ტესტშია — მხოლოდ გაფილტრულია კატეგორიის მიხედვით.',
            main_exam_link: 'ძირითადი გამოცდის რეჟიმი',
            main_test_link: 'სატესტო რეჟიმი',
            hub_specific_count: '%d სპეციფიკური კითხვა',
            hub_generic_suffix: ' (+%d ზოგადი)',
            hub_load_error: 'კატეგორიების ჩატვირთვა ვერ მოხერხდა.',
        },
        en: {
            tagline_exam: 'We wish you success on the exam',
            tagline_test: 'Test mode — go all the way through',
            correct_label: 'Correct',
            wrong_label: 'Wrong',
            next_question: 'Next question',
            new_exam: 'New exam',
            new_test: 'New test',
            retry: 'Try again',
            close: 'Close',
            why_wrong: 'Why is this wrong?',
            continue_label: 'Continue',
            exam_pass_title: 'Congratulations, you passed the exam!',
            exam_fail_title: 'You did not pass the exam',
            test_pass_title: 'Passed',
            test_fail_title: 'Not passed',
            pass_requirement: 'You need %d to pass.',
            loading: 'Loading…',
            back_to_categories: 'Back to the category list',
            explain_fallback: 'This answer is incorrect. Try to remember the correct rule for the next question.',

            home_label: 'Home',
            practice_mode: 'Practice mode',
            category_list_short: 'Category list',
            category_not_found: 'Category not found.',
            no_category_questions_title: 'No questions found for this category',
            no_category_questions_text: 'In the current database (%d questions, based on the B/B1 ticket set) no specific or general questions were found for this category.',
            load_error_title: 'Failed to load questions',
            load_error_text: 'Try refreshing the page.',
            specific_count_label: '%d specific question(s) in the bank',
            generic_filler_label: ' + %d general traffic rule question(s) (to fill out the practice set)',
            categories_hub_title: 'Driving license categories',
            categories_hub_intro: 'Choose your category and practice only the questions selected for it. Each page uses the same questions and images as the main test — just filtered by category.',
            main_exam_link: 'Main exam mode',
            main_test_link: 'Test mode',
            hub_specific_count: '%d specific question(s)',
            hub_generic_suffix: ' (+%d general)',
            hub_load_error: 'Failed to load categories.',
        },
        ru: {
            tagline_exam: 'Желаем удачи на экзамене',
            tagline_test: 'Тестовый режим — пройдите до конца',
            correct_label: 'Правильно',
            wrong_label: 'Неправильно',
            next_question: 'Следующий вопрос',
            new_exam: 'Новый экзамен',
            new_test: 'Новый тест',
            retry: 'Попробовать снова',
            close: 'Закрыть',
            why_wrong: 'Почему это неверно?',
            continue_label: 'Продолжить',
            exam_pass_title: 'Поздравляем, экзамен сдан!',
            exam_fail_title: 'Экзамен не сдан',
            test_pass_title: 'Сдано',
            test_fail_title: 'Не сдано',
            pass_requirement: 'Для сдачи необходимо %d.',
            loading: 'Загрузка…',
            back_to_categories: 'Вернуться к списку категорий',
            explain_fallback: 'Этот ответ неверен. Постарайтесь запомнить правильное правило для следующего вопроса.',

            home_label: 'Главная',
            practice_mode: 'Тренировочный режим',
            category_list_short: 'Список категорий',
            category_not_found: 'Категория не найдена.',
            no_category_questions_title: 'Вопросы для этой категории не найдены',
            no_category_questions_text: 'В текущей базе данных (%d вопросов, на основе билетов B/B1) не найдено ни специфических, ни общих вопросов для этой категории.',
            load_error_title: 'Не удалось загрузить вопросы',
            load_error_text: 'Попробуйте обновить страницу.',
            specific_count_label: '%d специфических вопросов в базе',
            generic_filler_label: ' + %d общих вопросов по ПДД (для дополнения набора)',
            categories_hub_title: 'Категории водительских прав',
            categories_hub_intro: 'Выберите свою категорию и тренируйтесь только на вопросах, отобранных для неё. Каждая страница использует те же вопросы и изображения, что и основной тест, — только отфильтрованные по категории.',
            main_exam_link: 'Основной режим экзамена',
            main_test_link: 'Тестовый режим',
            hub_specific_count: '%d специфических вопроса(ов)',
            hub_generic_suffix: ' (+%d общих)',
            hub_load_error: 'Не удалось загрузить категории.',
        },
        tr: {
            tagline_exam: 'Sınavda başarılar dileriz',
            tagline_test: 'Test modu — sona kadar devam edin',
            correct_label: 'Doğru',
            wrong_label: 'Yanlış',
            next_question: 'Sonraki soru',
            new_exam: 'Yeni sınav',
            new_test: 'Yeni test',
            retry: 'Tekrar dene',
            close: 'Kapat',
            why_wrong: 'Bu neden yanlış?',
            continue_label: 'Devam et',
            exam_pass_title: 'Tebrikler, sınavı geçtiniz!',
            exam_fail_title: 'Sınavı geçemediniz',
            test_pass_title: 'Geçti',
            test_fail_title: 'Geçemedi',
            pass_requirement: 'Geçmek için %d gerekiyor.',
            loading: 'Yükleniyor…',
            back_to_categories: 'Kategori listesine dön',
            explain_fallback: 'Bu cevap yanlış. Bir sonraki soru için doğru kuralı hatırlamaya çalışın.',

            home_label: 'Ana Sayfa',
            practice_mode: 'Alıştırma modu',
            category_list_short: 'Kategori listesi',
            category_not_found: 'Kategori bulunamadı.',
            no_category_questions_title: 'Bu kategori için soru bulunamadı',
            no_category_questions_text: 'Mevcut veritabanında (%d soru, B/B1 bilet setine dayalı) bu kategori için özel veya genel soru bulunamadı.',
            load_error_title: 'Sorular yüklenemedi',
            load_error_text: 'Sayfayı yenilemeyi deneyin.',
            specific_count_label: 'Bankada %d özel soru',
            generic_filler_label: ' + %d genel trafik kuralı sorusu (alıştırma setini tamamlamak için)',
            categories_hub_title: 'Sürücü belgesi kategorileri',
            categories_hub_intro: 'Kategorinizi seçin ve yalnızca onun için seçilmiş sorularla alıştırma yapın. Her sayfa, ana testle aynı soru ve görselleri kullanır — sadece kategoriye göre filtrelenmiştir.',
            main_exam_link: 'Ana sınav modu',
            main_test_link: 'Test modu',
            hub_specific_count: '%d özel soru',
            hub_generic_suffix: ' (+%d genel)',
            hub_load_error: 'Kategoriler yüklenemedi.',
        },
        az: {
            tagline_exam: 'İmtahanda uğurlar arzulayırıq',
            tagline_test: 'Test rejimi — sona qədər davam edin',
            correct_label: 'Düzgün',
            wrong_label: 'Yanlış',
            next_question: 'Növbəti sual',
            new_exam: 'Yeni imtahan',
            new_test: 'Yeni test',
            retry: 'Yenidən cəhd et',
            close: 'Bağla',
            why_wrong: 'Bu niyə yanlışdır?',
            continue_label: 'Davam et',
            exam_pass_title: 'Təbriklər, imtahanı keçdiniz!',
            exam_fail_title: 'İmtahanı keçmədiniz',
            test_pass_title: 'Keçdi',
            test_fail_title: 'Keçmədi',
            pass_requirement: 'Keçmək üçün %d lazımdır.',
            loading: 'Yüklənir…',
            back_to_categories: 'Kateqoriya siyahısına qayıt',
            explain_fallback: 'Bu cavab yanlışdır. Növbəti sual üçün düzgün qaydanı yadda saxlamağa çalışın.',

            home_label: 'Ana səhifə',
            practice_mode: 'Məşq rejimi',
            category_list_short: 'Kateqoriya siyahısı',
            category_not_found: 'Kateqoriya tapılmadı.',
            no_category_questions_title: 'Bu kateqoriya üçün sual tapılmadı',
            no_category_questions_text: 'Cari məlumat bazasında (%d sual, B/B1 bilet dəstinə əsaslanır) bu kateqoriya üçün nə spesifik, nə də ümumi sual tapılmadı.',
            load_error_title: 'Suallar yüklənə bilmədi',
            load_error_text: 'Səhifəni yeniləməyə cəhd edin.',
            specific_count_label: 'Bazada %d spesifik sual',
            generic_filler_label: ' + %d ümumi yol hərəkəti qaydası sualı (məşq dəstini tamamlamaq üçün)',
            categories_hub_title: 'Sürücülük vəsiqəsi kateqoriyaları',
            categories_hub_intro: 'Kateqoriyanızı seçin və yalnız onun üçün seçilmiş suallar üzərində məşq edin. Hər səhifə əsas testlə eyni sual və şəkillərdən istifadə edir — sadəcə kateqoriyaya görə süzülüb.',
            main_exam_link: 'Əsas imtahan rejimi',
            main_test_link: 'Test rejimi',
            hub_specific_count: '%d spesifik sual',
            hub_generic_suffix: ' (+%d ümumi)',
            hub_load_error: 'Kateqoriyalar yüklənə bilmədi.',
        },
    };

    var STORAGE_KEY = 'site_locale';

    function readCookie(name) {
        var match = document.cookie.match(new RegExp('(?:^|; )' + name + '=([^;]*)'));
        return match ? decodeURIComponent(match[1]) : null;
    }

    function writeCookie(name, value) {
        document.cookie = name + '=' + encodeURIComponent(value) +
            ';path=/;max-age=' + (60 * 60 * 24 * 365) + ';SameSite=Lax';
    }

    function readStoredLocale() {
        try {
            var ls = window.localStorage && window.localStorage.getItem(STORAGE_KEY);
            if (ls && DICT[ls]) return ls;
        } catch (e) { /* localStorage unavailable (privacy mode, etc.) */ }
        return readCookie(STORAGE_KEY);
    }

    function persistLocale(code) {
        try {
            window.localStorage && window.localStorage.setItem(STORAGE_KEY, code);
        } catch (e) { /* localStorage unavailable (privacy mode, etc.) */ }
        writeCookie(STORAGE_KEY, code);
    }

    var locale = readStoredLocale();
    if (!locale || !DICT[locale]) {
        locale = 'ka';
    }

    function t(key) {
        return (DICT[locale] && DICT[locale][key]) || DICT.ka[key] || key;
    }

    function applyStatic(root) {
        root = root || document;
        root.querySelectorAll('[data-i18n]').forEach(function (el) {
            el.textContent = t(el.getAttribute('data-i18n'));
        });
        root.querySelectorAll('[data-i18n-attr]').forEach(function (el) {
            var spec = el.getAttribute('data-i18n-attr').split(':');
            el.setAttribute(spec[0], t(spec[1]));
        });
    }

    function updateChromeActive() {
        var bar = document.getElementById('dlChrome');
        if (!bar) return;
        bar.querySelectorAll('.dlLangs a').forEach(function (a) {
            var isActive = a.lang === locale;
            a.classList.toggle('active', isActive);
            if (isActive) a.setAttribute('aria-current', 'true');
            else a.removeAttribute('aria-current');
        });
    }

    /**
     * Switches the active locale without a full page navigation. Persists
     * the choice, refreshes the static [data-i18n] labels and switcher
     * highlight immediately, then fires a cancelable
     * "drivelab:localechange" event: pages that listen for it (index.html,
     * test.html, category-engine.js) re-translate their in-memory question
     * set from the Georgian source and re-render the current question in
     * place — no reshuffle, no lost progress/timer. If nothing on the page
     * handles the event (or it hasn't finished its first load yet), this
     * falls back to a same-URL page reload, which still picks up the new
     * locale correctly, just resetting exam progress.
     */
    function setLocale(code) {
        if (!DICT[code] || code === locale) return;
        locale = code;
        persistLocale(code);
        applyStatic();
        updateChromeActive();

        var evt;
        try {
            evt = new CustomEvent('drivelab:localechange', {detail: {locale: code}, cancelable: true});
        } catch (e) {
            evt = document.createEvent('CustomEvent');
            evt.initCustomEvent('drivelab:localechange', false, true, {locale: code});
        }
        var handledInPlace = !document.dispatchEvent(evt);
        if (!handledInPlace) {
            window.location.reload();
        }
        api.locale = locale;
    }

    /**
     * Overlays translated question/answer/explanation/topic text (when
     * available) onto the Georgian question bank loaded from
     * data/questions.json. Any question without a translation for the
     * current locale is left in Georgian — nothing ever breaks or goes
     * blank.
     *
     * The original Georgian `question` and `topic_name` are preserved on
     * the returned copy (as `_origQuestion` / `_origTopicName`) so that
     * classification logic which keys off Georgian keywords (e.g.
     * isSignTopic() in index.html/test.html/category-engine.js) keeps
     * working correctly regardless of the display locale.
     */
    function translateQuestions(questions, topicsDict, questionsDict) {
        if (locale === 'ka') return questions;

        var topics = (topicsDict && topicsDict[locale]) || {};
        var overlay = (questionsDict && questionsDict[locale]) || {};

        return questions.map(function (q) {
            var copy = Object.assign({}, q);
            copy._origQuestion = q.question;
            copy._origTopicName = q.topic_name;

            if (q.topic_id != null && topics[q.topic_id]) {
                copy.topic_name = topics[q.topic_id];
            }

            var tr = overlay[q.id];
            if (tr) {
                copy.question = tr.question || copy.question;
                copy.explanation = tr.explanation || copy.explanation;
                copy.explanation_simple = tr.explanation_simple || copy.explanation_simple;
                if (Array.isArray(tr.answers) && Array.isArray(copy.answers)) {
                    copy.answers = copy.answers.map(function (a, i) {
                        return tr.answers[i]
                            ? Object.assign({}, a, {text: tr.answers[i]})
                            : a;
                    });
                }
            }

            return copy;
        });
    }

    /**
     * Overlays translated title/description (when available) onto a
     * Georgian category object from data/categories.json. Never mutates
     * the input; always returns a new object. Falls back to the Georgian
     * title/description when no translation exists for the current locale
     * or category.
     */
    function translateCategory(category, categoriesDict) {
        if (!category) return category;
        var copy = Object.assign({}, category);
        if (locale === 'ka') return copy;
        var overlay = (categoriesDict && categoriesDict[locale] && categoriesDict[locale][category.id]) || null;
        if (overlay) {
            copy.title = overlay.title || copy.title;
            copy.description = overlay.description || copy.description;
        }
        return copy;
    }

    function loadTranslationData() {
        if (locale === 'ka') {
            return Promise.resolve({topics: null, questions: null, categories: null});
        }
        var v = Date.now();
        return Promise.all([
            fetch('data/topics_i18n.json?v=' + v).then(function (r) { return r.json(); }).catch(function () { return null; }),
            fetch('data/questions_i18n.json?v=' + v).then(function (r) { return r.json(); }).catch(function () { return null; }),
            fetch('data/categories_i18n.json?v=' + v).then(function (r) { return r.json(); }).catch(function () { return null; }),
        ]).then(function (results) {
            return {topics: results[0], questions: results[1], categories: results[2]};
        });
    }

    /**
     * Injects a small, identical-on-every-page top bar with a "back to
     * home" link (to the main Laravel site root) and a language switcher.
     * The switcher used to link to /lang/{code}, a Laravel route that only
     * exists in this app's own routes/web.php — but that path is never
     * actually routed here in production (the web server proxies
     * non-static requests to the main site's app instead), so every click
     * ended in a 404. The switcher now sets the shared "site_locale"
     * cookie (1 year, path "/") directly with JS and reloads the current
     * page in place, so the choice takes effect immediately and persists
     * across refreshes without any server round trip.
     */
    function injectChrome() {
        if (document.getElementById('dlChrome')) return;

        var style = document.createElement('style');
        style.textContent =
            '#dlChrome{display:flex;align-items:center;justify-content:space-between;gap:10px;' +
            'padding:7px 16px;font-family:"Noto Sans Georgian",Arial,sans-serif;font-size:13px;' +
            'background:linear-gradient(135deg,#33297a,#4a3aa3);color:#fff;position:relative;z-index:10000}' +
            '#dlChrome a{color:#fff;text-decoration:none}' +
            '#dlChrome .dlHome{font-weight:700;display:inline-flex;align-items:center;gap:5px;opacity:.92}' +
            '#dlChrome .dlHome:hover{opacity:1;text-decoration:underline}' +
            '#dlChrome .dlLangs{display:flex;gap:4px;flex-wrap:wrap;justify-content:flex-end;' +
            'background:#fff;padding:4px;border-radius:999px;box-shadow:0 2px 10px rgba(20,10,60,.18)}' +
            '#dlChrome .dlLangs a{position:relative;padding:6px 13px;border-radius:999px;' +
            'background:#fff;color:#4a3aa3;font-weight:600;letter-spacing:.02em;' +
            'border:1.5px solid transparent;transition:background .15s ease,border-color .15s ease,color .15s ease}' +
            '#dlChrome .dlLangs a:hover{background:#f1edfb;text-decoration:none}' +
            '#dlChrome .dlLangs a.active{background:#fff;color:#33297a;border-color:#8b6fe6;opacity:1}' +
            '#dlChrome .dlLangs a.active::after{content:"";position:absolute;left:50%;bottom:4px;' +
            'transform:translateX(-50%);width:14px;height:2px;border-radius:2px;background:#8b6fe6}' +
            '@media(max-width:480px){#dlChrome{font-size:12px;padding:6px 10px}' +
            '#dlChrome .dlLangs a{padding:4px 9px}}';
        document.head.appendChild(style);

        var bar = document.createElement('div');
        bar.id = 'dlChrome';

        var home = document.createElement('a');
        home.className = 'dlHome';
        home.href = '/';
        home.innerHTML = '<span aria-hidden="true">←</span> <span data-i18n="home_label">' + t('home_label') + '</span>';
        bar.appendChild(home);

        var langs = document.createElement('div');
        langs.className = 'dlLangs';
        LOCALES.forEach(function (code) {
            var a = document.createElement('a');
            a.href = '#';
            a.textContent = code.toUpperCase();
            a.title = LOCALE_NAMES[code];
            a.lang = code;
            if (code === locale) {
                a.classList.add('active');
                a.setAttribute('aria-current', 'true');
            }
            a.addEventListener('click', function (e) {
                e.preventDefault();
                setLocale(code);
            });
            langs.appendChild(a);
        });
        bar.appendChild(langs);

        document.body.insertBefore(bar, document.body.firstChild);
    }

    var api = {
        locale: locale,
        t: t,
        applyStatic: applyStatic,
        translateQuestions: translateQuestions,
        translateCategory: translateCategory,
        loadTranslationData: loadTranslationData,
        injectChrome: injectChrome,
        setLocale: setLocale,
    };
    return api;
})();

document.addEventListener('DOMContentLoaded', function () {
    window.DrivelabI18n.applyStatic();
    window.DrivelabI18n.injectChrome();
});
