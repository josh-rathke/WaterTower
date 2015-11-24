<div class="promote-post-container">
    <div class="row">
        <div class="columns medium-5">
            <?php echo get_the_post_thumbnail($post_id, 'thumbnail-card'); ?>
            <a href="<?php echo get_permalink($post_id); ?>" class="button" style="margin-top: 15px;margin-bottom: 0px;width:100%;">Learn More</a>
        </div>
        <div class="columns medium-7">
            <a href="<?php echo get_permalink($post_id); ?>"><h4><?php echo $title; ?></h4></a>
            <p><?php echo $description ? $description : get_excerpt_by_id($post_id); ?></p>
        </div>
    </div>
</div>