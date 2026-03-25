<?php

/**
 * Template Name: Get Quote Page
 * 
 * @package Intrigue
 */

intrigue_header();

// Start the loop
if (have_posts()) :
    while (have_posts()) : the_post();
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

            <!-- Page Content from WordPress Editor -->
            <?php if (get_the_content()) : ?>
                <section class="page-content">
                    <div class="container">
                        <?php the_content(); ?>
                    </div>
                </section>
            <?php endif; ?>

            <div class="container">
                <div class="quote-wrapper">
                    <!-- Quote Form -->
                    <div class="quote-form-container">
                        <h2><i class="fas fa-file-invoice"></i> Tell us about your project</h2>
                        <p>Fill out the form below and we'll get back to you within 24 hours.</p>

                        <?php
                        // Check for form submission message
                        if (isset($_GET['quote_sent'])) {
                            if ($_GET['quote_sent'] === 'success') {
                                echo '<div class="alert success"><i class="fas fa-check-circle"></i> Thank you! We\'ll contact you soon.</div>';
                            } else {
                                echo '<div class="alert error"><i class="fas fa-exclamation-circle"></i> Something went wrong. Please try again.</div>';
                            }
                        }
                        ?>

                        <form id="quote-form" class="quote-form" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                            <div class="form-row">
                                <label for="name"><i class="fas fa-user"></i> Full Name *</label>
                                <input type="text" id="name" name="name" required>
                            </div>

                            <div class="form-row">
                                <label for="email"><i class="fas fa-envelope"></i> Email Address *</label>
                                <input type="email" id="email" name="email" required>
                            </div>

                            <div class="form-row">
                                <label for="phone"><i class="fas fa-phone"></i> Phone Number</label>
                                <input type="tel" id="phone" name="phone">
                            </div>

                            <div class="form-row">
                                <label for="company"><i class="fas fa-building"></i> Company Name</label>
                                <input type="text" id="company" name="company">
                            </div>

                            <div class="form-row">
                                <label for="project-type"><i class="fas fa-tasks"></i> Project Type *</label>
                                <select id="project-type" name="project_type" required>
                                    <option value="">Select a project type</option>
                                    <option value="website">🌐 Website</option>
                                    <option value="ecommerce">🛒 E-commerce Store</option>
                                    <option value="mobile-app">📱 Mobile App</option>
                                    <option value="web-app">💻 Web Application</option>
                                    <option value="redesign">🔄 Website Redesign</option>
                                    <option value="seo">🔍 SEO Optimization</option>
                                    <option value="branding">🎨 Branding & Design</option>
                                    <option value="consulting">🤝 Consulting</option>
                                    <option value="other">📌 Other</option>
                                </select>
                            </div>

                            <div class="form-row">
                                <label for="budget"><i class="fas fa-dollar-sign"></i> Budget Range</label>
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
                                <label for="timeline"><i class="fas fa-calendar-alt"></i> Timeline</label>
                                <select id="timeline" name="timeline">
                                    <option value="">Select timeline</option>
                                    <option value="urgent">⚡ ASAP (Urgent)</option>
                                    <option value="1month">📅 Within 1 month</option>
                                    <option value="3months">📅 1-3 months</option>
                                    <option value="6months">📅 3-6 months</option>
                                    <option value="flexible">🔄 Flexible</option>
                                </select>
                            </div>

                            <div class="form-row">
                                <label for="message"><i class="fas fa-comment"></i> Project Details *</label>
                                <textarea id="message" name="message" rows="6" required></textarea>
                            </div>

                            <?php wp_nonce_field('quote_request_nonce', 'quote_nonce'); ?>
                            <input type="hidden" name="action" value="submit_quote_form">

                            <button type="submit" class="submit-button">
                                <i class="fas fa-paper-plane"></i> Request Quote
                            </button>
                        </form>
                    </div>

                    <!-- Sidebar Info -->
                    <div class="quote-sidebar">
                        <div class="info-box">
                            <h3><i class="fas fa-star"></i> Why choose us?</h3>
                            <ul>
                                <li><i class="fas fa-check-circle"></i> 5+ years experience</li>
                                <li><i class="fas fa-check-circle"></i> 50+ projects completed</li>
                                <li><i class="fas fa-check-circle"></i> 24/7 support</li>
                                <li><i class="fas fa-check-circle"></i> Free consultation</li>
                                <li><i class="fas fa-check-circle"></i> Money-back guarantee</li>
                            </ul>
                        </div>

                        <div class="info-box">
                            <h3><i class="fas fa-clock"></i> What happens next?</h3>
                            <ol>
                                <li>We review your request</li>
                                <li>Schedule a call to discuss</li>
                                <li>Provide detailed quote</li>
                                <li>Start the project</li>
                            </ol>
                        </div>

                        <div class="info-box">
                            <h3><i class="fas fa-question-circle"></i> Have questions?</h3>
                            <p><i class="fas fa-envelope"></i> <a href="mailto:<?php echo esc_attr(get_theme_mod('contact_email', 'hello@intrigue.com')); ?>">
                                    <?php echo esc_html(get_theme_mod('contact_email', 'hello@intrigue.com')); ?>
                                </a></p>
                            <p><i class="fas fa-phone"></i> <a href="tel:<?php echo esc_attr(get_theme_mod('contact_phone', '+1 (234) 567-890')); ?>">
                                    <?php echo esc_html(get_theme_mod('contact_phone', '+1 (234) 567-890')); ?>
                                </a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php
    endwhile;
endif;

intrigue_footer();
?>