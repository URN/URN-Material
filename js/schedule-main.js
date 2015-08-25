jQuery(document).ready(function ($) {
    'use strict';

    // Fetch weekly schedule on load
    fetchWeeklySchedule(displayResults);

    setupScheduleLiveBar();

    function setupScheduleLiveBar() {
        var the_time = new Date();
        var hours_from_midnight = the_time.getHours() + ((the_time.getMinutes() * 1.66) / 100); // e.g. 17.50 == 5.30pm
        var schedule_pixel_width = hours_from_midnight * 2 * 60;

        // Set width of live bar
        $('.schedule-progress').css('width', schedule_pixel_width + 'px');

        // Scroll along table to live time
        $('.schedule-timeline')[0].scrollLeft += schedule_pixel_width - 30;

        // Show time on live bar
        var pretty_time = (('00' + the_time.getHours()).slice (-2)) + ':' + (('00' + the_time.getMinutes()).slice (-2));
        $('.schedule-progress')[0].innerHTML = '<span>' + pretty_time + '<br>Live</span>';
    }

    //
    // Calculates the difference between times in minutes, @returns minutes
    //
    // @param startTime as a full time, not in minutes, normally less than the end time
    // @param endTime as a full time
    // @return time difference in minutes
    //
    function calculateTimeDifference(startTime, endTime) {
        return timeToMinutes(startTime) - timeToMinutes(endTime);
    }

    //
    // Converts minutes to 'schedule' pixels.
    // This will get the minutes ready to be displayed in the schedule.
    //
    // @param minutes as number e.g. 60
    // @return minutes e.g. 120 (pixels)
    //
    function minutesToPixels(minutes) {
        return minutes * 2;
    }

    //
    // Converts a time into the number of minutes after midnight
    // (TODO: Note, only works with timeStr hours ... strips out timeStr minutes)
    //
    // @param timeStr the full time in 24 hour format e.g. 01:00
    // @return minutes from midnight e.g. 60
    //
    function timeToMinutes(timeStr) {
        if(timeStr == '00:00') { return 0; }
        timeStr = timeStr.replace(':', '');
        return (parseInt(timeStr) / 100) * 60;
    }

    function displayResults(days) {
        var days_of_week = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        var day_of_week = 0;

        var wrapper = $('<div></div>', { class: 'schedule-day'});

        for (var dayNo = 0; dayNo < days.length; dayNo++) {
            var day_header = $('<h2></h2>', {class: 'schedule-day-text'}).append(
                $('<a></a>', {href: '#'}).append(
                    $('<span></span>').text(days_of_week[day_of_week])
                )
            );
            day_of_week++;

            var show_list = $('<ul></ul>');

            for (var s = 0; s < days[dayNo].length; s++) {

                var show_hosts = '';
                if (days[dayNo][s].show.hosts.length > 0) {
                    show_hosts = '<span>with ';

                    for (var host = 0; host < days[dayNo][s].show.hosts.length; host++) {
                        show_hosts += days[dayNo][s].show.hosts[host].name + ' ';
                    }

                    show_hosts += '</span>';
                }

                show_list.append(
                    $('<li></li>', {
                        style: 'margin-left: ' + days[dayNo][s].margin + 'px',
                        class: 'schedule-duration-' + days[dayNo][s].show['length']}
                    ).append(
                        $('<a></a>', {
                            class: window.location.origin + '/show/' + days[dayNo][s].show.slug }
                        ).append(
                            $('<span></span>').text(days[dayNo][s].show.name),
                            $('<i></i>').html(show_hosts)
                        )
                    )
                );
            }

            wrapper.append(day_header);
            wrapper.append(show_list);
        }

        $('.schedule-week').html(wrapper);
    }

    //
    // Makes a schedule day ready to be displayed by
    // attaching margin-left attributes to each show.
    // This means a gap in the day can be displayed correctly.
    //
    // @param shows an array of shows from a day in the schedule.
    // @return day with shows & margin's
    //
    function makeScheduleDay(shows) {
        var day = [];
        var lastEndTime = '0000';
        var margin = 0;

        // Loop around this day's shows
        for (var s = 0; s < shows.length; s++) {
            if(s === 0) { // First time
                margin = minutesToPixels(timeToMinutes(shows[s].from));
            } else {
                // If there is 0 gap between show times
                if (lastEndTime == shows[s].from) {
                    margin = 0; // We dont need to padd with margin
                } else { // Otherwise if there is a gap, calculate the margin in pixels
                    margin = minutesToPixels(calculateTimeDifference(shows[s].from, lastEndTime));
                }
            }
            day.push({
                show: shows[s],
                margin: margin
            });
            lastEndTime = shows[s].to;
        }

        return day;
    }

    //
    // Fetches the weekly schedule.
    //
    // @return schedule ready to be displayed (with margins attached)
    //
    function fetchWeeklySchedule(callback) {
        var url = 'http://live.urn1350.net/api/schedule/week';

        $.getJSON(url, function(schedule) {
            // TODO: find an easier way to do this, that guarantees that the JSON returns the days in order
            var days = [
                makeScheduleDay(schedule.monday),
                makeScheduleDay(schedule.tuesday),
                makeScheduleDay(schedule.wednesday),
                makeScheduleDay(schedule.thursday),
                makeScheduleDay(schedule.friday),
                makeScheduleDay(schedule.saturday),
                makeScheduleDay(schedule.sunday)
            ];
            callback(days);
        });
    }
});
