<?php
/**
 * Template Name: Property Grid Layout 1
 *
 * @package RealTo
 * @since RealTo 1.0
 */
global $nt_option;
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

if(isset($nt_option["property_posts_limit"])){
	$posts_per_page = $nt_option['property_posts_limit'];
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
		'post_type'       => 'property',
		'post_mime_type'  => '',
		'post_parent'     => '',
		'paged'				=> $paged,
		'post_status'     => 'publish'
	);
query_posts( $args );
?>

<div class="container page-content">
    <div class="row">
        <div class="span8">
            <div class="row">
                
                <?php
				if ( have_posts() ) :
					// Start the Loop.
					
					while ( have_posts() ) : the_post();?>
						
                    <div class="span4 box-container">
                        <div class="holder">
                            
                            <?php nt_property_pic();?>
                            
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
                    </div>
               <?php endwhile; ?>
					  <div class="span8"> <?php nt_pagination(); ?></div>
                      <?php wp_reset_query(); ?>
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