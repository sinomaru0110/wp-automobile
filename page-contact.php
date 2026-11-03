<?php get_header(); ?>
<main>
  <?php get_template_part('template-parts/fv'); ?>
  <?php get_template_part('template-parts/breadcrumb'); ?>

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
