# ModernShop WordPress + WooCommerce Theme

ModernShop is a lightweight classic WordPress theme with a premium white-and-orange storefront design.

## Requirements
- WordPress 6.2+
- PHP 7.4+
- WooCommerce (install and activate separately)

## Install
1. In WordPress Admin, open **Appearance → Themes → Add New → Upload Theme**.
2. Upload `modernshop.zip`, install, then activate.
3. Install and activate **WooCommerce**.
4. Complete the WooCommerce setup wizard and create your Shop, Cart, Checkout and My Account pages (WooCommerce can create these automatically).
5. Go to **Appearance → Menus**, create a menu, assign it to **Primary Menu**. Optionally assign another to **Footer Menu**.
6. Set your homepage to a static page under **Settings → Reading**. Select a page named Home and choose the default template; WordPress will use `front-page.php`.
7. Add product categories and products. The homepage category and bestseller sections populate automatically.
8. Set your logo under **Appearance → Customize → Site Identity**.

## Included
- Responsive homepage with hero, category cards, bestsellers and promotional section.
- Responsive header/navigation and cart item count.
- WooCommerce shop/archive product cards.
- Single product presentation using WooCommerce's standard hooks and gallery support.
- Cart, checkout and My Account styling.
- Blog, pages, search/archive templates.
- Theme customizer logo support and primary/footer menu locations.

## Important setup notes
- This theme does not include payment processing. Configure a trusted payment gateway in **WooCommerce → Settings → Payments**. For Bangladesh, choose a gateway provider that supports your business and settlement requirements.
- Shipping zones, tax rules, currency, email sender, privacy policy, refund policy and terms must be configured for your store.
- For best results, upload square or portrait product images with consistent lighting and use compressed WebP images.
- Use a staging site and take a backup before replacing an existing live theme.
- The checkout page uses WooCommerce's standard checkout rendering. If you use the newer Checkout Block, its layout is controlled partly by WooCommerce Blocks and payment plugins; the theme styles common WooCommerce elements but cannot guarantee every third-party block style.
- No Elementor or other page builder is required.

## Customization
- Main colors and layout: `assets/css/main.css` (CSS variables at the top).
- Header/footer: `header.php`, `footer.php`.
- Homepage: `front-page.php`.
- WooCommerce behavior/hooks: `functions.php`.

## Compatibility
The theme intentionally relies on WooCommerce template hooks for most shop and product functionality to reduce template override maintenance. It includes a small `woocommerce/single-product.php` wrapper and uses WooCommerce's `content-single-product.php` template.
