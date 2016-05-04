<?php
/*
 * Plugin Name: Footer Address
 * Plugin URI: http://favethemes.com/
 * Description: A widget that tells about site
 * Version: 1.0
 * Author: Waqas Riaz
 * Author URI: http://favethemes.com/
 */
global $nt_option;
class NT_Footer_Address extends WP_Widget {
	
	
	/**
	 * Register widget
	**/
	public function __construct() {
		
		parent::__construct(
	 		'nt-footer-address', // Base ID
			__( 'realto: Footer Address', 'realto' ), // Name
			array( 'description' => __( 'Display address in footer', 'realto' ), ) // Args
		);
		
	}


	public function widget($args, $instance) {

		extract($args);

		$title = apply_filters('widget_title', $instance['title'] );
		$adds = $instance['adds'];
		$phone = $instance['phone'];
		$email = $instance['email'];
		
		echo $before_widget;
		
			if ( $title ) echo $before_title . $title . $after_title;?>
			
			<div class="clearfix">
                <ul>
                    <li class="clearfix">
                        <i class="icon-map-marker pull-left"></i>
                        <p class="pull-left"><?php echo $adds; ?></p></li>
                    <li class="clearfix">
                        <i class="icon-phone pull-left"></i>
                        <p class="pull-left"><?php echo $phone; ?></p></li>
                    <li class="clearfix">
                        <i class="icon-envelope-alt pull-left"></i>
                        <p class="pull-left"><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></p>
                    </li>
                </ul>
            </div>
            <!-- .clearfix -->
	<?php		
		echo $after_widget;

	}
	

	public function update($new_instance, $old_instance) {
		return $new_instance;
	}
	

	public function form($instance) {
		
		/* Default widget settings. */
		$defaults = array(
			'title' => 'Address',
			'adds' => "",
			'phone' => '',
			'email' => '',
			
		);
		
		$instance = wp_parse_args( (array) $instance, $defaults );
		
	?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'realto'); ?>:</label>
			<input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" class="widefat" />
		</p>
        <p>
        	<label for="<?php echo $this->get_field_id('adds'); ?>"><?php _e('Address', 'realto'); ?>:</label>
			<input type="text" id="<?php echo $this->get_field_id('adds'); ?>" name="<?php echo $this->get_field_name('adds'); ?>" value="<?php echo $instance['adds']; ?>" class="widefat" />
        </p>
        <p>
        	<label for="<?php echo $this->get_field_id('phone'); ?>"><?php _e('Phone', 'phone'); ?>:</label>
			<input type="text" id="<?php echo $this->get_field_id('phone'); ?>" name="<?php echo $this->get_field_name('phone'); ?>" value="<?php echo $instance['phone']; ?>" class="widefat" />
        </p>
        <p>
        	<label for="<?php echo $this->get_field_id('email'); ?>"><?php _e('Email', 'realto'); ?>:</label>
			<input type="text" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" value="<?php echo $instance['email']; ?>" class="widefat" />
        </p>
        
		
<?php 
		
	}
}
register_widget( 'NT_Footer_Address' );