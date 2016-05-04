<?php
/*
 * Plugin Name: About Site
 * Plugin URI: http://favethemes.com/
 * Description: A widget that tells about site
 * Version: 1.0
 * Author: Waqas Riaz
 * Author URI: http://favethemes.com/
 */
global $nt_option;
class NT_About_Site extends WP_Widget {
	
	
	/**
	 * Register widget
	**/
	public function __construct() {
		
		parent::__construct(
	 		'nt-about-site', // Base ID
			__( 'realto: Footer About Site', 'realto' ), // Name
			array( 'description' => __( 'Display info about your website in footer first widget', 'realto' ), ) // Args
		);
		
	}


	public function widget($args, $instance) {

		extract($args);

		$title = apply_filters('widget_title', $instance['title'] );
		$tagline = $instance['tagline'];
		$about_site = $instance['about_site'];
		
		echo $before_widget;
		
			if ( $title ) echo $before_title . $title . $after_title;?>
			
			<p class="footer-tag-line"><?php echo $tagline; ?></p>
            <p><?php echo $about_site; ?></p>
	<?php		
		echo $after_widget;

	}
	

	public function update($new_instance, $old_instance) {
		return $new_instance;
	}
	

	public function form($instance) {
		
		/* Default widget settings. */
		$defaults = array(
			'title' => 'RealTo',
			'tagline' => '',
			'about_site' => '',
			
		);
		
		$instance = wp_parse_args( (array) $instance, $defaults );
		
	?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'realto'); ?>:</label>
			<input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" class="widefat" />
		</p>
        <p>
        	<label for="<?php echo $this->get_field_id('tagline'); ?>"><?php _e('Tagline', 'realto'); ?>:</label>
			<input type="text" id="<?php echo $this->get_field_id('tagline'); ?>" name="<?php echo $this->get_field_name('tagline'); ?>" value="<?php echo $instance['tagline']; ?>" class="widefat" />
        </p>
        <p>
        	<label for="<?php echo $this->get_field_id('about_site'); ?>"><?php _e('Short text about the site', 'realto'); ?>:</label>
			<textarea id="<?php echo $this->get_field_id('about_site'); ?>" name="<?php echo $this->get_field_name('about_site'); ?>" class="widefat" ><?php echo $instance['about_site']; ?></textarea>
        </p>
        
		
<?php 
		
	}
}
register_widget( 'NT_About_Site' );