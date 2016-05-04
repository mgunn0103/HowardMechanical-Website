<?php
/**
 *
 * @package RealTo
 * @since 	RealTo 1.0
**/
?>
<div class="con-sidebar">
<?php if ( is_active_sidebar( 'Page Sidebar' ) ) : ?>
		
     <?php dynamic_sidebar("Page Sidebar"); ?>
        
<?php endif; ?>
</div>