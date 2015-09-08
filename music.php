<?php
/**
* Template Name: Music
* Description: Music page with Playlists
*/
get_header(); ?>

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

    </div>
</div>


<div class="row">
    <section class="tabs">

        <input id="tab-one" type="radio" name="grp" checked="checked"/>
        <label for="tab-one" class="tab-title">Playlist</label>
        <div class="tab-content">
            Insert Playlist here
        </div>
        <input id="tab-two" type="radio" name="grp" />
        <label for="tab-two" class="tab-title">Interviews</label>
        <div class="tab-content">
            Insert interviews here
        </div>
    </section>

</div>

<?php get_footer(); ?>
