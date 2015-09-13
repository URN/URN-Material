<?php
/**
* Template Name: Podcasts
* Description: Podcasts page, with the list of podcasts from Audioboom below the content.
*/
get_header(); ?>

<div class="row">
    <!-- Featured podcasts -->
</div>

<div class="row">
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

        <div class="filter-container">
            <h2>Filter</h2>
            <label for="podcast-sort-select">Show Type</label>
            <select autocomplete="off" name="podcast-sort-select" class="select podcast-sort-select">
                <option disabled value="all">All</option>
                <option disabled value="after-dark">After Dark</option>
                <option disabled value="culture">Culture</option>
                <option disabled value="daytime">Daytime</option>
                <option disabled value="news">News</option>
                <option disabled value="sport">Sport</option>
                <option selected value="speech">Speech</option>
            </select>
        </div>

    </div>
</div>

<div class="row">
    <div class="audioboom-feed" data-channel-id="3139695" data-channel-audioboom-type="channels" data-channel-type="urn-daytime" data-channel-name="URN Speech"></div>
</div>


<?php get_footer(); ?>
