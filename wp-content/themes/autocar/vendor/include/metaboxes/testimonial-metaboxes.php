<?php
$meta_boxes[] = array(
	// Meta box id, UNIQUE per meta box. Optional since 4.1.5
	'id'         => 'section-testimonial-meta',
	'title'      => esc_html__( 'Testimonial Meta Setting','autocar' ),
	'post_types' => 'testimonial',
	'context'    => 'normal',
	'priority'   => 'high',
	'autosave'   => true,
	'fields'     => array(
			array(
			'name'  => esc_html__( 'About Author', 'autocar' ),
			'id'      => "{$prefix}about_author",
			'type'    => 'text',
			'std' 	  => ''
			),
			array(
			'name'  => esc_html__( 'Review Rating', 'autocar' ),
			'id'      => "{$prefix}rivew",
			'type'    => 'text',
			'std' 	  => ''
			),
		)	
	);
?>