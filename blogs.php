<?php
/**
* Template Name: Blogs
* Description: Displays all blogs
*/
get_header(); ?>

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
    </div>
</div>


<div class="blog-wrapper">

    <?php
        $shows = get_terms( 'shows', 'orderby=count&hide_empty=0' );
        $count = count($shows);
        if ( $count > 0 ){
            foreach ( $shows as $show ) {
                if ($show->count > 0) {
                    ?>
                    <h1 class="show-title">
                        <a href="<?php echo get_permalink( get_page_by_path( $show->slug ) ); ?>">
                            <?php echo $show->name; ?>
                        </a>
                    </h1>
                    <p style="color:#ccc">Show ID <?php echo $show->term_id; ?></p>

                    <!-- Get all the blog posts on that show -->
                    <?php
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
                    ?>

                    <ul class="blog-excerpt">
                        <?php
                        foreach ( $posts as $post ) {
                        ?>
                            <li>
                                <h2>
                                    <a href="<?php echo get_permalink($post->ID); ?>">
                                        <?php echo $post->post_title; ?>
                                    </a>
                                </h2>
                                <p><?php echo $post->post_date; ?></p>
                                <a href="<?php echo get_permalink($post->ID); ?>">
                                    <button class="btn btn-default">View post</button>
                                </a>
                                <pre>
                                    <?php //print_r($post); ?>
                                </pre>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>

                    <?php
                }
            }
        }
    ?>
</div>

<?php get_footer(); ?>
