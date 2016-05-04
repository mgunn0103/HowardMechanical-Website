<?php
/**
 * The template for displaying Search Results pages
 *
 * @package RealTo
 * @since RealTo 1.0
 */

get_header(); ?>


<div class="container page-content blog">
    <div class="row">
        <div class="span8">
            <div class="row">
               
               <?php if ( have_posts() ) : ?>
					
                    <div class="span8 box-container">
                    <div class="span12">
                        <h2 class="archive-title"><?php printf( __( 'Search Results for: %s', 'realto' ), get_search_query() ); ?></h2>
                    </div>
                    </div>
                    
        
                        <?php
                            // Start the Loop.
                            while ( have_posts() ) : the_post();
        
                                /*
                                 * Include the post format-specific template for the content. If you want to
                                 * use this in a child theme, then include a file called called content-___.php
                                 * (where ___ is the post format) and that will be used instead.
                                 */
                                get_template_part( 'content', get_post_format() );
        
                            endwhile;
                            // Previous/next post navigation.
                            realto_paging_nav();
        
                        else :
                            // If no content, include the "No posts found" template.
                            get_template_part( 'content', 'none' );
        
                        endif;
                    ?>
              
            </div>
            <!-- .row -->
        </div>
        <!-- .span8 -->
        <div class="span4">
        	<?php get_sidebar( 'page' ); // Output the blog sidebars ?>
        </div>
        <!-- .span4 -->
    </div>
    <!-- .row -->
</div>
<!-- .container -->
<?php get_footer(); ?>