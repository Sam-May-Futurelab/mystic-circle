<?php
/*
Template Name: Mystical Home
*/

get_header(); ?>

<!-- Hero Section -->
<section class="hero-section" id="home">
    <div class="hero-background"></div>
    <div class="container">
        <div class="hero-content">
            <p class="hero-subtitle">Destiny Awaits</p>
            <h1 class="hero-title">What's next? Let us show you.</h1>
            <p class="hero-description">
                Discover the hidden patterns of your destiny through ancient wisdom and modern mystical insights. 
                Your personalized Destiny Matrix reading reveals the cosmic blueprint of your soul's journey.
            </p>
            <div class="hero-buttons">
                <a href="#order" class="btn btn-primary">Get Your Reading</a>
                <a href="#celebrity" class="btn btn-secondary">See Predictions</a>
            </div>
        </div>
    </div>
</section>

<!-- Celebrity Predictions Section -->
<section class="section section-alt" id="celebrity">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Celebrity Predictions</h2>
            <p>Witness the power of Destiny Matrix readings through our accurate celebrity insights</p>
        </div>
        
        <div class="celebrity-grid">
            <div class="celebrity-card">
                <div class="celebrity-image">🎤</div>
                <h3 class="celebrity-name">Rihanna</h3>
                <p class="celebrity-prediction">
                    "A powerful creative renaissance awaits, with business ventures aligning perfectly with your artistic soul. 
                    The stars reveal new collaborations that will reshape your legacy."
                </p>
            </div>
            
            <div class="celebrity-card">
                <div class="celebrity-image">🎬</div>
                <h3 class="celebrity-name">Zendaya</h3>
                <p class="celebrity-prediction">
                    "Your destiny matrix shows a profound shift toward directing and producing. 
                    The cosmic energies support your evolution from performer to visionary creator."
                </p>
            </div>
            
            <div class="celebrity-card">
                <div class="celebrity-image">🎭</div>
                <h3 class="celebrity-name">Lady Gaga</h3>
                <p class="celebrity-prediction">
                    "The stars align for a return to your musical roots, but with deeper spiritual themes. 
                    Your healing journey becomes the foundation for your next artistic chapter."
                </p>
            </div>
        </div>
        
        <div style="text-align: center; margin-top: 50px;">
            <p style="font-style: italic; color: var(--soft-lavender);">
                ✨ These insights were revealed months before their public announcements ✨
            </p>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="section" id="features">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Your Mystical Journey</h2>
            <p>Discover what makes our Destiny Matrix readings uniquely powerful</p>
        </div>
        
        <div class="celebrity-grid">
            <div class="celebrity-card">
                <div class="celebrity-image">🔮</div>
                <h3 class="celebrity-name">Personal Matrix</h3>
                <p class="celebrity-prediction">
                    Your unique birth data creates a cosmic fingerprint revealing hidden talents, 
                    life patterns, and destined paths waiting to unfold.
                </p>
            </div>
            
            <div class="celebrity-card">
                <div class="celebrity-image">⭐</div>
                <h3 class="celebrity-name">Soul Purpose</h3>
                <p class="celebrity-prediction">
                    Uncover your soul's true mission in this lifetime and understand 
                    the deeper meaning behind your experiences and relationships.
                </p>
            </div>
            
            <div class="celebrity-card">
                <div class="celebrity-image">🌙</div>
                <h3 class="celebrity-name">Future Guidance</h3>
                <p class="celebrity-prediction">
                    Receive clarity about upcoming opportunities, challenges, and 
                    the optimal timing for major life decisions and transformations.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Order Section -->
<section class="section order-section" id="order">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Order Your Destiny Matrix Reading</h2>
            <p>Begin your journey of cosmic discovery with a personalized reading crafted just for you</p>
        </div>
        
        <div class="order-form">
            <?php if (class_exists('WooCommerce')): ?>
                <!-- WooCommerce Product Integration -->
                <div style="text-align: center; margin-bottom: 40px;">
                    <h3 style="color: var(--rose-gold); margin-bottom: 20px;">Complete Destiny Matrix Reading</h3>
                    <div style="font-size: 2rem; color: var(--star-white); margin-bottom: 20px;">
                        <span style="text-decoration: line-through; opacity: 0.7;">$197</span>
                        <strong style="color: var(--rose-gold); margin-left: 15px;">$97</strong>
                    </div>
                    <p style="margin-bottom: 30px;">✨ Limited Time Mystical Offer ✨</p>
                    
                    <?php
                    // Display WooCommerce product if available
                    $args = array(
                        'post_type' => 'product',
                        'posts_per_page' => 1,
                        'meta_query' => array(
                            array(
                                'key' => '_featured',
                                'value' => 'yes'
                            )
                        )
                    );
                    $products = new WP_Query($args);
                    
                    if ($products->have_posts()):
                        while ($products->have_posts()): $products->the_post();
                            wc_get_template_part('content', 'single-product-summary');
                        endwhile;
                        wp_reset_postdata();
                    else:
                    ?>
                        <a href="<?php echo wc_get_page_permalink('shop'); ?>" class="btn btn-primary" style="font-size: 1.2rem; padding: 20px 40px;">
                            Order Your Reading Now
                        </a>
                    <?php endif; ?>
                </div>
            <?php else: ?>
                <!-- Fallback Contact Form -->
                <form class="mystical-form" action="#" method="post">
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 25px;">
                        <div class="form-group">
                            <label for="first_name">First Name *</label>
                            <input type="text" id="first_name" name="first_name" required placeholder="Your first name">
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name *</label>
                            <input type="text" id="last_name" name="last_name" required placeholder="Your last name">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email Address *</label>
                        <input type="email" id="email" name="email" required placeholder="your.email@example.com">
                    </div>
                    
                    <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 20px; margin-bottom: 25px;">
                        <div class="form-group">
                            <label for="birth_date">Birth Date *</label>
                            <input type="date" id="birth_date" name="birth_date" required>
                        </div>
                        <div class="form-group">
                            <label for="birth_time">Birth Time</label>
                            <input type="time" id="birth_time" name="birth_time" placeholder="If known">
                        </div>
                        <div class="form-group">
                            <label for="birth_place">Birth Location *</label>
                            <input type="text" id="birth_place" name="birth_place" required placeholder="City, Country">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="reading_focus">What would you like to focus on?</label>
                        <select id="reading_focus" name="reading_focus">
                            <option value="">Choose your focus...</option>
                            <option value="love">💕 Love & Relationships</option>
                            <option value="career">💼 Career & Purpose</option>
                            <option value="spiritual">✨ Spiritual Growth</option>
                            <option value="general">🌟 General Life Guidance</option>
                            <option value="specific">🎯 Specific Question</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="specific_question">Specific Questions or Areas of Interest</label>
                        <textarea id="specific_question" name="specific_question" rows="4" 
                                placeholder="Share any specific questions or areas you'd like your reading to address..."></textarea>
                    </div>
                    
                    <div style="text-align: center; margin-top: 30px;">
                        <button type="submit" class="btn btn-primary" style="font-size: 1.2rem; padding: 20px 40px;">
                            Order Your Destiny Matrix Reading - $97
                        </button>
                        <p style="margin-top: 15px; font-size: 0.9rem; opacity: 0.8;">
                            🔒 Secure payment • 📱 Instant confirmation • ✨ 7-day delivery
                        </p>
                    </div>
                </form>
            <?php endif; ?>
            
            <div style="margin-top: 40px; text-align: center;">
                <h4 style="color: var(--rose-gold); margin-bottom: 20px;">What You'll Receive:</h4>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px;">
                    <div>
                        <div style="font-size: 2rem; margin-bottom: 10px;">📜</div>
                        <p><strong>Detailed 15-page reading</strong><br>Your complete cosmic blueprint</p>
                    </div>
                    <div>
                        <div style="font-size: 2rem; margin-bottom: 10px;">🎯</div>
                        <p><strong>Life purpose clarity</strong><br>Understand your soul's mission</p>
                    </div>
                    <div>
                        <div style="font-size: 2rem; margin-bottom: 10px;">🔮</div>
                        <p><strong>Year ahead forecast</strong><br>Monthly cosmic guidance</p>
                    </div>
                    <div>
                        <div style="font-size: 2rem; margin-bottom: 10px;">💫</div>
                        <p><strong>Bonus meditation</strong><br>Align with your destiny</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="section section-alt" id="testimonials">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Mystical Testimonials</h2>
            <p>Discover how our readings have transformed lives and revealed hidden destinies</p>
        </div>
        
        <div class="celebrity-grid">
            <div class="celebrity-card">
                <div class="celebrity-image">⭐</div>
                <h3 class="celebrity-name">Sarah M.</h3>
                <p class="celebrity-prediction">
                    "The accuracy was mind-blowing! The reading predicted my career change 6 months before I even considered it. 
                    Now I'm living my true purpose as a healer. Absolutely life-changing!"
                </p>
            </div>
            
            <div class="celebrity-card">
                <div class="celebrity-image">🌟</div>
                <h3 class="celebrity-name">Marcus T.</h3>
                <p class="celebrity-prediction">
                    "I was skeptical at first, but the insights about my relationship patterns were spot-on. 
                    The guidance helped me find my soulmate exactly as described. Pure magic!"
                </p>
            </div>
            
            <div class="celebrity-card">
                <div class="celebrity-image">✨</div>
                <h3 class="celebrity-name">Luna R.</h3>
                <p class="celebrity-prediction">
                    "The spiritual insights opened doorways I never knew existed. My intuitive abilities awakened, 
                    and I finally understand my life's deeper purpose. Thank you for this gift!"
                </p>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
