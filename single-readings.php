<?php
/**
 * Single Reading Template
 */

get_header(); ?>

<section class="section">
    <div class="container">
        <?php while (have_posts()): the_post(); ?>
            <article class="single-reading" style="max-width: 900px; margin: 0 auto;">
                <div class="section-header">
                    <h1 class="section-title"><?php the_title(); ?></h1>
                    <div class="reading-meta" style="color: var(--soft-lavender); margin-bottom: 30px; text-align: center;">
                        <span>✨ Published on <?php echo get_the_date(); ?></span>
                    </div>
                </div>

                <?php if (has_post_thumbnail()): ?>
                    <div class="reading-featured-image" style="margin-bottom: 40px; border-radius: 20px; overflow: hidden; text-align: center;">
                        <?php the_post_thumbnail('large', array('style' => 'width: 100%; max-width: 600px; height: auto; border-radius: 20px;')); ?>
                    </div>
                <?php endif; ?>

                <div class="reading-content" style="background: rgba(74, 44, 90, 0.2); padding: 40px; border-radius: 20px; border: 1px solid rgba(212, 175, 55, 0.2); margin-bottom: 40px;">
                    <div style="font-size: 1.2rem; line-height: 1.8; color: rgba(248, 246, 255, 0.95);">
                        <?php the_content(); ?>
                    </div>
                </div>

                <!-- Reading CTA -->
                <div style="text-align: center; padding: 40px; background: var(--celestial-blue); border-radius: 20px; margin-bottom: 40px;">
                    <div style="font-size: 3rem; margin-bottom: 20px;">🔮</div>
                    <h3 style="color: var(--rose-gold); margin-bottom: 20px;">Want a Personal Reading?</h3>
                    <p style="margin-bottom: 30px; max-width: 500px; margin-left: auto; margin-right: auto;">
                        While this general guidance offers cosmic insights, your personalized Destiny Matrix reading 
                        reveals the unique patterns and destiny path specific to your soul's journey.
                    </p>
                    <a href="#order" class="btn btn-primary" style="font-size: 1.2rem; padding: 18px 35px;">
                        Order Your Destiny Matrix Reading
                    </a>
                </div>

                <!-- Navigation -->
                <div class="reading-navigation" style="margin-top: 50px; padding-top: 30px; border-top: 1px solid rgba(212, 175, 55, 0.2);">
                    <div style="display: grid; grid-template-columns: 1fr auto 1fr; gap: 30px; align-items: center;">
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
                        
                        <div style="text-align: center;">
                            <a href="<?php echo get_post_type_archive_link('readings'); ?>" class="btn btn-secondary" style="padding: 12px 25px;">
                                All Readings
                            </a>
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

                <!-- Related Readings -->
                <?php
                $related_readings = new WP_Query(array(
                    'post_type' => 'readings',
                    'posts_per_page' => 3,
                    'post__not_in' => array(get_the_ID()),
                    'orderby' => 'rand'
                ));
                
                if ($related_readings->have_posts()):
                ?>
                    <div style="margin-top: 60px;">
                        <div class="section-header">
                            <h3 class="section-title" style="font-size: 2rem;">More Mystical Insights</h3>
                        </div>
                        
                        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 25px;">
                            <?php while ($related_readings->have_posts()): $related_readings->the_post(); ?>
                                <div class="celebrity-card" style="padding: 25px; text-align: center;">
                                    <?php if (has_post_thumbnail()): ?>
                                        <div style="margin-bottom: 15px; border-radius: 10px; overflow: hidden;">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail('medium', array('style' => 'width: 100%; height: 150px; object-fit: cover;')); ?>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <h4 class="celebrity-name" style="font-size: 1.1rem; margin-bottom: 10px;">
                                        <a href="<?php the_permalink(); ?>" style="color: var(--rose-gold); text-decoration: none;">
                                            <?php the_title(); ?>
                                        </a>
                                    </h4>
                                    
                                    <p style="font-size: 0.9rem; margin-bottom: 15px;">
                                        <?php echo wp_trim_words(get_the_excerpt(), 15); ?>
                                    </p>
                                    
                                    <a href="<?php the_permalink(); ?>" class="btn btn-secondary" style="padding: 8px 20px; font-size: 0.9rem;">
                                        Read More
                                    </a>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                <?php 
                endif;
                wp_reset_postdata();
                ?>
            </article>
        <?php endwhile; ?>
    </div>
</section>

<?php get_footer(); ?>
