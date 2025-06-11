# Mystic Circle WordPress Theme

A mystical WordPress theme designed for Destiny Matrix readings and tarot services.

## Features

✨ **Mystical Design** - Beautiful purple gradients, star effects, and celestial motifs
🔮 **WooCommerce Ready** - Full e-commerce support for selling readings
⭐ **Custom Post Types** - Readings post type for showcasing different reading types
🌙 **Responsive Design** - Looks beautiful on all devices
✨ **SEO Optimized** - Clean, semantic HTML structure
🔮 **Performance Focused** - Optimized CSS and JavaScript

## Setup Instructions

### 1. Activate the Theme
1. Go to **Appearance > Themes** in your WordPress admin
2. Find "Mystic Circle" and click **Activate**

### 2. Create Your Homepage
1. Go to **Pages > Add New**
2. Set the title to "Home"
3. In the **Page Attributes** box, select "Mystical Home" as the template
4. Publish the page
5. Go to **Settings > Reading** and set this page as your homepage

### 3. Install WooCommerce (Recommended)
```bash
1. Go to Plugins > Add New
2. Search for "WooCommerce"
3. Install and activate WooCommerce
4. Follow the setup wizard
```

### 4. Create Your Destiny Matrix Product
1. Go to **Products > Add New**
2. Title: "Complete Destiny Matrix Reading"
3. Price: $97
4. Description: Add your reading description
5. Set as **Featured Product** for homepage integration

### 5. Create Menu
1. Go to **Appearance > Menus**
2. Create a new menu called "Primary Menu"
3. Add pages: Home, Shop, Cart, Contact
4. Assign to "Primary Menu" location

### 6. Customize Colors (Optional)
The theme uses CSS custom properties for easy color customization. Edit `style.css`:

```css
:root {
    --deep-purple: #2d1b3d;
    --royal-purple: #4a2c5a;
    --soft-lavender: #8b7db8;
    --rose-gold: #d4af37;
    --celestial-blue: #1e2a4a;
    --star-white: #f8f6ff;
}
```

## File Structure

```
mystic-circle/
├── style.css                 # Main stylesheet
├── functions.php            # Theme functions
├── header.php              # Site header
├── footer.php              # Site footer
├── index.php               # Main template
├── page.php                # General page template
├── page-home.php           # Custom homepage template
├── single.php              # Single post template
├── single-readings.php     # Single reading template
├── archive-readings.php    # Readings archive
├── search.php              # Search results
├── searchform.php          # Search form
├── 404.php                 # Error page
├── woocommerce.php         # WooCommerce main template
├── woocommerce/
│   ├── single-product.php  # Product page
│   └── cart/
│       └── cart.php        # Cart page
└── assets/
    └── js/
        └── theme.js        # Theme JavaScript
```

## Customization

### Adding New Reading Types
1. Go to **Readings > Add New** in the admin
2. Create content describing the reading type
3. Add a featured image
4. Publish

### Modifying the Homepage
Edit `page-home.php` to customize:
- Hero section text
- Celebrity predictions
- Order form
- Testimonials

### Styling Changes
All styles are in `style.css` with CSS custom properties for easy customization.

## Support

For theme support or customization questions, please refer to the WordPress documentation or contact your developer.

---

**Theme Version:** 1.0.0  
**WordPress Compatibility:** 5.0+  
**WooCommerce Compatibility:** 3.0+
