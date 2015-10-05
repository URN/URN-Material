/**
 * AudioBoom JS plugin
 *
 */

var audioboom_feeds = [];

jQuery(document).ready(function( $ ) {
    'use strict';

    function Audioboom_feed() {

        var audioboom_feed = {
            cached_podcasts: [],

            // Setup elements & load config
            init: function(element) {

                // Setup base and load more button
                var feed = this;
                var $load_more = $('<button>', { class: 'btn load-more' }).text('Load more').click(function() {
                    feed.loadCachedPodcasts();
                });

                var audioboom_user = $(element).attr('data-channel-audioboom-type') + '/' + $(element).attr('data-channel-id');
                var channel_url = ($(element).attr('data-channel-audioboom-type') == 'channels') ? '/boos' : '';
                this.config = {
                    api_url: '//api.audioboom.com/' + audioboom_user + '/audio_clips',
                    channel_url: '//audioboom.com/' + audioboom_user + channel_url,
                    feed_name: $(element).attr('data-channel-name'),
                    feed_type: $(element).attr('data-channel-type'),
                    audioboom_type: $(element).attr('data-channel-audioboom-type'),
                    element: $(element),
                    more_button: $load_more,
                    card_type: ($(element).attr('data-card-type') === undefined ? '1' : $(element).attr('data-card-type')),
                    max_display: 2, // index based
                    current_shown: 0 // index based
                };


                if (this.config.card_type == '1') {
                    $(element).append(
                        $('<ul>', { class: 'cards'}).append($('<li>'))
                    ).append($load_more);
                } else {
                    $(element).append(
                        $('<div>', { class: 'card-small'})
                    );
                }


                this.loadPodcasts();
            },

            // Load podcasts from memory rather than making an api call
            loadCachedPodcasts: function() {
                this.displayPodcasts(this, this.cached_podcasts);
            },

            // Load podcasts via api call
            loadPodcasts: function() {
                this.getData(this.displayPodcasts, this);
            },

            displaySmallPodcasts: function(feed, podcasts) {
                this.config.more_button.css('display', 'none');

                var number_to_show = 2; // Max number to show
                if (podcasts.length < number_to_show) {
                    number_to_show = podcasts.length;
                }

                for (var i = 0; i < number_to_show; i++) {
                    $(feed.config.element).find('.card-small').append(
                        feed.makeSmallCard(feed, podcasts[i])
                    );
                }
            },

            displayPodcasts: function(feed, podcasts) {
                if (feed.config.card_type == '0') {
                    feed.displaySmallPodcasts(feed, podcasts);
                    return;
                }

                if (podcasts === undefined) {
                    feed.setMoreButton('No more', true);
                    return;
                }
                for (var i = feed.config.current_shown; i < podcasts.length; i++) {

                    if (i > feed.config.max_display + feed.config.current_shown) {
                        feed.config.current_shown = i;
                        break;
                    }

                    $(feed.config.element).find('.cards').append(feed.makeCard(feed, podcasts[i]));

                    if (podcasts.length - 1 == feed.config.current_shown) {
                        // Reached max podcasts
                        // Set button to null
                        feed.setMoreButton('No more', true);
                        break;
                    }
                }
            },

            makeEmbedUrl: function(url, image) {
                var embed_config = 'player_theme=light&amp;' +
                                   'link_color=%235e44cb&amp;' +
                                   (image ? "" : "image_option='none'&amp;") +
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
                var $podcast_embed = $('<iframe>', { scrolling: 'no', src: feed.makeEmbedUrl(podcast.urls.detail, false)}).css('width', '100%');
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

            makeSmallCard: function(feed, podcast) {
                var $podcast_embed = $('<iframe>',
                {
                    scrolling: 'no',
                    src: feed.makeEmbedUrl(podcast.urls.detail, true)
                }).css('width', '100%');

                return $('<div>', { class: 'clip'}).append($podcast_embed);
            },

            // Get data from Audio Boom
            // e.g. https://api.audioboom.com/channels/3139695/audio_clips
            getData: function(callback) {
                var feed = this;
                $.ajax({
                    url: this.config.api_url,
                    type: 'get'
                }).done(function (data) {

                    // For users, the API call, returns all child channels, so we need to only add root channel podcasts
                    if (feed.config.audioboom_type == 'users') {
                        $.each(data.body.audio_clips, function(index, val) {
                            if(val !== undefined && val.channel === undefined) { // If there isnt a channel
                                feed.cached_podcasts.push(val); // add it
                            }
                        });
                    } else {
                        // Add everything
                        feed.cached_podcasts = data.body.audio_clips;
                    }

                    callback(feed, feed.cached_podcasts);
                }).always(function(result) {
                    if (result.status == 404) {
                        console.log('Error wrong AudioBoom channel ' + result.statusText);
                        feed.config.more_button.text('Cant find Audioboom channel').attr('disabled', 'true');
                    }
                });
            },

            setMoreButton: function(message, disable) {
                var disabled = (disable ? 'true' : 'false');
                this.config.more_button.text(message).attr('disabled', disabled);
            }
        };
        return audioboom_feed;
    }

    // Initialise each audioboom element & add them to global array for debugging & more
    $('.audioboom-feed').each(function() {
        var newFeed = new Audioboom_feed();
        newFeed.init(this);
        audioboom_feeds.push(newFeed);
    });
});

