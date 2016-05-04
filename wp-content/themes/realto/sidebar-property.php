<?php
/**
 *
 * @package RealTo
 * @since 	RealTo 1.0
**/
?>
<div class="con-sidebar">
<?php if ( is_active_sidebar( 'Property Sidebar' ) ) : ?>
		
     <?php dynamic_sidebar("Property Sidebar"); ?>
        
<?php endif; ?>
</div>