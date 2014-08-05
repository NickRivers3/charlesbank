$(window).load(function() {

	// Vars
	var loading = $("#loading").css({"display" : "none"});
	var start = $("#start").css({'display': 'block'});
	var splash = $("#splash");
	var play_again = $("#play-again");
	var skate = $("#skater");
	var left_brownstone = $("#left_brownstone");
	var right_brownstone = $("#right_brownstone");
	var windows = $("#windows");
	var greeting = $("#seasons-greetings");
	var sky = $("#sky");
	var ice_skater = $("#ice_skater");
	var footer = $("#footer");
	var snowman = $("#snowman");
	var street_light = $("#small_streetLight");
	var medium_tree = $("#medium_tree");
	var large_tree = $("#large_tree_cutoff");
	var snow_pile = $("#snow_pile");
	var street = $("#street");
	var skyline = $("#skyline");
	var snow = $("#snow");
	var water = $("#water");
	var timer = 1000;
	var audio = $("#music") [0];
	var sound = $("#sound") [0];

	
	start.click(function(){
		splash.css({"display" : "none"});
		build_the_card();
		 audio.play();
	});
	

	// Build It Functions
	function build_the_card() {
		
		water.animate({
			opacity : 1
		},2000, function() {
		 sound.play();
			skyline.animate({
				top : "20px",
				opacity : 1
			});
			snowFall();
			sky.css({'display': 'block'}).animate({
				opacity:1
			}, function(){
				sound.play();
				snow.delay(1000).animate({
					top:"350px"
				}, function(){
					sound.play();
					left_brownstone.delay(500).css({'display': 'block'}).animate({
						opacity: 1,
						left:"0px"
					});
					sound.play();
					right_brownstone.delay(500).css({'display': 'block'}).animate({
						opacity: 1,
						left:"178px"
					}, function(){
						sound.play();
						snow_pile.css({'display': 'block'});
						sound.play();
						windows.css({'display': 'block'});
						sound.play();
						medium_tree.delay(500).css({'display': 'block'}).animate({
							opacity: 1,
							top: "300px"
						}, function(){
						sound.play();
							large_tree.delay(500).css({'display': 'block'}).animate({
								opacity: 1,
								bottom:"0px"
							}, function(){
							sound.play();
								street_light.css({'display': 'block'}).animate({
									opacity:1,
									left: "350px"
								}, function(){
								sound.play();
									snowman.css({'display': 'block'}).animate({
										opacity:1,
										left: "-10px"
									}, function(){
										sound.play();
										ice_skater.css({'display': 'block'}).animate({
											opacity:1
										}, function(){
											sound.play();
											skate.css({'display': 'block'}).animate({
												opacity:1,
												left:"148px"
											},1000, function (){
												greeting.css({'display': 'block'}).animate({
													opacity:1,
													top:"10px"
												}, function(){
													sound.play();
													footer.css({'display': 'block'}).animate({
														opacity: 1,
														top:"502px"
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
		});
		
		
	}
	
	
	
	
	// Function Calls
	function call_functions() {
		skater();
		snowMan();
		player();
	}
	
	function snowFall() {
		// Start the timer
		window.setInterval(function(){
			fallingSnow();
		}, timer);
	}
	
	// Play Again
	play_again.click(function(){
		location.reload();
	});
		
	// Preload Images
	function preload(arrayOfImages) {
		$(arrayOfImages).each(function(){
			$('<img/>')[0].src = this;
		});
		
	}
	
	preload([
		'images/bg.png',
		'images/body.png',
		'images/brownstone.png',
		'images/hat.png',
		'images/head.png',
		'images/ice_skate_path.png',
		'images/ice_skater.png',
		'images/instructions.png',
		'images/large_tree_cutoff.png',
		'images/left_arm.png',
		'images/medium_tree.png',
		'images/moon.png',
		'images/nose.png',
		'images/play-again.png',
		'images/right_arm.png',
		'images/scarf.png',
		'images/seasons-greetings.png',
		'images/small_streetLight.png',
		'images/smile.png',
		'images/snow_pile.png',
		'images/snowflake1.png',
		'images/snowflake2.png',
		'images/snowflake3.png',
		'images/snowflake4.png',
		'images/spriteExample.png',
		'images/star.png',
		'images/stone.png',
		'images/stone_dark.png',
		'images/snow.png',
		'images/water.png',
		'images/skyline.png',
		'images/artwork/ali.jpg',
		'images/artwork/ben_jack.jpg',
		'images/artwork/claire.jpg',
		'images/artwork/emi.jpg',
		'images/artwork/hugh.jpg',
		'images/artwork/matt.jpg',
		'images/artwork/mia.jpg',
		'images/artwork/natalie.jpg',
		'images/artwork/nick.jpg',
		'images/artwork/sam.jpg',
		'images/artwork/sammi.jpg',
		'images/artwork/sean.jpg',
		'images/artwork/tatum.jpg',
		'images/artwork/zach.jpg'
	]);
	
	
	
});