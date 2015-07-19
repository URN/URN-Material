jQuery(document).ready(function ($) {
    "use strict";

    var $nav = $("#nav");
    var $items = $("#nav .nav-item");
    var $overflowList = $("#nav .nav-overflow-list");
    var itemsVisible = [];
    var itemsOverflowed = [];
    var $overflowIcon = $("#nav .nav-overflow");
    var $overflowButton = $("#nav .nav-overflow > a");

    // At the start, all nav items are visible.
    $items.each(function () {
        itemsVisible.push($(this));
    });

    // Get the length on the x-axis that a nav item takes up when visible
    function getNavItemOffset($item) {
        return $item.offset().left + $item.outerWidth();
    }

    function getLastArrayItem(array) {
        return array[array.length - 1];
    }

    function removeLastArrayItem(array) {
        array.splice(array.length - 1, 1);
    }

    // Move a nav item out of the visible nav bar into the overflow menu
    function moveItemToOverflow($item) {
        $item.prependTo($overflowList);
    }

    // Move a nav item back into the visible nav bar
    function moveItemToVisible($item) {
        $item.insertBefore($overflowIcon);
    }

    $(window).resize(function () {
        // The nav item on the far right
        var $lastVisibleItem = getLastArrayItem(itemsVisible);

        // Window width that the nav items must fit into, overflow them if necessary
        // Add 20px as padding so items overflow slightly before they absolutely have to
        var viewWidth = $(window).width() - 20;

        var itemOffset = getNavItemOffset($lastVisibleItem);

        // While there isn't enough space for the nav items, keep moving them into the 
        // overflow menu
        while (itemsVisible.length > 0 && 
               viewWidth <= (itemOffset + $overflowIcon.width())) {

            // Move the right most nav item into the overflow menu
            removeLastArrayItem(itemsVisible);
            itemsOverflowed.push($lastVisibleItem);

            // Store width of nav item before it's moved to the hidden overflow menu
            // because once hidden it's hard to get the width again
            $.data($lastVisibleItem, "width", $lastVisibleItem.outerWidth());

            moveItemToOverflow($lastVisibleItem);

            $lastVisibleItem = getLastArrayItem(itemsVisible);
            itemOffset = getNavItemOffset($lastVisibleItem);
        }


        // Get the most recently moved item 
        var $lastOverflowedItem = getLastArrayItem(itemsOverflowed);

        // While there's space for a nav item to be put back in the nav bar, keep adding 
        // them back
        while (itemsOverflowed.length > 0 &&
               viewWidth > itemOffset + $overflowIcon.outerWidth() + $.data($lastOverflowedItem, "width")) {
            itemsVisible.push($lastOverflowedItem);
            removeLastArrayItem(itemsOverflowed);
            moveItemToVisible(getLastArrayItem(itemsVisible));
            $lastOverflowedItem = getLastArrayItem(itemsOverflowed);            
        }

        if (itemsOverflowed.length === 0) {
            $nav.removeClass("overflowing");
        }
        else {
            $nav.addClass("overflowing");
        }
    });

    $overflowButton.click(function (e) {
            e.stopPropagation();
        $nav.toggleClass("overflow-open");
        return false;
    });

    $overflowButton.hover(
        function () {
            $nav.addClass("overflow-open");
        },
        function () {
            $nav.removeClass("overflow-open");
        }
    );

    $overflowButton.focus(function() {
        $nav.addClass("overflow-open");
    });

    $("body").click(function (e) {
        if ($(e.target).closest('.nav-overflow').length === 0) {
            $nav.removeClass("overflow-open");
        }
    });

    $items.click(function () {
        $nav.removeClass("overflow-open");
    });

});
