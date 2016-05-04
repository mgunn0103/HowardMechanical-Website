<?php
/*
 * Plugin Name: Most Comment Posts
 * Plugin URI: http://favethemes.com/
 * Description: A widget that tells about site
 * Version: 1.0
 * Author: Waqas Riaz
 * Author URI: http://favethemes.com/
 */
 
class NT_Most_Commented extends WP_Widget {
	
	
	/**
	 * Register widget
	**/
	public function __construct() {
		
		parent::__construct(
	 		'nt_most_commented', // Base ID
			__( 'realto: Most Commented Posts', 'realto' ), // Name
			array( 'description' => __( 'Show a list of the most commented posts with comments count', 'realto' ), ) // Args
		);
		
	}

	
	/**
	 * Front-end display of widget
	**/
	public function widget( $args, $instance ) {
				
		extract( $args );

		$title = apply_filters('widget_title', $instance['title'] );
		$items_num = $instance['items_num'];
		
		echo $before_widget;
			
			
			if ( $title ) echo $before_title . $title . $after_title;
            ?>
            
            <?php
			/** 
			 * Posts by comment count
			**/
			global $post;
			$nt_most_commented = new WP_Query(
				array(
					'post_type' => 'post',
					'order' => 'DECS',
					'orderby' => 'comment_count',
					'posts_per_page' => $items_num
				)
			);
			?>
            
            <ul>
            
			<?php $com = 1; ?>
            <?php while ( $nt_most_commented->have_posts() ) : $nt_most_commented->the_post(); ?>
                
                
                <li class="clearfix score-<?php echo $com++;?>">
                
                	
                        <a href="<?php the_permalink(); ?>">
                            <?php if ( strlen( $post->post_title ) > 30 ) { echo substr( the_title( $before = '', $after = '', FALSE ), 0, 30 ) . '...'; } else { the_title(); } ?>
                        </a>
                    
                </li>
                
            <?php endwhile; $com++;  ?>
            
            </ul>
                
			<?php wp_reset_query(); ?>

	    <?php 
		echo $after_widget;
		
	}
	
	
	/**
	 * Sanitize widget form values as they are saved
	**/
	public function update( $new_instance, $old_instance ) {
		
		$instance = array();

		/* Strip tags to remove HTML. For text inputs and textarea. */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['items_num'] = $new_instance['items_num'];
		
		return $instance;
		
	}
	
	
	/**
	 * Back-end widget form
	**/
	public function form( $instance ) {
		
		/* Default widget settings. */
		$defaults = array(
			'title' => 'Most Commented',
			'items_num' => '5',
		);
		$instance = wp_parse_args( (array) $instance, $defaults );
		
	?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'realto'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" class="widefat" />
		</p>
		<p>
        	<label for="<?php echo $this->get_field_id( 'items_num' ); ?>"><?php _e('Maximum posts to show:', 'realto'); ?></label>
			<select id="<?php echo $this->get_field_id( 'items_num' ); ?>" name="<?php echo $this->get_field_name( 'items_num' ); ?>" class="widefat">
            	<?php for ( $num=1; $num<=15; $num++ ){ ?>
				<option value="<?php echo $num; ?>" <?php if ( $instance["items_num"] == $num ) echo 'selected="selected"'; ?>><?php echo $num; ?></option>
                <?php } ?>
			</select>
		</p>
	<?php
	}

}
register_widget( 'NT_Most_Commented' );