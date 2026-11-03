<?php
/**
 * 下層ページ共通パンくずリスト（Breadcrumb NavXT）
 */
?>
<nav class="c-breadcrumb" aria-label="パンくずリスト">
  <?php if (function_exists('bcn_display')) : ?>
    <div class="c-breadcrumb__list" vocab="https://schema.org/" typeof="BreadcrumbList">
      <?php bcn_display(); ?>
    </div>
  <?php endif; ?>
</nav>
