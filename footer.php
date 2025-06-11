</main><!-- #primary -->

<footer class="site-footer" id="colophon">
    <div class="celestial-decoration">🌙</div>
    <div class="container">
        <div class="footer-content">
            <div class="footer-section">
                <h3>Mystic Circle</h3>
                <p>Unlock the mysteries of your destiny with personalized readings crafted by celestial wisdom.</p>
                <div class="social-links">
                    <span>✨ Follow the stars ✨</span>
                </div>
            </div>
            
            <div class="footer-section">
                <h3>Services</h3>
                <ul style="list-style: none; padding: 0;">
                    <li><a href="#destiny-matrix">🔮 Destiny Matrix Reading</a></li>
                    <li><a href="#celebrity">⭐ Celebrity Predictions</a></li>
                    <li><a href="#tarot">🌟 Tarot Guidance</a></li>
                    <li><a href="#astrology">🌙 Astrology Charts</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h3>Celestial Contact</h3>
                <p>📧 info@mysticcircle.com</p>
                <p>📱 +1 (555) MYSTIC-1</p>
                <p>🌍 Connecting souls worldwide</p>
            </div>
            
            <div class="footer-section">
                <h3>Mystical Menu</h3>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer',
                    'menu_id'        => 'footer-menu',
                    'container'      => false,
                    'fallback_cb'    => function() {
                        echo '<ul style="list-style: none; padding: 0;">';
                        echo '<li><a href="' . home_url('/') . '">Home</a></li>';
                        echo '<li><a href="#about">About</a></li>';
                        echo '<li><a href="#privacy">Privacy</a></li>';
                        echo '<li><a href="#terms">Terms</a></li>';
                        echo '</ul>';
                    }
                ));
                ?>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All mystical rights reserved. ✨ Crafted with cosmic love ✨</p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

<!-- Custom JavaScript for smooth interactions -->
<script>
// Hide loader when page is loaded
window.addEventListener('load', function() {
    const loader = document.getElementById('loader');
    if (loader) {
        loader.classList.add('hidden');
        setTimeout(() => loader.remove(), 500);
    }
});

// Smooth scroll for anchor links
document.addEventListener('DOMContentLoaded', function() {
    const links = document.querySelectorAll('a[href^="#"]');
    links.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
    // Header scroll effect
    window.addEventListener('scroll', function() {
        const header = document.querySelector('.site-header');
        if (window.scrollY > 100) {
            header.style.background = 'rgba(45, 27, 61, 0.98)';
        } else {
            header.style.background = 'rgba(45, 27, 61, 0.95)';
        }
    });
});
</script>

</body>
</html>
