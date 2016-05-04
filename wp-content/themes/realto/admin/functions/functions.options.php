<?php

add_action('init','of_options');

if (!function_exists('of_options'))
{
	function of_options()
	{
		//Access the WordPress Categories via an Array
		$of_categories 		= array();  
		$of_categories_obj 	= get_categories('hide_empty=0');
		foreach ($of_categories_obj as $of_cat) {
		    $of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
		$categories_tmp 	= array_unshift($of_categories, "Select a category:");    
	       
		//Access the WordPress Pages via an Array
		$of_pages 			= array();
		$of_pages_obj 		= get_pages('sort_column=post_parent,menu_order');    
		foreach ($of_pages_obj as $of_page) {
		    $of_pages[$of_page->ID] = $of_page->post_name; 
		}
		$of_pages_tmp 		= array_unshift($of_pages, "Select a page:");       
	
		

		//Stylesheets Reader
		$alt_stylesheet_path = LAYOUT_PATH;
		$alt_stylesheets = array();
		
		if ( is_dir($alt_stylesheet_path) ) 
		{
		    if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) 
		    { 
		        while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) 
		        {
		            if(stristr($alt_stylesheet_file, ".css") !== false)
		            {
		                $alt_stylesheets[] = $alt_stylesheet_file;
		            }
		        }    
		    }
		}


		//Background Images Reader
		$bg_images_path = get_stylesheet_directory(). '/images/bg/'; // change this to where you store your bg images
		$bg_images_url = get_template_directory_uri().'/images/bg/'; // change this to where you store your bg images
		$bg_images = array();
		
		if ( is_dir($bg_images_path) ) {
		    if ($bg_images_dir = opendir($bg_images_path) ) { 
		        while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
		            if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
		                $bg_images[] = $bg_images_url . $bg_images_file;
		            }
		        }    
		    }
		}
		

		/*-----------------------------------------------------------------------------------*/
		/* TO DO: Add options/functions that use these */
		/*-----------------------------------------------------------------------------------*/
		
		//More Options
		$uploads_arr 		= wp_upload_dir();
		$all_uploads_path 	= $uploads_arr['path'];
		$all_uploads 		= get_option('of_uploads');
		$other_entries 		= array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
		$body_repeat 		= array("no-repeat","repeat-x","repeat-y","repeat");
		$body_pos 			= array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
		
		// Image Alignment radio box
		$of_options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 
		
		// Image Links to Options
		$of_options_image_link_to = array("image" => "The Image","post" => "The Post"); 


/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
$of_options = array();

$adminurl = ADMIN_DIR . 'assets/images/';
$icons = ADMIN_DIR . 'assets/images/icons/';
$images_url = get_template_directory_uri().'/images/';


// GENERAL SETTINGS
//==========================================================
$of_options[] = array(
					"name" => "General Settings",
					"type" => "heading",
					"icon" => $icons . "general-settings.png"
				);

							
$of_options[] = array( 
					"name" => "Site Logo",
					"desc" => "Upload your site logo. Default logo will be used unless you upload your own.",
					"id" => "img_logo",
					"std" => $images_url."logo.png",
					"mod" => "max",
					"type" => "media"
				);
				
$of_options[] = array( 
					"name" => "Favicon",
					"desc" => "Upload your site favicon in .ico format. Default favicon will be used unless you upload your own.",
					"id" => "site_favicon",
					"std" => "",
					"mod" => "max",
					"type" => "media"
				);

$of_options[] = array( 
					"name" => "Retina Favicon",
					"desc" => "The Retina version of your Favicon. 144x144px .png file required.",
					"id" => "site_retina_favicon",
					"std" => "",
					"mod" => "max",
					"type" => "media"
				);

$of_options[] = array( 
					"name" => "Call Us",
					"desc" => "Enter your contact number.",
					"id" => "call_us",
					"std" => "1 (800) 765 4321",
					"type" => "text"
				);	

$of_options[] = array( 	
					"name" => "Site Tagline",
					"desc" => "Enable or Disable tagline next the logo. Default: Enable.",
					"id" => "site_tagline",
					"std" => 1,
					"on" => "Enable",
					"off" => "Disable",
					"type" => "switch"
				);			
/* ===================================================================
// HOMEPAGE SETTINGS
=====================================================================*/
$of_options[] = array(
					"name" => "Home Page",
					"type" => "heading",
					"icon" => $icons . "icon-home.png"
				);

$of_options[] = array( 	
					"name" 		=> "Welcome Content!",
					"desc" 		=> "Enter welcome title",
					"id" 		=> "wel_title",
					"std" 		=> "Welcome to Realto",
					"type" 		=> "text"
				);

$of_options[] = array( 	
					"desc" 		=> "Enter welcome description",
					"id" 		=> "wel_description",
					"std" 		=> "<strong>Realto xHTML/CSS Template is The Best Solution To Sell House Online.</strong><br />This template is appropriate for Real Estate Company, who need to do their business online via websites.",
					"type" 		=> "textarea"
				);
$of_options[] = array( 	
					"desc" 		=> "Enter button text",
					"id" 		=> "wel_button",
					"std" 		=> "Buy It Now!",
					"type" 		=> "text"
				);
$of_options[] = array( 	
					"desc" 		=> "Enter button url",
					"id" 		=> "wel_button_url",
					"std" 		=> "http://",
					"type" 		=> "text"
				);

$of_options[] = array( 
					"name" => "Top Section Background Image",
					"desc" => "Upload search section background image. Default background will be used unless you upload your own.",
					"id" => "search_bg",
					"std" => "",
					"mod" => "max",
					"type" => "media"
				);	

$of_options[] = array("name" => "Home Page Carousel Title", 	
					"desc" 		=> "Change home page carousel title, Default title will be properties",
					"id" 		=> "home_carsousel_title",
					"std" 		=> "Properties",
					"type" 		=> "text"
				);

$of_options[] = array("name" => "Home Page Carousel View All", 	
					"desc" 		=> "Choose the view all text for property listings.",
					"id" 		=> "home_carsousel_view_text",
					"std" 		=> "View All",
					"type" 		=> "text"
				);
$of_options[] = array( 	
					"desc" 		=> "Choose the view all page for property listings.",
					"id" 		=> "home_carsousel_view_link",
					"type" 		=> "select",
					"options" 	=> $of_pages
				);

/* ===================================================================
// Listing SETTINGS
=====================================================================*/
$of_options[] = array(
					"name" => "Real Estate",
					"type" => "heading",
					"icon" => $icons . "general-settings.png"
				);

$of_options[] = array("name" => "Choose a currency", 	
					"desc" 		=> "Choose your currency for the site, Default currency will be $.",
					"id" 		=> "site_currency",
					"std" 		=> "$",
					"type" 		=> "text"
					);

$of_options[] = array("name" => "Listing Price Prefix", 	
					"desc" 		=> "The listing price prefix. Default will be empty",
					"id" 		=> "listing_price_prefix",
					"std" 		=> "",
					"type" 		=> "text"
					);

$of_options[] = array("name" => "Listing ID Prefix", 	
					"desc" 		=> "The listing ID will be this prefix plus post ID. You can optionally set individual IDs on the listing edit screen.",
					"id" 		=> "listing_id_prefix",
					"std" 		=> "PROP-",
					"type" 		=> "text"
					);

$of_options[] = array("name" => "Listing Features", 	
					"desc" 		=> "Bedrooms",
					"id" 		=> "f_beds",
					"std" 		=> array(
									'of_feature_title' => 'Bedrooms',
									'of_feature_area' => ''
								),
					"type" 		=> "of_property_features"
					);


$of_options[] = array("desc" 	=> "Bathrooms",
					  "id" 		=> "f_baths",
					  "std" 		=> array(
									'of_feature_title' => 'Bathrooms',
									'of_feature_area' => ''
								),
					  "type" 	=> "of_property_features"
					  );

$of_options[] = array("desc" 	=> "Plot Size",
					  "id" 		=> "f_plotsize",
					  "std" 	=> array(
									'of_feature_title' => 'Plot Size',
									'of_feature_area' => ''
								),
					  "type" 	=> "of_property_features"
					  );

$of_options[] = array("desc" 	=> "Living Area",
					  "id" 		=> "f_livingarea",
					  "std" 	=> array(
									'of_feature_title' => 'Living Area',
									'of_feature_area' => ''
								),
					  "type" 	=> "of_property_features"
					  );
					  
$of_options[] = array("desc" 	=> "Terrace",
					  "id" 		=> "f_terrace",
					  "std" 	=> array(
									'of_feature_title' => 'Terrace',
									'of_feature_area' => ''
								),
					  "type" 	=> "of_property_features"
					  );	
$of_options[] = array("desc" 	=> "Parking",
					  "id" 		=> "f_parking",
					  "std" 	=> "Parking",
					  "type" 	=> "text"
					  );

/*$of_options[] = array("desc" 	=> "Square feet",
					  "id" 		=> "f_squarefeet",
					  "std" 	=> "Square feet",
					  "type" 	=> "text"
					  );*/

$of_options[] = array("desc" 	=> "Heating",
					  "id" 		=> "f_heating",
					  "std" 	=> "Heating",
					  "type" 	=> "text"
					  );

$of_options[] = array("desc" 	=> "Neighborhood",
					  "id" 		=> "f_neighborhood",
					  "std" 	=> "Neighborhood",
					  "type" 	=> "text"
					  );

$of_options[] = array("desc" 	=> "Built In",
					  "id" 		=> "f_builtin",
					  "std" 	=> "Built In",
					  "type" 	=> "text"
					  );					  
					  				  
/*==========================================================*/					
$of_options[] = array("name" => "Listing Options", 	
					"desc" 		=> "Bedrooms, default on.",
					"id" 		=> "sh_beds",
					"std" 		=> "1",
					"type" 		=> "switch"
					);
$of_options[] = array("desc" 		=> "Bathrooms, default on.",
					"id" 		=> "sh_baths",
					"std" 		=> "1",
					"type" 		=> "switch"
					);



$of_options[] = array("desc" 		=> "Plot Size, default off.",
					"id" 		=> "sh_plotsize",
					"std" 		=> "0",
					"type" 		=> "switch"
					);
					
$of_options[] = array("desc" 		=> "Living Area, default off.",
					"id" 		=> "sh_livingarea",
					"std" 		=> "0",
					"type" 		=> "switch"
					);
$of_options[] = array("desc" 		=> "Terrace, default off.",
					"id" 		=> "sh_terrace",
					"std" 		=> "0",
					"type" 		=> "switch"
					);										
	
$of_options[] = array("desc" 		=> "Property type, default off.",
					"id" 		=> "sh_propertytype",
					"std" 		=> "0",
					"type" 		=> "switch"
					);
					
$of_options[] = array("desc" 		=> "Parking, default off.",
					"id" 		=> "sh_parking",
					"std" 		=> "0",
					"type" 		=> "switch"
					);

$of_options[] = array("desc" 		=> "Heating, default off.",
					"id" 		=> "sh_heating",
					"std" 		=> "0",
					"type" 		=> "switch"
					);

/*$of_options[] = array("desc" 		=> "Square feet, default off.",
					"id" 		=> "sh_squrefeet",
					"std" 		=> "0",
					"type" 		=> "switch"
					);*/

$of_options[] = array("desc" 		=> "Neighborhood, default off.",
					"id" 		=> "sh_neighborhood",
					"std" 		=> "0",
					"type" 		=> "switch"
					);

$of_options[] = array("desc" 		=> "Year, default off.",
					"id" 		=> "sh_year",
					"std" 		=> "0",
					"type" 		=> "switch"
					);
					
$of_options[] = array("name" => "Number of Posts Per Page", 	
					"desc" 		=> "Choose the number of property posts per page, Default will be 10.",
					"id" 		=> "property_posts_limit",
					"std" 		=> "10",
					"type" 		=> "text"
					);					
//============================================================
// Listing Search page
//============================================================
$of_options[] = array( 	"name" => "Listing Search",
						"type" => "heading",
						"icon" => $icons . "general-settings.png"
				);

$search_layout = array("search-list-layout" => "List Layout","search-grid-layout" => "Grid Layout");

$of_options[] = array("name" => "Choose Listing Search Result Page layout", 	
					"desc" 		=> "Select listing search page layout, Default will be list layout.",
					"id" 		=> "listing-search-layout",
					"std" 		=> "search-list-layout",
					"type" 		=> "select",
					"options" 	=> $search_layout
					);

$of_options[] = array("name" => "Please select the search options to display in the search form.", 	
					  "desc" 	=> "Keyword",
					  "id" 		=> "sp_keyword",
					  "std" 	=> 1,
					  "type" 	=> "checkbox"
					 );
$of_options[] = array( 	"desc" 		=> "Location",
						"id" 		=> "sp_location",
						"std" 		=> 1,
						"type" 		=> "checkbox"
					);

$of_options[] = array( 	"desc" 		=> "Property Type",
						"id" 		=> "sp_property_type",
						"std" 		=> 1,
						"type" 		=> "checkbox"
					);					

$of_options[] = array( 	"desc" 		=> "Beds",
						"id" 		=> "sp_beds",
						"std" 		=> 1,
						"type" 		=> "checkbox"
					);
					
$of_options[] = array( 	"desc" 		=> "Baths",
						"id" 		=> "sp_baths",
						"std" 		=> 1,
						"type" 		=> "checkbox"
					);

$of_options[] = array( 	"desc" 		=> "Status",
						"id" 		=> "sp_status",
						"std" 		=> 1,
						"type" 		=> "checkbox"
					);

$of_options[] = array( 	"desc" 		=> "Min Price",
						"id" 		=> "sp_min_price",
						"std" 		=> 1,
						"type" 		=> "checkbox"
					);
$of_options[] = array( 	"desc" 		=> "Max Price",
						"id" 		=> "sp_max_price",
						"std" 		=> 1,
						"type" 		=> "checkbox"
					);

$of_options[] = array("name" => "Search Keyword Text in Site", 	
					"desc" 		=> "Choose the text for keyword field in the search areas, Default text will be Location..",
					"id" 		=> "s_propertykeyword",
					"std" 		=> "Search Keyword...",
					"type" 		=> "text"
					);

$of_options[] = array(
					"desc" 		=> "Choose the text for Location in the search areas, Default text will be Location..",
					"id" 		=> "s_location",
					"std" 		=> "Location",
					"type" 		=> "text"
					);

$of_options[] = array(	
					"desc" 		=> "Choose the text for Property Type in the search areas, Default text will be Property Type.",
					"id" 		=> "s_propertytype",
					"std" 		=> "Property Type",
					"type" 		=> "text"
					);

$of_options[] = array(	
					"desc" 		=> "Choose the text for Beds in the search areas, Default text will be Beds.",
					"id" 		=> "s_bed",
					"std" 		=> "Beds",
					"type" 		=> "text"
					);
$of_options[] = array(	
					"desc" 		=> "Choose the text for Baths in the search areas, Default text will be Baths.",
					"id" 		=> "s_bath",
					"std" 		=> "Baths",
					"type" 		=> "text"
					);
$of_options[] = array(	
					"desc" 		=> "Choose the text for Status in the search areas, Default text will be Select Status.",
					"id" 		=> "s_status",
					"std" 		=> "Select Status",
					"type" 		=> "text"
					);
$of_options[] = array(	
					"desc" 		=> "Choose the text for Min Price in the search areas, Default text will be Min Price.",
					"id" 		=> "s_minprice",
					"std" 		=> "Min Price",
					"type" 		=> "text"
					);
$of_options[] = array(	
					"desc" 		=> "Choose the text for Max Price in the search areas, Default text will be Max Price.",
					"id" 		=> "s_maxprice",
					"std" 		=> "Max Price",
					"type" 		=> "text"
					);

$of_options[] = array("name" => "No Result Results Title", 	
					"desc" 		=> "Choose the text that displays when no search results are found.",
					"id" 		=> "property_no_result_title",
					"std" 		=> "No properties were found which match your search criteria.",
					"type" 		=> "text"
					);
$of_options[] = array("name" => "No Result Results Content", 	
					"desc" 		=> "Choose the text that displays when no search results are found.",
					"id" 		=> "property_no_result_content",
					"std" 		=> "Try broadening your search to find more results.",
					"type" 		=> "text"
					);

//============================================================
// Listing Search page
//============================================================
$of_options[] = array( 	"name" => "Listing Detail Page",
						"type" => "heading",
						"icon" => $icons . "general-settings.png"
				);

$of_options[] = array("name"  => "Address Map", 	
					  "desc"  => "Select address map position, Default will be in sidebar.",
					  "id" 	  => "map_position",
					  "std"   => "map_in_sidebar",
					  "type"  => "radio",
					  "options" => array("map_in_sidebar" => 'Sidebar', "map_in_bottom" => 'Bottom')
					);

					
//============================================================
// Posts Options
//============================================================
$of_options[] = array( 	"name" => "Post Options",
						"type" => "heading",
						"icon" => $icons . "general-settings.png"
				);

$of_options[] = array("name" => "Blog Posts Excerpt Lenght", 	
					"desc" 		=> "Enter the blog posts excerpt length, Default will be 40.",
					"id" 		=> "site_wide_excerpt_length",
					"std" 		=> "40",
					"type" 		=> "text"
					);

//============================================================
// Mortgage Calculator
//============================================================
$of_options[] = array( 	"name" => "Mortgage Calculator",
						"type" => "heading",
						"icon" => $icons . "general-settings.png"
				);

$of_options[] = array("name" => "Mortgage Calculator Currency", 	
					"desc" 		=> "Enter the mortgage calculator currency, Default will be $.",
					"id" 		=> "mortgage_calculator_currency",
					"std" 		=> "$",
					"type" 		=> "text"
					);

// Contact Us
$of_options[] = array( 	"name" => "Contact Us",
						"type" => "heading",
						"icon" => $icons . "general-settings.png"
				);

$of_options[] = array( 	
					"name" => "Email",
					"desc" => "Enter your company email address, this email will you for emails",
					"id" => "contact_email",
					"std" => "realto@realto.com",
					"type" => "text"
				);
				
$of_options[] = array( 	
					"name" => "Phone",
					"desc" => "Enter your company contact number",
					"id" => "contact_phone",
					"std" => "Phone: +1 786 345 6789",
					"type" => "text"
				);
$of_options[] = array( 	
					"name" => "LinkedIn",
					"desc" => "Enter your company linkedin profile link",
					"id" => "contact_linkedin",
					"std" => "linkedin.com/realto",
					"type" => "text"
				);
$of_options[] = array( 	
					"name" => "Twitter",
					"desc" => "Enter your company twitter account link",
					"id" => "contact_twitter",
					"std" => "twitter.com/realto",
					"type" => "text"
				);

$of_options[] = array( 	
					"name" => "Contact Email Subject",
					"desc" => "",
					"id" => "contact_subject",
					"std" => "Subject",
					"type" => "text"
				);
$of_options[] = array( 	
					"name" => "Contact Email Success Message",
					"desc" => "",
					"id" => "email_success",
					"std" => "<strong>Well done!</strong>You successfully send this message.",
					"type" => "text"
				);
$of_options[] = array( 	
					"name" => "Contact Email Unsuccess Message",
					"desc" => "",
					"id" => "email_error",
					"std" => "<strong>Oh snap!</strong> Some Problem.",
					"type" => "text"
				);
$of_options[] = array( 	
					"name" => "Contact Form Name Field Validation Message",
					"desc" => "",
					"id" => "contact_name_req",
					"std" => "Please enter only letters for your name",
					"type" => "text"
				);
$of_options[] = array( 	
					"name" => "Contact Form Email Field Validation Message",
					"desc" => "",
					"id" => "contact_email_req",
					"std" => "Please enter a valid email address",
					"type" => "text"
				);
			
				
$of_options[] = array( 	
					"name" => "Google Map",
					"desc" => "Enter your company address for google map, Eg: Miami Beach, FL 33139 United State",
					"id" => "contact_map",
					"std" => "Miami Beach, FL 33139 United State",
					"type" => "text"
				);

$of_options[] = array( 	"name" 		=> "Styles",
						"type" 		=> "heading",
						"icon" => $icons . "styling-options.png"
				);
					
$of_options[] = array( 	"name" 		=> "Website Color",
						"desc" 		=> "Select main color of your website.",
						"id" 		=> "website_color",
						"std" 		=> "green",
						"type" 		=> "images",
						"options" 	=> array(
							'green' 	=> $adminurl . 'theme_green.jpg',
							'blue' 	=> $adminurl . 'theme_blue.jpg',
							'orange' 	=> $adminurl . 'theme_orange.jpg',
							
							'red' 	=> $adminurl . 'theme_red.jpg',
							'pink' 	=> $adminurl . 'theme_pink.jpg'
						)
				);

// CUSTOM CODE
$of_options[] = array( 	"name" => "Custom Code",
						"type" => "heading",
						"icon" => $adminurl . "icon-code.png"
				);

$of_options[] = array( 	
					"name" => "Custom CSS",
					"desc" => "Paste your custom CSS code here. The code will be added to the header of your site.",
					"id" => "custom_css",
					"std" => "",
					"type" => "textarea"
				);

$of_options[] = array( 	
					"name" => "Custom JavaScript/Analytics Header",
					"desc" => "Paste here JavaScript and/or Analytics code wich will appear in the Header of your site",
					"id" => "custom_js_header",
					"std" => "",
					"type" => "textarea"
				);
				
$of_options[] = array( 	
					"name" => "Custom JavaScript/Analytics Footer",
					"desc" => "Paste JavaScript and/or Analytics code wich will appear in the Footer of your site",
					"id" => "custom_js_footer",
					"std" => "",
					"type" => "textarea"
				);
				
				
// PAGE 404
$of_options[] = array( 	"name" => "Page 404",
						"type" => "heading",
						"icon" => $adminurl . "icon-page404.png"
				);

$of_options[] = array( 	
					"name" => "Page Title",
					"desc" => "Enter a title for 404 page",
					"id" => "error_title",
					"std" => "Ooops! That page can't be found",
					"type" => "text"
				);
				
$of_options[] = array( 
					"name" => "Page Image",
					"desc" => "Upload some creative image for 404 page",
					"id" => "error_image",
					"std" => $images_url . "error-page.png",
					"mod" => "min",
					"type" => "media"
				);				


							
// BACKUP OPTIONS
$of_options[] = array( 	"name" => "Backup Options",
						"type" => "heading",
						"icon" => $adminurl . "icon-backup.png"
				);

$of_options[] = array( 	"name" => "Backup and Restore Options",
						"id" => "of_backup",
						"std" => "",
						"type" => "backup",
						"desc" => 'You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.',
				);

$of_options[] = array( 	"name" => "Transfer Theme Options Data",
						"id" => "of_transfer",
						"std" => "",
						"type" => "transfer",
						"desc" => 'You can tranfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options".',
				);					
					
																									
				
	}//End function: of_options()
}//End chack if function exists: of_options()
?>
