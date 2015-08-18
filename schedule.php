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
                    <li><span>1am</span></li>
                    <li><span>2am</span></li>
                    <li><span>3am</span></li>
                    <li><span>4am</span></li>
                    <li><span>5am</span></li>
                    <li><span>6am</span></li>
                    <li><span>7am</span></li>
                    <li><span>8am</span></li>
                    <li><span>9am</span></li>
                    <li><span>10am</span></li>
                    <li><span>11am</span></li>
                    <li><span>Noon</span></li>
                    <li><span>1pm</span></li>
                    <li><span>2pm</span></li>
                    <li><span>3pm</span></li>
                    <li><span>4pm</span></li>
                    <li><span>5pm</span></li>
                    <li><span>6pm</span></li>
                    <li><span>7pm</span></li>
                    <li><span>8pm</span></li>
                    <li><span>9pm</span></li>
                    <li><span>10pm</span></li>
                    <li><span>11pm</span></li>
                </ul>

                <!-- Live thing (set the width via JS) -->
                <div class="schedule-progress" style="width:300px;">
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
                    <li class="schedule-past schedule-duration-600">
                        <a href="#">
                            <span>Show name</span>
                            <i><span> with </span>Name of Host</i>
                        </a>
                    </li>
                </ul>

            </div><!-- ./ schedule-day -->

            <!-- Dummy data, minified -->
         <div class="schedule-day"> <h2 class="schedule-day-text"> <a href="#"> <span>Tuesday</span> </a> </h2> <ul> <li class="schedule-past schedule-duration-120"> <a href="#"> <span>Harrys Morning Show</span> <i><span> with </span>Harry MT</i> </a> </li><li class="schedule-past schedule-duration-300"> <a href="#"> <span>Ionas Afternoon Show</span> <i><span> with </span>Iona Hampson</i> </a> </li><li class="schedule-past schedule-duration-300"> <a href="#"> <span>Ionas Afternoon Show</span> <i><span> with </span>Iona Hampson</i> </a> </li><li class="schedule-past schedule-duration-120"> <a href="#"> <span>Ionas Afternoon Show</span> <i><span> with </span>Iona Hampson</i> </a> </li><li class="schedule-past schedule-duration-300"> <a href="#"> <span>Ionas Afternoon Show</span> <i><span> with </span>Iona Hampson</i> </a> </li></ul> </div><div class="schedule-day"> <h2 class="schedule-day-text"> <a href="#"> <span>Wednesday</span> </a> </h2> <ul> <li class="schedule-past schedule-duration-120"> <a href="#"> <span>Harrys Morning Show</span> <i><span> with </span>Harry MT</i> </a> </li><li class="schedule-past schedule-duration-300"> <a href="#"> <span>Ionas Afternoon Show</span> <i><span> with </span>Iona Hampson</i> </a> </li><li class="schedule-past schedule-duration-300"> <a href="#"> <span>Ionas Afternoon Show</span> <i><span> with </span>Iona Hampson</i> </a> </li><li class="schedule-past schedule-duration-120"> <a href="#"> <span>Ionas Afternoon Show</span> <i><span> with </span>Iona Hampson</i> </a> </li><li class="schedule-past schedule-duration-300"> <a href="#"> <span>Ionas Afternoon Show</span> <i><span> with </span>Iona Hampson</i> </a> </li></ul> </div><div class="schedule-day"> <h2 class="schedule-day-text"> <a href="#"> <span>Thursday</span> </a> </h2> <ul> <li class="schedule-past schedule-duration-120"> <a href="#"> <span>Harrys Morning Show</span> <i><span> with </span>Harry MT</i> </a> </li><li class="schedule-past schedule-duration-300"> <a href="#"> <span>Ionas Afternoon Show</span> <i><span> with </span>Iona Hampson</i> </a> </li><li class="schedule-past schedule-duration-300"> <a href="#"> <span>Ionas Afternoon Show</span> <i><span> with </span>Iona Hampson</i> </a> </li><li class="schedule-past schedule-duration-120"> <a href="#"> <span>Ionas Afternoon Show</span> <i><span> with </span>Iona Hampson</i> </a> </li><li class="schedule-past schedule-duration-300"> <a href="#"> <span>Ionas Afternoon Show</span> <i><span> with </span>Iona Hampson</i> </a> </li></ul> </div><div class="schedule-day"> <h2 class="schedule-day-text"> <a href="#"> <span>Friday</span> </a> </h2> <ul> <li class="schedule-past schedule-duration-120"> <a href="#"> <span>Harrys Morning Show</span> <i><span> with </span>Harry MT</i> </a> </li><li class="schedule-past schedule-duration-300"> <a href="#"> <span>Ionas Afternoon Show</span> <i><span> with </span>Iona Hampson</i> </a> </li><li class="schedule-past schedule-duration-300"> <a href="#"> <span>Ionas Afternoon Show</span> <i><span> with </span>Iona Hampson</i> </a> </li><li class="schedule-past schedule-duration-120"> <a href="#"> <span>Ionas Afternoon Show</span> <i><span> with </span>Iona Hampson</i> </a> </li><li class="schedule-past schedule-duration-300"> <a href="#"> <span>Ionas Afternoon Show</span> <i><span> with </span>Iona Hampson</i> </a> </li></ul> </div><div class="schedule-day"> <h2 class="schedule-day-text"> <a href="#"> <span>Saturday</span> </a> </h2> <ul> <li class="schedule-past schedule-duration-120"> <a href="#"> <span>Harrys Morning Show</span> <i><span> with </span>Harry MT</i> </a> </li><li class="schedule-past schedule-duration-300"> <a href="#"> <span>Ionas Afternoon Show</span> <i><span> with </span>Iona Hampson</i> </a> </li><li class="schedule-past schedule-duration-300"> <a href="#"> <span>Ionas Afternoon Show</span> <i><span> with </span>Iona Hampson</i> </a> </li><li class="schedule-past schedule-duration-120"> <a href="#"> <span>Ionas Afternoon Show</span> <i><span> with </span>Iona Hampson</i> </a> </li><li class="schedule-past schedule-duration-300"> <a href="#"> <span>Ionas Afternoon Show</span> <i><span> with </span>Iona Hampson</i> </a> </li></ul> </div><div class="schedule-day"> <h2 class="schedule-day-text"> <a href="#"> <span>Sunday</span> </a> </h2> <ul> <li class="schedule-past schedule-duration-120"> <a href="#"> <span>Harrys Morning Show</span> <i><span> with </span>Harry MT</i> </a> </li><li class="schedule-past schedule-duration-300"> <a href="#"> <span>Ionas Afternoon Show</span> <i><span> with </span>Iona Hampson</i> </a> </li><li class="schedule-past schedule-duration-300"> <a href="#"> <span>Ionas Afternoon Show</span> <i><span> with </span>Iona Hampson</i> </a> </li><li class="schedule-past schedule-duration-120"> <a href="#"> <span>Ionas Afternoon Show</span> <i><span> with </span>Iona Hampson</i> </a> </li><li class="schedule-past schedule-duration-300"> <a href="#"> <span>Ionas Afternoon Show</span> <i><span> with </span>Iona Hampson</i> </a> </li></ul> </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
