(function ($) {
    "use strict";

    var $schedule = $(".schedule");
    var dayNames = ["sunday", "monday", "tuesday", "wednesday", "thursday", "friday", "saturday"];
    var singleDay = false;
    var singleDayName;

    var requestRepeatInterval;

    var hoursOffset = -7;

    var request = $.ajax({
        url: getApiUrl(),
        type: "get",
    });

    request.done(function (data) {
        console.log("Refreshing schedule", new Date());
        var that = this;

        populateSchedule(data);
        scrollToLive();

        window.clearTimeout(requestRepeatInterval);
        requestRepeatInterval = window.setInterval(function () {
            // Resend the AJAX request
            $.ajax(that);
        }, 180000);
    });

    window.setInterval(function () {
        scrollToLive();
    }, 60000);


    function scrollToLive() {
        var d = new Date();
        var currentTimeMins = d.getHours() * 60 + d.getMinutes();

        var $scrollBox = $schedule.find(".timetable");

        if (d.getHours() < Math.abs(hoursOffset)) {
            currentTimeMins += 24 * 60;
        }

        var live = currentTimeMins * calculateMinuteWidth() + (hoursOffset * 60 * calculateMinuteWidth());

        live = live - $scrollBox.width() / 2;

        $scrollBox.animate({
            scrollLeft: live
        }, 500);
    }

    function getApiUrl() {
        if ($schedule.hasClass("mini-schedule")) {
            var currentDay = dayNames[new Date().getDay()];
            singleDay = true;
            singleDayName = currentDay;
            return "/api/schedule/day/" + currentDay;
        }
        else {
            return "/api/schedule/week";
        }
    }

    function createSlot(slotData) {
        var $slot = $("<li>").addClass("show");

        var $title = $("<h1>").addClass("title").text(slotData.name);

        var $hosts = $("<h2>").addClass("hosts").text(slotData.hosts.join(", "));

        var $times = $("<h3>").addClass("times").text(slotData.from + " - " + slotData.to + " (" + slotData.duration + " mins)");

        var $a = $("<a>").attr({
            href : "/show/" + slotData.slug,
            title : slotData.name
        });

        if (slotData.live) {
            $slot.addClass("live");
        }

        switch (slotData.category) {
            case "After Dark":
                $slot.addClass("after-dark");
                break;
            case "Culture":
                $slot.addClass("culture");
                break;
            case "Daytime":
                $slot.addClass("daytime");
                break;
            case "News":
                $slot.addClass("news");
                break;
            case "Sport":
                $slot.addClass("sport");
                break;
            default:
        }

        $a.append($title);
        $a.append($hosts);
        $a.append($times);
        $slot.append($a);

        var durationWidth = slotData.duration;

        $slot.css({
            width : calculateSlotWidth(durationWidth) + "px",
            left: calculateSlotLeftOffset(slotData.from) + "px"
        });

        return $slot;
    }

    function calculateMinuteWidth()
{        return $schedule.find(".times li:nth-child(2)").outerWidth() / 60;
    }

    function calculateSlotWidth(length) {
        return calculateMinuteWidth() * length;
    }

    function calculateSlotLeftOffset(startTime) {
        var minuteWidth = calculateMinuteWidth();

        var minsOffset = hoursOffset * 60;

        var offset = minsOffset * minuteWidth;

        var startTimeMins = convertTimeToMinutes(startTime);

        // Move shows that start before the offset to the end of the schedule
        // I HAVE NO IDEA WHY THE ADJUSTED startTimeMins WORKS BUT IT DOES
        // sorry anyone who ends up needing to tweak this
        if (startTimeMins < Math.abs(hoursOffset) * 60) {
            startTimeMins += 10 * 60;
            return startTimeMins * minuteWidth - offset;
        }

        return startTimeMins * minuteWidth + offset;
    }

    // HH:MM
    function convertTimeToMinutes(time) {
        var hours = parseInt(time.substring(0, 2));
        var minutes = parseInt(time.substring(3, 4));
        var totalMinutes = (hours * 60) + minutes;
        return totalMinutes;
    }

    function populateSchedule(shows) {
        // Empty all of the slots of existing shows
        $schedule.find(".slots").empty();

        if (singleDay) {
            var slots = shows.shows;
            var $slotList = $schedule.find("li.day .slots");

            $.each(slots, function (j, slotData) {
                var from = parseInt(slotData.from);

                var $slot = createSlot(slotData);
                $slotList.append($slot);
            });
        }
        else {
            $.each(dayNames, function (i, dayName) {
                var slots = shows[dayName];

                var $slotList = $schedule.find("li.day." + dayName + " .slots");

                $.each(slots, function (j, slotData) {
                    var from = parseInt(slotData.from);

                    var $slot = createSlot(slotData);
                    $slotList.append($slot);
                });
            });
        }
    }
})(jQuery);
