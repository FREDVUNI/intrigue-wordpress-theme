<?php

/**
 * Front Page - Intrigue Theme
 * 
 * A stunning homepage for blogs, business, and portfolios
 */

intrigue_header();

$placeholders = [
    'https://images.unsplash.com/photo-1559028012-481c04fa702d?q=80&w=1200',
    'https://images.unsplash.com/photo-1558655146-d09347e92766?q=80&w=1200',
    'https://images.unsplash.com/photo-1492724441997-5dc865305da7?q=80&w=1200',
    'https://images.unsplash.com/photo-1555066931-4365d14bab8c?q=80&w=1200'
];

?>

<div class="intrigue-front-page">

    <!-- Hero Section with Animated Background -->
    <section class="hero-section">
        <div class="hero-backdrop">
            <div class="gradient-sphere"></div>
            <div class="pattern-dots"></div>
        </div>
        <div class="container">
            <div class="hero-content animate-in">
                <?php if (get_theme_mod('hero_title')) : ?>
                    <h1 class="hero-title"><?php echo esc_html(get_theme_mod('hero_title', 'Where Creativity Meets Code')); ?></h1>
                <?php else : ?>
                    <h1 class="hero-title">Where Creativity <span class="text-accent">Meets</span> Code</h1>
                <?php endif; ?>

                <?php if (get_theme_mod('hero_subtitle')) : ?>
                    <p class="hero-subtitle"><?php echo esc_html(get_theme_mod('hero_subtitle', 'Crafting digital experiences that intrigue and inspire')); ?></p>
                <?php else : ?>
                    <p class="hero-subtitle">Crafting digital experiences that intrigue and inspire</p>
                <?php endif; ?>

                <div class="hero-buttons">
                    <?php if (get_theme_mod('hero_button_text')) : ?>
                        <a href="<?php echo esc_url(get_theme_mod('hero_button_url', '#')); ?>" class="btn btn-primary">
                            <?php echo esc_html(get_theme_mod('hero_button_text', 'View Portfolio')); ?>
                        </a>
                    <?php else : ?>
                        <a href="#portfolio" class="btn btn-primary">View Portfolio</a>
                    <?php endif; ?>
                    <a href="#contact" class="btn btn-outline">Let's Talk</a>
                </div>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="scroll-indicator">
            <span class="mouse">
                <span class="wheel"></span>
            </span>
        </div>
    </section>

    <!-- Services/Expertise Section -->
    <section class="services-section" id="services">
        <div class="container">
            <div class="section-header animate-in">
                <span class="section-subtitle">What I Do</span>
                <h2 class="section-title">Expertise & <span class="text-accent">Services</span></h2>
                <p class="section-description">Turning complex problems into elegant, user-friendly solutions</p>
            </div>

            <div class="services-grid">
                <!-- Service 1 -->
                <div class="service-card animate-in">
                    <div class="service-icon">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <rect x="2" y="3" width="20" height="18" rx="2" ry="2"></rect>
                            <line x1="8" y1="9" x2="16" y2="9"></line>
                            <line x1="8" y1="13" x2="16" y2="13"></line>
                            <line x1="8" y1="17" x2="12" y2="17"></line>
                        </svg>
                    </div>
                    <h3>Web Development</h3>
                    <p>Custom WordPress themes, plugins, and full-stack web applications built with modern technologies.</p>
                    <a href="#" class="service-link">Learn More →</a>
                </div>

                <!-- Service 2 -->
                <div class="service-card animate-in" data-delay="100">
                    <div class="service-icon">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"></path>
                            <line x1="2" y1="12" x2="22" y2="12"></line>
                        </svg>
                    </div>
                    <h3>UI/UX Design</h3>
                    <p>Beautiful, intuitive interfaces that engage users and create memorable digital experiences.</p>
                    <a href="#" class="service-link">Learn More →</a>
                </div>

                <!-- Service 3 -->
                <div class="service-card animate-in" data-delay="200">
                    <div class="service-icon">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <polygon points="12 2 22 7 22 17 12 22 2 17 2 7 12 2"></polygon>
                            <line x1="12" y1="22" x2="12" y2="12"></line>
                            <polyline points="22 7 12 12 2 7"></polyline>
                        </svg>
                    </div>
                    <h3>Brand Strategy</h3>
                    <p>Comprehensive brand development that tells your story and connects with your audience.</p>
                    <a href="#" class="service-link">Learn More →</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Portfolio Section -->
    <section class="portfolio-section" id="portfolio">
        <div class="container">
            <div class="section-header animate-in">
                <span class="section-subtitle">Recent Work</span>
                <h2 class="section-title">Featured <span class="text-accent">Projects</span></h2>
                <p class="section-description">A selection of my favorite projects and collaborations</p>
            </div>

            <div class="portfolio-grid">
                <?php
                // Query portfolio items
                $portfolio_args = array(
                    'post_type' => 'portfolio',
                    'posts_per_page' => 4,
                    'meta_key' => '_thumbnail_id',
                    'ignore_sticky_posts' => 1
                );
                $portfolio_query = new WP_Query($portfolio_args);

                if ($portfolio_query->have_posts()) :
                    while ($portfolio_query->have_posts()) : $portfolio_query->the_post();
                        $categories = get_the_terms(get_the_ID(), 'portfolio_category');
                        $category_name = !empty($categories) ? $categories[0]->name : 'Design';
                ?>
                        <div class="portfolio-item animate-in">
                            <div class="portfolio-image">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('large'); ?>
                                <?php else : ?>
                                    <img src="https://images.unsplash.com/photo-1772339099064-d181a0a1df7d?q=80&w=3087&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="<?php the_title_attribute(); ?>">
                                <?php endif; ?>
                                <div class="portfolio-overlay">
                                    <div class="portfolio-content">
                                        <span class="portfolio-category"><?php echo esc_html($category_name); ?></span>
                                        <h3 class="portfolio-title"><?php the_title(); ?></h3>
                                        <a href="<?php the_permalink(); ?>" class="portfolio-link">View Project →</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                    // Show placeholder items if no portfolio
                    for ($i = 0; $i < 4; $i++) : ?>

                        <div class="portfolio-item animate-in">
                            <div class="portfolio-image">

                                <img
                                    src="<?php echo esc_url($placeholders[$i]); ?>"
                                    alt="<?php esc_attr_e('Portfolio placeholder', 'intrigue'); ?>">

                                <div class="portfolio-overlay">
                                    <div class="portfolio-content">
                                        <span class="portfolio-category">Design</span>
                                        <h3 class="portfolio-title">Project <?php echo esc_html($i + 1); ?></h3>
                                        <a href="#" class="portfolio-link">View Project →</a>
                                    </div>
                                </div>

                            </div>
                        </div>

                <?php endfor;
                endif;
                ?>
            </div>

            <div class="view-all animate-in">
                <a href="<?php echo get_post_type_archive_link('portfolio'); ?>" class="btn btn-outline">View All Projects →</a>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-item animate-in">
                    <span class="stat-number" data-target="5">0</span>
                    <span class="stat-label">Years Experience</span>
                </div>
                <div class="stat-item animate-in" data-delay="100">
                    <span class="stat-number" data-target="50">0</span>
                    <span class="stat-label">Projects Completed</span>
                </div>
                <div class="stat-item animate-in" data-delay="200">
                    <span class="stat-number" data-target="30">0</span>
                    <span class="stat-label">Happy Clients</span>
                </div>
                <div class="stat-item animate-in" data-delay="300">
                    <span class="stat-number" data-target="100">0</span>
                    <span class="stat-label">Cups of Coffee</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest Blog Posts -->
    <section class="blog-section">
        <div class="container">
            <div class="section-header animate-in">
                <span class="section-subtitle">Insights</span>
                <h2 class="section-title">Latest from the <span class="text-accent">Blog</span></h2>
                <p class="section-description">Thoughts, tutorials, and insights on design and development</p>
            </div>

            <div class="blog-grid">
                <?php
                $blog_args = array(
                    'posts_per_page' => 4,
                    'ignore_sticky_posts' => 1
                );
                $blog_query = new WP_Query($blog_args);

                if ($blog_query->have_posts()) :
                    while ($blog_query->have_posts()) : $blog_query->the_post();
                ?>
                        <article class="blog-card animate-in">
                            <div class="blog-card-image">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium'); ?>
                                <?php else : ?>
                                    <img src="https://via.placeholder.com/400x250/2a2a2a/666666?text=Blog+Post" alt="<?php the_title_attribute(); ?>">
                                <?php endif; ?>
                            </div>
                            <div class="blog-card-content">
                                <div class="blog-meta">
                                    <span class="blog-date"><?php echo get_the_date('M j, Y'); ?></span>
                                    <span class="blog-category"><?php the_category(', '); ?></span>
                                </div>
                                <h3 class="blog-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                <p class="blog-excerpt"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                                <a href="<?php the_permalink(); ?>" class="read-more">Read Article →</a>
                            </div>
                        </article>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>

            <div class="view-all animate-in">
                <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="btn btn-outline">View All Posts →</a>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section" id="contact">
        <div class="container">
            <div class="cta-content animate-in">
                <h2 class="cta-title">Ready to start your project?</h2>
                <p class="cta-text">Let's create something amazing together. Get in touch for a free consultation.</p>
                <a href="<?php echo esc_url(home_url('/get-quote')); ?>" class="btn btn-primary btn-large">Get a Free Quote</a>
            </div>
        </div>
    </section>

</div>

<?php
intrigue_footer();
?>