<?php 
/*
Plugin Name: WM Zoom
Plugin URI: http://websitebuilderbd.com/plugins/wordpress-wm-zoom/
Description: JQuery zoom plugin transfered into wordpress WM Zoom. we are able to include maximum features in the wodpress zoom plugin for instance Basic Zoom, Tints, Gallery & Lightbox, Window Position, Inner Zoom, Lens Zoom, Fade in / Fade Out, External Controls, Easing, Mousewheel Zoom, Zoom Window Size, Image Constrain and also have supper admin flexibility. Any one can lownload and use it easily for his own wordpress website and can order for premium version. let's start to download free WM zoom wordpress plugin and use it.  
Author: MD. Mamunur Roshid
Version: 1.0
Author URI: http://websitebuilderbd.com/plugins/
*/

/* Adding Latest jQuery from Wordpress */
function WM_Zoom_latest_jquery() {
	wp_enqueue_script('jquery');
}
add_action('init', 'WM_Zoom_latest_jquery');

function WM_Zoom_all_files() {
        
       
        wp_enqueue_script( 'jquery-active-id', plugins_url( '/js/active-js.js', __FILE__ ), array('jquery'),'1.0',false );
        wp_enqueue_script( 'jquery-elevateZoom-id', plugins_url( '/js/jquery.elevateZoom-3.0.8.min.js', __FILE__ ), array('jquery'),'1.0',false );
        wp_enqueue_style( 'jquery-elevateZoom-css', plugins_url( '/css/style.css', __FILE__ ));
        
    }
add_action('init','WM_Zoom_all_files');

function WM_Gallery_LightboxZoom_shortcode($atts, $content = null){

extract( shortcode_atts( array(
		'small_img' => '',
		'large_img' => '',
		'thumb_img' => '',
		'small_img1' => '',
		'large_img1' => '',
		'thumb_img1' => '',
		
		
		
	), $atts) );
	
			return '
			<img id="img_01" src="'.$small_img.'" data-zoom-image="'.$large_img.'"/>
			

			<div id="gallery_01">
			 
			  <a class="active" href="#" data-image="'.$small_img.'" data-zoom-image="'.$large_img.'">
				<img id="img_01" src="'.$thumb_img.'" />
			  </a>
				
				'.do_shortcode($content).'
			 

			</div>
						
			';
        
}
add_shortcode('Gallery1', 'WM_Gallery_LightboxZoom_shortcode');


function WM_Gallery1_LightboxZoom_shortcode($atts, $content = null){

extract( shortcode_atts( array(
		
		'small_img1' => '',
		'large_img1' => '',
		'thumb_img1' => '',
		
		
		
	), $atts) );
	
			return '
			<a href="#" data-image="'.$small_img1.'" data-zoom-image="'.$large_img1.'">
					<img id="img_01" src="'.$thumb_img1.'" />
				  </a>
						
			';
        
}
add_shortcode('Gallery2', 'WM_Gallery1_LightboxZoom_shortcode');



function WM_Mousewheel_Zoom_shortcode($atts, $content = null){

extract( shortcode_atts( array(
		'small_img' => '',
		'large_img' => '',
		
		
		
		
	), $atts) );
	
			return '
			<img id="zoom_mw" src="'.$small_img.'" data-zoom-image="'.$large_img.'"/>
			
			';
        
}
add_shortcode('WM_Mousewheel_Zoom', 'WM_Mousewheel_Zoom_shortcode');
add_filter('widget_text', 'do_shortcode');

function WM_Lens_Zoom_shortcode($atts, $content = null){

extract( shortcode_atts( array(
		'small_img' => '',
		'large_img' => '',
		
		
		
		
	), $atts) );
	
			return '
			<img id="zoom_07" src="'.$small_img.'" data-zoom-image="'.$large_img.'"/>
			
			';
        
}
add_shortcode('WM_Lens_Zoom', 'WM_Lens_Zoom_shortcode');
add_filter('widget_text', 'do_shortcode');

function WM_Inner_Zoom_shortcode($atts, $content = null){

extract( shortcode_atts( array(
		'small_img' => '',
		'large_img' => '',
		
		
		
		
	), $atts) );
	
			return '
			<img id="zoom_05" src="'.$small_img.'" data-zoom-image="'.$large_img.'"/>
			
			';
        
}
add_shortcode('WM_Inner_Zoom', 'WM_Inner_Zoom_shortcode');
add_filter('widget_text', 'do_shortcode');

function WM_Tints_shortcode($atts, $content = null){

extract( shortcode_atts( array(
		'small_img' => '',
		'large_img' => '',
		
		
		
		
	), $atts) );
	
			return '
			<img id="zoom_02" src="'.$small_img.'" data-zoom-image="'.$large_img.'"/>
			
			';
        
}
add_shortcode('Tints_zoom', 'WM_Tints_shortcode');
add_filter('widget_text', 'do_shortcode');

function WM_Zoom_01_shortcode($atts, $content = null){

extract( shortcode_atts( array(
		'small_img' => '',
		'large_img' => '',
		
		
		
		
	), $atts) );
	
			return '
			<img id="zoom_01" src="'.$small_img.'" data-zoom-image="'.$large_img.'"/>
			
			';
        
}
add_shortcode('basic_zoom', 'WM_Zoom_01_shortcode');

add_filter('widget_text', 'do_shortcode');





	
?>