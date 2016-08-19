<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 */
add_filter( 'rwmb_meta_boxes', 'autocar_register_meta_boxes' );
/**
 * Register meta boxes
 *
 * Remember to change "your_prefix" to actual prefix in your project
 *
 * @param array $meta_boxes List of meta boxes
 *
 * @return array
 */
function autocar_register_meta_boxes( $meta_boxes )
{
	/**
	 * prefix of meta keys (optional)
	 * Use underscore (_) at the beginning to make keys hidden
	 * Alt.: You also can make prefix empty to disable it
	 */
	// Better has an underscore as last sign
	$prefix = 'autocar_';
	// Page
	require_once get_template_directory(). '/vendor/include/metaboxes/page-metaboxes.php';
	// Post
	require_once get_template_directory(). '/vendor/include/metaboxes/post-metaboxes.php';
	// Car For Sale
	require_once get_template_directory(). '/vendor/include/metaboxes/vehicle_metabox.php';
	// Testimonial
	require_once get_template_directory(). '/vendor/include/metaboxes/testimonial-metaboxes.php';
	
	return $meta_boxes;
}