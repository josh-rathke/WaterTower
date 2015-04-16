<?php

/**
 *    Front Page
 *     Template Name: Front Page
 *
 *    This is the template for the front page.
 */

function front_page_hr($title)
{
	echo "<div class='row front-page-hr-container'>";
	echo "<div class='small-12 columns'><div>";
	echo $title ? '<h3 class="front-page-hr-title">' . $title . '</h3>' : null;
	echo '</div></div>';
	echo '</div>';
}

get_header();

// Start Wordpress Loop
if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<div class="row front-page-widgets-container">
    <?php dynamic_sidebar( 'home-page-middle' ); ?>
</div>



<?php

/**
 *    Upcoming Schools Section
 *
 *     This section displays a list of the six most
 *     upcoming schools.
 */

	front_page_hr( 'Upcoming Schools' );

	$upcoming_schools = get_upcoming_schools( 6 );

	echo '<div class="row"><div class="small-12 columns">';
	echo '<ul class="row small-block-grid-2 medium-block-grid 3 large-block-grid-6 front-page-upcoming-schools-container">';
foreach ( $upcoming_schools->schools as $upcoming_school ) {


	echo '<li>';
			 echo '<a href="' . get_permalink( $upcoming_school['program_id'] ) . '">';
			 $program_color = get_program_color( $upcoming_school['program_id'] );

			 $thumbnail_args = array(
			 	'style' => "border: 3px solid {$program_color}",
			 );

			 echo get_the_post_thumbnail( $upcoming_school['program_id'], 'thumbnail', $thumbnail_args );

			 echo '<div class="upcoming-school-title">' .  $upcoming_school['program_name'] . '</div>';
			 echo '</a>';
	echo '</li>';

}
	echo '</ul></div>';
	echo '</div>';
	?>

<?php

/**
 *    Call To Action Section
 *
 *     This section is used to call a specific
 *     page or link to action.
 */

if ( rwmb_meta( 'enable_cta' ) ) :

?>
	
<div class="front-page-call-to-action-container">
	<div class="row">
		<div class="medium-9 columns">
			<h3><?php echo rwmb_meta( 'cta_title' ); ?></h3>
			<p><?php echo rwmb_meta( 'cta_description' ); ?></p>
		</div>
		
		<div class="medium-3 columns">
			<a href="<?php echo rwmb_meta( 'cta_link_url' ); ?>" class="button"><?php echo rwmb_meta( 'cta_button_text' ); ?></a>
		</div>
	</div>
</div>

<?php
endif; ?>


<div class="row front-page-featured-video-container">
	<div class="small-12 columns">
		<div class="row">
			<div class="medium-6 columns">
				<div class="flex-video widescreen vimeo">
        <?php echo rwmb_meta( 'video_embed_code' ); ?>
				</div>
			</div>
			<div class="medium-6 columns">
				<div class="front-page-featured-video-desc">
					<h3><?php echo rwmb_meta( 'video_title' ); ?></h3>
					<p><?php echo rwmb_meta( 'video_desc' ); ?></p>
					
					<div class="front-page-video-link-container">
						<a href="<?php echo rwmb_meta( 'video_link_url' ); ?>"><i class="fa fa-long-arrow-right"></i><?php echo rwmb_meta( 'video_link_text' ); ?></a>
					</div>
					
					<ul class="front-page-video-related-programs">
						<strong>Related Programs:</strong> 
        <?php

		$related_program_ids = rwmb_meta( 'video_related_programs', 'multiple=true' );

		foreach ( $related_program_ids as $related_program_id ) {
			echo '<li><a href="' . get_permalink( $related_program_id ) . '">' . get_the_title( $related_program_id ) . '</a></li>';
		}
		?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>





<?php

// End Wordpress Loop
endwhile;
endif;

get_footer(); ?>
