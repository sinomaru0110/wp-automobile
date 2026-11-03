<?php get_header(); ?>
<main>
      <?php get_template_part('template-parts/fv'); ?>
      <?php get_template_part('template-parts/breadcrumb'); ?>
      <section class="p-aboutIntro">
        <nav class="p-aboutIntro__anker" aria-label="ページ内リンク">
          <ul class="p-aboutIntro__ankerList">
            <li class="p-aboutIntro__ankerItem">
              <a href="#philosophy" class="p-aboutIntro__ankerLink">
                <span class="p-aboutIntro__ankerText">経営理念</span>
                <img
                  src="<?php echo esc_url(get_theme_file_uri()); ?>/img/about/anker-arrow-icon.svg"
                  width="9"
                  height="5"
                  alt="下向き矢印アイコン"
                  class="p-aboutIntro__ankerIcon"
                />
              </a>
            </li>
            <li class="p-aboutIntro__ankerItem">
              <a href="#access" class="p-aboutIntro__ankerLink">
                <span class="p-aboutIntro__ankerText">アクセス</span>
                <img
                  src="<?php echo esc_url(get_theme_file_uri()); ?>/img/about/anker-arrow-icon.svg"
                  width="9"
                  height="5"
                  alt="下向き矢印アイコン"
                  class="p-aboutIntro__ankerIcon"
                />
              </a>
            </li>
            <li class="p-aboutIntro__ankerItem">
              <a href="#companyProfile" class="p-aboutIntro__ankerLink">
                <span class="p-aboutIntro__ankerText">会社概要</span>
                <img
                  src="<?php echo esc_url(get_theme_file_uri()); ?>/img/about/anker-arrow-icon.svg"
                  width="9"
                  height="5"
                  alt="下向き矢印アイコン"
                  class="p-aboutIntro__ankerIcon"
                />
              </a>
            </li>
          </ul>
        </nav>
        <h2 class="p-aboutIntro__heading">
          国境を超え、メーカーを超え<br />
          「型にはまらない」あなただけの歓びを
        </h2>
        <p class="p-aboutIntro__lead">
          弊社は、輸入車選びのすべてを見つめ直し、新たなスタイルを提案するインポート・セレクト・ブランドです。これまでの憧れだけや批評家の意見といったイメージで選ぶのではなく、オーナー様となる方がクルマから直接感じるリアルな感性を第一にした、最良の一台との出会いをコーディネートいたします。
        </p>
      </section>
      <section class="p-aboutPhilosophy" id="philosophy">
        <div class="p-aboutPhilosophy__card">
          <div class="c-sectionTitle">
            <span class="c-sectionTitle__label">経営理念</span>
            <div class="c-sectionTitle__headingRow">
              <h2 class="c-sectionTitle__heading">Philosophy</h2>
              <span class="c-sectionTitle__line"></span>
            </div>
          </div>
          <p class="p-aboutPhilosophy__text">
            「お客様とは一生涯のお付き合い」をモットーとし、同時に社員一人一人が責任と誇り、使命感を持ち日々の仕事にやりがいと喜びを感じることができる会社を目指します。そういう「社員満足」があってこそ、本当の「お客様に満足」が可能になり、そしてお客様のご満足がさらに社員の満足を高めてくれるからです。心の豊かさは楽とかゆとりとかいうより仕事の充実感に求めねばなりません。我々は現状に満足することなく挑戦し続けます。
          </p>
          <p class="p-aboutPhilosophy__caption">代表取締役　田中太郎</p>
        </div>
        <div class="p-aboutPhilosophy__photo">
          <picture>
            <source media="(max-width: 768px)" srcset="<?php echo esc_url(get_theme_file_uri('/img/about/philosophy-photo-sp.webp')); ?>" />
            <img
              src="<?php echo esc_url(get_theme_file_uri()); ?>/img/about/philosophy-photo.webp"
              width="360"
              height="535"
              alt="代表取締役の写真"
              class="p-aboutPhilosophy__photoImg"
            />
          </picture>
        </div>
      </section>
      <section class="p-aboutAccess" id="access">
        <div class="c-sectionTitle">
          <span class="c-sectionTitle__label">アクセス</span>
          <div class="c-sectionTitle__headingRow">
            <h2 class="c-sectionTitle__heading">Access</h2>
            <span class="c-sectionTitle__line"></span>
          </div>
        </div>
        <p class="p-aboutAccess__address">
          <span class="p-aboutAccess__zip">〒000-0000</span>
          <span class="p-aboutAccess__addressText"><?php if (function_exists('the_field')) { the_field('custom-text'); } // ACF 停止中でもエラーにしない ?></span>
        </p>
        <picture>
          <source media="(max-width: 768px)" srcset="<?php echo esc_url(get_theme_file_uri()); ?>/img/about/access-map-sp.webp" />
          <img
            src="<?php echo esc_url(get_theme_file_uri()); ?>/img/about/access-map.webp"
            width="1100"
            height="400"
            alt="所在地の地図"
            class="p-aboutAccess__map"
          />
        </picture>
      </section>
      <section class="p-aboutCompanyProfile" id="companyProfile">
        <div class="p-aboutCompanyProfile__inner">
          <div class="c-sectionTitle">
            <span class="c-sectionTitle__label">会社概要</span>
            <div class="c-sectionTitle__headingRow">
              <h2 class="c-sectionTitle__heading">Company Profile</h2>
              <span class="c-sectionTitle__line"></span>
            </div>
          </div>
          <dl class="p-aboutCompanyProfile__list">
            <div class="p-aboutCompanyProfile__row">
              <dt class="p-aboutCompanyProfile__label">会社名</dt>
              <dd class="p-aboutCompanyProfile__value">株式会社Excitecode</dd>
            </div>
            <div class="p-aboutCompanyProfile__row">
              <dt class="p-aboutCompanyProfile__label">所在地</dt>
              <dd class="p-aboutCompanyProfile__value">
                <?php if (function_exists('the_field')) { the_field('custom-text'); } // ACF 停止中でもエラーにしない ?>
              </dd>
            </div>
            <div class="p-aboutCompanyProfile__row">
              <dt class="p-aboutCompanyProfile__label">設立</dt>
              <dd class="p-aboutCompanyProfile__value">2015年12月10日</dd>
            </div>
            <div class="p-aboutCompanyProfile__row">
              <dt class="p-aboutCompanyProfile__label">代表取締役</dt>
              <dd class="p-aboutCompanyProfile__value">田中　太郎</dd>
            </div>
            <div class="p-aboutCompanyProfile__row">
              <dt class="p-aboutCompanyProfile__label">事業内容</dt>
              <dd class="p-aboutCompanyProfile__value">
                自動車販売（新車、中古車）古物No.第00000000号<br />
                自動車整備（国産車、輸入車）／陸運局認証工場　認証No.0-0000<br />
                輸入車販売（自動車、自動車関連部品）<br />
                保険代理店／（ABC損害保険株式会社、DFG損害保険株式会社）
              </dd>
            </div>
          </dl>
        </div>
        <div class="p-aboutCompanyProfile__slider">
          <div class="swiper js-companySlider">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <img
                  src="<?php echo esc_url(get_theme_file_uri()); ?>/img/about/company-slide-01.webp"
                  width="480"
                  height="400"
                  alt="エンジンルーム整備の様子"
                  class="p-aboutCompanyProfile__slideImg"
                />
              </div>
              <div class="swiper-slide">
                <img
                  src="<?php echo esc_url(get_theme_file_uri()); ?>/img/about/company-slide-02.webp"
                  width="480"
                  height="400"
                  alt="スマートキーのお渡し"
                  class="p-aboutCompanyProfile__slideImg"
                />
              </div>
              <div class="swiper-slide">
                <img
                  src="<?php echo esc_url(get_theme_file_uri()); ?>/img/about/company-slide-03.webp"
                  width="480"
                  height="400"
                  alt="店内での接客の様子"
                  class="p-aboutCompanyProfile__slideImg"
                />
              </div>
              <div class="swiper-slide">
                <img
                  src="<?php echo esc_url(get_theme_file_uri()); ?>/img/about/company-slide-04.webp"
                  width="480"
                  height="400"
                  alt="納車前点検の様子"
                  class="p-aboutCompanyProfile__slideImg"
                />
              </div>
              <div class="swiper-slide">
                <img
                  src="<?php echo esc_url(get_theme_file_uri()); ?>/img/about/company-slide-05.webp"
                  width="480"
                  height="400"
                  alt="車両下部の整備の様子"
                  class="p-aboutCompanyProfile__slideImg"
                />
              </div>
              <div class="swiper-slide">
                <img
                  src="<?php echo esc_url(get_theme_file_uri()); ?>/img/about/company-slide-06.webp"
                  width="480"
                  height="400"
                  alt="仕上げのポリッシュ作業"
                  class="p-aboutCompanyProfile__slideImg"
                />
              </div>
            </div>
          </div>
        </div>
      </section>
      <?php get_template_part('template-parts/contact'); ?>
    </main>
<?php get_footer(); ?>
