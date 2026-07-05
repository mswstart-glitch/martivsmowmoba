/* category-filter.js
   Read-only filtering logic for category inner pages.
   Never modifies data/questions.json or data/categories.json — only reads
   them and derives in-memory subsets.

   Detection method: each category (except the base B_B1, which is the
   original full bank) has a list of Georgian keywords. A question is
   "specific" to a category if any keyword appears in its question text,
   answer texts, or explanation. If a category has too few specific matches
   to make a useful practice set, its pool is padded with "generic"
   questions — questions that don't match ANY category's keywords, i.e.
   universal traffic-rule questions relevant to every license category.
*/
(function (global) {
  function questionText(q) {
    var parts = [q.question || '', q.explanation || '', q.explanation_simple || ''];
    (q.answers || []).forEach(function (a) { parts.push(a.text || ''); });
    return parts.join(' ');
  }

  function matchesCategory(q, category) {
    if (!category || !category.keywords || !category.keywords.length) return false;
    var t = questionText(q);
    return category.keywords.some(function (kw) { return t.indexOf(kw) !== -1; });
  }

  function isGeneric(q, allCategories) {
    return !allCategories.some(function (c) { return matchesCategory(q, c); });
  }

  function shuffle(arr) {
    var a = arr.slice();
    for (var i = a.length - 1; i > 0; i--) {
      var j = Math.floor(Math.random() * (i + 1));
      var tmp = a[i]; a[i] = a[j]; a[j] = tmp;
    }
    return a;
  }

  /* Returns { specific, pool } where:
     - specific: questions detected as belonging to this category (real count)
     - pool: specific + generic filler, deduped, ready for a practice session
  */
  function getCategoryQuestions(allQuestions, categoryId, categoriesData) {
    var categories = categoriesData.categories;
    var category = categories.filter(function (c) { return c.id === categoryId; })[0];
    if (!category) return { category: null, specific: [], pool: [] };

    if (category.isBase) {
      var all = allQuestions.slice();
      return { category: category, specific: all, pool: all };
    }

    var specific = allQuestions.filter(function (q) { return matchesCategory(q, category); });
    var minPool = categoriesData.minPool || 20;

    if (specific.length >= minPool) {
      return { category: category, specific: specific, pool: specific };
    }

    var usedIds = {};
    specific.forEach(function (q) { usedIds[q.id] = true; });

    var generic = shuffle(allQuestions.filter(function (q) { return isGeneric(q, categories); }));
    var filler = [];
    for (var i = 0; i < generic.length && specific.length + filler.length < minPool; i++) {
      var q = generic[i];
      if (usedIds[q.id]) continue;
      filler.push(q);
      usedIds[q.id] = true;
    }

    return { category: category, specific: specific, pool: specific.concat(filler) };
  }

  global.CategoryFilter = {
    questionText: questionText,
    matchesCategory: matchesCategory,
    isGeneric: isGeneric,
    shuffle: shuffle,
    getCategoryQuestions: getCategoryQuestions
  };
})(window);
