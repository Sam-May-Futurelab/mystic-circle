<?php
/**
 * WooCommerce Shop Template
 */

get_header(); ?>

<section class="section">
    <div class="container">
        <div class="section-header">
            <h1 class="section-title">Mystical Readings</h1>
            <p>Choose your path to cosmic enlightenment</p>
        </div>

        <?php if (woocommerce_product_loop()): ?>
            <?php woocommerce_product_loop_start(); ?>
            
            <div class="products-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px;">
                <?php while (have_posts()): the_post(); ?>
                    <div class="celebrity-card product-card" style="padding: 30px; text-align: center;">
                        <div class="product-image" style="margin-bottom: 20px;">
                            <?php if (has_post_thumbnail()): ?>
                                <?php the_post_thumbnail('medium', array('style' => 'width: 100%; height: 200px; object-fit: cover; border-radius: 10px;')); ?>
                            <?php else: ?>
                                <div style="width: 100%; height: 200px; background: var(--mystic-gradient); border-radius: 10px; display: flex; align-items: center; justify-content: center; font-size: 3rem;">
                                    🔮
                                </div>
                            <?php endif; ?>
                        </div>
                        
                        <h3 class="celebrity-name">
                            <a href="<?php the_permalink(); ?>" style="color: var(--rose-gold); text-decoration: none;">
                                <?php the_title(); ?>
                            </a>
                        </h3>
                        
                        <div class="price" style="font-size: 1.5rem; color: var(--rose-gold); margin: 15px 0;">
                            <?php woocommerce_template_loop_price(); ?>
                        </div>
                        
                        <div class="celebrity-prediction" style="margin-bottom: 20px;">
                            <?php the_excerpt(); ?>
                        </div>
                        
                        <a href="<?php the_permalink(); ?>" class="btn btn-primary" style="width: 100%;">
                            View Details
                        </a>
                    </div>
                <?php endwhile; ?>
            </div>
            
            <?php woocommerce_product_loop_end(); ?>
            
            <!-- Pagination -->
            <div style="text-align: center; margin-top: 50px;">
                <?php woocommerce_pagination(); ?>
            </div>
            
        <?php else: ?>
            <div class="section-header" style="text-align: center;">
                <h2>No readings available at the moment</h2>
                <p>The stars are aligning new offerings. Please check back soon.</p>
                <a href="<?php echo home_url('/'); ?>" class="btn btn-primary" style="margin-top: 20px;">
                    Return to Home
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>
