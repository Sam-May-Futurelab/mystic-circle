<?php
/**
 * General page template
 */

get_header(); ?>

<section class="section">
    <div class="container">
        <?php while (have_posts()): the_post(); ?>
            <article class="page-content" style="max-width: 800px; margin: 0 auto;">
                <div class="section-header">
                    <h1 class="section-title"><?php the_title(); ?></h1>
                </div>

                <?php if (has_post_thumbnail()): ?>
                    <div class="page-featured-image" style="margin-bottom: 40px; border-radius: 20px; overflow: hidden; text-align: center;">
                        <?php the_post_thumbnail('large', array('style' => 'width: 100%; height: auto; border-radius: 20px;')); ?>
                    </div>
                <?php endif; ?>

                <div class="page-text" style="background: rgba(74, 44, 90, 0.1); padding: 40px; border-radius: 20px; border: 1px solid rgba(212, 175, 55, 0.2);">
                    <div style="font-size: 1.1rem; line-height: 1.8; color: rgba(248, 246, 255, 0.95);">
                        <?php the_content(); ?>
                    </div>
                </div>

                <!-- Call to Action for non-home pages -->
                <?php if (!is_front_page()): ?>
                    <div style="text-align: center; margin-top: 50px; padding: 40px; background: var(--celestial-blue); border-radius: 20px;">
                        <div style="font-size: 2.5rem; margin-bottom: 20px;">✨</div>
                        <h3 style="color: var(--rose-gold); margin-bottom: 20px;">Ready to Discover Your Destiny?</h3>
                        <p style="margin-bottom: 30px;">
                            Let the cosmos reveal your unique path with a personalized Destiny Matrix reading.
                        </p>
                        <a href="#order" class="btn btn-primary" style="font-size: 1.2rem; padding: 18px 35px;">
                            Order Your Reading
                        </a>
                    </div>
                <?php endif; ?>
            </article>
        <?php endwhile; ?>
    </div>
</section>

<?php get_footer(); ?>
