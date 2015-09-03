<?php
/**
* Template Name: Schedule
* Description: Schedule page, with the full schedule below the content.
*/
get_header(); ?>

<div class="row">
    <?php
        $show_categories = array();
        $show_categories[] = array('name' => 'After Dark', 'slug' => 'afterdark', 'link' => 'afterdark.jpg');
        $show_categories[] = array('name' => 'Culture', 'slug' => 'culture', 'link' => 'culture.jpg');
        $show_categories[] = array('name' => 'Daytime', 'slug' => 'daytime', 'link' => 'daytime.jpg');
        $show_categories[] = array('name' => 'News', 'slug' => 'news', 'link' => 'news.jpg');
        $show_categories[] = array('name' => 'Sport', 'slug' => 'sport', 'link' => 'sport.jpg');

        foreach($show_categories as $show) {
            echo "<div class='show-photo'>";
            echo "  <a href='" . get_permalink( get_page_by_path( $show['slug'] ) ) . "'>";
            echo "  <img src='" . get_template_directory_uri() . "/images/schedule/" . $show['link'] . "'>";
            echo "  </a>";
            echo "</div>";
        }
    ?>
</div>

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
            <ul class="day-names">
                <li class="day-name">Monday</li>
                <li class="day-name">Tuesday</li>
                <li class="day-name">Wednesday</li>
                <li class="day-name">Thursday</li>
                <li class="day-name">Friday</li>
                <li class="day-name">Saturday</li>
                <li class="day-name">Sunday</li>
            </ul>
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
                    <li class="day monday">
                        <ul class="slots"></ul>
                    </li>
                    <li class="day tuesday">
                        <ul class="slots"></ul>
                    </li>
                    <li class="day wednesday">
                        <ul class="slots"></ul>
                    </li>
                    <li class="day thursday">
                        <ul class="slots"></ul>
                    </li>
                    <li class="day friday">
                        <ul class="slots"></ul>
                    </li>
                    <li class="day saturday">
                        <ul class="slots"></ul>
                    </li>
                    <li class="day sunday">
                        <ul class="slots"></ul>
                    </li>
                </ul>
            </div>
        </div>

<?php get_footer(); ?>
