<?php
/**
* Template Name: URN TV
* Description: Shows a youtube video grid with no content.
*/
get_header(); ?>

<div class="main-content">
    <div class="videos">
        <!-- Youtube Grid of images -->
        <div id="youmax"></div>

        <script>
            jQuery(document).ready(function( $ ) {
                // Settings (must be below youmax id)
                $('#youmax').youmax({
                    apiKey: 'AIzaSyBWZBeWeXbWUHcNKbt-vEXH6q3ltP6CDLs', // harry.mumford-turner@urn1350.net
                    youTubeChannelURL: "http://www.youtube.com/user/urn1350",
                    youTubePlaylistURL: "https://www.youtube.com/playlist?list=PLj7bGB3G_znuQQjyceRF5WXDpopQ_5rTG",
                    youmaxDefaultTab: "UPLOADS", // PLAYLISTS || UPLOADS || FEATURED
                    youmaxColumns: 3,
                    showVideoInLightbox: false,
                    maxResults: 20
                });
            });
        </script>
    </div>
</div>
<?php get_footer(); ?>
