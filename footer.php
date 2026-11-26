<footer class="site-footer">
	<div class="ms-container">
		<div class="ms-footer-grid">
			<div class="ms-footer-brand"><a class="site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?><span>.</span></a><p><?php esc_html_e( 'Everyday essentials, thoughtfully selected. Quality products and a smoother way to shop.', 'modernshop' ); ?></p></div>
			<div><h3><?php esc_html_e( 'Explore', 'modernshop' ); ?></h3><?php wp_nav_menu( array( 'theme_location' => 'footer', 'container' => false, 'fallback_cb' => '__return_empty_string' ) ); ?></div>
			<div><h3><?php esc_html_e( 'Customer care', 'modernshop' ); ?></h3><ul><li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>"><?php esc_html_e( 'Contact us', 'modernshop' ); ?></a></li><li><a href="<?php echo esc_url( home_url( '/shipping-returns/' ) ); ?>"><?php esc_html_e( 'Shipping & returns', 'modernshop' ); ?></a></li><li><a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>"><?php esc_html_e( 'Privacy policy', 'modernshop' ); ?></a></li></ul></div>
			<div><h3><?php esc_html_e( 'Stay in the loop', 'modernshop' ); ?></h3><p><?php esc_html_e( 'New arrivals, useful updates and occasional offers.', 'modernshop' ); ?></p></div>
		</div>
		<div class="ms-footer-bottom"><span>© <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'All rights reserved.', 'modernshop' ); ?></span><span><?php esc_html_e( 'Powered by WordPress & WooCommerce', 'modernshop' ); ?></span></div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
