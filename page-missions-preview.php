<?php

/**
 *    Missions Preview Page Template
 *    This is the page template for the
 *    campus tour page.
 *
 *    Template Name: Missions Preview
 */

get_header(); ?>


<div class="row missions-preview">
    <div class="columns medium-8">
        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>
        
        <div class="row missions-preview-schedule" data-equalizer>
            <div class="medium-6 columns panel" data-equalizer-watch>
                <h4>Friday Schedule</h4>
                <div class="schedule-content">
                    <?php echo rwmb_meta('missions_preview_friday_schedule'); ?>
                </div>
            </div>
            
            <div class="medium-6 columns panel sidebar" data-equalizer-watch>
                <h4>Saturday Schedule</h4>
                <div class="schedule-content">
                    <?php echo rwmb_meta('missions_preview_saturday_schedule'); ?>
                </div>
            </div>
        </div>
    </div>
    
    <div class="columns medium-4 stick-to-parent minimal-gf-form">
        <div class="missions-preview-form-container">
            <h4>Want More Info?</h4>
            <?php echo do_shortcode(rwmb_meta('missions_preview_form_shortcode')); ?>
        </div>
    </div>
</div>
    

<?php get_footer(); ?>