<?php
/**
 * Single Product Template for WooCommerce
 */

get_header(); ?>

<section class="section">
    <div class="container">
        <?php while (have_posts()): the_post(); ?>
            <div class="single-product-mystical" style="max-width: 1000px; margin: 0 auto;">
                <div class="product-layout" style="display: grid; grid-template-columns: 1fr 1fr; gap: 50px; align-items: start;">
                    
                    <!-- Product Images -->
                    <div class="product-images">
                        <?php woocommerce_show_product_images(); ?>
                    </div>
                    
                    <!-- Product Summary -->
                    <div class="product-summary" style="background: rgba(74, 44, 90, 0.2); padding: 40px; border-radius: 20px; border: 1px solid rgba(212, 175, 55, 0.2);">
                        <h1 class="product-title" style="color: var(--rose-gold); font-family: var(--font-display); font-size: 2.2rem; margin-bottom: 20px;">
                            <?php the_title(); ?>
                        </h1>
                        
                        <div class="mystical-rating" style="margin-bottom: 20px; text-align: center;">
                            <div style="color: var(--rose-gold); font-size: 1.2rem;">
                                ✨ ⭐ ✨ ⭐ ✨ ⭐ ✨ ⭐ ✨ ⭐ ✨
                            </div>
                            <p style="font-size: 0.9rem; color: var(--soft-lavender); margin-top: 5px;">
                                Trusted by thousands of mystical seekers
                            </p>
                        </div>
                        
                        <?php woocommerce_template_single_price(); ?>
                        
                        <div class="product-description" style="margin: 25px 0; font-size: 1.1rem; line-height: 1.7;">
                            <?php woocommerce_template_single_excerpt(); ?>
                        </div>
                        
                        <?php woocommerce_template_single_add_to_cart(); ?>
                        
                        <!-- Trust Badges -->
                        <div style="margin-top: 30px; padding: 20px; background: rgba(30, 42, 74, 0.3); border-radius: 15px;">
                            <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 15px; text-align: center; font-size: 0.9rem;">
                                <div>
                                    <div style="font-size: 1.5rem; margin-bottom: 5px;">🔒</div>
                                    <span>Secure Payment</span>
                                </div>
                                <div>
                                    <div style="font-size: 1.5rem; margin-bottom: 5px;">📱</div>
                                    <span>Instant Delivery</span>
                                </div>
                                <div>
                                    <div style="font-size: 1.5rem; margin-bottom: 5px;">💫</div>
                                    <span>7-Day Guarantee</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Product Tabs/Description -->
                <div style="margin-top: 60px;">
                    <?php woocommerce_output_product_data_tabs(); ?>
                </div>
                
                <!-- What You'll Receive Section -->
                <div style="margin-top: 50px; padding: 40px; background: var(--celestial-blue); border-radius: 20px;">
                    <h3 style="color: var(--rose-gold); text-align: center; margin-bottom: 30px; font-size: 2rem;">
                        Your Mystical Journey Includes
                    </h3>
                    
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 30px;">
                        <div class="celebrity-card" style="padding: 25px; text-align: center;">
                            <div style="font-size: 3rem; margin-bottom: 15px;">📜</div>
                            <h4 style="color: var(--rose-gold); margin-bottom: 10px;">Detailed Reading</h4>
                            <p>15+ page comprehensive analysis of your cosmic blueprint and destiny patterns</p>
                        </div>
                        
                        <div class="celebrity-card" style="padding: 25px; text-align: center;">
                            <div style="font-size: 3rem; margin-bottom: 15px;">🎯</div>
                            <h4 style="color: var(--rose-gold); margin-bottom: 10px;">Life Purpose</h4>
                            <p>Clear guidance on your soul's mission and how to align with your true calling</p>
                        </div>
                        
                        <div class="celebrity-card" style="padding: 25px; text-align: center;">
                            <div style="font-size: 3rem; margin-bottom: 15px;">🔮</div>
                            <h4 style="color: var(--rose-gold); margin-bottom: 10px;">Future Insights</h4>
                            <p>Monthly cosmic forecast for the year ahead with optimal timing guidance</p>
                        </div>
                        
                        <div class="celebrity-card" style="padding: 25px; text-align: center;">
                            <div style="font-size: 3rem; margin-bottom: 15px;">💫</div>
                            <h4 style="color: var(--rose-gold); margin-bottom: 10px;">Bonus Meditation</h4>
                            <p>Guided meditation audio to help you align with your destiny matrix energy</p>
                        </div>
                    </div>
                </div>
                
                <!-- Related Products -->
                <?php woocommerce_output_related_products(); ?>
            </div>
        <?php endwhile; ?>
    </div>
</section>

<style>
/* WooCommerce specific styling */
.woocommerce div.product .price {
    color: var(--rose-gold) !important;
    font-size: 2.5rem !important;
    font-weight: 700 !important;
    text-align: center;
    margin: 25px 0 !important;
}

.woocommerce div.product .price del {
    opacity: 0.7;
    font-size: 0.8em;
}

.woocommerce div.product form.cart {
    margin-top: 30px;
}

.woocommerce div.product form.cart .button {
    background: var(--golden-gradient) !important;
    color: var(--deep-purple) !important;
    border: none !important;
    border-radius: 50px !important;
    padding: 18px 40px !important;
    font-size: 1.2rem !important;
    font-weight: 600 !important;
    width: 100% !important;
    transition: all 0.3s ease !important;
    text-transform: uppercase !important;
    letter-spacing: 1px !important;
}

.woocommerce div.product form.cart .button:hover {
    transform: translateY(-3px) !important;
    box-shadow: 0 12px 35px rgba(212, 175, 55, 0.4) !important;
}

.woocommerce div.product .woocommerce-product-gallery {
    border-radius: 20px;
    overflow: hidden;
}

.woocommerce div.product .woocommerce-product-gallery img {
    border-radius: 20px;
}

.woocommerce-tabs {
    background: rgba(74, 44, 90, 0.1) !important;
    border-radius: 20px !important;
    padding: 30px !important;
    border: 1px solid rgba(212, 175, 55, 0.2) !important;
}

.woocommerce-tabs .tabs li a {
    color: var(--star-white) !important;
    background: rgba(74, 44, 90, 0.3) !important;
    border-radius: 10px 10px 0 0 !important;
    border: 1px solid rgba(212, 175, 55, 0.2) !important;
    padding: 15px 25px !important;
}

.woocommerce-tabs .tabs li.active a {
    background: var(--rose-gold) !important;
    color: var(--deep-purple) !important;
}

.woocommerce-tabs .panel {
    color: rgba(248, 246, 255, 0.95) !important;
    background: transparent !important;
    border: none !important;
}

@media (max-width: 768px) {
    .product-layout {
        grid-template-columns: 1fr !important;
        gap: 30px !important;
    }
    
    .product-summary {
        padding: 25px !important;
    }
}
</style>

<?php get_footer(); ?>
