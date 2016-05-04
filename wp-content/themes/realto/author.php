<?php 
/**
 * Author template. Display the author 
 * info and all posts by the author
 *
 * @package RealTo
 * @since 	RealTo 1.0
**/ 
?>

<?php get_header(); ?>
<?php $curauth = get_query_var( 'author_name' ) ? get_user_by( 'slug', get_query_var( 'author_name' ) ) : get_userdata( get_query_var( 'author' ) ); ?>		
	
    <div class="container page-content">
            <div class="row">
                <div class="span8">
                    <div class="row">
                        <div class="span8 box-container">
                            <div class="agent row">
                                <div class="span3"><?php echo get_avatar($curauth->ID, 600); ?></div>
                                <div class="span5">
                                    <div class="agent-content">
                                        <h3><?php echo $curauth->display_name; ?></h3>
                                        <ul class="unstyled">
                                            <li>
                                                <i class="icon-envelope-alt"></i>
                                                <?php _e('Email:','realto')?> <a href="mailto:<?php echo $curauth->user_email; ?>"><?php echo $curauth->user_email; ?></a>
                                            </li>
                                            
                                       <?php if($curauth->phone_number): ?>
                                            <li>
                                                <i class="icon-phone"></i>
                                                <?php _e('Phone:','realto')?> <?php echo $curauth->phone_number; ?>
                                            </li>
                                       <?php endif ;?>
                                       
                                       <?php if($curauth->linkedin): ?>
                                            <li>
                                                <i class="icon-linkedin"></i>
                                                <?php echo $curauth->linkedin; ?>
                                            </li>
                                       <?php endif; ?>
                                            
                                       <?php if($curauth->twitter): ?>     
                                            <li>
                                                <i class="icon-twitter"></i>
                                                <?php echo $curauth->twitter; ?>
                                            </li>
                                       <?php endif; ?>
                                        </ul>
                                        <p class="margin0"><strong><?php echo __('About me', 'realto'); ?></strong></p>
                                        <p class="margin0"><?php echo $curauth->description; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- .span8 .box-container -->
                        
                        <?php
						//adhere to paging rules
						if ( get_query_var('paged') ) {
							$paged = get_query_var('paged');
						} elseif ( get_query_var('page') ) { // applies when this page template is used as a static homepage in WP3+
							$paged = get_query_var('page');
						} else {
							$paged = 1;
						}
						
						$posts_per_page = get_post_meta(get_the_ID(),'number_of_items',true);
						if (!$posts_per_page) {
							$posts_per_page = get_option('posts_per_page');
						}
						global $query_string;
							$args = array(
								'numberposts'     => '',
								'posts_per_page' => $posts_per_page,
								'offset'          => 0,
								'cat'        =>  '',
								'orderby'         => 'date',
								'order'           => 'DESC',
								'include'         => '',
								'exclude'         => '',
								'meta_key'        => '',
								'meta_value'      => '',
								'post_type'       => 'property',
								'post_mime_type'  => '',
								'post_parent'     => '',
								'paged'			  => $paged,
								'post_status'     => 'publish',
								'author'		  => $curauth->ID,
							);
						$properties = new WP_Query( $args );
						?>
                        
                         <?php
							if ( $properties->have_posts() ) :
								// Start the Loop.
								
								while ( $properties->have_posts() ) : $properties->the_post(); ?>
                        
                                    <div class="span8 box-container">
                                        <div class="holder row">
                                            <?php nt_property_pic_list(); ?>
                                            <span class="prop-tag"><?php if(get_post_meta($post->ID, "nt_status", true)=='for-sale') { echo __('For Sale', 'realto'); }else{ echo __('For Rent', 'realto'); }?></span>
                                            <div class="span4 prop-info">
                                                <h3 class="prop-title"><?php the_title(); ?></h3>
                                                <ul class="more-info clearfix">
                                                    <li class="info-label clearfix"><span class="pull-left"><?php _e("Beds:","realto"); ?></span>
                                                        <span class="qty pull-right"><?php echo get_post_meta($post->ID, "nt_bedrooms", true);?></span>
                                                    </li>
                                                    <li class="info-label clearfix"><span class="pull-left"><?php _e("Baths:","realto"); ?></span>
                                                        <span class="qty pull-right"><?php echo get_post_meta($post->ID, "nt_bathrooms", true);?></span>
                                                   </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- .span8 .box-container -->
                       		<?php endwhile; ?>
                            
                            <div class="span8"> <?php nt_pagination(); ?></div>
                       
                       <?php endif; ?>
                       
                    </div>
                    <!-- .row -->
                </div>
                <!-- .span8 -->
                <div class="span4">
                    
                    <?php get_sidebar("page"); ?>
                    
                </div>
                <!-- .span4 -->
            </div>
            <!-- .row -->
        </div>

<?php get_footer(); ?>