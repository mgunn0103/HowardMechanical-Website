<?php

/*-----------------------------------------------------------------------------------*/
/* Button
/*-----------------------------------------------------------------------------------*/	
function favethemes_button( $atts, $content = null ) {	

	extract( shortcode_atts(array(
		"link_url" => '',
		"title" => '',
		"type" => '',
		"size" => '',
	), $atts) );

	$fav_button = '<a href="'. $link_url .'" class="btn btn-'. trim($size) .' btn-'. trim($type) .'">'. $title .'</a>';

    return $fav_button;  
}

add_shortcode('button', 'favethemes_button');

/*-----------------------------------------------------------------------------------*/
/* Button
/*-----------------------------------------------------------------------------------*/	
function favethemes_realtobutton( $atts, $content = null ) {	

	extract( shortcode_atts(array(
		"link_url" => '',
		"title" => '',
		"size" => '',
	), $atts) );

	$fav_button = '<a href="'. $link_url .'" class="btn btn-'. trim($size) .' btn-realto">'. $title .'</a>';

    return $fav_button;  

}

add_shortcode('realtobutton', 'favethemes_realtobutton');


/*-----------------------------------------------------------------------------------*/
/* Block Quote */
/*-----------------------------------------------------------------------------------*/

function favethemes_blockquote( $atts, $content = null){

	return '<hr><blockquote><p>' . do_shortcode($content) . '</p></blockquote><hr>';
}
add_shortcode('blockquote', 'favethemes_blockquote');





/*-----------------------------------------------------------------------------------*/
/*	Alert Boxes
/*-----------------------------------------------------------------------------------*/

function favethemes_alert_boxes($atts, $content = null) {	

	extract( shortcode_atts(array(    
        "type" => 'notice' // Notice, Warning, Success, Error, Info
    ), $atts) );  	

	$fav_alerts = '<div class="alert alert-'. $type .'"><button type="button" data-dismiss="alert" class="close"><i class="icon-remove"></i></button>'. do_Shortcode($content) .'</div>';   

	return $fav_alerts;           

}

add_shortcode('alert_box', 'favethemes_alert_boxes');


/*-----------------------------------------------------------------------------------*/
/*	Tabs
/*-----------------------------------------------------------------------------------*/

function favethemes_tabgroup( $atts, $content = null ) {
	$GLOBALS['tab_count'] = 0;
	$i = 1;
	$randomid = rand();

	do_shortcode( $content );

	if( is_array( $GLOBALS['tabs'] ) ){
	
		foreach( $GLOBALS['tabs'] as $tab ){	
			
			if($i==1){$ac_class = "active";}else{$ac_class="";}
			
			$tabs[] = '<li class="'.$ac_class.'"><a href="#tab'.$randomid.$i.'" data-toggle="tab">'. $tab['title'].'</a></li>';
			$panes[] = '<div class="tab-pane '.$ac_class.'" id="tab'.$randomid.$i.'"><p>'.$tab['content'].'</p></div>';
			
			$i++;
			
		}
		$return = '<div class="tabbable" id="myTab"><ul class="nav nav-tabs">'.implode( "\n", $tabs ).'</ul><div class="tab-content">'.implode( "\n", $panes ).'</div></div>';
	}
	return $return;
	
}
add_shortcode( 'tabgroup', 'favethemes_tabgroup' );

function favethemes_tab( $atts, $content = null) {
	extract(shortcode_atts(array(
			'title' => '',
	), $atts));
	
	$x = $GLOBALS['tab_count'];
	$GLOBALS['tabs'][$x] = array( 'title' => sprintf( $title, $GLOBALS['tab_count'] ), 'content' =>  do_shortcode($content) );
	$GLOBALS['tab_count']++;
}
add_shortcode( 'tab', 'favethemes_tab' );


/*-----------------------------------------------------------------------------------*/
/* Toggle Item
/*-----------------------------------------------------------------------------------*/

function favethemes_toggle_shortcode( $atts, $content = null ){

	extract( shortcode_atts(array(
			"title" => 'Accordion Title'
	), $atts) );  
	
	
	$randomid = rand();
	
	$str = '<div class="accordion-group">';
		$str .= '<div class="accordion-heading">';
			$str .= '<a class="accordion-toggle" data-parent="#accordion" data-toggle="collapse" href="#collapse'.$randomid.'">'.$title.'</a>';
		$str .= '</div>';
		$str .= '<div class="accordion-body collapse" id="collapse'.$randomid.'">';
			$str .= '<div class="accordion-inner">';
				$str .= do_shortcode($content);
			$str .= '</div>';
		$str .= '</div>';
	$str .= '</div>';
	
	return $str;

}
add_shortcode('toggle', 'favethemes_toggle_shortcode');



/*-----------------------------------------------------------------------------------*/
/*	Columns
/*-----------------------------------------------------------------------------------*/
if (!function_exists('no_wpautop')) {
	function no_wpautop($content){ 
		$content = str_replace('<br />', '', $content);
		$code = do_shortcode($content);
		return $code;
	}
}
function favethemes_cloumn( $atts, $content = null ) {
	
	$str = '';
	$str .= '<div class="row-fluid">';
	$str .= no_wpautop($content);
    $str .= '</div>';
		
	return $str;
}


function favethemes_one_third( $atts, $content = null ) {

   	$str = '';
	$str .= '<div class="span4">';
	$str .= do_shortcode($content);
    $str .= '</div>';
		
	return $str;
   
}


function favethemes_one_half( $atts, $content = null ) {
   
   		return '<div class="span6">' . do_shortcode($content) . '</div>';
}



function favethemes_one_fourth( $atts, $content = null ) {
   return '<div class="span3">' . do_shortcode($content) . '</div>';
}

function favethemes_three_one( $atts, $content = null ) {
   return '<div class="span9">' . do_shortcode($content) . '</div>';
}

function favethemes_one_sixth( $atts, $content = null ) {
   return '<div class="span2">' . do_shortcode($content) . '</div>';
}

add_shortcode('one_half', 'favethemes_one_half');
add_shortcode('one_third', 'favethemes_one_third');

add_shortcode('column', 'favethemes_cloumn');
add_shortcode('one_fourth', 'favethemes_one_fourth');
add_shortcode('third_one', 'favethemes_three_one');
add_shortcode('one_sixth', 'favethemes_one_sixth');


/*-----------------------------------------------------------------------------------*/
/* Why Choose Us
/*-----------------------------------------------------------------------------------*/	
function favethemes_whychooseus( $atts, $content = null ) {	

	extract( shortcode_atts(array(
		"title" => '',
		"link_text" => '',
		"url" => '',
	), $atts) );
	
	$str = '<div class="span4">';
	$str .= '<div class="info-box">';
	$str .='<h2 class="secion-title">'.trim($title).'</h2>';
	$str .= do_Shortcode($content);
	if($atts["url"] || $atts["link_text"]):
	$str .='<a class="serif italic" href="'.($url).'" title="'.($link_text).'">'.($link_text).' &raquo;</a>';
	endif;
	$str .= '</div>';
	$str .= '</div>';

    return $str;  
}

add_shortcode('why_choose_us', 'favethemes_whychooseus');

/*-----------------------------------------------------------------------------------*/
/*	Service Box Shortcode
/*-----------------------------------------------------------------------------------*/

function favethemes_service_box_shortcode( $atts, $content = null ){
          
    extract( shortcode_atts(array(
        "icon" => '',        // icon url or icon class
        "title" => '',
		"link_text" => '',
		"url" => '',
    ), $atts) );    

	$str = '<div class="info-box">';
		$str .= '<h3 class="info-head">'.$title.'</h3>';
		$str .= '<div class="row clearfix">';
			$str .= '<div class="pull-left icons hidden-phone">';
				$str .= '<i class="'.trim($icon).'"></i>';
			$str .= '</div>';
			$str .= '<div class="span3">';
				$str .= do_Shortcode($content);
				if($atts["url"] || $atts["link_text"]):
				$str .= '<a class="serif italic" href="'.$url.'" title="Continue">'.$link_text.' &raquo;</a>';
				endif;
			$str .= '</div>';
		$str .= '</div>';
	$str .= '</div>';

	return $str;

}

add_shortcode('service_box', 'favethemes_service_box_shortcode');

/*
	Agents shortcode
*/
function favetheme_agents($atts, $content = null){
	
	extract(shortcode_atts(array(
		"title" => '',
		"link_text" => ''
	), $atts) );
	
	$args = array(
	'who' => 'authors'
	);
	$agents = get_users( $args );
	$i=0;
    $str = '<div class="span8">';
		$str .= '<h2 class="secion-title">'.$title.'</h2>';
		$str .= '<div class="row">';
         foreach( $agents as $agent ) :
			$i++;
			 $agent_url = get_author_posts_url( $agent->ID ); 
			
            $str .= '<div class="span2">';
				$str .= '<div class="home-agents widget">';
					$str .= '<a class="overlay" href="'.$agent_url.'" title="'.$agent->display_name.'">';
						$str .= '<span class="more"></span>';
						 $str .= get_avatar($agent->ID, 600); 
					$str .= '</a>';
					$str .= '<p class="home-agent-name">'.$agent->display_name.'</p>';
					$str .= '<a class="serif italic" href="'.$agent_url.'" title="'.$link_text.'">'.$link_text.' &raquo;</a>';
				$str .= '</div>';

			$str .= '</div>';
            if($i==4){break;}
		endforeach; 
        $str .= '</div>';
	$str .= '</div>';
	
	return $str;
}
add_shortcode('home_agents', 'favetheme_agents');

/*
	Home Page Blog Articles
*/
function favetheme_home_articles($atts, $content = null){
	
	extract(shortcode_atts(array(
		"title" => '',
		"num_of_posts" => '',
	), $atts) );
	
	
	global $query_string;
		$args = array(
			'numberposts'     => '',
			'posts_per_page' => $num_of_posts,
			'offset'          => 0,
			'cat'        =>  '',
			'orderby'         => 'date',
			'order'           => 'DESC',
			'include'         => '',
			'exclude'         => '',
			'meta_key'        => '',
			'meta_value'      => '',
			'post_type'       => 'post',
			'post_mime_type'  => '',
			'post_parent'     => '',
			'post_status'     => 'publish',
		);
	$post = new WP_Query( $args );
	
	
	$str = '<div class="span4">';
		$str .= '<div class="home-blog-articles widget">';
			$str .= '<h2 class="secion-title">Articles from the Blog</h2>';
			$str .= '<ul>';
				
				while($post->have_posts()): $post->the_post();
				
				$str .= '<li>';
					$str .= '<i class="icon-caret-right"></i>';
					$str .= '<a title="title" href="'.get_permalink().'">'.get_the_title().'</a>';
				$str .= '</li>';
				
				endwhile;
				
			$str .= '</ul>';
		$str .= '</div>';
	$str .= '</div>';
	
	return $str;
}
add_shortcode('home_articles', 'favetheme_home_articles');


function favetheme_tagline($atts, $content = null){
	
	extract(shortcode_atts(array(
		"upper_line" => '',
		"lower_line" => '',
		"btn_text"   => '',
		"btn_link"   => '',
	), $atts) );
	
	
	$str = '<div class="span12 box-container">';
		$str .= '<div class="row adv-message clearfix">';
			$str .= '<div class="pull-left span7">';
				$str .= '<p class="upper-line serif italic">'.$upper_line.'</p>';
				$str .= '<p class="lower-line">'.$lower_line.'</p>';
			$str .= '</div>';
			$str .= '<a class="pull-right btn btn-large btn-realto span3" href="'.$btn_link.'" title="'.$btn_text.'">'.$btn_text.'</a>';
		$str .= '</div>';
	$str .= '</div>';
		
	return $str;
}
add_shortcode('tagline', 'favetheme_tagline');
?>