<?php get_header(); ?>
<main>
  <section class="p-thanks">
    <h1 class="p-thanks__titleEn">Thank you</h1>
    <p class="p-thanks__titleJa">お問い合わせありがとうございます</p>
    <p class="p-thanks__text">
      お問い合わせいただき誠にありがとうございます。<br />
      内容を確認のうえ、担当者より折り返し<br />
      ご連絡させていただきます。<br />
      今しばらくお待ちくださいませ。
    </p>
    <a href="<?php echo esc_url(home_url('/')); ?>" class="p-thanks__btn">
      <img
        src="<?php echo esc_url(get_theme_file_uri()); ?>/img/contact/thanks-btn-arrow-white.svg"
        width="5"
        height="9"
        alt=""
        class="p-thanks__btnIcon"
      />
      <span class="p-thanks__btnText">トップページへ戻る</span>
    </a>
  </section>
</main>
<?php get_footer(); ?>
