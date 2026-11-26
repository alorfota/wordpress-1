<?php get_header(); ?>
<main id="primary" class="site-main">
	<section class="ms-hero">
		<div class="ms-container ms-hero-grid">
			<div class="ms-hero-copy">
				<p class="ms-eyebrow"><?php esc_html_e( 'THE NEW EVERYDAY EDIT', 'modernshop' ); ?></p>
				<h1><?php esc_html_e( 'Good things,', 'modernshop' ); ?><br><em><?php esc_html_e( 'chosen well.', 'modernshop' ); ?></em></h1>
				<p class="ms-hero-text"><?php esc_html_e( 'Discover considered essentials that bring a little more joy to your everyday. Quality, simplicity and style in every detail.', 'modernshop' ); ?></p>
				<div class="ms-hero-actions">
					<a class="ms-button" href="<?php echo esc_url( function_exists( 'wc_get_page_permalink' ) ? wc_get_page_permalink( 'shop' ) : home_url( '/shop/' ) ); ?>"><?php esc_html_e( 'Shop collection', 'modernshop' ); ?><span>→</span></a>
					<a class="ms-text-link" href="#ms-featured"><?php esc_html_e( 'Explore bestsellers', 'modernshop' ); ?></a>
				</div>
				<div class="ms-hero-note"><span class="ms-note-dot"></span><?php esc_html_e( 'Thoughtful picks. Everyday value.', 'modernshop' ); ?></div>
			</div>
			<div class="ms-hero-art" aria-label="<?php esc_attr_e( 'Featured product collection', 'modernshop' ); ?>">
				<div class="ms-hero-orbit"></div>
				<div class="ms-hero-image-main"><span><?php esc_html_e( 'THE EVERYDAY COLLECTION', 'modernshop' ); ?></span><strong><?php esc_html_e( 'Made to be', 'modernshop' ); ?><br><em><?php esc_html_e( 'loved.', 'modernshop' ); ?></em></strong></div>
				<div class="ms-floating-card"><small><?php esc_html_e( 'A LITTLE MORE', 'modernshop' ); ?></small><b><?php esc_html_e( 'You-shaped.', 'modernshop' ); ?></b><span>✳</span></div>
				<div class="ms-hero-stamp">GOOD<br>CHOICES<br>ONLY</div>
			</div>
		</div>
	</section>

	<section class="ms-benefits"><div class="ms-container ms-benefit-grid">
		<div><span class="ms-benefit-icon">✳</span><span><b><?php esc_html_e( 'Thoughtfully selected', 'modernshop' ); ?></b><small><?php esc_html_e( 'Quality-first products', 'modernshop' ); ?></small></span></div>
		<div><span class="ms-benefit-icon">↗</span><span><b><?php esc_html_e( 'Easy shopping', 'modernshop' ); ?></b><small><?php esc_html_e( 'A smooth experience', 'modernshop' ); ?></small></span></div>
		<div><span class="ms-benefit-icon">♡</span><span><b><?php esc_html_e( 'Here to help', 'modernshop' ); ?></b><small><?php esc_html_e( 'Friendly customer care', 'modernshop' ); ?></small></span></div>
	</div></section>

	<?php if ( class_exists( 'WooCommerce' ) ) : ?>
	<section class="ms-section ms-categories"><div class="ms-container">
		<div class="ms-section-heading"><div><p class="ms-eyebrow"><?php esc_html_e( 'FIND YOUR FAVORITES', 'modernshop' ); ?></p><h2><?php esc_html_e( 'Shop by category', 'modernshop' ); ?></h2></div><a class="ms-text-link" href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>"><?php esc_html_e( 'View all categories →', 'modernshop' ); ?></a></div>
		<div class="ms-category-grid">
		<?php
		$cats = get_terms( array( 'taxonomy' => 'product_cat', 'hide_empty' => true, 'number' => 4, 'parent' => 0 ) );
		if ( ! is_wp_error( $cats ) && $cats ) :
			foreach ( $cats as $cat ) :
				$thumb_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
				$image = $thumb_id ? wp_get_attachment_image_url( $thumb_id, 'large' ) : '';
				?>
				<a class="ms-category-card" href="<?php echo esc_url( get_term_link( $cat ) ); ?>">
					<div class="ms-category-image"><?php if ( $image ) : ?><img src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $cat->name ); ?>" loading="lazy"><?php else : ?><span>✳</span><?php endif; ?></div>
					<div><h3><?php echo esc_html( $cat->name ); ?></h3><span><?php echo esc_html( sprintf( _n( '%s item', '%s items', $cat->count, 'modernshop' ), number_format_i18n( $cat->count ) ) ); ?> ↗</span></div>
				</a>
			<?php endforeach;
		else : ?>
			<div class="ms-category-placeholder"><span>✳</span><b><?php esc_html_e( 'Your categories will appear here', 'modernshop' ); ?></b><small><?php esc_html_e( 'Add product categories in WooCommerce to populate this section.', 'modernshop' ); ?></small></div>
		<?php endif; ?>
		</div>
	</div></section>

	<section class="ms-section ms-featured" id="ms-featured"><div class="ms-container">
		<div class="ms-section-heading"><div><p class="ms-eyebrow"><?php esc_html_e( 'THE COMMUNITY LOVES THESE', 'modernshop' ); ?></p><h2><?php esc_html_e( 'Bestsellers', 'modernshop' ); ?></h2><p class="ms-heading-sub"><?php esc_html_e( 'A few favorites worth getting to know.', 'modernshop' ); ?></p></div><a class="ms-text-link" href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>"><?php esc_html_e( 'Shop everything →', 'modernshop' ); ?></a></div>
		<?php echo do_shortcode( '[products limit="4" columns="4" best_selling="true"]' ); ?>
	</div></section>

	<section class="ms-promo"><div class="ms-container ms-promo-inner"><div><p class="ms-eyebrow"><?php esc_html_e( 'A BETTER WAY TO SHOP', 'modernshop' ); ?></p><h2><?php esc_html_e( 'Find your next', 'modernshop' ); ?><br><em><?php esc_html_e( 'favorite thing.', 'modernshop' ); ?></em></h2><p><?php esc_html_e( 'Explore the collection and make room for something good.', 'modernshop' ); ?></p><a class="ms-button ms-button-light" href="<?php echo esc_url( wc_get_page_permalink( 'shop' ) ); ?>"><?php esc_html_e( 'Explore the shop', 'modernshop' ); ?> <span>→</span></a></div><div class="ms-promo-shape"><span>✳</span><b>GOOD<br>BY DESIGN</b></div></div></section>
	<?php endif; ?>
</main>
<?php get_footer(); ?>
