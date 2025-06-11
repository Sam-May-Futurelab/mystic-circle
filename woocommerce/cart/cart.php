<?php
/**
 * Cart Page Template
 */

get_header(); ?>

<section class="section">
    <div class="container">
        <div class="section-header">
            <h1 class="section-title">Your Mystical Cart</h1>
            <p>Review your cosmic selections before proceeding to checkout</p>
        </div>

        <div class="mystical-cart" style="max-width: 900px; margin: 0 auto;">
            <?php woocommerce_content(); ?>
        </div>
    </div>
</section>

<style>
/* Cart specific styling */
.woocommerce-cart table.cart {
    background: rgba(74, 44, 90, 0.2) !important;
    border-radius: 20px !important;
    border: 1px solid rgba(212, 175, 55, 0.2) !important;
    overflow: hidden !important;
}

.woocommerce-cart table.cart th,
.woocommerce-cart table.cart td {
    border: none !important;
    padding: 20px !important;
    color: var(--star-white) !important;
}

.woocommerce-cart table.cart th {
    background: rgba(45, 27, 61, 0.8) !important;
    color: var(--rose-gold) !important;
    font-weight: 600 !important;
    text-transform: uppercase !important;
    letter-spacing: 1px !important;
}

.woocommerce-cart table.cart .product-thumbnail img {
    border-radius: 10px !important;
}

.woocommerce-cart .cart-collaterals {
    background: rgba(30, 42, 74, 0.3) !important;
    border-radius: 20px !important;
    padding: 30px !important;
    border: 1px solid rgba(212, 175, 55, 0.2) !important;
    margin-top: 30px !important;
}

.woocommerce-cart .cart-collaterals h2 {
    color: var(--rose-gold) !important;
    text-align: center !important;
}

.woocommerce-cart .cart_totals table {
    background: transparent !important;
}

.woocommerce-cart .cart_totals th,
.woocommerce-cart .cart_totals td {
    color: var(--star-white) !important;
    border: none !important;
    padding: 10px 0 !important;
}

.woocommerce-cart .cart_totals .order-total th,
.woocommerce-cart .cart_totals .order-total td {
    color: var(--rose-gold) !important;
    font-size: 1.3rem !important;
    font-weight: 700 !important;
    border-top: 2px solid rgba(212, 175, 55, 0.3) !important;
    padding-top: 20px !important;
}

.woocommerce-cart .wc-proceed-to-checkout {
    text-align: center !important;
    margin-top: 30px !important;
}

.woocommerce-cart .wc-proceed-to-checkout .checkout-button {
    background: var(--golden-gradient) !important;
    color: var(--deep-purple) !important;
    border: none !important;
    border-radius: 50px !important;
    padding: 18px 40px !important;
    font-size: 1.2rem !important;
    font-weight: 600 !important;
    text-transform: uppercase !important;
    letter-spacing: 1px !important;
    transition: all 0.3s ease !important;
    text-decoration: none !important;
    display: inline-block !important;
}

.woocommerce-cart .wc-proceed-to-checkout .checkout-button:hover {
    transform: translateY(-3px) !important;
    box-shadow: 0 12px 35px rgba(212, 175, 55, 0.4) !important;
}

.woocommerce-cart .quantity input {
    background: rgba(45, 27, 61, 0.5) !important;
    color: var(--star-white) !important;
    border: 2px solid rgba(212, 175, 55, 0.3) !important;
    border-radius: 10px !important;
    padding: 8px !important;
}

.woocommerce-cart .actions .button {
    background: rgba(74, 44, 90, 0.5) !important;
    color: var(--star-white) !important;
    border: 2px solid rgba(212, 175, 55, 0.3) !important;
    border-radius: 50px !important;
    padding: 12px 25px !important;
    transition: all 0.3s ease !important;
}

.woocommerce-cart .actions .button:hover {
    background: var(--rose-gold) !important;
    color: var(--deep-purple) !important;
}

.woocommerce-cart .remove {
    background: rgba(255, 107, 107, 0.2) !important;
    color: #ff6b6b !important;
    border-radius: 50% !important;
    width: 30px !important;
    height: 30px !important;
    text-align: center !important;
    line-height: 26px !important;
    transition: all 0.3s ease !important;
}

.woocommerce-cart .remove:hover {
    background: #ff6b6b !important;
    color: white !important;
}
</style>

<?php get_footer(); ?>
