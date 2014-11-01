jQuery.css&&(module("css",{teardown:moduleTeardown}),test("css(String|Hash)",function(){expect(40),equal(jQuery("#qunit-fixture").css("display"),"block",'Check for css property "display"');var e,t,n,r,i,s,o,u,a;e=jQuery("#nothiddendivchild").css({width:"20%",height:"20%"}),notEqual(e.css("width"),"20px","Retrieving a width percentage on the child of a hidden div returns percentage"),notEqual(e.css("height"),"20px","Retrieving a height percentage on the child of a hidden div returns percentage"),t=jQuery("<div>"),equal(t.css("width"),"0px","Width on disconnected node."),equal(t.css("height"),"0px","Height on disconnected node."),t.css({width:4,height:4}),equal(t.css("width"),"4px","Width on disconnected node."),equal(t.css("height"),"4px","Height on disconnected node."),n=jQuery("<div style='display:none;'><input type='text' style='height:20px;'/><textarea style='height:20px;'/><div style='height:20px;'></div></div>").appendTo("body"),equal(n.find("input").css("height"),"20px","Height on hidden input."),equal(n.find("textarea").css("height"),"20px","Height on hidden textarea."),equal(n.find("div").css("height"),"20px","Height on hidden textarea."),n.remove(),jQuery("#nothiddendiv").css({width:1,height:1}),r=parseFloat(jQuery("#nothiddendiv").css("width")),i=parseFloat(jQuery("#nothiddendiv").css("height")),jQuery("#nothiddendiv").css({overflow:"hidden",width:-1,height:-1}),equal(parseFloat(jQuery("#nothiddendiv").css("width")),0,"Test negative width set to 0"),equal(parseFloat(jQuery("#nothiddendiv").css("height")),0,"Test negative height set to 0"),equal(jQuery("<div style='display: none;'>").css("display"),"none","Styles on disconnected nodes"),jQuery("#floatTest").css({"float":"right"}),equal(jQuery("#floatTest").css("float"),"right",'Modified CSS float using "float": Assert float is right'),jQuery("#floatTest").css({"font-size":"30px"}),equal(jQuery("#floatTest").css("font-size"),"30px","Modified CSS font-size: Assert font-size is 30px"),jQuery.each("0,0.25,0.5,0.75,1".split(","),function(e,t){jQuery("#foo").css({opacity:t}),equal(jQuery("#foo").css("opacity"),parseFloat(t),"Assert opacity is "+parseFloat(t)+" as a String"),jQuery("#foo").css({opacity:parseFloat(t)}),equal(jQuery("#foo").css("opacity"),parseFloat(t),"Assert opacity is "+parseFloat(t)+" as a Number")}),jQuery("#foo").css({opacity:""}),equal(jQuery("#foo").css("opacity"),"1","Assert opacity is 1 when set to an empty String"),equal(jQuery("#empty").css("opacity"),"0","Assert opacity is accessible via filter property set in stylesheet in IE"),jQuery("#empty").css({opacity:"1"}),equal(jQuery("#empty").css("opacity"),"1","Assert opacity is taken from style attribute when set vs stylesheet in IE with filters"),t=jQuery("#nothiddendiv"),s=jQuery("#nothiddendivchild"),equal(parseInt(t.css("fontSize"),10),16,"Verify fontSize px set."),equal(parseInt(t.css("font-size"),10),16,"Verify fontSize px set."),equal(parseInt(s.css("fontSize"),10),16,"Verify fontSize px set."),equal(parseInt(s.css("font-size"),10),16,"Verify fontSize px set."),s.css("height","100%"),equal(s[0].style.height,"100%","Make sure the height is being set correctly."),s.attr("class","em"),equal(parseInt(s.css("fontSize"),10),32,"Verify fontSize em set."),s.attr("class","prct"),o=parseInt(s.css("fontSize"),10),u=0;if(o===16||o===24)u=o;equal(o,u,"Verify fontSize % set."),equal(typeof s.css("width"),"string","Make sure that a string width is returned from css('width')."),a=s[0].style.height,s.css("height",parseFloat("zoo")),equal(s[0].style.height,a,"Make sure height isn't changed on NaN."),s.css("height",null),equal(s[0].style.height,a,"Make sure height isn't changed on null."),a=s[0].style.fontSize,s.css("font-size",parseFloat("zoo")),equal(s[0].style.fontSize,a,"Make sure font-size isn't changed on NaN."),s.css("font-size",null),equal(s[0].style.fontSize,a,"Make sure font-size isn't changed on null.")}),test("css() explicit and relative values",function(){expect(29);var e=jQuery("#nothiddendiv");e.css({width:1,height:1,paddingLeft:"1px",opacity:1}),equal(e.css("width"),"1px","Initial css set or width/height works (hash)"),equal(e.css("paddingLeft"),"1px","Initial css set of paddingLeft works (hash)"),equal(e.css("opacity"),"1","Initial css set of opacity works (hash)"),e.css({width:"+=9"}),equal(e.css("width"),"10px","'+=9' on width (hash)"),e.css({width:"-=9"}),equal(e.css("width"),"1px","'-=9' on width (hash)"),e.css({width:"+=9px"}),equal(e.css("width"),"10px","'+=9px' on width (hash)"),e.css({width:"-=9px"}),equal(e.css("width"),"1px","'-=9px' on width (hash)"),e.css("width","+=9"),equal(e.css("width"),"10px","'+=9' on width (params)"),e.css("width","-=9"),equal(e.css("width"),"1px","'-=9' on width (params)"),e.css("width","+=9px"),equal(e.css("width"),"10px","'+=9px' on width (params)"),e.css("width","-=9px"),equal(e.css("width"),"1px","'-=9px' on width (params)"),e.css("width","-=-9px"),equal(e.css("width"),"10px","'-=-9px' on width (params)"),e.css("width","+=-9px"),equal(e.css("width"),"1px","'+=-9px' on width (params)"),e.css({paddingLeft:"+=4"}),equal(e.css("paddingLeft"),"5px","'+=4' on paddingLeft (hash)"),e.css({paddingLeft:"-=4"}),equal(e.css("paddingLeft"),"1px","'-=4' on paddingLeft (hash)"),e.css({paddingLeft:"+=4px"}),equal(e.css("paddingLeft"),"5px","'+=4px' on paddingLeft (hash)"),e.css({paddingLeft:"-=4px"}),equal(e.css("paddingLeft"),"1px","'-=4px' on paddingLeft (hash)"),e.css({"padding-left":"+=4"}),equal(e.css("paddingLeft"),"5px","'+=4' on padding-left (hash)"),e.css({"padding-left":"-=4"}),equal(e.css("paddingLeft"),"1px","'-=4' on padding-left (hash)"),e.css({"padding-left":"+=4px"}),equal(e.css("paddingLeft"),"5px","'+=4px' on padding-left (hash)"),e.css({"padding-left":"-=4px"}),equal(e.css("paddingLeft"),"1px","'-=4px' on padding-left (hash)"),e.css("paddingLeft","+=4"),equal(e.css("paddingLeft"),"5px","'+=4' on paddingLeft (params)"),e.css("paddingLeft","-=4"),equal(e.css("paddingLeft"),"1px","'-=4' on paddingLeft (params)"),e.css("padding-left","+=4px"),equal(e.css("paddingLeft"),"5px","'+=4px' on padding-left (params)"),e.css("padding-left","-=4px"),equal(e.css("paddingLeft"),"1px","'-=4px' on padding-left (params)"),e.css({opacity:"-=0.5"}),equal(e.css("opacity"),"0.5","'-=0.5' on opacity (hash)"),e.css({opacity:"+=0.5"}),equal(e.css("opacity"),"1","'+=0.5' on opacity (hash)"),e.css("opacity","-=0.5"),equal(e.css("opacity"),"0.5","'-=0.5' on opacity (params)"),e.css("opacity","+=0.5"),equal(e.css("opacity"),"1","'+=0.5' on opacity (params)")}),test("css(String, Object)",function(){expect(19);var e,t,n,r,i;jQuery("#nothiddendiv").css("top","-1em"),ok(jQuery("#nothiddendiv").css("top"),-16,"Check negative number in EMs."),jQuery("#floatTest").css("float","left"),equal(jQuery("#floatTest").css("float"),"left",'Modified CSS float using "float": Assert float is left'),jQuery("#floatTest").css("font-size","20px"),equal(jQuery("#floatTest").css("font-size"),"20px","Modified CSS font-size: Assert font-size is 20px"),jQuery.each("0,0.25,0.5,0.75,1".split(","),function(e,t){jQuery("#foo").css("opacity",t),equal(jQuery("#foo").css("opacity"),parseFloat(t),"Assert opacity is "+parseFloat(t)+" as a String"),jQuery("#foo").css("opacity",parseFloat(t)),equal(jQuery("#foo").css("opacity"),parseFloat(t),"Assert opacity is "+parseFloat(t)+" as a Number")}),jQuery("#foo").css("opacity",""),equal(jQuery("#foo").css("opacity"),"1","Assert opacity is 1 when set to an empty String"),e=jQuery("#nonnodes").contents(),e.css("overflow","visible"),equal(e.css("overflow"),"visible","Check node,textnode,comment css works"),jQuery("#t2037")[0].innerHTML=jQuery("#t2037")[0].innerHTML,equal(jQuery("#t2037 .hidden").css("display"),"none","Make sure browser thinks it is hidden"),t=jQuery("#nothiddendiv"),n=t.css("display"),r=t.css("display",undefined),equal(r,t,"Make sure setting undefined returns the original set."),equal(t.css("display"),n,"Make sure that the display wasn't changed."),i=!0;try{jQuery("#foo").css("backgroundColor","rgba(0, 0, 0, 0.1)")}catch(s){i=!1}ok(i,"Setting RGBA values does not throw Error")}),test("css(Array)",function(){expect(2);var e={overflow:"visible",width:"16px"},t={width:"16px"},n=jQuery("<div></div>").appendTo("#qunit-fixture");deepEqual(n.css(e).css(["overflow","width"]),e,"Getting multiple element array"),deepEqual(n.css(t).css(["width"]),t,"Getting single element array")}),test("css(String, Function)",function(){expect(3);var e,t=["10px","20px","30px"];jQuery("<div id='cssFunctionTest'><div class='cssFunction'></div><div class='cssFunction'></div><div class='cssFunction'></div></div>").appendTo("body"),e=0,jQuery("#cssFunctionTest div").css("font-size",function(){var n=t[e];return e++,n}),e=0,jQuery("#cssFunctionTest div").each(function(){var n=jQuery(this).css("font-size"),r=t[e];equal(n,r,"Div #"+e+" should be "+r),e++}),jQuery("#cssFunctionTest").remove()}),test("css(String, Function) with incoming value",function(){expect(3);var e,t=["10px","20px","30px"];jQuery("<div id='cssFunctionTest'><div class='cssFunction'></div><div class='cssFunction'></div><div class='cssFunction'></div></div>").appendTo("body"),e=0,jQuery("#cssFunctionTest div").css("font-size",function(){var n=t[e];return e++,n}),e=0,jQuery("#cssFunctionTest div").css("font-size",function(n,r){var i=t[e];return equal(r,i,"Div #"+e+" should be "+i),e++,r}),jQuery("#cssFunctionTest").remove()}),test("css(Object) where values are Functions",function(){expect(3);var e,t=["10px","20px","30px"];jQuery("<div id='cssFunctionTest'><div class='cssFunction'></div><div class='cssFunction'></div><div class='cssFunction'></div></div>").appendTo("body"),e=0,jQuery("#cssFunctionTest div").css({fontSize:function(){var n=t[e];return e++,n}}),e=0,jQuery("#cssFunctionTest div").each(function(){var n=jQuery(this).css("font-size"),r=t[e];equal(n,r,"Div #"+e+" should be "+r),e++}),jQuery("#cssFunctionTest").remove()}),test("css(Object) where values are Functions with incoming values",function(){expect(3);var e,t=["10px","20px","30px"];jQuery("<div id='cssFunctionTest'><div class='cssFunction'></div><div class='cssFunction'></div><div class='cssFunction'></div></div>").appendTo("body"),e=0,jQuery("#cssFunctionTest div").css({fontSize:function(){var n=t[e];return e++,n}}),e=0,jQuery("#cssFunctionTest div").css({"font-size":function(n,r){var i=t[e];return equal(r,i,"Div #"+e+" should be "+i),e++,r}}),jQuery("#cssFunctionTest").remove()}),test("show(); hide()",function(){expect(22);var e,t,n,r,i;e=jQuery("div.hidden"),e.hide(),equal(e.css("display"),"none","Non-detached div hidden"),e.show(),equal(e.css("display"),"block","Pre-hidden div shown"),t=jQuery("<div>").hide(),equal(t.css("display"),"none","Detached div hidden"),t.appendTo("#qunit-fixture").show(),equal(t.css("display"),"block","Pre-hidden div shown"),QUnit.reset(),e=jQuery("div.hidden"),equal(jQuery.css(e[0],"display"),"none","hiddendiv is display: none"),e.css("display","block"),equal(jQuery.css(e[0],"display"),"block","hiddendiv is display: block"),e.show(),equal(jQuery.css(e[0],"display"),"block","hiddendiv is display: block"),e.css("display",""),n=!0,t=jQuery("#qunit-fixture div"),t.show().each(function(){this.style.display==="none"&&(n=!1)}),ok(n,"Show"),jQuery("#qunit-fixture").append("<div id='show-tests'><div><p><a href='#'></a></p><code></code><pre></pre><span></span></div><table><thead><tr><th></th></tr></thead><tbody><tr><td></td></tr></tbody></table><ul><li></li></ul></div><table id='test-table'></table>"),r=jQuery("#test-table").show().css("display")!=="table",jQuery("#test-table").remove(),i={div:"block",p:"block",a:"inline",code:"inline",pre:"block",span:"inline",table:r?"block":"table",thead:r?"block":"table-header-group",tbody:r?"block":"table-row-group",tr:r?"block":"table-row",th:r?"block":"table-cell",td:r?"block":"table-cell",ul:"block",li:r?"block":"list-item"},jQuery.each(i,function(e,t){var n=jQuery(e,"#show-tests").show();equal(n.css("display"),t,"Show using correct display type for "+e)}),jQuery("<div>test</div> text <span>test</span>").show().remove(),jQuery("<div>test</div> text <span>test</span>").hide().remove()}),test("show() resolves correct default display #8099",function(){expect(7);var e=jQuery("<tt/>").appendTo("body"),t=jQuery("<dfn/>",{html:"foo"}).appendTo("body");equal(e.css("display"),"none","default display override for all tt"),equal(e.show().css("display"),"inline","Correctly resolves display:inline"),equal(jQuery("#foo").hide().show().css("display"),"block","Correctly resolves display:block after hide/show"),equal(e.hide().css("display"),"none","default display override for all tt"),equal(e.show().css("display"),"inline","Correctly resolves display:inline"),equal(t.css("display"),"none","default display override for all dfn"),equal(t.show().css("display"),"inline","Correctly resolves display:inline"),e.remove(),t.remove()}),test("show() resolves correct default display for detached nodes",function(){expect(13);var e,t,n,r;e=jQuery("<div class='hidden'>"),e.show().appendTo("#qunit-fixture"),equal(e.css("display"),"block","Make sure a detached, pre-hidden( through stylesheets ) div is visible."),e=jQuery("<div style='display: none'>"),e.show().appendTo("#qunit-fixture"),equal(e.css("display"),"block","Make sure a detached, pre-hidden( through inline style ) div is visible."),t=jQuery("<span class='hidden'/>"),t.show().appendTo("#qunit-fixture"),equal(t.css("display"),"inline","Make sure a detached, pre-hidden( through stylesheets ) span has default display."),t=jQuery("<span style='display: inline'/>"),t.show().appendTo("#qunit-fixture"),equal(t.css("display"),"inline","Make sure a detached, pre-hidden( through inline style ) span has default display."),e=jQuery("<div><div class='hidden'></div></div>").children("div"),e.show().appendTo("#qunit-fixture"),equal(e.css("display"),"block","Make sure a detached, pre-hidden( through stylesheets ) div inside another visible div is visible."),e=jQuery("<div><div style='display: none'></div></div>").children("div"),e.show().appendTo("#qunit-fixture"),equal(e.css("display"),"block","Make sure a detached, pre-hidden( through inline style ) div inside another visible div is visible."),e=jQuery("div.hidden"),e.detach().show(),equal(e.css("display"),"block","Make sure a detached( through detach() ), pre-hidden div is visible."),e.remove(),t=jQuery("<span>"),t.appendTo("#qunit-fixture").detach().show().appendTo("#qunit-fixture"),equal(t.css("display"),"inline","Make sure a detached( through detach() ), pre-hidden span has default display."),t.remove(),e=jQuery("<div>"),e.show().appendTo("#qunit-fixture"),ok(!!e.get(0).style.display,"Make sure not hidden div has a inline style."),e.remove(),e=jQuery(document.createElement("div")),e.show().appendTo("#qunit-fixture"),equal(e.css("display"),"block","Make sure a pre-created element has default display."),e.remove(),e=jQuery("<div style='display: inline'/>"),e.show().appendTo("#qunit-fixture"),equal(e.css("display"),"inline","Make sure that element has same display when it was created."),e.remove(),n=jQuery("<tr/>"),jQuery("#table").append(n),r=n.css("display"),n.detach().hide().show(),equal(n[0].style.display,r,"For detached tr elements, display should always be like for attached trs"),n.remove(),t=jQuery("<span/>").hide().show(),equal(t[0].style.display,"inline","For detached span elements, display should always be inline"),t.remove()}),test("show() resolves correct default display #10227",function(){expect(2);var e=jQuery("body");e.append("<p id='ddisplay'>a<style>body{display:none}</style></p>"),equal(e.css("display"),"none","Initial display: none"),e.show(),equal(e.css("display"),"block","Correct display: block"),jQuery("#ddisplay").remove(),QUnit.expectJqData(e[0],"olddisplay")}),test("show() resolves correct default display when iframe display:none #12904",function(){expect(2);var e=jQuery("<p id='ddisplay'>a<style>p{display:none}iframe{display:none !important}</style></p>").appendTo("body");equal(e.css("display"),"none","Initial display: none"),e.show(),equal(e.css("display"),"block","Correct display: block"),e.remove()}),test("toggle()",function(){expect(9);var e,t,n=jQuery("#foo");ok(n.is(":visible"),"is visible"),n.toggle(),ok(n.is(":hidden"),"is hidden"),n.toggle(),ok(n.is(":visible"),"is visible again"),n.toggle(!0),ok(n.is(":visible"),"is visible"),n.toggle(!1),ok(n.is(":hidden"),"is hidden"),n.toggle(!0),ok(n.is(":visible"),"is visible again"),e=jQuery("<div style='display:none'><div></div></div>").appendTo("#qunit-fixture"),n=e.find("div"),strictEqual(n.toggle().css("display"),"none","is hidden"),strictEqual(n.toggle().css("display"),"block","is visible"),t=jQuery.fn.hide,jQuery.fn.hide=function(){return ok(!0,name+" method called on toggle"),t.apply(this,arguments)},n.toggle(name==="show"),jQuery.fn.hide=t}),test("hide hidden elements (bug #7141)",function(){expect(3),QUnit.reset();var e=jQuery("<div style='display:none'></div>").appendTo("#qunit-fixture");equal(e.css("display"),"none","Element is hidden by default"),e.hide(),ok(!jQuery._data(e,"olddisplay"),"olddisplay is undefined after hiding an already-hidden element"),e.show(),equal(e.css("display"),"block","Show a double-hidden element"),e.remove()}),test("jQuery.css(elem, 'height') doesn't clear radio buttons (bug #1095)",function(){expect(4);var e=jQuery("#checkedtest");jQuery.css(e[0],"height"),ok(jQuery("input[type='radio']",e).first().attr("checked"),"Check first radio still checked."),ok(!jQuery("input[type='radio']",e).last().attr("checked"),"Check last radio still NOT checked."),ok(jQuery("input[type='checkbox']",e).first().attr("checked"),"Check first checkbox still checked."),ok(!jQuery("input[type='checkbox']",e).last().attr("checked"),"Check last checkbox still NOT checked.")}),test("internal ref to elem.runtimeStyle (bug #7608)",function(){expect(1);var e=!0;try{jQuery("#foo").css({width:"0%"}).css("width")}catch(t){e=!1}ok(e,"elem.runtimeStyle does not throw exception")}),test("marginRight computed style (bug #3333)",function(){expect(1);var e=jQuery("#foo");e.css({width:"1px",marginRight:0}),equal(e.css("marginRight"),"0px","marginRight correctly calculated with a width and display block")}),test("box model properties incorrectly returning % instead of px, see #10639 and #12088",function(){expect(2);var e=jQuery("<div/>").width(400).appendTo("#qunit-fixture"),t=jQuery("<div/>").css({width:"50%",marginRight:"50%"}).appendTo(e),n=jQuery("<div/>").css({width:"50%",minWidth:"300px",marginLeft:"25%"}).appendTo(e);equal(t.css("marginRight"),"200px","css('marginRight') returning % instead of px, see #10639"),equal(n.css("marginLeft"),"100px","css('marginLeft') returning incorrect pixel value, see #12088")}),test("jQuery.cssProps behavior, (bug #8402)",function(){expect(2);var e=jQuery("<div>").appendTo(document.body).css({position:"absolute",top:0,left:10});jQuery.cssProps.top="left",equal(e.css("top"),"10px","the fixed property is used when accessing the computed style"),e.css("top","100px"),equal(e[0].style.left,"100px","the fixed property is used when setting the style"),jQuery.cssProps.top=undefined}),test("widows & orphans #8936",function(){var e=jQuery("<p>").appendTo("#qunit-fixture");"widows"in e[0].style?(expect(4),e.css({widows:0,orphans:0}),equal(e.css("widows")||jQuery.style(e[0],"widows"),0,"widows correctly start with value 0"),equal(e.css("orphans")||jQuery.style(e[0],"orphans"),0,"orphans correctly start with value 0"),e.css({widows:3,orphans:3}),equal(e.css("widows")||jQuery.style(e[0],"widows"),3,"widows correctly set to 3"),equal(e.css("orphans")||jQuery.style(e[0],"orphans"),3,"orphans correctly set to 3")):(expect(1),ok(!0,"jQuery does not attempt to test for style props that definitely don't exist in older versions of IE")),e.remove()}),test("can't get css for disconnected in IE<9, see #10254 and #8388",function(){expect(2);var e,t;e=jQuery("<span/>").css("background-image","url(data/1x1.jpg)"),notEqual(e.css("background-image"),null,"can't get background-image in IE<9, see #10254"),t=jQuery("<div/>").css("top",10),equal(t.css("top"),"10px","can't get top in IE<9, see #8388")}),test("can't get background-position in IE<9, see #10796",function(){var e=jQuery("<div/>").appendTo("#qunit-fixture"),t=["0 0","12px 12px","13px 12em","12em 13px","12em center","+12em center","12.2em center","center center"],n=t.length,r=0;expect(n);for(;r<n;r++)e.css("background-position",t[r]),ok(e.css("background-position"),"can't get background-position in IE<9, see #10796")}),test("percentage properties for bottom and right in IE<9 should not be incorrectly transformed to pixels, see #11311",function(){expect(1);var e=jQuery("<div style='position: absolute; width: 1px; height: 20px; bottom:50%;'></div>").appendTo("#qunit-fixture");ok(window.getComputedStyle||e.css("bottom")==="50%","position properties get incorrectly transformed in IE<8, see #11311")}),jQuery.fn.offset&&test("percentage properties for left and top should be transformed to pixels, see #9505",function(){expect(2);var e=jQuery("<div style='position:relative;width:200px;height:200px;margin:0;padding:0;border-width:0'></div>").appendTo("#qunit-fixture"),t=jQuery("<div style='position: absolute; width: 20px; height: 20px; top:50%; left:50%'></div>").appendTo(e);equal(t.css("top"),"100px","position properties not transformed to pixels, see #9505"),equal(t.css("left"),"100px","position properties not transformed to pixels, see #9505")}),test("Do not append px (#9548, #12990)",function(){expect(2);var e=jQuery("<div>").appendTo("#qunit-fixture");e.css("fill-opacity",1),equal(e.css("fill-opacity"),1,"Do not append px to 'fill-opacity'"),e.css("column-count",1),e.css("column-count")?equal(e.css("column-count"),1,"Do not append px to 'column-count'"):ok(!0,"No support for column-count CSS property")}),test("css('width') and css('height') should respect box-sizing, see #11004",function(){expect(4);var e=jQuery("<div style='width:300px;height:300px;margin:2px;padding:2px;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;'>test</div>"),t=e.clone().appendTo("#qunit-fixture");equal(t.css("width"),t.css("width",t.css("width")).css("width"),"css('width') is not respecting box-sizing, see #11004"),equal(e.css("width"),e.css("width",e.css("width")).css("width"),"css('width') is not respecting box-sizing for disconnected element, see #11004"),equal(t.css("height"),t.css("height",t.css("height")).css("height"),"css('height') is not respecting box-sizing, see #11004"),equal(e.css("height"),e.css("height",e.css("height")).css("height"),"css('height') is not respecting box-sizing for disconnected element, see #11004")}),test("certain css values of 'normal' should be convertable to a number, see #8627",function(){expect(2);var e=jQuery("<div style='letter-spacing:normal;font-weight:normal;'>test</div>").appendTo("#qunit-fixture");ok(jQuery.isNumeric(parseFloat(e.css("letterSpacing"))),"css('letterSpacing') not convertable to number, see #8627"),ok(jQuery.isNumeric(parseFloat(e.css("fontWeight"))),"css('fontWeight') not convertable to number, see #8627")}),document.documentMode===9&&test(".css('filter') returns a string in IE9, see #12537",1,function(){equal(jQuery("<div style='-ms-filter:\"progid:DXImageTransform.Microsoft.gradient(startColorstr=#FFFFFF, endColorstr=#ECECEC)\";'></div>").css("filter"),"progid:DXImageTransform.Microsoft.gradient(startColorstr=#FFFFFF, endColorstr=#ECECEC)","IE9 returns the correct value from css('filter').")}),test("cssHooks - expand",function(){expect(15);var e,t={margin:["marginTop","marginRight","marginBottom","marginLeft"],borderWidth:["borderTopWidth","borderRightWidth","borderBottomWidth","borderLeftWidth"],padding:["paddingTop","paddingRight","paddingBottom","paddingLeft"]};jQuery.each(t,function(t,n){var r=jQuery.cssHooks[t],i={};jQuery.each(n,function(e,t){i[t]=10}),e=r.expand(10),deepEqual(e,i,t+" expands properly with a number"),jQuery.each(n,function(e,t){i[t]="10px"}),e=r.expand("10px"),deepEqual(e,i,t+" expands properly with '10px'"),i[n[1]]=i[n[3]]="20px",e=r.expand("10px 20px"),deepEqual(e,i,t+" expands properly with '10px 20px'"),i[n[2]]="30px",e=r.expand("10px 20px 30px"),deepEqual(e,i,t+" expands properly with '10px 20px 30px'"),i[n[3]]="40px",e=r.expand("10px 20px 30px 40px"),deepEqual(e,i,t+" expands properly with '10px 20px 30px 40px'")})}),test("css opacity consistency across browsers (#12685)",function(){expect(4);var e,t=jQuery("#qunit-fixture");jQuery("<style>.opacityWithSpaces_t12685 { opacity: 0.1; filter: alpha(opacity = 10); } .opacityNoSpaces_t12685 { opacity: 0.2; filter: alpha(opacity=20); }</style>").appendTo(t),e=jQuery("<div class='opacityWithSpaces_t12685'></div>").appendTo(t),equal(Math.round(e.css("opacity")*100),10,"opacity from style sheet (filter:alpha with spaces)"),e.removeClass("opacityWithSpaces_t12685").addClass("opacityNoSpaces_t12685"),equal(Math.round(e.css("opacity")*100),20,"opacity from style sheet (filter:alpha without spaces)"),e.css("opacity",.3),equal(Math.round(e.css("opacity")*100),30,"override opacity"),e.css("opacity",""),equal(Math.round(e.css("opacity")*100),20,"remove opacity override")}),test(":visible/:hidden selectors",function(){expect(13),ok(jQuery("#nothiddendiv").is(":visible"),"Modifying CSS display: Assert element is visible"),jQuery("#nothiddendiv").css({display:"none"}),ok(!jQuery("#nothiddendiv").is(":visible"),"Modified CSS display: Assert element is hidden"),jQuery("#nothiddendiv").css({display:"block"}),ok(jQuery("#nothiddendiv").is(":visible"),"Modified CSS display: Assert element is visible"),ok(jQuery(window).is(":visible")||!0,"Calling is(':visible') on window does not throw an exception (#10267)"),ok(jQuery(document).is(":visible")||!0,"Calling is(':visible') on document does not throw an exception (#10267)"),ok(jQuery("#nothiddendiv").is(":visible"),"Modifying CSS display: Assert element is visible"),jQuery("#nothiddendiv").css("display","none"),ok(!jQuery("#nothiddendiv").is(":visible"),"Modified CSS display: Assert element is hidden"),jQuery("#nothiddendiv").css("display","block"),ok(jQuery("#nothiddendiv").is(":visible"),"Modified CSS display: Assert element is visible");var e=jQuery("#table");e.html("<tr><td style='display:none'>cell</td><td>cell</td></tr>"),equal(jQuery("#table td:visible").length,1,"hidden cell is not perceived as visible (#4512). Works on table elements"),e.css("display","none").html("<tr><td>cell</td><td>cell</td></tr>"),equal(jQuery("#table td:visible").length,0,"hidden cell children not perceived as visible (#4512)"),t("Is Visible","#qunit-fixture div:visible:lt(2)",["foo","nothiddendiv"]),t("Is Not Hidden","#qunit-fixture:hidden",[]),t("Is Hidden","#form input:hidden",["hidden1","hidden2"])}),asyncTest("Clearing a Cloned Element's Style Shouldn't Clear the Original Element's Style (#8908)",24,function(){var e=document.location.href.replace(/([^\/]*)$/,""),t=[{name:"backgroundAttachment",value:["fixed"],expected:["scroll"]},{name:"backgroundColor",value:["rgb(255, 0, 0)","rgb(255,0,0)","#ff0000"],expected:["transparent"]},{name:"backgroundImage",value:["url('test.png')","url("+e+"test.png)",'url("'+e+'test.png")'],expected:["none",'url("http://static.jquery.com/files/rocker/images/logo_jquery_215x53.gif")']},{name:"backgroundPosition",value:["5% 5%"],expected:["0% 0%","-1000px 0px","-1000px 0%"]},{name:"backgroundRepeat",value:["repeat-y"],expected:["repeat","no-repeat"]},{name:"backgroundClip",value:["padding-box"],expected:["border-box"]},{name:"backgroundOrigin",value:["content-box"],expected:["padding-box"]},{name:"backgroundSize",value:["80px 60px"],expected:["auto auto"]}];jQuery.each(t,function(e,t){var n,r,i=jQuery("#firstp"),s=i[0],o=i.children();t.expected=t.expected.concat(["","auto"]);if(s.style[t.name]===undefined)return ok(!0,t.name+": style isn't supported and therefore not an issue"),ok(!0),!0;i.css(t.name,t.value[0]),o.css(t.name,t.value[0]),n=i.clone(),r=n.children(),n.css(t.name,""),r.css(t.name,""),window.setTimeout(function(){notEqual(n.css(t.name),t.value[0],"Cloned css was changed"),ok(jQuery.inArray(i.css(t.name)!==-1,t.value),"Clearing clone.css() doesn't affect source.css(): "+t.name+"; result: "+i.css(t.name)+"; expected: "+t.value.join(",")),ok(jQuery.inArray(o.css(t.name)!==-1,t.value),"Clearing clonedChildren.css() doesn't affect children.css(): "+t.name+"; result: "+o.css(t.name)+"; expected: "+t.value.join(","))},100)}),window.setTimeout(start,1e3)}),asyncTest("Make sure initialized display value for disconnected nodes is correct (#13310)",4,function(){var e=jQuery("#display").css("display"),t=jQuery("<div/>");equal(t.css("display","inline").hide().show().appendTo("body").css("display"),"inline","Initialized display value has returned"),t.remove(),t.css("display","none").hide(),equal(jQuery._data(t[0],"olddisplay"),undefined,"olddisplay is undefined after hiding a detached and hidden element"),t.remove(),t.css("display","inline-block").hide().appendTo("body").fadeIn(function(){equal(t.css("display"),"inline-block","Initialized display value has returned"),t.remove(),start()}),equal(jQuery._data(jQuery("#display").css("display","inline").hide()[0],"olddisplay"),e,"display: * !Important value should used as initialized display"),jQuery._removeData(jQuery("#display")[0])}));