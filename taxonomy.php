<?php get_header(); ?>
<?php
$genre_slug = get_query_var('genre');
$genre_term = $genre_slug ? get_term_by('slug', $genre_slug, 'genre') : null;
$genre_name = ($genre_term && !is_wp_error($genre_term)) ? $genre_term->name : 'タクソノミー別一覧';
$paged = max(1, (int) get_query_var('paged'));
$args = [
    "post_type" => "works",
    "posts_per_page" => 10,
    "paged" => $paged,
    "tax_query" => [
        [
            "taxonomy" => "genre",
            "field" => "slug",
            "terms" => $genre_slug,
        ],
    ],
];
$the_query = new WP_Query($args);
?>
<main>
    <section class="p-worksFv">
        <div class="p-worksFv__photo js-fvPhoto">
            <picture>
                <source media="(max-width: 768px)" srcset="<?php echo esc_url(get_theme_file_uri('/img/works/fv-photo-sp.webp')); ?>" />
                <img src="<?php echo esc_url(get_theme_file_uri('/img/works/fv-photo.webp')); ?>" width="1270" height="514" alt="ショールーム内の黄色いスポーツカー" class="p-worksFv__photoImg" />
            </picture>
        </div>
        <div class="p-worksFv__titleWrap js-fvTitle">
            <div class="p-worksFv__titleBg"></div>
            <h1 class="p-worksFv__title">
                <span class="p-worksFv__titleEn">Works</span>
                <span class="p-worksFv__titleJa"><?php echo esc_html($genre_name); ?></span>
            </h1>
        </div>
    </section>
    <nav class="c-breadcrumb" aria-label="パンくずリスト">
        <ol class="c-breadcrumb__list">
            <li class="c-breadcrumb__item">
                <a href="/" class="c-breadcrumb__link">Top</a>
            </li>
            <li class="c-breadcrumb__item" aria-hidden="true">
                <img src="<?php echo esc_url(get_theme_file_uri('/img/about/breadcrumb-separator.svg')); ?>" width="20" height="1" alt="区切り線" class="c-breadcrumb__separator" />
            </li>
            <li class="c-breadcrumb__item">
                <a href="<?php echo esc_url(get_post_type_archive_link('works')); ?>" class="c-breadcrumb__link">Works</a>
            </li>
            <li class="c-breadcrumb__item" aria-hidden="true">
                <img src="<?php echo esc_url(get_theme_file_uri('/img/about/breadcrumb-separator.svg')); ?>" width="20" height="1" alt="区切り線" class="c-breadcrumb__separator" />
            </li>
            <li class="c-breadcrumb__item">
                <span class="c-breadcrumb__current" aria-current="page"><?php echo esc_html($genre_name); ?></span>
            </li>
        </ol>
    </nav>
    <section class="p-worksList">
        <div class="p-worksList__body">
            <?php get_template_part('template-parts/works-tab'); ?>
            <div class="news">
                <?php if ($the_query->have_posts()) : ?>
                    <ul class="news__items p-worksList__list">
                        <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
                            <li class="news__item p-worksList__item">
                                <a href="<?php the_permalink(); ?>" class="news__link">
                                    <div class="p-worksList__itemPhoto">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <?php the_post_thumbnail('medium', ['class' => 'news__img p-worksList__itemPhotoImg']); ?>
                                        <?php else : ?>
                                            <img class="news__img p-worksList__itemPhotoImg" src="<?php echo esc_url(get_theme_file_uri('/img/noimage/noimage.jpg')); ?>" alt="NoImage画像" />
                                        <?php endif; ?>
                                    </div>
                                    <div class="news__text-wrapper p-worksList__itemBody">
                                        <div class="news__information p-worksList__itemMeta">
                                            <time class="news__date p-worksList__itemDate" datetime="<?php echo esc_attr(get_the_date('Y-m-d')); ?>"><?php echo esc_html(get_the_date('Y.m.d')); ?></time>
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
                        <?php wp_reset_postdata(); ?>
                    </ul>
                <?php else : ?>
                    <p>記事が投稿されていません</p>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php if ((int) $the_query->max_num_pages > 1) : ?>
        <nav class="p-worksPager" aria-label="ページネーション">
            <a href="<?php echo esc_url(get_pagenum_link(max(1, $paged - 1))); ?>" class="p-worksPager__arrow p-worksPager__arrow--prev" aria-label="前のページ">
                <img src="<?php echo esc_url(get_theme_file_uri('/img/news/group-pager-arrow.svg')); ?>" width="11" height="18" alt="前のページ" class="p-worksPager__arrowIcon" />
            </a>
            <ol class="p-worksPager__list">
                <?php for ($page_number = 1; $page_number <= (int) $the_query->max_num_pages; $page_number++) : ?>
                    <li><a href="<?php echo esc_url(get_pagenum_link($page_number)); ?>" class="p-worksPager__link<?php if ($page_number === $paged) { echo ' p-worksPager__link--current'; } ?>"<?php if ($page_number === $paged) { echo ' aria-current="page"'; } ?>><?php echo esc_html($page_number); ?></a></li>
                <?php endfor; ?>
            </ol>
            <a href="<?php echo esc_url(get_pagenum_link(min((int) $the_query->max_num_pages, $paged + 1))); ?>" class="p-worksPager__arrow p-worksPager__arrow--next" aria-label="次のページ">
                <img src="<?php echo esc_url(get_theme_file_uri('/img/news/group-pager-arrow.svg')); ?>" width="11" height="18" alt="次のページ" class="p-worksPager__arrowIcon" />
            </a>
        </nav>
    <?php endif; ?>
</main>
<?php get_footer(); ?>
