<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
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

<?php get_footer(); ?>
