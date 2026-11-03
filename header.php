<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta name="format-detection" content="telephone=no" />
    <!-- title・description・OGP・canonical はプラグイン「SEO SIMPLE PACK」が wp_head() で出力する -->
    <!-- ファビコンは「外観 → カスタマイズ → サイトアイコン」で設定（wp_head() で出力される） -->

    <!-- Google Fonts（読み込み自体は functions.php で行う） -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    <!-- CSS・JavaScript は functions.php の my_script_init() で読み込む -->
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header class="c-header">
      <a href="<?php echo esc_url(home_url('/')); ?>" class="c-header__logo">
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
            <a href="<?php echo esc_url(home_url('/about/')); ?>" class="c-header__navLink">ABOUT</a>
          </li>
          <li class="c-header__navItem">
            <a href="<?php echo esc_url(home_url('/service/')); ?>" class="c-header__navLink">SERVICE</a>
          </li>
          <li class="c-header__navItem">
            <a href="<?php echo esc_url(get_post_type_archive_link('works')); ?>" class="c-header__navLink">WORKS</a>
          </li>
          <li class="c-header__navItem">
            <a href="<?php echo esc_url(home_url('/news/')); ?>" class="c-header__navLink">NEWS</a>
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
<div class="c-drawer js-drawer">
      <div class="c-drawer__header">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="c-drawer__logo">
          <img
            src="<?php echo esc_url(get_theme_file_uri()); ?>/img/top/hamburger-logo.svg"
            width="114"
            height="80"
            alt="ExciteCode Automobile"
          />
        </a>
        <button
          type="button"
          class="c-drawer__close js-drawerClose"
          aria-label="メニューを閉じる"
        >
          <img
            src="<?php echo esc_url(get_theme_file_uri()); ?>/img/top/hamburger-close-icon.svg"
            width="22"
            height="22"
            alt="メニューを閉じる"
          />
        </button>
      </div>
      <nav class="c-drawer__nav">
        <ul class="c-drawer__navList">
          <li class="c-drawer__navItem">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="c-drawer__navLink">TOP</a>
          </li>
          <li class="c-drawer__navItem">
            <a href="<?php echo esc_url(home_url('/about/')); ?>" class="c-drawer__navLink">ABOUT</a>
          </li>
          <li class="c-drawer__navItem">
            <a href="<?php echo esc_url(home_url('/service/')); ?>" class="c-drawer__navLink">SERVICE</a>
          </li>
          <li class="c-drawer__navItem">
            <a href="<?php echo esc_url(get_post_type_archive_link('works')); ?>" class="c-drawer__navLink">WORKS</a>
          </li>
          <li class="c-drawer__navItem">
            <a href="<?php echo esc_url(home_url('/news/')); ?>" class="c-drawer__navLink">NEWS</a>
          </li>
          <li class="c-drawer__navItem">
            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="c-drawer__navLink">CONTACT</a>
          </li>
          <li class="c-drawer__navItem">
            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="c-drawer__navLink">プライバシーポリシー</a>
          </li>
        </ul>
      </nav>
      <div class="c-drawer__sns">
        <img
          src="<?php echo esc_url(get_theme_file_uri()); ?>/img/top/hamburger-sns-icons.svg"
          width="103"
          height="22"
          alt="SNSアイコン"
        />
      </div>
    </div>
