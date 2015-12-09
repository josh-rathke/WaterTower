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
        
        <h2>Base Directors</h2>
        <?php display_authors( $post->ID ); ?>
        
        <?php
        
        $function_prefix = '_100foldstudio';
        
        $foo = "{$function_prefix} . '_foo";
        function $foo() {
            echo 'Foo';
        }
        
        $bar = "{$function_prefix} . '_bar";
        function $bar() {
            echo 'Bar';
        }
        
        _100foldstudio_foo();
        _100foldstudio_bar();
        
    </div>
    
</div>


<?php get_footer(); ?>