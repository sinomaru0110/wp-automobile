<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta name="format-detection" content="telephone=no" />
    <!-- meta情報 -->
    <title>ExciteCode Automobile</title>
    <meta name="description" content="ExciteCode Automobileは、輸入車選びのすべてを見つめ直し新たなスタイルを提案するインポート・セレクト・ブランドです。輸入車の購入サポートから修理・整備まで、最良の一台との出会いとカーライフをサポートします。" />
    <meta name="keywords" content="輸入車,外車,購入サポート,修理,整備,車検,ExciteCode Automobile" />
    <!-- ogp -->
    <meta property="og:title" content="ExciteCode Automobile" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://www.webpowerno1.com/" />
    <meta property="og:image" content="https://www.webpowerno1.com/img/top/fv-slide-01.png" />
    <meta property="og:site_name" content="ExciteCode Automobile" />
    <meta property="og:description" content="ExciteCode Automobileは、輸入車選びのすべてを見つめ直し新たなスタイルを提案するインポート・セレクト・ブランドです。輸入車の購入サポートから修理・整備まで、最良の一台との出会いとカーライフをサポートします。" />
    <meta property="og:locale" content="ja_JP" />
    <meta name="twitter:card" content="summary_large_image" />
    <link rel="canonical" href="https://www.webpowerno1.com/" />
    <!-- ファビコン -->
    <link rel="icon" href="<?php echo esc_url( get_theme_file_uri( 'img/top/header-logo.svg' ) ); ?>" type="image/svg+xml" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&family=Oswald:wght@700&family=Roboto:wght@500&display=swap"
      rel="stylesheet"
    />

    <!-- css -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11.2.10/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/style.css" />

    <!-- JavaScript -->
    <script src="<?php echo esc_url( get_theme_file_uri( 'js/script.js' ) ); ?>?ver=1.0.2" defer></script>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header class="c-header">
      <a href="/" class="c-header__logo">
        <img
          src="<?php echo esc_url(get_theme_file_uri()); ?>/img/top/header-logo.svg"
          width="258"
          height="180"
          alt="ExciteCode Automobile"
        />
      </a>
      <nav class="c-header__nav">
        <ul class="c-header__navList">
          <li class="c-header__navItem">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="c-header__navLink">TOP</a>
          </li>
          <li class="c-header__navItem">
            <a href="/about/" class="c-header__navLink">ABOUT</a>
          </li>
          <li class="c-header__navItem">
            <a href="/service/" class="c-header__navLink">SERVICE</a>
          </li>
          <li class="c-header__navItem">
            <a href="<?php echo esc_url(get_post_type_archive_link('works')); ?>" class="c-header__navLink">WORKS</a>
          </li>
          <li class="c-header__navItem">
            <a href="/news/" class="c-header__navLink">NEWS</a>
          </li>
        </ul>
        <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="c-header__contact">
          <img
            src="<?php echo esc_url(get_theme_file_uri()); ?>/img/top/header-mail-icon.svg"
            width="22"
            height="18"
            alt="メールアイコン"
            class="c-header__contactIcon"
          />
          <span class="c-header__contactText">CONTACT</span>
        </a>
      </nav>
      <button
        type="button"
        class="c-header__hamburger js-drawerOpen"
        aria-label="メニューを開く"
      >
        <img
          src="<?php echo esc_url(get_theme_file_uri()); ?>/img/top/header-hamburger.svg"
          width="25"
          height="15"
          alt="メニューを開く"
          class="c-header__hamburgerIcon"
        />
      </button>
    </header>