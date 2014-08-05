jQuery(document).ready(function($) {
	// Fade in Content
	//$('#main-content').delay(400).fadeIn(500);
	
	// Main Menu
	$('#main-menu li.menu-item').hover(
		function () {
			//show its submenu
			$('ul', this).stop(true, true).slideDown(300);

		}, 
		function () {
			//hide its submenu
			$('ul', this).stop(true, true).delay(100).slideUp(165);			
		}
	);
	
	// View Backround Image
	$('.hide-content').hover(
		function () {
			//show its submenu
			$('#site-wrapper').stop(true, true).css('visibility', 'hidden');

		}, 
		function () {
			//hide its submenu
			$('#site-wrapper').stop(true, true).delay(100).css('visibility', 'visible');
		}
	);
	$('.hide-content').toggle(
		function () {
			//show its submenu
			$('#site-wrapper').stop(true, true).css('visibility', 'hidden');

		}, 
		function () {
			//hide its submenu
			$('#site-wrapper').stop(true, true).delay(100).css('visibility', 'visible');
		}
	);
	
	// Investment Team Toggle
	$('#investement-team img',this).hover(
		function () {
		//fade grid
			$(this).removeClass('grid-roll').addClass('grid-roll-on');
			$('#investement-team').addClass('hatch'); 
			$('.grid-roll').stop(true, true).fadeTo(50, 0.50);
			$('#menu-investment-team li').removeClass('showMenuItem');
			var classStr = $(this).attr('class');
			firstClass = classStr.split(' ')[0];
			$('#menu-investment-team li.' + firstClass).addClass('showMenuItem');
			$('#investement-team img').removeClass('showMember');
		}, 
		function () {
			//unfade grid
			$(this).removeClass('grid-roll-on').addClass('grid-roll');
			$('.grid-roll').stop(true, true).delay(100).fadeTo(140, 1.0);
			$('#investement-team img').removeClass('showMember');
			$('#menu-investment-team li').removeClass('showMenuItem');
		}
	);
	$('#menu-investment-team li',this).not('.parent').hover(
		function () {
			$('#investement-team img').removeClass('showMember');
			var classStr = $(this).attr('class');
			lastClass = classStr.substr( classStr.lastIndexOf(' ') + 1);
			$('#investement-team img.' + lastClass).addClass('showMember');
			$('#investement-team').addClass('hatch'); 
			$('.grid-roll').stop(true, true).fadeTo(50, 0.50);
		}, 
		function () {
			$('#investement-team img').removeClass('showMember');
			$('#menu-investment-team li').removeClass('showMenuItem');
			$('.grid-roll').stop(true, true).delay(100).fadeTo(140, 1.0);
		}
	);
	$('#investement-team, #menu-investment-team').mouseleave(
		function () {
			$('#investement-team').removeClass('hatch');  
		}
	);
	
	// Operations Team Toggle
	$('#operations-team img',this).hover(
		function () {
		//fade grid
			$(this).removeClass('grid-roll').addClass('grid-roll-on');
			$('#operations-team').addClass('hatch'); 
			$('.grid-roll').stop(true, true).fadeTo(50, 0.50);
			$('#menu-operations-team li').removeClass('showMenuItem');
			var classStr = $(this).attr('class');
			firstClass = classStr.split(' ')[0];
			$('#menu-operations-team li.' + firstClass).addClass('showMenuItem');
			$('#investement-team img').removeClass('showMember');
		}, 
		function () {
			//unfade grid
			$(this).removeClass('grid-roll-on').addClass('grid-roll');
			$('.grid-roll').stop(true, true).delay(100).fadeTo(140, 1.0);
			$('#operations-team img').removeClass('showMember');
			$('#menu-operations-team li').removeClass('showMenuItem');
		}
	);
	$('#menu-operations-team li',this).not('.parent').hover(
		function () {
			$('#operations-team img').removeClass('showMember');
			var classStr = $(this).attr('class');
			lastClass = classStr.substr( classStr.lastIndexOf(' ') + 1);
			$('#operations-team img.' + lastClass).addClass('showMember');
			$('#operations-team').addClass('hatch'); 
			$('.grid-roll').stop(true, true).fadeTo(50, 0.50);
		}, 
		function () {
			$('#operations-team img').removeClass('showMember');
			$('#menu-operations-team li').removeClass('showMenuItem');
			$('.grid-roll').stop(true, true).delay(100).fadeTo(140, 1.0);
		}
	);
	$('#operations-team, #menu-operations-team').mouseleave(
		function () {
			$('#operations-team').removeClass('hatch');  
		}
	);
	
});
