<?php
/**
* Template Name: URN TV
* Description: Shows a youtube video grid with no content.
*/
get_header(); ?>

<div class="main-content">
    <div class="videos">
        <!-- Youtube Grid of images -->
        <div class="youmax"></div>

        <script>
            jQuery(document).ready(function( $ ) {
                // Settings (must be below youmax id)
                $('.youmax').youmax({
                    apiKey: 'AIzaSyBWZBeWeXbWUHcNKbt-vEXH6q3ltP6CDLs',
                    youTubeChannelURL: "http://www.youtube.com/user/urn1350",
                    youTubePlaylistURL: "PLj7bGB3G_znuQQjyceRF5WXDpopQ_5rTG",
                    youTubeFeaturedURL: "PLj7bGB3G_znvMLnUKwsaNUvfRf8M7BQNG",
                    youmaxDefaultTab: "UPLOADS", // PLAYLISTS || UPLOADS || FEATURED
                    youmaxColumns: 3,
                    showVideoInLightbox: false,
                    maxResults: 20,
                    showHeader: true
                });
            });
        </script>
    </div>
</div>
<?php get_footer(); ?>
