<?php
/**
 * autocar functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package autocar
 */

define('AUTOCAR_PATH', get_template_directory_uri() ); 
define('AUTOCAR_PATH_SERVER_PATH', get_template_directory() );

if ( ! function_exists( 'autocar_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function autocar_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on autocar, use a find and replace
	 * to change 'autocar' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'autocar', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	//add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'autocar' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'autocar_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // autocar_setup
add_action( 'after_setup_theme', 'autocar_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function autocar_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'autocar_content_width', 640 );
}
add_action( 'after_setup_theme', 'autocar_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function autocar_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'autocar' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__('This sidebar is used for page, post & custom post type which will be displayed on left & right sidebar.','autocar'),
		'before_widget' => '<div class="item"><aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside></div>',
		'before_title'  => '<div class="sep-section-heading"><h2 class="widget-title">',
		'after_title'   => '</h2></div>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar', 'autocar' ),
		'id'            => 'footer-1',
		'description'   => esc_html__('This sidebar is used for footer section.','autocar'),
		'before_widget' => '<div class="footer-item">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2><div class="line-dec"></div>',
	) );
}
add_action( 'widgets_init', 'autocar_widgets_init' );
/**
 * Add custom size for the post
 */
if ( function_exists( 'add_image_size' ) ) {
	add_theme_support( 'post-thumbnails' );
		if ( function_exists( 'add_image_size' ) ) {
			add_image_size( 'autocar_blog_grid', 360, 227, true );
			add_image_size( 'autocar_recentpost', 80, 80, true );
			add_image_size( 'autocar_feturedpost', 330, 214, true );
			add_image_size( 'autocar_who_we_are', 555, 312, true );
			add_image_size( 'autocar_vehicle', 285, 185, true );
			add_image_size( 'autocar_vehicle_2', 533, 310, true );
			add_image_size( 'autocar_vehicle_3', 338, 217, true );
			add_image_size( 'autocar_vehicle_4', 241, 173, true );
		}
}

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/*
 * Load redux-framework
 */
if (file_exists( get_template_directory() . '/vendor/admin/framework.php' )) {
    require_once get_template_directory() . '/vendor/admin/framework.php';
}
if (file_exists( get_template_directory() . '/vendor/admin/autocar-config.php' )) {
    require_once get_template_directory() . '/vendor/admin/autocar-config.php';
}

/* return redux data */
if ( !function_exists( 'autocar_reduxData' ) ) {
	function autocar_reduxData(){
		global $autocar_data;
		return $autocar_data;
	}
}
/* return redux data */

/* return global post data */
if ( !function_exists( 'autocar_postData' ) ) {
	function autocar_postData(){
		global $post;
		return $post;
	}
}
/* return global post data */

require_once get_template_directory().'/vendor/include/autocar-enqueue.php';
require_once get_template_directory().'/vendor/autocar-function.php';
require_once get_template_directory().'/vendor/theme_plugin/plugin-activate-config.php';
require_once get_template_directory().'/vendor/include/meta-option.php';
require_once get_template_directory().'/vendor/shortcodes.php';

