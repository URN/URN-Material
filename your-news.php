<?php
/**
* Template Name: Your News
* Description:
*/
get_header(); ?>


<!-- Todays Headlines as 2 latest Audioboom embeds -->
<div class="row">
    <div class="audioboom-headlines">
        <!-- <h1>Latest Headlines</h1> -->

        <iframe width="100%" height="150" style="background-color:transparent;" frameborder="0" allowtransparency="allowtransparency" scrolling="no" src="//embeds.audioboom.com/boos/3289600-uonsu-grad-ball-joe-caunce-statement/embed/v3?eid=AQAAAJ-k8VUAMjIA&amp;player_theme=light&amp;link_color=%235e44cb&amp;image_option=small&amp;show_title=true" title="audioBoom player"></iframe>

        <iframe width="100%" height="150" style="background-color:transparent;" frameborder="0" allowtransparency="allowtransparency" scrolling="no" src="//embeds.audioboom.com/boos/3292768-students-complain-about-grad-ball/embed/v3?eid=AQAAAAKG8VVgPjIA&amp;player_theme=light&amp;link_color=%235e44cb&amp;image_option=small&amp;show_title=true" title="audioBoom player"></iframe>
        <!-- <div class="btn-wrapper">
            <a href="//audioboom.com/channel/urnthepulse">
                <button class="btn">See all headlines</button>
            </a>
        </div> -->
    </div>
</div>

<?php

    /**
     * [get_posts_by_author description]
     * @param  int $posts_per_page    [description]
     * @param  int $author            [description]
     * @return string                 [description]
     */
    function get_posts_by_author($posts_per_page, $author) {
        $output = "<ul class='blog-excerpt'>";

        // Start the loop.
        while ( have_posts() ) : the_post();

            $args = array( 'posts_per_page' => $posts_per_page, 'author' => $author);

            $myposts = get_posts( $args );
            foreach ( $myposts as $post ) : setup_postdata( $post );
                $output .= "<li>";
                $output .= "<h1><a href=" . get_the_permalink($post) . ">" . get_the_title($post) . "</a></h1>";
                $output .= "<p>" . get_the_date('', $post) . "</p>";
                $output .= "<p>". get_the_excerpt() . "</p>";
                $output .= "<a href=" . get_the_permalink($post) . "><button class='btn btn-default'>Read More</button></a>";
                $output .= "</li>";
            endforeach;
            wp_reset_postdata();

        // End the loop.
        endwhile;
        $output .= "</ul>";

        // Create Show All Button
        $output .= "<div class='btn-wrapper'>";
        $output .= "<a href='" . get_author_posts_url( $author ) . "'><button class='btn'>Show all</button></a>";
        $output .= "</div>";
        return $output;
    }
?>

<div class="row">
    <section class="tabs">
        <input id="tab-one" type="radio" name="grp" checked="checked"/>
        <label for="tab-one" class="tab-title">Pulse</label>
        <div class="tab-content">
            <div class="audioboom-feed" data-channel-id="3119406" data-channel-type="urn-pulse" data-channel-name="URN Pulse"></div>
        </div>

        <input id="tab-three" type="radio" name="grp" />
        <label for="tab-three" class="tab-title">The Column</label>
        <div class="tab-content">
            <!-- Blog posts with author URN -->
            <?php echo get_posts_by_author(10, 2); ?>

        </div>

        <input id="tab-four" type="radio" name="grp" />
        <label for="tab-four" class="tab-title">Varsity</label>
        <div class="tab-content">
             <!-- Blog posts with author Sports show -->
            <?php echo get_posts_by_author(10, 41); ?>
        </div>

        <input id="tab-five" type="radio" name="grp" />
        <label for="tab-five" class="tab-title">SU Elections</label>
        <div class="tab-content">

            <!-- Blog posts with author Elections Show -->
            <?php echo get_posts_by_author(10, 139); ?>

        </div>
    </section>

</div>

<?php get_footer(); ?>
