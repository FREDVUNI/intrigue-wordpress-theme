<?php

/**
 * The single post template
 *
 * @package Intrigue
 */

intrigue_header();
?>

<div class="single-post">
    <?php while (have_posts()) : the_post(); ?>

        <!-- Hero Section with Featured Image -->
        <section class="post-hero"
            <?php if (has_post_thumbnail()) : ?>
            style="background-image: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('<?php echo get_the_post_thumbnail_url(null, 'full'); ?>'); background-size: cover; background-position: center;"
            <?php else : ?>
            style="background-image: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('https://images.unsplash.com/photo-1499750310107-5fef28a66643?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80'); background-size: cover;"
            <?php endif; ?>>
            <div class="container">
                <div class="post-hero-content">
                    <!-- Categories -->
                    <div class="post-categories">
                        <?php
                        $categories = get_the_category();
                        if (!empty($categories)) {
                            foreach ($categories as $category) {
                                echo '<a href="' . esc_url(get_category_link($category->term_id)) . '" class="category-link">' . esc_html($category->name) . '</a>';
                            }
                        }
                        ?>
                    </div>

                    <!-- Title -->
                    <h1 class="post-title"><?php the_title(); ?></h1>

                    <!-- Meta Info -->
                    <div class="post-meta">
                        <span class="meta-item">
                            <i class="fas fa-user"></i> <?php the_author(); ?>
                        </span>
                        <span class="meta-item">
                            <i class="fas fa-calendar-alt"></i> <?php echo get_the_date('F j, Y'); ?>
                        </span>
                        <span class="meta-item">
                            <i class="fas fa-clock"></i> <?php echo estimated_reading_time(); ?> min read
                        </span>
                        <span class="meta-item">
                            <i class="fas fa-comments"></i> <?php comments_number('0 Comments', '1 Comment', '% Comments'); ?>
                        </span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main Content Area -->
        <div class="container">
            <div class="post-content-wrapper">
                <!-- Main Post Content -->
                <article class="post-main-content">
                    <!-- Post Content -->
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>

                    <!-- Pagination for multi-page posts -->
                    <?php
                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . esc_html__('Pages:', 'intrigue'),
                        'after'  => '</div>',
                    ));
                    ?>

                    <!-- Tags -->
                    <?php if (has_tag()) : ?>
                        <div class="post-tags">
                            <span class="tags-label"><i class="fas fa-tags"></i> Tags:</span>
                            <?php the_tags('', ' ', ''); ?>
                        </div>
                    <?php endif; ?>

                    <!-- Share Box -->
                    <div class="share-box">
                        <span class="share-label">Share this post:</span>
                        <div class="share-buttons">
                            <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>" target="_blank" class="share-btn twitter" aria-label="Share on Twitter">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank" class="share-btn facebook" aria-label="Share on Facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(get_permalink()); ?>" target="_blank" class="share-btn linkedin" aria-label="Share on LinkedIn">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="mailto:?subject=<?php echo urlencode(get_the_title()); ?>&body=<?php echo urlencode(get_permalink()); ?>" class="share-btn email" aria-label="Share via Email">
                                <i class="fas fa-envelope"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Author Box -->
                    <div class="author-box">
                        <div class="author-avatar">
                            <?php echo get_avatar(get_the_author_meta('ID'), 100); ?>
                        </div>
                        <div class="author-info">
                            <h4 class="author-name"><?php the_author(); ?></h4>
                            <p class="author-bio"><?php echo get_the_author_meta('description'); ?></p>
                            <div class="author-meta">
                                <span class="author-posts">
                                    <i class="fas fa-pencil-alt"></i>
                                    <?php echo count_user_posts(get_the_author_meta('ID')); ?> Articles
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Post Navigation -->
                    <div class="post-navigation">
                        <div class="nav-previous">
                            <?php
                            $prev_post = get_previous_post();
                            if (!empty($prev_post)) : ?>
                                <a href="<?php echo get_permalink($prev_post->ID); ?>" class="nav-link">
                                    <span class="nav-label"><i class="fas fa-arrow-left"></i> Previous Post</span>
                                    <span class="nav-title"><?php echo get_the_title($prev_post->ID); ?></span>
                                </a>
                            <?php endif; ?>
                        </div>
                        <div class="nav-next">
                            <?php
                            $next_post = get_next_post();
                            if (!empty($next_post)) : ?>
                                <a href="<?php echo get_permalink($next_post->ID); ?>" class="nav-link">
                                    <span class="nav-label">Next Post <i class="fas fa-arrow-right"></i></span>
                                    <span class="nav-title"><?php echo get_the_title($next_post->ID); ?></span>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Related Posts -->
                    <div class="related-posts">
                        <h3 class="related-title">You Might Also Like</h3>
                        <div class="related-grid">
                            <?php
                            $categories = wp_get_post_categories(get_the_ID());
                            $related_args = array(
                                'category__in' => $categories,
                                'post__not_in' => array(get_the_ID()),
                                'posts_per_page' => 3,
                                'orderby' => 'rand'
                            );
                            $related_query = new WP_Query($related_args);

                            if ($related_query->have_posts()) :
                                while ($related_query->have_posts()) : $related_query->the_post(); ?>
                                    <div class="related-card">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <div class="related-image">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php the_post_thumbnail('medium'); ?>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                        <div class="related-content">
                                            <h4 class="related-card-title">
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </h4>
                                            <span class="related-date"><?php echo get_the_date('M j, Y'); ?></span>
                                        </div>
                                    </div>
                            <?php endwhile;
                                wp_reset_postdata();
                            endif;
                            ?>
                        </div>
                    </div>

                    <!-- Comments Section -->
                    <div class="comments-section">
                        <?php
                        // If comments are open or we have at least one comment
                        if (comments_open() || get_comments_number()) :
                            comments_template();
                        endif;
                        ?>
                    </div>
                </article>

                <!-- Sidebar -->
                <aside class="post-sidebar">
                    <?php if (is_active_sidebar('blog-sidebar')) : ?>
                        <?php dynamic_sidebar('blog-sidebar'); ?>
                    <?php else : ?>
                        <!-- Table of Contents (auto-generated) -->
                        <div class="sidebar-widget toc-widget">
                            <h3 class="widget-title"><i class="fas fa-list"></i> In This Article</h3>
                            <div class="toc"></div>
                        </div>

                        <!-- Recent Posts -->
                        <div class="sidebar-widget recent-posts-widget">
                            <h3 class="widget-title"><i class="fas fa-clock"></i> Recent Posts</h3>
                            <ul>
                                <?php
                                $recent_posts = wp_get_recent_posts(array(
                                    'numberposts' => 5,
                                    'post_status' => 'publish'
                                ));
                                foreach ($recent_posts as $recent) : ?>
                                    <li>
                                        <a href="<?php echo get_permalink($recent['ID']); ?>">
                                            <?php echo $recent['post_title']; ?>
                                        </a>
                                        <span class="post-date-small"><?php echo get_the_date('M j', $recent['ID']); ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                        <!-- Categories -->
                        <div class="sidebar-widget categories-widget">
                            <h3 class="widget-title"><i class="fas fa-folder"></i> Categories</h3>
                            <ul>
                                <?php wp_list_categories(array(
                                    'title_li' => '',
                                    'show_count' => true,
                                    'orderby' => 'count',
                                    'order' => 'DESC'
                                )); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                </aside>
            </div>
        </div>

    <?php endwhile; ?>
</div>

<?php
// Add reading time estimation function
function estimated_reading_time()
{
    $content = get_post_field('post_content', get_the_ID());
    $word_count = str_word_count(strip_tags($content));
    $reading_time = ceil($word_count / 200); // Average reading speed: 200 words per minute

    if ($reading_time < 1) {
        return 1;
    }
    return $reading_time;
}

intrigue_footer();
?>