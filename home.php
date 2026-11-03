<?php get_header(); ?>

<?php get_template_part('template-parts/fv'); ?>
<?php get_template_part('template-parts/breadcrumb'); ?>
<main>
  <section class="p-newsList">
    <div class="p-newsList__body">
      <nav class="p-newsList__nav" aria-label="お知らせカテゴリ">
        <ul class="p-newsList__navList">
          <li class="p-newsList__navItem p-newsList__navItem--active">
            <span class="p-newsList__navMarker"></span>すべてのお知らせ
          </li>
          <li class="p-newsList__navItem">
            <span class="p-newsList__navMarker"></span>トピックス
          </li>
          <li class="p-newsList__navItem">
            <span class="p-newsList__navMarker"></span>イベント・キャンペーン
          </li>
          <li class="p-newsList__navItem">
            <span class="p-newsList__navMarker"></span>入庫車状況
          </li>
        </ul>
      </nav>
      <?php
      // メインクエリに投稿があるか確認する。1件もない場合は else 側を表示する。
      if (have_posts()) :
      ?>
        <ul class="p-newsList__list">
          <?php
          // 投稿がある間繰り返す。the_post() で次の投稿を現在の投稿にし、
          // 以降の get_the_date() や the_title() がその投稿を参照できるようにする。
          while (have_posts()) :
            the_post();
          ?>
            <li class="p-newsList__item js-newsItem">
              <?php if (has_post_thumbnail()) : ?>
                <?php // アイキャッチ画像があれば、本文の左側に出す。 ?>
                <?php the_post_thumbnail('medium', array('class' => 'p-newsList__itemImg')); ?>
              <?php else : ?>
                <?php // アイキャッチ画像がなければ、同じ位置に NoImage 画像を出す。 ?>
                <img class="p-newsList__itemImg" src="<?php echo esc_url(get_theme_file_uri('/img/noimage/noimage.jpg')); ?>" alt="NoImage画像" />
              <?php endif; ?>
              <div class="p-newsList__itemBody">
                <div class="p-newsList__itemMeta">
                  <?php // datetime は機械が読む日付、表示テキストはドット区切りの日付。 ?>
                  <time class="p-newsList__itemDate" datetime="<?php echo esc_attr(get_the_date('Y-m-d')); ?>"><?php echo esc_html(get_the_date('Y.m.d')); ?></time>
                  <?php
                  // 現在の投稿に付いているカテゴリーを配列で取得する。未設定なら空配列。
                  $categories = get_the_category();

                  // カテゴリーがある投稿だけ、カテゴリー名を出力する。
                  if ($categories) :
                    // 表示済みの件数。0 から数え、上限に達したらそれ以上は出さない。
                    $category_count = 0;
                    // 1記事あたりのカテゴリー表示上限。
                    $category_limit = 5;
                    foreach ($categories as $category) :
                      // 上限未満のときだけ表示し、表示した時点で件数を 1 増やす。
                      if ($category_count < $category_limit) :
                        $category_count++;
                        // カテゴリー名は、そのカテゴリーの一覧へ移動するリンクにする。
                        ?>
                        <a class="p-newsList__itemCategory<?php if (is_category($category->term_id)) { echo ' is-current'; } ?>" href="<?php echo esc_url(get_category_link($category->term_id)); ?>"><?php echo esc_html($category->name); ?></a>
                        <?php
                      endif;
                    endforeach;
                  endif;
                  ?>
                </div>
                <p class="p-newsList__itemTitle">
                  <?php // PC表示用。the_permalink() は投稿URL、the_title() は投稿タイトル。 ?>
                  <span class="p-newsList__itemTitleText--pc"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
                  <?php // SP表示用。リンク先とタイトルは PC 側と同じ投稿を参照する。 ?>
                  <span class="p-newsList__itemTitleText--sp"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
                </p>
              </div>
            </li>
          <?php endwhile; ?>
        </ul>
      <?php else : ?>
        <?php // 投稿が 0 件のときに出すメッセージ。 ?>
        <p>記事が投稿されていません</p>
      <?php endif; ?>
    </div>
    <?php
    // $wp_query は、いま表示している投稿一覧の情報。
    // max_num_pages は全投稿を何ページに分けているか。1ページだけならページ送りは出さない。
    $total_pages = (int) $wp_query->max_num_pages;
    if ($total_pages > 1) :
      // the_posts_pagination() は「前へ・ページ番号・次へ」のリンクをまとめて出力する。
      the_posts_pagination(array(
        // いま開いているページの前後に、ページ番号を何個出すか。
        'mid_size' => 2,
        // 「前のページ」リンクの中身。矢印の形は CSS で描き、この文字は読み上げ用に隠す。
        'prev_text' => '<span class="screen-reader-text">前のページ</span>',
        // 「次のページ」リンクの中身。こちらも見た目は CSS の矢印。
        'next_text' => '<span class="screen-reader-text">次のページ</span>',
        // ページ送り全体の見出し。画面上では CSS で非表示にしている。
        'screen_reader_text' => 'ページネーション',
        // 支援技術に「これはページ送り」と伝えるための名前。
        'aria_label' => 'ページネーション',
        // 見た目用のクラス。色や大きさは sass/project/_newsPager.scss で指定している。
        'class' => 'p-newsPager',
      ));
    endif;
    ?>
  </section>
</main>

<?php get_footer(); ?>
