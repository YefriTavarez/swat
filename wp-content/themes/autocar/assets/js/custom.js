(function($, window, undefined) {

	"use strict";

	jQuery(document).ready(function ($) {


		var ajaxurl = ajaxobject.ajaxurl;
		
		$(document).on('scroll', function () {
		    // if the scroll distance is greater than 100px
		    if ($(window).scrollTop() > 40) {
		      // do something
		    	$('.site-header').addClass('scrolled-header');
		    }
		    else {
		    	$('.site-header').removeClass('scrolled-header');
		    }
		});

		// Accordion script
		function close_accordion_section() {
        $('.accordion .accordion-section-title').removeClass('active');
        $('.accordion .accordion-section-content').slideUp(300).removeClass('open');
	    }
	 
	    $('.accordion-section-title').click(function(e) {
	        // Grab current anchor value
	        var currentAttrValue = $(this).attr('href');
	 
	        if($(e.target).is('.active')) {
	            close_accordion_section();
	        }else {
	            close_accordion_section();
	 
	            // Add active class to section title
	            $(this).addClass('active');
	            // Open up the hidden content panel
	            $('.accordion ' + currentAttrValue).slideDown(300).addClass('open'); 
	        }
	 
	        e.preventDefault();
	    });
	    jQuery('.tabs .tab-links a').on('click', function(e)  {
	        var currentAttrValue = jQuery(this).attr('href');
	 
	        // Show/Hide Tabs
	        jQuery('.tabs ' + currentAttrValue).fadeIn(500).siblings().hide();;
	 
	        // Change/remove current tab to active
	        jQuery(this).parent('li').addClass('active').siblings().removeClass('active');
	 
	        e.preventDefault();
	    });


		// Animation on scroll 
		new WOW().init();


		// Portfolio Isotope Filter

		// init Isotope
		var portfolioGrid = $('#portfolio-grid');

		portfolioGrid.imagesLoaded(function(){
		    portfolioGrid.isotope({
			    itemSelector: '.item',
			    layoutMode: 'fitRows',
			    "masonry": { "columnWidth": ".portfolio-grid-sizer" }
			});
		});

      	// filter functions
		var filterFns = {
		    // show if number is greater than 50
		    numberGreaterThan50: function() {
		      var number = $(this).find('.number').text();
		      return parseInt( number, 10 ) > 50;
		    },
		    // show if name ends with -ium
		    ium: function() {
		      var name = $(this).find('.name').text();
		      return name.match( /ium$/ );
		    }
		};

      	// bind filter button click
      	$('#projects-filter').on( 'click', 'a', function() {
		    var filterValue = $( this ).attr('data-filter');
		    // use filterFn if matches value
		    filterValue = filterFns[ filterValue ] || filterValue;
		    portfolioGrid.isotope({ filter: filterValue });
		    return false;
		});

      	// change is-checked class on buttons
		$('#projects-filter').each( function( i, buttonGroup ) {
	    	var $buttonGroup = $( buttonGroup );
	    	$buttonGroup.on( 'click', 'a', function() {
	      		$buttonGroup.find('.active').removeClass('active');
	      		$( this ).addClass('active');
	    	});
	  	});


		// Owl Carouse Testimonials   

		 var owl = $("#owl-demo");
 
		  owl.owlCarousel({
      		 
      		pagination : true,
    		paginationNumbers: false,
      		autoPlay: 5000, //Set AutoPlay to 5 seconds
		    items : 1, //10 items above 1000px browser width
		    itemsDesktop : [1000,1], //5 items between 1000px and 901px
		    itemsDesktopSmall : [900,1], // betweem 900px and 601px
		    itemsTablet: [600,1], //2 items between 600 and 0
		    itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
		  });

		  var owl = $("#owl-blog");
 
		  owl.owlCarousel({

		  	  pagination: false,
		  	  autoPlay: true, //Set AutoPlay to 3 seconds
		      items : 4, //10 items above 1000px browser width
		      itemsDesktop : [1000,4], //5 items between 1000px and 901px
		      itemsDesktopSmall : [900,2], // betweem 900px and 601px
		      itemsTablet: [600,2], //2 items between 600 and 0
		      itemsMobile : [480,1] // itemsMobile disabled - inherit from itemsTablet option
		  });

		  var owl = $("#owl-similar");
 
		  owl.owlCarousel({
      		
      		pagination : false,
    		paginationNumbers: false,
      		autoPlay: 5000, //Set AutoPlay to 5 seconds
		    items : 4, //10 items above 1000px browser width
		    itemsDesktop : [1000,3], //5 items between 1000px and 901px
		    itemsDesktopSmall : [900,2], // betweem 900px and 601px
		    itemsTablet: [600,1], //2 items between 600 and 0
		    itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
		  });

		  var owl = $("#owl-clients");
 
		  owl.owlCarousel({

		  	  pagination: true,
		  	  autoPlay: 3000, //Set AutoPlay to 3 seconds
		      items : 6, //10 items above 1000px browser width
		      itemsDesktop : [1000,4], //5 items between 1000px and 901px
		      itemsDesktopSmall : [900,3], // betweem 900px and 601px
		      itemsTablet: [600,2], //2 items between 600 and 0
		      itemsMobile : [480,1]// itemsMobile disabled - inherit from itemsTablet option
		  });
		 
		  // Custom Navigation Events
		  $(".next").on('click' ,function(){
		    owl.trigger('owl.next'); 
		  })
		  $(".prev").on('click' ,function(){
		    owl.trigger('owl.prev');
		  })
		  $(".play").on('click', function(){
		    owl.trigger('owl.play',1000); //owl.play event accept autoPlay speed as second parameter
		  })
		  $(".stop").on('click', function(){
		    owl.trigger('owl.stop');
		  })


		// Flex Slider 
		$(window).load(function() {
		  // The slider being synced must be initialized first
		  $('#car-carousel').flexslider({
		    animation: "slide",
		    controlNav: false,
		    directionNav: true,   
		    animationLoop: false,
		    slideshow: false,
		    itemWidth: 115,
		    itemMargin: 4,
		    asNavFor: '#car-flexslider'
		  });
		 
		 
		 //car carousel thumbnail
		  $('#car-flexslider').flexslider({
		    animation: "slide",
		    controlNav: false,
		    directionNav: false,
		    animationLoop: false,
		    slideshow: false,
		    sync: "car-carousel"
		  });
		  
		  
		  
		  
	   // $('#car-carousel').flexslider({
			// animation: "slide",
			// controlNav: true,
			// animationLoop: false,
			// slideshow: false,
			// sync: "#carousel"
           // });
		});
		//car carousel thumbnail
		
		// slick slider
		
		 $('.slider-for').slick({
		  slidesToShow: 1,
		  slidesToScroll: 1,
		  arrows: false,
		  fade: true,
		  infinite: true,
		  asNavFor: '.slider-nav'
		});
		$('.slider-nav').slick({
		  slidesToShow: 4,
		  slidesToScroll: 1,
		  asNavFor: '.slider-for',
		  dots: false,
		  Autoplay: true,
		  centerMode: false,
		  arrows: false,
		  focusOnSelect: true,
		  infinite: true,
		responsive: [
		{
		  breakpoint: 992,
		  settings: {
			slidesToShow: 4,
			slidesToScroll: 1,
			infinite: true,
			dots: false
		  }
		},
		{
		  breakpoint: 600,
		  settings: {
			slidesToShow: 2,
			slidesToScroll: 1
		  }
		},
		{
		  breakpoint: 480,
		  settings: {
			slidesToShow: 3,
			slidesToScroll: 1
		  }
		}
		]
		});
		
	  	$(window).load(function() {
	 		 $('.futured-post').flexslider({
	    		animation: "slide",
	    		controlNav: true,         
				directionNav: false, 
				slideshow: true,
				slideshowSpeed: 5000,            
	  		});
		});



		// Submenu Show/Hide
        // $('nav.main-navigation ul > li, nav.main-navigation ul > li > ul > li').hover(function () {
        //     $(this).children('ul').stop(true, true).slideDown(200);
        // }, function () {
        //     $(this).children('ul').stop(true, true).slideUp(200);
        // });
		
		$.each($('.menu-item').has('.sub-menu'), function() {
			$(this).find('a').addClass('has-submenu');
			$(".sub-menu").find('a').removeClass('has-submenu');
			//$( '.menu-item a' ).addClass('has-submenu');
			//alert("fcsadf");
		});
		
		
		$('nav.main-navigation > ul > li').each(function(){
			$(this).find('.has-submenu').append('<i class="fa fa-angle-down"></i>');
		});



        // Blog Masonry
        var blogIsotope=function(){
            var imgLoad = imagesLoaded($('.blog-isotope'));
		   
            imgLoad.on('done',function(){

                $('.blog-isotope').isotope({
                    "itemSelector": ".blog-post",
                });
               
            })
           
           imgLoad.on('fail',function(){

                $('.blog-isotope').isotope({
                    "itemSelector": ".blog-post",
                });

           })  
           
        }
                   
        blogIsotope();

		//search on click  
		$(".dc_search_icon").click(function(e){
			$(".ac_search_form").toggleClass('open_form');
			e.preventdefault();
		});  

        // Flickr Images
        $('.flickr-images').jflickrfeed({
			limit: 6 ,
			qstrings: {id: '23199621@N02'},
			itemTemplate: '<li class="small-thumb"><a href="{{link}}" title="{{title}}"><img src="{{image_s}}" alt="{{title}}" /></a></li>'
		});



		// Off Canvas Navigation
		var offcanvas_open = false;
		var offcanvas_from_left = false;

		function offcanvas_right() {
			
			$(".sidebar-menu-container").addClass("slide-from-left");
			$(".sidebar-menu-container").addClass("sidebar-menu-open");		
			
			offcanvas_open = true;
			offcanvas_from_left = true;
			
			$(".sidebar-menu").addClass("open");
			$("body").addClass("offcanvas_open offcanvas_from_left");

			$(".nano").nanoScroller();
			
		}

		function offcanvas_close() {
			if (offcanvas_open === true) {
					
				$(".sidebar-menu-container").removeClass("slide-from-left");
				$(".sidebar-menu-container").removeClass("sidebar-menu-open");
				
				offcanvas_open = false;
				offcanvas_from_left = false;
				
				//$('#sidebar-menu-container').css('max-height', 'inherit');
				$(".sidebar-menu").removeClass("open");
				$("body").removeClass("offcanvas_open offcanvas_from_left");

			}
		}

		$(".side-menu-button").on('click', function() {
			offcanvas_right();
		});

		$("#sidebar-menu-container").on("click", ".sidebar-menu-overlay", function(e) {
			offcanvas_close();
		});

		$(".sidebar-menu-overlay").swipe({
			swipeLeft:function(event, direction, distance, duration, fingerCount) {
				offcanvas_close();
			},
			swipeRight:function(event, direction, distance, duration, fingerCount) {
				offcanvas_close();
			},
			tap:function(event, direction, distance, duration, fingerCount) {
				offcanvas_close();
			},
			threshold:0
		});


		// Mobile navigation
		$(".responsive-menu .menu-item-has-children").append('<div class="show-submenu"><i class="fa fa-angle-down"></i></div>');

	    $(".responsive-menu").on("click", ".show-submenu", function(e) {
			e.stopPropagation();
			
			$(this).parent().toggleClass("current")
							.children(".sub-menu").toggleClass("open");
							
			$(this).html($(this).html() == '<i class="fa fa-angle-down"></i>' ? '<i class="fa fa-angle-up"></i>' : '<i class="fa fa-angle-down"></i>');
			$(".nano").nanoScroller();
		});

		$(".responsive-menu").on("click", "a", function(e) {
			if( ($(this).attr('href') === "#") || ($(this).attr('href') === "") ) {
				$(this).parent().children(".show-submenu").trigger("click");
				return false;
			} else {
				offcanvas_close();
			}
		});

		//  go to top
      	var offset = 300,
		//browser window scroll (in pixels) after which the "back to top" link opacity is reduced
		offset_opacity = 1200,
		//duration of the top scrolling animation (in ms)
		scroll_top_duration = 700,
		//grab the "back to top" link
		$back_to_top = $('.go-top');

		//hide or show the "back to top" link
		$(window).on('scroll', function(){
			( $(this).scrollTop() > offset ) ? $back_to_top.addClass('go-top-visible') : $back_to_top.removeClass('go-top-visible go-top-fade-out');
			if( $(this).scrollTop() > offset_opacity ) { 
				$back_to_top.addClass('go-top-fade-out');
			}
		});

		//smooth scroll to top
		$back_to_top.on('click', function(event){
			event.preventDefault();
			$('body,html').animate({
				scrollTop: 0 ,
			 	}, scroll_top_duration
			);
		});
		
		$('.autocar_schedule').click(function(){
			var title = $(this).attr('data-title');
			$('.autocar_schedule_form .ac_popup_heading').html('<h1>Test Drive Schedule</h1><h5>'+title+'</h5>');
			$('.autocar_schdule_title').val(title);
			$( "#autocar_schedule_dialog" ).fadeIn();
		});
		
		$('.autocar_schedule_close').click(function(){
			$( "#autocar_schedule_dialog" ).fadeOut();
		});
		
		if($('.autocar_date_timepicker').length){
			$('.autocar_date_timepicker').datetimepicker({
				dateFormat:'Y.m.d',
				formatTime:'H:i',
			});
		}
		
		$('#autocar_schedule_request').submit(function(e){
			e.preventDefault();
			var obj = $(this);
			$(this).find('.ac_form_submit').html('Send<i class="fa fa-refresh fa-spin"></i>');
			var data = $(this).serialize();
			data += '&action=autocar_scheduled';
			$.ajax({
				url: ajaxurl,
				type: 'post',
				data: data,
				success: function( result ) {
					obj.find('.ac_form_submit').html('Send');
					obj.parent().parent().prev().click();
				}
			});
		});
		
		function compare_Add(){
			var obj = $(this);
			if(obj.attr('data-aicon') == 'true'){
				$('.recent_car_wrapper').css({'cursor':'wait'});
			}else{
				obj.append('<i class="fa fa-spinner fa-pulse"></i>');
			}
			var id = $(this).attr('data-carId');
			var data = 'carId='+id;
			data += '&action=autocar_compare';
			$.ajax({
				url: ajaxurl,
				type: 'post',
				data: data,
				success: function( result ) {
					var res = jQuery.parseJSON(result);
					$('.autocar_notify').html('<p><i class="fa fa-car"></i>'+res.message+'</p>');
					$( "#autocar_compare_notification" ).slideDown('fast',function(){
						setTimeout(function(){ $( "#autocar_compare_notification" ).hide(); }, 5000);
					});
					
					if(obj.attr('data-aicon') == 'true'){
						$('.recent_car_wrapper').css({'cursor':'default'});
						var r = '<i class="fa fa-times" aria-hidden="true"></i>';
						var a = '<i class="fa fa-tachometer"></i>';
					}else{
						var r = 'Remove from list';
						var a = 'Add to compare';
					}
					
					if(res.success){
						obj.html(r);
						obj.addClass('autocar_remove_car');
						obj.removeClass('autocar_added_car');//$('.autocar_remove_car').click(compare_Remove);		
					}else{
						obj.html(a);
					}
				}
			});
		}
		
		function compare_Remove(){
			var obj = $(this);
			if(obj.attr('data-aicon') == 'true'){
				$('.recent_car_wrapper').css({'cursor':'wait'});
			}else{
				obj.append('<i class="fa fa-spinner fa-pulse"></i>');
			}
			var id = $(this).attr('data-carId');
			var data = 'carId='+id;
			data += '&action=autocar_remove_compare';
			$.ajax({
				url: ajaxurl,
				type: 'post',
				data: data,
				success: function( result ) {
					var res = jQuery.parseJSON(result);
					$('.autocar_notify').html('<p><i class="fa fa-car"></i>'+res.message+'</p>');
					$( "#autocar_compare_notification" ).slideDown('fast',function(){
						setTimeout(function(){ $( "#autocar_compare_notification" ).hide(); }, 5000);
					});
					
					if(obj.attr('data-aicon') == 'true'){
						$('.recent_car_wrapper').css({'cursor':'default'});
						var r = '<i class="fa fa-times" aria-hidden="true"></i>';
						var a = '<i class="fa fa-tachometer"></i>';
					}else{
						var r = 'Remove from list';
						var a = 'Add to compare';
					}
					
					if(res.success){
						obj.html(a);
						obj.addClass('autocar_added_car');
						obj.removeClass('autocar_remove_car');
						//$('.autocar_added_car').click(compare_Add);
					}else{
						obj.html(r);
					}
				}
			});
		}
		
		$(document).on('click','.autocar_added_car',compare_Add);
		
		$(document).on('click','.autocar_remove_car',compare_Remove);
		
		$('.autocar_remove_comparecar').click(function(){
			var obj = $(this);
			obj.append('<i class="fa fa-spinner fa-pulse"></i>');
			var id = $(this).attr('data-carId');
			var data = 'carId='+id;
			data += '&action=autocar_remove_compare';
			$.ajax({
				url: ajaxurl,
				type: 'post',
				data: data,
				success: function( result ) {
					var res = jQuery.parseJSON(result);
					if(res.success){
						obj.parent().parent().parent().parent().parent().parent('.autocar_slideremove').toggle('slide');
						$('.autocar_compare_addnewitemsec').append(res.html);
					}					
				}
			});
		});
		
		/* var r = $("#autocarcore-slider-range").slider({
			formatter: function(value) {
				var str = value;
				var range = str.toString().split(",");
				$('#autocarcore_price_min').val(range[0]);
				$('#autocarcore_price_max').val(range[1]);
				return range[0] + ' : ' + range[1];
			}
		}); */
		
		if($("#autocarcore-slider-range").length){
			var r = $("#autocarcore-slider-range").slider({}).on("slide", function(slideEvt) {
				$('#autocarcore_price_min').val(slideEvt.value[0]);
				$('#autocarcore_price_max').val(slideEvt.value[1]);
			});
		}

		//switcher
		var theme_url = $('input[name=atc_template_url]').val();

	
		$(".color8" ).click(function(){
			$("#autocar-colorchange-css" ).prop("href", theme_url+"/assets/css/colors/yellow.css" );
			return false;
		}); 
		
		$(".color1" ).click(function(){
			$("#autocar-colorchange-css" ).prop("href", theme_url+"/assets/css/colors/orange.css" );
			return false;
		});
		
		$(".color2" ).click(function(){
			$("#autocar-colorchange-css" ).attr("href", theme_url+"/assets/css/colors/blue.css" );
			return false;
		});
		
		$(".color3" ).click(function(){
			$("#autocar-colorchange-css" ).attr("href", theme_url+"/assets/css/colors/alizarin.css" );
			return false;
		});

		$(".color4" ).click(function(){
			$("#autocar-colorchange-css" ).attr("href", theme_url+"/assets/css/colors/cinnabar.css" );
			return false;
		});

		$(".color5" ).click(function(){
			$("#autocar-colorchange-css" ).attr("href", theme_url+"/assets/css/colors/purple.css" );
			return false;
		});
				
		$(".color6" ).click(function(){
			$("#autocar-colorchange-css" ).attr("href", theme_url+"/assets/css/colors/mongoose.css" );
			return false;
		});
		
		$(".color7" ).click(function(){
			$("#autocar-colorchange-css" ).attr("href", theme_url+"/assets/css/colors/mantis.css" );
			return false;
		});

			

		$("#style-switcher h2 a").click(function(e){
			e.preventDefault();
			var div = $("#style-switcher");
			console.log(div.css("left"));
			if (div.css("left") === "-185px") {
				$("#style-switcher").animate({
					left: "0px"
				}); 
			} else {
				$("#style-switcher").animate({
					left: "-185px"
				});
			}
		})
		
		
	});

})(jQuery, window);
