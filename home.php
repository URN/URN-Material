<?php get_header(); ?>

<div class="main-content">
    <div class="row cover-photos">

        <div class="module">
            <a href="<?php echo get_permalink( get_page_by_path( 'music' ) )?>">
                <img style="width:100%" src="<?php echo get_template_directory_uri() . "/images/cover_1.jpg" ?>">
            </a>
        </div>

        <div class="module">
            <a href="<?php echo get_permalink( get_page_by_path( 'schedule' ) )?>">
                <img style="width:100%" src="<?php echo get_template_directory_uri() . "/images/cover_3.jpg" ?>">
            </a>
        </div>

        <div class="module">
            <a href="<?php echo get_permalink( get_page_by_path( 'your-news' ) )?>">
                <img style="width:100%" src="<?php echo get_template_directory_uri() . "/images/cover_2.jpg" ?>">
            </a>
        </div>

    </div>

    <div class="row">
        <div class="twitter">
            <a class="twitter-timeline"  href="https://twitter.com/urn1350" data-widget-id="633379687427895296" width="360">Tweets by @urn1350</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
        </div>
        <div class="row vertical">
            <h1>Headlines</h1>
            <div class="clip">
                <iframe width="100%" height="150" style="background-color:transparent; display:block; min-width:300px; max-width:700px;" frameborder="0" allowtransparency="allowtransparency" scrolling="no" src="//embeds.audioboom.com/boos/3292950-students-with-disabilities-special-molly-o-brien-statement/embed/v3?eid=AQAAAApF0lUWPzIA&amp;player_theme=light&amp;link_color=%235e44cb&amp;image_option=small&amp;show_title=true" title="audioBoom player"></iframe>
            </div>
            <div class="clip">
                <iframe width="100%" height="150" style="background-color:transparent; display:block; min-width:300px; max-width:700px;" frameborder="0" allowtransparency="allowtransparency" scrolling="no" src="//embeds.audioboom.com/boos/3292768-students-complain-about-grad-ball/embed/v3?eid=AQAAAG9F0lVgPjIA&amp;player_theme=light&amp;link_color=%235e44cb&amp;image_option=small&amp;show_title=true" title="audioBoom player"></iframe>
            </div>
            <h1>Schedule</h1>
            <div class="schedule mini-schedule">
                <ul class="day-names">
                    <li class="day-name">
                        Today
                    </li>
                </ul>
                <a href="<?php echo get_permalink( get_page_by_path( 'schedule' ) )?>">
                    <button class="btn">Full Schedule</button>
                </a>
                <div class="timetable">
                    <ul class="times">
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
                        <li>Midnight</li>
                        <li>1am</li>
                        <li>2am</li>
                        <li>3am</li>
                        <li>4am</li>
                        <li>5am</li>
                        <li>6am</li>
                    </ul>
                    <ul class="days">
                        <li class="day">
                            <ul class="slots"></ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="row cover-photos">
        <div class="module">
            <a href="<?php echo get_permalink( get_page_by_path( 'urn-tv' ) )?>">
                <img style="width:100%" src="<?php echo get_template_directory_uri() . "/images/cover_4.jpg" ?>">
            </a>
        </div>

        <div class="module blogs">
            <h1>Recent Coverage</h1>
            <ul class="blog-excerpt">
                <li><h2><a href="<?php echo get_permalink( get_page_by_path( 'urn-interviews-emma-collins' ) )?>">URN Interviews: Emma Collins</a></h2><p>23th June 2015</p></li>
            </ul>
        </div>

        <div class="module">
            <a href="<?php echo get_permalink( get_page_by_path( 'podcasts' ) )?>">
                <img style="width:100%" src="<?php echo get_template_directory_uri() . "/images/cover_5.jpg" ?>">
            </a>
        </div>
    </div>
</div>
<?php get_footer(); ?>
