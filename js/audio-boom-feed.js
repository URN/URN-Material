
jQuery(document).ready(function( $ ) {
    'use strict';

    var audioboom_feed = {

        init: function(element) {
            this.config = {
                api_url: '//api.audioboom.com/' + $(element).attr('data-channel-audioboom-type') +
                    '/' + $(element).attr('data-channel-id') + '/audio_clips',
                feed_name: $(element).attr('data-channel-name'),
                feed_type: $(element).attr('data-channel-type'),
                element: element
            };

            this.getData(this.processPodcasts);
        },

        processPodcasts: function(feed, podcasts) {
            var $podcasts = $('<ul>', { class: 'cards'});

            for (var i = 0; i < podcasts.length; i++) {
                $podcasts.append(feed.makeCard(feed, podcasts[i]));
            }
            $(feed.config.element).append($podcasts);
        },

        makeEmbedUrl: function(url) {
            var embed_config = 'player_theme=light&' +
                               'link_color=%235e44cb&' + // %23 should be #
                               'image_option=none&' +
                               'show_title=true';
            return encodeURIComponent(url.replace('https://', '//embeds.') + '/embed/v3?' + embed_config);
        },

        makeCard: function(feed, podcast) {
            var $podcast_image = $('<img>', {src: podcast.urls.image});
            var $show_type_button = $('<button>', {class: 'btn ' + feed.config.feed_type}).text(feed.config.feed_name);
            var $podcast_embed = $('<iframe>', { scrolling: 'no', src: feed.makeEmbedUrl(podcast.urls.detail)}).css('width', '100%');
            var $podcast_description = $('<p>').text(podcast.description);

            return $('<li>', { class: 'card'}).append(
                $podcast_image,
                $show_type_button,
                $('<div>', { class: 'podcast_wrapper'}).append(
                    $podcast_embed,
                    $podcast_description
                )
            );
        },

        getData: function(callback) {
            var feed = this;
            // e.g. https://api.audioboom.com/channels/3139695/audio_clips
            $.ajax({
                url: this.config.api_url,
                type: 'get'
            }).done(function (data) {
                callback(feed, data.body.audio_clips);
            });
        }
    };

    $('.audioboom-feed').each(function() {
        audioboom_feed.init($(this));
    });
});
