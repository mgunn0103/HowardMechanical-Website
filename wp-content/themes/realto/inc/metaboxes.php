<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/docs/define-meta-boxes
 */

/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign
$prefix = 'nt_';

global $meta_boxes;

$meta_boxes = array();

global $nt_option;
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
/**
 * Get slider items for theme options
 * @global type $wpdb
 * @return string
 */
function nt_get_slider() {
	global $wpdb;

	//Revolution Slider
	if (is_plugin_active('revslider/revslider.php')) {
		$sliders = $wpdb->get_results($q = "
			SELECT
				*
			FROM
				" . $wpdb->prefix . "revslider_sliders
			ORDER BY
				id
			LIMIT
				100");

		// Iterate over the sliders
		$catList = array();
		foreach ($sliders as $key => $item) {
			$catList['revslider-' . $item->alias] = 'Revolution Slider - ' . stripslashes($item->title);
		}
	}

	return $catList;
}
if (is_plugin_active('revslider/revslider.php')) {
	$meta_boxes[] = array(
		'id' => 'revolutionslider',
		'title' => 'Select Slider',
		'pages' => array( 'page' ),
		'context' => 'normal',
		'priority' => 'high',
	
		// List of meta fields
		'fields' => array(
	
			array(
				'name'     => __( 'Select Revolution Slider', 'realto' ),
				'id'       => $prefix . "rev_slider",
				'type'     => 'select_advanced',
				// Array of 'value' => 'Label' pairs for select box
				'options'  => nt_get_slider(),
				// Select multiple values, optional. Default is false.
				'multiple'    => false,
				// 'std'         => 'value2', // Default value, optional
				'placeholder' => __( 'Select an Slider', 'realto' ),
			),
				
	
		)
	);
}

$meta_boxes[] = array(
	'id' => 'homepageidx',
	'title' => 'IDX Shortcode',
	'pages' => array( 'page' ),
	'context' => 'normal',
	'priority' => 'high',

	// List of meta fields
	'fields' => array(

		array(
			'name'		=> __('IDX Shortcode','realto'),
			'id'		=> $prefix . 'homepageidx',
			'type' => 'textarea',
			'desc' => __( 'Paste IDX shortcode here', 'realto' ),
		),
			

	)
);

/*  Homepage Video Metabox */
$meta_boxes[] = array(
	'id'		=> 'nt-homepagevideo',
	'title'		=> 'Homepage Video Settings',
	'pages'		=> array( 'page' ),
	'context' => 'normal',

	'fields'	=> array(
		array(
			'name'		=> 'Video Type',
			'id'		=> $prefix . 'home_video_type',
			'type'		=> 'select',
			'options'	=> array(
				'youtube'		=> 'Youtube',
				'vimeo'			=> 'Vimeo',
				'own'			=> 'Own Embed Code'
			),
			'multiple'	=> false,
			'std'		=> array( 'no' )
		),
		array(
			'name'	=> 'Embed Code<br />(Audio Embed Code is possible, too)',
			'id'	=> $prefix . 'home_video_embed',
			'desc'	=> 'Just paste the ID of the video (E.g. http://www.youtube.com/watch?v=<strong>GUEZCxBcM78</strong>) you want to show, or insert own Embed Code. <br /><strong>Of course you can also insert your Audio Embedd Code!</strong><br />',
			'type' 	=> 'textarea',
			'std' 	=> "",
			'cols' 	=> "40",
			'rows' 	=> "8"
		)
	)
);

/* ----------------------------------------------------- */
// Propert Listin Settings
/* ----------------------------------------------------- */

$meta_boxes[] = array(
	'id' => 'propertyhome',
	'title' => 'Home Page',
	'pages' => array( 'property' ),
	'context' => 'normal',
	'priority' => 'high',

	// List of meta fields
	'fields' => array(

		array(
			'name'		=> __('Homepage','realto'),
			'id'		=> $prefix . 'homepage',
			'type' => 'checkbox',
			'desc' => __( 'Add this post in homepage carousel', 'realto' ),
			// Value can be 0 or 1
			'std'  => 0,
		),
			

	)
);

$meta_boxes[] = array(
	'id' => 'propertyimages',
	'title' => 'Property Images',
	'pages' => array( 'property' ),
	'context' => 'normal',
	'priority' => 'high',

	// List of meta fields
	'fields' => array(

		array(
			'name' => __( '', 'realto' ),
			'id' => $prefix ."propertyimages",
			'type' => 'plupload_image',
			'desc'		=> __('<strong>Note:</strong>Do not upload any image if you do not want to show image slidershow','realto'),
			'max_file_uploads' => 30,
		),
			

	)
);

$meta_boxes[] = array(
	'id'		=> 'propertyvideo',
	'title'		=> 'Property Video Settings',
	'pages'		=> array( 'property' ),
	'context' => 'normal',

	'fields'	=> array(
		array(
			'name'		=> 'Video Type',
			'id'		=> $prefix . 'property_video_type',
			'type'		=> 'select',
			'options'	=> array(
				''		=> 'Select',
				'youtube'		=> 'Youtube',
				'vimeo'			=> 'Vimeo',
				'own'			=> 'Own Embed Code'
			),
			'multiple'	=> false,
			'std'		=> array( 'no' )
		),
		array(
			'name'	=> 'Embed Code<br />(Audio Embed Code is possible, too)',
			'id'	=> $prefix . 'property_video_embed',
			'desc'	=> 'Just paste the ID of the video (E.g. http://www.youtube.com/watch?v=<strong>GUEZCxBcM78</strong>) you want to show, or insert own Embed Code. <br /><strong>Of course you can also insert your Audio Embedd Code!</strong><br />',
			'type' 	=> 'textarea',
			'std' 	=> "",
			'cols' 	=> "40",
			'rows' 	=> "8"
		),
		array(
			'name' => __( 'Video Position', 'realto' ),
			'id' => $prefix . "video_position",
			'type' => 'radio',
			// Array of 'value' => 'Label' pairs for radio options.
			// Note: the 'value' is stored in meta field, not the 'Label'
			'options' => array(
					'on-top' 		=> __( 'Top', 'realto' ),
					'at-bottom' 	=> __( 'Bottom', 'realto' ),
			),
			'std'         => 'on-top',
		),
	)
);

$meta_boxes[] = array(
	'id' => 'propertyprice',
	'title' => 'Property Price',
	'pages' => array( 'property' ),
	'context' => 'normal',
	'priority' => 'high',

	// List of meta fields
	'fields' => array(
	
		array(
			'name'		=> 'Price',
			'id'		=> $prefix . "listprice",
			'clone'		=> false,
			'desc'		=> __('No currency symbols or thousands separators','realto'),
			'type'		=> 'number',
			'prefix' 	=> $nt_option["site_currency"],
			'std'		=> ''
		),

		
		array(
			'name'		=> 'Status',
			'id'		=> $prefix . "status",
			'type'		=> 'select',
			'options'	=> array(
			    'for-sale'	=> 'for Sale',
				'for-rent'	=> 'for Rent',
				'sold'		=> 'Sold',
				'upcoming'  => 'Upcoming',
				'inquire'   => 'Inquire'
			),
			'multiple'	=> false,
			'std'		=> ''
		),
		
		array(
			'name' => __( 'Period', 'realto' ),
			'id' => $prefix . "period",
			'type' => 'radio',
			// Array of 'value' => 'Label' pairs for radio options.
			// Note: the 'value' is stored in meta field, not the 'Label'
			'options' => array(
					'none' 		=> __( 'none', 'realto' ),
					'day' 	=> __( 'per-Day', 'realto' ),
					'week' 	=> __( 'per Week', 'realto' ),
					'month' => __( 'per Month', 'realto' ),
					'year' 	=> __( 'per Year', 'realto' ),
			),
			'std'		=> 'none'
		),	

	)/*,
	'validation' => array(
				'rules' => array(
						$prefix . "listprice" => array(
								'required' => true,
								
						),
				),
				// optional override of default jquery.validate messages
				'messages' => array(
						$prefix . "listprice" => array(
								'required' => __( 'Listing price is required', 'realto' ),
								
						),
				)
		)*/
);
$bedarea = '';
$batharea = '';
$plotarea = '';
$livingarea = '';
$terracearea = '';
if($nt_option["f_beds"]["of_feature_area"]!=""):
	$bedarea = " (".$nt_option["f_beds"]["of_feature_area"].")";
endif;
$f_beds = $nt_option["f_beds"]["of_feature_title"].$bedarea;

if($nt_option["f_baths"]["of_feature_area"]!=""):
	$batharea = " (".$nt_option["f_baths"]["of_feature_area"].")";
endif;
$f_baths = $nt_option["f_baths"]["of_feature_title"].$batharea;

if($nt_option["f_plotsize"]["of_feature_area"]!=""):
	$plotarea = " (".$nt_option["f_plotsize"]["of_feature_area"].")";
endif;
$f_plotsize = $nt_option["f_plotsize"]["of_feature_title"].$plotarea;

if($nt_option["f_livingarea"]["of_feature_area"]!=""):
	$livingarea = " (".$nt_option["f_livingarea"]["of_feature_area"].")";
endif;
$f_livingarea = $nt_option["f_livingarea"]["of_feature_title"].$livingarea;

if($nt_option["f_terrace"]["of_feature_area"]!=""):
	$terracearea = " (".$nt_option["f_terrace"]["of_feature_area"].")";
endif;
$f_terrace = $nt_option["f_terrace"]["of_feature_title"].$terracearea;


$f_parking = $nt_option["f_parking"];

$f_heating = $nt_option["f_heating"];
$f_neighborhood = $nt_option["f_neighborhood"];
$f_builtin = $nt_option["f_builtin"];

$meta_boxes[] = array(
	'id' => 'propertydetails',
	'title' => 'Property Details',
	'pages' => array( 'property' ),
	'context' => 'normal',
	'priority' => 'high',

	// List of meta fields
	'fields' => array(
	
		array(
			'name'		=> __( 'ID', 'realto' ),
			'id'		=> $prefix . "prop_id",
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),

		array(
				'name' => $f_beds,//__( 'Bedrooms', 'realto' ),
				'id' => $prefix."bedrooms",
				'type' => 'select',
				'options' => array(
						'' => '',
						'1' => '1',
						'2' => '2',
						'3' => '3',
						'4' => '4',
						'5' => '5',
						'6' => '6',
						'7' => '7',
						'8' => '8',
						'9' => '9',
						'10' => '10',
				),
				'multiple' => false,
				
		),
		
		array(
				'name' => $f_baths,
				'id' => $prefix."bathrooms",
				'type' => 'select',
				'options' => array(
						'' => '',
						'1' => '1',
						'2' => '2',
						'3' => '3',
						'4' => '4',
						'5' => '5',
						'6' => '6',
						'7' => '7',
						'8' => '8',
						'9' => '9',
						'10' => '10',
				),
				'multiple' => false,
				
		),
		
		array(
			'name'		=> $f_plotsize,
			'id'		=> $prefix . "plot_size",
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
		
		array(
			'name'		=> $f_livingarea,
			'id'		=> $prefix . "living_area",
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
		
		array(
			'name'		=> $f_terrace,
			'id'		=> $prefix . "terrace",
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
		
		array(
			'name'		=> $f_parking,
			'id'		=> $prefix . "parking",
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
		
		array(
			'name'		=> $f_heating,
			'id'		=> $prefix . "heating",
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
		
		/*array(
			'name'		=> $f_squarefeet,
			'id'		=> $prefix . "squarefeet",
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),*/
		
		array(
			'name'		=> $f_neighborhood,
			'id'		=> $prefix . "neighborhood",
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
		
		array(
			'name'		=> $f_builtin,
			'id'		=> $prefix . "builtin",
			'clone'		=> false,
			'type'		=> 'text',
			'std'		=> ''
		),
		
		array(
			'name'		=> __("<p><strong>Note:</strong></p>"),
			'id'		=> $prefix . "mynote",
			'clone'		=> false,
			'type'		=> '',
			'desc'		=> '<p><strong>If you do not want to show any feature, please leave it empty</strong></p>',
			'std'		=> ''
		),
			

	)
);

$meta_boxes[] = array(
	'id' => 'propertymap',
	'title' => 'Google Maps',
	'pages' => array( 'property' ),
	'context' => 'normal',
	'priority' => 'high',

	// List of meta fields
	'fields' => array(

		array(
			'name'		=> __('Google Maps Full Address','realto'),
			'id'		=> $prefix . 'gmap',
			'type' => 'textarea',
			'desc' => __( 'Paste full address for google maps location. Ex: Miami Beach Collins Ave 1220 <br /><strong>Note:</strong> This address will use to search property', 'realto' ),
			'std'  => ''
		),
			

	)
);

$meta_boxes[] = array(
	'id' => 'propertydoc',
	'title' => 'Documents',
	'pages' => array( 'property' ),
	'context' => 'normal',
	'priority' => 'high',

	// List of meta fields
	'fields' => array(
		// FILE ADVANCED (WP 3.5+)
		array(
			'name' => __( 'Upload Documents', 'realto' ),
			'id'   => $prefix . "document",
			'type' => 'file_advanced',
			'max_file_uploads' => 5,
			'mime_type' => 'application', // Leave blank for all file types
		),
			

	)
);

$meta_boxes[] = array(
	'id' => 'propertycontact',
	'title' => 'Contact Details',
	'pages' => array( 'property' ),
	'context' => 'normal',
	'priority' => 'high',

	// List of meta fields
	'fields' => array(

		array(
			'name'		=> __('Email','realto'),
			'id'		=> $prefix . 'property_contact_email',
			'type' => 'email',
			'desc' => __( 'Add property contact email<br /><strong>Note:</strong> Leave empty to use agent/author profile email', 'realto' ),
			'std'  => '',
		),
		array(
			'name'		=> __('Phone','realto'),
			'id'		=> $prefix . 'property_contact_phone',
			'type' => 'text',
			'desc' => __( 'Add property contact phone number<br /><strong>Note:</strong> Leave empty to use agent/author profile phone number', 'realto' ),
			'std'  => '',
		),
			

	)
);






/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function nouveauthemes_register_meta_boxes()
{
	global $meta_boxes;

	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( class_exists( 'RW_Meta_Box' ) )
	{
		foreach ( $meta_boxes as $meta_box )
		{
			new RW_Meta_Box( $meta_box );
		}
	}
}

// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'nouveauthemes_register_meta_boxes' );