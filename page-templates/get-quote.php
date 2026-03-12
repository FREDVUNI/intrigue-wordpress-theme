<?php

/**
 * Template Name: Get Quote Page
 */
intrigue_header(); ?>

<div class="quote-page">
    <div class="container">
        <div class="quote-header">
            <h1><?php the_title(); ?></h1>
            <?php if (has_excerpt()) : ?>
                <div class="quote-excerpt"><?php the_excerpt(); ?></div>
            <?php endif; ?>
        </div>

        <div class="quote-form-container">
            <?php
            // You can use a form plugin shortcode here
            echo do_shortcode('[contact-form-7 id="YOUR_QUOTE_FORM_ID" title="Quote request"]');

            // Or create a custom form
            ?>
            <form id="quote-request" class="quote-form" method="post">
                <div class="form-row">
                    <label for="name"><?php esc_html_e('Name *', 'intrigue'); ?></label>
                    <input type="text" id="name" name="name" required>
                </div>

                <div class="form-row">
                    <label for="email"><?php esc_html_e('Email *', 'intrigue'); ?></label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="form-row">
                    <label for="project-type"><?php esc_html_e('Project Type', 'intrigue'); ?></label>
                    <select id="project-type" name="project_type">
                        <option value="website"><?php esc_html_e('Website', 'intrigue'); ?></option>
                        <option value="design"><?php esc_html_e('Design', 'intrigue'); ?></option>
                        <option value="development"><?php esc_html_e('Development', 'intrigue'); ?></option>
                        <option value="consulting"><?php esc_html_e('Consulting', 'intrigue'); ?></option>
                    </select>
                </div>

                <div class="form-row">
                    <label for="budget"><?php esc_html_e('Budget Range', 'intrigue'); ?></label>
                    <select id="budget" name="budget">
                        <option value="<1000"><?php esc_html_e('Under $1,000', 'intrigue'); ?></option>
                        <option value="1000-5000"><?php esc_html_e('$1,000 - $5,000', 'intrigue'); ?></option>
                        <option value="5000-10000"><?php esc_html_e('$5,000 - $10,000', 'intrigue'); ?></option>
                        <option value=">10000"><?php esc_html_e('$10,000+', 'intrigue'); ?></option>
                    </select>
                </div>

                <div class="form-row">
                    <label for="message"><?php esc_html_e('Project Details *', 'intrigue'); ?></label>
                    <textarea id="message" name="message" rows="5" required></textarea>
                </div>

                <?php wp_nonce_field('quote_request_nonce', 'quote_nonce'); ?>
                <button type="submit" class="submit-button"><?php esc_html_e('Request Quote', 'intrigue'); ?></button>
            </form>
        </div>
    </div>
</div>

<?php
intrigue_footer();
