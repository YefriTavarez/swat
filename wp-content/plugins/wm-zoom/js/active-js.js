		jQuery(document).ready(function(){
			jQuery("#zoom_05").elevateZoom({
				  zoomType: "inner",
				  cursor: "crosshair"
			});
		});
		
		

		jQuery(document).ready(function(){
			jQuery("#zoom_02").elevateZoom({tint:true, tintColour:'#F90', tintOpacity:0.5});
		});


		jQuery(document).ready(function(){
			jQuery("#zoom_01").elevateZoom();
		});
		
		jQuery(document).ready(function(){
			jQuery("#zoom_07").elevateZoom({
			  zoomType				: "lens",
			  lensShape : "round",
			  lensSize    : 200
			});
		});
		
		jQuery(document).ready(function(){
			jQuery("#zoom_mw").elevateZoom({scrollZoom : true});
		});
		
		
		jQuery(document).ready(function(){
			//initiate the plugin and pass the id of the div containing gallery images
			jQuery("#img_01").elevateZoom({gallery:'gallery_01', cursor: 'pointer', galleryActiveClass: 'active', imageCrossfade: true,}); 

			//pass the images to Fancybox
			jQuery("#img_01").bind("click", function(e) {  
			  var ez =   jQuery('#img_01').data('elevateZoom');	
				jQuery.fancybox(ez.getGalleryList());
			  return false;
			});
		});
		