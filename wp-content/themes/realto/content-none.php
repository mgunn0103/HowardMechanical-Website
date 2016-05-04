<?php
/**
 * The template for displaying a "No posts found" message
 *
 * @package RealTo
 * @since RealTo 1.0
 */
?>

<div class="span8 box-container">
    <div class="span12">
        <h2 class="archive-title"><?php _e( 'Nothing Found', 'realto' ); ?></h2>
    </div>
</div>

<div class="page-content span8">
	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

	<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'realto' ), admin_url( 'post-new.php' ) ); ?></p>
	
	<?php elseif ( is_search() ) : ?>

	<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'realto' ); ?></p>
	<?php get_search_form(); ?>

	<?php else : ?>

	<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'realto' ); ?></p>
	<?php get_search_form(); ?>

	<?php endif; ?>
</div><!-- .page-content -->


