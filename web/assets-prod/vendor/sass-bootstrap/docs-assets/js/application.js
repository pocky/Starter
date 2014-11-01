/*!
 * Copyright 2013 Twitter, Inc.
 *
 * Licensed under the Creative Commons Attribution 3.0 Unported License. For
 * details, see http://creativecommons.org/licenses/by/3.0/.
 */

!function(e){e(function(){if(navigator.userAgent.match(/IEMobile\/10\.0/)){var t=document.createElement("style");t.appendChild(document.createTextNode("@-ms-viewport{width:auto!important}")),document.getElementsByTagName("head")[0].appendChild(t)}var n=e(window),r=e(document.body),i=e(".navbar").outerHeight(!0)+10;r.scrollspy({target:".bs-sidebar",offset:i}),n.on("load",function(){r.scrollspy("refresh")}),e(".bs-docs-container [href=#]").click(function(e){e.preventDefault()}),setTimeout(function(){var t=e(".bs-sidebar");t.affix({offset:{top:function(){var n=t.offset().top,r=parseInt(t.children(0).css("margin-top"),10),i=e(".bs-docs-nav").height();return this.top=n-i-r},bottom:function(){return this.bottom=e(".bs-footer").outerHeight(!0)}}})},100),setTimeout(function(){e(".bs-top").affix()},100),e(".tooltip-demo").tooltip({selector:"[data-toggle=tooltip]",container:"body"}),e(".tooltip-test").tooltip(),e(".popover-test").popover(),e(".bs-docs-navbar").tooltip({selector:"a[data-toggle=tooltip]",container:".bs-docs-navbar .nav"}),e("[data-toggle=popover]").popover(),e("#fat-btn").click(function(){var t=e(this);t.button("loading"),setTimeout(function(){t.button("reset")},3e3)})})}(window.jQuery);