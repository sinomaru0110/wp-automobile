<?php get_header(); ?>
<main>
  <nav
    class="c-breadcrumb c-breadcrumb--pageTop"
    aria-label="パンくずリスト"
  >
    <ol class="c-breadcrumb__list">
      <li class="c-breadcrumb__item">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="c-breadcrumb__link">Top</a>
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
        <a href="<?php echo esc_url(home_url('/news/')); ?>" class="c-breadcrumb__link">News</a>
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
        <span class="c-breadcrumb__current" aria-current="page"><?php the_title(); ?></span>
      </li>
    </ol>
  </nav>

  <div class="p-newsSyousai">
    <div class="p-newsSyousai__body">
      <article class="p-newsDetail">
        <div class="p-newsDetail__tags">
          <?php foreach (get_the_category() as $category) : ?>
            <span class="p-newsDetail__tag"><?php echo esc_html($category->name); ?></span>
          <?php endforeach; ?>
        </div>
        <h1 class="p-newsDetail__title">
          <?php the_title(); ?>
        </h1>
        <p class="p-newsDetail__date" datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date('Y.m.d'); ?></p>
        <figure class="p-newsDetail__eyecatch">
          <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('large'); ?>
          <?php else : ?>
            <img src="<?php echo esc_url(get_theme_file_uri('/img/noimage/noimage.jpg')); ?>" alt="NoImage画像" />
          <?php endif; ?>
        </figure>
        <?php
        // 投稿の本文をHTMLの文字列として取り出す。
        $news_content = apply_filters('the_content', get_the_content());

        // 見出し2に見た目用のクラスを付ける。
        $news_content = str_replace('<h2 class="wp-block-heading">', '<h2 class="p-newsDetail__h2">', $news_content);
        $news_content = str_replace('<h2>', '<h2 class="p-newsDetail__h2">', $news_content);

        // 見出し3に見た目用のクラスを付ける。
        $news_content = str_replace('<h3 class="wp-block-heading">', '<h3 class="p-newsDetail__h3">', $news_content);
        $news_content = str_replace('<h3>', '<h3 class="p-newsDetail__h3">', $news_content);

        // 見出し3の終わりの直前に、下線を足す。
        $news_h3_line = '<span class="p-newsDetail__h3Line" aria-hidden="true"><span class="p-newsDetail__h3LineAccent"></span><span class="p-newsDetail__h3LineBase"></span></span>';
        $news_content = str_replace('</h3>', $news_h3_line . '</h3>', $news_content);

        // 段落に本文用のクラスを付ける。
        $news_content = str_replace('<p class="wp-block-paragraph">', '<p class="p-newsDetail__body">', $news_content);
        $news_content = str_replace('<p>', '<p class="p-newsDetail__body">', $news_content);

        // 中身が空の段落は消す。
        $news_content = str_replace('<p class="p-newsDetail__body"></p>', '', $news_content);

        echo $news_content;
        ?>
        <hr class="p-newsDetail__divider" />
        <nav class="p-newsDetail__nav" aria-label="記事ナビゲーション">
          <?php
          $prev_post = get_previous_post();
          $next_post = get_next_post();
          ?>
          <?php if ($prev_post) : ?>
            <a
              href="<?php echo esc_url(get_permalink($prev_post)); ?>"
              class="p-newsDetail__navBtn p-newsDetail__navBtn--prev"
            >
              <span class="p-newsDetail__navIcon">
                <img
                  src="<?php echo esc_url(get_theme_file_uri('/img/news_syousai/news-detail-arrow.svg')); ?>"
                  width="5"
                  height="9"
                  alt="前の記事へ"
                />
              </span>
              <span class="p-newsDetail__navText">前の記事へ</span>
            </a>
          <?php else : ?>
            <span></span><?php // 次の記事ボタンを右端に保つための空要素 ?>
          <?php endif; ?>
          <?php if ($next_post) : ?>
            <a
              href="<?php echo esc_url(get_permalink($next_post)); ?>"
              class="p-newsDetail__navBtn p-newsDetail__navBtn--next"
            >
              <span class="p-newsDetail__navText">次の記事へ</span>
              <span class="p-newsDetail__navIcon">
                <img
                  src="<?php echo esc_url(get_theme_file_uri('/img/news_syousai/news-detail-arrow.svg')); ?>"
                  width="5"
                  height="9"
                  alt="次の記事へ"
                />
              </span>
            </a>
          <?php endif; ?>
        </nav>
      </article>

      <aside class="c-sideBar">
        <section class="c-sideBar__block c-sideBar__block--news">
          <h3 class="c-sideBar__heading">最新記事</h3>
          <ul class="c-sideBar__newsList">
            <?php
            // 新しい順に3件。先頭固定の投稿は件数に含めず、日付順のままにする。
            $latest_query = new WP_Query(array(
              'post_type' => 'post',
              'posts_per_page' => 3,
              'ignore_sticky_posts' => true,
              'orderby' => 'date',
              'order' => 'DESC',
            ));
            if ($latest_query->have_posts()) :
              while ($latest_query->have_posts()) :
                $latest_query->the_post();
            ?>
              <li class="c-sideBar__newsItem">
                <a href="<?php the_permalink(); ?>" class="c-sideBar__newsLink">
                  <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('thumbnail', array('class' => 'c-sideBar__newsThumb')); ?>
                  <?php else : ?>
                    <img class="c-sideBar__newsThumb" src="<?php echo esc_url(get_theme_file_uri('/img/noimage/noimage.jpg')); ?>" alt="NoImage画像" />
                  <?php endif; ?>
                  <div class="c-sideBar__newsBody">
                    <p class="c-sideBar__newsTitle"><?php the_title(); ?></p>
                    <p class="c-sideBar__newsDate"><?php echo esc_html(get_the_date('Y.m.d')); ?></p>
                  </div>
                </a>
              </li>
            <?php
              endwhile;
              wp_reset_postdata();
            endif;
            ?>
          </ul>
        </section>
        <section class="c-sideBar__block c-sideBar__block--archive">
          <h3 class="c-sideBar__heading">アーカイブ</h3>
          <ul class="c-sideBar__textList">
            <?php wp_get_archives('type=monthly&limit=12'); ?>
          </ul>
        </section>
        <section class="c-sideBar__block c-sideBar__block--category">
          <h3 class="c-sideBar__heading">カテゴリー</h3>
          <ul class="c-sideBar__textList">
            <?php
            $categories = get_categories();
            foreach ($categories as $category) {
              echo '<li class="c-sideBar__textItem"><a class="c-sideBar__textLink" href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a></li>';
            }
            ?>
          </ul>
        </section>
      </aside>
    </div>
  </div>

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
