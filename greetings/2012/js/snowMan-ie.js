function snowMan() {	
	// Variables
	var snowman = $("#snowman");
	var hat = $("#hat");
	var left_eye = $("#left_eye");
	var right_eye = $("#right_eye");
	var nose = $("#nose");
	var head = $("#head");
	var smile = $("#smile");
	var scarf = $("#scarf");
	var left_arm = $("#left_arm");
	var right_arm = $("#right_arm");
	var body = $("#body");
	var button_1 = $("#button_1");
	var button_2 = $("#button_2");
	var button_3 = $("#button_3");
	var button_4 = $("#button_4");

	// Build the SnowMan
	function build() {
		body.animate({
			top: "377px", 
			left:"416px"
		}, 800, "easeInBounce");
		head.delay(800).animate({
			top: "352px",
			left:"428px"
		}, 800, "easeInBounce");
		hat.delay(1000).animate({
			top: "333px",
			left:"425px"
		}, 800, "easeInBounce");
		scarf.delay(1200).animate({
			top: "376px",
			left:"431px"
		}, 800, "easeInBounce");
		left_arm.delay(1400).animate({
			top: "359px"
			, left:"413px"
		}, 800, "easeInBounce");
		right_arm.delay(1600).animate({
			top: "379px",
			left:"463px"
		}, 800, "easeInBounce");
		left_eye.delay(1700).animate({
			top: "363px",
			left:"436px"
		}, 800, "easeInBounce");
		right_eye.delay(1800).animate({
			top: "363px",
			left:"447px"
		}, 800, "easeInBounce");
		smile.delay(2000).animate({
			top: "366px",
			left:"435px"
		}, 800, "easeInBounce");
		nose.delay(2200).animate({
			top: "367px",
			left:"439px"
		}, 800, "easeInBounce");
		button_1.delay(2400).animate({
			top: "390px",
			left:"440px"
		}, 800, "easeInBounce");
		button_2.delay(2500).animate({
			top: "399px",
			left:"440px"
		}, 800, "easeInBounce");
		button_3.delay(2600).animate({
			top: "409px",
			left:"440px"
		}, 800, "easeInBounce");
		button_4.delay(2700).animate({
			top: "419px",
			left:"440px"
		}, 800, "easeInBounce");		
		
	}
	
	// Break the SnowMan
	function breakHim() {
		body.animate({
			top: "377px", 
			left:"440px"
		}, 100, "easeInBounce");
		head.delay(200).animate({
			top: "415px",
			left:"500px"
		}, 100, "easeInBounce");
		hat.delay(200).animate({
			top: "404px",
			left:"408px"
		}, 100, "easeInBounce");
		scarf.delay(200).animate({
			top: "446px",
			left:"474px"
		}, 100, "easeInBounce");
		left_arm.delay(200).animate({
			top: "435px", 
			left:"407px"
		}, 100, "easeInBounce");
		right_arm.delay(200).animate({
			top: "450px",
			left:"512px"
		}, 100, "easeInBounce");
		left_eye.delay(200).animate({
			top: "440px",
			left:"463px"
		}, 100, "easeInBounce");
		right_eye.delay(200).animate({
			top: "443px",
			left:"472px"
		}, 100, "easeInBounce");
		smile.delay(200).animate({
			top: "444px",
			left:"421px"
		}, 100, "easeInBounce");
		nose.delay(200).animate({
			top: "441px",
			left:"433px"
		}, 100, "easeInBounce");
		button_1.delay(200).animate({
			top: "449px",
			left:"449px"
		}, 100, "easeInBounce");
		button_2.delay(200).animate({
			top: "450px",
			left:"458px"
		}, 100, "easeInBounce");
		button_3.delay(200).animate({
			top: "450px",
			left:"468px"
		}, 100, "easeInBounce");
		button_4.delay(200).animate({
			top: "464px",
			left:"440px"
		}, 100, "easeInBounce");		
		
	}
	
	// Click Functions
	var count = 1;
	snowman.click(function(){
		count++;
		var isEven = function(someNumber) {
			return (someNumber % 2 ===0) ? true : false;
		};
		if (isEven(count) ===false) {
			build();
		}
		else {
			breakHim();
		}
	});
	
	
	// Animate Hat
	hat.delay(800).animate({
		top: "310px"
	},300, function () {
		hat.delay(100).animate({
			top:"333px"
		},300);
	
	});
	
}