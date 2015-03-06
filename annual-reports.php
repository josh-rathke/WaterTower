<?php

/**
 *	Annual Reports Page Template
 *	This page template displays all of the programs
 * 	we offer.
 * 
 *	Template Name: Annual Reports
 */
 
//	Get Page ID from the slug
$page_id = get_id_by_slug('annual-reports');

get_header();


// The Query
$annual_reports = new WP_Query( 'post_type=page&page_category=annual-report' ); ?>

<div class="row annual-reports-archive-container">
	<div class="medium-8 columns">
		
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>
		
			<ul class="small-block-grid-2 annual-reports-list">
				<?php
				
				// The Loop
				if ( $annual_reports->have_posts() ) : while ( $annual_reports->have_posts() ) : $annual_reports->the_post();
						echo '<li><a href="#" data-reveal-id="reveal-' . $post->post_name . '">' . get_the_post_thumbnail($post->ID, 'thumbnail-card') . '<div class="fittext-large vertical-align-absolute">' . rwmb_meta('year_range') . '</div></a></li>'; ?>
						
						<div class="reveal-modal-bg" style="display: none"></div>
				 		<div id="reveal-<?php echo $post->post_name; ?>" class="reveal-modal annual-report-modal large" data-reveal>
				 			
							<?php echo rwmb_meta('embed_code'); ?>
				 			
						</div>
					
					<?php
					endwhile; endif;
				wp_reset_postdata();
				?>
			</ul>
		
		<?php endwhile; else : ?>
			<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
		<?php endif; ?>
		
	</div>
	
	<div class="medium-4 columns">
		<?php get_sidebar(); ?>
	</div>
	
</div>



<?php get_footer(); ?>
