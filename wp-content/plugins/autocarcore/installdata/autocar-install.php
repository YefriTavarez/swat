<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! class_exists( 'AUTOCAR_Install' ) ) :

/**
 * AUTOCAR_Install Class
 */
class AUTOCAR_Install { 
	
	public function __construct() {
		add_action('autocar_after_sample_data_import',array($this,'autocar_setup_settings'),20,1);
		add_action('autocar_after_sample_data_import',array($this,'vibe_import_sample_slider'),20,1);
		add_action('autocar_after_sample_data_import',array($this,'autocar_flush_permalinks'),100);
		add_action( 'autocar_after_sample_data_import', array($this,'reset_permalinks') );
		add_action('admin_menu',array($this,'vibe_remove_default_import'),1);
		add_action( 'admin_menu', array( $this, 'autocar_installation_page' ) );
	}
	
	public function autocar_installation_page(){
		add_submenu_page( 'themes.php', __('Import Demo Data'), __('Import Demo Data'), 'manage_options', 'import_demo_data', array($this,'autocar_installation_setting') );
	}
	
	public function autocar_import_demo_data(){
		if(isset($_POST['autocarimportdemodata']) && $_POST['autocarimportdemodata'] == 'import'){
			$file = 'autocar';
			require_once ABSPATH . 'wp-admin/includes/import.php';
			$file_path = apply_filters('autocar_setup_import_file_path',plugin_dir_path( dirname( __FILE__ ) ) . "/installdata/data/$file/theme_data.xml",$file);
			if( !class_exists('WP_Import') ){
				require_once plugin_dir_path( dirname( __FILE__ ) ) . 'installdata/importer/wordpress-importer.php';
			}
			
			if( class_exists('WP_Import') ){
				if( file_exists($file_path) ){
					
					do_action('autocar_before_sample_data_import',$file);
					$WP_Import = new WP_Import();  
					if ( ! function_exists ( 'wp_insert_category' ) )
						include ( ABSPATH . 'wp-admin/includes/taxonomy.php' );
					if ( ! function_exists ( 'post_exists' ) )
						include ( ABSPATH . 'wp-admin/includes/post.php' );
					if ( ! function_exists ( 'comment_exists' ) )
						include ( ABSPATH . 'wp-admin/includes/comment.php' );
					
					$WP_Import->fetch_attachments = true;       
					$WP_Import->allow_fetch_attachments();

					$WP_Import->import( $file_path ); 
					
					do_action('autocar_after_sample_data_import',$file);
					
					update_option('autocar_demo_import_data',true);
					
					return true;
					
				}else{
					return 'File doesn\'t exist.';
				}
			}else{
				return 'WP_Import class doesn\'t exist.';
			}
		}
	}
	
	public function autocar_installation_setting(){
		$chkimport = get_option('autocar_demo_import_data');
		$return = '';
		if($chkimport != true){
			$return = $this->autocar_import_demo_data();
		}
		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'installdata/settings.php';
	}
	
	function autocar_setup_settings($file){
		global $wpdb;
		
		update_option('permalink_structure','/%postname%/');
		
			 $wid_data = plugin_dir_path( dirname( __FILE__ ) ) . "/installdata/data/$file/widgets.wie";
			 include plugin_dir_path( dirname( __FILE__ ) ) . "/installdata/importer/widget_import.php"; 
			  wie_process_import_file($wid_data); 
			  
			  // Redux import redux_data.wie
			  $redux_file = plugin_dir_path( dirname( __FILE__ ) ) . "/installdata/data/$file/redux_data.wie";
			  $redux_data = file_get_contents( $redux_file );
			  $redux_data = json_decode( $redux_data, true ); 
			  $redux_data = maybe_unserialize( $redux_data );
			  
			  // Only if there is data
				if ( !empty( $redux_data ) || is_array( $redux_data ) ) {
					update_option( 'autocar_data', $redux_data );
				} 
			  
			// Setup Homepage   
			$page = 'home';  
			$page_id = $wpdb->get_var( $wpdb->prepare( "SELECT ID FROM " . $wpdb->posts . " WHERE post_type='page' AND post_name = %s LIMIT 1;", "{$page}" ) );	
			if(isset($page_id) && is_numeric($page_id)){
				update_option('show_on_front','page');
				update_option('page_on_front',$page_id);
			}
			$main_menu   = get_term_by('name', 'Main Menu', 'nav_menu');
			set_theme_mod( 'nav_menu_locations', array(
					'primary' => $main_menu->term_id
				)
			);
			//End Menu setup
			
			// Set WooCommerce Pages
			$pages=array(
				'cart'=>'woocommerce_cart_page_id',
				'checkout'=>'woocommerce_checkout_page_id',
				'myaccount' => 'woocommerce_myaccount_page_id',
				'menus' => 'woocommerce_shop_page_id'
				);
			foreach($pages as $page => $option_name){
				$page_id = $wpdb->get_var( $wpdb->prepare( "SELECT ID FROM " . $wpdb->posts . " WHERE post_type='page' AND post_name = %s LIMIT 1;", "{$page}" ) );	
				if(isset($page_id) && is_numeric($page_id)){
					update_option($option_name,$page_id);
				}	
			}
			
			//Set WooCommerce options
			delete_option( '_wc_needs_pages' );
			delete_option( '_wc_needs_update' );
			delete_transient( '_wc_activation_redirect' );
			// End WooCommerce setup
			  
			// Import Sample Slider
			//$this->vibe_import_sample_slider($file);
		//}
	}

	function vibe_remove_default_import(){
		if(isset($_GET['page']) && $_GET['page'] == 'layerslider' && isset($_GET['action']) && $_GET['action'] == 'import_sample') { 	
			remove_action(	'admin_init' , 'layerslider_import_sample_slider');
			add_action(		'admin_init' , array($this,'vibe_import_sample_slider'));
		}
	}
	function vibe_import_sample_slider($file) {
		$sample_file = apply_filters('autocar_setup_layerslider_file',plugin_dir_path( dirname( __FILE__ ) ) . "/installdata/data/$file/sample_sliders.txt");
		
		if(!file_exists($sample_file))  
			return;  

		$sample_slider = json_decode(base64_decode(file_get_contents($sample_file)), true);
		foreach($sample_slider as $sliderkey => $slider) {
			foreach($sample_slider[$sliderkey]['layers'] as $layerkey => $layer) {
				if(!empty($sample_slider[$sliderkey]['layers'][$layerkey]['properties']['background'])) {
					$sample_slider[$sliderkey]['layers'][$layerkey]['properties']['background'] = plugins_url('autocarcore') . '/installdata/data/uploads/'.basename($layer['properties']['background']);
				}
				if(!empty($sample_slider[$sliderkey]['layers'][$layerkey]['properties']['thumbnail'])) {
					$sample_slider[$sliderkey]['layers'][$layerkey]['properties']['thumbnail'] = plugins_url('autocarcore') . '/installdata/data/uploads/'.basename($layer['properties']['thumbnail']);
				}
				if(isset($layer['sublayers']) && !empty($layer['sublayers'])) {
					foreach($layer['sublayers'] as $sublayerkey => $sublayer) {
						if($sublayer['type'] == 'img') {
							$sample_slider[$sliderkey]['layers'][$layerkey]['sublayers'][$sublayerkey]['image'] = plugins_url('autocarcore') . '/installdata/data/uploads/'.basename($sublayer['image']);
						}
					}
				}
			}
		}
	
		global $wpdb;
		$table_name = $wpdb->prefix . "layerslider";
		foreach($sample_slider as $key => $val) {
			$wpdb->query(
				$wpdb->prepare("INSERT INTO $table_name
									(name, data, date_c, date_m)
								VALUES (%s, %s, %d, %d)",
								$val['properties']['title'],
								json_encode($val),
								time(),
								time()
				)
			);
		}
	}
		
	function autocar_flush_permalinks(){
		flush_rewrite_rules();
		flush_rewrite_rules(false);
	}
	
	function reset_permalinks() {
		global $wp_rewrite;
		$wp_rewrite->set_permalink_structure('/%postname%/');
		$wp_rewrite->flush_rules();
	}
}

endif;

new AUTOCAR_Install();

