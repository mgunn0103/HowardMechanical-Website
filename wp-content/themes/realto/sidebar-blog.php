<?php
/**
 * The Sidebar containing the Blog widget areas.
 *
 * @package RealTo
 * @since 	RealTo 1.0
**/
?>

<div class="con-sidebar">
<?php if ( is_active_sidebar( 'Blog Sidebar' ) ) : ?>
		
     <?php dynamic_sidebar("Blog Sidebar"); ?>
        
<?php endif; ?>
</div>