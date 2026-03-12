<?php

/**
 * Template Name: Services Page
 */
intrigue_header(); ?>

<div class="services-page">
    <!-- Page Header -->
    <header class="page-header">
        <div class="container">
            <h1 class="page-title"><?php the_title(); ?></h1>
            <?php if (has_excerpt()) : ?>
                <div class="page-excerpt"><?php the_excerpt(); ?></div>
            <?php endif; ?>
        </div>
    </header>

    <!-- Services Grid -->
    <div class="services-content">
        <div class="container">
            <?php
            while (have_posts()) : the_post();
                the_content();
            endwhile;
            ?>
        </div>
    </div>
</div>

<?php
intrigue_footer();
