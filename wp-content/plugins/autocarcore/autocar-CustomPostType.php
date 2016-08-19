<?php
//============== Testimonial Strat ===============//
add_action( 'init', 'cpt_testimonial' );
if( ! function_exists( 'cpt_testimonial' ) ) {
function cpt_testimonial() {
	
	$labels = array(
		'name'                => _x( 'Testimonial', 'Testimonial', 'autocar' ),
		'singular_name'       => _x( 'Testimonial', 'Testimonial', 'autocar' ),
		'menu_name'           => __( 'Testimonial', 'autocar' ),
		'parent_item_colon'   => __( 'Testimonial', 'autocar' ),
		'all_items'           => __( 'All Testimonials', 'autocar' ),
		'view_item'           => __( 'View Testimonial', 'autocar' ),
		'add_new_item'        => __( 'Add New Testimonial', 'autocar' ),
		'add_new'             => __( 'Add New', 'autocar' ),
		'edit_item'           => __( 'Edit Testimonial', 'autocar' ),
		'update_item'         => __( 'Update Testimonial', 'autocar' ),
		'search_items'        => __( 'Search Testimonial', 'autocar' ),
		'not_found'           => __( 'Not Found', 'autocar' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'autocar' ),
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Description.', 'autocar' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'testimonial' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail' )
	);
	
	register_post_type( 'testimonial', $args );
	
	}
}
//============== Testimonial End ===============//