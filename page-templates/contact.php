<?php

/**
 * Template Name: Contact Page
 */
intrigue_header(); ?>

<div class="contact-page">
    <div class="container">
        <div class="contact-grid">
            <!-- Contact Form -->
            <div class="contact-form-wrapper">
                <h2><?php esc_html_e('Get in Touch', 'intrigue'); ?></h2>
                <?php echo do_shortcode('[contact-form-7 id="YOUR_FORM_ID" title="Contact form"]'); ?>
            </div>

            <!-- Contact Info -->
            <div class="contact-info">
                <h2><?php esc_html_e('Contact Info', 'intrigue'); ?></h2>
                <ul>
                    <li>
                        <strong><?php esc_html_e('Email:', 'intrigue'); ?></strong>
                        <a href="mailto:<?php echo esc_attr(get_theme_mod('contact_email', 'hello@example.com')); ?>">
                            <?php echo esc_html(get_theme_mod('contact_email', 'hello@example.com')); ?>
                        </a>
                    </li>
                    <li>
                        <strong><?php esc_html_e('Phone:', 'intrigue'); ?></strong>
                        <a href="tel:<?php echo esc_attr(get_theme_mod('contact_phone', '+1234567890')); ?>">
                            <?php echo esc_html(get_theme_mod('contact_phone', '+1 234 567 890')); ?>
                        </a>
                    </li>
                    <li>
                        <strong><?php esc_html_e('Location:', 'intrigue'); ?></strong>
                        <span><?php echo esc_html(get_theme_mod('contact_location', 'New York, NY')); ?></span>
                    </li>
                </ul>

                <!-- Social Links -->
                <?php if (has_nav_menu('social')) : ?>
                    <div class="social-links">
                        <h3><?php esc_html_e('Follow Me', 'intrigue'); ?></h3>
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'social',
                            'container'      => false,
                            'menu_class'     => 'social-menu',
                            'depth'          => 1,
                        ));
                        ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php
intrigue_footer();
