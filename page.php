<?php get_header(); ?>
<main id="primary" class="site-main"><div class="ms-container ms-content">
<?php while ( have_posts() ) : the_post(); ?>
	<article <?php post_class( 'ms-page-article' ); ?>>
		<header class="ms-page-header"><p class="ms-eyebrow"><?php esc_html_e( 'MORE ABOUT US', 'modernshop' ); ?></p><h1><?php the_title(); ?></h1></header>
		<div class="entry-content"><?php the_content(); wp_link_pages(); ?></div>
	</article>
<?php endwhile; ?>
</div></main>
<?php get_footer(); ?>
