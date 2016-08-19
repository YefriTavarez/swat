<?php
add_action( 'vc_before_init', 'autocar_shortcodes_vcmap' );
function autocar_shortcodes_vcmap(){
	
	vc_map( array(
		"name" => __("Autocar Service", "autocar"),
		"base" => "autocar_service",
		"class" => "",
		"category" => __( "Autocar Shortcodes", "autocar"),
		"as_parent" => array('only' => 'single_service'),
		"content_element" => true,
		"show_settings_on_create" => false,
		"is_container" => true,
		'admin_enqueue_js' => array(get_template_directory_uri().'/vc_extend/bartag.js'),
		'admin_enqueue_css' => array(get_template_directory_uri().'/vc_extend/bartag.css'),
		"js_view" => 'VcColumnView'
	) );
	
	vc_map( array(
		"name" => __("Single Service", "autocar"),
		"base" => "single_service",
		"content_element" => true,
		"as_child" => array('only' => 'autocar_service'),
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Service Title", "autocar" ),
				"param_name" => "service_title", 
				"value" => __( "", "autocar" ),
				"description" => __( "", "autocar" )
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Service Subtitle", "autocar" ),
				"param_name" => "service_subtitle", 
				"value" => __( "", "autocar" ),
				"description" => __( "", "autocar" )
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Service Icon", "autocar" ),
				"param_name" => "service_faicon", 
				"value" => __( "", "autocar" ),
				"description" => __( '<a href="https://fortawesome.github.io/Font-Awesome/icons/" target="_blank">You Can Get Icon From Here.</a>&nbsp&nbsp&nbsp copy this " fa fa-info " type of class from font awsome site and past here.', "autocar" )
			),
			array(
				"type" => "textarea",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Service Content", "autocar" ),
				"param_name" => "service_content", 
				"value" => __( "", "autocar" ),
				"description" => __( "Add Service content here.", "autocar" )
			),
		)
	) );
	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_autocar_service extends WPBakeryShortCodesContainer {
		}
	}
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_single_service extends WPBakeryShortCode {
		}
	}
	
	vc_map( array(
		"name" => __( "Who We Are", "autocar" ),
		"base" => "whoweare",
		"class" => "",
		"category" => __( "Autocar Shortcodes", "autocar"),
		'admin_enqueue_js' => array(get_template_directory_uri().'/vc_extend/bartag.js'),
		'admin_enqueue_css' => array(get_template_directory_uri().'/vc_extend/bartag.css'),
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Title", "autocar" ),
				"param_name" => "wha_title",
				"value" => __( "", "autocar" ),
				"description" => __( "", "autocar" )
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Sub Title", "autocar" ),
				"param_name" => "wha_subtitle",
				"value" => __( "", "autocar" ),
				"description" => __( "", "autocar" )
			),
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Who We Are Image", "autocar" ),
				"param_name" => "image_url",
				"value" => __( "", "autocar" ),
				"description" => __( "Add image for Who We Are section", "autocar" )
			),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Content", "autocar" ),
				"param_name" => "content",
				"value" => __( "<p>I am test text block. Click edit button to change this text.</p>", "autocar" ),
				"description" => __( "Enter your content.", "autocar" )
			)
		)
	) );
   
	vc_map( array(
		"name" => __("Autocar Clint List", "autocar"),
		"base" => "autocar_clint_list",
		"class" => "",
		"category" => __( "Autocar Shortcodes", "autocar"),
		"content_element" => true,
		"show_settings_on_create" => true,
		"is_container" => true,
		'admin_enqueue_js' => array(get_template_directory_uri().'/vc_extend/bartag.js'),
		'admin_enqueue_css' => array(get_template_directory_uri().'/vc_extend/bartag.css'),
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Clint Section Title", "autocar" ),
				"param_name" => "clint_title", 
				"value" => __( "", "autocar" ),
				"description" => __( "", "autocar" )
			),
			array(
				"type" => "attach_images",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Clint Images", "autocar" ),
				"param_name" => "clint_images", 
				"value" => __( "", "autocar" ),
				"description" => __( "You can add mulitiple Images from here.", "autocar" )
			)
		)
	) );

	vc_map( array(
		"name" => __( "Conatct Map", "autocar" ),
		"base" => "contact_map",
		"class" => "",
		"category" => __( "Autocar Shortcodes", "autocar"),
		'admin_enqueue_js' => array(get_template_directory_uri().'/vc_extend/bartag.js'),
		'admin_enqueue_css' => array(get_template_directory_uri().'/vc_extend/bartag.css'),
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Latitude", "autocar" ),
				"param_name" => "latitude",
				"value" => __( "", "autocar" ),
				"description" => __( "For Example: 48.777300", "autocar" )
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Longitude", "autocar" ),
				"param_name" => "longitude",
				"value" => __( "", "autocar" ),
				"description" => __( 'For Example: 9.179664&nbsp&nbsp&nbsp<a href="http://www.latlong.net/" target="_blank">Click Here To Get Latitude and Longitude.</a>', "autocar" )
			)
		)
	) );

	vc_map( array(
		"name" => __( "Contact Information", "autocar" ),
		"base" => "contact_info",
		"class" => "",
		"category" => __( "Autocar Shortcodes", "autocar"),
		'admin_enqueue_js' => array(get_template_directory_uri().'/vc_extend/bartag.js'),
		'admin_enqueue_css' => array(get_template_directory_uri().'/vc_extend/bartag.css'),
		"params" => array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Select Formate", "autocar" ),
				"param_name" => "ci_formate",
				"value" => array(
					'formate_1' => 'formate1',
					'formate_2' => 'formate2'
				),
				"description" => __( "Note: You can use Formate 2 only on full width.", "autocar" )
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"dependency" => array('element'=>'ci_formate','value'=>'formate1'),
				"heading" => __( "Title", "autocar" ),
				"param_name" => "ci_title",
				"value" => __( "", "autocar" ),
				"description" => __( "", "autocar" )
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"dependency" => array('element'=>'ci_formate','value'=>'formate2'),
				"heading" => __( "Heading For Phon Number ", "autocar" ),
				"param_name" => "ci_phon_head",
				"value" => __( "", "autocar" ),
				"description" => __( "", "autocar" )
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Contact Number", "autocar" ),
				"param_name" => "ci_number",
				"value" => __( "", "autocar" ),
				"description" => __( "", "autocar" )
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"dependency" => array('element'=>'ci_formate','value'=>'formate2'),
				"heading" => __( "Heading For Email", "autocar" ),
				"param_name" => "ci_email_head",
				"value" => __( "", "autocar" ),
				"description" => __( "", "autocar" )
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Email Address", "autocar" ),
				"param_name" => "ci_email",
				"value" => __( "", "autocar" ),
				"description" => __( "", "autocar" )
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"dependency" => array('element'=>'ci_formate','value'=>'formate2'),
				"heading" => __( "Heading For Address", "autocar" ),
				"param_name" => "ci_address_head",
				"value" => __( "", "autocar" ),
				"description" => __( "", "autocar" )
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"dependency" => array('element'=>'ci_formate','value'=>'formate2'),
				"heading" => __("Address",'autocar'),
				"param_name" => "ci_findus",
				"value" => __("",'autocar')
			),
			array(
				"type" => "attach_image",
				"holder" => "div",
				"class" => "",
				"dependency" => array('element'=>'ci_formate','value'=>'formate2'),
				"heading" => __( "Background Image", "autocar" ),
				"param_name" => "ci_background_img",
				"value" => __( "", "autocar" ),
				"description" => __( "", "autocar" )
			),		
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"dependency" => array('element'=>'ci_formate','value'=>'formate1'),
				"heading" => __( "Content", "autocar" ),
				"param_name" => "content",
				"value" => __( "", "autocar" ),
				"description" => __( "Enter your content.", "autocar" )
			)
		)
	) );

	vc_map( array(
		"name" => __( "Testimonial", "autocar" ),
		"base" => "autocar_testimonial",
		"class" => "",
		"category" => __( "Autocar Shortcodes", "autocar"),
		'admin_enqueue_js' => array(get_template_directory_uri().'/vc_extend/bartag.js'),
		'admin_enqueue_css' => array(get_template_directory_uri().'/vc_extend/bartag.css'),
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Number Of Testimonial", "autocar" ),
				"param_name" => "testimonial_no",
				"value" => __( "", "autocar" ),
				"description" => __( "Enter the number of Testimonial.", "autocar" 	  )
			)  
		)
	) );

	vc_map( array(
		"name" => __( "Autocar Accordion", "autocar" ),
		"base" => "autocar_accordion",
		"class" => "",
		"category" => __( "Autocar Shortcodes", "autocar"),
		"as_parent" => array('only' => 'accordion_tab'),
		"content_element" => true,
		"show_settings_on_create" => true,
		"is_container" => true,
		'admin_enqueue_js' => array(get_template_directory_uri().'/vc_extend/bartag.js'),
		'admin_enqueue_css' => array(get_template_directory_uri().'/vc_extend/bartag.css'),
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Title", "autocar" ),
				"param_name" => "accor_title",
				"value" => __( "", "autocar" ),
				"description" => __( "", "autocar" )
			)
		),
		"js_view" => 'VcColumnView',
	) );
	vc_map( array(
		"name" => __("Accordion Tab", "autocar"),
		"base" => "accordion_tab",
		"content_element" => true,
		"as_child" => array('only' => 'autocar_accordion'),
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Tab Heading", "autocar" ),
				"param_name" => "acc_tab_head", 
				"value" => __( "", "autocar" ),
				"description" => __( "", "autocar" )
			),
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Content", "autocar" ),
				"param_name" => "content",
				"value" => __( "", "autocar" ),
				"description" => __( "Enter your content.", "autocar" )
			),
		)
	) );
	if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
		class WPBakeryShortCode_autocar_accordion extends WPBakeryShortCodesContainer {
		}
	}
	if ( class_exists( 'WPBakeryShortCode' ) ) {
		class WPBakeryShortCode_accordion_tab extends WPBakeryShortCode {
		}
	}
  
	vc_map( array(
		"name" => __( "Alert Box", "autocar" ),
		"base" => "autocar_alertbox",
		"class" => "",
		"category" => __( "Autocar Shortcodes", "autocar"),
		'admin_enqueue_js' => array(get_template_directory_uri().'/vc_extend/bartag.js'),
		'admin_enqueue_css' => array(get_template_directory_uri().'/vc_extend/bartag.css'),
		"params" => array(
			array(
				"type" => "dropdown",
				"heading" => 'Alert Box',
				"param_name" => "alert_type",
				"value" => array(
						'Info_Alert' 	=> 'info',
						'Warning_Alert' => 'warning',
						'Error_Alert' 	=> 'error',
						'Success_Alert' => 'success'
					),
				"std" => "info",
				"description" => 'Choose Alert Type',
				"admin_label" => true
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Alert Type Icon", "autocar" ),
				"param_name" => "alertbox_icon",
				"value" => __( "", "autocar" ),
				"description" => __( '<a href="https://fortawesome.github.io/Font-Awesome/icons/" target="_blank">You Can Get Icon From Here.</a>&nbsp&nbsp&nbsp copy this " fa fa-info " type of class from font awsome site and past here.', "autocar" )
			),	
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Content", "autocar" ),
				"param_name" => "content",
				"value" => __( "", "autocar" ),
				"description" => __( "Enter your content.", "autocar" )
			),	
		)
	) );  


	vc_map( array(
		"name" => __( "Autocar Button", "autocar" ),
		"base" => "autocar_button",
		"class" => "",
		"category" => __( "Autocar Shortcodes", "autocar"),
		'admin_enqueue_js' => array(get_template_directory_uri().'/vc_extend/bartag.js'),
		'admin_enqueue_css' => array(get_template_directory_uri().'/vc_extend/bartag.css'),
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Text", "autocar" ),
				"param_name" => "btn_text",
				"value" => __( "", "autocar" ),
			),
			array(
				"type" => "vc_link",
				"holder" => "div",
				"class" => "",
				"heading" => __( "URL (Link)", "autocar" ),
				"param_name" => "btn_link",
				"value" => __( "", "autocar" ),
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Style", "autocar" ),
				"param_name" => "btn_style",
				"value" => array(
					'Normal' 		  => 'atc_normal_btn',
					'Normal With 3D'  => 'atc_normal_btn act_border_btn',
					'Rounded' 		  => 'atc_normal_btn atc_rounded_btn',
					'Rounded With 3D' => 'atc_normal_btn act_border_btn atc_rounded_btn',
				)
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Color", "autocar" ),
				"param_name" => "btn_color",
				"value" => array(
					'Dark Cerulean'    => '#18428c',
					'Selective Yellow' => '#ffba00',
					'Night Rider' 	   => '#333'
				)
			),		 
		)
	) );

	vc_map( array(
		"name" => __( "Autocar Featured Post", "autocar" ),
		"base" => "autocar_featured_recent",
		"class" => "",
		"category" => __( "Autocar Shortcodes", "autocar"),
		'admin_enqueue_js' => array(get_template_directory_uri().'/vc_extend/bartag.js'),
		'admin_enqueue_css' => array(get_template_directory_uri().'/vc_extend/bartag.css'),
		"params" => array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Select Post Style", "autocar" ),
				"param_name" => "fr_post_style",
				"value" => array(
					'Featured Post' => 'featured_post',
					'Recent Post'   => 'recent_post',
				)
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"dependency" => array('element'=>'fr_post_style','value'=>'recent_post'),
				"heading" => __( "Heading", "autocar" ),
				"param_name" => "recent_head",
				"value" => __( "", "autocar" ),
				"description" => __( "", "autocar" )
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"dependency" => array('element'=>'fr_post_style','value'=>'recent_post'),
				"heading" => __( "Subheading", "autocar" ),
				"param_name" => "recent_subhead",
				"value" => __( "", "autocar" ),
				"description" => __( "", "autocar" )
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"dependency" => array('element'=>'fr_post_style','value'=>'recent_post'),
				"heading" => __( "Icon", "autocar" ),
				"param_name" => "recent_icon",
				"value" => __( "", "autocar" ),
				"description" => __( '<a href="https://fortawesome.github.io/Font-Awesome/icons/" target="_blank">You Can Get Icon From Here.</a>&nbsp&nbsp&nbsp copy this " fa fa-car " type of class from font awsome site and past here.', "autocar" )
			),	 
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Number Of Post", "autocar" ),
				"param_name" => "no_of_post",
				"value" => __( "", "autocar" ),
				"description" => __( "", "autocar" )
			),		 
		)
	) );   

	vc_map( array(
		"name" => __( "Recent Post With Slider", "autocar" ),
		"base" => "autocar_rpost_slider",
		"class" => "",
		"category" => __( "Autocar Shortcodes", "autocar"),
		'admin_enqueue_js' => array(get_template_directory_uri().'/vc_extend/bartag.js'),
		'admin_enqueue_css' => array(get_template_directory_uri().'/vc_extend/bartag.css'),
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Heading", "autocar" ),
				"param_name" => "recent_head",
				"value" => __( "", "autocar" ),
				"description" => __( "", "autocar" )
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Subheading", "autocar" ),
				"param_name" => "recent_subhead",
				"value" => __( "", "autocar" ),
				"description" => __( "", "autocar" )
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Icon", "autocar" ),
				"param_name" => "recent_icon",
				"value" => __( "", "autocar" ),
				"description" => __( '<a href="https://fortawesome.github.io/Font-Awesome/icons/" target="_blank">You Can Get Icon From Here.</a>&nbsp&nbsp&nbsp copy this " fa fa-car " type of class from font awsome site and past here.', "autocar" )
			),	
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Number Of Post", "autocar" ),
				"param_name" => "no_of_post",
				"value" => __( "", "autocar" ),
				"description" => __( "", "autocar" )
			),		 
		)
	) );
   
	vc_map( array(
		"name" => __( "Autocar Notice Strip", "autocar" ),
		"base" => "autocar_notice",
		"class" => "",
		"category" => __( "Autocar Shortcodes", "autocar"),
		'admin_enqueue_js' => array(get_template_directory_uri().'/vc_extend/bartag.js'),
		'admin_enqueue_css' => array(get_template_directory_uri().'/vc_extend/bartag.css'),
		"params" => array(
			array(
				"type" => "textarea_html",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Content", "autocar" ),
				"param_name" => "content",
				"value" => __( "", "autocar" ),
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Text On Button", "autocar" ),
				"param_name" => "btn_txt",
				"value" => __( "", "autocar" ),
			),
			array(
				"type" => "vc_link",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Button Link", "autocar" ),
				"param_name" => "btn_link",
				"value" => __( "", "autocar" ), 
			),			
		)
	) );

	add_action('init','autocarcore_custom_tax');
	
	
	
}

function autocarcore_custom_tax(){
	global $terms;
	$terms = get_terms('vehicle_type', array(
		'hide_empty' => false
	));
	$termarr = array('select'=>'');
	foreach($terms as $taxonomy){
		 $termarr[$taxonomy->name] = $taxonomy->slug;
	}
	vc_map( array(
		"name" => __( "Autocar Car Listing", "autocar" ),
		"base" => "car_listing",
		"class" => "",
		"category" => __( "Autocar Shortcodes", "autocar"),
		"params" => array(
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Select View", "autocar" ),
				"param_name" => "view",
				"value" => array(
					'Grid' => 'Grid',
					'List' => 'List'
				),
				"description" => __( "", "autocar" )
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Select Column", "autocar" ),
				"param_name" => "list_column",
				"value" => array(
					'2 Columns Listing' => '2clmn',
					'3 Columns Listing' => '3clmn',
					'4 Columns Listing' => '4clmn'
				),
				"description" => __( "This option will work on grid view.", "autocar" )
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Select No.Of Cars", "autocar" ),
				"param_name" => "cars_no",
				"value" => array(
					'All' 	 => '-1',
					'Custom' => 'custom'
				),
				"description" => __( "", "autocar" )
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"dependency" => array('element'=>'cars_no','value'=>'custom'),
				"heading" => __( "No. Of Car", "autocar" ),
				"param_name" => "no_of_cars",
				"value" => __( "", "autocar" ),
				"description" => __( "", "autocar" )
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __( "vehicle type", "autocar" ),
				"param_name" => "vehicle_type",
				"value" => $termarr,
				"description" => __( "", "autocar" )
			),
			array(
				"type" => "checkbox",
				"holder" => "div",
				"class" => "",
				"heading" => __( "", "autocar" ),
				"param_name" => "description",
				"value" => array("description"=>"yes"),
				"description" => __( "This option will work on grid view.", "autocar" )
			),
		)
	) );  
	
	$termarr['select'] = 'all';
	
	vc_map( array(
		"name" => __( "vehicle type", "autocar" ),
		"base" => "autocar_vehicle_type",
		"class" => "",
		"category" => __( "Autocar Shortcodes", "autocar"),
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Title", "autocar" ),
				"param_name" => "title",
				"value" => __( "", "autocar" ),
				"description" => __( "", "autocar" )
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "SubTitle", "autocar" ),
				"param_name" => "subtitle",
				"value" => __( "", "autocar" ),
				"description" => __( "", "autocar" )
			),
			array(
				"type" => "dropdown",
				"holder" => "div",
				"class" => "",
				"heading" => __( "vehicle type", "autocar" ),
				"param_name" => "vehicle_type",
				"value" => $termarr,
				"description" => __( "", "autocar" )
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Number Of Car", "autocar" ),
				"param_name" => "post_cnt",
				"value" => __( "", "autocar" ),
				"description" => __( "", "autocar" )
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Icon", "autocar" ),
				"param_name" => "recent_icon",
				"value" => __( "", "autocar" ),
				"description" => __( '<a href="https://fortawesome.github.io/Font-Awesome/icons/" target="_blank">You Can Get Icon From Here.</a>&nbsp&nbsp&nbsp copy this " fa fa-car " type of class from font awsome site and past here.', "autocar" )
			),
			array(
				"type" => "checkbox",
				"holder" => "div",
				"class" => "",
				"heading" => __( "", "autocar" ),
				"param_name" => "description",
				"value" => array("description"=>"yes"),
				"description" => __( "", "autocar" )
			),
		)
	) );  
	
	global $car_dealer;
	
	$fields = array('keyword'=>'keyword','order'=>'order');
	
	if($car_dealer){
		$registered_fields = $car_dealer->fields->get_registered_fields();
		
		foreach($registered_fields as $k=>$v){
			$fields[$v['label']] = $k;
		}
		
	}
	
	vc_map( array(
		"name" => __( "vehicle search", "autocar" ),
		"base" => "autocar_vehicle_search",
		"class" => "",
		"category" => __( "Autocar Shortcodes", "autocar"),
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Title", "autocar" ),
				"param_name" => "title",
				"value" => __( "", "autocar" ),
				"description" => __( "", "autocar" )
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "SubTitle", "autocar" ),
				"param_name" => "subtitle",
				"value" => __( "", "autocar" ),
				"description" => __( "", "autocar" )
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => __( "Icon", "autocar" ),
				"param_name" => "recent_icon",
				"value" => __( "", "autocar" ),
				"description" => __( '<a href="https://fortawesome.github.io/Font-Awesome/icons/" target="_blank">You Can Get Icon From Here.</a>&nbsp&nbsp&nbsp copy this " fa fa-car " type of class from font awsome site and past here.', "autocar" )
			),
			array(
				"type" => "checkbox",
				"holder" => "div",
				"class" => "",
				"heading" => __( "include search field", "autocar" ),
				"param_name" => "search_field",
				"value" => $fields,
				"description" => __( "", "autocar" )
			),
		)
	) );
	
}


add_shortcode( 'autocar_service', 'autocar_service_func' );
function autocar_service_func( $atts, $content = null ) {

	$result = '';
    $result .= '<div class="services-second">
						<div class="row">'.do_shortcode($content).'</div>	
				</div>';						
	return $result;
}

add_shortcode( 'single_service', 'autocar_singleservice_func' );
function autocar_singleservice_func( $atts ) {
	extract( shortcode_atts( array(
       'service_title'    => '',
       'service_subtitle' => '',
       'service_faicon'   => '',
       'service_content'  => '',
    ), $atts ) );
    $result = '';
	$result .= '<div class="col-md-4"><div class="service-item">
					<i class="'.esc_html( $service_faicon ).'"></i>
						<div class="text-content">
							<h6>'.esc_html( $service_title ).'</h6>
							<span>'.esc_html( $service_subtitle ).'</span>
							<div class="line-dec-second"></div>
							<p>'.esc_html( $service_content ).'</p>
					    </div>
				</div></div>';
	return $result;
}

add_shortcode( 'whoweare', 'autocar_who_we_are_func' );
function autocar_who_we_are_func( $atts, $content = null ) {
	extract( shortcode_atts( array(
       'wha_title'    => '',
       'wha_subtitle' => '',
       'image_url'    => ''
    ), $atts ) );
	$img = wp_get_attachment_image_src( $image_url, "autocar_who_we_are" );
    $result = '';
	$result .= '<div class="more-about-us">
						<div class="row">
							<div class="col-md-6">';
								if( !empty( $img ) ) {
									$result .= '<img src="'.esc_url( $img[0] ).'" alt="">';
								}
				$result .= '</div>
							<div class="col-md-6">
								<div class="right-content">
									<span>'.esc_html( $wha_subtitle ).'</span>
									<h4>'.esc_html( $wha_title ).'</h4>
									<div class="line-dec-third"></div>
									<p>'. $content .'</p>
								</div>
							</div>
						</div></div>';
	return $result;
}

add_shortcode( 'autocar_clint_list', 'autocar_clint_list_func' );
function autocar_clint_list_func( $atts ) {
	extract( shortcode_atts( array(
       'clint_title'  => '',
       'clint_images' => '',
    ), $atts ) );
	
	$clint_images = explode(',', $clint_images); //convert string to array
	$count = count( $clint_images );
    $result = '';
	$result .= '<div class="our-clients">
						<div class="row"> 
							<div class="col-md-12">
								<div class="sep-section-heading">
									<h2>'.esc_html( $clint_title ).'</h2>
								</div>
								<div id="owl-clients" class="owl-carousel owl-theme">';
								for( $i=0; $i<$count; $i++ )
								{
									$clint_image = wp_get_attachment_image_src( $clint_images[$i], 'full' );
									$result .= '<div class="item">
													<img src="'.esc_url( $clint_image[0] ).'" alt="">
												</div>';
								}	
									$result .= '</div>
							</div>
						</div>
				</div>';
	return $result; 
}

add_shortcode( 'contact_map', 'autocar_contact_map_func' );
function autocar_contact_map_func( $atts ) {
	extract( shortcode_atts( array(
       'latitude'  => '',
       'longitude' => '',
    ), $atts ) );
	$result = '';
	wp_enqueue_script('autocar-googlemapjs');
	
	ob_start();
	
	//script for map ?>
	<script type="text/javascript">
        jQuery(function($){
            $('.contact-map').gmap3({
                marker:{
                    address: '<?php echo esc_js($latitude).','.esc_js($longitude); ?>'
                },
                    map:{
                    options:{
                    zoom: 15,
                    scrollwheel: false,
                    streetViewControl : true
                    }
                }
            });
        });
    </script>
<?php 
	
	$result .= ob_get_clean();
	
	$result .= '<div class="contact-us">
					<div class="contact-map" style="height: 480px;"></div>
				</div>';
	return $result; 
}

add_shortcode( 'contact_info', 'autocar_contact_information_func' );
function autocar_contact_information_func( $atts, $content = null ) {
	extract( shortcode_atts( array(
       'ci_formate'      => '',
	   'ci_title'        => '',
       'ci_phon_head'    => '',
       'ci_number' 	     => '',
       'ci_email_head'   => '',
       'ci_email'        => '',
       'ci_address_head' => '',
       'ci_background_img' => '',
       'ci_findus' 		 => '',
    ), $atts ) );
	$back_img = wp_get_attachment_image_src( $ci_background_img, 'full' );
	$result = '';
	if( $ci_formate == 'formate2' ) {
		$result .= '<div class="blury-bg" style="background-image:url('.esc_url($back_img[0]).')">
				<div class="ac_overlay"></div>
					<div class="container">
						<div class="row">
							<div class="col-md-4">
								<div class="info-item">
									<i class="fa fa-phone"></i>
								<div class="atc_contact_info">	
									<h4>'.esc_html( $ci_phon_head ).'</h4>
									<div class="line-dec"></div>
									<span>'.esc_html( $ci_number ).'</span>
								</div>	
								</div>
							</div>
							<div class="col-md-4">
								<div class="info-item">
									<i class="fa fa-envelope"></i>
									<div class="atc_contact_info">
										<h4>'.esc_html( $ci_email_head ).'</h4>
										<div class="line-dec"></div>
										<span>'.esc_html( $ci_email ).'</span>
									</div>	
								</div>
							</div>
							<div class="col-md-4">
								<div class="info-item">
									<i class="fa fa-map-marker"></i>
								<div class="atc_contact_info">	
									<h4>'.esc_html( $ci_address_head ).'</h4>
									<div class="line-dec"></div>
									<span>'.esc_html( $ci_findus ).'</span>
								</div>	
								</div>
							</div>
						</div>
					</div>
				</div>';
			return $result;	
	} else {
			$result .= '<div class="contact-content">
							<div class="sep-section-heading">
								<h2>'.esc_html( $ci_title ).'</h2>
							</div>
							<p>'. $content .'</p>
							<div class="contact-info">
								<ul>
									<li><i class="fa fa-phone"></i><span>'.esc_html( $ci_number ).'</span></li>
									<li><i class="fa fa-envelope"></i><span>'.esc_html( $ci_email ).'</span></li>
								</ul>
							</div>
						</div>';
			 return $result;
			}
}

add_shortcode( 'autocar_testimonial', 'autocar_testimonial_func' );
function autocar_testimonial_func( $atts ) {
	extract( shortcode_atts( array( 'testimonial_no'  => ''  ), $atts ) );
	$result = '';
	$result .= '<div class="testimonials">
	<div class="ac_overlay"></div>
					<div class="container">						 
						<div id="owl-demo" class="owl-carousel owl-theme">';
				$args = array( 'post_type' => 'testimonial', 'posts_per_page' => esc_html($testimonial_no) );
				$loop = null;
				$thumb_id = $image_src = '';
				global $post;
				$loop = new WP_Query( $args );
				if( $loop->have_posts() ) {
				while ( $loop->have_posts() ) : $loop->the_post();	
				$about_author = get_post_meta( get_the_ID(), 'autocar_about_author', true );
				$author_rivew = get_post_meta( get_the_ID(), 'autocar_rivew', true );
				$thumb_id  = get_post_thumbnail_id( $post->ID );
				$image_src = wp_get_attachment_url( $thumb_id );
				$result .= '<div class="item col-md-8 col-md-offset-2">
								<div class="ac_testimonial_wrapper">
								<div class="ac_testimonial_img">
						  			<img src="'.esc_url( $image_src ).'" alt="">
								</div>
								
								<div class="ac_testimonial_content">
						 		
						  		<p><em>"</em>'.get_the_content().'<em>"</em></p>
						  		<div class="author-rate">
								
						  			<h4>'.get_the_title().'</h4>
						  			<div class="line-dec2"></div>
						  			<span>'.esc_html( $about_author ).'</span>
									<ul class="star-rating">';
								for( $i=1; $i<=5; $i++ ) {
								if(	$i <= $author_rivew ){
									$result .= '<li class="autocar_rivew"><i class="fa fa-star"></i></li>';
								}else {
									$result .= '<li><i class="fa fa-star"></i></li>';
								}
							}
						 		$result .= '</ul>
						  		</div></div>
						  	</div></div>';
						endwhile;
						}
						wp_reset_postdata();
						$result .= '</div>
					</div>
				</div>';
	return $result; 
}

add_shortcode( 'autocar_accordion', 'autocar_accordion_func' );
function autocar_accordion_func( $atts, $content = null ) {
	extract( shortcode_atts( array(
       'accor_title' => ''
    ), $atts ) );
	$result = '';
    $result .= '<div class="shortcodes-content">
					<div class="accordions">
						<div class="sep-section-heading">
							<h2>'.esc_html( $accor_title ).'</h2>
						</div>
					<div class="accordion">'.do_shortcode($content).'</div>
					</div>
				</div>';						
	return $result;
}

add_shortcode( 'accordion_tab', 'autocar_accordion_tab_func' );
function autocar_accordion_tab_func( $atts, $content = null ) {
	extract( shortcode_atts( array(
       'acc_tab_head'    => ''
    ), $atts ) );
    $result = '';
	static $acc_id = 1;
	$result .= '<div class="accordion-section">
					<a class="accordion-section-title" href="#accordion-'.$acc_id.'">'.$acc_tab_head.'<i class="fa fa-angle-up"></i></a>
						<div id="accordion-'.$acc_id.'" class="accordion-section-content">
							<p>'.$content.'</p>
						</div>
				</div>';
	$acc_id++;
	return $result;
}

add_shortcode( 'autocar_alertbox', 'autocar_alertbox_func' );
function autocar_alertbox_func( $atts, $content = null ) {
	extract( shortcode_atts( array(
      'alert_type'    => '',
	  'alertbox_icon' => '',
    ), $atts ) );
    $result = '';
	$result .= '<div class="shortcodes-content">
					<div class="alerts">
						<div class="row">
							<div class="col-md-12">';
							switch ( $alert_type ) {
								case "warning":
								$result .= '<div class="warning-alert">
												<i class="'.esc_html( $alertbox_icon ).'"></i>
												<a href="#">'.$content.'</a>
											</div>';
								break;
								case "error":
								$result .= '<div class="error-alert">
												<i class="'.esc_html( $alertbox_icon ).'"></i>
												<a href="#">'.$content.'</a>
											</div>';
								break;
								case "success":
								$result .= '<div class="success-alert">
												<i class="'.esc_html( $alertbox_icon ).'"></i>
												<a href="#">'.$content.'</a>
											</div>';
								break;
								default:
								$result .= '<div class="info-alert">
												<i class="'.esc_html( $alertbox_icon ).'"></i>
												<a href="#">'.$content.'</a>
											</div>';	
								}
					$result .= '</div>
							</div>
						</div>
					</div>';
	return $result;
}

add_shortcode( 'autocar_button', 'autocar_button_func' );
function autocar_button_func( $atts ) {
	extract( shortcode_atts( array(
      'btn_text'  => '',
	  'btn_link'  => '',
	  'btn_style' => 'atc_normal_btn',
	  'btn_color' => ''
    ), $atts ) );
    $result = $border_color = '';
	if( $btn_style == 'atc_normal_btn act_border_btn' || $btn_style == 'atc_normal_btn act_border_btn atc_rounded_btn' ){
	switch($btn_color){
		case "#18428c":
			$border_color = '#112d60';
		break;
		case "#ffba00":
			$border_color = '#cc9500';
		break;	
		case "#333":
			$border_color = '#1a1a1a';
		break;
	}
}	
	$href = vc_build_link( $btn_link );
	$result .= '<a href="'.esc_url($href['url']).'" class="'.esc_attr($btn_style).'" target="'.esc_attr($href['target']).'" style="background:'.esc_attr($btn_color).';border-bottom-color:'.esc_attr($border_color).'">'.$btn_text.'</a>';
	return $result;
}

add_shortcode( 'autocar_featured_recent', 'autocar_featured_recent_func' );
function autocar_featured_recent_func( $atts ) {
	extract( shortcode_atts( array(
		'fr_post_style'   => 'featured_post',
		'fr_post_formate' => 'car_for_sale_post',
		'recent_head' 	=> '',
		'recent_subhead'  => '',
		'recent_icon' 	=> '',
		'no_of_post' 	=> ''
	), $atts ) );
	
    $result = '';
	
	// If Featured Post	Selected
	if( $fr_post_style == 'featured_post' ) {
		$result .= '<div class="services">';
			$result .= '<div class="container">';
				$result .= '<div class="row">';
					$result .= '<div class="services-content featured-post">';	

						$args = array( 'post_type' => 'post','category_name' => 'featured', 'posts_per_page' => esc_html($no_of_post) ); 
							
						$loop = new WP_Query( $args );
						if( $loop->have_posts() ) {
							while ( $loop->have_posts() ) : $loop->the_post();
			
								$car_purpose   = rwmb_meta( 'autocar_post_purpose' );
			
								$feat_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(),'full' );
								$result .= '<div class="col-md-4">';
									$result .= '<div class="service-item">';
										$result .= '<img src="'.esc_url($feat_image_url[0]).'" alt="">';
										if( !empty( $car_purpose ) ) {
											if( $car_purpose == 'car-banner-sale' ) {
											$result .= '<div class="ac_service_content"><div class="service-baner">
											<a href="'.esc_url(get_the_permalink()).'"><span>'.esc_html__('For Sale', 'autocar').'</span></a>
														</div>';				
										} else {
										$result .= '<div class="ac_service_content"><div class="service-baner">
												<a href="'.esc_url(get_the_permalink()).'"><span>'.esc_html__('For Rent', 'autocar').'</span></a>
													</div>';
											}
										}
										$result .= '<p>'.get_the_excerpt().'</p>';
										$result .= '<div class="primary-button">';
											$result .= '<a href="'.get_the_permalink().'">'.esc_html__('Read More','autocar').'</a>';
										$result .= '</div></div>';
									$result .= '</div>';
								$result .= '</div>';
							endwhile;
						}
						wp_reset_postdata();
					$result .= '</div>';
				$result .= '</div>';
			$result .= '</div>';
		$result .= '</div>';
	} else {
		$result .= '<div class="recent-car">';
			$result .= '<div class="container">';
				$result .= '<div class="recent-car-content">';
				
					$result .= '<div class="row">';
						$result .= '<div class="col-md-12">';
							$result .= '<div class="section-heading">';
								$result .= '<i class="'.esc_html( $recent_icon ).'"></i>';
								$result .= '<div class="atc_sect_heading">';
									$result .= '<h2>'.esc_html( $recent_head ).'</h2>';
									$result .= '<span>'.esc_html( $recent_subhead ).'</span>';
								$result .= '</div>';
							$result .= '</div>';
						$result .= '</div>';
					$result .= '</div>';
					
					
					$result .= '<div class="row">';
						global $post;
						$args = array( 'numberposts' => $no_of_post );
						$recent_posts = get_posts( $args );
						foreach( $recent_posts as $post ) :  setup_postdata($post);
						
							$car_purpose    = rwmb_meta( 'autocar_post_purpose' );
							$feat_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(),'full' );
		
							$result .= '<div class="col-md-4">';
								$result .= '<div class="car-item r_blog_post">';
								
									$result .= '<div class="thumb-content">';
										if( !empty( $car_purpose ) ) {
											if( $car_purpose == 'car-banner-sale' ) {
												$result .= '<div class="'.esc_attr( $car_purpose ).'"><a href="'.get_the_permalink().'">'.esc_html__('For Sale', 'autocar').'</a></div>';				
											} else {
												$result .= '<div class="'.esc_attr( $car_purpose ).'"><a href="'.get_the_permalink().'">'.esc_html__('For Rent', 'autocar').'</a></div>';
											}
										}

										$result .= '<a href="'.get_the_permalink().'"><img src="'.esc_url($feat_image_url[0]).'" alt=""></a>';
									$result .= '</div>';
									
									$result .= '<div class="down-content">';
										$result .= '<a href="'.get_the_permalink().'"><h4>'.get_the_title().'</h4></a>';
										$result .= '<div class="line-dec"></div>';
										$result .= '<p>'.get_the_excerpt().'</p>';
										$result .= '<div class="primary-button">';
											$result .= '<a href="'.get_the_permalink().'">'.esc_html__('Read More','autocar').'</a>';
										$result .= '</div>';
									$result .= '</div>';
								$result .= '</div>';
							$result .= '</div>';
						endforeach;
						wp_reset_postdata();

					$result .= '</div>';
				$result .= '</div>';
			$result .= '</div>';
		$result .= '</div>';
	}

	return $result;
}

add_shortcode( 'autocar_rpost_slider', 'autocar_rpost_with_slider_func' );
function autocar_rpost_with_slider_func( $atts ) {
	extract( shortcode_atts( array(
	  'recent_head'    => '',
	  'recent_subhead' => '',
	  'recent_icon'    => '',
	  'no_of_post'     => '',
    ), $atts ) );
    $result = '';
	$result .= '<div class="latest-news">
				<div class="container">
					<div class="latest-news-content">
						<div class="row">
							<div class="col-md-12">
								<div class="section-heading">
									<i class="'.esc_html($recent_icon).'"></i>
									<div class="atc_sect_heading">
									<h2>'.esc_html($recent_head).'</h2>
									<span>'.esc_html($recent_subhead).'</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="owl-blog" class="owl-carousel owl-theme">';
	global $post;			
	$args = array( 'numberposts' => esc_html($no_of_post) );
	$recent_posts = get_posts( $args );
	$no = $no_of_post;
	foreach( $recent_posts as $post ) :  setup_postdata($post);
	$feat_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'full' );
	$author = get_post_meta($post->ID, 'autocar_author', true);
	if( $no%2 == 0 ) { 
		$result .= '<div class="item">
						<div class="thumb-content">
							<div class="date-post">
								<a href="'.get_the_permalink().'">'.get_the_date( "j M" ).'</a>
							</div>
							<a href="'.get_the_permalink().'"><img src="'.esc_url($feat_image_url[0]).'" alt=""></a>
						</div>
						<div class="down-content">';
						if(!empty($author)){
							$result .= '<span>'.esc_html__('Posted by:', 'autocar').' '.esc_html( $author ).'</span>';
						} else {
							$result .= '<span>'.esc_html__('Posted by:', 'autocar').' '.esc_html__('Admin', 'autocar').'</span>';
						}
						$result .= '<a href="'.get_the_permalink().'">
									<h4>'.get_the_title().'</h4></a>
									<div class="line-dec"></div>
									<p>'.get_the_excerpt().'</p>
						</div>
						<div class="primary-button">
							<a href="'.get_the_permalink().'">Read More</a>
						</div>
					</div>';
	} else {
	$result .= '<div class="item-2">
					<div class="thumb-content">
						<div class="date-post">
							<a href="'.get_the_permalink().'">'.get_the_date( "j M" ).'</a>
						</div>
						<a href="'.get_the_permalink().'"><img src="'.esc_url($feat_image_url[0]).'" alt=""></a>
					</div>
					<div class="down-content">';
						if(!empty($author)){
							$result .= '<span>'.esc_html('Posted by:', 'autocar').' '.esc_html( $author ).'</span>';
						} else {
							$result .= '<span>'.esc_html__('Posted by:', 'autocar').' '.esc_html__('Admin', 'autocar').'</span>';
						}					
						
						$result .= '<a href="'.get_the_permalink().'">
						<h4>'.get_the_title().'</h4></a>
						<div class="line-dec"></div>
						<p>'.get_the_excerpt().'</p>
					</div>
					<div class="primary-button">
						<a href="'.get_the_permalink().'">Read More</a>
					</div>
				</div>';

	}
$no--;
		endforeach;
		wp_reset_query();		
			$result .= '</div>
			</div>
';
	return $result;
}

add_shortcode( 'autocar_notice', 'autocar_notice_strip_func' );
function autocar_notice_strip_func( $atts, $content = null ) {
	extract( shortcode_atts( array(
	  'btn_txt'   => '',
	  'btn_link'  => ''

    ), $atts ) );
    $result = '';
	$href = vc_build_link( $btn_link );
	$result .= '<div class="call-to-action">
					<div class="ac_overlay"></div>
						<div class="container">
						<div class="call-to-action-content">
							<div class="row">
								<div class="col-md-12">
									<p>'.$content.'</p> 
									<div class="white-button">
										<a href="'.esc_url($href['url']).'" target="'.esc_attr($href['target']).'">'.esc_html( $btn_txt ).'</a>
									</div>
								</div>
							</div>
						</div>
						</div>
				</div>';
	return $result;
}

/***** Autocar Car Listing Start *****/
add_shortcode( 'car_listing', 'autocar_car_listing_func' );
function autocar_car_listing_func( $atts ) {
	extract( shortcode_atts( array(
	  'list_column' => '2clmn',
	  'vehicle_type' => 'car',
	  'cars_no'     => -1,
	  'no_of_cars'  => '',
	  'description' => '',
	  'view' => 'Grid'
    ), $atts ) );
	
	if( $cars_no == -1 ){
		$no_of_post = -1;
	} else {
		$no_of_post = $no_of_cars;
	}
	global $post;
	$result = '';
	
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
	$args = array(
		'post_type' 	 => 'vehicle',
		'paged'		 	 => $paged,
		'posts_per_page' => $no_of_post,
		'orderby' 		 => 'menu_order',
		'vehicle_type'  => $vehicle_type,
	);
	
	$query = new WP_Query( $args );
	
	$result .= '<div class="recent-car on-listing">';
		//$result .= '<div class="container">';
			$result .= '<div class="recent-car-content">';
				$result .= '<div class="row">';
	
	if( $query->have_posts() ) {
		if($view == 'List') $result .= '<div class="col-lg-12 col-md-12"><div class="ac_list_view_wrapper">';
		while ( $query->have_posts() ) : $query->the_post();
			if($view == 'List'){
				
				if( $list_column == '2clmn') {
					$size = 'autocar_vehicle_2';
				} elseif( $list_column == '3clmn' ) {
					$size = 'autocar_vehicle_3';
				} else {
					$size = 'autocar_vehicle_4';
				}
				
				$brochure = get_post_meta($post->ID,'autocar_v_brochure',true);
				$brochure = wp_get_attachment_url($brochure, 'full');
				
				$src = '';
				
				$result .= '<div class="ac_car_list_wrapper">';
					$result .= '<div class="ac_list_car_img">';
						if(has_post_thumbnail($post->ID)){
							$thumb = get_post_thumbnail_id($post->ID);
							$src = wp_get_attachment_image_src($thumb, $size);
							$result .= '<a href="'.esc_url(get_the_permalink($post->ID)).'">';	
							$result .= '<img src="'.esc_url($src[0]).'" alt="'.esc_html(get_the_title($post->ID)).'" />';
							$result .= '</a>';	
						}
						
						$result .= '<div class="ac_price_wrapper">';
						$result .= do_shortcode( "[vehicle_price]" );
						$result .= '</div>';						
					$result .= '</div>';
					
					$result .= '<div class="ac_list_content">';
						$result .= '<div class="ac_car_detail">';
							$result .= '<a href="'.esc_url(get_the_permalink($post->ID)).'"><h4>'.esc_html(get_the_title($post->ID)).'</h4></a>';
							$result .= '<div class="ac_car_action">';
							$result .= '<ul>';
								$schedule = get_option('autocar_schedule');
								if($schedule == 'enable'){
									$result .= '<li><a href="javascript:;" class="autocar_schedule" data-title="'.esc_attr(get_the_title($post->ID)).'">'.esc_html__('Schedule Test Drive','autocar').'</a></li>';
								}
								$result .= '<li><a href="'.esc_url($brochure).'" class="autocar_brochure" download>'.esc_html__('Brochure','autocar').'</a></li>';
								$result .= '<li>';
									$text = check_is_compare_id($post->ID);
									$result .= '<a href="javascript:;" class="'.esc_attr($text['cls']).'" data-carId="'.esc_attr($post->ID).'" data-aicon="false">'.esc_html($text['txt']).'</a>';
								$result .= '</li>';
							$result .= '</ul>';
							$result .= '</div>';							
							
						$result .= '</div>';
						
						$result .= '<ul class="car-info">';
							global $car_dealer;
							
							$fields = $car_dealer->fields->get_registered_fields( 'specs' );
							
							if ( ! empty( $fields ) ) {
								$i = 0;
								foreach ( $fields as $k => $field ) {
									
									$i++;
																		
									$result .= '<li><div class="car_info_content">';
									$label = $field['label'];
									$name  = $field['name'];
									$result .= '<span>'.esc_html($name).'</span>';
									$value = get_field( $field['name'], $post->ID );

									if ( $value ) { 
										$result .= '<p>'.esc_html($value).'</p>';
									}
										
									$result .= '</div></li>';
									
									if($i == 4) break;
								}		
							}	
							
							
						$result .= '</ul>';
						
					$result .= '</div>';
					
				$result .= '</div>';
				
			}else{
				if($description == 'yes'){
					if( $list_column == '2clmn') {
						$size = 'autocar_vehicle_2';
						$result .= '<div class="col-md-6 autocar_cl2_min_height">';
					} elseif( $list_column == '3clmn' ) {
						$size = 'autocar_vehicle_3';
						$result .= '<div class="col-md-4 autocar_cl3_min_height">';
					} else {
						$size = 'autocar_vehicle_4';
						$result .= '<div class="col-sm-6 col-md-6 col-lg-3 atc_list_4colmn autocar_cl4_min_height">';
					}
					$result .= '<div class="car-item">';
						$result .= '<div class="thumb-content">';
							$result .= '<div class="car-banner-rent">';
								$result .= '<a href="'.esc_url(get_the_permalink($post->ID)).'">'; 		$result .= esc_html__('Model:','autocar');
									$categories = get_the_terms($post->ID,'model');
									foreach($categories as $category) {      
										$result .= esc_html($category->name);
										break;
									}
								$result .= '</a>';
							$result .= '</div>';
							
							$text = check_is_compare_id($post->ID);
											
							$result .= '<div class="add_btn_wrapper primary-button"><a href="javascript:;" class="'.esc_attr($text['cls']).'" data-carId="'.esc_attr($post->ID).'" data-aicon="false">'.esc_html($text['txt']).'</a></div>';
							
							$src = '';
							if(has_post_thumbnail($post->ID)){
								$thumb = get_post_thumbnail_id($post->ID);
								$src = wp_get_attachment_image_src($thumb, $size);
								$result .= '<a href="'.esc_url(get_the_permalink($post->ID)).'">';	
								$result .= '<img src="'.esc_url($src[0]).'" alt="'.esc_html(get_the_title($post->ID)).'" />';
								$result .= '</a>';	
							}
							
						$result .= '</div>';
						
						$result .= '<div class="down-content">';
							
							$result .= '<a href="'.esc_url(get_the_permalink($post->ID)).'"><h4>'.esc_html(get_the_title($post->ID)).'</h4></a>';
							$result .= do_shortcode( "[vehicle_price]" );
							$result .= '<div class="line-dec"></div>';
							$result .= substr(do_shortcode( '[vehicle_description]' ),0,200);
							
							$result .= '<ul class="car-info">';
							
								$categories = get_the_terms($post->ID,'make');
								foreach($categories as $category) {      
									$make = $category->name;
									break;
								}
								
								$categories = get_the_terms($post->ID,'model');
								foreach($categories as $category) {      
									$model = $category->name;
									break;
								}
								
								$categories = get_the_terms($post->ID,'vehicle_type');
								foreach($categories as $category) {      
									$vehicle_type = $category->name;
									break;
								}
								
								$result .= '<li><span>'.esc_html__('Vehicle Type','autocar').'</span><p>'.esc_html($vehicle_type).'</p></li>';
								$result .= '<li><span>'.esc_html__('Make','autocar').'</span><p>'.esc_html($make).'</p></li>';
								$result .= '<li><span>'.esc_html__('Model','autocar').'</span><p>'.esc_html($model).'</p></li>';					
								//$result .= '<li><span>'.esc_html__('Model','autocar').'</span><p>'.esc_html($model).'</p></li>';
							
							$result .= '</ul>';
							
						$result .= '</div>';
										
					$result .= '</div>';
					$result .= '</div>';
				}else{
					
					if( $list_column == '2clmn') {
						$size = 'autocar_vehicle_2';
						$result .= '<div class="col-md-6">';
					} elseif( $list_column == '3clmn' ) {
						$size = 'autocar_vehicle_3';
						$result .= '<div class="col-md-4">';
					} else {
						$size = 'autocar_vehicle_4';
						$result .= '<div class="col-sm-6 col-md-6 col-lg-3 atc_list_4colmn">';
					}
								
					$categories = get_the_terms($post->ID,'make');
					foreach($categories as $category) {      
						$make = $category->name;
						break;
					}
					
						$result .= '<div class="recent_car_wrapper">';
							$result .= '<div class="recent_car_img">';
								
								if(has_post_thumbnail($post->ID)){
									$thumb = get_post_thumbnail_id($post->ID);
									$src = wp_get_attachment_image_src($thumb, $size);
									$result .= '<a href="'.esc_url(get_the_permalink($post->ID)).'">';	
									$result .= '<img src="'.esc_url($src[0]).'" alt="'.esc_html(get_the_title($post->ID)).'" />';
									$result .= '</a>';	
								}
								
								$result .= '<div class="ac_price_wrapper">';
									$result .= do_shortcode( "[vehicle_price]" );
								$result .= '</div>';
								
								$text = check_is_compare_id($post->ID,'true');
								
								$result .= '<div class="ac_overlay"><span><a href="javascript:;" class="'.esc_attr($text['cls']).'" data-carId="'.esc_attr($post->ID).'" data-aicon="true" > '.$text['txt'].' </a> <a href="'.esc_url(get_permalink($post->ID)).'" ><i class="fa fa-link"></i></a></span></div>';
								
								
							$result .= '</div>';
							$result .= '<div class="ac_recent_car_content">';
								$result .= '<div class="ac_car_name">';
									$result .= '<h4><a href="'.esc_url(get_the_permalink()).'">'.esc_html(get_the_title()).'</a></h4>';
								$result .= '</div>';
								$result .= '<div class="ac_car_type">';
									$result .= '<div class="ac_car_icon"><img src="'.PLUGIN_PATH.'images/car_icon.png" alt=""></div>';
									$result .= '<h6>'.esc_html($make).'</h6>';
								$result .= '</div>';
							$result .= '</div>';
						$result .= '</div>';
					$result .= '</div>';
				}
			}
			
		
		endwhile;
		
		if($view == 'List'){ $result .= '</div></div>'; $result .= do_action('autocar_scheduleform'); }
		
		$result .= '<div class="container">';
			ob_start();
				autocar_postsnavigation($query);
			$result .= ob_get_clean();
		$result .= '</div>';
	}
	wp_reset_postdata();
				$result .= '</div>';
			$result .= '</div>';
		//$result .= '</div>';
	$result .= '</div>';
	
	return $result;
}

add_shortcode('autocar_vehicle_type','autocar_vehicle_type_shortcode');
function autocar_vehicle_type_shortcode( $atts ){
	extract( shortcode_atts( array(
		'title' => '',
		'subtitle' => '',
		'post_cnt' => -1,
		'vehicle_type' => 'car',
		'recent_icon' => 'fa fa-car',
		'description' => '',
    ), $atts ) );
	
	$result = '';
	
	
	$result .= '<div class="recent-car">';
		$result .= '<div class="container">';
			$result .= '<div class="recent-car-content">';
			
				$result .= '<div class="row">';
					$result .= '<div class="col-md-12">';
						$result .= '<div class="section-heading">';
							$result .= '<i class="'.esc_html( $recent_icon ).'"></i>';
							$result .= '<div class="atc_sect_heading">';
								$result .= '<h2>'.esc_html( $title ).'</h2>';
								$result .= '<span>'.esc_html( $subtitle ).'</span>';
							$result .= '</div>';
						$result .= '</div>';
					$result .= '</div>';
				$result .= '</div>';
				
				
				$result .= '<div class="row">';
					global $post;
					$args = array(
						'post_type' => 'vehicle',
						'posts_per_page' => ($post_cnt == -1 ? -1 : $post_cnt),
						'vehicle_type' => $vehicle_type
						
					);
					$recent_posts = get_posts( $args );
					foreach( $recent_posts as $post ) :  setup_postdata($post);
					
						$feat_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(),'autocar_feturedpost' );
	
						$result .= '<div class="col-lg-4 col-md-4">';
						if($description == 'yes'){
							$result .= '<div class="car-item r_blog_post">';
							
								$result .= '<div class="thumb-content">';
									$result .= '<div class="car-banner-rent">';
										$result .= '<a href="'.esc_url(get_the_permalink($post->ID)).'">';
										$result .= esc_html__('Model:','autocar');
										$categories = get_the_terms($post->ID,'model');
										foreach($categories as $category) {      
											$result .= esc_html($category->name);
											break;
										}
										$result .= '</a>';
									$result .= '</div>';
									
									$text = check_is_compare_id($post->ID);
									
									$result .= '<div class="add_btn_wrapper primary-button"><a href="javascript:;" class="'.esc_attr($text['cls']).'" data-carId="'.esc_attr($post->ID).'" data-aicon="false">'.esc_html($text['txt']).'</a></div>';

									$result .= '<a href="'.esc_url(get_the_permalink()).'"><img src="'.esc_url($feat_image_url[0]).'" alt=""></a>';
								$result .= '</div>';
								
								$result .= '<div class="down-content">';
									$result .= '<a href="'.esc_url(get_the_permalink()).'"><h4>'.esc_html(get_the_title()).'</h4></a>';
									$result .= do_shortcode( "[vehicle_price]" );
									$result .= '<div class="line-dec"></div>';
									$result .= do_shortcode( '[vehicle_description]' );
									
									$result .= '<ul class="car-info">';
					
										$categories = get_the_terms($post->ID,'make');
										foreach($categories as $category) {      
											$make = $category->name;
											break;
										}
										
										$categories = get_the_terms($post->ID,'model');
										foreach($categories as $category) {      
											$model = $category->name;
											break;
										}
										
										$categories = get_the_terms($post->ID,'vehicle_type');
										foreach($categories as $category) {      
											$vehicle_type = $category->name;
											break;
										}
										
										$result .= '<li><span>'.esc_html__('Vehicle Type','autocar').'</span><p>'.esc_html($vehicle_type).'</p></li>';
										$result .= '<li><span>'.esc_html__('Make','autocar').'</span><p>'.esc_html($make).'</p></li>';
										$result .= '<li><span>'.esc_html__('Model','autocar').'</span><p>'.esc_html($model).'</p></li>';					
										//$result .= '<li><span>'.esc_html__('Model','autocar').'</span><p>'.esc_html($model).'</p></li>';
									
									$result .= '</ul>';
									
									/*$result .= '<div class="primary-button">';
										$result .= '<a href="'.esc_url(get_the_permalink()).'">'.esc_html__('Read More','autocar').'</a>';
									$result .= '</div>';*/
								$result .= '</div>';
							$result .= '</div>';
						}else{
							
							$categories = get_the_terms($post->ID,'make');
							foreach($categories as $category) {      
								$make = $category->name;
								break;
							}
							
							$result .= '<div class="recent_car_wrapper">';
								$result .= '<div class="recent_car_img">';
									$result .= '<a href="'.esc_url(get_the_permalink()).'"><img src="'.esc_url($feat_image_url[0]).'" alt=""></a>';
									$result .= '<div class="ac_price_wrapper">';
										$result .= do_shortcode( "[vehicle_price]" );
									$result .= '</div>';
									
									$text = check_is_compare_id($post->ID,'true');
									
									$result .= '<div class="ac_overlay"><span><a href="javascript:;" class="'.esc_attr($text['cls']).'" data-carId="'.esc_attr($post->ID).'" data-aicon="true" > '.$text['txt'].' </a> <a href="'.esc_url(get_permalink($post->ID)).'" ><i class="fa fa-link"></i></a></span></div>';
									
									
								$result .= '</div>';
								$result .= '<div class="ac_recent_car_content">';
									$result .= '<div class="ac_car_name">';
										$result .= '<h4><a href="'.esc_url(get_the_permalink()).'">'.esc_html(get_the_title()).'</a></h4>';
									$result .= '</div>';
									$result .= '<div class="ac_car_type">';
										$result .= '<div class="ac_car_icon"><img src="'.PLUGIN_PATH.'images/car_icon.png" alt=""></div>';
										$result .= '<h6>'.esc_html($make).'</h6>';
									$result .= '</div>';
								$result .= '</div>';
							$result .= '</div>';
						}
						$result .= '</div>';
					endforeach;
					wp_reset_postdata();

				$result .= '</div>';
			$result .= '</div>';
		$result .= '</div>';
	$result .= '</div>';
	
	
	return $result;
	
}

add_shortcode('autocar_vehicle_search','autocar_vehicle_search_shortcde');
function autocar_vehicle_search_shortcde( $atts ){
	extract( shortcode_atts( array(
		'title' => '',
		'subtitle' => '',
		'recent_icon' => 'fa fa-car',
		'search_field' => '',
    ), $atts ) );
	$result = '';
	
	$result .= '<div class="search-section">';
		$result .= '<div class="container"><div class="row">';
			$result .= '<div class="col-md-12">';
				$result .= '<div class="search-content">';
					$result .= '<div class="search-heading">';
						$result .= '<i class="'.esc_html($recent_icon).'"></i>';
						$result .='<div class="atc_sect_heading">';
						$result .= '<h2>'.esc_html($title).'</h2>';
						$result .= '<span>'.esc_html($subtitle).'</span>';
						$result .= '</div>';
					$result .= '</div>';
					$result .= '<div class="search-form">';
						$result .= '<div class="row autocar_vehicle_search">';
							$result .= do_shortcode( "[vehicle_searchform include='".esc_attr($search_field)."']" );
						$result .= '</div>';
					$result .= '</div>';
				$result .= '</div>';
			$result .= '</div></div>';
		$result .= '</div>';
	$result .= '</div>';
	
	return $result;
}
