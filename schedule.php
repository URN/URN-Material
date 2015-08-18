<?php
/**
* Template Name: Schedule
* Description: Schedule page, with the full schedule below the content.
*/
get_header(); ?>

<?php the_title( '<h1>', '</h1>' ); ?>

<div class="content">
    <?php
        // Start the loop.
        while ( have_posts() ) : the_post();

            // Include the page content template.
            the_content();

        // End the loop.
        endwhile;
        ?>
</div>

<div class="schedule">
    <!-- TODO: Add Schedule -->
</div>

<?php get_footer(); ?>
