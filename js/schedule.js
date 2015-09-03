(function ($) {
    "use strict";

    var $schedule = $(".mini-schedule");

    var request = $.ajax({
        url: "/api/schedule/week",
        type: "get",
    });

    request.done(function (data) {
        populateSchedule(data);
    });

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

    function calculateMinuteWidth() {
        return $schedule.find(".times li:nth-child(2)").outerWidth() / 60;
    }

    function calculateSlotWidth(length) {
        return calculateMinuteWidth() * length;
    }

    function calculateSlotLeftOffset(startTime) {
        var minuteWidth = calculateMinuteWidth();

        var hoursOffset = -7;

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
        var dayNames = ["monday", "tuesday", "wednesday", "thursday", "friday"];

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
})(jQuery);
