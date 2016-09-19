<?php
/**
* Template Name: Your News
* Description:
*/
get_header(); ?>

<div class="main-content">

    <div class="row row-wide">
        <div class="row vertical">
            <h1>News Posts</h1>
            <?php
            // Get the most recent blog
            $posts = get_posts(array(
                'numberposts' => 3,
                'category_name' => 'News'
            ));

            echo "<ul class='blog-excerpt'>";
            foreach ( $posts as $post ) {
                echo format_blog_excerpt($post, false, h2);
            }
            echo "</ul>";
            ?>

        </div>

        <div class="row vertical">
            <h1>Latest Headlines</h1>
            <!-- Todays Headlines as 2 latest Audioboom embeds -->
            <div class="audioboom-feed" data-card-type="0" data-channel-id="4227841" data-channel-audioboom-type="users" data-channel-type="urn-headlines" data-channel-name="URN Headlines" data-card-type="0" data-show-image="false"></div>

            <div class="btn-wrapper">
                <a href="//audioboom.com/URNHeadlines">
                    <button class="btn">See all headlines</button>
                </a>
            </div>
        </div>
    </div>

    <section class="tabs">
        <input id="tab-one" type="radio" name="grp" checked="checked"/>
        <label for="tab-one" class="tab-title">Pulse</label>
        <div class="tab-content">
            <!-- Blog posts with category Pulse -->
            <?php
                // // Get the most recent pulse blog
                // $posts = get_posts(array('category_name' => 'Pulse','posts_per_page' => 8));
                //
                // echo "<ul class='blog-excerpt'>";
                // foreach ( $posts as $post ) {
                //     setup_postdata( $post );
                //     echo format_blog_excerpt($post, true, h2);
                // }
                // echo "</ul>";
                echo do_shortcode('[ajax_load_more post_type="post" category="pulse" max_pages="0" posts_per_page="8"]');
            ?>
            <!-- <div class="audioboom-feed" data-channel-id="3119406" data-channel-type="urn-pulse" data-channel-audioboom-type="channels" data-channel-name="URN Pulse"></div> -->
        </div>

        <input id="tab-two" type="radio" name="grp" />
        <label for="tab-two" class="tab-title">SU-News</label>
        <div class="tab-content">
            <!-- Blog posts with category SU -->
            <?php
                // // Get the most recent SU-News blog
                // $posts = get_posts(array('category_name' => 'SU','posts_per_page' => 8));
                //
                // echo "<ul class='blog-excerpt'>";
                // foreach ( $posts as $post ) {
                //     setup_postdata( $post );
                //     echo format_blog_excerpt($post, true, h2);
                // }
                // echo "</ul>";
                echo do_shortcode('[ajax_load_more post_type="post" category="SU" max_pages="0" posts_per_page="8"]');
            ?>
        </div>
    </section>


</div>
<?php get_footer(); ?>
