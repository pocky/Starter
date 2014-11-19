var $ = require('jquery');
global.jQuery = require("jquery");
var bootstrap = require('bootstrap');
var dataTable = require('datatables');

(function($) {
    "use strict";

    $.fn.tree = function() {

        return this.each(function() {
            var btn = $(this).children("a").first();
            var menu = $(this).children(".treeview-menu").first();
            var isActive = $(this).hasClass('active');

            //initialize already active menus
            if (isActive) {
                menu.show();
                btn.children(".fa-angle-left").first().removeClass("fa-angle-left").addClass("fa-angle-down");
            }
            //Slide open or close the menu on link click
            btn.click(function(e) {
                e.preventDefault();
                if (isActive) {
                    //Slide up to close menu
                    menu.slideUp();
                    isActive = false;
                    btn.children(".fa-angle-down").first().removeClass("fa-angle-down").addClass("fa-angle-left");
                    btn.parent("li").removeClass("active");
                } else {
                    //Slide down to open menu
                    menu.slideDown();
                    isActive = true;
                    btn.children(".fa-angle-left").first().removeClass("fa-angle-left").addClass("fa-angle-down");
                    btn.parent("li").addClass("active");
                }
            });

            /* Add margins to submenu elements to give it a tree look */
            menu.find("li > a").each(function() {
                var pad = parseInt($(this).css("margin-left")) + 10;

                $(this).css({"margin-left": pad + "px"});
            });

        });

    };


}(jQuery));

// Enable sidebar toggle
$('[data-toggle="offcanvas"]').click(function(e) {
    e.preventDefault();

    // If window is small enough, enable sidebar push menu
    if ($(window).width() <= 992) {
        $('.row-offcanvas').toggleClass('active');
        $('.left-side').removeClass('collapse-left');
        $('.right-side').removeClass('strech');
        $('.row-offcanvas').toggleClass('relative');
    } else {
        // Else, enable content streching
        $('.left-side').toggleClass('collapse-left');
        $('.right-side').toggleClass('strech');
    }
});

// Add hover support for touch devices
$('.btn').bind('touchstart', function() {
    $(this).addClass('hover');
}).bind('touchend', function() {
    $(this).removeClass('hover');
});

// Activate tooltips
$('[data-toggle="tooltip"]').tooltip();

// Add collapse and remove events to boxes
$('[data-widget="collapse"]').click(function() {
    // Find the box parent
    var box = $(this).parents('.box').first();
    // Find the body and the footer
    var bf = box.find('.box-body, .box-footer');
    if (!box.hasClass('collapsed-box')) {
        box.addClass('collapsed-box');
        // Convert minus into plus
        $(this).children('.fa-minus').removeClass('fa-minus').addClass('fa-plus');
        bf.slideUp();
    } else {
        box.removeClass('collapsed-box');
        // Convert plus into minus
        $(this).children('.fa-plus').removeClass('fa-plus').addClass('fa-minus');
        bf.slideDown();
    }
});

/* Sidebar tree view */
$(".sidebar .treeview").tree();

/* dataTable */
$('table').dataTable({
    "bPaginate": true,
    "bLengthChange": false,
    "bFilter": false,
    "bSort": true,
    "bInfo": true,
    "bAutoWidth": false
});

