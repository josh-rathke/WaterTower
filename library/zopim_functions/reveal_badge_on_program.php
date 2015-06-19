<?php

function reveal_badge_on_program() {
    if ( 'program' == get_post_type() || is_archive('program') ) { ?>
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