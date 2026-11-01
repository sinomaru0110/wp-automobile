/**
 * お問い合わせフォーム（入力 → 確認ページ → 送信 → サンクス）
 */
(() => {
  const STORAGE_KEY = "contactFormValues";
  const FIELD_NAMES = ["companyName", "personName", "tel", "email", "type", "message"];

  const inputForm = document.querySelector(".js-contactForm");
  const inputView = document.querySelector(".js-contactInput");
  const confirmView = document.querySelector(".js-contactConfirm");

  const loadValues = () => {
    try {
      return JSON.parse(sessionStorage.getItem(STORAGE_KEY) || "");
    } catch (error) {
      return null;
    }
  };

  const saveValues = (values) => {
    sessionStorage.setItem(STORAGE_KEY, JSON.stringify(values));
  };

  const fieldValue = (field) => {
    if (!field) return "";
    if (field.type === "checkbox") return field.checked ? "1" : "";
    if (field.tagName === "SELECT") return field.options[field.selectedIndex]?.text ?? "";
    return field.value;
  };

  /* ---------- 入力ページ ---------- */
  if (inputForm && inputView) {
    const toConfirmBtn = inputForm.querySelector(".js-contactToConfirm");
    const ERROR_CLASS = "js-confirmError";
    const getField = (name) => inputForm.querySelector(`[name="${name}"]`);

    const saved = loadValues();
    if (saved) {
      FIELD_NAMES.forEach((name) => {
        const field = getField(name);
        if (field && saved[name]) field.value = saved[name];
      });
      const privacy = getField("privacy");
      if (privacy) privacy.checked = true;
    }

    const clearErrors = () => {
      const root = inputForm.closest(".wpcf7") || inputForm;
      root.querySelectorAll(".wpcf7-not-valid-tip, .screen-reader-response li").forEach((el) => el.remove());
      inputForm.querySelectorAll(".wpcf7-not-valid").forEach((el) => {
        el.classList.remove("wpcf7-not-valid");
        el.setAttribute("aria-invalid", "false");
        if (typeof el.setCustomValidity === "function") el.setCustomValidity("");
      });
    };

    const showError = (field, message) => {
      const wrap = field.closest(".wpcf7-form-control-wrap") || field.parentNode;
      wrap.querySelectorAll(".wpcf7-not-valid-tip").forEach((el) => el.remove());
      const tip = document.createElement("span");
      tip.className = `wpcf7-not-valid-tip ${ERROR_CLASS}`;
      tip.setAttribute("aria-hidden", "true");
      tip.textContent = message;
      wrap.appendChild(tip);
      field.classList.add("wpcf7-not-valid");
      field.setAttribute("aria-invalid", "true");
    };

    const validate = () => {
      clearErrors();
      const errors = [];

      inputForm.querySelectorAll('[aria-required="true"]').forEach((field) => {
        const value = field.value.trim();
        if (!value) {
          errors.push(field);
          showError(field, field.tagName === "SELECT" ? "選択してください。" : "入力してください。");
          return;
        }
        if (field.type === "email" && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value)) {
          errors.push(field);
          showError(field, "メールアドレスの形式が正しくありません。");
        }
        if (field.type === "tel" && !/^[0-9０-９+\-－()（） ]+$/.test(value)) {
          errors.push(field);
          showError(field, "電話番号の形式が正しくありません。");
        }
      });

      const privacy = getField("privacy");
      if (privacy && !privacy.checked) {
        errors.push(privacy);
        showError(privacy, "個人情報の取り扱いへの同意が必要です。");
      }

      if (errors.length) {
        const target = errors[0].closest(".p-contactForm__row") || errors[0];
        target.scrollIntoView({ behavior: "smooth", block: "center" });
        if (errors[0].type !== "checkbox") errors[0].focus({ preventScroll: true });
      }
      return errors.length === 0;
    };

    inputForm.addEventListener("keydown", (event) => {
      if (event.key === "Enter" && event.target.tagName === "INPUT") event.preventDefault();
    });

    toConfirmBtn?.addEventListener("click", (event) => {
      event.preventDefault();
      if (!validate()) return;
      const values = {};
      FIELD_NAMES.forEach((name) => {
        values[name] = fieldValue(getField(name));
      });
      saveValues(values);
      const confirmUrl = inputView.dataset.confirmUrl;
      if (confirmUrl) window.location.href = confirmUrl;
    });
  }

  /* ---------- 確認ページ ---------- */
  if (confirmView && !inputView) {
    const values = loadValues();
    const contactUrl = confirmView.dataset.contactUrl;
    if (!values) {
      if (contactUrl) window.location.href = contactUrl;
      return;
    }

    confirmView.querySelectorAll(".js-confirmValue").forEach((dd) => {
      dd.textContent = values[dd.dataset.name] || "";
    });

    const backBtn = confirmView.querySelector(".js-confirmBack");
    const submitBtn = confirmView.querySelector(".js-confirmSubmit");
    const sendForm = document.querySelector(".js-contactSendForm");
    const thanksUrl = confirmView.dataset.thanksUrl;

    backBtn?.addEventListener("click", () => {
      if (contactUrl) window.location.href = contactUrl;
    });

    submitBtn?.addEventListener("click", () => {
      if (!sendForm) return;
      submitBtn.disabled = true;
      if (backBtn) backBtn.disabled = true;

      FIELD_NAMES.forEach((name) => {
        const field = sendForm.querySelector(`[name="${name}"]`);
        if (!field || values[name] == null) return;
        if (field.tagName === "SELECT") {
          const option = Array.from(field.options).find((item) => item.text === values[name] || item.value === values[name]);
          if (option) field.value = option.value;
        } else {
          field.value = values[name];
        }
      });
      const privacy = sendForm.querySelector('[name="privacy"]');
      if (privacy) privacy.checked = true;

      const cf7Submit = sendForm.querySelector(".wpcf7-submit");
      if (cf7Submit) {
        cf7Submit.disabled = false;
        cf7Submit.click();
      }
    });

    document.addEventListener("wpcf7mailsent", () => {
      sessionStorage.removeItem(STORAGE_KEY);
      if (thanksUrl) window.location.href = thanksUrl;
    });

    ["wpcf7invalid", "wpcf7spam", "wpcf7mailfailed"].forEach((type) => {
      document.addEventListener(type, () => {
        if (submitBtn) submitBtn.disabled = false;
        if (backBtn) backBtn.disabled = false;
      });
    });
  }
})();
