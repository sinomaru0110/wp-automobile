<?php get_header(); ?>
<main>
  <?php get_template_part('template-parts/breadcrumb', null, array('modifier' => 'c-breadcrumb--pageTop')); ?>

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
        <time class="p-newsDetail__date" datetime="<?php echo esc_attr(get_the_date('Y-m-d')); ?>"><?php echo esc_html(get_the_date('Y.m.d')); ?></time>
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

  <?php get_template_part('template-parts/contact'); ?>
</main>
<?php get_footer(); ?>
