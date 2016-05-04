<?php
/**
 * The template for displaying Tag pages
 *
 * Used to display archive-type pages for posts in a tag.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package RealTo
 * @since RealTo 1.0
 */

get_header(); ?>

<div class="container page-content blog">
    <div class="row">
        <div class="span8">
            <div class="row">
	            <div class="span8 box-container">
                <div class="span12">
    	        	<h2 class="archive-title"><?php printf( __( 'Tag Archives: %s', 'realto' ), single_tag_title( '', false ) ); ?></h2>
        		</div>
                </div>    
               <div class="span8">
               <?php
				if ( have_posts() ) :?>
                
                
                <?php
					// Start the Loop.
					while ( have_posts() ) : the_post();?>
	
						<div id="post-<?php the_ID(); ?>" <?php post_class("box-container row-fluid blog-4"); ?>>
    
						
                        <div class="padding30">
                            <div class="clearfix meta">
                                <p class="serif italic pull-left">
                                    <?php _e("Date:","realto"); ?><a><?php esc_attr( the_time( get_option( 'date_format' ) ));?></a>
                               </p>
                                <p class="serif italic pull-right">
                                    <i class="icon-comment"></i>
                                    <a href="<?php the_permalink();?>/#comments"><?php esc_attr(comments_number( '0 Comments', '1 Comment', '% Comments' )); ?></a>
                               </p>
                            </div>
                            
                            <?php
                            the_title( '<h2 class="post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                            ?>
                            <div class="author">
                                <p class="serif italic"><?php _e("posted by:","realto"); ?>
                                    <a><?php esc_attr( the_author_meta( 'display_name' )); ?></a>
                                    <?php _e("in","realto"); ?> 
                                    <?php esc_attr(the_category(', ')); ?></p>
                            </div>
                            <?php the_excerpt(); ?>
                            
                        </div>
                    </div>
				<?php
					endwhile;
					realto_paging_nav();
				else :
					// If no content, include the "No posts found" template.
					get_template_part( 'content', 'none' );
	
				endif;
			?>
              </div> 
            </div>
            <!-- .row -->
        </div>
        <!-- .span8 -->
        <div class="span4">
        	<?php get_sidebar( 'blog' ); // Output the blog sidebars ?>
        </div>
        <!-- .span4 -->
    </div>
    <!-- .row -->
</div>
<!-- .container -->

<?php get_footer(); ?>
