<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Discover your destiny with personalized Destiny Matrix readings. Mystical insights, celebrity predictions, and tarot wisdom await.">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Loading Animation -->
<div class="mystical-loader" id="loader">
    <div class="loader-content">
        <div class="loader-stars">✨ 🌟 ✨</div>
        <p>Consulting the stars...</p>
    </div>
</div>

<header class="site-header" id="masthead">
    <div class="container">
        <div class="header-content">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo">
                <?php bloginfo('name'); ?>
            </a>
            
            <nav class="main-navigation" role="navigation">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                    'container'      => false,
                    'fallback_cb'    => function() {
                        echo '<ul><li><a href="' . home_url('/') . '">Home</a></li>';
                        if (class_exists('WooCommerce')) {
                            echo '<li><a href="' . wc_get_page_permalink('shop') . '">Readings</a></li>';
                            echo '<li><a href="' . wc_get_page_permalink('cart') . '">Cart</a></li>';
                        }
                        echo '<li><a href="#order">Order Reading</a></li></ul>';
                    }
                ));
                ?>
            </nav>
        </div>
    </div>
</header>

<main id="primary" class="site-main">
