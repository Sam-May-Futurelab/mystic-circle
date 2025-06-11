/**
 * Mystic Circle Theme JavaScript
 */

(function($) {
    'use strict';

    // DOM Ready
    $(document).ready(function() {
        initMysticalEffects();
        initSmoothScrolling();
        initFormEnhancements();
        initAnimations();
    });

    /**
     * Initialize mystical visual effects
     */
    function initMysticalEffects() {
        // Add twinkling stars effect
        createStarField();
        
        // Parallax scrolling for hero section
        $(window).scroll(function() {
            var scrolled = $(this).scrollTop();
            var rate = scrolled * -0.5;
            
            $('.hero-background').css({
                'transform': 'translate3d(0, ' + rate + 'px, 0)'
            });
            
            // Header transparency effect
            if (scrolled > 100) {
                $('.site-header').addClass('scrolled');
            } else {
                $('.site-header').removeClass('scrolled');
            }
        });
        
        // Mystical hover effects for cards
        $('.celebrity-card').hover(
            function() {
                $(this).addClass('mystical-glow');
            },
            function() {
                $(this).removeClass('mystical-glow');
            }
        );
    }

    /**
     * Create animated star field
     */
    function createStarField() {
        const starContainer = $('.hero-background');
        if (starContainer.length) {
            // Add floating particles
            for (let i = 0; i < 20; i++) {
                const star = $('<div class="floating-star">✨</div>');
                star.css({
                    position: 'absolute',
                    left: Math.random() * 100 + '%',
                    top: Math.random() * 100 + '%',
                    fontSize: (Math.random() * 20 + 10) + 'px',
                    opacity: Math.random() * 0.5 + 0.3,
                    animationDelay: Math.random() * 3 + 's',
                    animationDuration: (Math.random() * 3 + 2) + 's'
                });
                starContainer.append(star);
            }
        }
    }

    /**
     * Enhanced smooth scrolling
     */
    function initSmoothScrolling() {
        $('a[href^="#"]').on('click', function(e) {
            e.preventDefault();
            
            const target = $(this.getAttribute('href'));
            if (target.length) {
                const headerHeight = $('.site-header').outerHeight();
                const targetOffset = target.offset().top - headerHeight - 20;
                
                $('html, body').animate({
                    scrollTop: targetOffset
                }, 800, 'easeInOutCubic');
            }
        });
    }

    /**
     * Form enhancements
     */
    function initFormEnhancements() {
        // Add mystical focus effects to form inputs
        $('input, textarea, select').on('focus', function() {
            $(this).closest('.form-group').addClass('mystical-focus');
        }).on('blur', function() {
            $(this).closest('.form-group').removeClass('mystical-focus');
        });

        // Form validation with mystical messages
        $('.mystical-form').on('submit', function(e) {
            const form = $(this);
            let isValid = true;
            
            // Clear previous errors
            form.find('.mystical-error').remove();
            
            // Validate required fields
            form.find('[required]').each(function() {
                const field = $(this);
                if (!field.val().trim()) {
                    isValid = false;
                    field.after('<div class="mystical-error">✨ The stars require this information ✨</div>');
                }
            });
            
            // Email validation
            const email = form.find('input[type="email"]');
            if (email.length && email.val()) {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(email.val())) {
                    isValid = false;
                    email.after('<div class="mystical-error">✨ Please provide a valid cosmic address ✨</div>');
                }
            }
            
            if (!isValid) {
                e.preventDefault();
                // Scroll to first error
                const firstError = form.find('.mystical-error').first();
                if (firstError.length) {
                    $('html, body').animate({
                        scrollTop: firstError.offset().top - 100
                    }, 500);
                }
            } else {
                // Show loading state
                const submitBtn = form.find('button[type="submit"]');
                submitBtn.text('Consulting the stars...').prop('disabled', true);
            }
        });
    }

    /**
     * Scroll-triggered animations
     */
    function initAnimations() {
        // Intersection Observer for fade-in animations
        if ('IntersectionObserver' in window) {
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };
            
            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        $(entry.target).addClass('mystical-visible');
                    }
                });
            }, observerOptions);
            
            // Observe all cards and sections
            $('.celebrity-card, .section-header, .order-form').each(function() {
                $(this).addClass('mystical-hidden');
                observer.observe(this);
            });
        }
        
        // Number counter animation for prices
        animateCounters();
    }

    /**
     * Animate number counters
     */
    function animateCounters() {
        $('.price').each(function() {
            const $this = $(this);
            const text = $this.text();
            const match = text.match(/\$(\d+)/);
            
            if (match) {
                const finalNumber = parseInt(match[1]);
                const duration = 2000;
                const steps = 50;
                const increment = finalNumber / steps;
                let current = 0;
                
                const timer = setInterval(function() {
                    current += increment;
                    if (current >= finalNumber) {
                        current = finalNumber;
                        clearInterval(timer);
                    }
                    $this.text(text.replace(/\$\d+/, '$' + Math.floor(current)));
                }, duration / steps);
            }
        });
    }

    /**
     * WooCommerce enhancements
     */
    if (typeof wc_add_to_cart_params !== 'undefined') {
        // Enhanced add to cart button
        $(document).on('click', '.single_add_to_cart_button', function() {
            const $button = $(this);
            const originalText = $button.text();
            
            $button.text('Adding to mystical cart...');
            
            // Restore text after a delay if no redirect occurs
            setTimeout(function() {
                $button.text(originalText);
            }, 3000);
        });
        
        // Cart notifications
        $(document.body).on('added_to_cart', function() {
            showMysticalNotification('✨ Added to your mystical journey! ✨', 'success');
        });
    }

    /**
     * Show mystical notifications
     */
    function showMysticalNotification(message, type) {
        const notification = $('<div class="mystical-notification ' + type + '">' + message + '</div>');
        
        notification.css({
            position: 'fixed',
            top: '20px',
            right: '20px',
            background: 'var(--mystic-gradient)',
            color: 'var(--star-white)',
            padding: '15px 25px',
            borderRadius: '50px',
            zIndex: 10000,
            opacity: 0,
            transform: 'translateY(-20px)'
        });
        
        $('body').append(notification);
        
        notification.animate({
            opacity: 1,
            transform: 'translateY(0)'
        }, 300);
        
        setTimeout(function() {
            notification.animate({
                opacity: 0,
                transform: 'translateY(-20px)'
            }, 300, function() {
                notification.remove();
            });
        }, 3000);
    }

    // Custom easing function
    $.easing.easeInOutCubic = function(x, t, b, c, d) {
        if ((t/=d/2) < 1) return c/2*t*t*t + b;
        return c/2*((t-=2)*t*t + 2) + b;
    };

})(jQuery);

// Add CSS classes dynamically
const style = document.createElement('style');
style.textContent = `
    .mystical-hidden {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.6s ease;
    }
    
    .mystical-visible {
        opacity: 1;
        transform: translateY(0);
    }
    
    .mystical-glow {
        box-shadow: 0 0 30px rgba(212, 175, 55, 0.3) !important;
        transform: translateY(-5px) !important;
    }
    
    .mystical-focus {
        transform: scale(1.02);
        transition: transform 0.3s ease;
    }
    
    .mystical-error {
        color: #ff6b6b;
        font-size: 0.9rem;
        margin-top: 5px;
        animation: mysticalShake 0.5s ease;
    }
    
    @keyframes mysticalShake {
        0%, 100% { transform: translateX(0); }
        25% { transform: translateX(-5px); }
        75% { transform: translateX(5px); }
    }
    
    .floating-star {
        animation: float 3s ease-in-out infinite;
        pointer-events: none;
    }
    
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-20px); }
    }
    
    .site-header.scrolled {
        background: rgba(45, 27, 61, 0.98) !important;
        box-shadow: 0 2px 20px rgba(0, 0, 0, 0.3);
    }
`;
document.head.appendChild(style);
