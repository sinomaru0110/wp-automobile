<?php get_header(); ?>
<main>
  <section class="p-404">
    <picture class="p-404__photo">
      <source
        media="(max-width: 768px)"
        srcset="<?php echo esc_url(get_theme_file_uri('/img/404/404-photo-sp.webp')); ?>"
        width="730"
        height="486"
      />
      <img
        src="<?php echo esc_url(get_theme_file_uri('/img/404/404-photo.webp')); ?>"
        width="2540"
        height="1200"
        alt=""
        class="p-404__photoImg"
      />
    </picture>
    <h1 class="p-404__heading">404&nbsp;Not&nbsp;Found</h1>
    <p class="p-404__body">
      お探しのページはURLが誤っているか、削除された可能性があります。<br />
      3秒後にTOPページに遷移します
    </p>
    <a href="<?php echo esc_url(home_url('/')); ?>" class="p-404__btn">
      <span class="p-404__btnIcon">
        <picture>
          <source media="(max-width: 768px)" srcset="<?php echo esc_url(get_theme_file_uri('/img/404/404-arrow-sp.svg')); ?>" />
          <img src="<?php echo esc_url(get_theme_file_uri('/img/404/404-arrow.svg')); ?>" width="5" height="9" alt="" />
        </picture>
      </span>
      <span class="p-404__btnText">トップページへ戻る</span>
    </a>
  </section>
</main>
<?php get_footer(); ?>
