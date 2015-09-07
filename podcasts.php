<?php
/**
* Template Name: Podcasts
* Description: Podcasts page, with the list of podcasts from Audioboom below the content.
*/
get_header(); ?>

<div class="row">
    <!-- Featured podcasts -->
</div>

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

        <div class="filter-container">
            <h2>Filter</h2>
            <label for="podcast-sort-select">Show Type</label>
            <select autocomplete="off" name="podcast-sort-select" class="select podcast-sort-select">
                <option disabled value="all">All</option>
                <option disabled value="after-dark">After Dark</option>
                <option disabled value="culture">Culture</option>
                <option value="daytime" selected>Daytime</option>
                <option disabled value="news">News</option>
                <option disabled value="sport">Sport</option>
            </select>
        </div>

    </div>
</div>


<div class="row">
    <div class="audioboom-feed"></div>

    <script>
    // https://audioboom.com/channel/URNspeech
    // Get list of audioboom things on the Speech channel
    // https://api.audioboom.com/channels/3139695/audio_clips

jQuery(document).ready(function( $ ) {

    $(function() {

        var AudioBoomChannels = {
            URNSpeech: '3139695'
        };

        // Get URN Speech podcasts for now
        var request = $.ajax({
            url: '//api.audioboom.com/channels/' + AudioBoomChannels.URNSpeech + '/audio_clips',
            type: "get",
        });
        request.done(function (data) {
            var $podcasts = $('<ul>', { class: 'cards'});

            $.each(data.body.audio_clips, function (i, clipData) {
                var $podcast = makeCard(clipData, { text: 'URN Daytime', class: 'urn-daytime' });
                $podcasts.append($podcast);
            });

            $('.audioboom-feed').append($podcasts);
        });

        function makeCard(podcast, type) {
            var $podcast_image = $('<img>', {src: podcast.urls.image});
            var $podcast_title = $('<h1>', { class: 'podcast_title'}).text(podcast.title);
            var $podcast_description = $('<p>').text(podcast.description);
            var $podcast_play = $('<audio controls>').append(
              $('<source>', {
                src: podcast.urls.high_mp3,
                type: 'audio/mpeg',
                preload: 'none'
              }).text('Upgrade your browser to listen')
            );
            var $podcast_embed = $('<iframe>', { scrolling: 'no', src: getAudioBoomEmbedURL(podcast.urls.detail)}).css('width', '100%');
            var $show_type_button = $('<button>', { class: 'btn ' + type.class}).text(type.text);

            return $('<li>', { class: 'card'}).append(
                $podcast_image,
                $show_type_button,
                $('<div>', {class: 'podcast_wrapper'}).append(
                    // $podcast_title,
                    $podcast_embed,
                    // $podcast_play,
                    $podcast_description
                )
            );
        }

        function getAudioBoomEmbedURL(podcastURL) {
            var AudioBoomEmbedConfig = '&amp;player_theme=light' +
                                       '&amp;link_color=%235e44cb' +
                                       '&amp;image_option=none' +
                                       '&amp;show_title=true';
            return podcastURL.replace('https://', '//embeds.') + '/embed/v3?eid=AQAAABb87VXfVTIA' + AudioBoomEmbedConfig
        }

    });
});
    </script>
</div>

<?php get_footer(); ?>
