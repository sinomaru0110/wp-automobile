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

// ハンバーガーメニュー（ドロワー）の開閉
(() => {
  if (window.__themeDrawerReady) return;
  window.__themeDrawerReady = true;

  const drawer = document.querySelector(".js-drawer");
  const openButton = document.querySelector(".js-drawerOpen");
  const closeButton = document.querySelector(".js-drawerClose");
  if (!drawer || !openButton) return;

  const setOpen = (isOpen) => {
    drawer.classList.toggle("is-open", isOpen);
    openButton.setAttribute("aria-expanded", String(isOpen));
    document.body.style.overflow = isOpen ? "hidden" : "";
  };

  openButton.addEventListener("click", () => setOpen(true));
  if (closeButton) closeButton.addEventListener("click", () => setOpen(false));

  // メニュー内のリンク（ページ内リンク含む）を押したら閉じる
  drawer.querySelectorAll("a").forEach((link) => {
    link.addEventListener("click", () => setOpen(false));
  });

  document.addEventListener("keydown", (event) => {
    if (event.key === "Escape") setOpen(false);
  });
})();

// スライダー（Swiper）
(() => {
  if (window.__themeSliderReady || typeof Swiper === "undefined") return;
  window.__themeSliderReady = true;

  const reduceMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  // トップページ：ファーストビュー（フェードで自動切り替え）
  const fvSlider = document.querySelector(".js-fvSlider");
  if (fvSlider) {
    new Swiper(fvSlider, {
      loop: true,
      effect: "fade",
      fadeEffect: { crossFade: true },
      speed: 2000,
      allowTouchMove: false,
      autoplay: reduceMotion
        ? false
        : { delay: 4000, disableOnInteraction: false },
    });
  }

  // Aboutページ：会社概要の写真（横に流れ続ける）
  const companySlider = document.querySelector(".js-companySlider");
  if (companySlider) {
    new Swiper(companySlider, {
      loop: true,
      slidesPerView: "auto",
      speed: 8000,
      allowTouchMove: false,
      autoplay: reduceMotion
        ? false
        : { delay: 0, disableOnInteraction: false },
    });
  }
})();
