<?php
/**
* Template Name: Schedule
* Description: Schedule page, with the full schedule below the content.
*/
get_header(); ?>

<div class="row">
    <div class="module">Daytime</div>
    <div class="module">Speech, News and Culture</div>
    <div class="module">After Dark</div>
</div>

<div class="row">

    <?php the_title( '<h1>', '</h1>' ); ?>

    <div class="content">
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

<div class="row">
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
                    $time_hours = date("h");
                    $time_minutes = date("i");
                    $hours_from_midnight = date("h") + (date("i") / 100);
                    $schedule_pixel_width = $hours_from_midnight * 2 * 60;
                ?>
                <div class="schedule-progress" style="width:<?php echo $schedule_pixel_width; ?>px;">
                    <?php
                        echo date("h:i A") . "<br>"; // Prints Time
                    ?>
                    <span>Live</span>
                </div>

            </div>

            <!-- A Row on the schedule table -->
            <div class="schedule-day">

                <h2 class="schedule-day-text">
                    <a href="#">
                        <span>Monday</span>
                    </a>
                </h2>

                <!-- List of shows on the day -->
                <ul>
                    <li class="schedule-past schedule-duration-60">
                        <a href="#">
                            <span>A Morning Show</span>
                            <i><span> with </span>Someone</i>
                        </a>
                    </li>
                    <li class="schedule-past schedule-duration-300">
                        <a href="#">
                            <span>Show name</span>
                            <i><span> with </span>Name of Host</i>
                        </a>
                    </li>
                    <li class="schedule-past schedule-duration-120">
                        <a href="#">
                            <span>Show name</span>
                            <i><span> with </span>Name of Host</i>
                        </a>
                    </li>
                    <li class="schedule-past schedule-duration-300">
                        <a href="#">
                            <span>Show name</span>
                            <i><span> with </span>Name of Host</i>
                        </a>
                    </li>
                    <li class="schedule-past schedule-duration-300">
                        <a href="#">
                            <span>Show name</span>
                            <i><span> with </span>Name of Host</i>
                        </a>
                    </li>
                    <li class="schedule-past schedule-duration-120">
                        <a href="#">
                            <span>Show name</span>
                            <i><span> with </span>Name of Host</i>
                        </a>
                    </li>

                    <li class="schedule-past schedule-duration-60">
                        <a href="#">
                            <span>A Morning Show</span>
                            <i><span> with </span>Someone</i>
                        </a>
                    </li>

                    <li class="schedule-past schedule-duration-240">
                        <a href="#">
                            <span>Show name</span>
                            <i><span> with </span>Name of Host</i>
                        </a>
                    </li>
                    <li class="schedule-past schedule-duration-120">
                        <a href="#">
                            <span>Show name</span>
                            <i><span> with </span>Name of Host</i>
                        </a>
                    </li>
                    <li class="schedule-past schedule-duration-60">
                        <a href="#">
                            <span>Show name</span>
                            <i><span> with </span>Name of Host</i>
                        </a>
                    </li>
                </ul>

            </div><!-- ./ schedule-day -->

            <!-- Dummy data, minified -->
            <div class="schedule-day"> <h2 class="schedule-day-text"> <a href="#"> <span>Monday</span> </a> </h2> <ul> <li class="schedule-past schedule-duration-60"> <a href="#"> <span>A Morning Show</span> <i><span> with </span>Someone</i> </a> </li><li class="schedule-past schedule-duration-300"> <a href="#"> <span>Show name</span> <i><span> with </span>Name of Host</i> </a> </li><li class="schedule-past schedule-duration-120"> <a href="#"> <span>Show name</span> <i><span> with </span>Name of Host</i> </a> </li><li class="schedule-past schedule-duration-300"> <a href="#"> <span>Show name</span> <i><span> with </span>Name of Host</i> </a> </li><li class="schedule-past schedule-duration-300"> <a href="#"> <span>Show name</span> <i><span> with </span>Name of Host</i> </a> </li><li class="schedule-past schedule-duration-120"> <a href="#"> <span>Show name</span> <i><span> with </span>Name of Host</i> </a> </li><li class="schedule-past schedule-duration-60"> <a href="#"> <span>A Morning Show</span> <i><span> with </span>Someone</i> </a> </li><li class="schedule-past schedule-duration-240"> <a href="#"> <span>Show name</span> <i><span> with </span>Name of Host</i> </a> </li><li class="schedule-past schedule-duration-120"> <a href="#"> <span>Show name</span> <i><span> with </span>Name of Host</i> </a> </li><li class="schedule-past schedule-duration-60"> <a href="#"> <span>Show name</span> <i><span> with </span>Name of Host</i> </a> </li></ul> </div><div class="schedule-day"> <h2 class="schedule-day-text"> <a href="#"> <span>Tuesday</span> </a> </h2> <ul> <li class="schedule-past schedule-duration-300"> <a href="#"> <span>A Morning Show</span> <i><span> with </span>Someone</i> </a> </li><li class="schedule-past schedule-duration-60"> <a href="#"> <span>Show name</span> <i><span> with </span>Name of Host</i> </a> </li><li class="schedule-past schedule-duration-120"> <a href="#"> <span>Show name</span> <i><span> with </span>Name of Host</i> </a> </li><li class="schedule-past schedule-duration-300"> <a href="#"> <span>Show name</span> <i><span> with </span>Name of Host</i> </a> </li><li class="schedule-past schedule-duration-300"> <a href="#"> <span>Show name</span> <i><span> with </span>Name of Host</i> </a> </li><li class="schedule-past schedule-duration-120"> <a href="#"> <span>Show name</span> <i><span> with </span>Name of Host</i> </a> </li><li class="schedule-past schedule-duration-60"> <a href="#"> <span>A Morning Show</span> <i><span> with </span>Someone</i> </a> </li><li class="schedule-past schedule-duration-240"> <a href="#"> <span>Show name</span> <i><span> with </span>Name of Host</i> </a> </li><li class="schedule-past schedule-duration-120"> <a href="#"> <span>Show name</span> <i><span> with </span>Name of Host</i> </a> </li><li class="schedule-past schedule-duration-60"> <a href="#"> <span>Show name</span> <i><span> with </span>Name of Host</i> </a> </li></ul> </div><div class="schedule-day"> <h2 class="schedule-day-text"> <a href="#"> <span>Wednesday</span> </a> </h2> <ul> <li class="schedule-past schedule-duration-300"> <a href="#"> <span>A Morning Show</span> <i><span> with </span>Someone</i> </a> </li><li class="schedule-past schedule-duration-300"> <a href="#"> <span>Show name</span> <i><span> with </span>Name of Host</i> </a> </li><li class="schedule-past schedule-duration-120"> <a href="#"> <span>Show name</span> <i><span> with </span>Name of Host</i> </a> </li><li class="schedule-past schedule-duration-60"> <a href="#"> <span>Show name</span> <i><span> with </span>Name of Host</i> </a> </li><li class="schedule-past schedule-duration-300"> <a href="#"> <span>Show name</span> <i><span> with </span>Name of Host</i> </a> </li><li class="schedule-past schedule-duration-120"> <a href="#"> <span>Show name</span> <i><span> with </span>Name of Host</i> </a> </li><li class="schedule-past schedule-duration-60"> <a href="#"> <span>A Morning Show</span> <i><span> with </span>Someone</i> </a> </li><li class="schedule-past schedule-duration-240"> <a href="#"> <span>Show name</span> <i><span> with </span>Name of Host</i> </a> </li><li class="schedule-past schedule-duration-120"> <a href="#"> <span>Show name</span> <i><span> with </span>Name of Host</i> </a> </li></ul> </div><div class="schedule-day"> <h2 class="schedule-day-text"> <a href="#"> <span>Thursday</span> </a> </h2> <ul> <li class="schedule-past schedule-duration-240"> <a href="#"> <span>A Morning Show</span> <i><span> with </span>Someone</i> </a> </li><li class="schedule-past schedule-duration-60"> <a href="#"> <span>Show name</span> <i><span> with </span>Name of Host</i> </a> </li><li class="schedule-past schedule-duration-120"> <a href="#"> <span>Show name</span> <i><span> with </span>Name of Host</i> </a> </li><li class="schedule-past schedule-duration-300"> <a href="#"> <span>Show name</span> <i><span> with </span>Name of Host</i> </a> </li><li class="schedule-past schedule-duration-300"> <a href="#"> <span>Show name</span> <i><span> with </span>Name of Host</i> </a> </li><li class="schedule-past schedule-duration-120"> <a href="#"> <span>Show name</span> <i><span> with </span>Name of Host</i> </a> </li><li class="schedule-past schedule-duration-300"> <a href="#"> <span>A Morning Show</span> <i><span> with </span>Someone</i> </a> </li><li class="schedule-past schedule-duration-60"> <a href="#"> <span>Show name</span> <i><span> with </span>Name of Host</i> </a> </li><li class="schedule-past schedule-duration-120"> <a href="#"> <span>Show name</span> <i><span> with </span>Name of Host</i> </a> </li><li class="schedule-past schedule-duration-60"> <a href="#"> <span>Show name</span> <i><span> with </span>Name of Host</i> </a> </li></ul> </div><div class="schedule-day"> <h2 class="schedule-day-text"> <a href="#"> <span>Friday</span> </a> </h2> <ul> <li class="schedule-past schedule-duration-240"> <a href="#"> <span>A Morning Show</span> <i><span> with </span>Someone</i> </a> </li><li class="schedule-past schedule-duration-60"> <a href="#"> <span>Show name</span> <i><span> with </span>Name of Host</i> </a> </li><li class="schedule-past schedule-duration-120"> <a href="#"> <span>Show name</span> <i><span> with </span>Name of Host</i> </a> </li><li class="schedule-past schedule-duration-300"> <a href="#"> <span>Show name</span> <i><span> with </span>Name of Host</i> </a> </li><li class="schedule-past schedule-duration-300"> <a href="#"> <span>Show name</span> <i><span> with </span>Name of Host</i> </a> </li><li class="schedule-past schedule-duration-120"> <a href="#"> <span>Show name</span> <i><span> with </span>Name of Host</i> </a> </li><li class="schedule-past schedule-duration-300"> <a href="#"> <span>A Morning Show</span> <i><span> with </span>Someone</i> </a> </li><li class="schedule-past schedule-duration-60"> <a href="#"> <span>Show name</span> <i><span> with </span>Name of Host</i> </a> </li><li class="schedule-past schedule-duration-120"> <a href="#"> <span>Show name</span> <i><span> with </span>Name of Host</i> </a> </li><li class="schedule-past schedule-duration-60"> <a href="#"> <span>Show name</span> <i><span> with </span>Name of Host</i> </a> </li></ul> </div><div class="schedule-day"> <h2 class="schedule-day-text"> <a href="#"> <span>Saturday</span> </a> </h2> <ul> <li class="schedule-past schedule-duration-300"> <a href="#"> <span>A Morning Show</span> <i><span> with </span>Someone</i> </a> </li><li class="schedule-past schedule-duration-60"> <a href="#"> <span>Show name</span> <i><span> with </span>Name of Host</i> </a> </li><li class="schedule-past schedule-duration-120"> <a href="#"> <span>Show name</span> <i><span> with </span>Name of Host</i> </a> </li><li class="schedule-past schedule-duration-300"> <a href="#"> <span>Show name</span> <i><span> with </span>Name of Host</i> </a> </li><li class="schedule-past schedule-duration-60"> <a href="#"> <span>Show name</span> <i><span> with </span>Name of Host</i> </a> </li><li class="schedule-past schedule-duration-120"> <a href="#"> <span>Show name</span> <i><span> with </span>Name of Host</i> </a> </li><li class="schedule-past schedule-duration-300"> <a href="#"> <span>A Morning Show</span> <i><span> with </span>Someone</i> </a> </li><li class="schedule-past schedule-duration-240"> <a href="#"> <span>Show name</span> <i><span> with </span>Name of Host</i> </a> </li><li class="schedule-past schedule-duration-120"> <a href="#"> <span>Show name</span> <i><span> with </span>Name of Host</i> </a> </li><li class="schedule-past schedule-duration-60"> <a href="#"> <span>Show name</span> <i><span> with </span>Name of Host</i> </a> </li></ul> </div><div class="schedule-day"> <h2 class="schedule-day-text"> <a href="#"> <span>Sunday</span> </a> </h2> <ul> <li class="schedule-past schedule-duration-120"> <a href="#"> <span>A Morning Show</span> <i><span> with </span>Someone</i> </a> </li><li class="schedule-past schedule-duration-300"> <a href="#"> <span>Show name</span> <i><span> with </span>Name of Host</i> </a> </li><li class="schedule-past schedule-duration-60"> <a href="#"> <span>Show name</span> <i><span> with </span>Name of Host</i> </a> </li><li class="schedule-past schedule-duration-60"> <a href="#"> <span>Show name</span> <i><span> with </span>Name of Host</i> </a> </li><li class="schedule-past schedule-duration-300"> <a href="#"> <span>Show name</span> <i><span> with </span>Name of Host</i> </a> </li><li class="schedule-past schedule-duration-120"> <a href="#"> <span>Show name</span> <i><span> with </span>Name of Host</i> </a> </li><li class="schedule-past schedule-duration-300"> <a href="#"> <span>A Morning Show</span> <i><span> with </span>Someone</i> </a> </li><li class="schedule-past schedule-duration-240"> <a href="#"> <span>Show name</span> <i><span> with </span>Name of Host</i> </a> </li><li class="schedule-past schedule-duration-120"> <a href="#"> <span>Show name</span> <i><span> with </span>Name of Host</i> </a> </li><li class="schedule-past schedule-duration-60"> <a href="#"> <span>Show name</span> <i><span> with </span>Name of Host</i> </a> </li></ul> </div>

        </div>
    </div>
</div>

<?php get_footer(); ?>
