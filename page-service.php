<?php get_header(); ?>
<main>
      <?php get_template_part('template-parts/fv'); ?>
      <?php get_template_part('template-parts/breadcrumb'); ?>
      <section class="p-serviceIntro">
        <nav class="p-serviceIntro__anker" aria-label="ページ内リンク">
          <ul class="p-serviceIntro__ankerList">
            <li class="p-serviceIntro__ankerItem">
              <a href="#purchase-support" class="p-serviceIntro__ankerLink">
                <span class="p-serviceIntro__ankerText">購入サポート</span>
                <img
                  src="<?php echo esc_url(get_theme_file_uri()); ?>/img/service/anker-arrow-icon.svg"
                  width="9"
                  height="5"
                  alt="下向き矢印アイコン"
                  class="p-serviceIntro__ankerIcon"
                />
              </a>
            </li>
            <li class="p-serviceIntro__ankerItem">
              <a href="#repair-maintenance" class="p-serviceIntro__ankerLink">
                <span class="p-serviceIntro__ankerText">修理・整備</span>
                <img
                  src="<?php echo esc_url(get_theme_file_uri()); ?>/img/service/anker-arrow-icon.svg"
                  width="9"
                  height="5"
                  alt="下向き矢印アイコン"
                  class="p-serviceIntro__ankerIcon"
                />
              </a>
            </li>
            <li class="p-serviceIntro__ankerItem">
              <a href="#inspection" class="p-serviceIntro__ankerLink">
                <span class="p-serviceIntro__ankerText">車検・点検</span>
                <img
                  src="<?php echo esc_url(get_theme_file_uri()); ?>/img/service/anker-arrow-icon.svg"
                  width="9"
                  height="5"
                  alt="下向き矢印アイコン"
                  class="p-serviceIntro__ankerIcon"
                />
              </a>
            </li>
          </ul>
        </nav>
        <h2 class="p-serviceIntro__heading">
          お客様一人一人が求める<br />
          理想のカー ライフに寄り添います
        </h2>
        <p class="p-serviceIntro__lead">
          様々な輸入車・国産車のメンテナンスのご相談から点検・整備まで、親切かつスピーディな対応を心がけ、あらゆる疑問や不安にお答えします。最新鋭の自社集中工場には、四輪アライメントをはじめ最新コンピューターと各ブランドに精通した熟練のサービススタッフを配置、フロ
          ントでは車種ブランド別の専用電話回線をご用意しております。
        </p>
      </section>

      <section class="p-serviceSection" id="purchase-support">
        <div class="p-serviceSection__row">
          <div class="p-serviceSection__body">
            <div class="p-serviceSection__head">
              <span class="p-serviceSection__number">01</span>
              <span class="p-serviceSection__divider"></span>
            </div>
            <h3 class="p-serviceSection__title">購入サポート</h3>
            <p class="p-serviceSection__lead">
              国を超え、メーカーを超え、高級の本質をお届けする特別な一台との出会いをサポートします。
            </p>
          </div>
          <div class="p-serviceSection__photo">
            <picture>
              <source
                media="(max-width: 768px)"
                srcset="<?php echo esc_url(get_theme_file_uri()); ?>/img/service/service01-photo-sp.webp"
              />
              <img
                src="<?php echo esc_url(get_theme_file_uri()); ?>/img/service/section2-photo.webp"
                width="1280"
                height="999"
                alt="白いスポーツカーの外観"
                class="p-serviceSection__photoImg"
              />
            </picture>
          </div>
        </div>
        <div class="p-serviceSection__features">
          <span class="p-serviceSection__featuresEn">FEATURES</span>
          <span class="p-serviceSection__featuresJa">特徴</span>
        </div>
        <p class="p-serviceSection__text">
          弊社は、輸入車選びのすべてを見つめ直し、新たなスタイルを提案するインポート・セレクト・ブランドです。<br />
          これまでの憧れだけや批評家の意見といったイメージで選ぶのではなく、オーナー様となる方がクルマから直接感じるリアルな感性を第一にした、最良の一台との出会いをコーディネートいたします。
        </p>
      </section>

      <section class="p-serviceSection" id="repair-maintenance">
        <div class="p-serviceSection__row">
          <div class="p-serviceSection__body">
            <div class="p-serviceSection__head">
              <span class="p-serviceSection__number">02</span>
              <span class="p-serviceSection__divider"></span>
            </div>
            <h3 class="p-serviceSection__title">修理・整備</h3>
            <p class="p-serviceSection__lead">
              高度な輸入車修理技術と数多くの修理実績、熟練の技術・設備であなたの愛車を完全に直します。
            </p>
          </div>
          <div class="p-serviceSection__photo">
            <picture>
              <source
                media="(max-width: 768px)"
                srcset="<?php echo esc_url(get_theme_file_uri()); ?>/img/service/service02-photo-sp.webp"
              />
              <img
                src="<?php echo esc_url(get_theme_file_uri()); ?>/img/service/section3-photo.webp"
                width="1280"
                height="1000"
                alt="整備士がエンジンルームを点検している様子"
                class="p-serviceSection__photoImg"
              />
            </picture>
          </div>
        </div>
        <div class="p-serviceSection__features">
          <span class="p-serviceSection__featuresEn">FEATURES</span>
          <span class="p-serviceSection__featuresJa">特徴</span>
        </div>
        <p class="p-serviceSection__text">
          弊社は、輸入車選びのすべてを見つめ直し、新たなスタイルを提案するインポート・セレクト・ブランドです。<br />
          これまでの憧れだけや批評家の意見といったイメージで選ぶのではなく、オーナー様となる方がクルマから直接感じるリアルな感性を第一にした、最良の一台との出会いをコーディネートいたします。
        </p>
      </section>

      <section class="p-serviceSection" id="inspection">
        <div class="p-serviceSection__row">
          <div class="p-serviceSection__body">
            <div class="p-serviceSection__head">
              <span class="p-serviceSection__number">03</span>
              <span class="p-serviceSection__divider"></span>
            </div>
            <h3 class="p-serviceSection__title">車検・点検</h3>
            <p class="p-serviceSection__lead">
              輸入車の取り扱いが県内トップクラス。専門の整備工場へ任せたいならわたしたちへご相談ください。
            </p>
          </div>
          <div class="p-serviceSection__photo">
            <img
              src="<?php echo esc_url(get_theme_file_uri()); ?>/img/service/section4-photo.webp"
              width="1280"
              height="1000"
              alt="整備士がホイールを点検している様子"
              class="p-serviceSection__photoImg"
            />
          </div>
        </div>
        <div class="p-serviceSection__features">
          <span class="p-serviceSection__featuresEn">FEATURES</span>
          <span class="p-serviceSection__featuresJa">特徴</span>
        </div>
        <p class="p-serviceSection__text">
          弊社は、輸入車選びのすべてを見つめ直し、新たなスタイルを提案するインポート・セレクト・ブランドです。<br />
          これまでの憧れだけや批評家の意見といったイメージで選ぶのではなく、オーナー様となる方がクルマから直接感じるリアルな感性を第一にした、最良の一台との出会いをコーディネートいたします。
        </p>
      </section>

      <?php get_template_part('template-parts/contact'); ?>
    </main>
<?php get_footer(); ?>
