/*
 * YouMax Youtube gallery Jquery Library v2.0.
 *
 * https://github.com/codehandling/youmax
 * @edited Harry Mumford-Turner
 * @license MIT
 */

(function ($) {
  // 'use strict';

  var youmax_global_options = {};

    var secondsToTime = function (duration) {
        if (null === duration || duration === "" || duration === "undefined") {
            return "?";
        }
        var minutes = Math.floor(duration / 60), seconds = duration % 60;

        if (seconds < 10) {
            seconds = "0" + seconds;
        }
        return minutes + ":" + seconds;
    },

    // utility function to display time
    convertDuration = function (videoDuration) {
      var duration, returnDuration;
      videoDuration = videoDuration.replace('PT', '').replace('S', '').replace('M', ':').replace('H', ':');

      //TODO: fix some duration settings
      //console.log('videoDuration-'+videoDuration);

      var videoDurationSplit = videoDuration.split(':');
      returnDuration = videoDurationSplit[0];

      for (var i = 1; i < videoDurationSplit.length; i++) {
          duration = videoDurationSplit[i];
          //console.log('duration-'+duration);
          if (duration === "") {
            returnDuration += ":00";
          } else {
            duration = parseInt(duration, 10);
            //console.log('duration else -'+duration)
            if (duration < 10) {
              returnDuration += ":0" + duration;
            } else {
              returnDuration += ":" + duration;
            }
          }
      }
      if (videoDurationSplit.length == 1) {
        returnDuration = "0:" + returnDuration;
      }
      return returnDuration;
    },

    getDateDiff = function (timestamp) {
      if (null === timestamp || timestamp === "" || timestamp === "undefined")
        return "?";

      //alert(timestamp);
      var splitDate = ((timestamp.toString().split('T'))[0]).split('-');
      var d1 = new Date();

      var d1Y = d1.getFullYear();
      var d2Y = parseInt(splitDate[0], 10);
      var d1M = d1.getMonth();
      var d2M = parseInt(splitDate[1], 10);

      var diffInMonths = (d1M + 12 * d1Y) - (d2M + 12 * d2Y);

      if (diffInMonths <= 1)
        return "1 month";
      else if (diffInMonths < 12)
        return diffInMonths + " months";

      var diffInYears = Math.floor(diffInMonths / 12);

      if (diffInYears <= 1)
        return "1 year";
      else if (diffInYears < 12)
        return diffInYears + " years";
    },

    getReadableNumber = function (number) {
      if (null === number || number === "" || number === "undefined")
        return "?";

      number = number.toString();
      var readableNumber = '';
      var count = 0;
      for (var k = number.length; k >= 0; k--) {
        readableNumber += number.charAt(k);
        if (count == 3 && k > 0) {
          count = 1;
          readableNumber += ',';
        } else {
          count++;
        }
      }
      return readableNumber.split("").reverse().join("");
    },

    // Get channel Id if channel URL is of the form ....../user/Adele
    getChannelId = function (apiUrl) {
      $.ajax({
        url: apiUrl,
        type: "GET",
        async: true,
        cache: true,
        dataType: 'jsonp',
        success: function (response) {
          youmaxChannelId = response.items[0].id;
          getChannelDetails(youmaxChannelId);
        },
        error: function (html) {
          alert(html);
        },
        beforeSend: setHeader
      });
    },

    getChannelDetails = function (channelId) {
      // var apiProfileURL = "http://gdata.youtube.com/feeds/api/users/"+youmaxUser+"?v=2&alt=json";
      var apiProfileURL = "https://www.googleapis.com/youtube/v3/channels?part=brandingSettings%2Csnippet%2Cstatistics%2CcontentDetails&id=" + channelId + "&key=" + youmax_global_options.apiKey;

      $.ajax({
        url: apiProfileURL,
        type: "GET",
        async: true,
        cache: true,
        dataType: 'jsonp',
        success: function (response) {
          showInfo(response);
        },
        error: function (html) {
          alert(html);
        },
        beforeSend: setHeader
      });
    },

    setHeader = function (xhr) {
      if (xhr && xhr.overrideMimeType) {
        xhr.overrideMimeType("application/j-son;charset=UTF-8");
      }
    },

    showLoader = function () {
      youmax_global_options.youmaxItemCount = 0;
      youmax_global_options.element.find('.youmax-video-list-div').empty();
      youmax_global_options.element.find('.youmax-video').hide();
      youmax_global_options.element.find('.youmax-video').attr('src', '');
      youmax_global_options.element.find('.youmax-video-list-div').append('<div style="text-align:center; height:200px; font:14px Calibri;"><br><br><br><br><br><br>loading...</div>');
    },

    showInfo = function (response) {
      // console.log('showInfo');
      // console.log(response);

      var channelData = response.items[0];
      var channelId = channelData.id;
      var channelName = channelData.snippet.title;
      var channelPic = channelData.snippet.thumbnails.default.url;
      var channelSubscribers = channelData.statistics.subscriberCount;
      var channelViews = channelData.statistics.viewCount;
      var channelDesc = "";
      var channelUploadsPlaylistId = channelData.contentDetails.relatedPlaylists.uploads;

      youmax_global_options.element.find('.youmax-header').append('<img class="youmax-header-logo" src="' + channelPic + '"/>' + channelName);
      console.log(youmax_global_options.element);
      youmax_global_options.element.find('.youmax-header').append('&nbsp;&nbsp;&nbsp;&nbsp;<div class="youmax-subscribe"><div class="g-ytsubscribe" data-channelid="' + channelId + '" data-layout="default" data-count="default"></div></div>');

      //youmax_global_options.element.find('.youmax-stat-holder').append('<div class="youmax-stat">'+channelSubscribers+'<br/> subscribers </div><div class="youmax-stat">'+channelViews+'<br/>video views</div>');

      //youmax_global_options.element.find('.youmax-stat-holder').append('<div class="youmax-stat"><span class="youmax-stat-count">'+getReadableNumber(channelViews)+'</span><br/> video views </div><div class="youmax-stat"><span class="youmax-stat-count">'+getReadableNumber(channelSubscribers)+'</span><br/>subscribers</div>');

      //youmax_global_options.element.find('.youmax-channel-desc').append('About '+channelName+'<br/>'+channelDesc);

      renderSubscribeButton();

      youmax_global_options.element.find('.youmax-tabs').find('span[class^=uploads_]').attr('class', 'uploads_' + channelUploadsPlaylistId);

      youmaxDefaultTab = youmax_global_options.youmaxDefaultTab;

      if (typeof youmaxDefaultTab === 'undefined' || null === youmaxDefaultTab || youmaxDefaultTab === "" || youmaxDefaultTab == "undefined") {
        youmax_global_options.element.find(".youmax-tabs span[class^=featured_]").click();
      } else if (youmaxDefaultTab.toUpperCase() == 'UPLOADS' || youmaxDefaultTab.toUpperCase() == 'UPLOAD') {
        youmax_global_options.element.find(".youmax-tabs span[class^=uploads_]").click();
      } else if (youmaxDefaultTab.toUpperCase() == 'PLAYLISTS' || youmaxDefaultTab.toUpperCase() == 'PLAYLIST') {
        youmax_global_options.element.find(".youmax-tabs span[class^=playlists_]").click();
      } else if (youmaxDefaultTab.toUpperCase() == 'FEATURED' || youmaxDefaultTab.toUpperCase() == 'FEATURED') {
        youmax_global_options.element.find(".youmax-tabs span[class^=featured_]").click();
      }
    },

    renderSubscribeButton = function () {
      $.ajaxSetup({
        cache: true
      });

      $.getScript("https://apis.google.com/js/platform.js")
        .done(function (script, textStatus) {
          //alert( textStatus );
        })
        .fail(function (jqxhr, settings, exception) {
          //alert( "Triggered ajaxError handler." );
        });
    },

    showPlaylists = function (response, loadMoreFlag) {
      // console.log(response);

      if (!loadMoreFlag) {
        youmax_global_options.element.find('.youmax-video-list-div').empty();
      }

      var nextPageToken = response.nextPageToken;
      var $youmaxLoadMoreDiv = youmax_global_options.element.find('.youmax-load-more-div');
      //console.log('nextPageToken-'+nextPageToken);

      if (null != nextPageToken && nextPageToken != "undefined" && nextPageToken !== "") {
        $youmaxLoadMoreDiv.data('nextpagetoken', nextPageToken);
      } else {
        $youmaxLoadMoreDiv.data('nextpagetoken', '');
      }

      youmaxColumns = youmax_global_options.youmaxColumns;

      var playlistArray = response.items;
      var playlistIdArray = [];
      var zeroPlaylistCompensation = 0;
      for (var i = 0; i < playlistArray.length; i++) {
        playListId = playlistArray[i].id;
        playlistSize = playlistArray[i].contentDetails.itemCount;
        if (playlistSize <= 0) {
          zeroPlaylistCompensation++;
          continue;
        }
        playlistIdArray.push(playListId);
        playlistTitle = playlistArray[i].snippet.title;
        playlistUploaded = playlistArray[i].snippet.publishedAt;
        playlistThumbnail = playlistArray[i].snippet.thumbnails.medium.url;
        //playlistThumbnail = playlistThumbnail.replace("hqdefault","mqdefault");
        if ((i + youmax_global_options.youmaxItemCount - zeroPlaylistCompensation) % youmaxColumns !== 0)
          youmax_global_options.element.find('.youmax-video-list-div').append('<div data-id="' + playListId + '" class="youmax-video-tnail-box" style="width:' + ((100 / youmaxColumns) - 4) + '%;"><div class="youmax-video-tnail" style="filter: progid:DXImageTransform.Microsoft.AlphaImageLoader( src=\'' + playlistThumbnail + '\', sizingMethod=\'scale\'); background-image:url(\'' + playlistThumbnail + '\')"><div class="youmax-playlist-sidebar" class="youmax-playlist-sidebar-' + playListId + '"><span class="youmax-playlist-video-count"><b>' + playlistSize + '</b><br/>VIDEOS</span></div></div><span class="youmax-video-list-title">' + playlistTitle + '</span><br/><span class="youmax-video-list-views">' + getDateDiff(playlistUploaded) + ' ago</span></div>');
        else
          youmax_global_options.element.find('.youmax-video-list-div').append('<div data-id="' + playListId + '" class="youmax-video-tnail-box" style="width:' + ((100 / youmaxColumns) - 4) + '%; clear:both;"><div class="youmax-video-tnail" style="filter: progid:DXImageTransform.Microsoft.AlphaImageLoader( src=\'' + playlistThumbnail + '\', sizingMethod=\'scale\'); background-image:url(\'' + playlistThumbnail + '\')"><div class="youmax-playlist-sidebar" class="youmax-playlist-sidebar-' + playListId + '"><span class="youmax-playlist-video-count"><b>' + playlistSize + '</b><br/>VIDEOS</span></div></div><span class="youmax-video-list-title">' + playlistTitle + '</span><br/><span class="youmax-video-list-views">' + getDateDiff(playlistUploaded) + ' ago</span></div>');
      }

      youmax_global_options.youmaxItemCount += playlistArray.length - zeroPlaylistCompensation;
      //console.log(playlistIdArray);

      youmax_global_options.element.find('.youmax-video-tnail-box').click(function () {
        //alert(this.class);
        showLoader();
        playlistTitle = $(this).find(".youmax-video-list-title").text();
        getUploads("play_" + $(this).attr('data-id'), playlistTitle);
        //getPlaylistVideos(this.class);
      });

      /*
        if(youmaxTnailHeight<130) {
            maxTopVideos = 3;
            $('html > head').append('<style>.youmax-playlist-video-count{margin: 10%;margin-top: 15%;}.youmax-playlist-sidebar-video{margin: 8% auto;}</style>');
            //$('div.youmax-playlist-video-count').css({'margin':'10%','margin-top':'15%'});
            //$('div.youmax-playlist-sidebar-video').css({'margin':'8% auto'});
        } else {
            maxTopVideos = 4;
        }*/

      resetLoadMoreButton();

      //console.log(youmaxTnailWidth);
      //console.log(youmaxTnailHeight);

      //getTopVideosFromPlaylist(playlistIdArray,maxTopVideos);
    },



    //get video stats using Youtube API
    getVideoStats = function (videoIdList) {
      apiVideoStatURL = "https://www.googleapis.com/youtube/v3/videos?part=statistics%2CcontentDetails&id=" + videoIdList + "&key=" + youmax_global_options.apiKey;
      $.ajax({
        url: apiVideoStatURL,
        type: "GET",
        async: true,
        cache: true,
        dataType: 'jsonp',
        success: function (response) {
          displayVideoStats(response);
        },
        error: function (html) {
          alert(html);
        },
        beforeSend: setHeader
      });
    },

    //display video statistics
    displayVideoStats = function (response) {

      var videoArray = response.items;
      var $videoThumbnail;

      for (var i = 0; i < videoArray.length; i++) {
        videoId = videoArray[i].id;
        videoViewCount = videoArray[i].statistics.viewCount;
        videoViewCount = getReadableNumber(videoViewCount);
        videoDuration = videoArray[i].contentDetails.duration;

        videoDuration = convertDuration(videoDuration);
        videoDefinition = videoArray[i].contentDetails.definition.toUpperCase();
        $videoThumbnail = youmax_global_options.element.find('.youmax-video-list-div .' + videoId);
        $videoThumbnail.find('.youmax-video-list-views').prepend(videoViewCount + ' views | ');
        $videoThumbnail.find('.youmax-duration').append(videoDuration);
      }
    },

    // 4
    getUploads = function (youmaxTabId, playlistTitle, nextPageToken) {
      var pageTokenUrl = "";
      var loadMoreFlag = false;

      if (null != nextPageToken) {
        pageTokenUrl = "&pageToken=" + nextPageToken;
        loadMoreFlag = true;
      }

      var uploadsPlaylistId = youmaxTabId.substring(youmaxTabId.indexOf('_') + 1);
      var apiUploadURL = "https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&playlistId=" + uploadsPlaylistId + "&maxResults=" + youmax_global_options.maxResults + pageTokenUrl + "&key=" + youmax_global_options.apiKey;
      console.log('Youmax Tab ID ' + youmaxTabId);
      $.ajax({
        url: apiUploadURL,
        type: "GET",
        async: true,
        cache: true,
        dataType: 'jsonp',
        success: function (response) {
          showUploads(response, playlistTitle, loadMoreFlag);
        },
        error: function (html) {
          alert(html);
        },
        beforeSend: setHeader
      });
    },

    // 5
    showUploads = function (response, playlistTitle, loadMoreFlag) {
      if (!loadMoreFlag) {
        youmax_global_options.element.find('.youmax-video-list-div').empty();

        if (playlistTitle) {
          youmax_global_options.element.find('.youmax-tab-hover').removeClass('youmax-tab-hover');
          youmax_global_options.element.find('.youmax-video-list-div').append('<span class="youmax-showing-title youmax-tab-hover" class="uploads_' + response.items[0].snippet.playlistId + '" style="max-width:100%;"><span class="youmax-showing">&nbsp;&nbsp;Showing playlist: </span>' + playlistTitle + '</span><br/>');
        }
      }

      var nextPageToken = response.nextPageToken;
      var $youmaxLoadMoreDiv = youmax_global_options.element.find('.youmax-load-more-div');

      youmaxColumns = youmax_global_options.youmaxColumns;

      if (null != nextPageToken && nextPageToken != "undefined" && nextPageToken !== "") {
        $youmaxLoadMoreDiv.data('nextpagetoken', nextPageToken);
      } else {
        $youmaxLoadMoreDiv.data('nextpagetoken', '');
      }

      var uploadsArray = response.items;
      var videoIdArray = [];

      for (var i = 0; i < uploadsArray.length; i++) {
        videoId = uploadsArray[i].snippet.resourceId.videoId;
        videoTitle = uploadsArray[i].snippet.title;
        videoUploaded = uploadsArray[i].snippet.publishedAt;
        videoThumbnail = uploadsArray[i].snippet.thumbnails.medium.url;

        videoIdArray.push(videoId);

        if ((i + youmax_global_options.youmaxItemCount) % youmaxColumns !== 0)
          youmax_global_options.element.find('.youmax-video-list-div').append('<div data-id="' + videoId + '" class="youmax-video-tnail-box" style="width:' + ((100 / youmaxColumns) - 4) + '%;"><div class="youmax-video-tnail" style="filter: progid:DXImageTransform.Microsoft.AlphaImageLoader( src=\'' + videoThumbnail + '\', sizingMethod=\'scale\'); background-image:url(\'' + videoThumbnail + '\')"><div class="youmax-duration"></div></div><span class="youmax-video-list-title">' + videoTitle + '</span><br/><span class="youmax-video-list-views">' + getDateDiff(videoUploaded) + ' ago</span></div>');
        else
          youmax_global_options.element.find('.youmax-video-list-div').append('<div data-id="' + videoId + '" class="youmax-video-tnail-box" style="width:' + ((100 / youmaxColumns) - 4) + '%; clear:both;"><div class="youmax-video-tnail" style="filter: progid:DXImageTransform.Microsoft.AlphaImageLoader( src=\'' + videoThumbnail + '\', sizingMethod=\'scale\'); background-image:url(\'' + videoThumbnail + '\')"><div class="youmax-duration"></div></div><span class="youmax-video-list-title">' + videoTitle + '</span><br/><span class="youmax-video-list-views">' + getDateDiff(videoUploaded) + ' ago</span></div>');
      }

      youmax_global_options.youmaxItemCount += uploadsArray.length;

      youmax_global_options.element.find('.youmax-video-tnail-box').click(function () {
        if (youmax_global_options.showVideoInLightbox) {
          showVideoLightbox($(this).attr('data-id'));
        } else {
          youmax_global_options.element.find('.youmax-video').attr('src', 'http://www.youtube.com/embed/' + $(this).attr('data-id'));
          youmax_global_options.element.find('.youmax-video').show();
          $('html,body').animate({
            scrollTop: youmax_global_options.element.find(".youmax-encloser").offset().top - 50
          }, 'slow');
        }
      });
      getVideoStats(videoIdArray);
      resetLoadMoreButton();
    },



    getPlaylists = function (nextPageToken) {

      var pageTokenUrl = "";
      var loadMoreFlag = false;

      if (null != nextPageToken) { // has to be null != not !==
        pageTokenUrl = "&pageToken=" + nextPageToken;
        loadMoreFlag = true;
      }

      var apiChannelPlaylistsURL = "https://www.googleapis.com/youtube/v3/playlists?part=contentDetails,snippet&channelId=" + youmaxChannelId + "&maxResults=" + youmax_global_options.maxResults + pageTokenUrl + "&key=" + youmax_global_options.apiKey;

      //var apiPlaylistURL = "https://gdata.youtube.com/feeds/api/users/"+youmaxUser+"/playlists?v=2&alt=jsonc&max-results=50";
      $.ajax({
        url: apiChannelPlaylistsURL,
        type: "GET",
        async: true,
        cache: true,
        dataType: 'jsonp',
        success: function (response) {
          showPlaylists(response, loadMoreFlag);
        },
        error: function (html) {
          alert(html);
        },
        beforeSend: setHeader
      });
    },

    showVideoLightbox = function (videoId) {
      console.log(videoId);
      youmax_global_options.element.find('.youmax-lightbox').show();
      youmax_global_options.element.find('.youmax-video-lightbox').attr('src', 'http://www.youtube.com/embed/' + videoId);

      youmax_global_options.element.find('.youmax-lightbox').click(function () {
        youmax_global_options.element.find('.youmax-video-lightbox').attr('src', '');
        youmax_global_options.element.find('.youmax-lightbox').hide();
      });
    },

    resetLoadMoreButton = function () {
      var $youmaxLoadMoreDiv = youmax_global_options.element.find('.youmax-load-more-div');
      $youmaxLoadMoreDiv.removeClass('youmax-load-more-div-click');
      $youmaxLoadMoreDiv.text('LOAD MORE');
    },

    // 3
    loadYoumax = function () {
      youmaxWidgetWidth = youmax_global_options.element.width();

      youmax_global_options.element.append(
        $('<div>', { class: 'youmax-header' })
      ).append(
        $('<div>', { class: 'youmax-stat-holder' })
      ).append(
        $('<div>', { class: 'youmax-tabs' }).append(
          $('<span>', { class: 'featured_'}).text('Featured'),
          $('<span>', { class: 'uploads_'}).text('Uploads'),
          $('<span>', { class: 'playlists_'}).text('Playlists')
        )
      );

      if(youmax_global_options.showGridOnly) {
        youmax_global_options.element.find('.youmax-header').addClass('youmax-hide');
        youmax_global_options.element.find('.youmax-tabs').addClass('youmax-hide');
      }

      youmax_global_options.element.append('<div class="youmax-encloser"><iframe class="youmax-video" width="' + (youmaxWidgetWidth - 2) + '" height="' + (youmaxWidgetWidth / youmax_global_options.youtubeVideoAspectRatio) + '" src="" frameborder="0" allowfullscreen></iframe><div class="youmax-video-list-div"></div><div class="youmax-load-more-div">LOAD MORE</div></div>');

      youmax_global_options.element.find('.youmax-video').hide();

      youmax_global_options.element.append('<div class="youmax-lightbox"><div style="width:100%; position:absolute; top:20%;"><iframe class="youmax-video-lightbox" width="640" height="360" src="" frameborder="0" allowfullscreen></iframe></div></div>');

      youmax_global_options.element.find('.youmax-lightbox').hide();
    },

  // 1
  initFeaturedVideos = function () {
    youTubePlaylistURL = youmax_global_options.youTubePlaylistURL;
    if (null !== youTubePlaylistURL && youTubePlaylistURL.indexOf("youtube.com/playlist?list=") != -1) {
      youmaxFeaturedPlaylistId = youTubePlaylistURL.substring(youTubePlaylistURL.indexOf("?list=") + 6);
      youmax_global_options.youmaxFeaturedPlaylistId = youmaxFeaturedPlaylistId;
    }
  },

  // 2
  prepareYoumax = function () {
    // Reset everything
    youmax_global_options.element.empty();

    loadYoumax();
    showLoader();
    youmax_global_options.element.find('.youmax-tabs span').click(function () {
      youmax_global_options.element.find('.youmax-tab-hover').removeClass('youmax-tab-hover');
      $(this).addClass('youmax-tab-hover');

      youmaxTabClass = $(this).attr('class').split(' ')[0]; //data-tab
      showLoader();

      if (youmaxTabClass.indexOf("featured_") != -1) {
        getUploads('featured_' + youmax_global_options.youmaxFeaturedPlaylistId, null, null);
      } else if (youmaxTabClass.indexOf("uploads_") != -1) {
        getUploads(youmaxTabClass);
      } else if (youmaxTabClass.indexOf("playlists_") != -1) {
        getPlaylists();
      }
    });

    youmax_global_options.element.find('.youmax-load-more-div').click(function () {

      var $youmaxLoadMoreDiv = $(this);
      $youmaxLoadMoreDiv.html('LOADING..');
      $youmaxLoadMoreDiv.addClass('youmax-load-more-div-click');

      var youmaxTabClass = youmax_global_options.element.find('.youmax-tab-hover').attr('class').split(' ')[0];
      var nextPageToken = $youmaxLoadMoreDiv.data('nextpagetoken');

      if (null != nextPageToken && nextPageToken != "undefined" && nextPageToken !== "") {
        if (youmaxTabClass.indexOf("featured_") != -1) {
          getUploads('featured_' + youmax_global_options.youmaxFeaturedPlaylistId, null, nextPageToken);
        } else if (youmaxTabClass.indexOf("uploads_") != -1) {
          getUploads(youmaxTabClass, null, nextPageToken);
        } else if (youmaxTabClass == "playlists_") {
          getPlaylists(nextPageToken);
        }
      } else {
        $youmaxLoadMoreDiv.html('ALL DONE');
      }

    });

    youTubeChannelURL = youmax_global_options.youTubeChannelURL;

    // Get Channel header and details
    if (youTubeChannelURL != null) {
      s = youTubeChannelURL.indexOf("/user/");
      if (s != -1) {
        userId = youTubeChannelURL.substring(s + 6);
        apiUrl = "https://www.googleapis.com/youtube/v3/channels?part=id&forUsername=" + userId + "&key=" + youmax_global_options.apiKey;
        getChannelId(apiUrl);
      } else {
        s = youTubeChannelURL.indexOf("/channel/");
        if (s != -1) {
          youmaxChannelId = youTubeChannelURL.substring(s + 9);
          youmax_global_options.youmaxChannelId = youmaxChannelId;
          getChannelDetails(youmaxChannelId);
        } else {
          alert("Could Not Find Channel..");
        }
      }
    }
  };

  $.fn.youmax = function (options) {
    // set generic options for all instances of youmax
    youmax_global_options.element = $(this);
    youmax_global_options.apiKey = options.apiKey;
    youmax_global_options.youTubeChannelURL = options.youTubeChannelURL || '';
    youmax_global_options.youTubePlaylistURL = options.youTubePlaylistURL || '';
    youmax_global_options.youmaxColumns = options.youmaxColumns || 3;
    youmax_global_options.showVideoInLightbox = options.showVideoInLightbox || false;
    youmax_global_options.youmaxChannelId = '';
    youmax_global_options.maxResults = options.maxResults || 15;
    youmax_global_options.youmaxItemCount = 0;
    youmax_global_options.youtubeVideoAspectRatio = 640 / 360;

    youmax_global_options.showGridOnly = options.showGridOnly || false;

    if (options.showGridOnly) {
      youmax_global_options.youmaxDefaultTab = 'FEATURED';
    } else {
      youmax_global_options.youmaxDefaultTab = options.youmaxDefaultTab || 'FEATURED';
      // Only set this if we are showing the header also
      if (options.customHeaders != undefined && options.customHeaders.length > 0) {
        youmax_global_options.customHeaders = true;
        youmax_global_options.youmaxDefaultTab = 'FEATURED'; //options.customHeaders[0].name;
        youmax_global_options.customheaders = options.customHeaders;
      }
    }


    //youmax_global_options.youmaxWidgetWidth = options.youmaxWidgetWidth||800;
    //youmax_global_options.showFeaturedVideoOnLoad = options.showFeaturedVideoOnLoad||false;
    youmax_global_options.youtubeMqdefaultAspectRatio = 300 / 180;

    initFeaturedVideos();
    prepareYoumax();
  };
}(jQuery));
