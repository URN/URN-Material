<?php
/**
* Template Name: Music
* Description: Music page with Playlists
*/
get_header(); ?>

<div class="main-content">

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

    <section class="tabs">

        <input id="tab-playlist-a" type="radio" name="grp" checked="checked"/>
        <label for="tab-playlist-a" class="tab-title">Playlists</label>
        <div class="tab-content">
            <div class="videos">
                <!-- Youtube Grid of images -->
                <div class="youmax"></div>

                <script>
                    jQuery(document).ready(function( $ ) {
                        // Settings (must be below youmax class)
                        $('.youmax').youmax({
                            apiKey: 'AIzaSyBWZBeWeXbWUHcNKbt-vEXH6q3ltP6CDLs', // harry.mumford-turner@urn1350.net
                            youTubeChannelURL: "http://www.youtube.com/user/urn1350",
                            youTubePlaylistURL: "PL9tY0BWXOZFvWi6WNdcokF_YvXUxyESRW",
                            youmaxColumns: 3,
                            showVideoInLightbox: false,
                            maxResults: 20,
                            showHeader: false,
                            customTabs: [
                                {
                                    name: "Playlist A",
                                    type: 'featured',
                                    url: "PL7C00E83736FB02C3"
                                },
                                {
                                    name: "Playlist B",
                                    type: 'featured',
                                    url: "PL9tY0BWXOZFvWi6WNdcokF_YvXUxyESRW"
                                },
                                {
                                    name: "Playlist C",
                                    type: 'featured',
                                    url: "PLWRJVI4Oj4IaYIWIpFlnRJ_v_fIaIl6Ey"
                                }
                            ]
                        });
                    });
                </script>
            </div>
        </div>

        <input id="tab-interviews" type="radio" name="grp" />
        <label for="tab-interviews" class="tab-title">Interviews</label>
        <div class="tab-content">
            <div class="audioboom-feed" data-channel-id="4374382" data-channel-audioboom-type="users" data-channel-type="urn-interviews" data-channel-name="URN Interviews"></div>
        </div>
    </section>
</div>

<?php get_footer(); ?>
