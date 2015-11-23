<div class="standard-banner-container slide-container featured-video-container" style="background: url( <?php $post_thumbanail[0]; ?>) no-repeat center center;">

    <?php // Display Featured Video Banner for Posts ?>
    <style>
        .entry-title {
            display: none;
        }
    </style>
    <div class="row vertical-align-relative" style="z-index: 9;">
        <div class="small-12 columns slide-content-container" style="text-align: center;">
            <h2 class="fittext"><?php the_title(); ?></h2>

            <?php if (get_post_type() == 'post') { ?>
                <p>Written By:
                    <?php coauthors(); ?>
                </p>
            <?php } ?>
        </div>
    </div>

    <?php
        $video_vertical_alignment = rwmb_meta('video_alignment');
        print_r($video_vertical_alignment);
        
        switch ($video_vertical_alignment) {
            case top: $video_alignment_style = 'top: 0px'; break;
            case middle: $video_alignment_style = 'top: 50%; transform: translateY(-50%);'; break;
            case bottom: $video_alignment_style = 'bottom: 0px'; break;
            default: $video_alignment_stle = 'top: 50%; transform: translateY(-50%);';
        }
        
    ?>
    <video class="hide-for-small" style="<?php echo $video_alignment_style; ?>" autoplay loop muted>

        <?php // Get Video File URLS 
        $mp4_file = reset(rwmb_meta( 'mp4_file', 'type=file')); 
        $webm_file = reset(rwmb_meta( 'webm_file', 'type=file')); ?>

        <source src="<?php echo $mp4_file['url']; ?>" type="video/mp4">
            <source src="<?php echo $webm_file['url']; ?>" type="video/webm">
                Your browser does not support the video tag.
    </video>

</div>