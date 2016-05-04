<?php
/**
 * The template for displaying a "No property found" message
 *
 * @package RealTo
 * @since RealTo 1.0
 */
 global $nt_option;
?>

<header class="content-none">
	<div class="span8 box-container">
    	
    		<h3 class="archive-title"><?php echo $nt_option["property_no_result_title"]; ?></h3>
    </div>
</header>
<p class="aligncenter"><?php echo $nt_option["property_no_result_content"]; ?></p>
