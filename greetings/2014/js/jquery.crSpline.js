/**
 * jQuery.crSpline v0.0.2
 * http://github.com/MmmCurry/jquery.crSpline
 *
 * Supports animation along Catmull-Rom splines based on a series of waypoints.
 * Usage: See demo.js, demo.html
 * 
 * Copyright 2010, M. Ian Graham
 * MIT License
 *
 */

(function(f){f.crSpline={};var g=function(a,c,b,d,e){return Math.floor((a*((2-a)*a-1)*c+(a*a*(3*a-5)+2)*b+a*((4-3*a)*a+1)*d+(a-1)*a*a*e)/2)},h=function(a,c){return[c[0]+(c[0]-a[0]),c[1]+(c[1]-a[1])]};f.crSpline.buildSequence=function(a){var c={},b=[],d;if(2>a.length)throw"crSpline.buildSequence requires at least two points";b.push(h(a[1],a[0]));for(var e=0;e<a.length;e++)b.push(a[e]);b.push(h(b[b.length-2],b[b.length-1]));d=b.length-3;c.getPos=function(a){var c=Math.floor(a*d);if(c===d)return{left:b[b.length-
2][0],top:b[b.length-2][1]};a=(a-c/d)*d;return{left:g(a,b[c][0],b[c+1][0],b[c+2][0],b[c+3][0])+"px",top:g(a,b[c][1],b[c+1][1],b[c+2][1],b[c+3][1])+"px"}};return c};f.fx.step.crSpline=function(a){var c=a.end.getPos(a.pos),b;for(b in c)a.elem.style[b]=c[b]}})(jQuery);