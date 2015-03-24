<?php 

/**
 *    Acceptance Packet Single View
 *     
 *     This is the single post view for the acceptance
 *     packets. We have purposefully not allowed the
 *     pages to be archived.
 */
 
$page_id = rwmb_meta('related_program');

get_header();

?>

<div class="row acceptance-packet-container">
	<div class="medium-9 columns entry">
    <?php if (have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
			<h1><?php the_title(); ?></h1>
    <?php the_content(); ?>
			
    <?php 
endwhile; else : ?>
			<p><?php _e('Sorry, we could not find that acceptance packet.'); ?></p>
    <?php 
endif; ?>
		
    <?php
    
    /**
         *    Leader Section
         *     This section displays all of the leaders of the
         *     particular program.
         */                                    
                                        
    $terms = rwmb_meta('leaders', 'type=select&multiple=1');
        
    if (!empty($terms)) {
        echo '<div data-magellan-destination="school-leaders" class="authors-container program-leaders-container">';
        echo '<h2>Your School Leaders</h2>';
        foreach ( $terms as $term ) {
            $author_object = get_post($term, OBJECT);
            $leader_ids[] = $author_object->ID;
        }
        display_authors($program_id, $leader_ids);
        echo '</div>';
    }
            
    ?>
	</div>
	
	<div class="medium-3 columns stick-to-parent">
		<div class="magellan-container" data-magellan-expedition>
		  <dl class="sub-nav side-nav-container side-nav-by-heading">
		  </dl>
		</div>
	</div>
</div>

<?php get_footer() ?>
