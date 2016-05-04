<?php
/**
 * Template Name: Blog Layout 3
 *
 * @package RealTo
 * @since RealTo 1.0
 */

get_header(); ?>

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
		'post_type'       => 'post',
		'post_mime_type'  => '',
		'post_parent'     => '',
		'paged'				=> $paged,
		'post_status'     => 'publish'
	);
query_posts( $args );
?>

<div class="container page-content blog">
    <div class="row">
        <div class="span8">
            <div class="row">
               <div class="span8">
               <?php
				if ( have_posts() ) :
					// Start the Loop.
					
					while ( have_posts() ) : the_post();?>
	
						<div id="post-<?php the_ID(); ?>" <?php post_class("box-container row-fluid blog-3"); ?>>
                            
                            <div class="span8 post-content">
                                <div class="clearfix meta">
                                    <p class="serif italic pull-left"><?php _e("Date:","realto"); ?><a><?php esc_attr( the_time( get_option( 'date_format' ) ));?></a></p>
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
                                    	<?php esc_attr(the_category(', ')); ?>
                                    </p>
                                </div>
                                <?php the_excerpt(); ?>
                            </div>
                            
                            <?php
                            if ( !post_password_required() ||  has_post_thumbnail() ) {?>
                                
                                <a class="overlay span4" href="<?php the_permalink();?>">
                                <span class="more"></span>
                                    <?php the_post_thumbnail( 'blog-layout' );?>
                                </a>
                                
                           <?php     
                            }
							?>
                            
                        </div>
				<?php
					endwhile;
					// Previous/next post navigation.
					   nt_pagination();
				else :
					// If no content, include the "No posts found" template.
					get_template_part( 'content', 'none' );
	
				endif;
				wp_reset_query();
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