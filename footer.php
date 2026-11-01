<footer class="c-footer">
      <div class="c-footer__left">
        <div class="c-footer__top">
          <a href="/" class="c-footer__logo">
            <img
              src="<?php echo esc_url(get_theme_file_uri()); ?>/img/top/footer-logo.svg"
              width="258"
              height="180"
              alt="ExciteCode Automobile"
            />
          </a>
          <ul class="c-footer__sns">
            <li>
              <a
                href="https://www.facebook.com/"
                class="c-footer__snsLink"
                target="_blank"
                rel="noopener noreferrer"
              >
                <img
                  src="<?php echo esc_url(get_theme_file_uri()); ?>/img/top/footer-sns-facebook.svg"
                  width="22"
                  height="22"
                  class="c-footer__snsIcon c-footer__snsIcon--facebook"
                  alt="Facebook"
                />
              </a>
            </li>
            <li>
              <a
                href="https://twitter.com/"
                class="c-footer__snsLink"
                target="_blank"
                rel="noopener noreferrer"
              >
                <img
                  src="<?php echo esc_url(get_theme_file_uri()); ?>/img/top/footer-sns-twitter.svg"
                  width="22"
                  height="18"
                  class="c-footer__snsIcon c-footer__snsIcon--twitter"
                  alt="Twitter"
                />
              </a>
            </li>
            <li>
              <a
                href="https://www.instagram.com/"
                class="c-footer__snsLink"
                target="_blank"
                rel="noopener noreferrer"
              >
                <img
                  src="<?php echo esc_url(get_theme_file_uri()); ?>/img/top/footer-sns-instagram.svg"
                  width="19"
                  height="19"
                  class="c-footer__snsIcon c-footer__snsIcon--instagram"
                  alt="Instagram"
                />
              </a>
            </li>
          </ul>
        </div>
        <p class="c-footer__copyright">©<?php echo date('Y'); ?> ExciteCode Automobile</p>
      </div>
      <nav class="c-footer__nav">
        <ul class="c-footer__navList">
          <li class="c-footer__navItem">
            <a href="/index.html" class="c-footer__navLink">TOP</a>
          </li>
          <li class="c-footer__navItem">
            <a href="/about/" class="c-footer__navLink">ABOUT</a>
          </li>
          <li class="c-footer__navItem">
            <a href="/service.html" class="c-footer__navLink">SERVICE</a>
          </li>
          <li class="c-footer__navItem">
            <a href="<?php echo esc_url(get_post_type_archive_link('works')); ?>" class="c-footer__navLink">WORKS</a>
          </li>
          <li class="c-footer__navItem">
            <a href="/news/" class="c-footer__navLink">NEWS</a>
          </li>
          <li class="c-footer__navItem">
            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="c-footer__navLink">CONTACT</a>
          </li>
          <li class="c-footer__navItem">
            <a href="<?php echo esc_url(home_url('/contact/')); ?>" class="c-footer__navLink">プライバシーポリシー</a>
          </li>
        </ul>
      </nav>
    </footer>
    <?php wp_footer(); ?>
  </body>
</html>
