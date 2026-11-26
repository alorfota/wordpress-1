<?php get_header(); ?>
<main id="primary" class="site-main"><div class="ms-container ms-content">
<?php while ( have_posts() ) : the_post(); ?>
	<article <?php post_class( 'ms-post-article' ); ?>>
		<header class="ms-page-header"><p class="ms-eyebrow"><?php echo esc_html( get_the_date() ); ?></p><h1><?php the_title(); ?></h1></header>
		<?php if ( has_post_thumbnail() ) : ?><div class="ms-post-featured"><?php the_post_thumbnail( 'large' ); ?></div><?php endif; ?>
		<div class="entry-content"><?php the_content(); wp_link_pages(); ?></div>
	</article>
<?php endwhile; ?>
</div></main>
<?php get_footer(); ?>
