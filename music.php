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
                                        url: "PLj7bGB3G_znvbJ5E6hLDYn26akuU5HJkz"
                                    },
                                    {
                                        name: "Playlist B",
                                        type: 'featured',
                                        url: "PLj7bGB3G_znu08f1pWCwCHOCpBAhRHC78"
                                    },
                                    {
                                        name: "Playlist C",
                                        type: 'featured',
                                        url: "PLj7bGB3G_znschvxh-cXqPtX7DS54Ui5k"
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
</div>

<?php get_footer(); ?>
