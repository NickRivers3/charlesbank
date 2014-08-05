/*
* jPreLoader - jQuery plugin
* Create a Loading Screen to preload images and content for you website
*
* Name:			jPreLoader.js
* Author:		Kenny Ooi - http://www.inwebson.com
* Date:			July 11, 2012		
* Version:		2.1
* Example:		http://www.inwebson.com/demo/jpreloader-v2/
*	
*/
(function(a){var f=[],h=[],k=function(){},g=0,b={splashVPos:"35%",loaderVPos:"75%",splashID:"#jpreContent",showSplash:!0,showPercentage:!0,autoClose:!0,closeBtnText:"Start!",onetimeLoad:!1,debugMode:!1,splashFunction:function(){}},n=function(a){if(b.onetimeLoad){var d=new Date;d.setDate(d.getDate()+a);a=null==a?"":"expires="+d.toUTCString();document.cookie="jpreLoader=loaded; "+a}},p=function(){jOverlay=a("<div></div>").attr("id","jpreOverlay").css({position:"fixed",top:0,left:0,width:"100%",height:"100%",
zIndex:9999999}).appendTo("body");if(b.showSplash){jContent=a("<div></div>").attr("id","jpreSlide").appendTo(jOverlay);var c=a(window).width()-a(jContent).width();a(jContent).css({position:"absolute",top:b.splashVPos,left:Math.round(50/a(window).width()*c)+"%"});a(jContent).html(a(b.splashID).wrap("<div/>").parent().html());a(b.splashID).remove();b.splashFunction()}jLoader=a("<div></div>").attr("id","jpreLoader").appendTo(jOverlay);c=a(window).width()-a(jLoader).width();a(jLoader).css({position:"absolute",
top:b.loaderVPos,left:Math.round(50/a(window).width()*c)+"%"});jBar=a("<div></div>").attr("id","jpreBar").css({width:"0%",height:"100%"}).appendTo(jLoader);b.showPercentage&&(jPer=a("<div></div>").attr("id","jprePercentage").css({position:"relative",height:"100%"}).appendTo(jLoader).html("Loading..."));b.autoclose||(jButton=a("<div></div>").attr("id","jpreButton").on("click",function(){l()}).css({position:"relative",height:"100%"}).appendTo(jLoader).text(b.closeBtnText).hide())},q=function(b){a(b).find("*:not(script)").each(function(){var b=
"";-1==a(this).css("background-image").indexOf("none")&&-1==a(this).css("background-image").indexOf("-gradient")?(b=a(this).css("background-image"),-1!=b.indexOf("url")&&(b=b.match(/url\((.*?)\)/)[1].replace(/\"/g,""))):"img"==a(this).get(0).nodeName.toLowerCase()&&"undefined"!=typeof a(this).attr("src")&&(b=a(this).attr("src"));0<b.length&&f.push(b)})},r=function(b){var d=new Image;a(d).load(function(){m()}).error(function(){h.push(a(this).attr("src"));m()}).attr("src",b)},m=function(){g++;var c=
Math.round(g/f.length*100);a(jBar).stop().animate({width:c+"%"},500,"linear");b.showPercentage&&a(jPer).text(c+"%");g>=f.length&&(g=f.length,n(),b.showPercentage&&a(jPer).text("100%"),b.debugMode&&s(),a(jBar).stop().animate({width:"100%"},500,"linear",function(){b.autoClose?l():a(jButton).fadeIn(1E3)}))},l=function(){a(jOverlay).fadeOut(800,function(){a(jOverlay).remove();k()})},s=function(){if(0<h.length){for(var a=0;a<h.length;a++);return!0}return!1};a.fn.jpreLoader=function(c,d){c&&a.extend(b,
c);"function"==typeof d&&(k=d);a("body").css({display:"block"});return this.each(function(){var e;a:{if(b.onetimeLoad){e=document.cookie.split("; ");for(var c=0,d;d=e[c]&&e[c].split("=");c++)if("jpreLoader"===d.shift()){e=d.join("=");break a}}e=!1}if(e)a(b.splashID).remove(),k();else for(p(),q(this),e=0;e<f.length;e++)r(f[e])})}})(jQuery);