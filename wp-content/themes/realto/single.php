<?php 
/**
 * The Template for displaying all single blog posts
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
				// Start the Loop.
				while ( have_posts() ) : the_post();

					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
					
					// Previous/next post navigation.
					realto_post_nav();
					
				
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				
				endwhile;
				
			?>
            <!-- .post -->
            
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

<?php get_footer(); ?>