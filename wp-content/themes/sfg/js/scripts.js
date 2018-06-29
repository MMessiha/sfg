/**
 * File scripts.js
 *
 * Custom scripts
 */

jQuery(document).ready(function($){

	jQuery('.carousel-showmanymoveone .item').each(function(){
		var itemToClone = $(this);

		for (var i=1;i<4;i++) {
			itemToClone = itemToClone.next();

		if (!itemToClone.length) {
			itemToClone = $(this).siblings(':first');
		}

		itemToClone.children(':first-child').clone()
			.addClass("cloneditem-"+(i))
			.appendTo($(this));
		}
	});

	jQuery('.carousel-showmanymoveone-1 .item').each(function(){
		var itemToClone = $(this);

		for (var i=1;i<2;i++) {
			itemToClone = itemToClone.next();

		if (!itemToClone.length) {
			itemToClone = $(this).siblings(':first');
		}

		itemToClone.children(':first-child').clone()
			.addClass("cloneditem-"+(i))
			.appendTo($(this));
		}
	});

	jQuery(document).ready(function( $ ) {
		$('.count').counterUp({
			delay: 1, // the delay time in ms
			time: 1500 // the speed time in ms
		});


		$(".profile").each(function(){
			var profile = $(this).attr('profile');
			$(this).click(function(){
				$("#show-"+profile).toggle( "slow" );
			})
		})
	});  
});