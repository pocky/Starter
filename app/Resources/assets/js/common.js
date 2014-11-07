var $ = require('jquery');
var bootstrap = require('bootstrap');
global.jQuery = require("jquery");

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