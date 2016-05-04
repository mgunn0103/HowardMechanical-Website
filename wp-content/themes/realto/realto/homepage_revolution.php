<?php
/**
 * Template Name: Homepage - Revolution Slider 
 *
 * @package RealTo
 * @since RealTo 1.2
 */
global $nt_option; 
get_header(); ?>
<?php
if (is_plugin_active('revslider/revslider.php')):?>
<div id="home-revolution-container">
    
     <?php echo nt_get_revolution_slider(); ?>
            
</div>
<?php endif;?>
<!-- #home-revolution-container -->

<div class="container">
    <div class="search-wrapper">
    	<?php realto_property_search_big(); ?>
    </div><!-- .search-wrapper -->
</div><!-- .container -->

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