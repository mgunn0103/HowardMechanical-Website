//placeholder
jQuery(document).ready(function() { 
	jQuery('input, textarea').placeholder();
	
	/*************** Pages menu ****************/
	
	var pagfix = jQuery('.footer-widget li.page_item a, .footer-widget li.menu-item a, .footer-widget li.cat-item a').html();
    jQuery('.footer-widget li.page_item a, .footer-widget li.menu-item a, .footer-widget li.cat-item a').each(function(){
            var pagfix = jQuery(this).html();
            jQuery(this).html('').append('<i class="icon-caret-right"></i>'+pagfix);
    });
	
	
	var sidebar_widget_li = jQuery('.con-sidebar .widget li').html();
    jQuery('.con-sidebar .widget li').each(function(){
            var sidebar_widget_li = jQuery(this).html();
            jQuery(this).html('').append('<i class="icon-caret-right"></i>'+sidebar_widget_li);
    });
	//Remove empy <p></p>
	jQuery("p").filter( function() {
    	return jQuery.trim(jQuery(this).html()) == '';
	}).remove()
	
});
//Homepage Carousel
jQuery(document).ready(function(){
	jQuery('#realto-carousel').carousel({
		interval: 5000
	});
});