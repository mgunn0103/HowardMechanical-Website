<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="">
 *
 * @package RealTo
 * @since RealTo 1.0
 */
global $nt_option; // Fetch options stored in $nt_option;
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <link rel="stylesheet" href="http://www.lab211.com/howardmechanical/test/wp-content/themes/realto/realto/flexSlider/flexslider.css" type="text/css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
	<script src="http://www.lab211.com/howardmechanical/test/wp-content/themes/realto/realto/flexSlider/jquery.flexslider.js"></script>

	<!-- Place in the <head>, after the three links -->
	<script type="text/javascript" charset="utf-8">
  		$(window).load(function() {
    		$('.flexslider').flexslider({
				animation:"slide"
			});
  		});
	</script>
    
    <?php 
	// Get the favicon
	if ($nt_option['site_favicon'] != '' ) { 
		$site_favicon = $nt_option['site_favicon'];
	} else { 
		$site_favicon = get_template_directory_uri() . '/ico/favicon.png';
	}
	
	// Get retina favicon 144 x 144
	if ( $nt_option['site_retina_favicon'] != '' ) { 
		$retina_favicon144 = $nt_option['site_retina_favicon'];
	} else { 
		$retina_favicon144 = get_template_directory_uri() . '/ico/apple-touch-icon-144-precomposed.png';
	}
	?>
    <!-- Favicon and touch icons  -->
    <link href="<?php echo $retina_favicon144;?>" rel="apple-touch-icon-precomposed" sizes="144x144">
    <link href="<?php echo $site_favicon; ?>" rel="shortcut icon">

	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
    <script src="http://maps.google.com/maps/api/js?sensor=true" type="text/javascript"></script>
    <script type="text/javascript" src="http://www.lab211.com/howardmechanical/test/wp-content/themes/realto/realto/cform.js"></script>

	<?php wp_head(); ?>
    <!--[if lt IE 9]>
	<script src="http://www.lab211.com/howardmechanical/test/wp-content/themes/realto/realto/dest/respond.min.js"></script>
	<![endif]-->
        <!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
    

</head>

<body id="<?php echo $nt_option["website_color"]; ?>" <?php body_class(); ?>
<!-- begin header -->
<header>
    <div class="navbar navbar-inverse navbar-static-top">
        <div class="navbar-inner">
            <div class="container">
                <button class="btn btn-navbar" data-target=".nav-collapse" data-toggle="collapse" type="button">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!--<div class="nav-collapse collapse">-->
                	<?php
					// Define Main Menu
					if ( has_nav_menu( 'primary' ) ) :?>
					
					<?php
						wp_nav_menu( array (
							'theme_location' => 'primary',
							'container' => 'div',
							'container_class' => 'nav-collapse collapse',
							'menu_class' => 'nav',
							'depth' => 2,
							'fallback_cb' => false,
							'walker' => new realto_nav_menu()
						 ));?>
					
					<?php     
					 else:
						echo '<div class="message warning"><i class="icon-warning-sign"></i>' . __( 'Define your site primary menu', 'realto' ) . '</div>';
					 endif;
					?>
                    
            </div>
        </div>
    </div>
    <div id="logo-container">
        <div class="container">
            <div class="row">
                <div class="span8">
                    <a class="brand" href="<?php echo home_url( '/' );?>"><img src="<?php echo $nt_option["img_logo"];?>" alt="" /></a>
                    <span class="tag-line hidden-phone"><?php if($nt_option["site_tagline"]==1){?><?php bloginfo( 'description' ); ?> <?php }?></span>
                </div>
                <div class="span4">
                    <?php if(!empty($nt_option["call_us"])): ?>
                    <div class="phone-number pull-right">
                    	<i class="icon-phone"></i> 
							<?php _e("Call Us:","realto");?> 
                            <strong><?php if(isset($nt_option["call_us"])){ echo $nt_option["call_us"];} ?></strong>
                       </div><!--/phone-number-->
                     <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- #logo-container -->
</header>  
<!-- end header -->