<?php get_header(); ?>
<main>
  <section class="p-thanks">
    <h2 class="p-thanks__titleEn">THANK YOU FOR CONTACTING US.</h2>
    <p class="p-thanks__titleJa">お問い合わせありがとうございます。</p>
    <p class="p-thanks__text">
      近日中に折り返しご連絡いたします。<br />
      今しばらくお待ちくださいますよう、よろしくお願い申し上げます。<br />
      万が一、ご回答メールが届かない場合は、送信トラブル等の可能性もありますので、大変お手数ではございますが、もう一度フォームよりお問い合わせいただくか、お電話にてお問い合わせをお願いいたします。<br />
      今後ともご愛顧賜りますようよろしくお願い申し上げます。
    </p>
    <a href="<?php echo esc_url(home_url('/')); ?>" class="p-thanks__btn">
      <img
        src="<?php echo esc_url(get_theme_file_uri('/img/contact/thanks-btn-arrow-white.svg')); ?>"
        width="5"
        height="9"
        alt="矢印アイコン"
        class="p-thanks__btnIcon"
      />
      <span class="p-thanks__btnText">TOPへ戻る</span>
    </a>
  </section>
</main>
<?php get_footer(); ?>
