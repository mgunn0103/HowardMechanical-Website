<?php
/**
 * Template Name: Homepage with Video
 *
 * @package RealTo
 * @since RealTo 1.2
 */
global $nt_option; 
get_header(); ?>

<div id="home-search-container">
    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="widget pull-right">
                    <div class="row">
                        <div class="span12">
                            <div class="row">
                                <div class="span8">
                                    <div class="flex-video widescreen homepage-video">
                                        <?php  
										if (get_post_meta( get_the_ID(), 'nt_home_video_type', true ) == 'vimeo') {  
										  echo '<iframe src="http://player.vimeo.com/video/'.get_post_meta( get_the_ID(), 'nt_home_video_embed', true ).'?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';  
										}  
										else if (get_post_meta( get_the_ID(), 'nt_home_video_type', true ) == 'youtube') {  
										  echo '<iframe src="http://www.youtube.com/embed/'.get_post_meta( get_the_ID(), 'nt_home_video_embed', true ).'?rel=0&showinfo=0&modestbranding=1&hd=1&autohide=1&color=white" frameborder="0" allowfullscreen></iframe>';  
										}  
										else {  
											echo get_post_meta( get_the_ID(), 'nt_home_video_embed', true ); 
										}  
										?> 
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="search-form">
                                        <?php realto_property_search_small(); ?>
                                    </div>
                                    
                                    <!-- .search-form -->   
                                </div>
                                <!-- .span4 -->
                            </div>
                        </div>        
                    </div>
                    <!-- .row -->
                </div>
                <!-- .search-holder -->
            </div>
            <!-- .span12 -->
        </div>
        <!-- .row -->
    </div>
    <!-- .container -->
</div>
<?php
global $query_string;
	$args = array(
		'numberposts'     => '',
		'posts_per_page'  => '',
		'offset'          => 0,
		'cat'       	  =>  '',
		'orderby'         => 'date',
		'order'           => 'DESC',
		'include'         => '',
		'exclude'         => '',
		'meta_key'        => 'nt_homepage',
		'meta_value'      => '1',
		'post_type'       => 'property',
		'post_mime_type'  => '',
		'post_parent'     => '',
		'paged'			  => '',
		'post_status'     => 'publish'
	);
query_posts( $args );
?>

<div id="latest-properties">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <h2 class="secion-title"><?php if(isset($nt_option["home_carsousel_title"])){ echo $nt_option["home_carsousel_title"];} ?></h2>
                </div>
            </div>
            
            <!-- Begin Carousel -->
            <div class="row">
                <div id="realto-carousel" class="carousel slide span12">
                    <div class="carousel-navigation pull-right">
                        <a class="serif italic pull-left view-all-carousel" href="<?php if(isset($nt_option["home_carsousel_view_link"])){ echo $nt_option["home_carsousel_view_link"];}?>"><?php if(isset($nt_option["home_carsousel_view_text"])){ echo $nt_option["home_carsousel_view_text"];}?></a>
                        <a class="left carousel-control pull-left" href="#realto-carousel" data-slide="prev"><i class="icon-angle-left"></i></a>
                        <a class="right carousel-control pull-right" href="#realto-carousel" data-slide="next"><i class="icon-angle-right"></i></a>
                    </div>
                    <div class="carousel-inner">
                        
					<?php
                    $i=0;
					$j=0;
                    if ( have_posts() ) :
                        // Start the Loop.
                        while ( have_posts() ) : the_post(); $i++;?>
                         
                         <?php if($j==0){ $class = "active";}else{$class="";}?>
                          
                          <?php if($i==1): ?>      
                          
                          <div class="item <?php echo $class;?>">
                            <ul class="thumbnails">
                          
						  <?php endif; ?>
                                
                                <li class="span4 box-container">
                                    <div class="holder">
                                        
										<?php nt_property_pic(); ?>
                                        
                                        <span class="prop-tag">
											<?php realto_property_prop_tags(); ?>
                                        </span>
                                        <div class="prop-info">
                                            <h3 class="prop-title"><?php the_title();?></h3>
                                            <ul class="more-info clearfix">
												<?php reato_property_features(); ?>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                       <?php if($i==3): $i=0;?>           
                            </ul>
                        </div><!-- .item -->
                       <?php endif; ?>         
					<?php $j++;
                        endwhile;
						wp_reset_query();
                    endif;
                    ?>
                           
                             
                    </div><!-- .carousel-inner -->
                </div>
            </div><!--End Carousel-->
            
        </div><!-- .container  -->
    </div><!-- #latest-properties  -->
    
    <!-- Page Content -->
    <div class="container">
        <div class="row">
            
            <?php while(have_posts()):the_post(); ?>
    
				<?php the_content(); ?>
            
            <?php endwhile; ?>
            <?php wp_reset_query(); ?>
          
        </div>
   </div>

<?php get_footer();?>