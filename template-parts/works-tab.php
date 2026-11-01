<div class="tab p-worksList__nav">
    <?php
    $current_term_ids = array();
    $queried_object = get_queried_object();
    if ($queried_object instanceof WP_Term && $queried_object->taxonomy === 'genre') {
        $current_term_ids[] = (int) $queried_object->term_id;
    } elseif (is_singular('works')) {
        $post_terms = get_the_terms(get_queried_object_id(), 'genre');
        if (!is_wp_error($post_terms) && $post_terms) {
            foreach ($post_terms as $post_term) {
                $current_term_ids[] = (int) $post_term->term_id;
            }
        }
    }
    $terms = get_terms([
        // 表示するタクソノミースラッグを記述
        'taxonomy' => 'genre',
        'orderby' => 'name',
        'order'   => 'ASC',
        // 表示するタームの数を指定
        'number'  => 5
    ]);

    // カスタム投稿一覧ページへのURL
    $home_class = (is_post_type_archive('works')) ? 'is-active' : '';
    $home_link = sprintf(
        //カスタム投稿一覧ページへのaタグに付与するクラスを指定できる
        '<a class="tab__link %s" href="%s" alt="%s">全て</a>',
        $home_class,
        // カスタム投稿一覧ページのスラッグを指定
        esc_url(get_post_type_archive_link('works')),
        esc_attr(__('View all posts', 'textdomain'))
    );
    echo $home_link;

    // タームのリンク
    if (!is_wp_error($terms) && $terms) {
        foreach ($terms as $term) {
            $term_url = get_term_link($term);
            if (is_wp_error($term_url)) {
                continue;
            }
            // カレントクラスに付与するクラスを指定できる
            $term_class = in_array((int) $term->term_id, $current_term_ids, true) ? 'is-active' : '';
            $term_link = sprintf(
                // 各タームに付与するクラスを指定できる
                '<a class="tab__link %s" href="%s" alt="%s">%s</a>',
                $term_class,
                esc_url($term_url),
                esc_attr(sprintf(__('View all posts in %s', 'textdomain'), $term->name)),
                esc_html($term->name)
            );
            echo $term_link;
        }
    }
    ?>
</div>
