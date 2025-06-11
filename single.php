<?php
/**
 * Single post template
 */

get_header(); ?>

<section class="section">
    <div class="container">
        <?php while (have_posts()): the_post(); ?>
            <article class="single-post" style="max-width: 800px; margin: 0 auto;">
                <div class="section-header">
                    <h1 class="section-title"><?php the_title(); ?></h1>
                    <div class="post-meta" style="color: var(--soft-lavender); margin-bottom: 30px;">
                        <span>✨ Published on <?php echo get_the_date(); ?></span>
                        <?php if (get_the_category()): ?>
                            <span style="margin-left: 20px;">🔮 <?php the_category(', '); ?></span>
                        <?php endif; ?>
                    </div>
                </div>

                <?php if (has_post_thumbnail()): ?>
                    <div class="post-featured-image" style="margin-bottom: 40px; border-radius: 20px; overflow: hidden;">
                        <?php the_post_thumbnail('large', array('style' => 'width: 100%; height: auto;')); ?>
                    </div>
                <?php endif; ?>

                <div class="post-content" style="font-size: 1.1rem; line-height: 1.8; color: rgba(248, 246, 255, 0.95);">
                    <?php the_content(); ?>
                </div>

                <?php if (get_the_tags()): ?>
                    <div class="post-tags" style="margin-top: 40px; padding-top: 30px; border-top: 1px solid rgba(212, 175, 55, 0.2);">
                        <h4 style="color: var(--rose-gold); margin-bottom: 15px;">Mystical Tags:</h4>
                        <div style="display: flex; flex-wrap: wrap; gap: 10px;">
                            <?php
                            $tags = get_the_tags();
                            foreach ($tags as $tag):
                            ?>
                                <span style="background: rgba(74, 44, 90, 0.3); padding: 5px 15px; border-radius: 20px; font-size: 0.9rem; color: var(--soft-lavender);">
                                    #<?php echo $tag->name; ?>
                                </span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>

                <!-- Navigation -->
                <div class="post-navigation" style="margin-top: 50px; padding-top: 30px; border-top: 1px solid rgba(212, 175, 55, 0.2);">
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px;">
                        <div>
                            <?php
                            $prev_post = get_previous_post();
                            if ($prev_post):
                            ?>
                                <a href="<?php echo get_permalink($prev_post); ?>" class="btn btn-secondary" style="width: 100%; text-align: center;">
                                    ← Previous Reading
                                </a>
                            <?php endif; ?>
                        </div>
                        <div>
                            <?php
                            $next_post = get_next_post();
                            if ($next_post):
                            ?>
                                <a href="<?php echo get_permalink($next_post); ?>" class="btn btn-secondary" style="width: 100%; text-align: center;">
                                    Next Reading →
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <!-- Back to readings -->
                <div style="text-align: center; margin-top: 30px;">
                    <a href="<?php echo home_url('/'); ?>" class="btn btn-primary">
                        Return to Mystical Home
                    </a>
                </div>
            </article>
        <?php endwhile; ?>
    </div>
</section>

<?php get_footer(); ?>
