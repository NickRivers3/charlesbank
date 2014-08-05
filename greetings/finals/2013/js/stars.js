	// Stars
	function stars() {
	
		var star = $(".star");
		var randomStar = Math.round(Math.random()*45);
		
		star.eq(randomStar).animate({
			opacity : 0.4
		},300).animate({
			opacity : 1
		},300);

	}