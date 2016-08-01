<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the itstar directory)
 *
 * Be sure to replace all instances of 'itstar_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Demo_itstar
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/itstar
 */

/**
 * Get the bootstrap! If using the plugin from wordpress.org, REMOVE THIS!
 */

if ( file_exists( dirname( __FILE__ ) . '/cmb2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/cmb2/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/CMB2/init.php';
}


function ed_metabox_include_front_page( $display, $meta_box ) {
    if ( ! isset( $meta_box['show_on']['key'] ) ) {
        return $display;
    }

    if ( 'front-page' !== $meta_box['show_on']['key'] ) {
        return $display;
    }

    $post_id = 0;

    // If we're showing it based on ID, get the current ID
    if ( isset( $_GET['post'] ) ) {
        $post_id = $_GET['post'];
    } elseif ( isset( $_POST['post_ID'] ) ) {
        $post_id = $_POST['post_ID'];
    }

    if ( ! $post_id ) {
        return !$display;
    }

    // Get ID of page set as front page, 0 if there isn't one
    $front_page = get_option( 'page_on_front' );

    // there is a front page set and we're on it!
    return $post_id == $front_page;
}
//add_filter( 'cmb2_show_on', 'ed_metabox_include_front_page', 10, 2 );
/**
 * Conditionally displays a metabox when used as a callback in the 'show_on_cb' itstar_box parameter
 *
 * @param  itstar object $cmb itstar object
 *
 * @return bool             True if metabox should show
 */
function itstar_show_if_front_page( $cmb ) {
	// Don't show this metabox if it's not the front page template
	if ( $cmb->object_id !== get_option( 'page_on_front' ) ) {
		return false;
	}
	return true;
}

/**
 * Conditionally displays a field when used as a callback in the 'show_on_cb' field parameter
 *
 * @param  itstar_Field object $field Field object
 *
 * @return bool                     True if metabox should show
 */
function itstar_hide_if_no_cats( $field ) {
	// Don't show this field if not in the cats category
	if ( ! has_tag( 'cats', $field->object_id ) ) {
		return false;
	}
	return true;
}

/**
 * Conditionally displays a message if the $post_id is 2
 *
 * @param  array             $field_args Array of field parameters
 * @param  itstar_Field object $field      Field object
 */
function itstar_before_row_if_2( $field_args, $field ) {
	if ( 2 == $field->object_id ) {
		echo '<p>Testing <b>"before_row"</b> parameter (on $post_id 2)</p>';
	} else {
		echo '<p>Testing <b>"before_row"</b> parameter (<b>NOT</b> on $post_id 2)</p>';
	}
}




/******************************************************************/
/*--------------------Product Features-------------------------------*/
/******************************************************************/
// add_action( 'cmb2_init', 'itstar_register_product_features_metabox' );
function itstar_register_product_features_metabox() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_itstar_group_';
	
	$cmb_group = new_cmb2_box( array(
		'id'           => $prefix . 'product_features',
		'title'        => __( 'Product Features', 'itstar' ),
		'object_types' => array( 'product', ),
	) );

	// $group_field_id is the field id string, so in this case: $prefix . 'demo'
	$group_field_id = $cmb_group->add_field( array(
		'id'          => $prefix.'feature',
		'type'        => 'group',
		'description' => __( 'Add Product features', 'itstar' ),
		'options'     => array(
			'group_title'   => __( 'feature {#}', 'itstar' ), // {#} gets replaced by row number
			'add_button'    => __( 'Add Another feature', 'itstar' ),
			'remove_button' => __( 'Remove feature', 'itstar' ),
			'sortable'      => true, // beta
		),
	) );

		
 	
 	$cmb_group->add_group_field($group_field_id , array(
		'name'    => __( 'Feature Name', 'itstar' ),
		'desc'    => __( 'write the feature name ', 'itstar' ),
		'id'      => 'feature_name',
		'type'    => 'text',
		
			
	) );
	
	$cmb_group->add_group_field($group_field_id , array(
		'name'    => __( 'Feature Description ', 'itstar' ),
		'desc'    => __( 'write the feature Description if needed', 'itstar' ),
		'id'      => 'feature_desc',
		'type'    => 'textarea',
		
			
	) );

	$cmb_group->add_group_field($group_field_id , array(
		'name'         => __( 'Images', 'itstar' ),
		'desc'         => __( 'Upload or add multiple images/attachments.', 'itstar' ),
		'id'           => $prefix . 'image_list',
		'type'         => 'file_list',
		'preview_size' => array( 54	, 54 ), // Default: array( 50, 50 )
	) );
	
	
}

/******************************************************************/
/*--------------------Project Images-------------------------------*/
/******************************************************************/
//add_action( 'cmb2_init', 'itstar_register_project_date_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_init' hook.
 */
function itstar_register_project_date_metabox() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_itstar_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'project_date',
		'title'         => __( 'Project Date', 'itstar' ),
		'object_types'  => array( 'project' ), // Post type
		// 'show_on_cb' => 'itstar_show_if_front_page', // function should return a bool value
		// 'context'    => 'normal',
		// 'priority'   => 'high',
		// 'show_names' => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
	) );


	
	$cmb_demo->add_field( array(
		'name'         => __( 'Date', 'itstar' ),
		'desc'         => __( 'Enter Project Date', 'itstar' ),
		'id'           => $prefix . 'project_date',
		'type'         => 'text',
		 // Default: array( 50, 50 )
	) );

	

}

/******************************************************************/
/*--------------------Project Features-------------------------------*/
/******************************************************************/
// add_action( 'cmb2_init', 'itstar_register_project_features_metabox' );
function itstar_register_project_features_metabox() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_itstar_group_';
	
	$cmb_group = new_cmb2_box( array(
		'id'           => $prefix . 'project_features',
		'title'        => __( 'Project Features', 'itstar' ),
		'object_types' => array( 'project', ),
	) );

	// $group_field_id is the field id string, so in this case: $prefix . 'demo'
	$group_field_id = $cmb_group->add_field( array(
		'id'          => $prefix.'feature',
		'type'        => 'group',
		'description' => __( 'Add Project features', 'itstar' ),
		'options'     => array(
			'group_title'   => __( 'feature {#}', 'itstar' ), // {#} gets replaced by row number
			'add_button'    => __( 'Add Another feature', 'itstar' ),
			'remove_button' => __( 'Remove feature', 'itstar' ),
			'sortable'      => true, // beta
		),
	) );

		
 	
 	$cmb_group->add_group_field($group_field_id , array(
		'name'    => __( 'Feature Name', 'itstar' ),
		'desc'    => __( 'write the feature name ', 'itstar' ),
		'id'      => 'feature_name',
		'type'    => 'text',
		
			
	) );

	$cmb_group->add_group_field($group_field_id , array(
		'name'    => __( 'Feature Value', 'itstar' ),
		'desc'    => __( 'write the feature Value ', 'itstar' ),
		'id'      => 'feature_value',
		'type'    => 'text',
		
			
	) );

}
/******************************************************************/
/*--------------------Project Images-------------------------------*/
/******************************************************************/
//add_action( 'cmb2_init', 'itstar_register_project_images_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_init' hook.
 */
function itstar_register_project_images_metabox() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_itstar_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'project_images',
		'title'         => __( 'Project Images', 'itstar' ),
		'object_types'  => array( 'project' ), // Post type
		// 'show_on_cb' => 'itstar_show_if_front_page', // function should return a bool value
		// 'context'    => 'normal',
		// 'priority'   => 'high',
		// 'show_names' => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
	) );


	
	$cmb_demo->add_field( array(
		'name'         => __( 'Images', 'itstar' ),
		'desc'         => __( 'Upload or add multiple images/attachments.', 'itstar' ),
		'id'           => $prefix . 'image_list',
		'type'         => 'file_list',
		'preview_size' => array( 130, 130 ), // Default: array( 50, 50 )
	) );

	

}



/******************************************************************/
/*--------------------Page Banner -------------------------------*/
/******************************************************************/

add_action('cmb2_init','itstar_register_page_banner_metabox');
// add_action('cmb2_init','itstar_register_tour_information_metabox');
function itstar_register_page_banner_metabox() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_itstar_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_demo = new_cmb2_box( array(
		'id'            => $prefix . 'page_banner',
		'title'         => __( 'Page Banner', 'itstar' ),
		'object_types'  => array( 'post','page','product','project' ), // Post type
		// 'show_on_cb' => 'itstar_show_if_front_page', // function should return a bool value
		// 'context'    => 'normal',
		// 'priority'   => 'high',
		// 'show_names' => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
	) );

	

	$cmb_demo->add_field( array(
		'name'       => __( 'Banner', 'itstar' ),
		'desc'       => __( 'Choose Banner Mod, SlideShow , Image Banner or Nothing', 'itstar' ),
		'id'         => $prefix . 'banner_mod',
		'type'       => 'radio_inline',
		'show_option_none' => true,
		'options'          => array(
			'slider' => __( 'Slider', 'itstar' ),
			'image' => __( 'Image', 'itstar' ),
				'map' => __( 'Map', 'gsalborz' ),
			
		),	
		
		//'show_on_cb' => 'itstar_hide_if_no_cats', // function should return a bool value
		// 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
		// 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
		// 'on_front'        => false, // Optionally designate a field to wp-admin only
		// 'repeatable'      => true,
	) );

	
	$cmb_demo->add_field( array(
		'name'       => __( 'Slider Shortcode', 'itstar' ),
		'desc'       => __( 'write this page Revolotion Slider shortcode with alis name here', 'itstar' ),
		'id'         => $prefix . 'slider_shortcode',
		'type'       => 'text',
	
	) );

	$cmb_demo->add_field( array(
		'name'       => __( 'Banner Image', 'itstar' ),
		'desc'       => __( 'Upload an image to show as the banner', 'itstar' ),
		'id'         => $prefix . 'image',
		'type'       => 'file',
	
	) );

	$cmb_demo->add_field( array(
			'name'       => __( 'Google Map', 'itstar' ),
			'desc'       => __( 'Enter Google Map embed code', 'gsalborz' ),
			'id'         => $prefix . 'map',
			'type'       => 'textarea_code',

	) );

	
	
}

/******************************************************************/
/*--------------------first Page links -------------------------------*/
/******************************************************************/

add_action('cmb2_init','itstar_register_first_page_links_banner_metabox');
// add_action('cmb2_init','itstar_register_tour_information_metabox');
function itstar_register_first_page_links_banner_metabox() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_itstar_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_demo = new_cmb2_box( array(
			'id'            => $prefix . 'first_links',
			'title'         => __( 'First Page links', 'itstar' ),
			'object_types'  => array( 'page' ), // Post type

	) );



	$cmb_demo->add_field( array(
			'name'       => __( 'Contact Us', 'itstar' ),
			'desc'       => __( 'Contact Us Link', 'itstar' ),
			'id'         => $prefix . 'support_link',
			'type' => 'text_url',

	) );

	$cmb_demo->add_field( array(
			'name'       => __( 'Products', 'itstar' ),
			'desc'       => __( 'Products Link', 'itstar' ),
			'id'         => $prefix . 'agencies_link',
			'type' => 'text_url',

	) );

	$cmb_demo->add_field( array(
			'name'       => __( 'Cataloges', 'itstar' ),
			'desc'       => __( 'Cataloges Link', 'itstar' ),
			'id'         => $prefix . 'photo_gallery_link',
			'type' => 'text_url',

	) );

	$cmb_demo->add_field( array(
			'name'       => __( 'About 3mm', 'itstar' ),
			'desc'       => __( 'About 3mm Link', 'itstar' ),
			'id'         => $prefix . 'news_link',
			'type' => 'text_url',

	) );





}
/*--------------------Page Banner -------------------------------*/
/******************************************************************/

add_action('cmb2_init','itstar_register_is_feature_page_metabox');
// add_action('cmb2_init','itstar_register_tour_information_metabox');
function itstar_register_is_feature_page_metabox()
{

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_itstar_';

	/**
	 * Sample metabox to demonstrate each field type included
	 */
	$cmb_demo = new_cmb2_box(array(
			'id' => $prefix . 'feature_page',
			'title' => __('Feature Page', 'itstar'),
			'object_types' => array('page'), // Post type
		// 'show_on_cb' => 'itstar_show_if_front_page', // function should return a bool value
		// 'context'    => 'normal',
		// 'priority'   => 'high',
		// 'show_names' => true, // Show field names on the left
		// 'cmb_styles' => false, // false to disable the CMB stylesheet
		// 'closed'     => true, // true to keep the metabox closed by default
	));


	$cmb_demo->add_field(array(
			'name' => __('Feature', 'itstar'),
			'desc' => __('is this page a feature one?', 'itstar'),
			'id' => $prefix . 'feature_page_radio',
			'type' => 'radio_inline',
			'show_option_none' => true,
			'options' => array(
					'yes' => __('Yes', 'itstar'),
					'No' => __('no', 'itstar'),


			),

		//'show_on_cb' => 'itstar_hide_if_no_cats', // function should return a bool value
		// 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter
		// 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter
		// 'on_front'        => false, // Optionally designate a field to wp-admin only
		// 'repeatable'      => true,
	));
	$cmb_demo->add_field( array(
			'name'       => __( 'Page Excerpt', 'itstar' ),
			'desc'       => __( 'Page Excerpt', 'itstar' ),
			'id'         => $prefix . 'page_excerpt',
			'type' => 'textarea',

	) );
}

