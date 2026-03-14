<?php

/**
 * Intrigue Theme Functions
 */

// Add includes directory to template search paths
function intrigue_template_include($template)
{
    if (basename($template) === 'header.php' || basename($template) === 'footer.php') {
        $includes_template = get_template_directory() . '/includes/' . basename($template);
        if (file_exists($includes_template)) {
            return $includes_template;
        }
    }
    return $template;
}
add_filter('template_include', 'intrigue_template_include');

// Alternative: Override header/footer location with custom functions
function intrigue_header()
{
    get_template_part('includes/header');
}

function intrigue_footer()
{
    get_template_part('includes/footer');
}

/**
 * Sets up the theme and registers support for various WordPress features.
 *
 * @return void
 */
function intrigue_setup()
{
    // Add theme support
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script'));
    add_theme_support('title-tag');
    add_theme_support('align-wide'); // if using Gutenberg

    // Register menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'intrigue'),
        'footer'  => __('Footer Menu', 'intrigue'),
        'social' => __('Social Menu', 'intrigue'),
    ));

    // Set thumbnail sizes
    add_image_size('portfolio-thumb', 600, 450, true); // crop

}

add_action('after_setup_theme', 'intrigue_setup');


/**
 * Enqueues the theme's scripts and styles.
 *
 * @return void
 */
function intrigue_scripts()
{
    // Main stylesheet
    wp_enqueue_style('intrigue-main', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));

    // JavaScript
    wp_enqueue_script('intrigue-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), wp_get_theme()->get('Version'), true);
    wp_enqueue_script('intrigue-theme-toggle', get_template_directory_uri() . '/assets/js/theme-toggle.js', array(), wp_get_theme()->get('Version'), true);

    // Add this to your intrigue_scripts() function
    if (is_front_page()) {
        wp_enqueue_script('intrigue-front-page', get_template_directory_uri() . '/assets/js/front-page.js', array(), wp_get_theme()->get('Version'), true);
    }
}

add_action('wp_enqueue_scripts', 'intrigue_scripts');

/**
 * Register widget areas for the footer
 *
 * @return void
 */
function intrigue_widgets_init()
{
    // Change the loop to 4 instead of 3
    for ($i = 1; $i <= 4; $i++) {
        register_sidebar(array(
            'name'          => sprintf(__('Footer %d', 'intrigue'), $i),
            'id'            => 'footer-' . $i,
            'description'   => sprintf(__('Widget area for footer column %d', 'intrigue'), $i),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ));
    }
}
add_action('widgets_init', 'intrigue_widgets_init');

// Register settings and controls
function intrigue_customize_register($wp_customize)
{
    $wp_customize->add_setting('accent_color', array(
        'default'           => '#c44545',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'accent_color', array(
        'label'    => __('Accent Color', 'intrigue'),
        'section'  => 'colors',
    )));
}
add_action('customize_register', 'intrigue_customize_register');

// Output dynamic styles
function intrigue_customizer_css()
{
?>
    <style>
        :root {
            --accent: <?php echo esc_attr(get_theme_mod('accent_color', '#c44545')); ?>;
        }
    </style>
<?php
}
add_action('wp_head', 'intrigue_customizer_css');


// Add to your existing intrigue_customize_register function
function intrigue_homepage_customizer($wp_customize)
{
    // Hero Section
    $wp_customize->add_section('hero_section', array(
        'title'    => __('Hero Section', 'intrigue'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('hero_title', array(
        'default'           => __('Welcome to Intrigue', 'intrigue'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('hero_title', array(
        'label'    => __('Hero Title', 'intrigue'),
        'section'  => 'hero_section',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('hero_subtitle', array(
        'default'           => __('A theme for blogs, business & portfolios', 'intrigue'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('hero_subtitle', array(
        'label'    => __('Hero Subtitle', 'intrigue'),
        'section'  => 'hero_section',
        'type'     => 'textarea',
    ));

    $wp_customize->add_setting('hero_button_text', array(
        'default'           => __('Explore Work', 'intrigue'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('hero_button_text', array(
        'label'    => __('Button Text', 'intrigue'),
        'section'  => 'hero_section',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('hero_button_url', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('hero_button_url', array(
        'label'    => __('Button URL', 'intrigue'),
        'section'  => 'hero_section',
        'type'     => 'url',
    ));
}
add_action('customize_register', 'intrigue_homepage_customizer');

/**
 * Register Portfolio Custom Post Type
 */
function intrigue_register_portfolio()
{
    $labels = array(
        'name'               => __('Portfolio', 'intrigue'),
        'singular_name'      => __('Portfolio Item', 'intrigue'),
        'menu_name'          => __('Portfolio', 'intrigue'),
        'add_new'            => __('Add New', 'intrigue'),
        'add_new_item'       => __('Add New Portfolio Item', 'intrigue'),
        'edit_item'          => __('Edit Portfolio Item', 'intrigue'),
        'new_item'           => __('New Portfolio Item', 'intrigue'),
        'view_item'          => __('View Portfolio Item', 'intrigue'),
        'search_items'       => __('Search Portfolio', 'intrigue'),
        'not_found'          => __('No portfolio items found', 'intrigue'),
        'not_found_in_trash' => __('No portfolio items found in trash', 'intrigue'),
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => true,
        'rewrite'             => array('slug' => 'portfolio'),
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'taxonomies'          => array('portfolio_category'),
        'show_in_rest'        => true,
        'menu_icon'           => 'dashicons-portfolio',
        'menu_position'       => 5,
    );

    register_post_type('portfolio', $args);

    // Register Category Taxonomy
    register_taxonomy(
        'portfolio_category',
        'portfolio',
        array(
            'labels'            => array(
                'name'              => __('Portfolio Categories', 'intrigue'),
                'singular_name'     => __('Portfolio Category', 'intrigue'),
                'search_items'      => __('Search Categories', 'intrigue'),
                'all_items'         => __('All Categories', 'intrigue'),
                'parent_item'       => __('Parent Category', 'intrigue'),
                'parent_item_colon' => __('Parent Category:', 'intrigue'),
                'edit_item'         => __('Edit Category', 'intrigue'),
                'update_item'       => __('Update Category', 'intrigue'),
                'add_new_item'      => __('Add New Category', 'intrigue'),
                'new_item_name'     => __('New Category Name', 'intrigue'),
                'menu_name'         => __('Categories', 'intrigue'),
            ),
            'hierarchical'      => true,
            'public'            => true,
            'show_in_rest'      => true,
            'rewrite'           => array('slug' => 'portfolio/category'),
        )
    );
}
add_action('init', 'intrigue_register_portfolio');


/**
 * Handle Contact Form Submission
 */
function intrigue_handle_contact_form()
{
    if (isset($_POST['contact_nonce']) && wp_verify_nonce($_POST['contact_nonce'], 'contact_form_nonce')) {

        $name    = sanitize_text_field($_POST['name']);
        $email   = sanitize_email($_POST['email']);
        $subject = sanitize_text_field($_POST['subject']);
        $message = sanitize_textarea_field($_POST['message']);

        $to = get_theme_mod('contact_email', get_option('admin_email'));
        $email_subject = sprintf(__('New Contact Form Message from %s', 'intrigue'), $name);

        $body = sprintf(
            "Name: %s\nEmail: %s\nSubject: %s\n\nMessage:\n%s",
            $name,
            $email,
            $subject,
            $message
        );

        $headers = ['Content-Type: text/plain; charset=UTF-8'];

        if (wp_mail($to, $email_subject, $body, $headers)) {
            wp_redirect(add_query_arg('contact_sent', 'success', wp_get_referer()));
        } else {
            wp_redirect(add_query_arg('contact_sent', 'error', wp_get_referer()));
        }
        exit;
    }
}
add_action('admin_post_submit_contact_form', 'intrigue_handle_contact_form');
add_action('admin_post_nopriv_submit_contact_form', 'intrigue_handle_contact_form');

/**
 * Handle Quote Form Submission
 */
function intrigue_handle_quote_form()
{
    if (isset($_POST['quote_nonce']) && wp_verify_nonce($_POST['quote_nonce'], 'quote_request_nonce')) {

        $name        = sanitize_text_field($_POST['name']);
        $email       = sanitize_email($_POST['email']);
        $phone       = sanitize_text_field($_POST['phone']);
        $company     = sanitize_text_field($_POST['company']);
        $project_type = sanitize_text_field($_POST['project_type']);
        $budget      = sanitize_text_field($_POST['budget']);
        $timeline    = sanitize_text_field($_POST['timeline']);
        $message     = sanitize_textarea_field($_POST['message']);

        $to = get_theme_mod('contact_email', get_option('admin_email'));
        $subject = sprintf(__('New Quote Request from %s', 'intrigue'), $name);

        $body = sprintf(
            "Name: %s\nEmail: %s\nPhone: %s\nCompany: %s\n\n" .
                "Project Type: %s\nBudget: %s\nTimeline: %s\n\n" .
                "Message:\n%s",
            $name,
            $email,
            $phone,
            $company,
            $project_type,
            $budget,
            $timeline,
            $message
        );

        $headers = ['Content-Type: text/plain; charset=UTF-8'];

        if (wp_mail($to, $subject, $body, $headers)) {
            wp_redirect(add_query_arg('quote_sent', 'success', wp_get_referer()));
        } else {
            wp_redirect(add_query_arg('quote_sent', 'error', wp_get_referer()));
        }
        exit;
    }
}
add_action('admin_post_submit_quote_form', 'intrigue_handle_quote_form');
add_action('admin_post_nopriv_submit_quote_form', 'intrigue_handle_quote_form');

/**
 * Footer Customizer Settings
 */
function intrigue_footer_customizer($wp_customize)
{
    // Footer Section
    $wp_customize->add_section('footer_section', array(
        'title'    => __('Footer Settings', 'intrigue'),
        'priority' => 90,
    ));

    // Footer Description
    $wp_customize->add_setting('footer_description', array(
        'default'           => __('Crafting digital experiences that intrigue and inspire. Let\'s create something amazing together.', 'intrigue'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('footer_description', array(
        'label'    => __('Footer Description', 'intrigue'),
        'section'  => 'footer_section',
        'type'     => 'textarea',
    ));

    // Contact Email
    $wp_customize->add_setting('contact_email', array(
        'default'           => 'hello@intrigue.com',
        'sanitize_callback' => 'sanitize_email',
    ));

    $wp_customize->add_control('contact_email', array(
        'label'    => __('Contact Email', 'intrigue'),
        'section'  => 'footer_section',
        'type'     => 'email',
    ));

    // Contact Phone
    $wp_customize->add_setting('contact_phone', array(
        'default'           => '+1 234 567 890',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('contact_phone', array(
        'label'    => __('Contact Phone', 'intrigue'),
        'section'  => 'footer_section',
        'type'     => 'text',
    ));

    // Contact Location
    $wp_customize->add_setting('contact_location', array(
        'default'           => 'San Francisco, CA',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('contact_location', array(
        'label'    => __('Location', 'intrigue'),
        'section'  => 'footer_section',
        'type'     => 'text',
    ));
}
add_action('customize_register', 'intrigue_footer_customizer');

/**
 * Tell WordPress to look for page templates in the page-templates folder
 */
function intrigue_page_templates($template)
{
    if (is_page()) {
        $page_template = get_post_meta(get_the_ID(), '_wp_page_template', true);

        // Debug - remove after fixing
        if (current_user_can('administrator')) {
            echo "<!-- Template selected: " . $page_template . " -->";
        }

        // If using a custom template
        if ($page_template && $page_template !== 'default') {
            // Try direct path first
            $template_path = get_template_directory() . '/' . $page_template;
            if (file_exists($template_path)) {
                return $template_path;
            }

            // Try page-templates folder
            $template_path = get_template_directory() . '/page-templates/' . basename($page_template);
            if (file_exists($template_path)) {
                return $template_path;
            }
        }
    }

    return $template;
}
add_filter('template_include', 'intrigue_page_templates', 99);

/**
 * Register page templates from the page-templates folder
 */
function intrigue_register_page_templates($templates)
{
    // Get all PHP files in the page-templates folder
    $template_files = glob(get_template_directory() . '/page-templates/*.php');

    foreach ($template_files as $file) {
        // Get the template name from the file header
        $file_data = get_file_data($file, array('Template Name' => 'Template Name'));

        if (!empty($file_data['Template Name'])) {
            // Use just the filename as the key (not the full path)
            $templates[basename($file)] = $file_data['Template Name'];
        }
    }

    return $templates;
}
add_filter('theme_page_templates', 'intrigue_register_page_templates');
