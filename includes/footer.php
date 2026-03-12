<?php

/**
 * The footer for our theme
 */
?>
</main><!-- #primary -->

<footer id="colophon" class="site-footer">
    <!-- Footer Wave Divider (optional decorative element) -->
    <div class="footer-wave">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none">
            <path fill="currentColor" fill-opacity="1" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,154.7C960,171,1056,181,1152,170.7C1248,160,1344,128,1392,112L1440,96L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
        </svg>
    </div>

    <!-- Main Footer Content -->
    <div class="footer-main">
        <div class="container">
            <div class="footer-grid">
                <!-- Brand Column -->
                <div class="footer-brand">
                    <?php if (has_custom_logo()) : ?>
                        <div class="footer-logo">
                            <?php the_custom_logo(); ?>
                        </div>
                    <?php else : ?>
                        <div class="footer-site-title">
                            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                <?php bloginfo('name'); ?>
                            </a>
                        </div>
                    <?php endif; ?>

                    <p class="footer-description">
                        <?php echo esc_html(get_theme_mod('footer_description', 'Crafting digital experiences that intrigue and inspire. Let\'s create something amazing together.')); ?>
                    </p>

                    <!-- Social Links -->
                    <?php if (has_nav_menu('social')) : ?>
                        <div class="footer-social">
                            <h4 class="social-title"><?php esc_html_e('Connect', 'intrigue'); ?></h4>
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'social',
                                'container'      => false,
                                'menu_class'     => 'social-links',
                                'depth'          => 1,
                                'link_before'    => '<span class="screen-reader-text">',
                                'link_after'     => '</span>',
                            ));
                            ?>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Widget Area 1 -->
                <div class="footer-widget-area">
                    <?php if (is_active_sidebar('footer-1')) : ?>
                        <?php dynamic_sidebar('footer-1'); ?>
                    <?php else : ?>
                        <!-- Default content when no widgets -->
                        <div class="widget">
                            <h3 class="widget-title"><?php esc_html_e('Quick Links', 'intrigue'); ?></h3>
                            <ul>
                                <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'intrigue'); ?></a></li>
                                <li><a href="<?php echo esc_url(home_url('/services')); ?>"><?php esc_html_e('Services', 'intrigue'); ?></a></li>
                                <li><a href="<?php echo esc_url(home_url('/portfolio')); ?>"><?php esc_html_e('Portfolio', 'intrigue'); ?></a></li>
                                <li><a href="<?php echo esc_url(home_url('/blog')); ?>"><?php esc_html_e('Blog', 'intrigue'); ?></a></li>
                                <li><a href="<?php echo esc_url(home_url('/contact')); ?>"><?php esc_html_e('Contact', 'intrigue'); ?></a></li>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Widget Area 2 -->
                <div class="footer-widget-area">
                    <?php if (is_active_sidebar('footer-2')) : ?>
                        <?php dynamic_sidebar('footer-2'); ?>
                    <?php else : ?>
                        <!-- Default content when no widgets -->
                        <div class="widget">
                            <h3 class="widget-title"><?php esc_html_e('Services', 'intrigue'); ?></h3>
                            <ul>
                                <li><a href="#"><?php esc_html_e('Web Development', 'intrigue'); ?></a></li>
                                <li><a href="#"><?php esc_html_e('UI/UX Design', 'intrigue'); ?></a></li>
                                <li><a href="#"><?php esc_html_e('Brand Strategy', 'intrigue'); ?></a></li>
                                <li><a href="#"><?php esc_html_e('SEO Optimization', 'intrigue'); ?></a></li>
                                <li><a href="#"><?php esc_html_e('Consulting', 'intrigue'); ?></a></li>
                            </ul>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Widget Area 3 - Contact Info -->
                <div class="footer-widget-area">
                    <?php if (is_active_sidebar('footer-3')) : ?>
                        <?php dynamic_sidebar('footer-3'); ?>
                    <?php else : ?>
                        <!-- Default contact info -->
                        <div class="widget">
                            <h3 class="widget-title"><?php esc_html_e('Get in Touch', 'intrigue'); ?></h3>
                            <ul class="contact-info">
                                <li>
                                    <a href="mailto:<?php echo esc_attr(get_theme_mod('contact_email', 'hello@intrigue.com')); ?>">
                                        <?php echo esc_html(get_theme_mod('contact_email', 'hello@intrigue.com')); ?>
                                    </a>
                                </li>
                                <li>
                                    <a href="tel:<?php echo esc_attr(get_theme_mod('contact_phone', '+1 234 567 890')); ?>">
                                        <?php echo esc_html(get_theme_mod('contact_phone', '+1 234 567 890')); ?>
                                    </a>
                                </li>
                                <li>
                                    <span><?php echo esc_html(get_theme_mod('contact_location', 'San Francisco, CA')); ?></span>
                                </li>
                            </ul>
                        </div>

                        <!-- Newsletter Signup (optional) -->
                        <div class="widget newsletter-widget">
                            <h3 class="widget-title"><?php esc_html_e('Newsletter', 'intrigue'); ?></h3>
                            <p><?php esc_html_e('Get updates on new projects and insights.', 'intrigue'); ?></p>
                            <form class="newsletter-form" action="#" method="post">
                                <input type="email" placeholder="<?php esc_attr_e('Your email', 'intrigue'); ?>" required>
                                <button type="submit">→</button>
                            </form>
                        </div>
                    <?php endif; ?>
                </div>
            </div><!-- .footer-grid -->
        </div><!-- .container -->
    </div><!-- .footer-main -->

    <!-- Footer Bottom Bar -->
    <div class="footer-bottom">
        <div class="container">
            <div class="footer-bottom-content">
                <div class="footer-copyright">
                    &copy; <?php echo date_i18n('Y'); ?>
                    <strong><?php bloginfo('name'); ?></strong>.
                    <?php esc_html_e('All rights reserved.', 'intrigue'); ?>
                </div>

                <div class="footer-bottom-menu">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'container'      => false,
                        'menu_class'     => 'footer-bottom-links',
                        'depth'          => 1,
                        'fallback_cb'    => false,
                    ));
                    ?>
                </div>

                <div class="footer-credits">
                    <?php
                    printf(
                        esc_html__('Powered by %s', 'intrigue'),
                        '<a href="https://wordpress.org/" rel="nofollow">WordPress</a>'
                    );
                    ?>
                    <span class="sep"> | </span>
                    <?php
                    printf(
                        esc_html__('Theme: %s', 'intrigue'),
                        '<a href="' . esc_url('https://fredvuni.netlify.app/') . '">Intrigue</a>'
                    );
                    ?>
                </div>
            </div>
        </div>
    </div><!-- .footer-bottom -->

    <!-- Back to Top Button -->
    <button id="back-to-top" class="back-to-top" aria-label="<?php esc_attr_e('Back to top', 'intrigue'); ?>">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <line x1="12" y1="19" x2="12" y2="5"></line>
            <polyline points="5 12 12 5 19 12"></polyline>
        </svg>
    </button>
</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>
</body>

</html>