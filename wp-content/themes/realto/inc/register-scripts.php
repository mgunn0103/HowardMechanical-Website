<?php
/**
 * Register jQuery scripts and 
 * CSS Styles only for the front-end
 *
 * @package RealTo
 * @since 	RealTo 1.0
**/

function nt_theme_scripts(){	
	/**
	 * Register CSS styles
	 */
	 
	 wp_register_style( 'nt-bootstrap', get_template_directory_uri(). '/css/bootstrap.css', array(), '1', 'all' );
	 wp_register_style( 'nt-bootstrap-responsive', get_template_directory_uri(). '/css/bootstrap-responsive.css', array(), '1', 'all' );
	 wp_register_style( 'nt-font-awesome.min', get_template_directory_uri(). '/css/font-awesome.min.css', array(), '1', 'all' );
	 wp_register_style( 'nt-colors', get_template_directory_uri(). '/css/colors.css', array(), '1', 'all' );
	 
	 wp_enqueue_style( 'nt-bootstrap' );
	 wp_enqueue_style( 'nt-bootstrap-responsive' );
	 wp_enqueue_style( 'nt-font-awesome.min' );
	 wp_enqueue_style( 'nt-colors' );
	 wp_enqueue_style( 'style', get_stylesheet_uri(), array(), '1', 'all' );
	 
	
	 wp_enqueue_script( 'jquery', false, array(), false, true);
     wp_enqueue_script( 'nt-bootstrap.min', get_template_directory_uri() . '/js/bootstrap.min.js', 'jquery', '1', true );
     wp_enqueue_script( 'nt-jquery.placeholder', get_template_directory_uri() . '/js/jquery.placeholder.js', 'jquery', '2.0.7', true );
	 wp_enqueue_script( 'nt-jquery.cycle2.min', get_template_directory_uri() . '/js/jquery.cycle2.min.js', 'jquery', '1', true );
     wp_enqueue_script( 'nt-custom', get_template_directory_uri() . '/js/custom.js', 'jquery', '1', true );
	 wp_enqueue_script( 'gomap', get_template_directory_uri() . '/js/jquery.gomap-1.3.2.min.js', array( 'jquery' ), '20140203', false );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
}

if(!is_admin()){
	add_action( 'wp_enqueue_scripts', 'nt_theme_scripts' );
}
if (is_admin() ){
	function favethemes_admin_scripts(){	
		wp_register_script('ntmetajs', get_template_directory_uri() .'/js/admin/init.js', array('jquery','media-upload','thickbox'));
		wp_enqueue_script('ntmetajs');
	}
add_action('admin_enqueue_scripts', 'favethemes_admin_scripts');
}
	


// Header custom JS
function header_scripts(){
	global $nt_option;
	$header_code = $nt_option['custom_js_header'];
	if ( $header_code != '' ){
		echo '<script type="text/javascript">'."\n",
				$nt_option['custom_js_header']."\n",
			 '</script>'."\n";
	}
}
if(!is_admin()){
	add_action('wp_head', 'header_scripts');
}

// Footer custom JS
function footer_scripts(){
	global $nt_option;
	$footer_code = $nt_option['custom_js_footer'];
	if ( $footer_code != '' ){
		echo '<script type="text/javascript">'."\n",
				$nt_option['custom_js_footer']."\n",
			 '</script>'."\n";
	}
}
if(!is_admin()){
	add_action( 'wp_footer', 'footer_scripts', 100 );
}