<?php
$meta_boxes[] = array(
	// Meta box id, UNIQUE per meta box. Optional since 4.1.5
	'id'         => 'section-post-meta',
	'title'      => esc_html__( 'Post Meta Setting','autocar' ),
	'post_types' => 'post',
	'context'    => 'normal',
	'priority'   => 'high',
	'autosave'   => true,
	'fields'     => array(
		array(
			'name' => esc_html__('Post Sidebar Position', 'autocar'),
			'desc' => 'This sidebar position works on post single page.',
			'id' => "{$prefix}post_sidebarposition",
			'type' => 'image_select',
			'std' => 'right',
			'options' => array(
				'full'  =>  get_template_directory_uri(). '/assets/images/1col.png',
				'left'  =>  get_template_directory_uri(). '/assets/images/2cl.png',
				'right' =>  get_template_directory_uri(). '/assets/images/2cr.png'
				)
			),
			array(
				'name' => esc_html__('Post Sub Title', 'autocar'),
				'desc' => '',
				'id' => "{$prefix}post_sub_title",
				'type' => 'text',
				'std' => ''
			)
		)	
	);
?>