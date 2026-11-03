<?php
/**
 * 下層ページ共通ファーストビュー
 * ページごとに「クラス名 / 画像フォルダ / 画像alt / 英語タイトル / 日本語タイトル」を出し分ける
 */
if (is_page('about')) {
    $block    = 'p-aboutFv';
    $img_dir  = 'about';
    $alt      = '輸入車ショールームの様子';
    $title_en = 'About';
    $title_ja = '私たちについて';
} elseif (is_page('service')) {
    $block    = 'p-serviceFv';
    $img_dir  = 'service';
    $alt      = '輸入車ショールームの様子';
    $title_en = 'Service';
    $title_ja = 'サービス紹介';
} elseif (is_page('contact')) {
    $block    = 'p-contactFv';
    $img_dir  = 'contact';
    $alt      = '輸入車ショールームの様子';
    $title_en = 'Contact';
    $title_ja = 'お問い合わせ';
} elseif (is_home()) {
    $block    = 'p-newsFv';
    $img_dir  = 'news';
    $alt      = '黒い高級車の走行風景';
    $title_en = 'News';
    $title_ja = 'お知らせ';
} elseif (is_category() || is_date()) {
    // カテゴリー別・月別のお知らせ一覧（日本語タイトルにカテゴリー名・年月を出す）
    $block    = 'p-newsFv';
    $img_dir  = 'news';
    $alt      = '黒い高級車の走行風景';
    $title_en = 'News';
    if (is_category()) {
        $title_ja = single_cat_title('', false);
    } elseif (is_month()) {
        $title_ja = get_query_var('year') . '年' . (int) get_query_var('monthnum') . '月';
    } else {
        $title_ja = get_query_var('year') . '年';
    }
} elseif (is_tax('genre')) {
    $block    = 'p-worksFv';
    $img_dir  = 'works';
    $alt      = 'ショールーム内の黄色いスポーツカー';
    $title_en = 'Works';
    $title_ja = single_term_title('', false);
} elseif (is_post_type_archive('works') || is_singular('works')) {
    $block    = 'p-worksFv';
    $img_dir  = 'works';
    $alt      = 'ショールーム内の黄色いスポーツカー';
    $title_en = 'Works';
    $title_ja = '実績紹介';
} else {
    // 新しいページを追加したときの記述漏れに気付けるようにする
    $block    = 'p-aboutFv';
    $img_dir  = 'about';
    $alt      = '';
    $title_en = 'Title';
    $title_ja = '背景画像とタイトルが設定されていません';
}
?>
<section class="<?php echo esc_attr($block); ?>">
  <div class="<?php echo esc_attr($block); ?>__photo js-fvPhoto">
    <picture>
      <source
        media="(max-width: 768px)"
        srcset="<?php echo esc_url(get_theme_file_uri('/img/' . $img_dir . '/fv-photo-sp.webp')); ?>"
      />
      <img
        src="<?php echo esc_url(get_theme_file_uri('/img/' . $img_dir . '/fv-photo.webp')); ?>"
        width="1270"
        height="514"
        alt="<?php echo esc_attr($alt); ?>"
        class="<?php echo esc_attr($block); ?>__photoImg"
      />
    </picture>
  </div>
  <div class="<?php echo esc_attr($block); ?>__titleWrap js-fvTitle">
    <div class="<?php echo esc_attr($block); ?>__titleBg"></div>
    <h1 class="<?php echo esc_attr($block); ?>__title">
      <span class="<?php echo esc_attr($block); ?>__titleEn"><?php echo esc_html($title_en); ?></span>
      <span class="<?php echo esc_attr($block); ?>__titleJa"><?php echo esc_html($title_ja); ?></span>
    </h1>
  </div>
</section>
