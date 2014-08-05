	
	
	
	// Build It Functions
	function build_the_card() {
	
		var skate = $("#skater");
		var left_brownstone = $("#left_brownstone");
		var right_brownstone = $("#right_brownstone");
		var windows = $("#windows");
		var greeting = $("#seasons-greetings");
		var sky = $("#sky");
		var ice_skater = $("#ice_skater");
		var footer = $("#footer");
		var snowman = $("#snowman");http://www.w3schools.com/html5/tryit.asp?filename=tryhtml5_audio_loop
		var street_light = $("#small_streetLight");
		var medium_tree = $("#medium_tree");
		var large_tree = $("#large_tree_cutoff");
		var snow_pile = $("#snow_pile");
		var street = $("#street");
		var skyline = $("#skyline");
		var snow = $("#snow");
		var water = $("#water");
	
	
		water.animate({
			opacity : 1
		},2000, function() {
			skyline.animate({
				top : "20px",
				opacity : 1
			});
			snowFall();
			sky.css({'display': 'block'}).animate({opacity:1});
			snow.delay(1000).animate({
				top:"350px"
			}, function(){
					left_brownstone.css({'display': 'block'}).animate({
						opacity: 1,
						left:"0px"
					});
					right_brownstone.css({'display': 'block'}).animate({
						opacity: 1,
						left:"178px"
					}, function(){
						snow_pile.css({'display': 'block'});
						windows.css({'display': 'block'});
						medium_tree.css({'display': 'block'}).animate({
							opacity: 1,
							top: "300px"
						}, function(){
							large_tree.css({'display': 'block'}).animate({
								opacity: 1,
								bottom:"0px"
							}, function(){
								street_light.css({'display': 'block'}).animate({
									opacity:1,
									left: "350px"
								}, function(){
									snowman.css({'display': 'block'}).animate({
										opacity:1,
										left: "-10px"
									}, function(){
										ice_skater.css({'display': 'block'}).animate({
											opacity:1
										}, function(){
											skate.css({'display': 'block'}).animate({
												opacity:1,
												left:"148px"
											},1000, function (){
												greeting.css({'display': 'block'}).animate({
													opacity:1,
													top:"10px"
												}, function(){
													footer.css({'display': 'block'}).animate({
														opacity: 1,
														top:"508px"
													});
													call_functions();
												});
											});
										});
									});
								});
							});
						});
					});
				
			});
		});
		
		
	}