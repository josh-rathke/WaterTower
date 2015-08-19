<?php

// Archive for Surges

$page_id = get_id_by_slug( 'the-surge' );
echo $page_id;
query_posts("p={$page_id}&post_type=page");

get_header(); 

// Begin looping through custom page content
if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


<div class="row">
    <div class="columns medium-8">
        <?php the_content(); ?>
    </div>
    
    <div class="columns medium-4">
        <h2>Active Surges</h2>
    </div>
</div>

<?php endwhile; else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif;

get_footer(); ?>