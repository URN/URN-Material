<?php get_header(); ?>

<div class="main-content home-content">
    <div class="row cover-photos">
        <img class="banner" src="<?php echo get_template_directory_uri(); ?>/images/promo.png" alt="Banner image"
             title="Homepage banner"/>
    </div>

    <div class="row">
        <div class="twitter">
            <a class="twitter-timeline" data-width="360" data-height="600" data-theme="light"
               href="https://twitter.com/URN1350/lists/urn-tweets?ref_src=twsrc%5Etfw">A Twitter List by URN1350</a>
            <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
        </div>
        <div class="row vertical">
            <h1>Today's Schedule</h1>
            <div class="schedule mini-schedule">
                <ul class="day-names">
                    <li class="day-name">
                        Today
                    </li>
                </ul>
                <a class="btn" href="<?php echo get_permalink( get_page_by_path( 'schedule' ) ) ?>">
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
            <div class="adtotw">
                <h1>Weekly Playlist</h1>
                <iframe src="https://open.spotify.com/playlist/7a5zE78nIKxubabMBYq3EA?si=vCFmvrrwQte46dRhCXo7qw"
                        width="100%" height="280px" frameborder="0" allowtransparency="true" allow="encrypted-media"
                        title="Embedded Spotify playlist"></iframe>
            </div>
        </div>
    </div>

    <div class="row cover-photos">
        <div class="module blogs">
			<?php
			// Get the most recent blog
			$posts = get_posts( array(
				'numberposts' => 3
			) );

			echo "<h1>Latest Blog Posts</h1>";

			echo "<ul class='blog-excerpt'>";
			foreach ( $posts as $post ) {
				setup_postdata( $post );
				echo format_blog_excerpt( $post, true, h2 );
			}
			echo "</ul>";
			?>
        </div>
    </div>
</div>
<?php get_footer(); ?>
