<?php
/**
 * 共通お問い合わせ欄（トップ・About・Service・実績一覧・お知らせ詳細で使用）
 */
?>
<section class="c-contact">
  <div class="c-contact__photo">
    <picture>
      <source
        media="(max-width: 768px)"
        srcset="<?php echo esc_url(get_theme_file_uri('/img/top/contact-sp-photo.webp')); ?>"
      />
      <img
        src="<?php echo esc_url(get_theme_file_uri('/img/top/contact-photo.webp')); ?>"
        width="820"
        height="446"
        alt="輸入車ショールームの様子"
      />
    </picture>
  </div>
  <div class="c-contact__body">
    <p class="c-contact__lead">
      輸入車の購入や修理のご相談などお気軽にお問い合わせください。
    </p>
    <div class="c-contact__btns">
      <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="c-contact__btn c-contact__btn--mail">
        <span class="c-contact__btnIcon c-contact__btnIcon--mail"></span>
        <span class="c-contact__btnText">お問い合わせ</span>
      </a>
      <a href="tel:0000000000" class="c-contact__btn c-contact__btn--tel">
        <span class="c-contact__btnIcon c-contact__btnIcon--tel"></span>
        <span class="c-contact__btnText">0000-000-000</span>
      </a>
    </div>
    <p class="c-contact__hours">受付時間 : 火曜日を除く 10：00〜18：00</p>
  </div>
</section>
