<?php
/**
 * The template for displaying property search forms
 *
 * @package realto
 * @since 	realto
 */
global $nt_option;
?>

<div class="widget">
    
    <form method="get" id="searchform" class="form-search" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
		<input type="text" name="s" id="s" class="input-medium search-query" value="<?php _e( 'Search', 'realto' ); ?>" onfocus="if(this.value=='<?php _e( 'Search', 'realto' ); ?>')this.value='';" onblur="if(this.value=='')this.value='<?php _e( 'Search', 'realto' ); ?>';" />
    	<button type="submit" class="btn btn-realto">
    	<i class="icon-search"></i>
    </button>
</form>
</div>