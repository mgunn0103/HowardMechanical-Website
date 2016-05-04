<?php
/*
 * Plugin Name: Property Search
 * Plugin URI: http://favethemes.com/
 * Description: A widget that tells about site
 * Version: 1.0
 * Author: Waqas Riaz
 * Author URI: http://favethemes.com/
 */

class NT_Property_Search extends WP_Widget {
	
	
	/**
	 * Register widget
	**/
	public function __construct() {
		
		parent::__construct(
	 		'nt-property-search', // Base ID
			__( 'realto: Property Search', 'realto' ), // Name
			array( 'description' => __( 'Widget for property search', 'realto' ), ) // Args
		);
		
	}


	public function widget($args, $instance) {

		extract($args);

		$title = apply_filters('widget_title', $instance['title'] );
		
		
		echo $before_widget;
		
			if ( $title ) echo $before_title . $title . $after_title;
			
			$purl = get_post_type_archive_link( "property" );?>
            
            <?php global $nt_option; ?>
			
			<form action="<?php echo $purl; ?>" class="row-fluid" method="get">
                <input type="hidden" name="post_type" value="property" />
                <input type="text" class="span12" name="search_keyword" value="" placeholder="<?php if(isset($nt_option["s_propertykeyword"])){ echo $nt_option["s_propertykeyword"];} ?>" />
                    <select class="span12 select" name="locations">
                        <option value=""><?php if(isset($nt_option["s_location"])){ echo $nt_option["s_location"];} ?></option>
                        <?php $locations = get_terms('location');?>
                        <?php foreach($locations as $location): ?>
                                
                                <option value="<?php echo $location->slug; ?>"><?php echo $location->name; ?></option>
                                
                        <?php endforeach; ?>
                    </select>
                    <select class="span12 select" name="property_type">
                        <option value=""><?php if(isset($nt_option["s_propertytype"])){ echo $nt_option["s_propertytype"];} ?></option>
                        <?php $property_type = get_terms('property-type');?>
                        <?php foreach($property_type as $p_type): ?>
                                
                                <option value="<?php echo $p_type->slug; ?>"><?php echo $p_type->name; ?></option>
                                
                        <?php endforeach; ?>
                    </select>
                    <select class="span6 select pull-left" name="beds">
                        <option value=""><?php if(isset($nt_option["s_bed"])){ echo $nt_option["s_bed"];} ?></option>
                        <option value="1">1+ <?php if(isset($nt_option["s_bed"])){ echo $nt_option["s_bed"];} ?></option>
                        <option value="2">2+ <?php if(isset($nt_option["s_bed"])){ echo $nt_option["s_bed"];} ?></option>
                        <option value="3">3+ <?php if(isset($nt_option["s_bed"])){ echo $nt_option["s_bed"];} ?></option>
                        <option value="4">4+ <?php if(isset($nt_option["s_bed"])){ echo $nt_option["s_bed"];} ?></option>
                        <option value="5">5+ <?php if(isset($nt_option["s_bed"])){ echo $nt_option["s_bed"];} ?></option>
                        <option value="6">6+ <?php if(isset($nt_option["s_bed"])){ echo $nt_option["s_bed"];} ?></option>
                    </select>
                    <select class="span6 select pull-right" name="baths">
                        <option value=""><?php if(isset($nt_option["s_bath"])){ echo $nt_option["s_bath"];} ?></option>
                        <option value="1">1+ <?php if(isset($nt_option["s_bath"])){ echo $nt_option["s_bath"];} ?></option>
                        <option value="2">2+ <?php if(isset($nt_option["s_bath"])){ echo $nt_option["s_bath"];} ?></option>
                        <option value="3">3+ <?php if(isset($nt_option["s_bath"])){ echo $nt_option["s_bath"];} ?></option>
                        <option value="4">4+ <?php if(isset($nt_option["s_bath"])){ echo $nt_option["s_bath"];} ?></option>
                        <option value="5">5+ <?php if(isset($nt_option["s_bath"])){ echo $nt_option["s_bath"];} ?></option>
                        <option value="6">6+ <?php if(isset($nt_option["s_bath"])){ echo $nt_option["s_bath"];} ?></option>
                    </select>
                    <select class="span12 select clearfix" name="status">
                        <option value=""><?php if(isset($nt_option["s_status"])){ echo $nt_option["s_status"]; } ?></option>
                        <option value="for-rent"><?php _e("For Rent","realto"); ?></option>
                        <option value="for-sale"><?php _e("For Sale","realto"); ?></option>
                    </select>
                    
                    <input class="span6 select pull-left" type="text" name="min-price" value="" placeholder="<?php if(isset($nt_option["s_minprice"])){echo $nt_option["site_currency"]." ".$nt_option["s_minprice"];}?>" />
                    
                    <input class="span6 select pull-right" type="text" name="max-price" value="" placeholder="<?php if(isset($nt_option["s_maxprice"])){echo $nt_option["site_currency"]." ".$nt_option["s_maxprice"];}?>" />
                    
                    <div class="clearfix">
                        <input class="btn pull-right span12 btn-realto-form btn-large" value="<?php _e("Search", "realto");?>" type="submit" />
                    </div>
                </form>
	<?php		
		echo $after_widget;

	}
	

	public function update($new_instance, $old_instance) {
		return $new_instance;
	}
	

	public function form($instance) {
		
		/* Default widget settings. */
		$defaults = array(
			'title' => 'Find your new home',			
		);
		
		$instance = wp_parse_args( (array) $instance, $defaults );
		
	?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'realto'); ?>:</label>
			<input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" class="widefat" />
		</p>
        
		
<?php 
		
	}
}
register_widget( 'NT_Property_Search' );