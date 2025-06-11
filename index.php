<?php
/**
 * The main template file for Mystic Circle theme
 */

get_header(); 

// If this is the front page and no custom front page is set, show our mystical homepage
if (is_front_page() && is_home()) {
    // Include our homepage content directly
    include(get_template_directory() . '/page-home.php');
    get_footer();
    return;
}
?>

<section class="section">
    <div class="container">
        <?php if (have_posts()): ?>
            <div class="section-header">
                <h1 class="section-title">
                    <?php
                    if (is_home() && !is_front_page()) {
                        echo 'Mystical Insights';
                    } elseif (is_search()) {
                        echo 'Search Results for: ' . get_search_query();
                    } elseif (is_category()) {
                        echo 'Category: ' . single_cat_title('', false);
                    } elseif (is_tag()) {
                        echo 'Tag: ' . single_tag_title('', false);
                    } elseif (is_archive()) {
                        the_archive_title();
                    } else {
                        echo 'Mystic Circle';
                    }
                    ?>
                </h1>
            </div>

            <div class="posts-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 30px;">
                <?php while (have_posts()): the_post(); ?>
                    <article class="celebrity-card" style="padding: 30px;">
                        <?php if (has_post_thumbnail()): ?>
                            <div class="post-thumbnail" style="margin-bottom: 20px; border-radius: 10px; overflow: hidden;">
                                <?php the_post_thumbnail('medium', array('style' => 'width: 100%; height: 200px; object-fit: cover;')); ?>
                            </div>
                        <?php endif; ?>

                        <h2 class="celebrity-name" style="font-size: 1.3rem;">
                            <a href="<?php the_permalink(); ?>" style="color: var(--rose-gold); text-decoration: none;">
                                <?php the_title(); ?>
                            </a>
                        </h2>

                        <div class="post-meta" style="margin-bottom: 15px; color: var(--soft-lavender); font-size: 0.9rem;">
                            <span>✨ <?php echo get_the_date(); ?></span>
                        </div>

                        <div class="celebrity-prediction">
                            <?php the_excerpt(); ?>
                        </div>

                        <a href="<?php the_permalink(); ?>" class="btn btn-secondary" style="margin-top: 20px; padding: 10px 20px; font-size: 0.9rem;">
                            Read More
                        </a>
                    </article>
                <?php endwhile; ?>
            </div>

            <!-- Pagination -->
            <div style="text-align: center; margin-top: 50px;">
                <?php
                the_posts_pagination(array(
                    'prev_text' => '← Previous',
                    'next_text' => 'Next →',
                    'before_page_number' => '<span class="meta-nav screen-reader-text">Page </span>',
                ));
                ?>
            </div>

        <?php else: ?>
            <div class="section-header" style="text-align: center;">
                <h1 class="section-title">Nothing Found</h1>
                <p>It seems we can't find what you're looking for. Perhaps searching can help.</p>
                
                <div style="max-width: 400px; margin: 30px auto;">
                    <?php get_search_form(); ?>
                </div>
                
                <a href="<?php echo home_url('/'); ?>" class="btn btn-primary" style="margin-top: 20px;">
                    Return to the Mystical Home
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>
