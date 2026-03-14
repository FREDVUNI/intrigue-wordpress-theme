<?php

/**
 * Template Name: Services Page
 * 
 * @package Intrigue
 */

intrigue_header();
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

    <!-- Services Grid -->
    <section class="services-grid-section">
        <div class="container">
            <?php
            // Check if using page builder or normal content
            if (have_posts()) :
                while (have_posts()) : the_post();
                    the_content();
                endwhile;
            endif;
            ?>

            <!-- Default services if no content added -->
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon">💻</div>
                    <h3>Web Development</h3>
                    <p>Custom WordPress themes, plugins, and full-stack web applications built with modern technologies.</p>
                    <a href="#" class="service-link">Learn More →</a>
                </div>

                <div class="service-card">
                    <div class="service-icon">🎨</div>
                    <h3>UI/UX Design</h3>
                    <p>Beautiful, intuitive interfaces that engage users and create memorable digital experiences.</p>
                    <a href="#" class="service-link">Learn More →</a>
                </div>

                <div class="service-card">
                    <div class="service-icon">📱</div>
                    <h3>Mobile Development</h3>
                    <p>Native and cross-platform mobile apps that perform beautifully on all devices.</p>
                    <a href="#" class="service-link">Learn More →</a>
                </div>

                <div class="service-card">
                    <div class="service-icon">🔍</div>
                    <h3>SEO Optimization</h3>
                    <p>Improve your search rankings and drive organic traffic with our SEO strategies.</p>
                    <a href="#" class="service-link">Learn More →</a>
                </div>

                <div class="service-card">
                    <div class="service-icon">📊</div>
                    <h3>Digital Strategy</h3>
                    <p>Comprehensive digital strategies that align with your business goals.</p>
                    <a href="#" class="service-link">Learn More →</a>
                </div>

                <div class="service-card">
                    <div class="service-icon">🤝</div>
                    <h3>Consulting</h3>
                    <p>Expert advice and guidance for your digital projects and challenges.</p>
                    <a href="#" class="service-link">Learn More →</a>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <h2>Ready to start your project?</h2>
            <p>Let's discuss how we can help bring your ideas to life.</p>
            <a href="<?php echo esc_url(home_url('/get-quote')); ?>" class="btn btn-primary">Get a Quote</a>
        </div>
    </section>
</div>

<?php
intrigue_footer();
