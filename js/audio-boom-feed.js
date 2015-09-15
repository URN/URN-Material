
var audioboom_feeds = [];

jQuery(document).ready(function( $ ) {
    'use strict';

    var audioboom_feed = {

        // Setup elements & load config
        init: function(element) {

            // Setup base and load more button
            var feed = this;
            var $load_more = $('<button>', { class: 'btn load-more' }).text('Load more').click(function() {
                feed.loadCachedPodcasts();
            });
            $(element).append(
                $('<ul>', { class: 'cards'}).append($('<li>'))
            ).append($load_more);

            var audioboom_user = $(element).attr('data-channel-audioboom-type') + '/' + $(element).attr('data-channel-id');
            var channel_url = ($(element).attr('data-channel-audioboom-type') == 'channel') ? '/boos' : '';
            this.config = {
                api_url: '//api.audioboom.com/' + audioboom_user + '/audio_clips',
                channel_url: '//audioboom.com/' + audioboom_user + channel_url,
                feed_name: $(element).attr('data-channel-name'),
                feed_type: $(element).attr('data-channel-type'),
                element: $(element).find('.cards'),
                more_button: $load_more,
                max_display: 2, // index based
                current_shown: 0 // index based
            };

            this.loadPodcasts();
        },

        // Load podcasts from memory rather than making an api call
        loadCachedPodcasts: function() {
            this.displayPodcasts(this, this.cached_podcasts);
        },

        // Load podcasts via api call
        loadPodcasts: function() {
            this.getData(this.displayPodcasts);
        },

        displayPodcasts: function(feed, podcasts) {
            for (var i = feed.config.current_shown; i < podcasts.length; i++) {

                if (i > feed.config.max_display + feed.config.current_shown) {
                    feed.config.current_shown = i;
                    break;
                }

                $(feed.config.element).append(feed.makeCard(feed, podcasts[i]));

                if (podcasts.length - 1 == feed.config.current_shown) {
                    // Reached max podcasts
                    // Set button to null
                    feed.config.more_button.text('No more').attr('disabled', 'true');
                    break;
                }
            }
        },

        makeEmbedUrl: function(url) {
            var embed_config = 'player_theme=light&amp;' +
                               'link_color=%235e44cb&amp;' +
                               'image_option=none&amp;' +
                               'show_title=true';
            return url.replace('https://', '//embeds.') + '/embed/v3?' + embed_config;
        },

        makeCard: function(feed, podcast) {
            var $podcast_image = $('<img>', {src: podcast.urls.image});
            var $show_type_button = $('<a>').attr('href', feed.config.channel_url).append(
                $('<button>', {
                    class: 'btn ' + feed.config.feed_type
                }).text(feed.config.feed_name)
            );
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

        // Get data from Audio Boom
        // e.g. https://api.audioboom.com/channels/3139695/audio_clips
        getData: function(callback) {
            var feed = this;
            $.ajax({
                url: this.config.api_url,
                type: 'get'
            }).done(function (data) {
                feed.cached_podcasts = data.body.audio_clips;
                callback(feed, data.body.audio_clips);
            });
        }
    };

    // Initialise each audioboom element & add them to global array for debugging & more
    $('.audioboom-feed').each(function() {
        audioboom_feed.init($(this));
        audioboom_feeds.push(audioboom_feed);
    });
});

