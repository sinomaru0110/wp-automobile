<?php
function my_setup()
{
    add_theme_support('post-thumbnails'); // アイキャッチ画像を有効化
    add_theme_support('automatic-feed-links'); // 投稿とコメントのRSSフィードのリンクを有効化
    add_theme_support('title-tag'); // titleタグ自動生成
    add_theme_support('html5', array( // HTML5による出力
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
}
add_action('after_setup_theme', 'my_setup');

/* CSSとJavaScriptの読み込み */
/*
 * CSS・JSはすべてここで読み込む（header.php に直接書かない）
 * - Swiper は CSS と JS を同じバージョンに揃える
 * - テーマ内のファイルは更新日時をバージョンにして、更新後にブラウザのキャッシュが残らないようにする
 */
define('AUTOMOBILE_SWIPER_VERSION', '11.2.10');

function my_script_init()
{
    $theme_dir = get_template_directory();
    $theme_uri = get_template_directory_uri();
    $swiper_base = 'https://cdn.jsdelivr.net/npm/swiper@' . AUTOMOBILE_SWIPER_VERSION;

    // WordPressに含まれているjquery.jsを読み込まない
    wp_deregister_script('jquery');
    // jQueryの読み込み（URLにバージョンが含まれるので ver は付けない）
    wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.6.1.min.js', array(), null);

    // Google Fonts（Noto Sans JP / Oswald / Roboto をまとめて読み込む）
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&family=Oswald:wght@700&family=Roboto:wght@400;500;700&display=swap',
        array(),
        null
    );

    // Swiper（CSS・JS 同じバージョン）
    wp_enqueue_style('swiper', $swiper_base . '/swiper-bundle.min.css', array(), null);
    wp_enqueue_script('swiper', $swiper_base . '/swiper-bundle.min.js', array(), null, true);

    // テーマのCSS・JS
    wp_enqueue_style('style-css', $theme_uri . '/css/style.css', array('google-fonts', 'swiper'), filemtime($theme_dir . '/css/style.css'));
    wp_enqueue_script('main-js', $theme_uri . '/js/script.js', array('swiper'), filemtime($theme_dir . '/js/script.js'), true);

    // お問い合わせ（入力 → 確認 → 完了）の画面遷移は
    // プラグイン「Contact Form 7 Multi-Step Forms」で行うため、独自のJSは読み込まない
}
add_action('wp_enqueue_scripts', 'my_script_init');

/* Contact Form 7：自動で挿入される<p>・<br>を無効化 */
add_filter('wpcf7_autop_or_not', '__return_false');

function custom_posts_per_page($query)
{
    if (!is_admin() && $query->is_main_query()) {
        // カスタム投稿のスラッグを記述
        if (is_post_type_archive('works')) {
            // 表示件数を指定
            $query->set('posts_per_page', 10);
        }
    }
}
add_action('pre_get_posts', 'custom_posts_per_page');

/**
 * お知らせの絞り込みに表示するカテゴリー（トップ・お知らせ一覧で共通）
 * 管理画面「投稿 → カテゴリー」で、下記のスラッグのカテゴリーを作成すると表示されます。
 * ここに書いた順に並びます。記事が1件もないカテゴリーは表示しません。
 */
define('AUTOMOBILE_NEWS_CATEGORY_SLUGS', array(
    'topics',         // トピックス
    'event-campaign', // イベント・キャンペーン
    'stock',          // 入庫車状況
));

function automobile_get_news_categories()
{
    $categories = get_categories(array(
        'slug'       => AUTOMOBILE_NEWS_CATEGORY_SLUGS,
        'orderby'    => 'slug__in',
        'hide_empty' => true,
    ));
    return is_wp_error($categories) ? array() : $categories;
}

/** お知らせ一覧ページのURL（設定 → 表示設定 の「投稿ページ」。未設定なら /news/） */
function automobile_get_news_url()
{
    $news_page_id = (int) get_option('page_for_posts');
    return $news_page_id ? get_permalink($news_page_id) : home_url('/news/');
}

/**
 * ============================================================
 * お問い合わせ（入力 → 入力確認 → 完了）
 * 使用プラグイン：Contact Form 7 / Contact Form 7 Multi-Step Forms
 *
 * 管理画面の構成（テーマ有効時に自動で作成・更新されます）
 *  固定ページ
 *   - お問い合わせ               /contact/                   … page-contact.php
 *   - お問い合わせ（入力確認）   /contact/confirm/           … page-confirm.php（親：お問い合わせ）
 *   - お問い合わせ（完了）       /contact/confirm/complete/  … page-complete.php（親：お問い合わせ（入力確認））
 *  Contact Form 7
 *   - お問い合わせ     … 入力フォーム（multistep：First Step → /contact/confirm/）
 *   - 問い合わせ確認   … 確認フォーム（multistep：Last Step・Send Email → /contact/confirm/complete/）
 *
 * フォームを管理画面で編集した後に、ここでの自動更新で上書きされないよう
 * AUTOMOBILE_CONTACT_VERSION を上げたときだけ再設定します。
 * ============================================================
 */
define('AUTOMOBILE_CONTACT_VERSION', 3);
define('AUTOMOBILE_CONTACT_FORM_TITLE', 'お問い合わせ');
define('AUTOMOBILE_CONFIRM_FORM_TITLE', '問い合わせ確認');
define('AUTOMOBILE_MSM_PLUGIN', 'contact-form-7-multi-step-module/contact-form-7-multi-step-module.php');

/** サイト内の相対パス（例：/contact/confirm/）を返す */
function automobile_contact_path($path)
{
    return wp_make_link_relative(home_url($path));
}

/** 入力フォーム（CF7「お問い合わせ」）のフォーム内容 */
function automobile_contact_input_form()
{
    $confirm_path = automobile_contact_path('/contact/confirm/');

    return <<<FORM
<div class="p-contactForm__row">
<label for="companyName" class="p-contactForm__label">会社名<span class="p-contactForm__required">*</span>　個人の場合は「個人」と入力してください</label>
[text* companyName id:companyName class:p-contactForm__input placeholder "例）株式会社ABC"]
</div>
<div class="p-contactForm__row">
<label for="personName" class="p-contactForm__label">ご担当者名<span class="p-contactForm__required">*</span>　個人の場合は氏名を入力してください</label>
[text* personName id:personName class:p-contactForm__input placeholder "例）輸入車　太郎"]
</div>
<div class="p-contactForm__row">
<label for="tel" class="p-contactForm__label">電話番号<span class="p-contactForm__required">*</span></label>
[tel* tel id:tel class:p-contactForm__input placeholder "例）022-0000-0000"]
</div>
<div class="p-contactForm__row">
<label for="email" class="p-contactForm__label">メールアドレス<span class="p-contactForm__required">*</span></label>
[email* email id:email class:p-contactForm__input placeholder "例）abcdefghijk@excitecode.co.jp"]
</div>
<div class="p-contactForm__row">
<label for="type" class="p-contactForm__label">お問い合わせの種類<span class="p-contactForm__required">*</span></label>
[select* type id:type class:p-contactForm__select first_as_label "選択してください" "車両購入について" "修理・整備について" "車検・点検について" "その他"]
</div>
<div class="p-contactForm__row">
<label for="message" class="p-contactForm__label">お問い合わせ内容<span class="p-contactForm__required">*</span></label>
[textarea* message id:message class:p-contactForm__textarea]
</div>
<div class="p-contactForm__row">
[acceptance privacy id:privacy class:p-contactForm__checkbox]「個人情報の取り扱いについて」同意する<span class="p-contactForm__required">*</span>[/acceptance]
</div>
<div class="p-contactForm__submitWrap">
[submit class:p-contactForm__submit "確認画面へ"]
[multistep multistep-input first_step "{$confirm_path}"]
</div>
FORM;
}

/** 確認フォーム（CF7「問い合わせ確認」）のフォーム内容 */
function automobile_contact_confirm_form()
{
    $complete_path = automobile_contact_path('/contact/confirm/complete/');

    $rows = array(
        'companyName' => '会社名',
        'personName' => 'ご担当者名',
        'tel' => '電話番号',
        'email' => 'メールアドレス',
        'type' => 'お問い合わせの種類',
        'message' => 'お問い合わせ内容',
    );
    $list = '';
    foreach ($rows as $name => $label) {
        $modifier = ('message' === $name) ? ' p-contactConfirm__value--multiline' : '';
        $list .= "<div class=\"p-contactConfirm__row\">\n"
            . "<dt class=\"p-contactConfirm__label\">{$label}<span class=\"p-contactConfirm__required\">*</span></dt>\n"
            . "<dd class=\"p-contactConfirm__value{$modifier}\">[multiform \"{$name}\"]</dd>\n"
            . "</div>\n";
    }

    return <<<FORM
<p class="p-contactConfirm__title">以下の内容でよろしければ「送信する」ボタンを押してください。</p>
<dl class="p-contactConfirm__list">
{$list}</dl>
<div class="p-contactConfirm__buttons">
[previous class:p-contactConfirm__btn class:p-contactConfirm__btn--back "戻る"]
[submit class:p-contactConfirm__btn class:p-contactConfirm__btn--submit "送信する"]
</div>
[multistep multistep-confirm last_step send_email "{$complete_path}"]
FORM;
}

/** タイトルで CF7 フォームを取得（無ければ null） */
function automobile_get_cf7_form($title)
{
    $posts = get_posts(array(
        'post_type' => 'wpcf7_contact_form',
        'title' => $title,
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'orderby' => 'ID',
        'order' => 'ASC',
    ));
    if (!$posts) {
        return null;
    }

    // 同じタイトルのフォームが重複している場合は、最初のものだけ残してゴミ箱へ移動
    foreach (array_slice($posts, 1) as $duplicate) {
        wp_trash_post($duplicate->ID);
    }
    return WPCF7_ContactForm::get_instance($posts[0]->ID);
}

/** スラッグで固定ページを取得し、無ければ作成。親ページを設定して ID を返す */
function automobile_upsert_page($slug, $title, $parent_id, $update_title = true)
{
    $pages = get_posts(array(
        'post_type' => 'page',
        'name' => $slug,
        'post_status' => array('publish', 'draft', 'private'),
        'posts_per_page' => -1,
        'orderby' => 'ID',
        'order' => 'ASC',
    ));
    // 同じスラッグが複数ある場合は、目的の親ページの子を優先
    usort($pages, function ($a, $b) use ($parent_id) {
        return ((int) ($b->post_parent === $parent_id)) - ((int) ($a->post_parent === $parent_id));
    });

    if (!$pages) {
        return (int) wp_insert_post(array(
            'post_title' => $title,
            'post_name' => $slug,
            'post_status' => 'publish',
            'post_type' => 'page',
            'post_parent' => $parent_id,
            'post_content' => '',
        ));
    }

    $args = array(
        'ID' => $pages[0]->ID,
        'post_parent' => $parent_id,
        'post_status' => 'publish',
    );
    if ($update_title) {
        $args['post_title'] = $title;
    }
    wp_update_post($args);
    return (int) $pages[0]->ID;
}

/**
 * 固定ページ・CF7フォームを用意する
 */
function automobile_setup_contact()
{
    if ((int) get_option('automobile_contact_version') >= AUTOMOBILE_CONTACT_VERSION) {
        return;
    }
    if (!class_exists('WPCF7_ContactForm')) {
        return;
    }

    // 同時アクセスで二重に作成されないようロック（add_option は既存キーだと false を返す）
    $lock = get_option('automobile_contact_lock');
    if ($lock && (time() - (int) $lock) > 60) {
        delete_option('automobile_contact_lock');
    }
    if (!add_option('automobile_contact_lock', time(), '', false)) {
        return;
    }

    // 1. 固定ページ（入力 → 入力確認 → 完了 の親子関係）
    $contact_id = automobile_upsert_page('contact', 'お問い合わせ', 0, false);
    $confirm_id = automobile_upsert_page('confirm', 'お問い合わせ（入力確認）', $contact_id);
    automobile_upsert_page('complete', 'お問い合わせ（完了）', $confirm_id);

    $mail_body = "会社名: [companyName]\nご担当者名: [personName]\n電話番号: [tel]\nメールアドレス: [email]\nお問い合わせの種類: [type]\n\nお問い合わせ内容:\n[message]\n\n-- \nこのメールは [_site_title] ([_site_url]) のお問い合わせフォームから送信されました";

    // 2. 入力フォーム（First Step：メールは送信しない）
    $input = automobile_get_cf7_form(AUTOMOBILE_CONTACT_FORM_TITLE);
    if (!$input) {
        $input = WPCF7_ContactForm::get_template(array('title' => AUTOMOBILE_CONTACT_FORM_TITLE));
    }
    $properties = $input->get_properties();
    $properties['form'] = automobile_contact_input_form();
    $properties['mail']['subject'] = '[_site_title] お問い合わせ';
    $properties['mail']['additional_headers'] = 'Reply-To: [email]';
    $properties['mail']['body'] = $mail_body;
    $input->set_properties($properties);
    $input->save();

    // 3. 確認フォーム（Last Step：ここで管理者宛てメールを送信）
    $confirm = automobile_get_cf7_form(AUTOMOBILE_CONFIRM_FORM_TITLE);
    if (!$confirm) {
        $confirm = WPCF7_ContactForm::get_template(array('title' => AUTOMOBILE_CONFIRM_FORM_TITLE));
    }
    $properties = $confirm->get_properties();
    $properties['form'] = automobile_contact_confirm_form();
    // 入力画面を経由せずに確認画面を開いたときのメッセージ
    $properties['messages']['invalid_first_step'] = 'お手数ですが、お問い合わせフォームの入力画面からご入力ください。';
    $properties['mail']['subject'] = '[_site_title] お問い合わせ';
    $properties['mail']['additional_headers'] = 'Reply-To: [email]';
    $properties['mail']['body'] = $mail_body;
    $confirm->set_properties($properties);
    $confirm->save();

    // パーマリンク（親子ページ）を反映
    flush_rewrite_rules(false);

    update_option('automobile_contact_version', AUTOMOBILE_CONTACT_VERSION);
    delete_option('automobile_contact_lock');
}
add_action('init', 'automobile_setup_contact', 20);

/**
 * Contact Form 7 Multi-Step Forms を有効化する（初回のみ）
 * ※あとで手動で無効化した場合は再有効化しません
 */
function automobile_activate_multistep_plugin()
{
    if (get_option('automobile_msm_activated') || !current_user_can('activate_plugins')) {
        return;
    }
    require_once ABSPATH . 'wp-admin/includes/plugin.php';
    if (!file_exists(WP_PLUGIN_DIR . '/' . AUTOMOBILE_MSM_PLUGIN)) {
        return;
    }
    if (!is_plugin_active(AUTOMOBILE_MSM_PLUGIN)) {
        $result = activate_plugin(AUTOMOBILE_MSM_PLUGIN);
        if (is_wp_error($result)) {
            return;
        }
    }
    update_option('automobile_msm_activated', 1);
}
add_action('admin_init', 'automobile_activate_multistep_plugin');

/** プラグインが無効なときは管理画面に案内を表示 */
function automobile_multistep_notice()
{
    if (!current_user_can('activate_plugins')) {
        return;
    }
    require_once ABSPATH . 'wp-admin/includes/plugin.php';
    if (is_plugin_active('contact-form-7/wp-contact-form-7.php') && is_plugin_active(AUTOMOBILE_MSM_PLUGIN)) {
        return;
    }
    echo '<div class="notice notice-warning"><p>お問い合わせの確認画面・完了画面には「Contact Form 7」と「Contact Form 7 Multi-Step Forms」の有効化が必要です。</p></div>';
}
add_action('admin_notices', 'automobile_multistep_notice');

/** 確認画面に表示する入力値は HTML として解釈させず、テキストとして出力する */
add_filter('cf7msm_form_field_value', function ($value) {
    return is_string($value) ? esc_html($value) : $value;
});

/**
 * 404ページ：3秒後にトップページへ遷移
 */
function automobile_404_redirect()
{
    if (!is_404()) {
        return;
    }
    printf(
        '<script>setTimeout(function () { window.location.href = %s; }, 3000);</script>' . "\n",
        wp_json_encode(home_url('/'))
    );
}
add_action('wp_footer', 'automobile_404_redirect', 99);

/**
 * パンくずリスト：about / service ページは「TOP > About」「TOP > Service」と表示
 */
function automobile_is_english_breadcrumb_page()
{
    return is_page(array('about', 'service'));
}

/** 現在のページ名を英語表記（About / Service）で表示 */
function automobile_breadcrumb_title($title, $type, $id)
{
    if (automobile_is_english_breadcrumb_page() && (int) $id === get_queried_object_id()) {
        return ucfirst(get_post_field('post_name', $id));
    }
    return $title;
}
add_filter('bcn_breadcrumb_title', 'automobile_breadcrumb_title', 10, 3);

/** ホームの表示名「トップ」はプラグイン設定のテンプレートに直書きのため、テンプレート側で置き換える */
function automobile_breadcrumb_home_template($template, $type, $id)
{
    if (automobile_is_english_breadcrumb_page() && in_array('home', (array) $type, true)) {
        return str_replace('トップ', 'TOP', $template);
    }
    return $template;
}
add_filter('bcn_breadcrumb_template', 'automobile_breadcrumb_home_template', 10, 3);
