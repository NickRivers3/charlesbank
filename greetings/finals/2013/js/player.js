	
	function player () {
		var candle = $(".window button");
		var player_container = $("#player_container");
		var player = $("#player");
		var slide_container = $("#slide_container");
		var close = $("#close button");
		
		var one = $("#one button");
		var two = $("#two button");
		var three = $("#three button");
		var four = $("#four button");
		var five = $("#five button");
		var six = $("#six button");
		var seven = $("#seven button");
		var eight = $("#eight button");
		var nine = $("#nine button");
		var ten = $("#ten button");
		var eleven = $("#eleven button");
		var twelve = $("#twelve button");
		var thirteen = $("#thirteen button");
		var fourteen = $("#fourteen button");

	
		// Add the class when the candle lights up.
		candle.click(function(){
			$(this).addClass('light-up');
			player_container.css({'display': 'block'}).animate({
				opacity:1
			});
		});
		
		// Individual Window clicks
		one.click(function(){slide_container.css({top : "0px"});});
		two.click(function(){slide_container.css({top : "-300px"});});
		three.click(function(){slide_container.css({top : "-600px"});});
		four.click(function(){slide_container.css({top : "-900px"});});
		five.click(function(){slide_container.css({top : "-1200px"});});
		six.click(function(){slide_container.css({top : "-1500px"});});
		seven.click(function(){slide_container.css({top : "-1800px"});});
		eight.click(function(){slide_container.css({top : "-2100px"});});
		nine.click(function(){slide_container.css({top : "-2400px"});});
		ten.click(function(){slide_container.css({top : "-2700px"});});
		eleven.click(function(){slide_container.css({top : "-3000px"});});
		twelve.click(function(){slide_container.css({top : "-3300px"});});
		thirteen.click(function(){slide_container.css({top : "-3600px"});});
		fourteen.click(function(){slide_container.css({top : "-3900px"});});
		
		// Close
		close.click(function(){
			player_container.animate({opacity:0}).css({'display':'none'});
		});

	}