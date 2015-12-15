<?php

/**
 *    Template Name: About
 */

get_header(); ?>

<div class="row">

    <div class="columns medium-9 entry">
        <h1><?php the_title(); ?></h1>
        <?php the_content(); ?>
        
        
        <?php // YWAM Montana Documentary: Just Beginning ?>
        <h2>Just Beginning</h2>
        <p>After 30 years of ministry, we have more stories than we can possibly ever tell about God's faithfulness to His call on this mission. In this documentary we share just a few of those stories, and expound upon what exactly makes YWAM Montana | Lakeside tick.</p>
        <div class="just-beginning">
            
            <script>
                $(document).ready(function() {
                    $('.chapter_link').click(function(){
                        var startTime = $(this).attr('data-starttime');
                        var videoUrl = 'https://www.youtube.com/embed/NNzMkjB0seo' + '?start=' + startTime + '&autoplay=1';
                        console.log(videoUrl);
                        $('#documentary').replaceWith('<iframe id="documentary" width="400" height="225" src="' + videoUrl + '" frameborder="0" allowfullscreen></iframe>' );
                    });
                });
            </script>

            <div class="flex-video widescreen vimeo">
                <iframe id="documentary" width="400" height="225" src="https://www.youtube.com/embed/NNzMkjB0seo" frameborder="0" allowfullscreen></iframe>
            </div>
            
            <script>
                $(document).ready(function() {
                    $('.share').click(function(e) {
                        e.preventDefault();
                        window.open($(this).attr('href'), 'fbShareWindow', 'height=450, width=550, top=' + ($(window).height() / 2 - 275) + ', left=' + ($(window).width() / 2 - 225) + ', toolbar=0, location=0, menubar=0, directories=0, scrollbars=0');
                        return false;
                    });
                });
            </script>
            
            <h3><i class="fa fa-list"></i>Chapter Selection
                <a class="share" href="http://www.twitter.com/share?url=https://youtu.be/NNzMkjB0seo"><i class="fa fa-twitter right"></i></a>
                <a class="share" href="http://www.facebook.com/sharer.php?u=https://youtu.be/NNzMkjB0seo"><i class="fa fa-facebook right"></i></a>
                <span class="share-video-title right">Share</span>
            </h3>

            <ul class="chapter-menu">
                <li href="#_" class="chapter_link" data-starttime="216">
                    <b>Chapter 1</b> | The Air Force Base
                    <a href="#" class="share-link right" data-reveal-id="sharechapter1"><i class="fa fa-share-square-o"></i> Share</a>
                </li>
                <li href="#_" class="chapter_link" data-starttime="381">
                    <b>Chapter 2</b> | The Meeting
                    <a href="#" class="share-link right" data-reveal-id="sharechapter2"><i class="fa fa-share-square-o"></i> Share</a>
                </li>
                <li href="#_" class="chapter_link" data-starttime="549">
                    <b>Chapter 3</b> | The Auction
                    <a href="#" class="share-link right" data-reveal-id="sharechapter3"><i class="fa fa-share-square-o"></i> Share</a>
                </li>
                <li href="#_" class="chapter_link" data-starttime="728">
                    <b>Chapter 4</b> | Pioneering Days
                    <a href="#" class="share-link right" data-reveal-id="sharechapter4"><i class="fa fa-share-square-o"></i> Share</a>    
                </li>
                <li href="#_" class="chapter_link" data-starttime="1160">
                    <b>Chapter 5</b> | The Creek Houses
                    <a href="#" class="share-link right" data-reveal-id="sharechapter5"><i class="fa fa-share-square-o"></i> Share</a>    
                </li>
                <li href="#_" class="chapter_link" data-starttime="1413">
                    <b>Chapter 6</b> | The Arts
                    <a href="#" class="share-link right" data-reveal-id="sharechapter6"><i class="fa fa-share-square-o"></i> Share</a>
                </li>
                <li href="#_" class="chapter_link" data-starttime="1961">
                    <b>Chapter 7</b> | Discipleship Training School
                    <a href="#" class="share-link right" data-reveal-id="sharechapter7"><i class="fa fa-share-square-o"></i> Share</a>
                </li>
                <li href="#_" class="chapter_link" data-starttime="2236">
                    <b>Chapter 8</b> | Target Nations
                    <a href="#" class="share-link right" data-reveal-id="sharechapter8"><i class="fa fa-share-square-o"></i> Share</a>
                </li>
                <li href="#_" class="chapter_link" data-starttime="2494">
                    <b>Chapter 9</b> | The Boiler Room
                    <a href="#" class="share-link right" data-reveal-id="sharechapter9"><i class="fa fa-share-square-o"></i> Share</a>
                </li>
                <li href="#_" class="chapter_link" data-starttime="2728">
                    <b>Chapter 10</b> | The Bayshore
                    <a href="#" class="share-link right" data-reveal-id="sharechapter10"><i class="fa fa-share-square-o"></i> Share</a>
                </li>
                <li href="#_" class="chapter_link" data-starttime="3086">
                    <b>Chapter 11</b> | Where We Are Now
                    <a href="#" class="share-link right" data-reveal-id="sharechapter11"><i class="fa fa-share-square-o"></i> Share</a>
                </li>
                <li href="#_" class="chapter_link" data-starttime="3710">Credits</li>
            </ul>

            <div id="sharechapter1" class="share-modal reveal-modal" data-reveal role="dialog">
                <h3 id="modalTitle">Share<span>Just Beginning: Chapter 1 | The Air Force Base</span></h3>
              <p class="share-description">Thanks for sharing our story! Use the link below to send a video link to your friends starting from the chapter selected.</p>
              <p class="link-url">https://youtu.be/NNzMkjB0seo?t=216</p>
            </div>
            
            <div id="sharechapter2" class="share-modal reveal-modal" data-reveal role="dialog">
                <h3 id="modalTitle">Share<span>Just Beginning: Chapter 2 | The Meeting</span></h3>
              <p class="share-description">Thanks for sharing our story! Use the link below to send a video link to your friends starting from the chapter selected.</p>
              <p class="link-url">https://youtu.be/NNzMkjB0seo?t=381</p>
            </div>
            <div id="sharechapter3" class="share-modal reveal-modal" data-reveal role="dialog">
                <h3 id="modalTitle">Share<span>Just Beginning: Chapter 3 | The Auction</span></h3>
              <p class="share-description">Thanks for sharing our story! Use the link below to send a video link to your friends starting from the chapter selected.</p>
              <p class="link-url">https://youtu.be/NNzMkjB0seo?t=549</p>
            </div>
            <div id="sharechapter4" class="share-modal reveal-modal" data-reveal role="dialog">
                <h3 id="modalTitle">Share<span>Just Beginning: Chapter 4 | Pioneering Days</span></h3>
              <p class="share-description">Thanks for sharing our story! Use the link below to send a video link to your friends starting from the chapter selected.</p>
              <p class="link-url">https://youtu.be/NNzMkjB0seo?t=728</p>
            </div>
            <div id="sharechapter5" class="share-modal reveal-modal" data-reveal role="dialog">
                <h3 id="modalTitle">Share<span>Just Beginning: Chapter 5 | The Creek Houses</span></h3>
              <p class="share-description">Thanks for sharing our story! Use the link below to send a video link to your friends starting from the chapter selected.</p>
              <p class="link-url">https://youtu.be/NNzMkjB0seo?t=1160</p>
            </div>
            <div id="sharechapter6" class="share-modal reveal-modal" data-reveal role="dialog">
                <h3 id="modalTitle">Share<span>Just Beginning: Chapter 6 | The Arts</span></h3>
              <p class="share-description">Thanks for sharing our story! Use the link below to send a video link to your friends starting from the chapter selected.</p>
              <p class="link-url">https://youtu.be/NNzMkjB0seo?t=1413</p>
            </div>
            <div id="sharechapter7" class="share-modal reveal-modal" data-reveal role="dialog">
                <h3 id="modalTitle">Share<span>Just Beginning: Chapter 7 | Discipleship Training School</span></h3>
              <p class="share-description">Thanks for sharing our story! Use the link below to send a video link to your friends starting from the chapter selected.</p>
              <p class="link-url">https://youtu.be/NNzMkjB0seo?t=1961</p>
            </div>
            <div id="sharechapter8" class="share-modal reveal-modal" data-reveal role="dialog">
                <h3 id="modalTitle">Share<span>Just Beginning: Chapter 8 | Target Nations</span></h3>
              <p class="share-description">Thanks for sharing our story! Use the link below to send a video link to your friends starting from the chapter selected.</p>
              <p class="link-url">https://youtu.be/NNzMkjB0seo?t=2236</p>
            </div>
            <div id="sharechapter9" class="share-modal reveal-modal" data-reveal role="dialog">
                <h3 id="modalTitle">Share<span>Just Beginning: Chapter 9 | The Boiler Room</span></h3>
              <p class="share-description">Thanks for sharing our story! Use the link below to send a video link to your friends starting from the chapter selected.</p>
              <p class="link-url">https://youtu.be/NNzMkjB0seo?t=2494</p>
            </div>
            <div id="sharechapter10" class="share-modal reveal-modal" data-reveal role="dialog">
                <h3 id="modalTitle">Share<span>Just Beginning: Chapter 10 | The Bayshore</span></h3>
              <p class="share-description">Thanks for sharing our story! Use the link below to send a video link to your friends starting from the chapter selected.</p>
              <p class="link-url">https://youtu.be/NNzMkjB0seo?t=2728</p>
            </div>
            <div id="sharechapter11" class="share-modal reveal-modal" data-reveal role="dialog">
                <h3 id="modalTitle">Share<span>Just Beginning: Chapter 11 | Where We Are Now</span></h3>
              <p class="share-description">Thanks for sharing our story! Use the link below to send a video link to your friends starting from the chapter selected.</p>
              <p class="link-url">https://youtu.be/NNzMkjB0seo?t=3086</p>
            </div>
        </div>
        
        <?php
        // Display Our Story Section
        echo '<h2>Our Story</h2>';
        echo rwmb_meta( 'about_ywam' );
        ?>
        
        <?php
        // Display Our Values Section
        echo '<h2>Our Values</h2>';
        echo rwmb_meta( 'core_values' );
        ?>
        
        
    </div>

    <?php get_template_part( 'parts/page_sidebar' ); ?>
    
</div>
<?php get_footer(); ?>