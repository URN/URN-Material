<?php
/**
* Template Name: Podcasts
* Description: Podcasts page, with the list of podcasts from Audioboom below the content.
*/
get_header(); ?>

<div class="main-content">

    <!-- Featured podcasts -->

    <div class="entry-content">
        <?php the_title( '<h1>', '</h1>' ); ?>

        <?php
            // Start the loop.
            while ( have_posts() ) : the_post();

                // Include the page content template.
                the_content();

            // End the loop.
            endwhile;
        ?>
    </div>

    <a href="<?php echo get_permalink( get_page_by_path( 'shows' ) )?>#off-air">
        <button class="btn">See all Podcasts</button>
    </a>

    <section class="tabs">
        <input id="tab-podcasts" type="radio" name="grp" checked="checked"/>
        <label for="tab-podcasts" class="tab-title">Podcasts</label>
        <div class="tab-content">
            <div class="audioboom-feed" data-childchannel="URN" data-channel-id="184841" data-channel-audioboom-type="users" data-channel-type="urn-podcasts" data-channel-name="URN Podcasts"></div>
        </div>

        <input id="tab-news-sports-culture" type="radio" name="grp" />
        <label for="tab-news-sports-culture" class="tab-title">News, Sports &amp; Culture</label>
        <div class="tab-content">
            <div class="audioboom-feed" data-channel-id="4227797" data-channel-audioboom-type="users" data-channel-type="urn-speech" data-channel-name="URN Speech"></div>
        </div>

        <input id="tab-after-dark" type="radio" name="grp" />
        <label for="tab-after-dark" class="tab-title">After Dark</label>
        <div class="tab-content">
            <div class="audioboom-feed" data-channel-id="4374438" data-channel-audioboom-type="users" data-channel-type="urn-after-dark" data-channel-name="URN AfterDark"></div>
        </div>

        <input id="tab-daytime" type="radio" name="grp" />
        <label for="tab-daytime" class="tab-title">Daytime</label>
        <div class="tab-content">
            <div class="audioboom-feed" data-channel-id="3125607" data-channel-audioboom-type="users" data-channel-type="urn-daytime" data-channel-name="URN Daytime"></div>
        </div>
    </section>


</div>

<?php get_footer(); ?>
