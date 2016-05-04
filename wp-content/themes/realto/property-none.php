<?php
/**
 * The template for displaying a "No property found" message
 *
 * @package RealTo
 * @since RealTo 1.0
 */
?>

<header class="page-header content-none">
	<h1 class="page-title"><?php _e( 'Nothing Found', 'realto' ); ?></h1>
</header>

<div class="page-content">
	
    <p><?php printf( __( 'Ready to list your first property? <a href="%1$s">Get started here</a>.', 'realto' ), admin_url( 'post-new.php?post_type=property' ) ); ?></p>
	
</div><!-- .page-content -->
