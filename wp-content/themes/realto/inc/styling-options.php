<?php
/**
 * Theme Stylesheet Options
 * Refer to Theme Options
 *
 * @package RealTo
 * @since 	RealTo 1.0
**/
function custom_styling(){
global $nt_option;
?>
<style type="text/css">

<?php if($nt_option["search_bg"]!=""): ?>
#home-search-container {
    background: url(<?php echo $nt_option["search_bg"];?>) no-repeat scroll center center rgba(0, 0, 0, 0);
	background-size:100% auto;
}
<?php endif; ?>

<?php if ( $nt_option['custom_css'] != '' ):?> /* Custom CSS */

<?php echo $nt_option['custom_css'];?> 

<?php endif; ?>

</style>
<?php } ?>
<?php add_action( 'wp_head', 'custom_styling' );?>