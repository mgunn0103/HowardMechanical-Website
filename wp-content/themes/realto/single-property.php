<?php 
/**
 * The Template for displaying all single property posts
 *
 * @package RealTo
 * @since 	RealTo 1.0
**/
global $nt_option;
?>

<?php get_header(); ?>

<div class="container page-content">
    <div class="row">
        <div class="span8">
            <div class="box-container">
               <?php
			   while(have_posts()):the_post();
               $slider_meta = get_post_meta( get_the_ID( ), 'nt_propertyimages', false );
			   ?>
               <?php if(!empty($slider_meta)): ?>
                <div class="cycle-slideshow"
                    data-cycle-fx=fade
                    data-cycle-timeout=0
                    data-cycle-swipe=true
                    data-cycle-pager="#adv-custom-pager"
                    data-cycle-pager-template='<a href="#" ><img src="{{src}}"></a>'
                    data-cycle-prev="#prev"
                    data-cycle-next="#next"
                >
                	<?php 
					if ( !is_array( $slider_meta ) )
						$slider_meta = ( array ) $slider_meta;
						
					foreach($slider_meta as $img):
						
						$image_src = wp_get_attachment_image_src( $img, 'full' ); ?>
							<img alt="image" src="<?php echo $image_src[0];?>" class="media-object">
					
					<?php endforeach; ?>
                    
                 </div><!-- .cycle-slideshow -->
                 <div id="adv-custom-pager"></div>
                 <?php endif; ?>
                 
                 <?php
				 if(get_post_meta( get_the_ID(), 'nt_video_position', true ) == "on-top"):
					 if (get_post_meta( get_the_ID(), 'nt_property_video_type', true ) != ""): ?>
					 <div class="property-top-video">
						<div class="flex-video widescreen">
							<?php  
							if (get_post_meta( get_the_ID(), 'nt_property_video_type', true ) == 'vimeo') {  
							  echo '<iframe src="http://player.vimeo.com/video/'.get_post_meta( get_the_ID(), 'nt_property_video_embed', true ).'?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="770" height="433" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';  
							}  
							else if (get_post_meta( get_the_ID(), 'nt_property_video_type', true ) == 'youtube') {  
							  echo '<iframe width="770" height="433" src="http://www.youtube.com/embed/'.get_post_meta( get_the_ID(), 'nt_property_video_embed', true ).'?rel=0&showinfo=0&modestbranding=1&hd=1&autohide=1&color=white" frameborder="0" allowfullscreen></iframe>';  
							}  
							else {  
								echo get_post_meta( get_the_ID(), 'nt_property_video_embed', true ); 
							}  
							?> 
						</div>
					</div>
                    <?php endif; ?>
                <?php endif; ?>
            
                <div class="clearfix">
                    <div class="clearfix padding30">
                        <h2 class="prop-title pull-left margin0"><?php the_title();?></h2>
                        <span class="prop-price pull-right serif italic"><?php listing_price();?></span>
                    </div>
                    <div class="clearfix padding030 row-fluid">
                        <ul class="more-info mylist">
                            
                            <?php if(get_post_meta($post->ID, "nt_prop_id", true)!=""):?>
                                <li class="info-label span6 clearfix">
                                    <span class="pull-left"><?php _e("ID", "realto"); ?></span>
                                    <span class="qty pull-right"><?php echo $nt_option["listing_id_prefix"]."&shy;".get_post_meta($post->ID, "nt_prop_id", true); ?></span>
                                </li>
                            <?php endif; ?>
                            
                            <li class="info-label span6 clearfix">
                            	<span class="pull-left"><?php _e("Listing type:","realto"); ?></span>
                                <span class="qty pull-right">
									<?php 
										  if(get_post_meta($post->ID, "nt_status", true)=='for-sale'){ 
                                                
                                               _e('For Sale', 'realto'); 
                                          }
                                          elseif(get_post_meta($post->ID, "nt_status", true)=='sold'){
                                                
                                              _e('Sold', 'realto'); 
										  }
										  elseif(get_post_meta($post->ID, "nt_status", true)=='upcoming'){
											  
												  _e('Upcoming', 'realto');
										  }
										 elseif(get_post_meta($post->ID, "nt_status", true)=='inquire'){
												  _e('Inquire', 'realto'); 
										       
                                          }else{ _e('For Rent', 'realto'); }
									?>
                               </span>
                            </li>
                            
							<?php if(get_post_meta($post->ID, "nt_bedrooms", true)!=""):?>
                                <li class="info-label span6 clearfix">
                                    <span class="pull-left"><?php echo $nt_option["f_beds"]["of_feature_title"]; ?></span>
                                    <span class="qty pull-right"><?php echo get_post_meta($post->ID, "nt_bedrooms", true)." ".$nt_option["f_beds"]["of_feature_area"];?></span>
                                </li>
                            <?php endif; ?>
                            
                            <?php if(get_post_meta($post->ID, "nt_bathrooms", true)!=""):?>
                                <li class="info-label span6 clearfix">
                                    <span class="pull-left"><?php echo $nt_option["f_baths"]["of_feature_title"]; ?></span>
                                    <span class="qty pull-right"><?php echo get_post_meta($post->ID, "nt_bathrooms", true)." ".$nt_option["f_baths"]["of_feature_area"];?></span>
                                </li>
                            <?php endif; ?>
                            
                            <?php if(get_post_meta($post->ID, "nt_plot_size", true)!=""):?>
                                <li class="info-label span6 clearfix">
                                    <span class="pull-left"><?php echo $nt_option["f_plotsize"]["of_feature_title"]; ?></span>
                                    <span class="qty pull-right"><?php echo get_post_meta($post->ID, "nt_plot_size", true)." ".$nt_option["f_plotsize"]["of_feature_area"];?></span>
                                </li>
                            <?php endif; ?>
                            
                            <?php if(get_post_meta($post->ID, "nt_living_area", true)!=""):?>
                                <li class="info-label span6 clearfix">
                                    <span class="pull-left"><?php echo $nt_option["f_livingarea"]["of_feature_title"]; ?></span>
                                    <span class="qty pull-right"><?php echo get_post_meta($post->ID, "nt_living_area", true)." ".$nt_option["f_livingarea"]["of_feature_area"];?></span>
                                </li>
                            <?php endif; ?>
                            
                            <?php if(get_post_meta($post->ID, "nt_terrace", true)!=""):?>
                                <li class="info-label span6 clearfix">
                                    <span class="pull-left"><?php echo $nt_option["f_terrace"]["of_feature_title"]; ?></span>
                                    <span class="qty pull-right"><?php echo get_post_meta($post->ID, "nt_terrace", true)." ".$nt_option["f_terrace"]["of_feature_area"];?></span>
                                </li>
                            <?php endif; ?>
                            
                            <li class="info-label span6 clearfix">
                            	<span class="pull-left"><?php _e("Property type:","realto"); ?></span>
                                <span class="qty pull-right"><?php propertyltype();?></span>
                            </li>
                            
                            <?php if(get_post_meta($post->ID, "nt_parking", true)!=""):?>
                                <li class="info-label span6 clearfix">
                                    <span class="pull-left"><?php echo $nt_option["f_parking"]; ?></span>
                                    <span class="qty pull-right"><?php echo get_post_meta($post->ID, "nt_parking", true);?></span>
                                </li>
                            <?php endif; ?>
                            
                            <?php if(get_post_meta($post->ID, "nt_heating", true)!=""):?>
                                <li class="info-label span6 clearfix">
                                    <span class="pull-left"><?php echo $nt_option["f_heating"]; ?></span>
                                    <span class="qty pull-right"><?php echo get_post_meta($post->ID, "nt_heating", true);?></span>
                                </li>
                            <?php endif; ?>
                            
                            <?php if(get_post_meta($post->ID, "nt_neighborhood", true)!=""):?>
                                <li class="info-label span6 clearfix">
                                    <span class="pull-left"><?php echo $nt_option["f_neighborhood"]; ?></span>
                                    <span class="qty pull-right"><?php echo get_post_meta($post->ID, "nt_neighborhood", true);?></span>
                                </li>
                            <?php endif; ?>
                            
                            <?php if(get_post_meta($post->ID, "nt_builtin", true)!=""):?>
                                <li class="info-label span6 clearfix">
                                    <span class="pull-left"><?php echo $nt_option["f_builtin"]; ?></span>
                                    <span class="qty pull-right"><?php echo get_post_meta($post->ID, "nt_builtin", true);?></span>
                                </li>
                            <?php endif; ?>
                            
                            <?php /*?><li class="info-label span6 clearfix">
                            	<span class="pull-left"><?php _e("Square feet:","realto"); ?></span>
                                <span class="qty pull-right"><?php echo get_post_meta($post->ID, "nt_squarefeet", true);?> <?php echo __('sqft','realto')?></span>
                            </li><?php */?>
                        <!--</ul>
                        <ul class="more-info pull-right span6">-->
                            
                            
                        </ul>
                    </div>
                    <div class="clearfix padding030">
                        <h3><?php echo __('Property Description','realto');?></h3>
                        <?php the_content(); ?>
                    </div>
                    
                    <?php
					 if(get_post_meta( get_the_ID(), 'nt_video_position', true ) == "at-bottom"):
						 if (get_post_meta( get_the_ID(), 'nt_property_video_type', true ) != ""): ?>
						 <div class="property-bottom-video padding30">
							<div class="flex-video widescreen">
								<?php  
								if (get_post_meta( get_the_ID(), 'nt_property_video_type', true ) == 'vimeo') {  
								  echo '<iframe src="http://player.vimeo.com/video/'.get_post_meta( get_the_ID(), 'nt_property_video_embed', true ).'?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="770" height="433" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';  
								}  
								else if (get_post_meta( get_the_ID(), 'nt_property_video_type', true ) == 'youtube') {  
								  echo '<iframe width="770" height="433" src="http://www.youtube.com/embed/'.get_post_meta( get_the_ID(), 'nt_property_video_embed', true ).'?rel=0&showinfo=0&modestbranding=1&hd=1&autohide=1&color=white" frameborder="0" allowfullscreen></iframe>';  
								}  
								else {  
									echo get_post_meta( get_the_ID(), 'nt_property_video_embed', true ); 
								}  
								?> 
							</div>
						</div>
						<?php endif; ?>
					<?php endif; ?>
                    
                    <div class="span8">
                        <div class="margin300 additional_features">    
                            <h3><?php _e("Additional Features","realto")?></h3>
                            <?php $add_features = wp_get_post_terms($post->ID, 'features', array("fields" => "all"));?>
							<ul>
								<?php foreach($add_features as $adf): 
                              			$term_link = get_term_link( $adf, 'features' );
                                        if( is_wp_error( $term_link ) )
                                            continue;
                                        ?>
                                        <li><a href="<?php echo $term_link;?>"><?php echo $adf->name; ?></a></li>
                                          
                                <?php endforeach; ?>
                            </ul>
                        	<?php
                            $document_meta = get_post_meta( get_the_ID( ), 'nt_document', false );
							if(!empty($document_meta)):
							?>
                            <h3><?php _e("Documents","realto")?></h3>
                            <?php
                                foreach($document_meta as $doc):
                                    $doc_src = wp_get_attachment_url( $doc );?>
                                    <a href="<?php echo $doc_src;?>" class="btn btn-realto"><?php _e("Download","realto")?></a>			
                            <?php		
                                endforeach;
							endif;
                            ?>
                        
                        </div>
                       
                    </div><!-- span8 -->
                   
                </div>
                <?php
                endwhile;
				?>
               
            </div>
            
            <?php if($nt_option["map_position"]=="map_in_bottom"): ?>
            
				<?php if(get_post_meta($post->ID, 'nt_gmap', true)!=""):?>
                    <div class="widget map box-container padding30">
                        <h3 class="widget-title"><?php _e("Map &amp; Directions","realto"); ?></h3>
                        <div id="map-listing-single"></div>
                        <script type="text/javascript"> 
                            jQuery(document).ready(function() {
                                jQuery("#map-listing-single").goMap({ 
                                    markers: [{  
                                        address: "<?php echo get_post_meta($post->ID, 'nt_gmap', true); ?>", 
                                        title: '<?php echo get_post_meta($post->ID, 'nt_gmap', true); ?>' ,
                                        icon: ''
                                    }],
                                    disableDoubleClickZoom: true,
                                    zoom: 15,
                                    maptype: 'ROADMAP'
                                }); 
            
                            });
                        </script>
                        
                        <iframe src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=<?php echo urlencode(get_post_meta($post->ID, 'nt_gmap', true)); ?>&amp;output=embed"></iframe>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            
        </div>
        <!-- .span8 -->
        
        <div class="span4">
            <?php if($nt_option["map_position"]=="map_in_sidebar"): ?>
            
				<?php if(get_post_meta($post->ID, 'nt_gmap', true)!=""):?>
                    <div class="widget map box-container padding30">
                        <h3 class="widget-title"><?php _e("Map &amp; Directions","realto"); ?></h3>
                        <div id="map-listing-single"></div>
                        <script type="text/javascript"> 
                            jQuery(document).ready(function() {
                                jQuery("#map-listing-single").goMap({ 
                                    markers: [{  
                                        address: "<?php echo get_post_meta($post->ID, 'nt_gmap', true); ?>", 
                                        title: '<?php echo get_post_meta($post->ID, 'nt_gmap', true); ?>' ,
                                        icon: ''
                                    }],
                                    disableDoubleClickZoom: true,
                                    zoom: 15,
                                    maptype: 'ROADMAP'
                                }); 
            
                            });
                        </script>
                        
                        <iframe src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=<?php echo urlencode(get_post_meta($post->ID, 'nt_gmap', true)); ?>&amp;output=embed"></iframe>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            <?php $agent_info = get_userdata(nt_post_author()); ?>
            <?php $agent_url = get_author_posts_url( $agent_info->ID ); ?>
            
            <?php
            if(isset($_POST['submitted'])) {
                
                    if(get_post_meta($post->ID, 'nt_property_contact_email', true)!=""):
						$send_to = get_post_meta($post->ID, 'nt_property_contact_email', true);
					else:
						$send_to = $agent_info->user_email;
					endif; 
					
					$to = $send_to;
                    $subject = get_the_title();
                    $message = $_POST['sender_msg'];
                    $sender_name = $_POST['sender_name'];
                    $fromemail = $_POST['sender_email'];
                    $headers  = 'MIME-Version: 1.0' . "\r\n";
                    $headers = "From: $fromemail\n";
                    $headers .= "Reply-to: $fromemail\n";
                    $headers .= "Content-Type: text/html; charset=iso-8859-1\n";
                    
                    mail($to,$subject,$message,$headers);
                    $emailSent = true;
            }
            ?> 
            
            <div class="widget agent-box box-container clearfix padding30">
                <div class="clearfix">
                    <div class="pull-left">
                        <?php echo get_avatar(nt_post_author(), 70); ?>
                    </div>
                    <div class="pull-left">
                        <h3><?php _e("Contact Agent","realto")?></h3>
                        <ul>
                            <li><?php echo $agent_info->first_name." ".$agent_info->last_name; ?></li>
                            <li>
								<?php 
									if(get_post_meta($post->ID, 'nt_property_contact_phone', true)!=""): 
										echo get_post_meta($post->ID, 'nt_property_contact_phone', true);
									else:
										echo $agent_info->first_name." ".$agent_info->phone_number; 
									endif;
								?>
                            </li>
                            <li><a href="<?php echo $agent_url; ?>"><?php _e("View my listing","realto")?></a></li>
                        </ul>
                    </div>
                </div>
                <?php if(isset($emailSent) && $emailSent == true) { ?>
                    <div class="alert alert-success margin200">
                        <button type="button" data-dismiss="alert" class="close"><i class="icon-remove"></i></button>
                        <?php echo "Successfully sent";//echo $nt_option["email_success"];?>
                    </div>
                <?php } ?>
                <form method="post" action="<?php the_permalink(); ?>">
                <input type="hidden" name="submitted" id="submitted" value="true" />   
                    <input class="input-block-level" name="sender_name" required="required" type="text" placeholder="Your name">
                    <input class="input-block-level" required="required" name="sender_email" type="email" placeholder="Your email">
                    <textarea class="input-block-level" name="sender_msg" required="required" rows="5"><?php _e("Hello, I'm interested in","realto")?> [<?php the_title();?>]</textarea>
                    <button type="submit" class="btn btn-realto"><?php _e("Contact Agent","realto")?></button>
                </form>
            </div>
            <!-- .agent-box -->
            
        </div>
        <!-- .span4 -->
    </div>
    <!-- .row -->
</div>

<?php get_footer(); ?>