<?php

function reveal_badge_on_program() {
    $archives_to_display_on = array('program', 'staffing-needs');
    
    if ( 'program' == get_post_type() || is_post_type_archive( $archives_to_display_on ) ) { ?>
        <script>
        $zopim(function() {
            $zopim.livechat.addTags("program-page");
            window.setTimeout(function() {
                $('.chat-badge').css('display', 'block' );
            }, 30000);
        });
        </script>
    <?php }
}

add_action( 'wp_footer', 'reveal_badge_on_program' );

?>