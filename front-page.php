<?php get_header(); ?>
<main>
      <section class="p-fv">
        <div class="p-fv__inner">
          <div class="p-fv__slider swiper js-fvSlider">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <picture>
                  <source
                    media="(max-width: 768px)"
                    srcset="<?php echo esc_url(get_theme_file_uri()); ?>/img/top/fv-sp-slide-01.webp"
                  />
                  <img
                    src="<?php echo esc_url(get_theme_file_uri()); ?>/img/top/fv-slide-01.webp"
                    alt="車内で笑う女性4人"
                    class="p-fv__slideImg"
                  />
                </picture>
              </div>
              <div class="swiper-slide">
                <picture>
                  <source
                    media="(max-width: 768px)"
                    srcset="<?php echo esc_url(get_theme_file_uri()); ?>/img/top/fv-sp-slide-02.webp"
                  />
                  <img
                    src="<?php echo esc_url(get_theme_file_uri()); ?>/img/top/fv-slide-02.webp"
                    alt="オープンカーで海沿いの道を走るカップル"
                    class="p-fv__slideImg"
                  />
                </picture>
              </div>
              <div class="swiper-slide">
                <picture>
                  <source
                    media="(max-width: 768px)"
                    srcset="<?php echo esc_url(get_theme_file_uri()); ?>/img/top/fv-sp-slide-03.webp"
                  />
                  <img
                    src="<?php echo esc_url(get_theme_file_uri()); ?>/img/top/fv-slide-03.webp"
                    alt="オープンカーを運転する男性"
                    class="p-fv__slideImg"
                  />
                </picture>
              </div>
              <div class="swiper-slide">
                <picture>
                  <source
                    media="(max-width: 768px)"
                    srcset="<?php echo esc_url(get_theme_file_uri()); ?>/img/top/fv-sp-slide-04.webp"
                  />
                  <img
                    src="<?php echo esc_url(get_theme_file_uri()); ?>/img/top/fv-slide-04.webp"
                    alt="赤いオープンカーと女性、山の景色"
                    class="p-fv__slideImg"
                  />
                </picture>
              </div>
            </div>
          </div>
          <h1 class="p-fv__catch">
            <span class="p-fv__catchText">あなたの</span>
            <span class="p-fv__catchText">日常が目覚める</span>
          </h1>
        </div>
        <div class="p-fvMarquee" aria-hidden="true">
          <div class="p-fvMarquee__track">
            <span class="p-fvMarquee__text">Good life for Good Car</span>
            <span class="p-fvMarquee__text">Good life for Good Car</span>
            <span class="p-fvMarquee__text">Good life for Good Car</span>
            <span class="p-fvMarquee__text">Good life for Good Car</span>
            <span class="p-fvMarquee__text">Good life for Good Car</span>
            <span class="p-fvMarquee__text">Good life for Good Car</span>
            <span class="p-fvMarquee__text">Good life for Good Car</span>
            <span class="p-fvMarquee__text">Good life for Good Car</span>
          </div>
        </div>
        <p class="p-fvMarquee__srOnly">Good life for Good Car</p>
      </section>
      <section class="p-about">
        <div class="p-about__inner">
          <div class="p-about__photo">
            <picture>
              <source
                media="(max-width: 768px)"
                srcset="<?php echo esc_url(get_theme_file_uri()); ?>/img/top/about-sp-photo.webp"
              />
              <img
                src="<?php echo esc_url(get_theme_file_uri()); ?>/img/top/about-photo.webp"
                width="550"
                height="480"
                alt="ExciteCode Automobileの店内写真"
                class="p-about__photoImg"
              />
            </picture>
          </div>
          <div class="p-about__body">
            <h2 class="p-about__head">About us</h2>
            <p class="p-about__text">
              弊社は、輸入車選びのすべてを見つめ直し、新たなスタイルを提案するインポート・セレクト・ブランドです。これまでの憧れだけや批評家の意見といったイメージで選ぶのではなく、オーナー様となる方がクルマから直接感じるリアルな感性を第一にした、最良の一台との出会いをコーディネートいたします。
            </p>
            <a href="<?php echo esc_url(home_url('/about/')); ?>" class="p-about__link">
              <span class="p-about__linkText">READ MORE</span>
              <img
                src="<?php echo esc_url(get_theme_file_uri()); ?>/img/top/about-arrow-icon.svg"
                width="5"
                height="9"
                alt="矢印アイコン"
                class="p-about__linkIcon"
              />
            </a>
          </div>
        </div>
      </section>
      <section class="p-service">
        <div class="p-service__inner">
          <h2 class="p-service__head js-serviceTitle">Service</h2>
          <ul class="p-service__list">
            <li class="p-service__item">
              <div class="p-service__cardImg">
                <picture>
                  <source
                    media="(max-width: 768px)"
                    srcset="<?php echo esc_url(get_theme_file_uri()); ?>/img/top/service-sp-photo-01.webp"
                  />
                  <img
                    src="<?php echo esc_url(get_theme_file_uri()); ?>/img/top/service-photo-01.webp"
                    width="355"
                    height="170"
                    alt="購入サポートの様子"
                    class="p-service__cardPhoto"
                  />
                </picture>
                <p class="p-service__cardLabel">Service01</p>
                <h3 class="p-service__cardTitle">購入サポート</h3>
              </div>
              <p class="p-service__cardText">
                国を超え、メーカーを超え、高級の本質をお届けする特別な一台との出会いをサポートします。
              </p>
              <a
                href="<?php echo esc_url(home_url('/service/#purchase-support')); ?>"
                class="p-service__cardLink"
              >
                <span class="p-service__cardLinkText">READ MORE</span>
                <img
                  src="<?php echo esc_url(get_theme_file_uri()); ?>/img/top/service-arrow-icon.svg"
                  width="5"
                  height="9"
                  alt="矢印アイコン"
                  class="p-service__cardLinkIcon"
                />
              </a>
            </li>
            <li class="p-service__item">
              <div class="p-service__cardImg">
                <picture>
                  <source
                    media="(max-width: 768px)"
                    srcset="<?php echo esc_url(get_theme_file_uri()); ?>/img/top/service-sp-photo-02.webp"
                  />
                  <img
                    src="<?php echo esc_url(get_theme_file_uri()); ?>/img/top/service-photo-02.webp"
                    width="355"
                    height="170"
                    alt="修理・整備の様子"
                    class="p-service__cardPhoto"
                  />
                </picture>
                <p class="p-service__cardLabel">Service02</p>
                <h3 class="p-service__cardTitle">修理・整備</h3>
              </div>
              <p class="p-service__cardText">
                高度な輸入車修理技術と数多くの修理実績、熟練の技術・設備であなたの愛車を完全に直します。
              </p>
              <a
                href="<?php echo esc_url(home_url('/service/#repair-maintenance')); ?>"
                class="p-service__cardLink"
              >
                <span class="p-service__cardLinkText">READ MORE</span>
                <img
                  src="<?php echo esc_url(get_theme_file_uri()); ?>/img/top/service-arrow-icon.svg"
                  width="5"
                  height="9"
                  alt="矢印アイコン"
                  class="p-service__cardLinkIcon"
                />
              </a>
            </li>
            <li class="p-service__item">
              <div class="p-service__cardImg">
                <picture>
                  <source
                    media="(max-width: 768px)"
                    srcset="<?php echo esc_url(get_theme_file_uri()); ?>/img/top/service-sp-photo-03.webp"
                  />
                  <img
                    src="<?php echo esc_url(get_theme_file_uri()); ?>/img/top/service-photo-03.webp"
                    width="355"
                    height="170"
                    alt="車検・点検の様子"
                    class="p-service__cardPhoto"
                  />
                </picture>
                <p class="p-service__cardLabel">Service03</p>
                <h3 class="p-service__cardTitle">車検・点検</h3>
              </div>
              <p class="p-service__cardText">
                輸入車の取り扱いが県内トップクラス。専門の整備工場へ任せたいなら弊社へご相談ください。
              </p>
              <a href="<?php echo esc_url(home_url('/service/#inspection')); ?>" class="p-service__cardLink">
                <span class="p-service__cardLinkText">READ MORE</span>
                <img
                  src="<?php echo esc_url(get_theme_file_uri()); ?>/img/top/service-arrow-icon.svg"
                  width="5"
                  height="9"
                  alt="矢印アイコン"
                  class="p-service__cardLinkIcon"
                />
              </a>
            </li>
          </ul>
        </div>
      </section>
      <div class="p-workNews">
        <section class="p-work">
          <div class="p-work__inner">
            <h2 class="p-work__head js-workTitle">Works</h2>
            <div class="p-work__panel">
              <ul class="p-work__list">
                <li class="p-work__item js-workItem">
                  <div class="p-work__cardImg">
                    <picture>
                      <source
                        media="(max-width: 768px)"
                        srcset="<?php echo esc_url(get_theme_file_uri()); ?>/img/top/work-sp-photo-01.webp"
                      />
                      <img
                        src="<?php echo esc_url(get_theme_file_uri()); ?>/img/top/work-photo-01.webp"
                        width="290"
                        height="229"
                        alt="車のドアロックを開ける様子"
                        class="p-work__cardPhoto"
                      />
                    </picture>
                  </div>
                  <div class="p-work__cardBody">
                    <span class="p-work__cardTag">修理・整備</span>
                    <h3 class="p-work__cardTitle">
                      車のドアが開けられなくなった｜ドアロックの交換と...
                    </h3>
                    <p class="p-work__cardText">
                      弊社は、輸入車選びのすべてを見つめ直し、新たなスタイルを提案するインポート・セレクト・ブランドです。これまでの憧れだけや批評家の意見といったイメージで選ぶのではなく...
                    </p>
                    <time class="p-work__cardDate" datetime="2022-09-02">2022.09.02</time>
                  </div>
                </li>
                <li class="p-work__item js-workItem">
                  <div class="p-work__cardImg">
                    <picture>
                      <source
                        media="(max-width: 768px)"
                        srcset="<?php echo esc_url(get_theme_file_uri()); ?>/img/top/work-sp-photo-02.webp"
                      />
                      <img
                        src="<?php echo esc_url(get_theme_file_uri()); ?>/img/top/work-photo-02.webp"
                        width="290"
                        height="229"
                        alt="車の板金修理の様子"
                        class="p-work__cardPhoto"
                      />
                    </picture>
                  </div>
                  <div class="p-work__cardBody">
                    <span class="p-work__cardTag">修理・整備</span>
                    <h3 class="p-work__cardTitle">
                      愛車のリアバンパーに傷がついた｜板金修理と塗装で...
                    </h3>
                    <p class="p-work__cardText">
                      弊社は、輸入車選びのすべてを見つめ直し、新たなスタイルを提案するインポート・セレクト・ブランドです。これまでの憧れだけや批評家の意見といったイメージで選ぶのではなく...
                    </p>
                    <time class="p-work__cardDate" datetime="2022-08-26">2022.08.26</time>
                  </div>
                </li>
                <li class="p-work__item js-workItem">
                  <div class="p-work__cardImg">
                    <picture>
                      <source
                        media="(max-width: 768px)"
                        srcset="<?php echo esc_url(get_theme_file_uri()); ?>/img/top/work-sp-photo-03.webp"
                      />
                      <img
                        src="<?php echo esc_url(get_theme_file_uri()); ?>/img/top/work-photo-03.webp"
                        width="290"
                        height="229"
                        alt="輸入車の購入検討をする様子"
                        class="p-work__cardPhoto"
                      />
                    </picture>
                  </div>
                  <div class="p-work__cardBody">
                    <span class="p-work__cardTag">購入サポート</span>
                    <h3 class="p-work__cardTitle">
                      はじめて輸入車の購入を検討中のお客様｜憧れのBM...
                    </h3>
                    <p class="p-work__cardText">
                      弊社は、輸入車選びのすべてを見つめ直し、新たなスタイルを提案するインポート・セレクト・ブランドです。これまでの憧れだけや批評家の意見といったイメージで選ぶのではなく...
                    </p>
                    <time class="p-work__cardDate" datetime="2022-08-20">2022.08.20</time>
                  </div>
                </li>
              </ul>
              <a href="<?php echo esc_url(get_post_type_archive_link('works')); ?>" class="p-work__more">
                <span class="p-work__moreText">READ MORE</span>
                <img
                  src="<?php echo esc_url(get_theme_file_uri()); ?>/img/top/work-arrow-icon.svg"
                  width="5"
                  height="9"
                  alt="矢印アイコン"
                  class="p-work__moreIcon"
                />
              </a>
            </div>
          </div>
        </section>
        <section class="p-news">
          <div class="p-news__inner">
            <div class="p-news__body">
              <div class="p-news__catCol">
                <h2 class="p-news__head">News</h2>
                <nav class="p-news__cat">
                  <?php
                  // お知らせ一覧と、記事が1件以上あるカテゴリーへのリンク
                  $news_page_id = (int) get_option('page_for_posts');
                  $news_url = $news_page_id ? get_permalink($news_page_id) : home_url('/news/');
                  $news_categories = get_categories(array('orderby' => 'term_id', 'order' => 'ASC'));
                  ?>
                  <ul class="p-news__catList">
                    <li class="p-news__catItem p-news__catItem--active">
                      <a class="p-news__catLink" href="<?php echo esc_url($news_url); ?>"><span class="p-news__catMarker"></span>すべてのお知らせ</a>
                    </li>
                    <?php foreach ($news_categories as $news_category) : ?>
                      <li class="p-news__catItem">
                        <a class="p-news__catLink" href="<?php echo esc_url(get_category_link($news_category->term_id)); ?>"><span class="p-news__catMarker"></span><?php echo esc_html($news_category->name); ?></a>
                      </li>
                    <?php endforeach; ?>
                  </ul>
                </nav>
              </div>
              <?php
              // トップは固定ページなので、メインクエリはページ本体。お知らせは別クエリで新しい順に5件取る。
              $news_query = new WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => 5,
              ));
              if ($news_query->have_posts()) :
              ?>
                <ul class="p-news__list">
                  <?php
                  while ($news_query->have_posts()) :
                    $news_query->the_post();
                  ?>
                    <li class="p-news__item">
                      <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('medium', array('class' => 'p-news__itemImg')); ?>
                      <?php else : ?>
                        <img class="p-news__itemImg" src="<?php echo esc_url(get_theme_file_uri('/img/noimage/noimage.jpg')); ?>" alt="NoImage画像" />
                      <?php endif; ?>
                      <div class="p-news__itemBody">
                        <div class="p-news__itemMeta">
                          <time class="p-news__itemDate" datetime="<?php echo esc_attr(get_the_date('Y-m-d')); ?>"><?php echo esc_html(get_the_date('Y.m.d')); ?></time>
                        <?php
                        $categories = get_the_category();
                        if ($categories) :
                          $category_count = 0;
                          foreach ($categories as $category) :
                            if ($category_count < 5) :
                              $category_count++;
                        ?>
                          <a class="p-news__itemTag<?php if (is_category($category->term_id)) { echo ' is-current'; } ?>" href="<?php echo esc_url(get_category_link($category->term_id)); ?>"><?php echo esc_html($category->name); ?></a>
                        <?php
                            endif;
                          endforeach;
                        endif;
                        ?>
                        </div>
                        <p class="p-news__itemTitle">
                          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </p>
                      </div>
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
            <a href="<?php echo esc_url(home_url('/news/')); ?>" class="p-news__more">
              <span class="p-news__moreText">READ MORE</span>
              <img
                src="<?php echo esc_url(get_theme_file_uri()); ?>/img/top/news-arrow-icon.svg"
                width="5"
                height="9"
                alt="矢印アイコン"
                class="p-news__moreIcon"
              />
            </a>
          </div>
        </section>
      </div>
      <?php get_template_part('template-parts/contact'); ?>
    </main>
<?php get_footer(); ?>