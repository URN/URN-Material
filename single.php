<?php
/**
 * The template for displaying single blog posts.
 */
get_header(); ?>

<div class="main-content">
    <div class="entry-content">

        <?php the_title( '<h1>', '</h1>' ); ?>

        <p><?php echo get_the_date(); ?></p>

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
<?php get_footer(); ?>
