<?php
/**
 * Archive template for Readings post type
 */

get_header(); ?>

<section class="section">
    <div class="container">
        <div class="section-header">
            <h1 class="section-title">Mystical Reading Types</h1>
            <p>Discover the various paths to cosmic enlightenment through our specialized readings</p>
        </div>

        <?php if (have_posts()): ?>
            <div class="readings-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 30px;">
                <?php while (have_posts()): the_post(); ?>
                    <article class="celebrity-card reading-card" style="padding: 30px;">
                        <?php if (has_post_thumbnail()): ?>
                            <div class="reading-image" style="margin-bottom: 20px; border-radius: 15px; overflow: hidden;">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('medium', array('style' => 'width: 100%; height: 200px; object-fit: cover;')); ?>
                                </a>
                            </div>
                        <?php else: ?>
                            <div class="reading-image" style="margin-bottom: 20px; height: 200px; background: var(--mystic-gradient); border-radius: 15px; display: flex; align-items: center; justify-content: center; font-size: 4rem;">
                                🔮
                            </div>
                        <?php endif; ?>

                        <h3 class="celebrity-name">
                            <a href="<?php the_permalink(); ?>" style="color: var(--rose-gold); text-decoration: none;">
                                <?php the_title(); ?>
                            </a>
                        </h3>

                        <div class="reading-excerpt" style="margin-bottom: 25px;">
                            <?php the_excerpt(); ?>
                        </div>

                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <a href="<?php the_permalink(); ?>" class="btn btn-secondary" style="padding: 12px 25px;">
                                Learn More
                            </a>
                            
                            <div style="color: var(--soft-lavender); font-size: 0.9rem;">
                                <span>✨ <?php echo get_the_date(); ?></span>
                            </div>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <!-- Pagination -->
            <div style="text-align: center; margin-top: 50px;">
                <?php
                the_posts_pagination(array(
                    'prev_text' => '← Previous Readings',
                    'next_text' => 'More Readings →',
                    'before_page_number' => '<span class="meta-nav screen-reader-text">Page </span>',
                ));
                ?>
            </div>

        <?php else: ?>
            <div class="section-header" style="text-align: center;">
                <div style="font-size: 4rem; margin-bottom: 20px;">🔮</div>
                <h2>No Readings Available</h2>
                <p>The cosmic library is being updated with new mystical insights. Please check back soon.</p>
                <a href="<?php echo home_url('/'); ?>" class="btn btn-primary" style="margin-top: 20px;">
                    Return to Mystical Home
                </a>
            </div>
        <?php endif; ?>

        <!-- Call to Action -->
        <div style="text-align: center; margin-top: 60px; padding: 40px; background: rgba(30, 42, 74, 0.3); border-radius: 20px; border: 1px solid rgba(212, 175, 55, 0.2);">
            <h3 style="color: var(--rose-gold); margin-bottom: 20px;">Ready for Your Personal Reading?</h3>
            <p style="margin-bottom: 30px;">
                While these reading types offer general guidance, your personalized Destiny Matrix reading 
                reveals the unique cosmic blueprint of your soul's journey.
            </p>
            <a href="#order" class="btn btn-primary" style="font-size: 1.2rem; padding: 18px 35px;">
                Order Your Destiny Matrix Reading
            </a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
