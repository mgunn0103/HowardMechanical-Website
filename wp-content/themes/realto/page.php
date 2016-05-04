<?php 
/**
 * The template for displaying all pages
 *
 * @package RealTo
 * @since 	RealTo 1.0
**/ 
?>

<?php get_header(); ?>
	
<div class="container page-content">
    <div class="row">
        <div class="span12">
            <div class="box-container">
                <div class="padding30">
                    <?php while(have_posts()):the_post(); ?>
                        
                        	<h2 class="page-title"><?php the_title(); ?></h2>
                            
                            <?php the_content(); ?>
                     
					 <?php endwhile; ?>
                     <?php wp_link_pages(); ?>
                    
                </div>
            </div>
        </div>
        <!-- .span12 -->
    </div>
    <!-- .row -->
</div>
	
<?php get_footer(); ?>