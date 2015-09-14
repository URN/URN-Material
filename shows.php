<?php
/**
 * Template Name: Shows
 */
get_header(); ?>

<div class="main-content">
    <div class="entry-content">
    <?php
        // Start the loop.
        while ( have_posts() ) : the_post();

            // Include the page content template.
            the_content();

        // End the loop.
        endwhile;
        ?>
    </div>

    <h1>Page is a Work in process</h1>

    <h1 id="afterdark">After Dark</h1>
    <h1 id="culture">Culture</h1>
    <h1 id="daytime">Daytime</h1>
    <h1 id="news">News</h1>
    <h1 id="sport">Sports</h1>
</div>

<?php get_footer(); ?>
