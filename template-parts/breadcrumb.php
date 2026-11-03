<?php
/**
 * 下層ページ共通パンくずリスト（Breadcrumb NavXT）
 *
 * 余白などを変えたいページは modifier クラスを渡す
 * 例）get_template_part('template-parts/breadcrumb', null, array('modifier' => 'c-breadcrumb--pageTop'));
 */
$breadcrumb_class = 'c-breadcrumb';
if (!empty($args['modifier'])) {
    $breadcrumb_class .= ' ' . $args['modifier'];
}
?>
<nav class="<?php echo esc_attr($breadcrumb_class); ?>" aria-label="パンくずリスト">
  <?php if (function_exists('bcn_display')) : ?>
    <div class="c-breadcrumb__list" vocab="https://schema.org/" typeof="BreadcrumbList">
      <?php bcn_display(); ?>
    </div>
  <?php endif; ?>
</nav>
