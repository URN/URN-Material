<?php
/*
 * Displays content for a certain show
 *
 */
get_header(); ?>

<div class="row">
    <div class="entry-content">

        <h1><?php single_cat_title(); ?></h1>
        <h2>Description</h2>

        <?php if (term_description()) : ?>
            <p><?php echo term_description(); ?></p>
        <?php else : ?>
            <p>No description set</p>
        <?php endif; ?>


        <h2>Posts</h2>
        <?php if (have_posts()) : ?>

            <?php while (have_posts()) : the_post(); ?>

                <?php
                    the_ID();
                    the_content();
                    the_permalink();
                    the_title();
                    the_category();
                    get_the_time('Y-m-j');
                ?>

            <?php endwhile; ?>

        <?php else : ?>

            <p><?php _e( 'No posts found for ' . single_cat_title('', false) . '.'); ?></p>

        <?php endif; ?>

    </div>
</div>

<?php get_footer(); ?>
