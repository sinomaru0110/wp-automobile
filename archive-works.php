<?php get_header(); ?>
<main>
  <?php get_template_part('template-parts/fv'); ?>
  <?php get_template_part('template-parts/breadcrumb'); ?>
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
  <?php if ((int) $the_query->max_num_pages > 1) : // 2ページ以上あるときだけページ送りを出す ?>
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
        <?php for ($page_number = 1; $page_number <= (int) $the_query->max_num_pages; $page_number++) : ?>
          <li><a href="<?php echo esc_url(get_pagenum_link($page_number)); ?>" class="p-worksPager__link<?php if ($page_number === $paged) { echo ' p-worksPager__link--current'; } ?>"<?php if ($page_number === $paged) { echo ' aria-current="page"'; } ?>><?php echo esc_html($page_number); ?></a></li>
        <?php endfor; ?>
      </ol>
      <a href="<?php echo esc_url(get_pagenum_link(min((int) $the_query->max_num_pages, $paged + 1))); ?>" class="p-worksPager__arrow p-worksPager__arrow--next" aria-label="次のページ">
        <img
          src="<?php echo esc_url(get_theme_file_uri('/img/news/group-pager-arrow.svg')); ?>"
          width="11"
          height="18"
          alt="次のページ"
          class="p-worksPager__arrowIcon"
        />
      </a>
    </nav>
  <?php endif; ?>
  <?php get_template_part('template-parts/contact'); ?>
</main>
<?php get_footer(); ?>
