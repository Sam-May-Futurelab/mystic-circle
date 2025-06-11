<?php
/**
 * 404 Error Page Template
 */

get_header(); ?>

<section class="section">
    <div class="container">
        <div class="section-header" style="text-align: center;">
            <div style="font-size: 8rem; margin-bottom: 20px; opacity: 0.3;">🌙</div>
            <h1 class="section-title">404 - Lost in the Cosmos</h1>
            <p style="font-size: 1.3rem; margin-bottom: 40px;">
                The mystical page you seek has drifted beyond the veil of reality.
            </p>
        </div>
        
        <div style="max-width: 600px; margin: 0 auto; text-align: center;">
            <div class="celebrity-card" style="padding: 40px; margin-bottom: 40px;">
                <div style="font-size: 3rem; margin-bottom: 20px;">🔮</div>
                <h3 style="color: var(--rose-gold); margin-bottom: 20px;">The Crystal Ball Reveals...</h3>
                <p style="margin-bottom: 30px;">
                    This page may have been moved to another dimension, or perhaps it never existed in this realm. 
                    But fear not, mystical traveler - your cosmic journey can continue.
                </p>
                
                <div style="background: rgba(30, 42, 74, 0.3); padding: 20px; border-radius: 15px; margin-bottom: 30px;">
                    <h4 style="color: var(--rose-gold); margin-bottom: 15px;">Mystical Navigation Options:</h4>
                    <ul style="list-style: none; padding: 0; text-align: left;">
                        <li style="margin-bottom: 10px;">🌟 Return to the mystical homepage</li>
                        <li style="margin-bottom: 10px;">✨ Explore our cosmic readings</li>
                        <li style="margin-bottom: 10px;">🔮 Search for hidden wisdom</li>
                        <li>🌙 Consult your destiny matrix</li>
                    </ul>
                </div>
            </div>
            
            <!-- Search Form -->
            <div style="margin-bottom: 40px;">
                <h4 style="color: var(--rose-gold); margin-bottom: 20px;">Search the Cosmic Archives</h4>
                <form role="search" method="get" action="<?php echo home_url('/'); ?>">
                    <div style="display: flex; gap: 10px; max-width: 400px; margin: 0 auto;">
                        <input type="search" 
                               name="s" 
                               placeholder="What cosmic wisdom do you seek?" 
                               style="flex: 1; padding: 15px; border: 2px solid rgba(212, 175, 55, 0.3); border-radius: 50px; background: rgba(45, 27, 61, 0.5); color: var(--star-white); font-family: var(--font-serif);">
                        <button type="submit" class="btn btn-primary" style="border-radius: 50px; padding: 15px 25px;">
                            🔍
                        </button>
                    </div>
                </form>
            </div>
            
            <!-- Navigation Buttons -->
            <div style="display: flex; flex-wrap: wrap; gap: 15px; justify-content: center;">
                <a href="<?php echo home_url('/'); ?>" class="btn btn-primary">
                    🏠 Mystical Home
                </a>
                <?php if (class_exists('WooCommerce')): ?>
                    <a href="<?php echo wc_get_page_permalink('shop'); ?>" class="btn btn-secondary">
                        🔮 Browse Readings
                    </a>
                <?php endif; ?>
                <a href="#order" class="btn btn-secondary">
                    ✨ Order Reading
                </a>
            </div>
            
            <!-- Fun 404 Message -->
            <div style="margin-top: 50px; padding: 30px; background: rgba(74, 44, 90, 0.2); border-radius: 20px; border: 1px solid rgba(212, 175, 55, 0.2);">
                <p style="font-style: italic; color: var(--soft-lavender); margin-bottom: 15px;">
                    "In the infinite tapestry of the cosmos, some paths lead to unexpected discoveries. 
                    Perhaps this wrong turn is actually the universe guiding you toward your true destiny."
                </p>
                <p style="font-size: 0.9rem; color: rgba(248, 246, 255, 0.7);">
                    - Ancient Mystical Wisdom
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Add some mystical floating elements -->
<style>
.floating-element {
    position: fixed;
    pointer-events: none;
    z-index: -1;
    opacity: 0.1;
    font-size: 2rem;
    animation: mysticalFloat 15s linear infinite;
}

@keyframes mysticalFloat {
    0% {
        transform: translateY(100vh) rotate(0deg);
    }
    100% {
        transform: translateY(-100px) rotate(360deg);
    }
}
</style>

<script>
// Add floating mystical elements
document.addEventListener('DOMContentLoaded', function() {
    const symbols = ['✨', '🌟', '🔮', '🌙', '⭐', '🌙'];
    
    function createFloatingElement() {
        const element = document.createElement('div');
        element.className = 'floating-element';
        element.textContent = symbols[Math.floor(Math.random() * symbols.length)];
        element.style.left = Math.random() * 100 + 'vw';
        element.style.animationDelay = Math.random() * 15 + 's';
        element.style.animationDuration = (Math.random() * 10 + 10) + 's';
        
        document.body.appendChild(element);
        
        // Remove element after animation
        setTimeout(() => {
            if (element.parentNode) {
                element.parentNode.removeChild(element);
            }
        }, 25000);
    }
    
    // Create floating elements periodically
    setInterval(createFloatingElement, 3000);
    
    // Create initial elements
    for (let i = 0; i < 5; i++) {
        setTimeout(createFloatingElement, i * 1000);
    }
});
</script>

<?php get_footer(); ?>
