<?php get_header(); ?>
<main>
  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
      <?php get_template_part('template-parts/fv'); ?>
      <?php get_template_part('template-parts/breadcrumb'); ?>
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
