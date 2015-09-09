
jQuery(document).ready(function( $ ) {
    'use strict';

    $('.audioboom-feed').each(function(index) {
        console.log('init audioboom feed');
        audioboom_init($(this));
    });

    function audioboom_init(el) {
        // e.g. https://api.audioboom.com/channels/3139695/audio_clips
        var request = $.ajax({
            url: '//api.audioboom.com/channels/' + $(el).attr('data-channel-id') + '/audio_clips',
            type: 'get',
        });
        request.done(function (data) {
            var $podcasts = $('<ul>', { class: 'cards'});
            $.each(data.body.audio_clips, function (i, clipData) {
                var $podcast = makeCard(clipData, {
                    text: $(el).attr('data-channel-name'),
                    class: $(el).attr('data-channel-type')
                });
                $podcasts.append($podcast);
            });
            $(el).append($podcasts);
        });
    }

    function makeCard(podcast, type) {
        var $podcast_image = $('<img>', {src: podcast.urls.image});
        var $show_type_button = $('<button>', { class: 'btn ' + type.class}).text(type.text);
        var $podcast_embed = $('<iframe>', { scrolling: 'no', src: getAudioBoomEmbedURL(podcast.urls.detail)}).css('width', '100%');
        var $podcast_description = $('<p>').text(podcast.description);

        return $('<li>', { class: 'card'}).append(
            $podcast_image,
            $show_type_button,
            $('<div>', {class: 'podcast_wrapper'}).append(
                $podcast_embed,
                $podcast_description
            )
        );
    }

    function getAudioBoomEmbedURL(podcastURL) {
        var AudioBoomEmbedConfig = '&amp;player_theme=light' +
                                   '&amp;link_color=%235e44cb' +
                                   '&amp;image_option=none' +
                                   '&amp;show_title=true';
        return podcastURL.replace('https://', '//embeds.') + '/embed/v3?eid=AQAAABb87VXfVTIA' + AudioBoomEmbedConfig;
    }

});
