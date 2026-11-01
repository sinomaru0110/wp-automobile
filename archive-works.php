<?php get_header(); ?>
<main>
  <section class="p-worksFv">
    <div class="p-worksFv__photo js-fvPhoto">
      <picture>
        <source
          media="(max-width: 768px)"
          srcset="<?php echo esc_url(get_theme_file_uri('/img/works/fv-photo-sp.webp')); ?>"
        />
        <img
          src="<?php echo esc_url(get_theme_file_uri('/img/works/fv-photo.webp')); ?>"
          width="1270"
          height="514"
          alt="ショールーム内の黄色いスポーツカー"
          class="p-worksFv__photoImg"
        />
      </picture>
    </div>
    <div class="p-worksFv__titleWrap js-fvTitle">
      <div class="p-worksFv__titleBg"></div>
      <h1 class="p-worksFv__title">
        <span class="p-worksFv__titleEn">Works</span>
        <span class="p-worksFv__titleJa">実績紹介</span>
      </h1>
    </div>
  </section>
  <nav class="c-breadcrumb" aria-label="パンくずリスト">
    <ol class="c-breadcrumb__list">
      <li class="c-breadcrumb__item">
        <a href="/" class="c-breadcrumb__link">Top</a>
      </li>
      <li class="c-breadcrumb__item" aria-hidden="true">
        <img
          src="<?php echo esc_url(get_theme_file_uri('/img/about/breadcrumb-separator.svg')); ?>"
          width="20"
          height="1"
          alt="区切り線"
          class="c-breadcrumb__separator"
        />
      </li>
      <li class="c-breadcrumb__item">
        <span class="c-breadcrumb__current" aria-current="page">Works</span>
      </li>
    </ol>
  </nav>
  <section class="p-worksList">
    <div class="p-worksList__body">
      <?php get_template_part('template-parts/works-tab'); ?>
      <?php
      $paged = max(1, (int) get_query_var('paged'));
      $args = [
          "post_type" => "works",
          "posts_per_page" => 10,
          "paged" => $paged,
      ];
      $the_query = new WP_Query($args);
      if ($the_query->have_posts()) :
      ?>
        <ul class="p-worksList__list">
          <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
            <li class="p-worksList__item">
              <a href="<?php the_permalink(); ?>" class="news__link">
                <div class="p-worksList__itemPhoto">
                  <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('medium', ['class' => 'p-worksList__itemPhotoImg']); ?>
                  <?php else : ?>
                    <img class="p-worksList__itemPhotoImg" src="<?php echo esc_url(get_theme_file_uri('/img/noimage/noimage.jpg')); ?>" alt="NoImage画像" />
                  <?php endif; ?>
                </div>
                <div class="p-worksList__itemBody">
                  <div class="p-worksList__itemMeta">
                    <time class="p-worksList__itemDate" datetime="<?php echo esc_attr(get_the_date('Y-m-d')); ?>"><?php echo esc_html(get_the_date('Y.m.d')); ?></time>
                    <?php
                    $taxonomy_terms = get_the_terms(get_the_ID(), 'genre');
                    if (!is_wp_error($taxonomy_terms) && !empty($taxonomy_terms)) {
                        $limit = 5;
                        $count = 0;
                        foreach ($taxonomy_terms as $taxonomy_term) {
                            if ($count < $limit) {
                                echo '<span class="news__category p-worksList__itemTag">' . esc_html($taxonomy_term->name) . '</span>';
                                $count++;
                            } else {
                                break;
                            }
                        }
                    }
                    ?>
                  </div>
                  <div class="news__title p-worksList__itemTitle"><?php the_title(); ?></div>
                </div>
              </a>
            </li>
          <?php endwhile; ?>
        </ul>
      <?php else : ?>
        <p>記事が投稿されていません</p>
      <?php
      endif;
      wp_reset_postdata();
      ?>
    </div>
  </section>
  <nav class="p-worksPager" aria-label="ページネーション">
    <a href="<?php echo esc_url(get_pagenum_link(max(1, $paged - 1))); ?>" class="p-worksPager__arrow p-worksPager__arrow--prev" aria-label="前のページ">
      <img
        src="<?php echo esc_url(get_theme_file_uri('/img/news/group-pager-arrow.svg')); ?>"
        width="11"
        height="18"
        alt="前のページ"
        class="p-worksPager__arrowIcon"
      />
    </a>
    <ol class="p-worksPager__list">
      <?php for ($page_number = 1; $page_number <= max(1, (int) $the_query->max_num_pages); $page_number++) : ?>
        <li><a href="<?php echo esc_url(get_pagenum_link($page_number)); ?>" class="p-worksPager__link<?php if ($page_number === $paged) { echo ' p-worksPager__link--current'; } ?>"<?php if ($page_number === $paged) { echo ' aria-current="page"'; } ?>><?php echo esc_html($page_number); ?></a></li>
      <?php endfor; ?>
    </ol>
    <a href="<?php echo esc_url(get_pagenum_link(min(max(1, (int) $the_query->max_num_pages), $paged + 1))); ?>" class="p-worksPager__arrow p-worksPager__arrow--next" aria-label="次のページ">
      <img
        src="<?php echo esc_url(get_theme_file_uri('/img/news/group-pager-arrow.svg')); ?>"
        width="11"
        height="18"
        alt="次のページ"
        class="p-worksPager__arrowIcon"
      />
    </a>
  </nav>
  <section class="c-contact" id="contact">
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
</main>
<?php get_footer(); ?>
