<?php

/**
 * Template part for displaying posts
 *
 * @package Intrigue
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>
    <!-- Post Thumbnail -->
    <?php if (has_post_thumbnail()) : ?>
        <div class="post-thumbnail">
            <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('large'); ?>
            </a>
        </div>
    <?php else : ?>
        <div class="post-thumbnail placeholder-thumbnail" style="background-image: url('https://images.unsplash.com/photo-1499750310107-5fef28a66643?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'); background-size: cover; background-position: center;">
            <a href="<?php the_permalink(); ?>">
                <span class="screen-reader-text"><?php the_title(); ?></span>
            </a>
        </div>
    <?php endif; ?>

    <!-- Post Content -->
    <div class="post-card-content">
        <div class="post-meta">
            <span class="post-category">
                <?php
                $categories = get_the_category();
                if (!empty($categories)) {
                    echo '<a href="' . esc_url(get_category_link($categories[0]->term_id)) . '">' . esc_html($categories[0]->name) . '</a>';
                }
                ?>
            </span>
            <span class="post-date">
                <i class="fas fa-calendar-alt"></i> <?php echo get_the_date(); ?>
            </span>
        </div>

        <h2 class="post-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>

        <div class="post-excerpt">
            <?php the_excerpt(); ?>
        </div>

        <div class="post-footer">
            <a href="<?php the_permalink(); ?>" class="read-more">
                Read Article <i class="fas fa-arrow-right"></i>
            </a>
            <span class="post-comments">
                <i class="fas fa-comments"></i> <?php comments_number('0', '1', '%'); ?>
            </span>
        </div>
    </div>
</article>