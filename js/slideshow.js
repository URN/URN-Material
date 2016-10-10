(function($) {
    "use strict";

    var d = new Date();
    var weekday = new Array(7);
    weekday[0] = "sun";
    weekday[1] = "mon";
    weekday[2] = "tues";
    weekday[3] = "wed";
    weekday[4] = "thurs";
    weekday[5] = "fri";
    weekday[6] = "sat";

    // Current day in text
    var today = weekday[d.getDay()];
    var tomorrow = null;
    // Get tomorrow but make sure not to try and access index 7 which is outside the array bounds.
    if (today == weekday[6]) {
        tomorrow = weekday[0];
    } else {
        tomorrow = weekday[d.getDay() + 1];
    }

    var counter = 0,
        $items = $('.slideshow figure'),
        numItems = $items.length;

    var itemToShow;

    // This function shows the next or previous slide while hiding all the others
    var showCurrent = function(cycle) {
        if (cycle == 1) {
            if (counter == numItems - 1) {
                return; //If on last slide don't cycle around.
            }

            counter++;
            itemToShow = Math.abs(counter % numItems);
            if ($items.eq(itemToShow).hasClass("noday")) {
                $items.removeClass('show');
                $items.eq(itemToShow).addClass('show');
            } else if ($items.eq(itemToShow).hasClass("day")) {
                if ($items.eq(itemToShow).hasClass(today) || $items.eq(itemToShow).hasClass(tomorrow)) {
                    $items.removeClass('show');
                    $items.eq(itemToShow).addClass('show');
                } else {
                    showCurrent(1);
                    counter--;
                }
            } else {
                counter--;
                return;
            }
        } else if (cycle == 2) {
            if (counter === 0) {
                return; //If on first slide don't go to the last.
            }

            counter--;
            itemToShow = Math.abs(counter % numItems);
            if ($items.eq(itemToShow).hasClass("noday")) {
                $items.removeClass('show');
                $items.eq(itemToShow).addClass('show');
            } else if ($items.eq(itemToShow).hasClass("day")) {
                if ($items.eq(itemToShow).hasClass(today) || $items.eq(itemToShow).hasClass(tomorrow)) {
                    $items.removeClass('show');
                    $items.eq(itemToShow).addClass('show');
                } else {
                    showCurrent(2);
                    counter++;
                }
            } else {
                counter++;
                return;
            }
        }
    };

    // add click events to prev & next buttons
    $('.next').on('click', function next() {
        showCurrent(1);
    });
    $('.prev').on('click', function pre() {
        showCurrent(2);
    });

    // setInterval(function next() {
    //     showCurrent(1);
    // }, 5000);

})(jQuery);
