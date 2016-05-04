<?php
/**
 * Register our sidebars and widgetized areas.
 * @package RealTo
 * @since RealTo 1.0
 * Author: Waqas Riaz
 *
 */
function realto_widgets_init() {

	
	// Blog Sidebar
	register_sidebar( array(
		'name' => 'Blog Sidebar',
		'id' => 'blog-sidebar',
		'description'   => __( 'These are widgets for the Blog page.','realto' ),
		'before_widget' => '<div id="%1$s" class="box-container widget %2$s"><div class="padding30">',
		'after_widget' => '</div></div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );
	
	// Property Sidebar
	register_sidebar( array(
		'name' => 'Property Sidebar',
		'id' => 'property-sidebar',
		'description'   => __( 'These are widgets for the Property page.','realto' ),
		'before_widget' => '<div id="%1$s" class="box-container widget %2$s"><div class="padding30">',
		'after_widget' => '</div></div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );
	
	register_sidebar( array(
		'name' => 'IDX Homepage',
		'id' => 'idx-homepage',
		'description'   => __( 'These are widgets for the IDX Homepage.','realto' ),
		'before_widget' => '<div id="%1$s" class="box-container widget %2$s"><div class="padding30">',
		'after_widget' => '</div></div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );
	
	register_sidebar( array(
		'name' => 'IDX Sidebar',
		'id' => 'idx-sidebar',
		'description'   => __( 'These are widgets for the IDX Pages.','realto' ),
		'before_widget' => '<div id="%1$s" class="box-container widget %2$s"><div class="padding30">',
		'after_widget' => '</div></div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );
	
	register_sidebar( array(
		'name' => 'Page Sidebar',
		'id' => 'page-sidebar',
		'description'   => __( 'These are widgets for the Page.','realto' ),
		'before_widget' => '<div id="%1$s" class="box-container widget %2$s"><div class="padding30">',
		'after_widget' => '</div></div>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	) );
	
	
	// Footer widget 1
	register_sidebar( array(
		'name' => 'Footer widget 1',
		'id' => 'footer-widget-1',
		'description'   => __( 'These are widgets for the Footer column one.','realto' ),
		'before_widget' => '<div class="footer-widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	// Footer widget 2
	register_sidebar( array(
		'name' => 'Footer widget 2',
		'id' => 'footer-widget-2',
		'description'   => __( 'These are widgets for the Footer column two.','realto' ),
		'before_widget' => '<div class="footer-widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	// Footer widget 3
	register_sidebar( array(
		'name' => 'Footer widget 3',
		'id' => 'footer-widget-3',
		'description'   => __( 'These are widgets for the Footer column three.','realto' ),
		'before_widget' => '<div class="footer-widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	// Footer widget 4
	register_sidebar( array(
		'name' => 'Footer widget 4',
		'id' => 'footer-widget-4',
		'description'   => __( 'These are widgets for the Footer column four.','realto' ),
		'before_widget' => '<div class="footer-widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'realto_widgets_init' );
?>