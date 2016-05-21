<?php
/**
* Template Name: Schedule
* Description: Schedule page, with the full schedule below the content.
*/
get_header(); ?>
<div class="main-content">

    <div class="row">
        <?php
            $show_categories = array();
            $show_categories[] = array('name' => 'After Dark', 'slug' => 'shows', 'anchor' => '#afterdark', 'link' => 'afterdark.jpg');
            $show_categories[] = array('name' => 'Culture', 'slug' => 'shows', 'anchor' => '#culture', 'link' => 'culture.jpg');
            $show_categories[] = array('name' => 'Daytime', 'slug' => 'shows', 'anchor' => '#daytime', 'link' => 'daytime.jpg');
            $show_categories[] = array('name' => 'News', 'slug' => 'shows', 'anchor' => '#news', 'link' => 'news.jpg');
            $show_categories[] = array('name' => 'Sport', 'slug' => 'shows', 'anchor' => '#sport', 'link' => 'sport.jpg');

            foreach($show_categories as $show) {
                echo "<div class='show-photo'>";
                echo "  <a href=" . get_permalink( get_page_by_path( $show['slug'] ) ) . $show['anchor'] . ">";
                echo "  <img src='" . get_template_directory_uri() . "/images/schedule/" . $show['link'] . "'>";
                echo "  </a>";
                echo "</div>";
            }
        ?>
    </div>

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

        <div class="filter-container">
            <h2>Filter</h2>
            <label for="schedule-category-select">Show Category</label>
            <select autocomplete="off" name="schedule-category-select" class="select schedule-category-select">
                <option value="all">All</option>
                <option value="after-dark">After Dark</option>
                <option value="culture">Culture</option>
                <option value="daytime">Daytime</option>
                <option value="news">News</option>
                <option value="sport">Sport</option>
            </select>

            <div class="search-filter-container">
                <label for="schedule-category-filter-search">Search</label>
                <input autocomplete="off" type="text" name="schedule-category-filter-search" class="txt schedule-category-filter-search">
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
                <li class="day monday">
                    <h1 class="inline-day-name">Monday</h1>
                    <ul class="slots"></ul>
                </li>
                <li class="day tuesday">
                    <h1 class="inline-day-name">Tuesday</h1>
                    <ul class="slots"></ul>
                </li>
                <li class="day wednesday">
                    <h1 class="inline-day-name">Wednesday</h1>
                    <ul class="slots"></ul>
                </li>
                <li class="day thursday">
                    <h1 class="inline-day-name">Thursday</h1>
                    <ul class="slots"></ul>
                </li>
                <li class="day friday">
                    <h1 class="inline-day-name">Friday</h1>
                    <ul class="slots"></ul>
                </li>
                <li class="day saturday">
                    <h1 class="inline-day-name">Saturday</h1>
                    <ul class="slots"></ul>
                </li>
                <li class="day sunday">
                    <h1 class="inline-day-name">Sunday</h1>
                    <ul class="slots"></ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<?php get_footer(); ?>
