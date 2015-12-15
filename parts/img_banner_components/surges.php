<?php

/**
 *  Display Surges Header
 */

$post_thumbanail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full-width-banner', true ); ?>

<div class="slideshow-wrapper primary-slider surge-banner">
    <ul class="orbit-slider" data-orbit data-options="resume_on_mouseout:false;navigation_arrows:false;slide_number:false;timer:false;">
        <li class="slide-container">
            <div class="orbit-slider-placeholder" style="background: url('<?php echo $post_thumbanail[0]; ?>') no-repeat center center;">
                <div class="row slide-content-container center-banner-content vertical-align-relative">
                    <div class="small-10 columns small-centered">

                        <h2 class="fittext shadow">The Surge</h2>
                        <h2 class="fittext">The Surge</h2>

                        <div class="img-banner-subtitle">Taiwan: 2014-2018</div>

                    </div>
                </div>
            </div>
        </li>
    </ul>
</div>