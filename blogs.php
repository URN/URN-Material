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

            // End the loop.
            endwhile;
        ?>
    </div>

    <div class="blog-wrapper">
        <?php
            $shows = get_terms( 'shows', 'orderby=count&hide_empty=0' );
            $count = count($shows);
            if ( $count > 0 ) {
                foreach ( $shows as $show ) {
                    if ($show->count > 0) {
                        echo "<h1 class='show-title'>";
                        echo "<a href=" . get_permalink( get_page_by_path( $show->slug ) ) . "'>";
                        echo $show->name;
                        echo "</a>";
                        echo "</h1>";

                        // Get all the blog posts on that show
                        $posts = get_posts(array(
                          'post_type' => 'post',
                          'numberposts' => -1,
                          'tax_query' => array(
                            array(
                              'taxonomy' => 'shows',
                              'field' => 'id',
                              'terms' => $show->term_id,
                              'include_children' => true
                            )
                          )
                        ));
                        echo "<ul class='blog-excerpt'>";
                        foreach ( $posts as $post ) {

                            echo "<li>";
                                echo "<h2>";
                                    echo "<a href='" . get_permalink($post->ID) . "'>";
                                    echo $post->post_title;
                                    echo "</a>";
                                echo "</h2>";
                                echo "<p>" . get_the_date('', $post->ID) . "</p>";
                                echo "<a href='" . get_permalink($post->ID) . "'>";
                                echo "    <button class='btn btn-default'>View post</button>";
                                echo "</a>";
                                // echo "<pre>";
                                // print_r($post);
                                // echo "</pre>";
                            echo "</li>";
                        }
                        echo "</ul>";
                    }
                }
            }
        ?>
    </div>
</div> <!-- /.main-content -->
<?php get_footer(); ?>
