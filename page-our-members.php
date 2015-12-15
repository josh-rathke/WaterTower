<?php

/**
 *    Missionary Member Page Template
 *    This is the page template for the
 *    our members page.
 *
 *    Template Name: Our Members
 */

get_header(); ?>

<div class="row">

    <div class="columns medium-8">
        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>
        <?php display_authors( $post->ID ); ?>
        
        <h2>Base Directors</h2>
        
    </div>
    
</div>


<?php get_footer(); ?>