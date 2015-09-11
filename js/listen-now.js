(function ($) {
    "use strict";

    var $listenNow = $("#listen-now");
    var $song = $listenNow.find(".current-track");
    var $progress = $listenNow.find(".progress-bar");

    var currentSong = null;
    var loading = false;

    function updateCurrentSong(callback) {
        var request = $.ajax({
            url: "/api/current_song",
            type: "get",
            dataType: "json"
        });

        request.done(function (newSong) {
            loading = compareSongs(newSong, currentSong);

            newSong.start_time = parseInt(newSong.start_time);
            newSong.duration = parseInt(newSong.duration);
            currentSong = newSong;

            callback();
        });
    }

    (function refreshNowPlaying() {
        var songString;
        var progress = getSongProgressPercentage();

        if (currentSong !== null && !loading && progress <= 100) {
            songString = currentSong.title + " - " + currentSong.artist;
        }
        else {
            songString = "Loading...";
        }

        $song.text(songString);

        redrawProgressBar();

        setTimeout(function () {
            if (progress >= 100) {
                updateCurrentSong(function () {
                    refreshNowPlaying();
                });
            }
            else {
                refreshNowPlaying();
            }
        }, 1000);
    })();

    function getSongProgressPercentage() {
        if (currentSong === null) {
            return 101;
        }
        var startDateUTC = new Date(currentSong.start_time * 1000);
        var currentDateUTC = new Date();
        var durationSeconds = currentSong.duration / 10000000;

        var progressSeconds = (currentDateUTC.getTime() - startDateUTC.getTime()) / 1000;
        var progressPercentage = (progressSeconds / durationSeconds) * 100;
        return progressPercentage;
    }

   function redrawProgressBar() {
        var progress = getSongProgressPercentage();
        if (progress > 100) {
            progress = 0;
        }
        $progress.css({width: progress + "%"});
    }

    function compareSongs(song1, song2) {
        if (song1 === null || song2 === null) {
            return false;
        }

        var equals = (song1.title === song2.title) &&
                     (song1.artist === song2.artist);

        return equals;
    }

    $("#listen-now .show-container .play").click(function() {
        window.open("http://urn1350.net/rp/console/main/index.php", "radioplayer", "height=665,width=380");
    });

})(jQuery);
