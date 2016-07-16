<?php
/**
 * Template Name: Author
 */
get_header();

$user = get_queried_object();
?>

<div class="main-content">
    <div class="entry-content">
    <?php
        echo "<h1 class='title'>" . get_avatar($user->ID, 128) ." " . $user->display_name . "</h1>";
    ?>

    <h2 class="subTitle">My posts</h2>

    <?php
        // Start the loop.
        while ( have_posts() ) : the_post();

            // Include the page content template.
            the_content();
            echo "<br />";

        // End the loop.
        endwhile;
        ?>
    </div>
</div>
<?php get_footer(); ?>
