<?php
/**
 * The template for taxonomy location
 * @package RealTo
 * @since RealTo 1.0
 */
global $nt_option;
get_header(); ?>

<div class="container page-content">
    <div class="row">
        <div class="span8">
            <div class="row">
                
                <?php
				if ( have_posts() ) :?>
					<div class="span8 box-container">
                    	<div class="span12"><h2 class="archive-title"><?php printf( __( 'Location: %s', 'realto' ), single_tag_title( '', false ) ); ?></h2></div>
                    </div>
                    <?php
                    // Start the Loop.
					while ( have_posts() ) : the_post();?>
						
                    <div class="span8 box-container">
                        <div class="holder row">
                            
							<?php nt_property_pic_list();?>
                            
                            <span class="prop-tag">
								<?php if(get_post_meta($post->ID, "nt_status", true)=='for-sale'){ 
                                            
                                           _e('For Sale', 'realto'); 
                                      }
                                      elseif(get_post_meta($post->ID, "nt_status", true)=='sold'){
                                            
                                          _e('Sold', 'realto'); 
                                            
                                      }else{ _e('For Rent', 'realto'); }?>
                            </span>
                            <div class="span4 prop-info">
                                <h3 class="prop-title"><?php the_title();?></h3>
                                <ul class="more-info clearfix">
                                    <?php if($nt_option["sh_beds"]==1):?>
                                    <li class="info-label clearfix">
                                    	<span class="pull-left"><?php _e("Beds:", "realto"); ?></span>
                                        <span class="qty pull-right"><?php echo get_post_meta($post->ID, "nt_bedrooms", true);?></span>
                                    </li>
                                    <?php endif;?>
                                    <?php if($nt_option["sh_baths"]==1):?>
                                    <li class="info-label clearfix">
                                    	<span class="pull-left"><?php _e("Baths:", "realto"); ?></span>
                                        <span class="qty pull-right"><?php echo get_post_meta($post->ID, "nt_bathrooms", true);?></span>
                                   </li>
                                   <?php endif;?>
                                   <?php if($nt_option["sh_propertytype"]==1):?>
                                    <li class="info-label clearfix">
                                    	<span class="pull-left"><?php _e("Property Type:", "realto"); ?></span>
                                        <span class="qty pull-right"><?php propertyltype();?></span>
                                   </li>
                                   <?php endif;?>
                                   <?php if($nt_option["sh_parking"]==1):?>
                                    <li class="info-label clearfix">
                                    	<span class="pull-left"><?php _e("Parking:", "realto"); ?></span>
                                        <span class="qty pull-right"><?php echo get_post_meta($post->ID, "nt_parking", true);?></span>
                                   </li>
                                   <?php endif;?>
                                   <?php if($nt_option["sh_squrefeet"]==1):?>
                                    <li class="info-label clearfix">
                                    	<span class="pull-left"><?php _e("Square Feet:", "realto"); ?></span>
                                        <span class="qty pull-right"><?php echo get_post_meta($post->ID, "nt_squarefeet", true);?> <?php echo __('sqft','realto')?></span>
                                   </li>
                                   <?php endif;?>
                                   <?php if($nt_option["sh_neighborhood"]==1):?>
                                    <li class="info-label clearfix">
                                    	<span class="pull-left"><?php _e("Neighborhood:", "realto"); ?></span>
                                        <span class="qty pull-right"><?php echo get_post_meta($post->ID, "nt_neighborhood", true);?></span>
                                   </li>
                                   <?php endif;?>
                                   <?php if($nt_option["sh_year"]==1):?>
                                    <li class="info-label clearfix">
                                    	<span class="pull-left"><?php _e("Year:", "realto"); ?></span>
                                        <span class="qty pull-right"><?php echo get_post_meta($post->ID, "nt_builtin", true);?></span>
                                   </li>
                                   <?php endif;?>
                                </ul>
                            </div>
                        </div>
                    </div>
               <?php endwhile; ?>
					  <?php realto_paging_nav(); ?>
					 
			   <?php else : 
					// If no content, include the "No posts found" template.
					get_template_part( 'property', 'none' );
	
				endif;
				?>
            </div>
            <!-- .row -->
        </div>
        <!-- .span8 -->
        <div class="span4">
            
            <?php get_sidebar("property");?>
            
        </div>
        <!-- .span4 -->
        
    </div>
    <!-- .row -->
</div>
<!-- .container -->

<?php get_footer(); ?>
