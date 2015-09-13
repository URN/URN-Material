<?php
/**
* Template Name: Music
* Description: Music page with Playlists
*/
get_header(); ?>

<div class="main-content">

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
                <div class="videos">
                    <!-- Youtube Grid of images -->
                    <div id="youmax"></div>

                    <script>
                        jQuery(document).ready(function( $ ) {
                            // Settings (must be below youmax id)
                            $('#youmax').youmax({
                                apiKey: 'AIzaSyBWZBeWeXbWUHcNKbt-vEXH6q3ltP6CDLs', // harry.mumford-turner@urn1350.net
                                youTubeChannelURL: "http://www.youtube.com/user/urn1350",
                                youTubePlaylistURL: "https://www.youtube.com/playlist?list=PL9tY0BWXOZFvWi6WNdcokF_YvXUxyESRW",
                                youmaxColumns: 3,
                                showVideoInLightbox: false,
                                maxResults: 20,
                                showGridOnly: true
                            });
                        });
                    </script>
                </div>
            </div>
            <input id="tab-two" type="radio" name="grp" />
            <label for="tab-two" class="tab-title">Interviews</label>
            <div class="tab-content">
                <div class="audioboom-feed" data-channel-id="4374382" data-channel-audioboom-type="users" data-channel-type="urn-interviews" data-channel-name="URN Interviews"></div>
            </div>
        </section>
    </div>
</div>

<?php get_footer(); ?>
