<?php

/**
 *    Campus Tour Page Template
 *    This is the page template for the
 *     campus tour page.
 *
 *    Template Name: Campus Tour
 */

get_header();

// Build Campus Tour Venues Query
$tour_venues = new WP_Query( 'post_type=tribe_venue' );

// Start the Page Loop
if ( have_posts() ) : while ( have_posts() ) : the_post();
?>

<div class="row campus-tour-desc-container">
	<div class="medium-7 columns campus-tour-desc">
		<h1><?php the_title(); ?></h1>
    <?php the_content(); ?>
	</div>
	
	<div class="medium-5 columns campus-tour-how-to">
		<h5>How To Use The Tour<i class="fa fa-info info-circle"></i></h5>
		<p><?php echo rwmb_meta( 'campus_tour_howto' ); ?></p>
	</div>
</div>



<div class="row">
	<div class="small-12 columns">	
    <?php

	/**
	 *     Loop Through Venues
	 *     This loops through all of the venues that
	 *     have been labeled as included in the tour.
	 */

	if ( $tour_venues->have_posts() ) {
		while ( $tour_venues->have_posts() ) {
			echo '<div class="row campus-tour-location-container">';
			$tour_venues->the_post();

			$photosphere_id = rwmb_meta( 'photosphere_id' );
			$photosphere_url = rwmb_meta( 'photosphere_url' );

			if ( rwmb_meta( 'include_in_tour' ) ) {
				echo '<div class="medium-4 columns">';
				echo '<a href="#_" onclick="setPano2link(\'' . $photosphere_id . '\')">' . get_the_post_thumbnail( $post->ID, 'thumbnail-card' ) . '</a>';
				echo '</div>';

				echo '<div class="medium-8 columns">';
				echo '<h3>' . get_the_title() . '</h3>';
				the_content();

				echo '<div class="campus-tour-location-footer">';
				echo '<a href="#_" onclick="setPano2link(\'' . $photosphere_id . '\')"><i class="fa fa-street-view"></i> Take Virtual Tour</a>';
				echo "<a href='{$photosphere_url}'><i class='fa fa-google'></i> View on Google Maps</a>";
				echo '</div>';
				echo '</div>';
			}

			echo '</div>';
		}
	}
	wp_reset_postdata();

	?>
	</div>
</div>

<?php

// End the Page Loop
endwhile;
endif;

get_footer(); ?>
