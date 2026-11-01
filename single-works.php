<?php get_header(); ?>
<main>
  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
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
            <a href="<?php echo esc_url(get_post_type_archive_link('works')); ?>" class="c-breadcrumb__link">Works</a>
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
      <section class="p-worksList">
        <div class="p-worksList__body">
          <?php get_template_part('template-parts/works-tab'); ?>
          <article class="p-worksDetail">
            <?php
            $genre_terms = get_the_terms(get_the_ID(), 'genre');
            if (!is_wp_error($genre_terms) && $genre_terms) :
                foreach ($genre_terms as $genre_term) :
            ?>
              <span class="p-worksDetail__tag"><?php echo esc_html($genre_term->name); ?></span>
            <?php
                endforeach;
            endif;
            ?>
            <h2 class="p-worksDetail__title"><?php the_title(); ?></h2>
            <p class="p-worksDetail__date"><?php echo esc_html(get_the_date('Y.m.d')); ?></p>
            <figure class="p-worksDetail__photo">
              <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('large'); ?>
              <?php else : ?>
                <img src="<?php echo esc_url(get_theme_file_uri('/img/noimage/noimage.jpg')); ?>" alt="NoImage画像" />
              <?php endif; ?>
            </figure>
            <div class="p-worksDetail__body">
              <?php the_content(); ?>
            </div>
            <div class="p-worksDetail__backWrap">
              <a class="c-backButton" href="<?php echo esc_url(get_post_type_archive_link('works')); ?>">
                <span class="c-backButton__icon">
                  <img
                    src="<?php echo esc_url(get_theme_file_uri('/img/works_syousai/works-back-arrow.svg')); ?>"
                    width="16"
                    height="6"
                    alt=""
                  />
                </span>
                <span class="c-backButton__text">一覧へ戻る</span>
              </a>
            </div>
          </article>
        </div>
      </section>
    <?php endwhile; ?>
  <?php endif; ?>
</main>
<?php get_footer(); ?>
