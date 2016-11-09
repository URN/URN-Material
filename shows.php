<?php
/**
 * Template Name: Shows
*/

 $terms = get_terms( 'shows', 'orderby=count&hide_empty=0' );

 $shows_output = [];
 foreach ($terms as $show) {
    $show_id = $show->term_id;
    $all_options = wp_load_alloptions();
    $options = array();
    foreach ($all_options as $key => $value) {
        $key_start = 'show_' . $show_id . '_custom_option_';
        if (preg_match('/^' . $key_start . '\w*$/', $key)) {
            $options[str_replace($key_start, '', $key)] = $value;
        }
    }
    $options['show'] = $show;
    $shows_output[] = $options;
 }

// Sort by show name
usort($shows_output, function($a, $b) {
    return strcmp($a['show']->name, $b['show']->name);
});

// Sort by show category
usort($shows_output, function($a, $b) {
    return strcmp($a['show_category'], $b['show_category']);
});

get_header(); ?>

<div class="main-content">
    <div class="entry-content">
        <?php
            // Start the loop.
            while ( have_posts() ) : the_post();

                // Include the page content template.
                the_content();

            // End the loop.
            endwhile;
            ?>

        <div class="shows">
            <h1 id="on-air">On-air shows</h1>
            <?php
                // Print each show
                $curr_cat = "";
                foreach ($shows_output as $show_sorted) {
                    if ($curr_cat != $show_sorted['show_category']) {
                        $cat = strtolower($show_sorted['show_category']);
                        echo '<h2 id=' . str_replace(' ', '', $cat) . '>' . $show_sorted['show_category'] . '</h2>';
                    }
                    $curr_cat = $show_sorted['show_category'];
                    echo '<div class="show">';
                        echo '<h3><a href=' . get_term_link($show_sorted['show']) . '>' . $show_sorted['show']->name . '</a></h3>';
                        echo '<p>' . $show_sorted['show']->description . '</p>';
                    echo '</div>';
                }
            ?>

            <h1 id="off-air">Off-air shows</h1>
            <p>No shows found.</p>
        </div>
    </div>
</div>

<?php get_footer(); ?>
