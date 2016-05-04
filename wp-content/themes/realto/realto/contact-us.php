<?php
/*
 * Template Name: Contact Us
 * @package RealTo
 * @since RealTo 1.0
*/
global $nt_option;
?>

<?php get_header(); ?>        

<script type="text/javascript">
function formValidator(){
	// Make quick references to our fields
	
	var firstname = document.getElementById('contactName');
	var email = document.getElementById('email');
	
	// Check each input in the order that it appears in the form!
	if(isAlphabet(firstname, "<?php echo $nt_option["contact_name_req"];?>")){
	
			if(emailValidator(email, "<?php echo $nt_option["contact_email_req"]; ?>")){
				return true;
			}
		
	}
	
	
	return false;
	
}
function isAlphabet(elem, helperMsg){
	var alphaExp = /^[a-zA-Z]+$/;
	if(elem.value.match(alphaExp)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}
function emailValidator(elem, helperMsg){
	var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
	if(elem.value.match(emailExp)){
		return true;
	}else{
		alert(helperMsg);
		elem.focus();
		return false;
	}
}
</script>

<?php

if(isset($_POST['submitted'])) {
	
	
		$to = $nt_option['contact_email'];
		$subject = $nt_option['contact_subject'];
		$message = $_POST['description'];
		$contactName = $_POST['contactName'];
		$fromemail = $_POST['email'];
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers = "From: $fromemail\n";
		$headers .= "Reply-to: $fromemail\n";
		$headers .= "Content-Type: text/html; charset=iso-8859-1\n";
		
		mail($to,$subject,$message,$headers);
		$emailSent = true;
}
?> 

<div class="container page-content">
    <div class="row">
        <div class="span8">
            <div class="box-container">
                <div class="padding30">
                    <?php while(have_posts()):the_post(); ?>
                        
                        	<h2 class="page-title"><?php the_title(); ?></h2>
                            
                    <?php endwhile; ?>
                    <ul class="unstyled">
                        
                        <?php if(!empty($nt_option["contact_email"])):?>
                        <li>
                            <i class="icon-envelope-alt"></i>
                            <?php _e("Email:","realto"); ?><?php echo $nt_option["contact_email"]; ?>
                        </li>
                        <?php endif; ?>
                        <?php if(!empty($nt_option["contact_phone"])):?>    
                        <li>
                        
                            <i class="icon-phone"></i>
                            <?php _e("Phone:","realto"); ?> <?php echo $nt_option["contact_phone"]; ?>
                        </li>
                         <?php endif; ?>
                         <?php if(!empty($nt_option["contact_linkedin"])):?>  
                        <li>
                            <i class="icon-linkedin"></i>
                            <?php echo $nt_option["contact_linkedin"]; ?>
                        </li>
                        <?php endif; ?>
                        <?php if(!empty($nt_option["contact_facebook"])):?>  
                        <li>
                            <i class="icon-facebook"></i>
                            <?php echo $nt_option["contact_facebook"]; ?>
                        </li>
                        <?php endif; ?>
                    </ul>
                    <div class="row-fluid">
                    
                    <?php if(isset($emailSent) && $emailSent == true) { ?>
                        <div class="alert alert-success">
                            <button type="button" data-dismiss="alert" class="close"><i class="icon-remove"></i></button>
                            <?php echo $nt_option["email_success"];?>
                        </div>
                    <?php } ?>
                        
                     
                    
                        
                         <form action="<?php the_permalink(); ?>" class="margin300" name="" onsubmit='return formValidator()' method="post">
				            <input type="hidden" name="submitted" id="submitted" value="true" />   
                            
                            <input class="span6" name="contactName" id="contactName" value="<?php if(isset($_POST['contactName'])) echo $_POST['contactName'];?>" placeholder="Please, insert your name" type="text">
                            
                            <input class="span6 pull-right" name="email" id="email" value="<?php if(isset($_POST['email']))  echo $_POST['email'];?>" placeholder="Please, insert your email" type="text">
                            
                            <textarea class="span12" name="description" placeholder="Write your message" rows="6"><?php if(isset($_POST['description'])) echo $_POST['description'];?></textarea>
                            <div class="clearfix">
                                
                                <input class="btn btn-realto span6" type="submit" name="submit" value="Submit" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- .span8 -->
        <div class="span4 widget">
            <div class="widget map box-container padding30">
                <h3 class="widget-title"><?php _e("Serving DC, MD, and VA", "realto"); ?></h3>
                <iframe src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=<?php echo urlencode($nt_option["contact_map"]); ?>&amp;ie=UTF8&amp;hq=&amp;hnear=<?php echo urlencode($nt_option["contact_map"]); ?>&amp;output=embed"></iframe>
                
                
                <dl class="margin0">
                    <?php echo $nt_option["contact_map"]; ?>
                </dl>
            </div>
        </div>
        <!-- .span4 -->
    </div>
    <!-- .row -->
</div>
<!-- .container -->
<?php get_footer(); ?>