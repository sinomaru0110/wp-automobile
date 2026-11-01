<?php get_header(); ?>
<main>
    <div class="post p-newsArchive">
        <div class="post__fv">
            <h1 class="post__title p-news__head"><?php echo esc_html(single_cat_title('', false)); ?></h1>
        </div>
        <div class="post__inner">
            <div class="news">
                <?php if (have_posts()) : ?>
                    <ul class="news__items p-newsList__list">
                        <?php while (have_posts()) : the_post(); ?>
                            <li class="news__item p-newsList__item">
                                <a href="<?php the_permalink(); ?>" class="news__link">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('full', ['class' => 'news__img p-newsList__itemImg']); ?>
                                    <?php else : ?>
                                        <img class="news__img p-newsList__itemImg" src="<?php echo esc_url(get_theme_file_uri('/img/noimage/noimage.jpg')); ?>" alt="NoImage画像" />
                                    <?php endif; ?>
                                </a>
                                <div class="news__text-wrapper p-newsList__itemBody">
                                    <div class="news__information p-newsList__itemMeta">
                                        <time class="news__date p-newsList__itemDate" datetime="<?php echo esc_attr(get_the_date('Y-m-d')); ?>"><?php echo esc_html(get_the_date('Y.m.d')); ?></time>
                                        <?php
                                        $categories = get_the_category();
                                        if (!empty($categories)) {
                                            $limit = 5;
                                            $count = 0;
                                            foreach ($categories as $category) {
                                                if ($count < $limit) {
                                                    $category_class = 'news__category p-newsList__itemCategory';
                                                    if (is_category($category->term_id)) {
                                                        $category_class .= ' is-current';
                                                    }
                                                    echo '<a class="' . esc_attr($category_class) . '" href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';
                                                    $count++;
                                                } else {
                                                    break;
                                                }
                                            }
                                        }
                                        ?>
                                    </div>
                                    <div class="news__title p-newsList__itemTitle"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
                                </div>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                <?php else : ?>
                    <p>記事が投稿されていません</p>
                <?php endif; ?>
            </div>
            <?php
            $args = [
                'mid_size' => 1,
                'prev_text' => '<span class="screen-reader-text">前のページ</span>',
                'next_text' => '<span class="screen-reader-text">次のページ</span>',
                'screen_reader_text' => 'ページネーション',
                'class' => 'p-newsPager',
            ];
            the_posts_pagination($args);
            ?>
        </div>
    </div>
</main>
<?php get_footer(); ?>
