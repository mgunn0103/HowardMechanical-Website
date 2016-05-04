<?php
/**
 * The template for taxonomy Feature
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
                    	<div class="span12"><h2 class="archive-title"><?php printf( __( 'Feature: %s', 'realto' ), single_tag_title( '', false ) ); ?></h2></div>
                    </div>
                    <?php
                    // Start the Loop.
					while ( have_posts() ) : the_post();?>
						
                    <div class="span8 box-container">
                        <div class="holder row">
                            
							<?php nt_property_pic_list();?>
                            
                            <span class="prop-tag">
								<?php realto_property_prop_tags(); ?>
                            </span>
                            <div class="span4 prop-info">
                                <h3 class="prop-title"><?php the_title();?></h3>
                                <ul class="more-info clearfix">
                                    <?php reato_property_features(); ?>
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
