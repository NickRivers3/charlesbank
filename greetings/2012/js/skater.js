	// Skater
	function skater() {
		var skater = $("#skater");
		
		function doSkate() {
			skater.animate({
				crSpline: $.crSpline.buildSequence([
					[148, 111],
					[135, 125],
					[124, 126],
					[111, 119],
					[43, 82],
					[3, 80],
					[-29, 85],
					[-46, 95]
				])
			},5000, function(){
			skater.addClass('skater-switch');
			});
			skater.animate({
				crSpline: $.crSpline.buildSequence([
					[-45, 108],
					[-22, 110],
					[7, 104],
					[58, 91],
					[109, 88],
					[140, 111]
				])
			},4000, function(){
				skater.removeClass('skater-switch');
				doSkate();
			});
			
		}
		doSkate();

	}