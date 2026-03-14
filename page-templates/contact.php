<?php

/**
 * Template Name: Contact Page
 * 
 * @package Intrigue
 */

intrigue_header();
?>

<div class="contact-page">
    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1 class="page-title"><?php the_title(); ?></h1>
            <?php if (has_excerpt()) : ?>
                <div class="page-excerpt"><?php the_excerpt(); ?></div>
            <?php endif; ?>
        </div>
    </section>

    <div class="container">
        <div class="contact-grid">
            <!-- Contact Form -->
            <div class="contact-form-wrapper">
                <h2>Send us a message</h2>

                <?php
                // Check if Contact Form 7 is active
                if (shortcode_exists('contact-form-7')) {
                    echo do_shortcode('[contact-form-7 title="Contact form"]');
                } else {
                ?>
                    <!-- Fallback form -->
                    <form class="contact-form" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                        <div class="form-row">
                            <label for="name">Name *</label>
                            <input type="text" id="name" name="name" required>
                        </div>

                        <div class="form-row">
                            <label for="email">Email *</label>
                            <input type="email" id="email" name="email" required>
                        </div>

                        <div class="form-row">
                            <label for="subject">Subject</label>
                            <input type="text" id="subject" name="subject">
                        </div>

                        <div class="form-row">
                            <label for="message">Message *</label>
                            <textarea id="message" name="message" rows="6" required></textarea>
                        </div>

                        <?php wp_nonce_field('contact_form_nonce', 'contact_nonce'); ?>
                        <input type="hidden" name="action" value="submit_contact_form">
                        <button type="submit" class="submit-button">Send Message</button>
                    </form>
                <?php
                }
                ?>
            </div>

            <!-- Contact Info -->
            <div class="contact-info-wrapper">
                <h2>Get in touch</h2>

                <ul class="contact-info-list">
                    <li>
                        <span class="contact-icon">📍</span>
                        <div>
                            <strong>Location</strong>
                            <p><?php echo esc_html(get_theme_mod('contact_location', 'San Francisco, CA')); ?></p>
                        </div>
                    </li>

                    <li>
                        <span class="contact-icon">✉️</span>
                        <div>
                            <strong>Email</strong>
                            <p><a href="mailto:<?php echo esc_attr(get_theme_mod('contact_email', 'hello@intrigue.com')); ?>">
                                    <?php echo esc_html(get_theme_mod('contact_email', 'hello@intrigue.com')); ?>
                                </a></p>
                        </div>
                    </li>

                    <li>
                        <span class="contact-icon">📱</span>
                        <div>
                            <strong>Phone</strong>
                            <p><a href="tel:<?php echo esc_attr(get_theme_mod('contact_phone', '+1 (234) 567-890')); ?>">
                                    <?php echo esc_html(get_theme_mod('contact_phone', '+1 (234) 567-890')); ?>
                                </a></p>
                        </div>
                    </li>
                </ul>

                <!-- Social Links -->
                <?php if (has_nav_menu('social')) : ?>
                    <div class="contact-social">
                        <h3>Follow us</h3>
                        <?php
                        wp_nav_menu([
                            'theme_location' => 'social',
                            'container'      => false,
                            'menu_class'     => 'social-links',
                            'depth'          => 1,
                        ]);
                        ?>
                    </div>
                <?php endif; ?>

                <!-- Map (optional) -->
                <div class="contact-map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d100939.99640993182!2d-122.5076411787088!3d37.75781446396398!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80859a6d00690021%3A0x4a501367f076adff!2sSan%20Francisco%2C%20CA!5e0!3m2!1sen!2sus!4v1620000000000!5m2!1sen!2sus"
                        width="100%"
                        height="250"
                        style="border:0;"
                        allowfullscreen=""
                        loading="lazy">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
intrigue_footer();
