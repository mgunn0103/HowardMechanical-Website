<?php global $nt_option; ?>
<div class="span8 box-container">
    <div class="holder row">
        
        <?php nt_property_pic_list();?>
        
        <span class="prop-tag">
			<?php realto_property_prop_tags(); ?>
        </span>
        <div class="span4 prop-info">
            <h3 class="prop-title"><?php the_title();?></h3>
            <ul class="more-info clearfix">
                <?php reato_property_features(); ?>
            </ul>
        </div>
    </div>
</div>