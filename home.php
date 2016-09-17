<?php get_header(); ?>

<div class="main-content home-content">
    <div class="row cover-photos">

        <div class="module">
            <a target="_blank" href="//audioboom.com/boos/3831925-the-nineteen-percent-1-body-contact">
                <img style="width:100%" src="<?php echo get_template_directory_uri() . "/images/cover_6.jpg" ?>">
            </a>
        </div>

        <div class="module">
            <a href="https://audioboom.com/boos/3930886-the-price-of-sport-in-nottingham">
                <img style="width:100%" src="<?php echo get_template_directory_uri() . "/images/cover_7.jpg" ?>">
            </a>
        </div>

        <div class="module">
            <a href="<?php echo get_permalink( get_page_by_path( 'competitions' ) )?>">
                <img style="width:100%" src="<?php echo get_template_directory_uri() . "/images/cover_2.jpg" ?>">
            </a>
        </div>
    </div>

    <div class="row">
        <div class="twitter">
            <a width="360" class="twitter-timeline" data-dnt="true" href="https://twitter.com/urn1350/lists/urn-tweets" data-widget-id="644596981076226048">Tweets from https://twitter.com/urn1350/lists/urn-tweets</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
        </div>
        <div class="row vertical">
            <h1>Today's Schedule</h1>
            <div class="schedule mini-schedule">
                <ul class="day-names">
                    <li class="day-name">
                        Today
                    </li>
                </ul>
                <a class="btn" href="<?php echo get_permalink( get_page_by_path( 'schedule' ) )?>">
                    Full Schedule
                </a>
                <div class="timetable">
                    <ul class="times">
                        <li>Midnight</li>
                        <li>1am</li>
                        <li>2am</li>
                        <li>3am</li>
                        <li>4am</li>
                        <li>5am</li>
                        <li>6am</li>
                        <li>7am</li>
                        <li>8am</li>
                        <li>9am</li>
                        <li>10am</li>
                        <li>11am</li>
                        <li>Noon</li>
                        <li>1pm</li>
                        <li>2pm</li>
                        <li>3pm</li>
                        <li>4pm</li>
                        <li>5pm</li>
                        <li>6pm</li>
                        <li>7pm</li>
                        <li>8pm</li>
                        <li>9pm</li>
                        <li>10pm</li>
                        <li>11pm</li>
                    </ul>
                    <ul class="days">
                        <li class="day">
                            <h1 class="inline-day-name">Today</h1>
                            <ul class="slots"></ul>
                        </li>
                    </ul>
                </div>
            </div>

            <h1>Headlines</h1>
            <div class="audioboom-feed" data-card-type="0" data-channel-id="4227841" data-channel-audioboom-type="users" data-channel-type="urn-headlines" data-channel-name="URN Headlines"></div>
        </div>
    </div>

    <div class="row cover-photos">

        <div class="module blogs">
            <?php
            // Get the most recent blog
            $posts = get_posts(array(
               'numberposts' => 3
            ));

            echo "<h1>Latest Blog Posts</h1>";

            echo "<ul class='blog-excerpt'>";
            foreach ( $posts as $post ) {
                setup_postdata( $post );
                echo format_blog_excerpt($post, true, h2);
            }
            echo "</ul>";
            ?>
        </div>

    </div>
</div>
<?php get_footer(); ?>
