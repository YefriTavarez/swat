//var car_dealer = {};

(function ($) {
	"use strict";
	$(function () {

		$('#acf-make .acf-taxonomy-field select').change(function(){
			var makeName = $(this).find('option:selected').text();

			$('#acf-model .acf-taxonomy-field option')
			// first, disable all options
			.attr('disabled','disabled')
			// activate the corresponding models
			.filter('[data-make="'+ $.trim( makeName ) +'"]').removeAttr('disabled')
			// remove previous value
			.parent().val('');
		});

		$('.relationship_list').bind('DOMSubtreeModified', function(){
			var ids = $('.relationship_right a').map(function(){return $(this).attr("data-post_id");}).get();

			if ( ids.length ) {
				$('#featured_vehicles').text( '[featured_vehicles ids="'+ ids.join(',') +'"]' );
			} else {
				$('#featured_vehicles').text( '[featured_vehicles]' );
			}
		});

	});
}(jQuery));