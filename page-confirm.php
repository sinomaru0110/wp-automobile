<?php get_header(); ?>
<main>
  <!-- 確認画面：管理画面「お問い合わせ」→ フォーム「問い合わせ確認」の内容を出力 -->
  <section class="p-contactConfirm">
    <?php echo do_shortcode('[contact-form-7 title="問い合わせ確認" html_class="p-contactConfirm__form"]'); ?>
  </section>
</main>
<?php get_footer(); ?>
