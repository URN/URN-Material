(function ($) {
    "use strict";

    var $schedule = $(".schedule");
    var $categorySelect = $(".schedule-category-select");
    var $searchFilterTxt = $(".schedule-category-filter-search");
    var dayNames = ["sunday", "monday", "tuesday", "wednesday", "thursday", "friday", "saturday"];
    var singleDay = $schedule.hasClass("mini-schedule");

    // Number of hours that schedule starts at
    var hoursOffset = 0;

    (function refreshSchedule() {
        var request = $.ajax({
            url: "/api/schedule/week",
            type: "get",
            dataType: "json"
        });

        request.done(function (data) {
            populateSchedule(data);
            scrollToLive();
        });

        request.always(function () {
            setTimeout(refreshSchedule, 120000);
        });
    })();

    $categorySelect.val("all");

    $categorySelect.change(function () {
        var category = $(this).val();
        var $shows = $schedule.find(".show");

        if (category === "all") {
            $shows.removeClass("dim");
        }
        else {
            $shows.each(function (i, show) {
                var $show = $(show);
                if (!$show.hasClass("live") && !$show.hasClass(category)) {
                    $show.addClass("dim");
                }
                else {
                    $show.removeClass("dim");
                }
            });
        }

        // Fire the change event for the search filter so that any changes in categorya
        // are reflected in currently visible show slots
        if ($searchFilterTxt.val().trim() !== "") {
            $searchFilterTxt.trigger("input");
        }
    });

    $searchFilterTxt.on("input", function(e) {
        var query = $(e.target).val().toLowerCase().trim();

        if (query === "") {
            $categorySelect.trigger("change");
        }

        $schedule.find(".show").each(function (i, show) {
            var $show = $(show);

            var title = $show.find(".title").text().toLowerCase();
            var hosts = $show.find(".hosts").text().toLowerCase();

            var currentCategory = $categorySelect.val();

            // Keep the show slot visible if the current show is a part of the currently
            // select category and there's a match for the query in the show's title or
            // host names
            if ((currentCategory === "all" || $show.hasClass(currentCategory)) &&
                title.indexOf(query) !== -1 || hosts.indexOf(query) !== -1) {
                $show.removeClass("dim");
            }
            else if (!$show.hasClass("live")) {
                $show.addClass("dim");
            }
        });
    });

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

    function createSlot(slotData) {
        var $slot = $("<li>").addClass("show");

        var $title = $("<h1>").addClass("title").text(slotData.name);

        var $times = $("<h3>").addClass("times").text(slotData.from + " - " + slotData.to);

        var $hosts = $("<h2>").addClass("hosts").text(slotData.hosts.map(function(el) {return el.name;}).join(", "));

        var $a = $("<a>").attr({
            href : "/show/" + slotData.slug,
            title : slotData.name
        });

        if (slotData.override) {
            $a.attr("href", "#");
            $a.click(function (e) {
                e.preventDefault();
            });
        }

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
        $a.append($times);

        if (slotData.hosts.length > 0) {
            $a.append($hosts);
        }

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
        var minutes = parseInt(time.substring(3, 5));
        var totalMinutes = (hours * 60) + minutes;
        return totalMinutes;
    }

    function getNextDayName(dayName) {
        var i = dayNames.indexOf(dayName) + 1;
        i = i > (dayNames.length - 1) ? i - dayNames.length : i;
        return dayNames[i];
    }

    function populateSchedule(shows) {
        // Empty all of the slots of existing shows
        $schedule.find(".slots").empty();

        if (singleDay) {
            var slots = shows[dayNames[new Date().getDay()]];
            var $slotList = $schedule.find("li.day .slots");

            $.each(slots, function (j, slotData) {
                var from = parseInt(slotData.from);

                var fromDateTime = new Date();
                fromDateTime.setHours(parseInt(slotData.from.substring(0, 2)));
                fromDateTime.setMinutes(parseInt(slotData.from.substring(3, 5)));

                var toDateTime = new Date();
                toDateTime.setHours(parseInt(slotData.to.substring(0, 2)));
                toDateTime.setMinutes(parseInt(slotData.to.substring(3, 5)));

                var midnightDateTime = new Date();
                midnightDateTime.setHours(0);
                midnightDateTime.setMinutes(0);

                // If the show ends before it starts, it must end after midnight,
                // so truncate it at midnight
                if (fromDateTime > toDateTime) {
                    var minsAfterMidnight = Math.abs(toDateTime.getTime() - midnightDateTime.getTime());
                    minsAfterMidnight = minsAfterMidnight / 60000;

                    // slotData.to = "00:00";
                    slotData.duration = slotData.duration - minsAfterMidnight;
                    var $slot = createSlot(slotData);
                    $slotList.append($slot);
                }
                else {
                    var $slot = createSlot(slotData);
                    $slotList.append($slot);
                }
            });
        }
        else {
            $.each(dayNames, function (i, dayName) {
                var slots = shows[dayName];

                var $slotList = $schedule.find("li.day." + dayName + " .slots");

                var nextDayName = getNextDayName(dayName);
                var $nextDaySlotList = $schedule.find("li.day." + nextDayName + " .slots");

                $.each(slots, function (j, slotData) {
                    var from = parseInt(slotData.from);

                    var fromDateTime = new Date();
                    fromDateTime.setHours(parseInt(slotData.from.substring(0, 2)));
                    fromDateTime.setMinutes(parseInt(slotData.from.substring(3, 5)));

                    var toDateTime = new Date();
                    toDateTime.setHours(parseInt(slotData.to.substring(0, 2)));
                    toDateTime.setMinutes(parseInt(slotData.to.substring(3, 5)));

                    var midnightDateTime = new Date();
                    midnightDateTime.setHours(0);
                    midnightDateTime.setMinutes(0);

                    // If the show ends before it starts, it must end after midnight,
                    // so truncate it at midnight and create a new slot for the next day
                    if (fromDateTime > toDateTime) {
                        var nextDaySlotData = JSON.parse(JSON.stringify(slotData));

                        var minsAfterMidnight = Math.abs(toDateTime.getTime() - midnightDateTime.getTime());
                        minsAfterMidnight = minsAfterMidnight / 60000;

                        slotData.duration = slotData.duration - minsAfterMidnight;
                        var $slot = createSlot(slotData);
                        $slotList.append($slot);

                        nextDaySlotData.from = "00:00";
                        nextDaySlotData.duration = minsAfterMidnight;
                        var $nextDaySlot = createSlot(nextDaySlotData);
                        $nextDaySlotList.append($nextDaySlot);
                    }
                    else {
                        var $slot = createSlot(slotData);
                        $slotList.append($slot);
                    }
                });
            });
        }
    }
})(jQuery);
