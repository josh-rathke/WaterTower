<?php

/**
 * Sidebar
 * This file should contain all of the necessary to
 * display the correct sidebar for each page throughout
 * the website.
 */


	// Archives/Blog Sidebar
if ( is_archive() || is_home() ) {

	// Program Blogs Sidebar
	if ( is_tax( 'program_taxo' ) ) {

		$queried_object = get_queried_object();
		$program_id = get_page_by_path( $queried_object->slug, OBJECT, 'program' )->ID;
		$program = new ProgramInfo( $program_id );

		?>
		
     <div class="program-snapshot-container">
      <h4><i class='fa fa-calendar'></i>Upcoming Schools<i class='fa fa-caret-down'></i></h4>
			
			
        <?php if ( $program->schedule ) : ?>
				<?php foreach ( $program->schedule as $program_instance ) : ?>
					
					<div class="program-snapshot-instance">
						<h6><?php echo $program_instance['quarter']; ?></h6>
						<div>Start Date:<span class="right"><?php echo date( 'm/d/y', strtotime( $program_instance['start_date'] ) ); ?></span></div>
						<div>End Date:<span class="right"><?php echo date( 'm/d/y', strtotime( $program_instance['end_date'] ) ); ?></span></div>
						<div>Cost:<span class="right"><?php echo $program_instance['total_cost']; ?></span></div>
					</div>
					
				<?php
endforeach; ?>
    <?php else : ?>
				<p>Sorry, but there are currently no upcoming dates for this school. If you think this may be a mistake, please feel free to contact our registrar at registrar@ywammontana.org.</p>
    <?php
endif; ?>
			
      <a href="<?php echo of_get_option( 'apply_url' ); ?>" class="button">Apply Now</a>
			
     </div>
	
    <?php
	// Standard Archives Sidebar
	} else {

		dynamic_sidebar( 'archives_sidebar' ); ?>
			
     <div class="tag-cloud">
      <h4><i class='fa fa-tags'></i>Popular Tags<i class='fa fa-caret-down'></i></h4>
        <?php $args = array(
		'smallest'                  => 12,
		'largest'                   => 12,
		'unit'                      => 'pt',
		'number'                    => 25,
		'format'                    => 'flat',
		'separator'                 => "\n",
		'orderby'                   => 'name',
		'order'                     => 'ASC',
		'exclude'                   => null,
		'include'                   => null,
		'topic_count_text_callback' => default_topic_count_text,
		'link'                      => 'view',
		'taxonomy'                  => 'post_tag',
		'echo'                      => true,
		'child_of'                  => null,
				);

				wp_tag_cloud( $args );
				?>
     </div>
		
    <?php

	}



	// Single Sidebar
} elseif ( is_single() ) { ?>
	
	<div class="post-author-container">
		<h4><i class='fa fa-user'></i>Post Author<i class='fa fa-caret-down'></i></h4>
		
    <?php

	/**
		 *     Display Author of Post in Sidebar
		 *     So far not compatible with the "married_couples" array within
		 *     the Authors Class. It only scans the singles array.
		 */

	$authors = new AuthorInfo( $post->ID );

	foreach ( $authors->singles as $author ) {

		echo get_the_post_thumbnail( $author['ID'], 'thumbnail-card' );
		echo '<h5>' . $author['author_info']['display_name'] . '</h5>';
		echo '<p>' . $author['author_info']['description'] . '</p>';
		echo '<ul>';
		echo '<li><a href="' . get_bloginfo( 'url' ) . '/author/' . $author['author_info']['user_login'] . '"><i class="fa fa-paper-plane-o"></i> View All Posts (' . $author['author_info']['post_count'] . ')</a></li>';
		echo $author['author_info']['website'] ? '<li><a href="' . $author['author_info']['website'] . '"><i class="fa fa-globe"></i> ' . properize( $author['author_info']['first_name'] ) . ' Website </a></li>' : null ;
		echo '<li><i class="fa fa-map-marker"></i> Hometown: ' . $author['author_info']['hometown'] . '</li>';
		echo '</ul>';
	}

	?>
		
	</div>
    <?php dynamic_sidebar( 'single_sidebar' );



	// Default Sidebar
} else {
	dynamic_sidebar( 'default_sidebar' );
}

?>
