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
<div class="row">
        <iframe class="row vertical" src="https://embed.spotify.com/?uri=spotify%3Auser%3Aurnplaylist%3Aplaylist%3A7a5zE78nIKxubabMBYq3EA" width="300" height="800" frameborder="0" allowtransparency="true"></iframe>

        <div class="row vertical">
                <!-- Youtube Grid of images -->
                <div class="youmax"></div>

                <script>
                    jQuery(document).ready(function( $ ) {
                        // Settings (must be below youmax class)
                        $('.youmax').youmax({
                            apiKey: 'AIzaSyBWZBeWeXbWUHcNKbt-vEXH6q3ltP6CDLs', // harry.mumford-turner@urn1350.net
                            youTubeChannelURL: "http://www.youtube.com/user/urn1350",
                            youTubePlaylistURL: "PL9tY0BWXOZFvWi6WNdcokF_YvXUxyESRW",
                            youmaxColumns: 1,
                            showVideoInLightbox: false,
                            maxResults: 3,
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
<?php get_footer(); ?>
