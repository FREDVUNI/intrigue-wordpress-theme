<?php

/**
 * Template Name: Services Page
 * 
 * @package Intrigue
 */

intrigue_header();

// Start the loop
if (have_posts()) :
    while (have_posts()) : the_post();
?>

        <div class="services-page">
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

            <!-- Services Grid -->
            <section class="services-grid-section">
                <div class="container">
                    <div class="section-header">
                        <h2><i class="fas fa-cogs"></i> What We Offer</h2>
                        <p>Comprehensive solutions tailored to your needs</p>
                    </div>

                    <div class="services-grid">
                        <div class="service-card">
                            <div class="service-icon">
                                <i class="fas fa-code"></i>
                            </div>
                            <h3>Web Development</h3>
                            <p>Custom WordPress themes, plugins, and full-stack web applications built with modern technologies.</p>
                            <a href="#" class="service-link">Learn More <i class="fas fa-arrow-right"></i></a>
                        </div>

                        <div class="service-card">
                            <div class="service-icon">
                                <i class="fas fa-paint-brush"></i>
                            </div>
                            <h3>UI/UX Design</h3>
                            <p>Beautiful, intuitive interfaces that engage users and create memorable digital experiences.</p>
                            <a href="#" class="service-link">Learn More <i class="fas fa-arrow-right"></i></a>
                        </div>

                        <div class="service-card">
                            <div class="service-icon">
                                <i class="fas fa-mobile-alt"></i>
                            </div>
                            <h3>Mobile Development</h3>
                            <p>Native and cross-platform mobile apps that perform beautifully on all devices.</p>
                            <a href="#" class="service-link">Learn More <i class="fas fa-arrow-right"></i></a>
                        </div>

                        <div class="service-card">
                            <div class="service-icon">
                                <i class="fas fa-search"></i>
                            </div>
                            <h3>SEO Optimization</h3>
                            <p>Improve your search rankings and drive organic traffic with our SEO strategies.</p>
                            <a href="#" class="service-link">Learn More <i class="fas fa-arrow-right"></i></a>
                        </div>

                        <div class="service-card">
                            <div class="service-icon">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <h3>Digital Strategy</h3>
                            <p>Comprehensive digital strategies that align with your business goals.</p>
                            <a href="#" class="service-link">Learn More <i class="fas fa-arrow-right"></i></a>
                        </div>

                        <div class="service-card">
                            <div class="service-icon">
                                <i class="fas fa-handshake"></i>
                            </div>
                            <h3>Consulting</h3>
                            <p>Expert advice and guidance for your digital projects and challenges.</p>
                            <a href="#" class="service-link">Learn More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </section>

            <!-- CTA Section -->
            <section class="cta-section">
                <div class="container">
                    <i class="fas fa-rocket cta-icon"></i>
                    <h2>Ready to start your project?</h2>
                    <p>Let's discuss how we can help bring your ideas to life.</p>
                    <a href="<?php echo esc_url(home_url('/get-quote')); ?>" class="btn btn-primary">
                        <i class="fas fa-calculator"></i> Get a Quote
                    </a>
                </div>
            </section>
        </div>

<?php
    endwhile;
endif;

intrigue_footer();
?>