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

                <div class="schedule-progress"></div>
            </div>

            <div class="schedule-week"></div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
