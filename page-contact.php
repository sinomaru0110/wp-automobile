<?php get_header(); ?>
<main>
  <section class="p-contactFv">
    <div class="p-contactFv__photo js-fvPhoto">
      <picture>
        <source
          media="(max-width: 768px)"
          srcset="<?php echo esc_url(get_theme_file_uri()); ?>/img/contact/fv-photo-sp.webp"
        />
        <img
          src="<?php echo esc_url(get_theme_file_uri()); ?>/img/contact/fv-photo.webp"
          width="1270"
          height="514"
          alt="輸入車ショールームの様子"
          class="p-contactFv__photoImg"
        />
      </picture>
    </div>
    <div class="p-contactFv__titleWrap js-fvTitle">
      <div class="p-contactFv__titleBg"></div>
      <h1 class="p-contactFv__title">
        <span class="p-contactFv__titleEn">Contact</span>
        <span class="p-contactFv__titleJa">お問い合わせ</span>
      </h1>
    </div>
  </section>
  <nav class="c-breadcrumb" aria-label="パンくずリスト" vocab="https://schema.org/" typeof="BreadcrumbList">
    <?php if (function_exists('bcn_display')) { ?>
      <div class="c-breadcrumb__list" vocab="http://schema.org/" typeof="BreadcrumbList">
        <?php bcn_display(); ?>
      </div>
    <?php } ?>
  </nav>

  <!-- 入力画面 -->
  <section class="p-contactForm">
    <p class="p-contactForm__lead">
      弊社へのお問い合わせは<br />
      下記フォームより受け付けております。<br />
      担当者が確認後、折り返しご連絡させていただきます。
    </p>
    <?php
      // Contact Form 7（管理画面のフォームタイトル「お問い合わせ」を呼び出し）
      // 「確認画面へ」で /contact/confirm/ へ遷移（Multi-Step Forms の First Step）
      echo do_shortcode('[contact-form-7 title="お問い合わせ" html_class="p-contactForm__form"]');
    ?>
  </section>


</main>
<?php get_footer(); ?>
