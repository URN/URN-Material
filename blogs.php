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

    <section class="tabs">
        <input id="tab-one" type="radio" name="grp" checked="checked"/>
        <label for="tab-one" class="tab-title">All</label>
        <div class="tab-content">

            <?php
                // // Get all the blogs
                // $posts = get_posts(array(
                //     'orderby' => 'post_date',
                //     'posts_per_page' => 5, //Chnage this to edit how many posts per page
                //     'post_status'      => 'publish'
                // ));
                //
                // echo "<ul class='blog-excerpt'>";
                // foreach ( $posts as $post ) {
                //     setup_postdata( $post );
                //     echo format_blog_excerpt($post, true, 'h2');
                // }
                // wp_reset_postdata();
                // echo "</ul>";
                echo do_shortcode('[ajax_load_more max_pages="0" posts_per_page="8"]');
            ?>
        </div>

        <input id="tab-two" type="radio" name="grp" />
        <label for="tab-two" class="tab-title">Sport</label>
        <div class="tab-content">
            <?php
                // // Get the most recent sport blogs
                // $posts = get_posts(array(
                //     'orderby' => 'post_date',
                //     'posts_per_page' => 5, //Chnage this to edit how many posts per page
                //     'post_status'      => 'publish',
                //     'category_name' => 'Sport'
                // ));
                //
                // echo "<ul class='blog-excerpt'>";
                // foreach ( $posts as $post ) {
                //     setup_postdata( $post );
                //     echo format_blog_excerpt($post, true, 'h2');
                // }
                // echo "</ul>";
                echo do_shortcode('[ajax_load_more post_type="post" category="sport" max_pages="0" posts_per_page="8"]');
            ?>
        </div>

        <input id="tab-three" type="radio" name="grp" />
        <label for="tab-three" class="tab-title">Music</label>
        <div class="tab-content">
            <?php
                // // Get the most recent music blogs
                // $posts = get_posts(array(
                //     'orderby' => 'post_date',
                //     'posts_per_page' => 5, //Chnage this to edit how many posts per page
                //     'post_status'      => 'publish',
                //     'category_name' => 'Music'
                // ));
                //
                // echo "<ul class='blog-excerpt'>";
                // foreach ( $posts as $post ) {
                //     setup_postdata( $post );
                //     echo format_blog_excerpt($post, true, 'h2');
                // }
                // echo "</ul>";
                echo do_shortcode('[ajax_load_more post_type="post" category="music" max_pages="0" posts_per_page="8"]');
            ?>
        </div>

        <input id="tab-four" type="radio" name="grp" />
        <label for="tab-four" class="tab-title">Opinion</label>
        <div class="tab-content">
            <?php
                // // Get the most recent opinion blogs
                // $posts = get_posts(array(
                //     'orderby' => 'post_date',
                //     'posts_per_page' => 5, //Chnage this to edit how many posts per page
                //     'post_status'      => 'publish',
                //     'category_name' => 'Opinion'
                // ));
                //
                // echo "<ul class='blog-excerpt'>";
                // foreach ( $posts as $post ) {
                //     setup_postdata( $post );
                //     echo format_blog_excerpt($post, true, 'h2');
                // }
                // echo "</ul>";
                echo do_shortcode('[ajax_load_more post_type="post" category="opinion" max_pages="0" posts_per_page="8"]');

            // End the loop.
            endwhile;
            ?>
        </div>

        <input id="tab-five" type="radio" name="grp" />
        <label for="tab-five" class="tab-title">Interviews</label>
        <div class="tab-content">
            <div class="audioboom-feed" data-channel-id="4374382" data-channel-audioboom-type="users" data-channel-type="urn-interviews" data-channel-name="URN Interviews"></div>
        </div>

    </section>
</div> <!-- /.main-content -->
<?php get_footer(); ?>
