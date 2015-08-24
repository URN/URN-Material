<?php
/**
* Template Name: Schedule
* Description: Schedule page, with the full schedule below the content.
*/
get_header(); ?>

<div class="row">
    <?php
        $show_categories = array();
        $show_categories[] = array('name' => 'After Dark', 'link' => 'afterdark.jpg');
        $show_categories[] = array('name' => 'Culture', 'link' => 'culture.jpg');
        $show_categories[] = array('name' => 'Daytime', 'link' => 'daytime.jpg');
        $show_categories[] = array('name' => 'News', 'link' => 'news.jpg');
        $show_categories[] = array('name' => 'Sport', 'link' => 'sport.jpg');

        foreach($show_categories as $show) {
            $show_img_url = get_template_directory_uri() . "/images/schedule/" . $show['link'];
            echo "<div class='module show-photo'>";
            echo "  <img src='" . $show_img_url . "'>";
            echo "  <button class='btn'>" . $show['name'] . "</button>";
            echo "</div>";
        }
    ?>
</div>

<div class="row">
    <div class="content">
        <?php the_title( '<h1>', '</h1>' ); ?>

        <?php
            // Start the loop.
            while ( have_posts() ) : the_post();

                // Include the page content template.
                the_content();

            // End the loop.
            endwhile;
        ?>

        <h2>Filter</h2>
        <div class="btn-dropdown">
           <select>
                <option value="">Show</option>
                <option value="a-genre">A show</option>
            </select>
            <select>
                <option value="">Genre</option>
                <option value="a-genre">A genre</option>
            </select>
        </div>
    </div>
</div>

<div class="schedule">
    <div class="schedule-container">
        <div class="schedule-timeline">

          <!-- Times along the top -->
            <div class="schedule-label">
                <ul>
                    <li><span>Midnight</span></li>
                <?php
                    // Prints out every hour of the day 1am - 11pm
                    for ($x = 1; $x <= 23; $x++) {
                        echo "<li><span>";

                        if ($x < 12) {
                            echo $x . "am";
                        } elseif($x == 12) {
                            echo "Noon";
                        } else {
                            echo ($x - 12) . "pm";
                        }

                        echo "</span><li>";
                    }
                ?>
                </ul>

                <!-- Live thing (set the width via PHP based on server time) -->
                <?php
                    $time_hours = date("H") + 1; // + 1 Moves time to GMT
                    $time_minutes = date("i");
                    $hours_from_midnight = $time_hours + (($time_minutes * 1.66) / 100); // e.g. 17.50 == 5.30pm
                    $schedule_pixel_width = $hours_from_midnight * 2 * 60;
                ?>
                <script>
                    document.getElementsByClassName('schedule-timeline')[0].scrollLeft += <?php echo $schedule_pixel_width - 200 ?>;
                </script>
                <div class="schedule-progress" style="width:<?php echo $schedule_pixel_width; ?>px;">
                    <span>
                    <?php
                        echo $time_hours . ":" . $time_minutes . "<br>Live"; // Prints pretty Time
                    ?>
                    </span>
                </div>

            </div>


            <?php
                // Get weekly schedule
                $schedule = json_decode(file_get_contents('http://live.urn1350.net/api/schedule/week'));

                $days_of_week = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
                $day_of_week = 0;

                foreach ($schedule as $day) {
                    print "<div class='schedule-day'>";
                    print "<h2 class='schedule-day-text'>";
                    print "  <a href='#'><span>" . $days_of_week[$day_of_week] . "</span></a>";
                    $day_of_week++;
                    print "</h2>";

                    print "<ul>";
                    foreach ($day as $show) {
                        $show_length = $show->length;
                        $show_class = "schedule-duration-" . $show_length;

                        if($show->live) {
                            $show_class .= " schedule-live";
                        }

                        print "<li class='" . $show_class ."'>";
                        print "  <a href='" . get_permalink(get_page_by_path($show->slug)) . "'>";
                        print "    <span>" . $show->name . "</span>";

                        // Print show hosts if there are any set.
                        if (count($show->hosts) > 0) {
                            print "    <i><span> with ";

                            foreach($show->hosts as $host) {
                                print $host->name;
                                if (count($show->hosts) > 1) {
                                    print ', ';
                                }
                            }
                        }

                        print "</span></a>";
                        print "</li>";
                    }

                    print "</ul>";
                    print "</div>";
                }
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
