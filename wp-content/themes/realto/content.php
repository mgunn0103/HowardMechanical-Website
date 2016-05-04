<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package RealTo
 * @since RealTo 1.0
 */
?>
<div id="post-<?php the_ID(); ?>" <?php post_class("span8 box-container"); ?>>
    
    <?php realto_post_thumbnail();?>
    
    
    <div class="padding30">
        <div class="clearfix meta">
            <p class="serif italic pull-left">
                <?php _e("Date:","realto"); ?><a><?php esc_attr( the_time( get_option( 'date_format' ) ));?></a></p>
            <p class="serif italic pull-right">
                <i class="icon-comment"></i>
                <a href="<?php the_permalink();?>/#comments"><?php esc_attr(comments_number( '0 Comments', '1 Comment', '% Comments' )); ?></a></p>
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
        <?php if ( is_search() ) : ?>
        <?php the_excerpt(); ?>
        <?php else : ?>
        <?php
			the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'realto' ) );
			
			$args = array(
				'before' => '<div class="link-pages">' . __( 'Pages:', 'realto' ),
				'after' => '</div>',
				'link_before' => '<span>',
				'link_after' => '</span>'
			);
			wp_link_pages( $args );
		?>
        <?php endif; ?>
    </div>
</div>
<!-- .post -->