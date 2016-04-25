<?php
/**
* Template Name: Blogs
* Description: Displays all blogs
*/
get_header(); ?>

<?php
global $paged;
$curpage = $paged ? $paged : 1;
$args = array(
    'orderby' => 'post_date',
    'posts_per_page' => 5, //Chnage this to edit how many posts per page
    'post_status'      => 'publish',
    'paged' => $paged
);
$query = new WP_Query($args);?>

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
            $posts = get_posts($args);

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

        <?php
        //Pagination links
        echo '
        <div id="wp_pagination">
          <a class="first_page" href="'.get_pagenum_link(1).'">&laquo; First</a>
          <a class="previous_page" href="'.get_pagenum_link(($curpage-1 > 0 ? $curpage-1 : 1)).'">&lsaquo; Previous </a>';
          for($i=$curpage - 5;$i<=$curpage + 5;$i++){
            if ($i < 1) {//Stops displaying negative pages
              $i = 0;
            } elseif ($i > $query->max_num_pages) {//Stops displaying pages over the limit
              break;
            } else {
              echo '<a class="'.($i == $curpage ? 'active ' : '').'page_button" href="'.get_pagenum_link($i).'"> '.$i.' </a>';
            }
          }
          echo '
          <a class="next_page" href="'.get_pagenum_link(($curpage+1 <= $query->max_num_pages ? $curpage+1 : $query->max_num_pages)).'"> Next &rsaquo;</a>
          <a class="last_page" href="'.get_pagenum_link($query->max_num_pages).'">Last &raquo;</a>
        </div>';
        ?>

    </div>
</div> <!-- /.main-content -->
<?php get_footer(); ?>
