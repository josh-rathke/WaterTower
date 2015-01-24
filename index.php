<?php 

/**
 *	Blog Template
 *	This displays all of the different blog views for
 *	the site.
 */
 
$page_id = get_id_by_slug('blog');

get_header(); 
?>
<div class="row content-archive-container">
	<div class="small-12 large-9 columns" role="main">
		
	<?php get_template_part( 'parts/archive_header' ); ?>

	<?php if ( have_posts() ) : ?>

		<?php do_action('foundationPress_before_content'); ?>

		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content' ); ?>
		<?php endwhile; ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>

		<?php do_action('foundationPress_before_pagination'); ?>

	<?php endif;?>



	<?php if ( function_exists('FoundationPress_pagination') ) { FoundationPress_pagination(); } else if ( is_paged() ) { ?>
		<nav id="post-nav">
			<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'FoundationPress' ) ); ?></div>
			<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'FoundationPress' ) ); ?></div>
		</nav>
	<?php } ?>

	<?php do_action('foundationPress_after_content'); ?>

	</div>
	
	<aside id="sidebar" class="small-12 large-3 columns">
		<?php get_sidebar(); ?>
	</aside>
</div>
<?php get_footer(); ?>
