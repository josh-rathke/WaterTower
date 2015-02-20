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
	<div class="large-9 columns entry" data-magellan-destination="school-leaders">
		
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
				
				echo '<h2 class="target-nation-section-title">' . get_the_title() . '<span>' . number_format($country_info['data'][0]['PercentChristianity'], 2) . '% Christian</span></h2>'; ?>
				
				<?php the_post_thumbnail('full-width-banner'); ?>
				
				<?php the_content(); ?>
				
				<ul class="medium-block-grid-3 target-nation-info">
					<li>
						<i class="fa fa-child target-nation-info-icon"></i>
						<div class="target-nation-info-content-container">
							<div class="target-nation-info-title">Population</div>
							<div class="target-nation-info-content"><?php echo number_format($country_info['data'][0]['Population']); ?></div>
						</div>
					</li>
					<li>
						<i class="fa fa-globe target-nation-info-icon"></i>
						<div class="target-nation-info-content-container">
							<div class="target-nation-info-title">National Religion</div>
							<div class="target-nation-info-content"><?php echo $country_info['data'][0]['ReligionPrimary']; ?></div>
						</div>
					</li>
					<li>
						<i class="fa fa-comments-o target-nation-info-icon"></i>
						<div class="target-nation-info-content-container">
							<div class="target-nation-info-title">Official Language</div>
							<div class="target-nation-info-content"><?php echo $country_info['data'][0]['OfficialLang']; ?></div>
						</div>
					</li>
				</ul>
				
			<?php }
		} else {
			// no posts found
		}
		wp_reset_postdata();	
		?>
		
	</div>
	
	<div class="large-3 columns stick-to-parent">
 		<div class="magellan-container" data-magellan-expedition>
		  <dl class="sub-nav side-nav-container side-nav-by-heading">
		  </dl>
		</div>
 	</div>
</div>


<?php get_footer(); ?>
