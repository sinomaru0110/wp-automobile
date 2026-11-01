(() => {
  if (window.__themeMotionReady) return;
  window.__themeMotionReady = true;

  const selector = [
    ".js-fvPhoto",
    ".js-fvTitle",
    ".js-serviceTitle",
    ".js-workTitle",
    ".js-workItem",
    ".p-worksList__item",
    ".p-newsList__item",
  ].join(",");

  const targets = document.querySelectorAll(selector);
  document.documentElement.classList.add("is-jsReady");

  if (!targets.length) return;

  const show = (element) => {
    element.classList.add("is-show");
  };

  const reduceMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  if (reduceMotion || !("IntersectionObserver" in window)) {
    targets.forEach(show);
    return;
  }

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (!entry.isIntersecting) return;
        show(entry.target);
        observer.unobserve(entry.target);
      });
    },
    { threshold: 0.2 }
  );

  requestAnimationFrame(() => {
    requestAnimationFrame(() => {
      targets.forEach((element) => observer.observe(element));
    });
  });
})();
