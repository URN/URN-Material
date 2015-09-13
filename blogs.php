<?php
/**
* Template Name: Blogs
* Description: Displays all blogs
*/
get_header(); ?>

<div class="main-content">

    <div class="entry-content">
        <?php the_title( '<h1>', '</h1>' ); ?>

        <?php
            // Start the loop.
            while ( have_posts() ) : the_post();

                // Include the page content template.
                the_content();
            ?>
    </div><!-- /.entry-content -->

    <div class="blog-wrapper">
        <?php
            // Get all the blogs
            $posts = get_posts(array(
              'post_type' => 'post',
              'numberposts' => 100,
              'orderby' => 'date'
            ));

            echo "<ul class='blog-excerpt'>";
            foreach ( $posts as $post ) {
                setup_postdata( $post );
                echo format_blog_excerpt($post);
            }
            wp_reset_postdata();
            echo "</ul>";

        // End the loop.
        endwhile;
        ?>
    </div>
</div> <!-- /.main-content -->
<?php get_footer(); ?>
