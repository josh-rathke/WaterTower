<?php

function reveal_badge_on_program() {
    if ( 'program' == get_post_type() || is_archive('program') ) {
        echo '<script>';
            echo '$zopim(function() {';
                echo '$zopim.livechat.addTags("program-page");';
            echo '});';
        echo '</script>';
    }
}

add_action( 'wp_footer', 'reveal_badge_on_program' );

?>