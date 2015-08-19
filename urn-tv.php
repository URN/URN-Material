<?php
/**
* Template Name: URN TV
* Description: Shows a youtube video grid under content.
*/
get_header(); ?>

<div class="row">
    <div class="content">
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
</div>

<div class="videos">


</div>

<?php get_footer(); ?>
