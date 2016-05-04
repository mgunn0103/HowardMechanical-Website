jQuery(document).ready(function($){
	
	jQuery('#page_template').change(checkFormat);
	
	function checkFormat(){
		var format = jQuery('#page_template').attr('value');
		//only run on the posts page
		if(format == 'realto/homepage_revolution.php' || format == 'realto/homepage_idx_revolution.php'){
			
			jQuery('#revolutionslider').stop(true,true).fadeIn(500);
		}else{
			jQuery('#revolutionslider').hide();
		}
		
		if(format == 'realto/homepage_idx_revolution.php'){
			
			jQuery('#homepageidx').stop(true,true).fadeIn(500);
		}else{
			jQuery('#homepageidx').hide();
		}
		
		if(format == 'realto/homepage_video.php'){
			
			jQuery('#nt-homepagevideo').stop(true,true).fadeIn(500);
		}else{
			jQuery('#nt-homepagevideo').hide();
		}
		
		
	}
	jQuery(window).load(function(){
		checkFormat();
	})
	
});


