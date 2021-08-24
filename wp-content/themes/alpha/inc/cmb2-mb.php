<?php 
add_action( 'cmb2_init', 'cmb2_add_image_info_metabox' );
function cmb2_add_image_info_metabox() {
	// if(isset($_REQUEST['post']) || isset($_REQUEST['post_ID'])){
	// 	$post_id = empty($_REQUEST['post_ID']) ? $_REQUEST['post'] : $_REQUEST['post_ID'];
	// }
	// $post_format = get_post_format($post_id);
	// if($post_format == "image"){}

	$prefix = '_alpha_';

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'image_information',
		'title'        => __( 'Image Information', 'alpha' ),
		'object_types' => array( 'post' ),
		'context'      => 'normal',
		'priority'     => 'default',
	) );

	$cmb->add_field( array(
		'name' => __( 'Camera Model', 'alpha' ),
		'id' => $prefix . 'camera_model',
		'type' => 'text',
		'default' => 'canon',
	) );

	$cmb->add_field( array(
		'name' => __( 'Location', 'alpha' ),
		'id' => $prefix . 'location',
		'type' => 'text',
	) );

	$cmb->add_field( array(
		'name' => __( 'Date', 'alpha' ),
		'id' => $prefix . 'date',
		'type' => 'text_date',
	) );

	$cmb->add_field( array(
		'name' => __( 'Licensed', 'alpha' ),
		'id' => $prefix . 'licensed',
		'type' => 'checkbox',
	) );

	$cmb->add_field( array(
		'name' => __( 'License Information', 'alpha' ),
		'id' => $prefix . 'license_information',
		'type' => 'textarea',
		'attributes' => array(
			// 'required'            => true, // Will be required only if visible.
			'data-conditional-id' => $prefix . 'licensed',
		),
	) );

	$cmb->add_field( array(
		'name' => __( 'image', 'alpha' ),
		'id' => $prefix . 'image',
		'type' => 'file',
	) );
	$cmb->add_field( array(
		'name' => __( 'Upload Resume', 'alpha' ),
		'id' => $prefix . 'upload_resume',
		'type' => 'file',
		'text' => array(
			'add_upload_file_text' => __('Upload pdf', 'alpha'),
		),
		'query_args' => array(
			'type' => array('application/pdf'),
		),
		'options' => array(
			'url' => false,
		),
	) );
	

}

// =========pricing table thats for repeateable fields  

add_action( 'cmb2_init', 'cmb2_add_pricingtable' );
function cmb2_add_pricingtable() {

	$prefix = '_alpha_pt_';

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'pricing_table',
		'title'        => __( 'Pricing Table', 'alpha' ),
		'object_types' => array( 'page' ),
		'context'      => 'normal',
		'priority'     => 'default',
	) );

	$group = $cmb->add_field( array(
		'name' => __( 'Pricing Table', 'alpha' ),
		'id' => $prefix . 'pricing_table',
		'type' => 'group',
	) );

	$cmb->add_group_field($group, array(
		'name' => __( 'Pricing Caption', 'alpha' ),
		'id' => $prefix . 'pricing_caption',
		'type' => 'text',
	) );

	$cmb->add_group_field($group, array(
		'name' => __( 'Pricing Options', 'alpha' ),
		'id' => $prefix . 'pricing_options',
		'type' => 'text',
		'repeatable' => true,
	) );
	$cmb->add_group_field($group, array(
		'name' => __( 'Price', 'alpha' ),
		'id' => $prefix . 'price',
		'type' => 'text',
	) );
	

}

// ==========services 

add_action( 'cmb2_init', 'alpha_add_services' );
function alpha_add_services() {

	$prefix = '_alpha_';

	$cmb = new_cmb2_box( array(
		'id'           => $prefix . 'services',
		'title'        => __( 'Services', 'alpha' ),
		'object_types' => array( 'page'),
		'context'      => 'normal',
		'priority'     => 'default',
	) );
	$service = $cmb->add_field( array(
		'name' => __( 'Service', 'alpha' ),
		'id' => $prefix . 'service',
		'type' => 'group',
	) );

	$cmb->add_group_field($service, array(
		'name' => __( 'icon', 'alpha' ),
		'id' => $prefix . 'icon',
		'type' => 'text',
	) );

	$cmb->add_group_field($service, array(
		'name' => __( 'title', 'alpha' ),
		'id' => $prefix . 'title',
		'type' => 'text',
	) );

	$cmb->add_group_field($service, array(
		'name' => __( 'content', 'alpha' ),
		'id' => $prefix . 'content',
		'type' => 'textarea',
	) );

}