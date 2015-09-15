<?php
/**
* Template Name: Your News
* Description:
*/
get_header(); ?>

<div class="main-content">

    <!-- Todays Headlines as 2 latest Audioboom embeds -->
    <div class="audioboom-headlines">
        <h1>Latest Headlines</h1>
        <iframe width="100%" height="150" style="background-color:transparent;" frameborder="0" allowtransparency="allowtransparency" scrolling="no" src="//embeds.audioboom.com/boos/3292950-students-with-disabilities-special-molly-o-brien-statement/embed/v3?eid=AQAAALz-9VUWPzIA&amp;player_theme=light&amp;link_color=%235e44cb&amp;image_option=small&amp;show_title=true" title="audioBoom player"></iframe>
        <iframe width="100%" height="150" style="background-color:transparent;" frameborder="0" allowtransparency="allowtransparency" scrolling="no" src="//embeds.audioboom.com/boos/3292768-students-complain-about-grad-ball/embed/v3?eid=AQAAAAKG8VVgPjIA&amp;player_theme=light&amp;link_color=%235e44cb&amp;image_option=small&amp;show_title=true" title="audioBoom player"></iframe>
        <div class="btn-wrapper">
            <a href="//audioboom.com/channel/urnthepulse">
                <button class="btn">See all headlines</button>
            </a>
        </div>
    </div>

    <section class="tabs">
        <input id="tab-one" type="radio" name="grp" checked="checked"/>
        <label for="tab-one" class="tab-title">Pulse</label>
        <div class="tab-content">
            <div class="audioboom-feed" data-channel-id="3119406" data-channel-type="urn-pulse" data-channel-audioboom-type="channels" data-channel-name="URN Pulse"></div>
        </div>

        <input id="tab-three" type="radio" name="grp" />
        <label for="tab-three" class="tab-title">The Column</label>
        <div class="tab-content">
            <!-- Blog posts with author URN -->
            <?php echo get_posts_by_author(10, 2); ?>
        </div>

        <input id="tab-four" type="radio" name="grp" />
        <label for="tab-four" class="tab-title">Uni of Sport</label>
        <div class="tab-content">
             <!-- Blog posts with author Sports show -->
            <?php echo get_posts_by_author(10, 41); ?>
        </div>

        <input id="tab-five" type="radio" name="grp" />
        <label for="tab-five" class="tab-title">SU</label>
        <div class="tab-content">
            <!-- Blog posts with author Elections Show -->
            <?php echo get_posts_by_author(10, 139); ?>
        </div>
    </section>


</div>
<?php get_footer(); ?>
