<?php
/**
 * お知らせ一覧（カテゴリー絞り込み + 記事一覧 + ページ送り）
 * home.php（お知らせ一覧）・category.php（カテゴリー別）・date.php（月別）で共通
 */
global $wp_query;

// 「すべてのお知らせ」のリンク先（設定 → 表示設定 の「投稿ページ」。未設定なら /news/）
$news_page_id = (int) get_option('page_for_posts');
$news_url = $news_page_id ? get_permalink($news_page_id) : home_url('/news/');

// 記事が1件以上あるカテゴリーを、作成した順に取得
$news_categories = get_categories(array(
  'orderby' => 'term_id',
  'order' => 'ASC',
  'hide_empty' => true,
));
?>
<section class="p-newsList">
  <div class="p-newsList__body">
    <nav class="p-newsList__nav" aria-label="お知らせカテゴリ">
      <ul class="p-newsList__navList">
        <li class="p-newsList__navItem<?php if (is_home()) { echo ' p-newsList__navItem--active'; } ?>">
          <a class="p-newsList__navLink" href="<?php echo esc_url($news_url); ?>"<?php if (is_home()) { echo ' aria-current="page"'; } ?>>
            <span class="p-newsList__navMarker"></span>すべてのお知らせ
          </a>
        </li>
        <?php foreach ($news_categories as $news_category) : ?>
          <?php $is_current = is_category($news_category->term_id); ?>
          <li class="p-newsList__navItem<?php if ($is_current) { echo ' p-newsList__navItem--active'; } ?>">
            <a class="p-newsList__navLink" href="<?php echo esc_url(get_category_link($news_category->term_id)); ?>"<?php if ($is_current) { echo ' aria-current="page"'; } ?>>
              <span class="p-newsList__navMarker"></span><?php echo esc_html($news_category->name); ?>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    </nav>
    <?php if (have_posts()) : ?>
      <ul class="p-newsList__list">
        <?php while (have_posts()) : the_post(); ?>
          <li class="p-newsList__item js-newsItem">
            <?php if (has_post_thumbnail()) : ?>
              <?php the_post_thumbnail('medium', array('class' => 'p-newsList__itemImg')); ?>
            <?php else : ?>
              <img class="p-newsList__itemImg" src="<?php echo esc_url(get_theme_file_uri('/img/noimage/noimage.jpg')); ?>" alt="NoImage画像" />
            <?php endif; ?>
            <div class="p-newsList__itemBody">
              <div class="p-newsList__itemMeta">
                <time class="p-newsList__itemDate" datetime="<?php echo esc_attr(get_the_date('Y-m-d')); ?>"><?php echo esc_html(get_the_date('Y.m.d')); ?></time>
                <?php
                // カテゴリーは1記事につき最大5件まで表示
                $categories = array_slice(get_the_category(), 0, 5);
                foreach ($categories as $category) :
                ?>
                  <a class="p-newsList__itemCategory<?php if (is_category($category->term_id)) { echo ' is-current'; } ?>" href="<?php echo esc_url(get_category_link($category->term_id)); ?>"><?php echo esc_html($category->name); ?></a>
                <?php endforeach; ?>
              </div>
              <p class="p-newsList__itemTitle">
                <span class="p-newsList__itemTitleText--pc"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
                <span class="p-newsList__itemTitleText--sp"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
              </p>
            </div>
          </li>
        <?php endwhile; ?>
      </ul>
    <?php else : ?>
      <p>記事が投稿されていません</p>
    <?php endif; ?>
  </div>
  <?php
  // 2ページ以上あるときだけページ送りを出す（見た目は sass/project/_newsPager.scss）
  if ((int) $wp_query->max_num_pages > 1) :
    the_posts_pagination(array(
      'mid_size' => 2,
      'prev_text' => '<span class="screen-reader-text">前のページ</span>',
      'next_text' => '<span class="screen-reader-text">次のページ</span>',
      'screen_reader_text' => 'ページネーション',
      'aria_label' => 'ページネーション',
      'class' => 'p-newsPager',
    ));
  endif;
  ?>
</section>
