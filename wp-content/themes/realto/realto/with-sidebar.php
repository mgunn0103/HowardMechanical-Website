<?php
/**
 * Template Name: Page With Sidebar
 *
 * @package RealTo
 * @since   RealTo 1.0
 */

get_header(); ?>

<div class="container page-content">
        <div class="row">
            <div class="span8">
                <div class="box-container">
                    <div class="padding30">
                    
					 <?php while(have_posts()):the_post(); ?>
                        
                        	<h2 class="page-title"><?php the_title(); ?></h2>
                            
                            <?php the_content(); ?>
                     
					 <?php endwhile; ?>
                        
                    </div>
                </div>
            </div>
            <!-- .span8 -->
            <div class="span4 widget">
                
                <?php get_sidebar("page");?>
                
            </div>
            <!-- .span4 -->
        </div>
        <!-- .row -->
</div>

<?php
get_footer();
?>