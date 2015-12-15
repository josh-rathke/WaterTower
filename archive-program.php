<?php

/**
 *    Program Archive Page Template
 *    This page template displays all of the programs
 *    we offer.
 *
 *    Template Name: Programs Archive
 */

//	Get Page ID from the slug
$page_id = get_id_by_slug( 'programs' );

// Get all program classifications
$program_classifications = get_terms( 'program_classification' );

get_header();

?>



<div class="row">
	
	<div class="medium-9 columns archive-program-content-container entry">
		
		<h1><?php echo get_the_title( $page_id ); ?></h1>
    <?php echo get_post_field( 'post_content', $page_id ); ?>

    <?php

	// Loop through all of the program classifications
	foreach ( $program_classifications as $program_classification ) {

		$archive_program_query_args = array(
			'nopaging'             => true,
			'post_type'                  => 'program',
			'program_classification'     => $program_classification->slug,
		); ?>
		   
       <div id="<?php echo $program_classification->slug; ?>" data-magellan-destination="<?php echo $program_classification->slug; ?>" class="program-archive-programs-container">
        <?php $archive_program_query = new WP_Query( $archive_program_query_args ); ?>
        <?php if ( $archive_program_query->have_posts() ) : ?>
		   		<h2 class="program-archive-title"><?php echo $program_classification->name; ?></h2>
        <?php while ( $archive_program_query->have_posts() ) : $archive_program_query->the_post();
				   
            // Retrieve ProgramInfo Object
            $program_info = new programInfo($post->ID); ?>
           
				   <div class="row program-archive-program-container">
				   	<div class="medium-4 columns program-archive-program-image">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail( 'medium' ); ?>
                        </a>
				   	</div>
				   	<div class="medium-8 columns program-archive-program-content">
				   		<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                        <?php 
                        
                        // Display Program Excerpt
                        echo get_excerpt_by_id( $post->ID, 38, false );
                        
                        if ($program_info->rolling_enrollment_status == 1) {
                            echo '<span class="school-instance"><i class="fa fa-refresh"></i> Rolling Enrollment</span>';
                        } else {
                            if (count($program_info->schedule) > 0) {
                                foreach ($program_info->schedule as $school) {
                                    echo '<a href="' . get_the_permalink() . '#upcoming-schools"><span class="school-instance"><i class="fa fa-thumb-tack"></i> ' . $school['quarter'] . '</span></a>';
                                }
                            }
                        }
        
                        ?>
                        
                        
                        
                        
				   	</div>
				   </div>
				   
        <?php
endwhile; ?>
        <?php
endif; ?>
       </div>
        <?php wp_reset_postdata(); ?>
		   
    <?php
	} ?>
	</div>
	
	<div class="medium-3 columns stick-to-parent-side-nav">
		<div class="magellan-container" data-magellan-expedition>
		  <dl class="sub-nav side-nav-container side-nav-by-heading">
		  </dl>
		</div>
	</div>

</div>
   
<?php get_footer(); ?>
