<?php
$meta_boxes[] = array(
	// Meta box id, UNIQUE per meta box. Optional since 4.1.5
	'id'         => 'section-page-meta',
	'title'      => esc_html__( 'Page Meta Setting','autocar' ),
	'post_types' => 'page',
	'context'    => 'normal',
	'priority'   => 'high',
	'autosave'   => true,
	'fields'     => array(
		array(
			'name' => esc_html__('Page Sidebar Position', 'autocar'),
			'desc' => '',
			'id' => "{$prefix}page_sidebarposition",
			'type' => 'image_select',
			'std' => 'full',
			'options' => array(
				'full'  =>  get_template_directory_uri(). '/assets/images/1col.png',
				'left'  =>  get_template_directory_uri(). '/assets/images/2cl.png',
				'right' =>  get_template_directory_uri(). '/assets/images/2cr.png'
				)
			),
			array(
			'name'  => esc_html__( 'Page Sub Title', 'autocar' ),
			'id'      => "{$prefix}sub_title",
			'type'    => 'text',
			'std' 	  => ''
			),
		)	
	);
?>