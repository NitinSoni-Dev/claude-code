</main><!-- #main-content -->

<!-- =============================================
     SITE FOOTER
     ============================================= -->
<footer class="site-footer" role="contentinfo">
    <div class="container">
        <div class="footer-top">

            <!-- Brand Column -->
            <div class="footer-brand">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-logo" aria-label="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
                    <div class="logo-icon" aria-hidden="true">
                        <svg width="42" height="42" viewBox="0 0 42 42" style="border-radius:8px;background:linear-gradient(135deg,#f15a24,#d14a16)">
                            <g transform="translate(9,9)" fill="white">
                                <path d="M12 2L2 7l10 5 10-5-10-5z" stroke="white" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M2 17l10 5 10-5" stroke="white" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M2 12l10 5 10-5" stroke="white" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
                            </g>
                        </svg>
                    </div>
                    <span class="footer-logo-text">Demand<span>Bridge</span></span>
                </a>

                <p class="footer-tagline">
                    <?php _e( 'Your go-to resource for B2B marketing intelligence, demand generation strategies, and actionable learning content for modern revenue teams.', 'demand-bridge' ); ?>
                </p>

                <!-- Social Links -->
                <div class="footer-social">
                    <a href="https://linkedin.com/company/demandbridge" class="social-link" target="_blank" rel="noopener" aria-label="LinkedIn">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg>
                    </a>
                    <a href="https://twitter.com/demandbridge" class="social-link" target="_blank" rel="noopener" aria-label="Twitter / X">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                    </a>
                    <a href="https://youtube.com/@demandbridge" class="social-link" target="_blank" rel="noopener" aria-label="YouTube">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.95-1.96C18.88 4 12 4 12 4s-6.88 0-8.59.46a2.78 2.78 0 0 0-1.95 1.96A29 29 0 0 0 1 12a29 29 0 0 0 .46 5.58A2.78 2.78 0 0 0 3.41 19.6C5.12 20 12 20 12 20s6.88 0 8.59-.46a2.78 2.78 0 0 0 1.95-1.95A29 29 0 0 0 23 12a29 29 0 0 0-.46-5.58z"/><polygon points="9.75,15.02 15.5,12 9.75,8.98 9.75,15.02" fill="white"/></svg>
                    </a>
                    <a href="https://instagram.com/demandbridge" class="social-link" target="_blank" rel="noopener" aria-label="Instagram">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
                    </a>
                </div>
            </div>

            <!-- Company Links -->
            <div class="footer-col">
                <h3 class="footer-col-title"><?php _e( 'Company', 'demand-bridge' ); ?></h3>
                <ul class="footer-links" role="list">
                    <li><a href="<?php echo esc_url( home_url( '/about' ) ); ?>"><?php _e( 'About Us', 'demand-bridge' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/team' ) ); ?>"><?php _e( 'Our Team', 'demand-bridge' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/careers' ) ); ?>"><?php _e( 'Careers', 'demand-bridge' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/press' ) ); ?>"><?php _e( 'Press & Media', 'demand-bridge' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/partners' ) ); ?>"><?php _e( 'Partners', 'demand-bridge' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/contact' ) ); ?>"><?php _e( 'Contact', 'demand-bridge' ); ?></a></li>
                </ul>
            </div>

            <!-- Resources Links -->
            <div class="footer-col">
                <h3 class="footer-col-title"><?php _e( 'Resources', 'demand-bridge' ); ?></h3>
                <ul class="footer-links" role="list">
                    <li><a href="<?php echo esc_url( home_url( '/blog' ) ); ?>"><?php _e( 'Blog', 'demand-bridge' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/guides' ) ); ?>"><?php _e( 'Guides & Playbooks', 'demand-bridge' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/case-studies' ) ); ?>"><?php _e( 'Case Studies', 'demand-bridge' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/reports' ) ); ?>"><?php _e( 'Industry Reports', 'demand-bridge' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/webinars' ) ); ?>"><?php _e( 'Webinars', 'demand-bridge' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/glossary' ) ); ?>"><?php _e( 'B2B Glossary', 'demand-bridge' ); ?></a></li>
                </ul>
            </div>

            <!-- Topics Links -->
            <div class="footer-col">
                <h3 class="footer-col-title"><?php _e( 'Topics', 'demand-bridge' ); ?></h3>
                <ul class="footer-links" role="list">
                    <li><a href="<?php echo esc_url( home_url( '/topic/demand-generation' ) ); ?>"><?php _e( 'Demand Generation', 'demand-bridge' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/topic/account-based-marketing' ) ); ?>"><?php _e( 'Account-Based Marketing', 'demand-bridge' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/topic/sales-enablement' ) ); ?>"><?php _e( 'Sales Enablement', 'demand-bridge' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/topic/content-strategy' ) ); ?>"><?php _e( 'Content Strategy', 'demand-bridge' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/topic/revenue-operations' ) ); ?>"><?php _e( 'Revenue Operations', 'demand-bridge' ); ?></a></li>
                    <li><a href="<?php echo esc_url( home_url( '/topic/b2b-marketing' ) ); ?>"><?php _e( 'B2B Marketing', 'demand-bridge' ); ?></a></li>
                </ul>
            </div>

        </div><!-- .footer-top -->

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <p class="footer-copy">
                &copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?>. <?php _e( 'All rights reserved.', 'demand-bridge' ); ?>
                <?php _e( 'Built for B2B excellence.', 'demand-bridge' ); ?>
            </p>
            <nav class="footer-legal" aria-label="<?php esc_attr_e( 'Legal Navigation', 'demand-bridge' ); ?>">
                <a href="<?php echo esc_url( home_url( '/privacy-policy' ) ); ?>"><?php _e( 'Privacy Policy', 'demand-bridge' ); ?></a>
                <a href="<?php echo esc_url( home_url( '/terms-of-service' ) ); ?>"><?php _e( 'Terms of Service', 'demand-bridge' ); ?></a>
                <a href="<?php echo esc_url( home_url( '/cookie-policy' ) ); ?>"><?php _e( 'Cookie Policy', 'demand-bridge' ); ?></a>
            </nav>
        </div>

    </div><!-- .container -->
</footer>

<!-- Scroll to Top Button -->
<button class="scroll-top" id="scrollTop" aria-label="<?php esc_attr_e( 'Scroll to top', 'demand-bridge' ); ?>">
    ↑
</button>

<!-- Cookie Notice -->
<div class="cookie-notice" id="cookieNotice" role="alert" aria-live="polite">
    <p class="cookie-text">
        <?php _e( 'We use cookies to enhance your experience and analyze site traffic. By continuing, you agree to our', 'demand-bridge' ); ?>
        <a href="<?php echo esc_url( home_url( '/cookie-policy' ) ); ?>"><?php _e( 'Cookie Policy', 'demand-bridge' ); ?></a>.
    </p>
    <button class="cookie-accept" id="cookieAccept"><?php _e( 'Accept', 'demand-bridge' ); ?></button>
</div>

<?php wp_footer(); ?>
</body>
</html>
