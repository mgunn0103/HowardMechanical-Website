<?php
/**
 * The archive page
 *
 * @package RealTo
 * @since 	RealTo 1.0
**/
?>

<?php get_header(); ?>

<div class="container page-content blog">
    <div class="row">
        <div class="span8">
            <div class="row">
            	<?php
				if ( have_posts() ) :?>
                <div class="span8 box-container">
                <div class="span12">
                <h2 class="archive-title">
					<?php
						if ( is_day() ) :
							printf( __( 'Daily Archives: %s', 'realto' ), get_the_date() );

						elseif ( is_month() ) :
							printf( __( 'Monthly Archives: %s', 'realto' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'realto' ) ) );

						elseif ( is_year() ) :
							printf( __( 'Yearly Archives: %s', 'realto' ), get_the_date( _x( 'Y', 'yearly archives date format', 'realto' ) ) );

						else :
							_e( 'Archives', 'realto' );

						endif;
					?>
                </h2>
                </div>
                </div>
            
               <div class="span8">
               
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
