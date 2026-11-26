<?php
/**
 * ModernShop theme functions.
 *
 * @package ModernShop
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'MODERNSHOP_VERSION', '1.0.0' );

function modernshop_setup() {
	load_theme_textdomain( 'modernshop', get_template_directory() . '/languages' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'custom-logo', array( 'height' => 60, 'width' => 220, 'flex-height' => true, 'flex-width' => true ) );
	add_theme_support( 'custom-background', array( 'default-color' => 'ffffff' ) );
	add_theme_support( 'woocommerce', array(
		'thumbnail_image_width' => 420,
		'single_image_width'    => 900,
		'product_grid'          => array( 'default_rows' => 3, 'min_rows' => 1, 'max_rows' => 8, 'default_columns' => 4, 'min_columns' => 2, 'max_columns' => 5 ),
	) );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'modernshop' ),
		'footer'  => __( 'Footer Menu', 'modernshop' ),
	) );
}
add_action( 'after_setup_theme', 'modernshop_setup' );

function modernshop_assets() {
	wp_enqueue_style( 'modernshop-style', get_stylesheet_uri(), array(), MODERNSHOP_VERSION );
	wp_enqueue_style( 'modernshop-main', get_template_directory_uri() . '/assets/css/main.css', array( 'modernshop-style' ), MODERNSHOP_VERSION );
	wp_enqueue_script( 'modernshop-main', get_template_directory_uri() . '/assets/js/main.js', array(), MODERNSHOP_VERSION, true );
	wp_localize_script( 'modernshop-main', 'modernShop', array(
		'menuLabel' => __( 'Open menu', 'modernshop' ),
	) );
}
add_action( 'wp_enqueue_scripts', 'modernshop_assets' );

/** Add WooCommerce cart fragments count to the header. */
function modernshop_cart_count() {
	if ( ! function_exists( 'WC' ) || ! WC()->cart ) {
		return 0;
	}
	return WC()->cart->get_cart_contents_count();
}
function modernshop_cart_count_fragment( $fragments ) {
	ob_start();
	?><span class="ms-cart-count"><?php echo esc_html( modernshop_cart_count() ); ?></span><?php
	$fragments['span.ms-cart-count'] = ob_get_clean();
	return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'modernshop_cart_count_fragment' );

/** Product-card presentation. */
function modernshop_woocommerce_setup() {
	if ( ! class_exists( 'WooCommerce' ) ) {
		return;
	}
	remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
	remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
	add_action( 'woocommerce_before_shop_loop_item_title', 'modernshop_loop_product_image', 10 );
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
	add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 7 );
}
add_action( 'wp', 'modernshop_woocommerce_setup' );

function modernshop_loop_product_image() {
	global $product;
	if ( ! $product ) {
		return;
	}
	echo '<div class="ms-product-image">';
	woocommerce_show_product_loop_sale_flash();
	woocommerce_template_loop_product_thumbnail();
	echo '<span class="ms-quick-label">' . esc_html__( 'View details', 'modernshop' ) . '</span>';
	echo '</div>';
}

/** Change the default number of shop columns. */
add_filter( 'loop_shop_columns', function() { return 4; } );

/** Add a small trust row under the single-product add-to-cart area. */
function modernshop_product_trust_row() {
	echo '<div class="ms-product-trust"><span>✓ ' . esc_html__( 'Secure checkout', 'modernshop' ) . '</span><span>✓ ' . esc_html__( 'Helpful support', 'modernshop' ) . '</span><span>✓ ' . esc_html__( 'Easy returns', 'modernshop' ) . '</span></div>';
}
add_action( 'woocommerce_after_add_to_cart_form', 'modernshop_product_trust_row', 20 );

/** Add a search field to the product archive header. */
function modernshop_shop_intro() {
	if ( ! is_shop() && ! is_product_taxonomy() ) {
		return;
	}
	echo '<div class="ms-shop-intro"><div><p class="ms-eyebrow">' . esc_html__( 'CURATED FOR EVERY DAY', 'modernshop' ) . '</p><h1>' . esc_html( woocommerce_page_title( false ) ) . '</h1><p>' . esc_html__( 'Discover thoughtful essentials, selected for quality and made to fit your everyday.', 'modernshop' ) . '</p></div>';
	get_product_search_form();
	echo '</div>';
}
add_action( 'woocommerce_before_main_content', 'modernshop_shop_intro', 5 );

/** Remove default WooCommerce wrapper; the theme supplies its own. */
function modernshop_wc_wrapper_start() {
	echo '<main id="primary" class="site-main ms-woocommerce"><div class="ms-container">';
}
function modernshop_wc_wrapper_end() {
	echo '</div></main>';
}
add_action( 'woocommerce_before_main_content', 'modernshop_wc_wrapper_start', 10 );
add_action( 'woocommerce_after_main_content', 'modernshop_wc_wrapper_end', 10 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

/** Add accessible labels to quantity fields. */
add_filter( 'woocommerce_quantity_input_args', function( $args ) {
	$args['min_value'] = isset( $args['min_value'] ) ? $args['min_value'] : 1;
	return $args;
} );

/** Theme widget area. */
function modernshop_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Shop Sidebar', 'modernshop' ),
		'id'            => 'shop-sidebar',
		'description'   => __( 'Widgets displayed beside shop products on wide screens.', 'modernshop' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'modernshop_widgets_init' );

/** Excerpt length for editorial cards. */
add_filter( 'excerpt_length', function( $length ) { return 22; }, 999 );
