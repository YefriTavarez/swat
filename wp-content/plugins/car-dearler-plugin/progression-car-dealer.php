<?php
/*
Plugin Name: Progression Car Dealer
Plugin URI: http://cars.progressionstudios.com/
Description: Show your car inventory with WordPress
Version: 1.6
Requires at least: 3.8
Tested up to: 3.8
Author: Progression Studios
Author URI: http://progressionstudios.com/
Author Email: contact@progressionstudios.com
License: GNU General Public License v3.0
Text Domain: progression-car-dealer
Domain Path: /languages/
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Progression_Car_Dealer class.
 */
class Progression_Car_Dealer {

	public function __construct() {

		// Define constants
		define( 'CAR_DEALER_VERSION', '1.0.1' );
		define( 'CAR_DEALER_PLUGIN_DIR', untrailingslashit( plugin_dir_path( __FILE__ ) ) );
		define( 'CAR_DEALER_PLUGIN_URL', untrailingslashit( plugins_url( basename( plugin_dir_path( __FILE__ ) ), basename( __FILE__ ) ) ) );
		define( 'CAR_DEALER_PLUGIN_BASENAME', plugin_basename(__FILE__) );

		if ( ! class_exists( 'Acf' ) && ! defined ( 'ACF_LITE' ) ) {
			define( 'ACF_LITE' , true );

			// Include Advanced Custom Fields
			include( 'includes/library/acf/acf.php' );
		}
		if ( ! class_exists( 'acf_options_page_plugin' ) ) {
			include( 'includes/library/acf-options-page/acf-options-page.php' );
		}
		if ( ! function_exists( 'acf_register_flexible_content_field' ) ) {
			include( 'includes/library/acf-flexible-content/acf-flexible-content.php' );
		}
		if ( ! function_exists( 'acfgp_register_fields' ) ) {
			include( 'includes/library/acf-gallery/acf-gallery.php' );
		}

		// Include plugin files
		include( 'includes/class-car-dealer-customs.php' );
		include( 'includes/class-car-dealer-fields.php' );
		include( 'includes/class-car-dealer-shortcodes.php' );

		if ( is_admin() ) {
			include( 'includes/admin/class-car-dealer-admin.php' );
		}

		// Init classes
		$this->customs	= new Car_Dealer_Customs();
		$this->fields 	= new Car_Dealer_Fields();

		// Activation - works with symlinks
		register_activation_hook( basename( dirname( __FILE__ ) ) . '/' . basename( __FILE__ ), array( $this->customs, 'register_customs' ), 10 );
		register_activation_hook( basename( dirname( __FILE__ ) ) . '/' . basename( __FILE__ ), create_function( "", "include_once( 'includes/class-car-dealer-install.php' );" ), 10 );
		register_activation_hook( basename( dirname( __FILE__ ) ) . '/' . basename( __FILE__ ), 'flush_rewrite_rules', 15 );

		// Actions
		add_action( 'admin_init', array( $this, 'updater' ) );
		add_action( 'plugins_loaded', array( $this, 'load_plugin_textdomain' ) );
		add_action( 'switch_theme', 'flush_rewrite_rules', 15 );
		add_action( 'wp_enqueue_scripts', array( $this, 'frontend_scripts' ) );
		add_action( 'widgets_init', create_function( "", "include_once( 'includes/class-car-dealer-widgets.php' );" ) );
		add_action( 'switch_theme', array( $this->customs, 'register_customs' ), 10 );

		add_filter( 'widget_text', 'do_shortcode' );
	}

	/**
	 * Handle Updates
	 */
	public function updater() {
		if ( version_compare( CAR_DEALER_VERSION, get_option( 'car_dealer_version' ), '>' ) )
			include_once( 'includes/class-car-dealer-install.php' );
	}

	/**
	 * L10N
	 *
	 * @access public
	 * @return void
	 */
	public function load_plugin_textdomain() {
		load_plugin_textdomain( 'progression-car-dealer', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
		load_plugin_textdomain( 'acf', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/acf/' );
		load_plugin_textdomain( 'acf', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
	}

	/**
	 * Enqueue frontend_scripts
	 *
	 * @access public
	 * @return void
	 */
	public function frontend_scripts() {
		wp_register_script( 'car-dealer-script', CAR_DEALER_PLUGIN_URL . '/assets/js/car-dealer.min.js', array( 'jquery' ), CAR_DEALER_VERSION, true );
		wp_enqueue_style( 'car-dealer-style', CAR_DEALER_PLUGIN_URL . '/assets/css/car-dealer.css' );
	}
}

$GLOBALS['car_dealer'] = new Progression_Car_Dealer();



?>