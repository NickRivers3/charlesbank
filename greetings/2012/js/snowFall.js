	// Snow Falling
	function fallingSnow() {
	
		// Varibles
		var images = ['snowflake1.png', 'snowflake2.png', 'snowflake3.png', 'snowflake4.png'];
		var snowflake = $('<div class="snowflakes"></div>'), degree = 0, spinTimer;
		var snowX = Math.floor(Math.random() * $('#wrapper').width());
        var snowSpd = Math.floor(Math.random() + 10000);

		// Set the background image of the snowflake to one of the three in the array
		snowflake.css({'background-image': 'url(images/' + images[Math.floor(Math.random() * images.length)] + ')'});
		
		// Add the snowflake to the snowZone
        $('#snowZone').prepend(snowflake);
		
		// Set the position of the snowflake
		snowflake.css({'left':snowX+'px', "top" :"-10px"});
		
		// Animate the falling snowflake
		snowflake.animate({
            top: "540px"
        }, snowSpd, function(){
            $(this).delay(750, function(){
				$(this).remove();
			});
        });
		
		// Call the spin function
		spin();
		
		// Spin function to add rotation to the snowflakes
		function spin() {
			snowflake.css({WebkitTransform: 'rotate(' + degree + 'deg)'});
			snowflake.css({'-moz-transform': 'rotate(' + degree + 'deg)'});
			snowflake.css({'-webkit-transform': 'rotate(' + degree + 'deg)'});
			snowflake.css({'-ms-transform': 'rotate(' + degree + 'deg)'});
			snowflake.css({'-o-transform': 'rotate(' + degree + 'deg)'});
			spinTimer = setTimeout(function() {
				++degree; spin();
			}, 100);
		}
	}