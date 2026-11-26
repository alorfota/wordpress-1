<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'modernshop' ); ?></a>
<div class="ms-announcement"><?php esc_html_e( 'Free shipping on eligible orders · Shop the latest collection', 'modernshop' ); ?></div>
<header class="site-header">
	<div class="ms-container ms-header-inner">
		<button class="ms-menu-toggle" type="button" aria-expanded="false" aria-controls="primary-navigation"><span class="screen-reader-text"><?php esc_html_e( 'Open menu', 'modernshop' ); ?></span><i></i><i></i><i></i></button>
		<div class="site-branding">
			<?php if ( has_custom_logo() ) : the_custom_logo(); else : ?>
				<a class="site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?><span>.</span></a>
			<?php endif; ?>
		</div>
		<nav id="primary-navigation" class="main-navigation" aria-label="<?php esc_attr_e( 'Primary navigation', 'modernshop' ); ?>">
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => false, 'fallback_cb' => 'modernshop_fallback_menu' ) ); ?>
		</nav>
		<div class="ms-header-actions">
			<a class="ms-icon-link ms-search-link" href="<?php echo esc_url( home_url( '/?s=' ) ); ?>" aria-label="<?php esc_attr_e( 'Search', 'modernshop' ); ?>"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="10.8" cy="10.8" r="6.8"></circle><path d="m16 16 5 5"></path></svg></a>
			<?php if ( class_exists( 'WooCommerce' ) ) : ?>
				<a class="ms-icon-link ms-cart-link" href="<?php echo esc_url( wc_get_cart_url() ); ?>" aria-label="<?php esc_attr_e( 'Shopping cart', 'modernshop' ); ?>"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 4h2l2.2 11.2a2 2 0 0 0 2 1.6h8.9a2 2 0 0 0 1.9-1.5L22 8H6"></path><circle cx="10" cy="21" r="1"></circle><circle cx="18" cy="21" r="1"></circle></svg><span class="ms-cart-count"><?php echo esc_html( modernshop_cart_count() ); ?></span></a>
			<?php endif; ?>
		</div>
	</div>
</header>
