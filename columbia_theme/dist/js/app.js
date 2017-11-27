(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
'use strict';
},{}]},{},[1])
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIm5vZGVfbW9kdWxlcy9icm93c2VyLXBhY2svX3ByZWx1ZGUuanMiLCJhcHAvYXNzZXRzL3NjcmlwdHMvYXBwLmpzIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiJBQUFBOzs7QUNBQSxRQUFRLEdBQVIsQ0FBWSxTQUFaO0FBQ0EsU0FBUyxnQkFBVCxDQUEwQixrQkFBMUIsRUFBOEMsWUFBWTtBQUN2RCxPQUFJLFNBQVMsU0FBUyxhQUFULENBQXVCLFlBQXZCLENBQWI7O0FBRUEsUUFBSyxNQUFMLEVBQWE7QUFDVixnQkFBVTtBQURBLElBQWI7QUFHRixDQU5EOztBQVFBLElBQUksT0FBTyxTQUFTLGFBQVQsQ0FBdUIsaUJBQXZCLENBQVg7O0FBRUEsSUFBSSxRQUFRLElBQUksT0FBSixDQUFhLElBQWIsRUFBbUI7QUFDN0IsaUJBQWMsYUFEZTtBQUU3QixnQkFBYSxhQUZnQjtBQUc3QixvQkFBaUIsSUFIWTtBQUk3QixXQUFPO0FBSnNCLENBQW5CLENBQVoiLCJmaWxlIjoiZ2VuZXJhdGVkLmpzIiwic291cmNlUm9vdCI6IiIsInNvdXJjZXNDb250ZW50IjpbIihmdW5jdGlvbiBlKHQsbixyKXtmdW5jdGlvbiBzKG8sdSl7aWYoIW5bb10pe2lmKCF0W29dKXt2YXIgYT10eXBlb2YgcmVxdWlyZT09XCJmdW5jdGlvblwiJiZyZXF1aXJlO2lmKCF1JiZhKXJldHVybiBhKG8sITApO2lmKGkpcmV0dXJuIGkobywhMCk7dmFyIGY9bmV3IEVycm9yKFwiQ2Fubm90IGZpbmQgbW9kdWxlICdcIitvK1wiJ1wiKTt0aHJvdyBmLmNvZGU9XCJNT0RVTEVfTk9UX0ZPVU5EXCIsZn12YXIgbD1uW29dPXtleHBvcnRzOnt9fTt0W29dWzBdLmNhbGwobC5leHBvcnRzLGZ1bmN0aW9uKGUpe3ZhciBuPXRbb11bMV1bZV07cmV0dXJuIHMobj9uOmUpfSxsLGwuZXhwb3J0cyxlLHQsbixyKX1yZXR1cm4gbltvXS5leHBvcnRzfXZhciBpPXR5cGVvZiByZXF1aXJlPT1cImZ1bmN0aW9uXCImJnJlcXVpcmU7Zm9yKHZhciBvPTA7bzxyLmxlbmd0aDtvKyspcyhyW29dKTtyZXR1cm4gc30pIiwiY29uc29sZS5sb2coJ0JvbmpvdXInKTtcbmRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoJ0RPTUNvbnRlbnRMb2FkZWQnLCBmdW5jdGlvbiAoKSB7XG4gICB2YXIgc2ltcGxlID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignLmpzX3NsaWRlcicpO1xuXG4gICBsb3J5KHNpbXBsZSwge1xuICAgICAgaW5maW5pdGU6IDFcbiAgIH0pO1xufSk7XG5cbnZhciBncmlkID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignLmdyaWRfX3RlbXBsYXRlJyk7XG5cbnZhciBtc25yeSA9IG5ldyBNYXNvbnJ5KCBncmlkLCB7XG4gIGl0ZW1TZWxlY3RvcjogJy5ncmlkX19pdGVtJyxcbiAgY29sdW1uV2lkdGg6ICcuZ3JpZF9faXRlbScsXG4gIHBlcmNlbnRQb3NpdGlvbjogdHJ1ZSxcbiAgZ3V0dGVyOjNcbn0pO1xuXG4iXX0=
function gridInit()
{
	var grid = document.querySelector('.grid__template');

	var msnry = new Masonry(grid, {
	   itemSelector: '.grid__item',
	   columnWidth: '.grid__item',
	   percentPosition: true,
	   gutter: 3
	});
}

gridInit()
