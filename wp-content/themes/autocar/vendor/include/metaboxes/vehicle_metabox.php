<?php
$meta_boxes[] = array(
	'id'         => 'autocar_vehicle',
	'title'      => esc_html__( 'Autocar Setting', 'autocar' ),
	'post_types' => 'vehicle',
	'context'    => 'normal',
	'priority'   => 'high',
	'autosave'   => true,
	'fields'     => array(
		array(
			'name'  => esc_html__( 'Subtitle', 'autocar' ),
			'id'    => "{$prefix}vehicle_subtitle",
			'desc'  => esc_html__( '', 'autocar' ),
			'type'  => 'text',
			'std'   => esc_html__( '', 'autocar' ),
		),
		array(
			'name'    => esc_html__( 'Choose option for single page style.', 'autocar' ),
			'id'      => "{$prefix}single_page_style",
			'type'    => 'radio',
			// Array of 'value' => 'Label' pairs for radio options.
			// Note: the 'value' is stored in meta field, not the 'Label'
			'options' => array(
				'style1' => esc_html__( 'Style one', 'autocar' ),
				'style2' => esc_html__( 'Style two', 'autocar' ),
			),
		),
		array(
			'name'  => esc_html__( 'Contact Information', 'autocar' ),
			'id'    => "{$prefix}v_contact_info",
			'desc'  => esc_html__( 'use option style two', 'autocar' ),
			'type'  => 'textarea',
			'std'   => esc_html__( '', 'autocar' ),
		),
		array(
			'name'  => esc_html__( 'Phone Number', 'autocar' ),
			'id'    => "{$prefix}v_phonenumber",
			'desc'  => esc_html__( 'use option style one and style two', 'autocar' ),
			'type'  => 'text',
			'std'   => esc_html__( '', 'autocar' ),
		),
		array(
			'name'  => esc_html__( 'Emial ID', 'autocar' ),
			'id'    => "{$prefix}v_emialID",
			'desc'  => esc_html__( 'use option style one and style two', 'autocar' ),
			'type'  => 'text',
			'std'   => esc_html__( '', 'autocar' ),
		),
		array(
			'name'  => esc_html__( 'More Description', 'autocar' ),
			'id'    => "{$prefix}v_desc",
			'desc'  => esc_html__( 'use option style two', 'autocar' ),
			'type'  => 'textarea',
			'std'   => esc_html__( '', 'autocar' ),
		),
		array(
			'name'  => esc_html__( 'Additional Features', 'autocar' ),
			'id'    => "{$prefix}v_feature",
			'desc'  => esc_html__( 'use option style two', 'autocar' ),
			'type'  => 'textarea',
			'std'   => esc_html__( '', 'autocar' ),
			'placeholder' => 'separate with comma'
		),
		array(
			'name'  => esc_html__( 'Upload brochure', 'autocar' ),
			'id'    => "{$prefix}v_brochure",
			'desc'  => esc_html__( '', 'autocar' ),
			'type'  => 'file_advanced',
			'max_file_uploads'  => 1,
			'std'   => esc_html__( '', 'autocar' ),
			'placeholder' => ''
		),
	)	
);	