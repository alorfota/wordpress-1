<?php get_header(); ?>
<main id="primary" class="site-main"><div class="ms-container ms-content">
	<header class="ms-page-header"><p class="ms-eyebrow"><?php esc_html_e( 'THE JOURNAL', 'modernshop' ); ?></p><h1><?php echo esc_html( is_search() ? sprintf( __( 'Search results for: %s', 'modernshop' ), get_search_query() ) : ( is_home() ? __( 'Latest stories', 'modernshop' ) : get_the_archive_title() ) ); ?></h1></header>
	<div class="ms-post-grid">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<article <?php post_class( 'ms-post-card' ); ?>>
			<a href="<?php the_permalink(); ?>"><?php if ( has_post_thumbnail() ) : the_post_thumbnail( 'medium_large' ); else : ?><div class="ms-post-placeholder">✳</div><?php endif; ?></a>
			<div><small><?php echo esc_html( get_the_date() ); ?></small><h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2><?php the_excerpt(); ?><a class="ms-text-link" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read story →', 'modernshop' ); ?></a></div>
		</article>
	<?php endwhile; the_posts_pagination(); else : ?><p><?php esc_html_e( 'Nothing found. Try another search.', 'modernshop' ); ?></p><?php endif; ?>
	</div>
</div></main>
<?php get_footer(); ?>
