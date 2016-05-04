<?php 
/**
 * 404 error page
 *
 * @package RealTo
 * @since 	RealTo 1.0
**/ 
?>

<?php get_header(); ?>
	
   <div class="container page-content">
    <div class="row">
        <div class="span12">
            <div class="box-container">
                <div class="padding30 aligncenter">
                    <?php if( $nt_option['error_image'] !='' ){ ?>
                        <img src="<?php echo $nt_option['error_image']; ?>" alt="<?php echo $nt_option['error_title']; ?>" width="400" height="400" />
                    <?php } ?>
                    <h1><?php echo $nt_option['error_title']; ?></h1>
                    
                </div>
            </div>
        </div>
        <!-- .span12 -->
    </div>
    <!-- .row -->
</div> 
	
<?php get_footer(); ?>