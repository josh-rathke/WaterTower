<?php

function append_cpt_to_body_class($classes) {
    $post_type = get_post_type();
    $queried_object = get_queried_object();
    
    // Get Post Type and Add Class
    if( 'post' != get_post_type() ) {
        $classes[] = 'cpt-' . $post_type;
          return $classes;
    }
}

?>