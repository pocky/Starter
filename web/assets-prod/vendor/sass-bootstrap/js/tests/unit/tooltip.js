$(function(){module("tooltip"),test("should provide no conflict",function(){var e=$.fn.tooltip.noConflict();ok(!$.fn.tooltip,"tooltip was set back to undefined (org value)"),$.fn.tooltip=e}),test("should be defined on jquery object",function(){var e=$("<div></div>");ok(e.tooltip,"popover method is defined")}),test("should return element",function(){var e=$("<div></div>");ok(e.tooltip()==e,"document.body returned")}),test("should expose default settings",function(){ok(!!$.fn.tooltip.Constructor.DEFAULTS,"defaults is defined")}),test("should empty title attribute",function(){var e=$('<a href="#" rel="tooltip" title="Another tooltip"></a>').tooltip();ok(e.attr("title")==="","title attribute was emptied")}),test("should add data attribute for referencing original title",function(){var e=$('<a href="#" rel="tooltip" title="Another tooltip"></a>').tooltip();equal(e.attr("data-original-title"),"Another tooltip","original title preserved in data attribute")}),test("should place tooltips relative to placement option",function(){$.support.transition=!1;var e=$('<a href="#" rel="tooltip" title="Another tooltip"></a>').appendTo("#qunit-fixture").tooltip({placement:"bottom"}).tooltip("show");ok($(".tooltip").is(".fade.bottom.in"),"has correct classes applied"),e.tooltip("hide")}),test("should allow html entities",function(){$.support.transition=!1;var e=$('<a href="#" rel="tooltip" title="<b>@fat</b>"></a>').appendTo("#qunit-fixture").tooltip({html:!0}).tooltip("show");ok($(".tooltip b").length,"b tag was inserted"),e.tooltip("hide"),ok(!$(".tooltip").length,"tooltip removed")}),test("should respect custom classes",function(){var e=$('<a href="#" rel="tooltip" title="Another tooltip"></a>').appendTo("#qunit-fixture").tooltip({template:'<div class="tooltip some-class"><div class="tooltip-arrow"/><div class="tooltip-inner"/></div>'}).tooltip("show");ok($(".tooltip").hasClass("some-class"),"custom class is present"),e.tooltip("hide"),ok(!$(".tooltip").length,"tooltip removed")}),test("should fire show event",function(){stop();var e=$('<div title="tooltip title"></div>').on("show.bs.tooltip",function(){ok(!0,"show was called"),start()}).tooltip("show")}),test("should fire shown event",function(){stop();var e=$('<div title="tooltip title"></div>').on("shown.bs.tooltip",function(){ok(!0,"shown was called"),start()}).tooltip("show")}),test("should not fire shown event when default prevented",function(){stop();var e=$('<div title="tooltip title"></div>').on("show.bs.tooltip",function(e){e.preventDefault(),ok(!0,"show was called"),start()}).on("shown.bs.tooltip",function(){ok(!1,"shown was called")}).tooltip("show")}),test("should fire hide event",function(){stop();var e=$('<div title="tooltip title"></div>').on("shown.bs.tooltip",function(){$(this).tooltip("hide")}).on("hide.bs.tooltip",function(){ok(!0,"hide was called"),start()}).tooltip("show")}),test("should fire hidden event",function(){stop();var e=$('<div title="tooltip title"></div>').on("shown.bs.tooltip",function(){$(this).tooltip("hide")}).on("hidden.bs.tooltip",function(){ok(!0,"hidden was called"),start()}).tooltip("show")}),test("should not fire hidden event when default prevented",function(){stop();var e=$('<div title="tooltip title"></div>').on("shown.bs.tooltip",function(){$(this).tooltip("hide")}).on("hide.bs.tooltip",function(e){e.preventDefault(),ok(!0,"hide was called"),start()}).on("hidden.bs.tooltip",function(){ok(!1,"hidden was called")}).tooltip("show")}),test("should not show tooltip if leave event occurs before delay expires",function(){var e=$('<a href="#" rel="tooltip" title="Another tooltip"></a>').appendTo("#qunit-fixture").tooltip({delay:200});stop(),e.trigger("mouseenter"),setTimeout(function(){ok(!$(".tooltip").is(".fade.in"),"tooltip is not faded in"),e.trigger("mouseout"),setTimeout(function(){ok(!$(".tooltip").is(".fade.in"),"tooltip is not faded in"),start()},200)},100)}),test("should not show tooltip if leave event occurs before delay expires, even if hide delay is 0",function(){var e=$('<a href="#" rel="tooltip" title="Another tooltip"></a>').appendTo("#qunit-fixture").tooltip({delay:{show:200,hide:0}});stop(),e.trigger("mouseenter"),setTimeout(function(){ok(!$(".tooltip").is(".fade.in"),"tooltip is not faded in"),e.trigger("mouseout"),setTimeout(function(){ok(!$(".tooltip").is(".fade.in"),"tooltip is not faded in"),start()},200)},100)}),test("should wait 200 ms before hiding the tooltip",3,function(){var e=$('<a href="#" rel="tooltip" title="Another tooltip"></a>').appendTo("#qunit-fixture").tooltip({delay:{show:0,hide:200}});stop(),e.trigger("mouseenter"),setTimeout(function(){ok($(".tooltip").is(".fade.in"),"tooltip is faded in"),e.trigger("mouseout"),setTimeout(function(){ok($(".tooltip").is(".fade.in"),"100ms:tooltip is still faded in"),setTimeout(function(){ok(!$(".tooltip").is(".in"),"tooltip removed"),start()},150)},100)},1)}),test("should not hide tooltip if leave event occurs, then tooltip is show immediately again",function(){var e=$('<a href="#" rel="tooltip" title="Another tooltip"></a>').appendTo("#qunit-fixture").tooltip({delay:{show:0,hide:200}});stop(),e.trigger("mouseenter"),setTimeout(function(){ok($(".tooltip").is(".fade.in"),"tooltip is faded in"),e.trigger("mouseout"),setTimeout(function(){ok($(".tooltip").is(".fade.in"),"100ms:tooltip is still faded in"),e.trigger("mouseenter"),setTimeout(function(){ok($(".tooltip").is(".in"),"tooltip removed"),start()},150)},100)},1)}),test("should not show tooltip if leave event occurs before delay expires",function(){var e=$('<a href="#" rel="tooltip" title="Another tooltip"></a>').appendTo("#qunit-fixture").tooltip({delay:100});stop(),e.trigger("mouseenter"),setTimeout(function(){ok(!$(".tooltip").is(".fade.in"),"tooltip is not faded in"),e.trigger("mouseout"),setTimeout(function(){ok(!$(".tooltip").is(".fade.in"),"tooltip is not faded in"),start()},100)},50)}),test("should show tooltip if leave event hasn't occured before delay expires",function(){var e=$('<a href="#" rel="tooltip" title="Another tooltip"></a>').appendTo("#qunit-fixture").tooltip({delay:150});stop(),e.trigger("mouseenter"),setTimeout(function(){ok(!$(".tooltip").is(".fade.in"),"tooltip is not faded in")},100),setTimeout(function(){ok($(".tooltip").is(".fade.in"),"tooltip has faded in"),start()},200)}),test("should destroy tooltip",function(){var e=$("<div/>").tooltip().on("click.foo",function(){});ok(e.data("bs.tooltip"),"tooltip has data"),ok($._data(e[0],"events").mouseover&&$._data(e[0],"events").mouseout,"tooltip has hover event"),ok($._data(e[0],"events").click[0].namespace=="foo","tooltip has extra click.foo event"),e.tooltip("show"),e.tooltip("destroy"),ok(!e.hasClass("in"),"tooltip is hidden"),ok(!$._data(e[0],"bs.tooltip"),"tooltip does not have data"),ok($._data(e[0],"events").click[0].namespace=="foo","tooltip still has click.foo"),ok(!$._data(e[0],"events").mouseover&&!$._data(e[0],"events").mouseout,"tooltip does not have any events")}),test("should show tooltip with delegate selector on click",function(){var e=$('<div><a href="#" rel="tooltip" title="Another tooltip"></a></div>'),t=e.appendTo("#qunit-fixture").tooltip({selector:"a[rel=tooltip]",trigger:"click"});e.find("a").trigger("click"),ok($(".tooltip").is(".fade.in"),"tooltip is faded in")}),test("should show tooltip when toggle is called",function(){var e=$('<a href="#" rel="tooltip" title="tooltip on toggle"></a>').appendTo("#qunit-fixture").tooltip({trigger:"manual"}).tooltip("toggle");ok($(".tooltip").is(".fade.in"),"tooltip should be toggled in")}),test("should place tooltips inside the body",function(){var e=$('<a href="#" rel="tooltip" title="Another tooltip"></a>').appendTo("#qunit-fixture").tooltip({container:"body"}).tooltip("show");ok($("body > .tooltip").length,"inside the body"),ok(!$("#qunit-fixture > .tooltip").length,"not found in parent"),e.tooltip("hide")}),test("should place tooltip inside window",function(){var e=$("<div />").appendTo("body").css({position:"absolute",width:200,height:200,bottom:0,left:0}),t=$("<a href='#' title='Very very very very very very very very long tooltip'>Hover me</a>").css({position:"absolute",top:0,left:0}).appendTo(e).tooltip({placement:"top",animate:!1}).tooltip("show");stop(),setTimeout(function(){ok($(".tooltip").offset().left>=0),start(),e.remove()},100)}),test("should place tooltip on top of element",function(){var e=$("<div />").appendTo("body").css({position:"absolute",bottom:0,left:0,textAlign:"right",width:300,height:300}),t=$("<p style='margin-top:200px' />").appendTo(e),n=$("<a href='#' title='very very very very very very very long tooltip'>Hover me</a>").css({marginTop:200}).appendTo(t).tooltip({placement:"top",animate:!1}).tooltip("show");stop(),setTimeout(function(){var t=e.find(".tooltip");start(),ok(t.offset().top+t.outerHeight()<=n.offset().top),e.remove()},100)}),test("should add position class before positioning so that position-specific styles are taken into account",function(){$("head").append("<style> .tooltip.right { white-space: nowrap; } .tooltip.right .tooltip-inner { max-width: none; } </style>");var e=$("<div />").appendTo("body"),t=$('<a href="#" rel="tooltip" title="very very very very very very very very long tooltip in one line"></a>').appendTo(e).tooltip({placement:"right"}).tooltip("show"),n=e.find(".tooltip");ok(Math.round(t.offset().top+t[0].offsetHeight/2-n[0].offsetHeight/2)===Math.round(n.offset().top)),t.tooltip("hide")}),test("tooltip title test #1",function(){var e=$('<a href="#" rel="tooltip" title="Simple tooltip" style="display: inline-block; position: absolute; top: 0; left: 0;"></a>').appendTo("#qunit-fixture").tooltip({}).tooltip("show");equal($(".tooltip").children(".tooltip-inner").text(),"Simple tooltip","title from title attribute is set"),e.tooltip("hide"),ok(!$(".tooltip").length,"tooltip removed")}),test("tooltip title test #2",function(){var e=$('<a href="#" rel="tooltip" title="Simple tooltip" style="display: inline-block; position: absolute; top: 0; left: 0;"></a>').appendTo("#qunit-fixture").tooltip({title:"This is a tooltip with some content"}).tooltip("show");equal($(".tooltip").children(".tooltip-inner").text(),"Simple tooltip","title is set from title attribute while prefered over title option"),e.tooltip("hide"),ok(!$(".tooltip").length,"tooltip removed")}),test("tooltip title test #3",function(){var e=$('<a href="#" rel="tooltip" style="display: inline-block; position: absolute; top: 0; left: 0;"></a>').appendTo("#qunit-fixture").tooltip({title:"This is a tooltip with some content"}).tooltip("show");equal($(".tooltip").children(".tooltip-inner").text(),"This is a tooltip with some content","title from title option is set"),e.tooltip("hide"),ok(!$(".tooltip").length,"tooltip removed")}),test("tooltips should be placed dynamically, with the dynamic placement option",function(){$.support.transition=!1;var e=$('<div id="dynamic-tt-test"/>').css({height:400,overflow:"hidden",position:"absolute",top:0,left:0,width:600}).appendTo("body"),t=$('<div style="display: inline-block; position: absolute; left: 0; top: 0;" rel="tooltip" title="Top tooltip">Top Dynamic Tooltip</div>').appendTo("#dynamic-tt-test").tooltip({placement:"auto"}).tooltip("show");ok($(".tooltip").is(".bottom"),"top positioned tooltip is dynamically positioned bottom"),t.tooltip("hide");var n=$('<div style="display: inline-block; position: absolute; right: 0;" rel="tooltip" title="Right tooltip">Right Dynamic Tooltip</div>').appendTo("#dynamic-tt-test").tooltip({placement:"right auto"}).tooltip("show");ok($(".tooltip").is(".left"),"right positioned tooltip is dynamically positioned left"),n.tooltip("hide");var r=$('<div style="display: inline-block; position: absolute; bottom: 0;" rel="tooltip" title="Bottom tooltip">Bottom Dynamic Tooltip</div>').appendTo("#dynamic-tt-test").tooltip({placement:"auto bottom"}).tooltip("show");ok($(".tooltip").is(".top"),"bottom positioned tooltip is dynamically positioned top"),r.tooltip("hide");var i=$('<div style="display: inline-block; position: absolute; left: 0;" rel="tooltip" title="Left tooltip">Left Dynamic Tooltip</div>').appendTo("#dynamic-tt-test").tooltip({placement:"auto left"}).tooltip("show");ok($(".tooltip").is(".right"),"left positioned tooltip is dynamically positioned right"),i.tooltip("hide"),e.remove()})});