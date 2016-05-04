<?php
/* Property Custom Post Type */
/* Register Custom Taxonomies */

//// FUNCTION TO CREATE IT
function property_register() {  

	global $nt_option;
	
	//// LABELS
	$labels = array(
		'name' => __('Properties', 'realto'),
			'singular_name' => __('Property', 'realto'),
			'add_new' => __('Add New', 'realto'),
			'add_new_item' => __('Add New Property', 'realto'),
			'edit_item' => __('Edit Property', 'realto'),
			'new_item' => __('New Property', 'realto'),
			'all_items' => __('All Properties', 'realto'),
			'view_item' =>__('View Property', 'realto'),
			'search_items' => __('Search Properties', 'realto'),
			'not_found' =>  __('No Properties Found', 'realto'),
			'not_found_in_trash' => __('No Properties found in trash.', 'realto'),
			'parent_item_colon' => '',
			'menu_name' => 'Properties'
	);
	
    //// ARGUMENTS
		$args = array(
		
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true, 
			'show_in_menu' => true, 
			'query_var' => true,
			'rewrite' => true,
			'capability_type' => 'post',
			'has_archive' => true, 
			'hierarchical' => false,
			'menu_position' => 7,
			'supports' => array('title', 'editor', 'thumbnail','author')
		  
		);  
  
    	//// REGISTERS IT
		register_post_type('property', $args);
}  

// TAXONOMY LOCATION
register_taxonomy(  
'location', 'property',  
array(  
	'hierarchical' => true,  
	'labels' => array(
		'name' => __( 'Locations', 'realto' ),
		'singular_name' => __( 'Location', 'realto' ),
		'search_items' => __( 'Search Locations', 'realto' ),
		'popular_items' => __( 'Popular Locations', 'realto' ),
		'all_items' => __( 'All Locations', 'realto' ),
		'edit_item' => __( 'Edit Location', 'realto' ),
		'update_item' => __( 'Update Location', 'realto' ),
		'add_new_item' => __( 'Add New Location', 'realto' ),
		'new_item_name' => __( 'New Location Name', 'realto' ),
		'separate_items_with_commas' => __( 'Separate Locations With Commas', 'realto' ),
		'add_or_remove_items' => __( 'Add or Remove Locations', 'realto' ),
		'choose_from_most_used' => __( 'Choose From Most Used Locations', 'realto' ),  
		'parent' => __( 'Parent Location', 'realto' )      	
		),
	'query_var' => true,  
	'rewrite' => true  
	)  
);

function propertylocation() {
	global $post;
	global $wp_query;
	$terms_as_text = strip_tags( get_the_term_list( $wp_query->post->ID, 'location', '', ', ', '' ) );
	echo $terms_as_text;
}

// TAXONOMY PROPERTY TYPE
register_taxonomy(  
'property-type', 'property',  
array(  
	'hierarchical' => false,  
	'labels' => array(
		'name' => __( 'Property Types', 'realto' ),
		'singular_name' => __( 'Property Type', 'realto' ),
		'search_items' => __( 'Search Property Types', 'realto' ),
		'popular_items' => __( 'Popular Property Types', 'realto' ),
		'all_items' => __( 'All Property Types', 'realto' ),
		'edit_item' => __( 'Edit Property Type', 'realto' ),
		'update_item' => __( 'Update Property Type', 'realto' ),
		'add_new_item' => __( 'Add New Property Type', 'realto' ),
		'new_item_name' => __( 'New Property Type Name', 'realto' ),
		'separate_items_with_commas' => __( 'Separate Property Types With Commas', 'realto' ),
		'add_or_remove_items' => __( 'Add or Remove Property Types', 'realto' ),
		'choose_from_most_used' => __( 'Choose From Most Used Property Types', 'realto' ),  
		'parent' => __( 'Parent Location', 'realto' )      	
		),
	'query_var' => true,  
	'rewrite' => true  
	)  
);

function propertyltype() {
	global $post;
	global $wp_query;
	$terms_as_text = strip_tags( get_the_term_list( $wp_query->post->ID, 'property-type', '', ', ', '' ) );
	echo $terms_as_text;
}

// TAXONOMY
register_taxonomy(  
'features', 'property',  
array(  
	'hierarchical' => false,  
	'labels' => array(
		'name' => __( 'Features', 'realto' ),
		'singular_name' => __( 'Feature', 'realto' ),
		'search_items' => __( 'Search Features', 'realto' ),
		'popular_items' => __( 'Popular Features', 'realto' ),
		'all_items' => __( 'All Features', 'realto' ),
		'edit_item' => __( 'Edit Feature', 'realto' ),
		'update_item' => __( 'Update Feature', 'realto' ),
		'add_new_item' => __( 'Add New Feature', 'realto' ),
		'new_item_name' => __( 'New Feature', 'realto' ),
		'separate_items_with_commas' => __( 'Separate Features With Commas', 'realto' ),
		'add_or_remove_items' => __( 'Add or Remove Features', 'realto' ),
		'choose_from_most_used' => __( 'Choose From Most Used Features', 'realto' ),  
		'parent' => __( 'Parent Location', 'realto' )      	
		),
	'query_var' => true,  
	'rewrite' => true  
	)  
);


// start PROPERTIES columns

// Change the columns for the edit CPT screen
function change_columns( $cols ) {
	$cols = array(
			"cb" => '<input type="checkbox" />',
			"title" => __( "Title", "realto" ),
			"nt_details" => __( "Details", "realto" ),
			"nt_listprice" => __( "Price", "realto" ),
			"nt_features" => __( "Features", "realto" ),
			"nt_image" => __( "Image", "realto" ),
			"nt_status" => __( "Status", "realto" ),
			"author" => __( "Agent", "realto" ),
			"date" => __( "Last Updated", "realto" ),
		);
	return $cols;
}
add_filter( "manage_property_posts_columns", "change_columns" );

function custom_columns( $column, $post_id ) {
	global $nt_option;
	
	switch ( $column ) {
		case "nt_listprice":
			listing_price();
		break;
		case "nt_details":
			$locations = wp_get_post_terms($post_id, 'location', array("fields" => "all"));
			$property_type = wp_get_post_terms($post_id, 'property-type', array("fields" => "all"));
			
			$array_location = array();
			foreach($locations as $location):
				$term_link = get_term_link( $location, 'location' );
				$array_location[] = '<a href="'.$term_link.'">'.$location->name.'</a>';
			endforeach;
			$res_location = implode(", ",$array_location);
			
			$array_type = array();
			foreach($property_type as $type):
				$term_link_type = get_term_link( $type, 'property-type' );
				$array_type[] = '<a href="'.$term_link.'">'.$type->name.'</a>';
			endforeach;
			$res_type = implode(", ",$array_type);
			
			echo "<strong>ID: </strong>".$nt_option["listing_id_prefix"]."&shy;".get_post_meta( $post_id, "nt_prop_id", true)."<br />";
			echo __("Location: ","realto").$res_location;
			echo "<br />";
			echo __("Type: ","realto").$res_type;
			
		break;
		case "nt_features":
			$features = wp_get_post_terms($post_id, 'features', array("fields" => "all"));
			$array_feature = array();
			foreach($features as $feature):
				$term_link = get_term_link( $feature, 'features' );
				$array_feature[] = '<a href="'.$term_link.'">'.$feature->name.'</a>';
			endforeach;
			$res_feature = implode(", ",$array_feature);
			echo $res_feature;
			
		break;
		case "nt_image":
			the_post_thumbnail(array( 150,150));
		break;
		case "nt_status":
			if(get_post_meta($post_id, "nt_status", true)=='for-sale'){ 
					
				   _e('For Sale', 'realto'); 
			  }
			  elseif(get_post_meta($post_id, "nt_status", true)=='sold'){
					
				  _e('Sold', 'realto'); 
			  }
			  elseif(get_post_meta($post_id, "nt_status", true)=='upcoming'){
				  
					  _e('Upcoming', 'realto');
			  }
			 elseif(get_post_meta($post_id, "nt_status", true)=='inquire'){
					  _e('Inquire', 'realto'); 
				   
			  }else{ _e('For Rent', 'realto'); }
		break;
	}
}

add_action( "manage_posts_custom_column", "custom_columns", 10, 2 );

// end PROPERTIES columns

// Adds Custom Post Type*/
add_action('init', 'property_register'); 

/*===========================================
  Filters  
==============================================*/

// Locations
function restrict_property_by_location() {
	global $typenow;
	$post_type = 'property'; 
	$taxonomy = 'location'; 
	if ($typenow == $post_type) {
		$selected = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
		$info_taxonomy = get_taxonomy($taxonomy);
		wp_dropdown_categories(array(
			'show_option_all' => __("All {$info_taxonomy->label}"),
			'taxonomy' => $taxonomy,
			'name' => $taxonomy,
			'orderby' => 'name',
			'selected' => $selected,
			'show_count' => true,
			'hide_empty' => true,
		));
	};
}
add_action('restrict_manage_posts', 'restrict_property_by_location');

function convert_location_id_to_term_in_query($query) {
	global $pagenow;
	$post_type = 'property'; 
	$taxonomy = 'location'; 
	$q_vars = &$query->query_vars;
	if ($pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0) {
		$term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
		$q_vars[$taxonomy] = $term->slug;
	}
}
add_filter('parse_query', 'convert_location_id_to_term_in_query');

// Features
function restrict_property_by_features() {
	global $typenow;
	$post_type = 'property'; 
	$taxonomy = 'features'; 
	if ($typenow == $post_type) {
		$selected = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
		$info_taxonomy = get_taxonomy($taxonomy);
		wp_dropdown_categories(array(
			'show_option_all' => __("All {$info_taxonomy->label}"),
			'taxonomy' => $taxonomy,
			'name' => $taxonomy,
			'orderby' => 'name',
			'selected' => $selected,
			'show_count' => true,
			'hide_empty' => true,
		));
	};
}
add_action('restrict_manage_posts', 'restrict_property_by_features');

function convert_features_id_to_term_in_query($query) {
	global $pagenow;
	$post_type = 'property'; 
	$taxonomy = 'features'; 
	$q_vars = &$query->query_vars;
	if ($pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0) {
		$term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
		$q_vars[$taxonomy] = $term->slug;
	}
}
add_filter('parse_query', 'convert_features_id_to_term_in_query');

// property-type
function restrict_property_by_type() {
	global $typenow;
	$post_type = 'property'; 
	$taxonomy = 'property-type'; 
	if ($typenow == $post_type) {
		$selected = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
		$info_taxonomy = get_taxonomy($taxonomy);
		wp_dropdown_categories(array(
			'show_option_all' => __("All {$info_taxonomy->label}"),
			'taxonomy' => $taxonomy,
			'name' => $taxonomy,
			'orderby' => 'name',
			'selected' => $selected,
			'show_count' => true,
			'hide_empty' => true,
		));
	};
}
add_action('restrict_manage_posts', 'restrict_property_by_type');

function convert_property_type_id_to_term_in_query($query) {
	global $pagenow;
	$post_type = 'property'; 
	$taxonomy = 'property-type'; 
	$q_vars = &$query->query_vars;
	if ($pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0) {
		$term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
		$q_vars[$taxonomy] = $term->slug;
	}
}
add_filter('parse_query', 'convert_property_type_id_to_term_in_query');

/*===== Custom Filter Status ======*/

add_action( 'restrict_manage_posts', 'property_filter_restrict_manage_status' );
function property_filter_restrict_manage_status(){
    $type = 'property';
    if (isset($_GET['post_type'])) {
        $type = $_GET['post_type'];
    }
    if ('property' == $type){
        $values = array(
            'For Sale' => 'for-sale', 
            'For Rent' => 'for-rent',
            'Sold' => 'sold',
			'Upcoming' => 'upcoming',
			'Inquire' => 'inquire',
        );
        ?>
        <select name="status">
        <option value=""><?php _e('All Status ', 'realto'); ?></option>
        <?php
            $current_v = isset($_GET['status'])? $_GET['status']:'';
            foreach ($values as $label => $value) {
                printf
                    (
                        '<option value="%s"%s>%s</option>',
                        $value,
                        $value == $current_v? ' selected="selected"':'',
                        $label
                    );
                }
        ?>
        </select>
        <?php
    }
}
add_filter( 'parse_query', 'wpse45436_status_posts_filter' );
function wpse45436_status_posts_filter( $query ){
    global $pagenow;
    $type = 'property';
    if (isset($_GET['post_type'])) {
        $type = $_GET['post_type'];
    }
    if ( 'property' == $type && is_admin() && $pagenow=='edit.php' && isset($_GET['status']) && $_GET['status'] != '') {
        $query->query_vars['meta_key'] = 'nt_status';
        $query->query_vars['meta_value'] = $_GET['status'];
    }
}

/*==  Author ==*/
/*function restrict_manage_authors() {
	if (isset($_GET['post_type']) && post_type_exists($_GET['post_type']) && in_array(strtolower($_GET['post_type']), array('property'))) {
		wp_dropdown_users(array(
			'show_option_all'	=> __('All Agents','realto'),
			'show_option_none'	=> false,
			'name'			=> __('agent','realto'),
			'selected'		=> !empty($_GET['author']) ? $_GET['author'] : 0,
			'include_selected'	=> false
		));
	}
}
add_action('restrict_manage_posts', 'restrict_manage_authors');*/

?>