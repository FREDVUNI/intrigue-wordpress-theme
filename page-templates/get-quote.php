<?php

/**
 * Template Name: Get Quote Page
 * 
 * @package Intrigue
 */

intrigue_header();
?>

<div class="quote-page">
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
        <div class="quote-wrapper">
            <!-- Quote Form -->
            <div class="quote-form-container">
                <h2>Tell us about your project</h2>
                <p>Fill out the form below and we'll get back to you within 24 hours.</p>

                <?php
                // Check for form submission message
                if (isset($_GET['quote_sent'])) {
                    if ($_GET['quote_sent'] === 'success') {
                        echo '<div class="alert success">Thank you! We\'ll contact you soon.</div>';
                    } else {
                        echo '<div class="alert error">Something went wrong. Please try again.</div>';
                    }
                }
                ?>

                <form id="quote-form" class="quote-form" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                    <div class="form-row">
                        <label for="name">Full Name *</label>
                        <input type="text" id="name" name="name" required>
                    </div>

                    <div class="form-row">
                        <label for="email">Email Address *</label>
                        <input type="email" id="email" name="email" required>
                    </div>

                    <div class="form-row">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone">
                    </div>

                    <div class="form-row">
                        <label for="company">Company Name</label>
                        <input type="text" id="company" name="company">
                    </div>

                    <div class="form-row">
                        <label for="project-type">Project Type *</label>
                        <select id="project-type" name="project_type" required>
                            <option value="">Select a project type</option>
                            <option value="website">Website</option>
                            <option value="ecommerce">E-commerce Store</option>
                            <option value="mobile-app">Mobile App</option>
                            <option value="web-app">Web Application</option>
                            <option value="redesign">Website Redesign</option>
                            <option value="seo">SEO Optimization</option>
                            <option value="branding">Branding & Design</option>
                            <option value="consulting">Consulting</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <div class="form-row">
                        <label for="budget">Budget Range</label>
                        <select id="budget" name="budget">
                            <option value="">Select a budget range</option>
                            <option value="<1000">Under $1,000</option>
                            <option value="1000-5000">$1,000 - $5,000</option>
                            <option value="5000-10000">$5,000 - $10,000</option>
                            <option value="10000-25000">$10,000 - $25,000</option>
                            <option value="25000-50000">$25,000 - $50,000</option>
                            <option value=">50000">$50,000+</option>
                        </select>
                    </div>

                    <div class="form-row">
                        <label for="timeline">Timeline</label>
                        <select id="timeline" name="timeline">
                            <option value="">Select timeline</option>
                            <option value="urgent">ASAP (Urgent)</option>
                            <option value="1month">Within 1 month</option>
                            <option value="3months">1-3 months</option>
                            <option value="6months">3-6 months</option>
                            <option value="flexible">Flexible</option>
                        </select>
                    </div>

                    <div class="form-row">
                        <label for="message">Project Details *</label>
                        <textarea id="message" name="message" rows="6" required></textarea>
                    </div>

                    <?php wp_nonce_field('quote_request_nonce', 'quote_nonce'); ?>
                    <input type="hidden" name="action" value="submit_quote_form">

                    <button type="submit" class="submit-button">Request Quote</button>
                </form>
            </div>

            <!-- Sidebar Info -->
            <div class="quote-sidebar">
                <div class="info-box">
                    <h3>Why choose us?</h3>
                    <ul>
                        <li>✓ 5+ years experience</li>
                        <li>✓ 50+ projects completed</li>
                        <li>✓ 24/7 support</li>
                        <li>✓ Free consultation</li>
                        <li>✓ Money-back guarantee</li>
                    </ul>
                </div>

                <div class="info-box">
                    <h3>What happens next?</h3>
                    <ol>
                        <li>We review your request</li>
                        <li>Schedule a call to discuss</li>
                        <li>Provide detailed quote</li>
                        <li>Start the project</li>
                    </ol>
                </div>

                <div class="info-box">
                    <h3>Have questions?</h3>
                    <p>Email us at <a href="mailto:<?php echo esc_attr(get_theme_mod('contact_email', 'hello@intrigue.com')); ?>">
                            <?php echo esc_html(get_theme_mod('contact_email', 'hello@intrigue.com')); ?>
                        </a></p>
                    <p>Or call <a href="tel:<?php echo esc_attr(get_theme_mod('contact_phone', '+1 (234) 567-890')); ?>">
                            <?php echo esc_html(get_theme_mod('contact_phone', '+1 (234) 567-890')); ?>
                        </a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
intrigue_footer();
