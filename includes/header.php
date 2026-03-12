<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#primary">
            <?php esc_html_e('Skip to content', 'intrigue'); ?>
        </a>

        <header id="masthead" class="site-header">
            <div class="header-container">
                <!-- Site Branding -->
                <div class="site-branding">
                    <?php if (has_custom_logo()) : ?>
                        <div class="site-logo">
                            <?php the_custom_logo(); ?>
                        </div>
                    <?php endif; ?>

                    <div class="site-title-wrap">
                        <?php if (is_front_page() && is_home()) : ?>
                            <h1 class="site-title">
                                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                    <?php bloginfo('name'); ?>
                                </a>
                            </h1>
                        <?php else : ?>
                            <p class="site-title">
                                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                    <?php bloginfo('name'); ?>
                                </a>
                            </p>
                        <?php endif; ?>

                        <?php
                        $intrigue_description = get_bloginfo('description', 'display');
                        if ($intrigue_description || is_customize_preview()) :
                        ?>
                            <p class="site-description"><?php echo $intrigue_description; ?></p>
                        <?php endif; ?>
                    </div>
                </div><!-- .site-branding -->

                <!-- Navigation and Controls -->
                <div class="header-controls">
                    <!-- Primary Navigation -->
                    <nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e('Primary Menu', 'intrigue'); ?>">
                        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                            <span class="toggle-icon"></span>
                            <span class="screen-reader-text"><?php esc_html_e('Menu', 'intrigue'); ?></span>
                        </button>

                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'primary',
                            'menu_id'        => 'primary-menu',
                            'container'      => false,
                            'fallback_cb'    => false,
                            'depth'          => 3,
                        ));
                        ?>
                    </nav><!-- #site-navigation -->

                    <!-- Theme Toggle Button -->
                    <button id="theme-toggle" class="theme-toggle" aria-label="<?php esc_attr_e('Toggle dark mode', 'intrigue'); ?>">
                        <span class="toggle-light" aria-hidden="true">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="12" cy="12" r="5" stroke="currentColor" stroke-width="2" />
                                <line x1="12" y1="2" x2="12" y2="4" stroke="currentColor" stroke-width="2" />
                                <line x1="12" y1="20" x2="12" y2="22" stroke="currentColor" stroke-width="2" />
                                <line x1="4" y1="4" x2="6" y2="6" stroke="currentColor" stroke-width="2" />
                                <line x1="18" y1="18" x2="20" y2="20" stroke="currentColor" stroke-width="2" />
                                <line x1="2" y1="12" x2="4" y2="12" stroke="currentColor" stroke-width="2" />
                                <line x1="20" y1="12" x2="22" y2="12" stroke="currentColor" stroke-width="2" />
                                <line x1="4" y1="20" x2="6" y2="18" stroke="currentColor" stroke-width="2" />
                                <line x1="18" y1="6" x2="20" y2="4" stroke="currentColor" stroke-width="2" />
                            </svg>
                        </span>
                        <span class="toggle-dark" aria-hidden="true">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                    </button>

                    <!-- Search Toggle (optional) -->
                    <button class="search-toggle" aria-label="<?php esc_attr_e('Toggle search', 'intrigue'); ?>">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="11" cy="11" r="8" stroke="currentColor" stroke-width="2" />
                            <line x1="21" y1="21" x2="16.65" y2="16.65" stroke="currentColor" stroke-width="2" />
                        </svg>
                    </button>
                </div><!-- .header-controls -->
            </div><!-- .header-container -->

            <!-- Search Form (hidden by default) -->
            <div class="header-search">
                <div class="search-container">
                    <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
                        <input type="search"
                            class="search-field"
                            placeholder="<?php esc_attr_e('Type your search...', 'intrigue'); ?>"
                            value="<?php echo get_search_query(); ?>"
                            name="s"
                            required />
                        <button type="submit" class="search-submit">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="11" cy="11" r="8" stroke="currentColor" stroke-width="2" />
                                <line x1="21" y1="21" x2="16.65" y2="16.65" stroke="currentColor" stroke-width="2" />
                            </svg>
                            <span class="screen-reader-text"><?php esc_html_e('Search', 'intrigue'); ?></span>
                        </button>
                    </form>
                    <button class="search-close" aria-label="<?php esc_attr_e('Close search', 'intrigue'); ?>">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <line x1="18" y1="6" x2="6" y2="18" stroke="currentColor" stroke-width="2" />
                            <line x1="6" y1="6" x2="18" y2="18" stroke="currentColor" stroke-width="2" />
                        </svg>
                    </button>
                </div>
            </div>
        </header><!-- #masthead -->

        <main id="primary" class="site-main">