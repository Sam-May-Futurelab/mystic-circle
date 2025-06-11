<?php
/**
 * Mystic Circle Theme Functions
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme Setup
 */
function mystic_circle_setup() {
    // Add theme support for WooCommerce
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
    
    // Add theme support for various WordPress features
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    
    // Add custom image sizes
    add_image_size('hero-bg', 1920, 1080, true);
    add_image_size('celebrity-thumb', 300, 400, true);
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'mystic-circle'),
        'footer' => __('Footer Menu', 'mystic-circle'),
    ));
}
add_action('after_setup_theme', 'mystic_circle_setup');

/**
 * Enqueue scripts and styles
 */
function mystic_circle_scripts() {    // Google Fonts
    wp_enqueue_style('mystic-fonts', 'https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600;700&family=DM+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400&display=swap', array(), '1.0.0');
    
    // Theme stylesheet
    wp_enqueue_style('mystic-circle-style', get_stylesheet_uri(), array(), '1.0.0');
    
    // Custom JavaScript
    wp_enqueue_script('mystic-circle-script', get_template_directory_uri() . '/assets/js/theme.js', array('jquery'), '1.0.0', true);
    
    // Smooth scroll for anchor links
    wp_localize_script('mystic-circle-script', 'mystic_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('mystic_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'mystic_circle_scripts');

/**
 * Custom Post Type: Readings
 */
function mystic_circle_readings_post_type() {
    $labels = array(
        'name' => 'Readings',
        'singular_name' => 'Reading',
        'menu_name' => 'Readings',
        'add_new' => 'Add New Reading',
        'add_new_item' => 'Add New Reading',
        'edit_item' => 'Edit Reading',
        'new_item' => 'New Reading',
        'view_item' => 'View Reading',
        'search_items' => 'Search Readings',
        'not_found' => 'No readings found',
        'not_found_in_trash' => 'No readings found in trash'
    );
    
    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'readings'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-star-filled',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
    );
    
    register_post_type('readings', $args);
}
add_action('init', 'mystic_circle_readings_post_type');

/**
 * Remove default WordPress widgets and clean up
 */
function mystic_circle_remove_default_widgets() {
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wp_shortlink_wp_head');
}
add_action('init', 'mystic_circle_remove_default_widgets');

/**
 * Disable sidebar and widgets areas - we want full control
 */
function mystic_circle_remove_sidebar_support() {
    remove_theme_support('widgets');
}
add_action('after_setup_theme', 'mystic_circle_remove_sidebar_support');

/**
 * WooCommerce Customizations
 */
// Remove default WooCommerce styles and use our own
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

// Customize WooCommerce product loops
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);

/**
 * Custom AJAX handler for smooth interactions
 */
function mystic_circle_ajax_handler() {
    check_ajax_referer('mystic_nonce', 'nonce');
    
    // Handle any AJAX requests here
    wp_die();
}
add_action('wp_ajax_mystic_action', 'mystic_circle_ajax_handler');
add_action('wp_ajax_nopriv_mystic_action', 'mystic_circle_ajax_handler');

/**
 * Add body classes for better styling control
 */
function mystic_circle_body_classes($classes) {
    if (is_front_page()) {
        $classes[] = 'mystical-home';
    }
    if (function_exists('is_woocommerce') && is_woocommerce()) {
        $classes[] = 'mystical-shop';
    }
    return $classes;
}
add_filter('body_class', 'mystic_circle_body_classes');
