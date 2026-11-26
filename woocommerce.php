<?php
/**
 * WooCommerce page fallback. WooCommerce renders the page content through its hooks.
 */
get_header();
woocommerce_content();
get_footer();
