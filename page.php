<?php get_header(); ?>

<div class="row">
	<div class="small-12 large-8 columns" role="main">

    <?php do_action( 'watertower_before_content' ); ?>

    <?php while ( have_posts() ) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header>
    <?php do_action( 'watertower_page_before_entry_content' ); ?>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
		</article>
    <?php
endwhile;?>

    <?php do_action( 'watertower_after_content' ); ?>

	</div>
    	
    	<?php 
    	/**
		 *	Check for type of sidebar to display on pages,
		 *	then display the correct sidebar.
		 */
		 
		if ( rwmb_meta('page_sidebar') == 'headings') { ?>
			
			<div class="large-3 columns stick-to-parent-side-nav">
		 		<div class="magellan-container" data-magellan-expedition>
				  <dl class="sub-nav side-nav-container side-nav-by-heading">
				  </dl>
				</div>
		 	</div>
			
		<?php } else { ?>
			<div class="large-4 columns">
				<?php get_sidebar(); ?>
			</div>
		<?php }?>
		
</div>
<?php get_footer(); ?>