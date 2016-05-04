<?php

class realto_nav_menu extends Walker_Nav_Menu {



function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output )

{

	$id_field = $this->db_fields['id'];

	if ( is_object( $args[0] ) ) {

		$args[0]->has_children = ! empty( $children_elements[$element->$id_field] );

	}

	return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );

}

function start_lvl(&$output, $depth = 0, $args = array()) {

	// depth dependent classes

    $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent

    $display_depth = ( $depth + 1); // because it counts the first submenu as 0

    $classes = array(

        'dropdown-menu'

        );

    $class_names = implode( ' ', $classes );

  

    // build html

    $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";

}



function end_lvl(&$output, $depth = 0, $args = array()) {

	$indent = str_repeat("\t", $depth);

	$output .= "$indent</ul>\n";

} 

 

  

// add main/sub classes to li's and links

 function start_el( &$output, $item, $depth = 0, $args = array(), $current_object_id = 0 ) {

		global $wp_query;

		$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent

		

		if ( $args->has_children ) {

			$item->classes[] = 'dropdown';

		}

		

		// depth dependent classes

		$depth_classes = array(

			( $depth == 0 ? 'main-menu-item' : 'dropdown' ),

			( $depth >=2 ? 'sub-sub-menu-item' : '' ),

			'menu-item-depth-' . $depth

		);

		$depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

	  

		// passed classes

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;

		

		if($depth == "0" && in_array("current_page_item",$item->classes)){

			$class_names = in_array("current_page_item",$item->classes) ? ' active' : '';

		}elseif($depth == "0" && in_array("current-menu-parent",$item->classes)){

			$class_names = in_array("current-menu-parent",$item->classes) ? ' active' : '';

		}else{

		$class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

		}

		//

	  

		// build html

		$output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';

	  

		// link attributes

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';

		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';

		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';

		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

		if ( $args->has_children ) {

			$attributes .= ' class="dropdown-toggle" data-toggle="' . ( $depth > 0 ? 'sub-menu-link' : 'dropdown' ) . '" href="#"';

		}

		

		if ( $args->has_children ) {

			

			$item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',

				$args->before,

				$attributes,

				$args->link_before,

				apply_filters( 'the_title', $item->title.'<i class="icon-caret-down"></i>', $item->ID ),

				$args->link_after,

				$args->after

			);

			

		}else{

			$item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',

				$args->before,

				$attributes,

				$args->link_before,

				apply_filters( 'the_title', $item->title, $item->ID ),

				$args->link_after,

				$args->after

			);

		}
		// build html
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
	function end_el( &$output, $object, $depth = 0, $args = array() ) {
		$output .= "</li>\n";
    }
}?>