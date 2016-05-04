<?php
/**
 * Template Name: Homepage - IDX w/Revolution Slider 
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

<div class="container page-content">
        <div class="row">
            <div class="span8">
                <div class="box-container">
                    <div class="padding30">
                    
					 <?php echo do_shortcode(get_post_meta(get_the_ID(), 'nt_homepageidx',true)); ?>
                        
                    </div>
                </div>
            </div>
            <!-- .span8 -->
            <div class="span4 widget">
                
                <?php get_sidebar("idxhome");?>
                
            </div>
            <!-- .span4 -->
        </div>
        <!-- .row -->
</div>
    
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