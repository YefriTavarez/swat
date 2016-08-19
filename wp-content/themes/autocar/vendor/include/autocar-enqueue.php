<?php
/**
 * Enqueue scripts and styles.
 */
function autocar_scripts() {
	
	global $autocar_data;
	if(isset($autocar_data['autocar_theme_colors'])){
		$color = $autocar_data['autocar_theme_colors'];
	}

/********========Start CSS ========********/
	wp_register_style('autocar-default', get_stylesheet_uri(), array(), '1', 'all');
	wp_register_style('autocar-fontRoboto', 'http://fonts.googleapis.com/css?family=Roboto:400,300,500,700', array(), '1', 'all');
	wp_register_style('autocar-bootstrap', AUTOCAR_PATH . '/assets/css/bootstrap.css', array(), '1', 'all');
	wp_register_style('autocar-animate', AUTOCAR_PATH . '/assets/css/animate.css', array(), '1', 'all');
	wp_register_style('autocar-line-icons', AUTOCAR_PATH . '/assets/css/simple-line-icons.css', array(), '1', 'all');
	wp_register_style('autocar-fontAwesome', AUTOCAR_PATH . '/assets/css/font-awesome.min.css', array(), '1', 'all');
	wp_register_style('autocar-autocar-style', AUTOCAR_PATH . '/assets/css/autocar.css', array(), '1', 'all');
	wp_register_style('autocar-setting', AUTOCAR_PATH . '/assets/rs-plugin/css/settings.css', array(), '1', 'all');
	wp_register_style('autocar-slick', AUTOCAR_PATH . '/assets/css/autocar-less/flexslider.css', array(), '1', 'all');
	//wp_register_style('autocar-ui-slider', AUTOCAR_PATH . '/assets/css/jquery-ui-slider.css', array(), '1', 'all');
	wp_register_style('autocar-bootstrap-slider', AUTOCAR_PATH . '/assets/css/bootstrap-slider.css', array(), '1', 'all');
	
	//Colors Css Start
	wp_register_style('autocar_alizarin', AUTOCAR_PATH . '/assets/css/colors/alizarin.css', array(), '1', 'all');
	wp_register_style('autocar_blue', AUTOCAR_PATH . '/assets/css/colors/blue.css', array(), '1', 'all');
	wp_register_style('autocar_cinnabar', AUTOCAR_PATH . '/assets/css/colors/cinnabar.css', array(), '1', 'all');
	wp_register_style('autocar_mantis', AUTOCAR_PATH . '/assets/css/colors/mantis.css', array(), '1', 'all');
	wp_register_style('autocar_mongoose', AUTOCAR_PATH . '/assets/css/colors/mongoose.css', array(), '1', 'all');
	wp_register_style('autocar_orange', AUTOCAR_PATH . '/assets/css/colors/orange.css', array(), '1', 'all');
	wp_register_style('autocar_purple', AUTOCAR_PATH . '/assets/css/colors/purple.css', array(), '1', 'all');
	
	wp_enqueue_style('autocar-default');
	wp_enqueue_style('autocar-slick');
	wp_enqueue_style('autocar-fontRoboto');
	wp_enqueue_style('autocar-bootstrap'); 
	wp_enqueue_style('autocar-animate');
	wp_enqueue_style('autocar-line-icons');
	wp_enqueue_style('autocar-fontAwesome');
	wp_enqueue_style('autocar-autocar-style');
	
	wp_enqueue_style('autocar-setting');
	wp_enqueue_style('autocar-bootstrap-slider');
	if( $color == 'alizarin' ){
		wp_enqueue_style('autocar_alizarin');
	}
	elseif( $color == 'blue' ){
		wp_enqueue_style('autocar_blue');
	}
	elseif( $color == 'cinnabar' ){
		wp_enqueue_style('autocar_cinnabar');
	}
	elseif( $color == 'mantis' ){
		wp_enqueue_style('autocar_mantis');
	}
	elseif( $color == 'mongoose' ){
		wp_enqueue_style('autocar_mongoose');
	}
	elseif( $color == 'orange' ){
		wp_enqueue_style('autocar_orange');
	}
	elseif( $color == 'purple' ){
		wp_enqueue_style('autocar_purple');
	}
	wp_enqueue_style('autocar-colorchange','#');
	
/********========End CSS ========********/

/********========Start Scripts ========********/

	wp_register_script('autocar-bootstrapjs', AUTOCAR_PATH . '/assets/js/bootstrap.min.js' , array('jquery'),null,true);
	wp_register_script('autocar-pluginjs', AUTOCAR_PATH . '/assets/js/plugins.js' , array('jquery'),null,true);
	
	wp_register_script('autocar-customjs', AUTOCAR_PATH . '/assets/js/custom.js' , array('jquery'),null,true);
	
	wp_register_script('autocar-googlemapjs', 'http://maps.google.com/maps/api/js?sensor=true' , array('jquery'),null,true);
	
	wp_register_script('autocar-contactmapjs', AUTOCAR_PATH . '/assets/js/jquery.gmap3.min.js' , array('jquery'),null,true);
	
	wp_register_script('autocar-slickjs', AUTOCAR_PATH . '/assets/js/slick.js' , array('jquery'),null,true);
	wp_register_script('autocar-bslider', AUTOCAR_PATH . '/assets/js/bootstrap-slider.min.js' , array('jquery'),null,true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	wp_enqueue_script('autocar-bootstrapjs');
	wp_enqueue_script('autocar-pluginjs');
	wp_enqueue_script('autocar-contactmapjs');
	wp_enqueue_script('autocar-slickjs');
	wp_enqueue_script('autocar-customjs');
	
	wp_localize_script( 'autocar-customjs', 'ajaxobject', array(
		'ajaxurl' => admin_url( 'admin-ajax.php' )
	));
	
	//wp_enqueue_script('jquery-ui-slider');	
	wp_enqueue_script('autocar-bslider');	
	
	wp_register_style('autocar-datetimepickercss', AUTOCAR_PATH . '/assets/css/jquery.datetimepicker.css', array(), '1', 'all');	
	wp_register_script('autocar-datetimepickerjs', AUTOCAR_PATH . '/assets/js/jquery.datetimepicker.full.min.js' , array('jquery'),null,true);
	
/********========End Script ========********/
}
add_action( 'wp_enqueue_scripts', 'autocar_scripts' );

function autocar_add_editor_styles() {
    add_editor_style( AUTOCAR_PATH . '/assets/css/custom-editor-style.css' );
}
add_action( 'admin_init', 'autocar_add_editor_styles' );
add_action('admin_enqueue_scripts','autocar_adminload_styles'); 
function autocar_adminload_styles(){ 
	wp_enqueue_style('admin_customstyle', AUTOCAR_PATH. '/assets/css/admin-customstyle.css');
}