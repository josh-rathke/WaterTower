<?php

/**
 *	Program Archive Page Template
 *	This page template displays all of the programs
 * 	we offer.
 * 
 *	Template Name: Target Nations
 */
 
//	Get Page ID from the slug
$page_id = get_id_by_slug('target-nations');

get_header();
?>

<div class="row target-nations-archive-container">
	<div class="medium-8 columns">
		
		<h1><?php echo get_the_title($page_id); ?></h1>
		<?php echo apply_filters('the_content', get_post_field('post_content', $page_id)); ?>
		
		<?php
		$the_query = new WP_Query( 'post_type=target_nations' );
		
		// Loop through Target Nations
		if ( $the_query->have_posts() ) {
			echo '<ul class="small-block-grid-2 medium-block-grid-2 large-block-grid-3 target-nations-archive-preview">';
			while ( $the_query->have_posts() ) {
				$the_query->the_post();
				echo '<li>';
				echo '<a href="#' . $post->post_name . '">';
					the_post_thumbnail('thumbnail-card');
					echo '<h4>' . get_the_title() . '</h4>';
				echo '</a>';
				echo '</li>';
			}
			echo '</ul>';
		} else {
			// no posts found
		}
		wp_reset_postdata();	
		?>
		
		
		
		<?php
		$the_query = new WP_Query( 'post_type=target_nations' );
		
		// Loop through Target Nations
		if ( $the_query->have_posts() ) {
			while ( $the_query->have_posts() ) {
				$the_query->the_post();
				
				$country_info = jp_country_info(strtoupper(rwmb_meta('country_id', '', $post->ID)));
				echo $country_info['data'][0]['PercentChristianity'];
				
				echo '<h2 class="target-nation-section-title">' . get_the_title() . '<span>' . number_format($country_info['data'][0]['PercentChristianity'], 2) . '% Christian</span></h2>'; ?>
				
				<ul class="medium-block-grid-3 target-nation-info">
					<li>
						<div>Population</div>
						<div><?php echo number_format($country_info['data'][0]['Population']); ?></div>
					</li>
					<li>
						<div>National Religion</div>
						<div><?php echo $country_info['data'][0]['ReligionPrimary']; ?></div>
					</li>
					<li>
						<div>Official Language</div>
						<div><?php echo $country_info['data'][0]['OfficialLang']; ?></div>
					</li>
				</ul>
				
				<?php the_content();
			}
		} else {
			// no posts found
		}
		wp_reset_postdata();	
		?>
		
	</div>
	
	<aside id="sidebar" class="medium-4 columns stick-to-parent">
		<?php dynamic_sidebar("target_nations_archive"); ?>
	</aside>
</div>


<?php get_footer(); ?>
