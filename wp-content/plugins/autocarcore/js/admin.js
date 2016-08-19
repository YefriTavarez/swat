jQuery(document).ready(function($) {
	"use strict";
	
	var ajaxurl = ajaxobject.ajaxurl;
	
	jQuery('.autocar-select-sidebar').click(function(){
		jQuery('.autocar-select-sidebar').find('input').removeAttr('checked');
		jQuery('.autocar-select-sidebar').removeClass('autocar_chooseborder');
		jQuery(this).find('input').attr('checked','checked');
		jQuery(this).addClass('autocar_chooseborder');
	});
	
	$('#autocar_schedulebtn').click(function(){
		var obj = $(this);
		obj.next().fadeIn('slow');
		var schedule = $('#autocar_testschedule').val();
		$.ajax({
			url: ajaxurl,
			type: 'post',
			data: {	'action' : 'autocarcore_schedule', 'testschedule' : schedule },
			success: function( result ) {
				obj.next().next().html('Save Successfully');
				obj.next().fadeOut('slow');
			}
		});
	});
	
	$('.autocar_schedule_done').click(function(){
		var obj = $(this);
		var status = $(this).attr('data-status');
		$.ajax({
			url: ajaxurl,
			type: 'post',
			data: {	'action' : 'autocarcore_schedule_done','id' : $(this).attr('data-id'), 'status' : status },
			success: function( result ) {
				if(result == '1'){
					if(status == 1)
						obj.text('Not Done');
					else
						obj.text('Done');
				}
			}
		});
	});
	
	
});