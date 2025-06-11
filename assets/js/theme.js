/**
 * Mystic Circle Theme JavaScript
 */

(function($) {
    'use strict';    // DOM Ready
    $(document).ready(function() {
        initAllMysticalEffects();
        initSmoothScrolling();
        initFormEnhancements();
        initAnimations();
    });

    /**
     * Initialize mystical visual effects
     */
    function initMysticalEffects() {
        // Add twinkling stars effect
        createStarField();        // Parallax scrolling for hero section
        $(window).scroll(function() {
            var scrolled = $(this).scrollTop();
            var rate = scrolled * -0.5;
            
            $('.hero-background').css({
                'transform': 'translate3d(0, ' + rate + 'px, 0)'
            });
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
  
`;
document.head.appendChild(style);

/**
 * Mystical Night Sky Particle System
 */
function initMysticalNightSky() {
    const canvas = document.getElementById('mysticalCanvas');
    if (!canvas) return;
    
    const ctx = canvas.getContext('2d');
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
    
    // Particle arrays
    const stars = [];
    const particles = [];
    const connectionLines = [];
    
    // Create static stars
    function createStars() {
        for (let i = 0; i < 150; i++) {
            stars.push({
                x: Math.random() * canvas.width,
                y: Math.random() * canvas.height,
                size: Math.random() * 2 + 0.5,
                twinkle: Math.random() * 2 * Math.PI,
                twinkleSpeed: Math.random() * 0.02 + 0.01,
                brightness: Math.random() * 0.8 + 0.2
            });
        }
    }
    
    // Create floating particles
    function createParticles() {
        for (let i = 0; i < 50; i++) {
            particles.push({
                x: Math.random() * canvas.width,
                y: Math.random() * canvas.height,
                vx: (Math.random() - 0.5) * 0.5,
                vy: (Math.random() - 0.5) * 0.5,
                size: Math.random() * 3 + 1,
                color: `hsl(${45 + Math.random() * 30}, ${60 + Math.random() * 40}%, ${60 + Math.random() * 30}%)`,
                alpha: Math.random() * 0.6 + 0.2,
                pulse: Math.random() * 2 * Math.PI,
                pulseSpeed: Math.random() * 0.03 + 0.01
            });
        }
    }
    
    // Draw twinkling stars
    function drawStars() {
        stars.forEach(star => {
            star.twinkle += star.twinkleSpeed;
            const alpha = star.brightness * (0.5 + 0.5 * Math.sin(star.twinkle));
            
            ctx.beginPath();
            ctx.fillStyle = `rgba(255, 255, 255, ${alpha})`;
            ctx.arc(star.x, star.y, star.size, 0, 2 * Math.PI);
            ctx.fill();
            
            // Star glow
            if (alpha > 0.7) {
                ctx.beginPath();
                ctx.fillStyle = `rgba(212, 175, 55, ${alpha * 0.3})`;
                ctx.arc(star.x, star.y, star.size * 3, 0, 2 * Math.PI);
                ctx.fill();
            }
        });
    }
    
    // Draw floating particles
    function drawParticles() {
        particles.forEach(particle => {
            // Update position
            particle.x += particle.vx;
            particle.y += particle.vy;
            
            // Bounce off edges
            if (particle.x < 0 || particle.x > canvas.width) particle.vx *= -1;
            if (particle.y < 0 || particle.y > canvas.height) particle.vy *= -1;
            
            // Pulse effect
            particle.pulse += particle.pulseSpeed;
            const pulseAlpha = particle.alpha * (0.6 + 0.4 * Math.sin(particle.pulse));
            
            // Draw particle
            ctx.beginPath();
            ctx.fillStyle = particle.color.replace(')', `, ${pulseAlpha})`).replace('hsl', 'hsla');
            ctx.arc(particle.x, particle.y, particle.size, 0, 2 * Math.PI);
            ctx.fill();
            
            // Draw particle glow
            ctx.beginPath();
            ctx.fillStyle = particle.color.replace(')', `, ${pulseAlpha * 0.3})`).replace('hsl', 'hsla');
            ctx.arc(particle.x, particle.y, particle.size * 4, 0, 2 * Math.PI);
            ctx.fill();
        });
    }
    
    // Draw connections between nearby particles
    function drawConnections() {
        for (let i = 0; i < particles.length; i++) {
            for (let j = i + 1; j < particles.length; j++) {
                const dx = particles[i].x - particles[j].x;
                const dy = particles[i].y - particles[j].y;
                const distance = Math.sqrt(dx * dx + dy * dy);
                
                if (distance < 150) {
                    const alpha = (150 - distance) / 150 * 0.2;
                    ctx.beginPath();
                    ctx.strokeStyle = `rgba(212, 175, 55, ${alpha})`;
                    ctx.lineWidth = 1;
                    ctx.moveTo(particles[i].x, particles[i].y);
                    ctx.lineTo(particles[j].x, particles[j].y);
                    ctx.stroke();
                }
            }
        }
    }
    
    // Animation loop
    function animate() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        
        drawStars();
        drawParticles();
        drawConnections();
        
        requestAnimationFrame(animate);
    }
    
    // Initialize
    createStars();
    createParticles();
    animate();
    
    // Handle resize
    window.addEventListener('resize', () => {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
    });
}

// Create floating orbs
function createFloatingOrbs() {
    const container = document.getElementById('floatingOrbs');
    if (!container) return;
    
    for (let i = 0; i < 8; i++) {
        const orb = document.createElement('div');
        orb.className = 'mystical-orb';
        orb.style.width = (Math.random() * 20 + 10) + 'px';
        orb.style.height = orb.style.width;
        orb.style.left = Math.random() * 100 + '%';
        orb.style.top = Math.random() * 100 + '%';
        orb.style.animationDelay = Math.random() * 6 + 's';
        container.appendChild(orb);
    }
}

// Create shooting stars
function createShootingStars() {
    const container = document.getElementById('shootingStars');
    if (!container) return;
    
    function addShootingStar() {
        const star = document.createElement('div');
        star.className = 'shooting-star';
        star.style.left = Math.random() * 50 + '%';
        star.style.top = Math.random() * 50 + 50 + '%';
        star.style.animationDelay = '0s';
        container.appendChild(star);
        
        setTimeout(() => {
            if (star.parentNode) {
                star.parentNode.removeChild(star);
            }
        }, 3000);
    }
    
    // Create shooting stars periodically
    setInterval(addShootingStar, 2000 + Math.random() * 3000);
    addShootingStar(); // Initial star
}

// Create constellation lines
function createConstellationLines() {
    const container = document.getElementById('constellationLines');
    if (!container) return;
    
    for (let i = 0; i < 5; i++) {
        const line = document.createElement('div');
        line.className = 'constellation-line';
        line.style.width = (Math.random() * 200 + 100) + 'px';
        line.style.left = Math.random() * 80 + 10 + '%';
        line.style.top = Math.random() * 80 + 10 + '%';
        line.style.transform = `rotate(${Math.random() * 360}deg)`;
        line.style.animationDelay = Math.random() * 4 + 's';
        container.appendChild(line);
    }
}

// Initialize all effects when page loads
function initAllMysticalEffects() {
    initMysticalNightSky();
    createFloatingOrbs();
    createShootingStars();
    createConstellationLines();
}
