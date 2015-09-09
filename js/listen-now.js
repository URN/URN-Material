(function ($) {
    "use strict";

    var $listenNow = $("#listen-now");
    var $song = $listenNow.find(".current-track");
    var $progress = $listenNow.find(".progress-bar");

    var currentSong = {
        startTime: new Date(),
        duration: 0,
        title: "",
        artist: ""
    };

    function updateCurrentSong() {
        var request = $.ajax({
            url: "/api/current_song",
            type: "get",
        });

        request.done(function (song) {
            var currentProgress = getSongProgressPercentage();

            currentSong.startTime = parseInt(song.start_time);
            currentSong.duration = parseInt(song.duration);
            currentSong.title = song.title;
            currentSong.artist = song.artist;
        });
    }

    (function refreshNowPlaying() {
        var songString;

        if (currentSong.title !== "" && currentSong.artist !== "") {
            songString = currentSong.title + " - " + currentSong.artist;
        }
        else {
            songString = "Loading...";
        }

        $song.text(songString);

        redrawProgressBar();

        setTimeout(function () {
            refreshNowPlaying();

            if (getSongProgressPercentage() >= 100) {
                updateCurrentSong();
            }
        }, 1000);
    })();

    updateCurrentSong();

    function getSongProgressPercentage() {
        var startDateUTC = new Date(currentSong.startTime * 1000);
        var currentDateUTC = new Date();
        var durationSeconds = currentSong.duration / 10000000;

        var progressSeconds = (currentDateUTC.getTime() - startDateUTC.getTime()) / 1000;
        var progressPercentage = (progressSeconds / durationSeconds) * 100;
        return progressPercentage;
    }

    function redrawProgressBar() {
        var progress = getSongProgressPercentage();
        $progress.css({width: progress + "%"});
    }

})(jQuery);
