module("support",{teardown:moduleTeardown}),jQuery.css&&testIframeWithCallback("body background is not lost if set prior to loading jQuery (#9239)","support/bodyBackground.html",function(e,t){expect(2);var n={"#000000":!0,"rgb(0, 0, 0)":!0};ok(n[e],"color was not reset ("+e+")"),deepEqual(jQuery.extend({},t),jQuery.support,"Same support properties")}),testIframeWithCallback("A non-1 zoom on body doesn't cause WebKit to fail box-sizing test","support/boxSizing.html",function(e){expect(1),equal(e,jQuery.support.boxSizing,"box-sizing properly detected on page with non-1 body zoom")}),testIframeWithCallback("A background on the testElement does not cause IE8 to crash (#9823)","support/testElementCrash.html",function(){expect(1),ok(!0,"IE8 does not crash")}),testIframeWithCallback("box-sizing does not affect jQuery.support.shrinkWrapBlocks","support/shrinkWrapBlocks.html",function(e){expect(1),strictEqual(e,jQuery.support.shrinkWrapBlocks,"jQuery.support.shrinkWrapBlocks properties are the same")}),function(){var e,t=window.navigator.userAgent;/chrome/i.test(t)?e={checkOn:!0,optSelected:!0,optDisabled:!0,focusinBubbles:!1,reliableMarginRight:!0,noCloneChecked:!0,radioValue:!0,checkClone:!0,ajax:!0,cors:!0,clearCloneStyle:!0,boxSizing:!0,boxSizingReliable:!0,pixelPosition:!1}:/opera.*version\/12\.1/i.test(t)?e={checkOn:!0,optSelected:!0,optDisabled:!0,focusinBubbles:!1,reliableMarginRight:!0,noCloneChecked:!0,radioValue:!1,checkClone:!0,ajax:!0,cors:!0,clearCloneStyle:!0,boxSizing:!0,boxSizingReliable:!0,pixelPosition:!0}:/msie 10\.0/i.test(t)?e={checkOn:!0,optSelected:!1,optDisabled:!0,focusinBubbles:!0,reliableMarginRight:!0,noCloneChecked:!1,radioValue:!1,checkClone:!0,ajax:!0,cors:!0,clearCloneStyle:!1,boxSizing:!0,boxSizingReliable:!1,pixelPosition:!0}:/msie 9\.0/i.test(t)?e={checkOn:!0,optSelected:!1,optDisabled:!0,focusinBubbles:!0,reliableMarginRight:!0,noCloneChecked:!1,radioValue:!1,checkClone:!0,ajax:!0,cors:!1,clearCloneStyle:!1,boxSizing:!0,boxSizingReliable:!1,pixelPosition:!0}:/5\.1\.\d+ safari/i.test(t)?e={checkOn:!1,optSelected:!0,optDisabled:!0,focusinBubbles:!1,reliableMarginRight:!0,noCloneChecked:!0,radioValue:!0,checkClone:!1,ajax:!0,cors:!0,clearCloneStyle:!0,boxSizing:!0,boxSizingReliable:!0,pixelPosition:!1}:/firefox/i.test(t)&&(e={checkOn:!0,optSelected:!0,optDisabled:!0,focusinBubbles:!1,reliableMarginRight:!0,noCloneChecked:!0,radioValue:!0,checkClone:!0,ajax:!0,cors:!0,clearCloneStyle:!0,boxSizing:!0,boxSizingReliable:!1,pixelPosition:!0}),e&&test("Verify that the support tests resolve as expected per browser",function(){var t,n,r=0;for(n in jQuery.support)r++;expect(r);for(t in e)jQuery.ajax||t!=="ajax"&&t!=="cors"?equal(jQuery.support[t],e[t],"jQuery.support['"+t+"']: "+jQuery.support[t]+", expected['"+t+"']: "+e[t]):ok(!0,"no ajax; skipping jQuery.support['"+t+"']")})}(),typeof navigator!="undefined"&&(/ AppleWebKit\/\d.*? Version\/(\d+)/.exec(navigator.userAgent)||[])[1]<6||testIframeWithCallback("Check CSP (https://developer.mozilla.org/en-US/docs/Security/CSP) restrictions","support/csp.php",function(e){expect(1),deepEqual(jQuery.extend({},e),jQuery.support,"No violations of CSP polices")});