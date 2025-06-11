<?php
/**
 * Search Results Template
 */

get_header(); ?>

<section class="section">
    <div class="container">
        <div class="section-header">
            <h1 class="section-title">
                <?php if (have_posts()): ?>
                    Mystical Search Results
                <?php else: ?>
                    No Cosmic Matches Found
                <?php endif; ?>
            </h1>
            <p>
                <?php if (have_posts()): ?>
                    The universe has revealed <?php echo $wp_query->found_posts; ?> insights for "<?php echo get_search_query(); ?>"
                <?php else: ?>
                    The cosmos couldn't find any matches for "<?php echo get_search_query(); ?>". Try a different mystical query.
                <?php endif; ?>
            </p>
        </div>

        <!-- Search Form -->
        <div style="max-width: 500px; margin: 0 auto 50px;">
            <form role="search" method="get" action="<?php echo home_url('/'); ?>" class="mystical-search-form">
                <div style="display: flex; gap: 10px;">
                    <input type="search" 
                           value="<?php echo get_search_query(); ?>" 
                           name="s" 
                           placeholder="Search the cosmic wisdom..." 
                           style="flex: 1; padding: 15px; border: 2px solid rgba(212, 175, 55, 0.3); border-radius: 50px; background: rgba(45, 27, 61, 0.5); color: var(--star-white); font-family: var(--font-serif);">
                    <button type="submit" class="btn btn-primary" style="border-radius: 50px; padding: 15px 25px;">
                        🔮 Search
                    </button>
                </div>
            </form>
        </div>

        <?php if (have_posts()): ?>
            <div class="search-results" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 30px;">
                <?php while (have_posts()): the_post(); ?>
                    <article class="celebrity-card search-result" style="padding: 30px;">
                        <?php if (has_post_thumbnail()): ?>
                            <div class="result-thumbnail" style="margin-bottom: 20px; border-radius: 10px; overflow: hidden;">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('medium', array('style' => 'width: 100%; height: 150px; object-fit: cover;')); ?>
                                </a>
                            </div>
                        <?php endif; ?>

                        <h3 class="celebrity-name" style="font-size: 1.3rem; margin-bottom: 10px;">
                            <a href="<?php the_permalink(); ?>" style="color: var(--rose-gold); text-decoration: none;">
                                <?php the_title(); ?>
                            </a>
                        </h3>

                        <div class="result-meta" style="margin-bottom: 15px; color: var(--soft-lavender); font-size: 0.9rem;">
                            <span>✨ <?php echo get_the_date(); ?></span>
                            <?php if (get_post_type() !== 'post'): ?>
                                <span style="margin-left: 15px;">🔮 <?php echo get_post_type_object(get_post_type())->labels->singular_name; ?></span>
                            <?php endif; ?>
                        </div>

                        <div class="celebrity-prediction" style="margin-bottom: 20px;">
                            <?php 
                            $excerpt = get_the_excerpt();
                            $search_query = get_search_query();
                            
                            // Highlight search terms in excerpt
                            if ($search_query && $excerpt) {
                                $highlighted = preg_replace('/(' . preg_quote($search_query, '/') . ')/i', '<mark style="background: var(--golden-gradient); color: var(--deep-purple); padding: 2px 4px; border-radius: 3px;">$1</mark>', $excerpt);
                                echo $highlighted;
                            } else {
                                echo $excerpt;
                            }
                            ?>
                        </div>

                        <a href="<?php the_permalink(); ?>" class="btn btn-secondary" style="padding: 10px 20px; font-size: 0.9rem;">
                            Explore Further
                        </a>
                    </article>
                <?php endwhile; ?>
            </div>

            <!-- Pagination -->
            <div style="text-align: center; margin-top: 50px;">
                <?php
                the_posts_pagination(array(
                    'prev_text' => '← Previous Insights',
                    'next_text' => 'More Revelations →',
                    'before_page_number' => '<span class="meta-nav screen-reader-text">Page </span>',
                ));
                ?>
            </div>

        <?php else: ?>
            <div class="no-results" style="text-align: center; max-width: 600px; margin: 0 auto;">
                <div style="font-size: 4rem; margin-bottom: 20px;">🔮</div>
                <h3 style="color: var(--rose-gold); margin-bottom: 20px;">The Crystal Ball is Cloudy</h3>
                <p style="margin-bottom: 30px;">
                    The mystical energies couldn't locate any content matching your search. 
                    Perhaps the universe is guiding you toward a different path?
                </p>
                
                <div style="background: rgba(74, 44, 90, 0.2); padding: 30px; border-radius: 20px; margin-bottom: 30px;">
                    <h4 style="color: var(--rose-gold); margin-bottom: 15px;">Mystical Suggestions:</h4>
                    <ul style="list-style: none; padding: 0; text-align: left;">
                        <li style="margin-bottom: 10px;">✨ Try different keywords or phrases</li>
                        <li style="margin-bottom: 10px;">🌟 Check your spelling for cosmic accuracy</li>
                        <li style="margin-bottom: 10px;">🔮 Use broader terms to expand your search</li>
                        <li>🌙 Browse our mystical categories below</li>
                    </ul>
                </div>
                
                <div style="display: flex; flex-wrap: wrap; gap: 15px; justify-content: center; margin-bottom: 30px;">
                    <a href="<?php echo home_url('/'); ?>" class="btn btn-primary">Mystical Home</a>
                    <?php if (class_exists('WooCommerce')): ?>
                        <a href="<?php echo wc_get_page_permalink('shop'); ?>" class="btn btn-secondary">Browse Readings</a>
                    <?php endif; ?>
                    <a href="#order" class="btn btn-secondary">Order Reading</a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>
