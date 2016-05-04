<?php
/**
 * Template Name: Mortgage Calculator
 *
 * @package RealTo
 * @since   RealTo 1.0
 */
global $nt_option;

get_header(); ?>
<script language="JavaScript">
<!--
function checkForZero(field)
{
    if (field.value == 0 || field.value.length == 0) {
        alert ("This field can't be 0!");
        field.focus(); }
    else
        calculatePayment(field.form);
}

function cmdCalc_Click(form)
{
    if (form.price.value == 0 || form.price.value.length == 0) {
        alert ("The Price field can't be 0!");
        form.price.focus(); }
    else if (form.ir.value == 0 || form.ir.value.length == 0) {
        alert ("The Interest Rate field can't be 0!");
        form.ir.focus(); }
    else if (form.term.value == 0 || form.term.value.length == 0) {
        alert ("The Term field can't be 0!");
        form.term.focus(); }
    else
        calculatePayment(form);
}

function calculatePayment(form)
{
    princ = form.price.value - form.dp.value;
    intRate = (form.ir.value/100) / 12;
    months = form.term.value * 12;
    form.pmt.value = Math.floor((princ*intRate)/(1-Math.pow(1+intRate,(-1*months)))*100)/100;
    form.principle.value = princ;
    form.payments.value = months;
}
//-->
</script>
<script language="JavaScript">
<!--
function checkForZero(field)
{
    if (field.value == 0 || field.value.length == 0) {
        }
    else
        calculatePayment(field.form);
}

function cmdCalc_Click(form)
{
    if (form.price.value == 0 || form.price.value.length == 0) {
        alert ("The Price field can't be 0!");
        form.price.focus(); }
    else if (form.ir.value == 0 || form.ir.value.length == 0) {
        alert ("The Interest Rate field can't be 0!");
        form.ir.focus(); }
    else if (form.term.value == 0 || form.term.value.length == 0) {
        alert ("The Term field can't be 0!");
        form.term.focus(); }
    else
        calculatePayment(form);
}

function calculatePayment(form)
{
    princ = form.price.value - form.dp.value;
    intRate = (form.ir.value/100) / 12;
    months = form.term.value * 12;
    form.pmt.value = Math.floor((princ*intRate)/(1-Math.pow(1+intRate,(-1*months)))*100)/100;
    form.principle.value = princ;
    form.payments.value = months;
}
//-->
</script>
<div class="container page-content">
        <div class="row">
            <div class="span8">
                <div class="box-container">
                    <div class="padding30">
                    
					 <?php while(have_posts()):the_post(); ?>
                        
                        	<h2 class="page-title"><?php the_title(); ?></h2>
                            
                            <div class="row-fluid padding_bottom">
                                <form action="" class="margin300" method="post">
                                    
                                    <div class="span6">
                                        <div class="row-fluid">
                                            <div class="span12">
	                                            <div class="control-group">
	                                                <label class="span5"><?php _e("Purchase Price","realto"); ?></label>
	                                                <div class="input-prepend">
	                                                	<span class="add-on"><?php echo $nt_option["mortgage_calculator_currency"];?></span>
	                                                	<input class="span6" type="text" size="10" name="price" value="0" onBlur="checkForZero(this)" onChange="checkForZero(this)" />
	                                                </div>
	                                            </div>    
                                            </div>
                                        </div>
                                        <div class="row-fluid">
                                            <div class="span12">
	                                            <div class="control-group">
	                                                <label class="span5"><?php _e("Down Payment","realto"); ?></label>
	                                                <div class="input-prepend">
	                                                	<span class="add-on"><?php echo $nt_option["mortgage_calculator_currency"];?></span>
	                                                	<input class="span6" type="text" size="10" name="dp" value="0" onChange="calculatePayment(this.form)" />
	                                                </div>
	                                            </div>
                                            </div>
                                        </div>
                                        <div class="row-fluid">
                                            <div class="span12">
                                            	<div class="control-group">
	                                                <label class="span5"><?php _e("Annual Interest Rate:","realto"); ?></label>
	                                                <div class="input-append">
	                                                	<input class="span6" type="text" size="5" name="ir" value="0" onBlur="checkForZero(this)" onChange="checkForZero(this)">
	                                                	<span class="add-on">%</span>
	                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row-fluid">
                                            <div class="span12">
                                            	<div class="control-group">
	                                                <label class="span5"><?php _e("Loan Term (Years):","realto"); ?></label>
	                                            	<div class="input-append">
	                                            		<input class="span6" type="text" size="4" name="term" value="30" onBlur="checkForZero(this)" onChange="checkForZero(this)" />
	                                            		<span class="add-on">Y</span>
	                                            	</div>
                                            	</div>
                                            </div>
                                        </div>
                                       
                                    </div>
                                    
                                    <div class="span6">
                                        <div class="row-fluid">
                                            <div class="span12">
                                            	<div class="control-group">
	                                                <label class="span5"><?php _e("Principal:","realto"); ?></label>
	                                                <div class="input-prepend">
	                                                	<span class="add-on"><?php echo $nt_option["mortgage_calculator_currency"];?></span>
	                                                	<input class="span6" type="text" size="12" name="principle" />
	                                                </div>	
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row-fluid">
                                            <div class="span12">
                                            	<div class="control-group">
	                                                <label class="span5"><?php _e("Total Payments:","realto"); ?></label>
	                                                <div class="input-prepend">
	                                                	<span class="add-on">n.</span>
	                                                	<input class="span6" type="text" size="12" name="payments" />
	                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row-fluid">
                                            <div class="span12">
                                            	<div class="control-group">
	                                                <label class="span5"><?php _e("Monthly Payment:","realto"); ?></label>
	                                                <div class="input-prepend">
	                                                	<span class="add-on"><?php echo $nt_option["mortgage_calculator_currency"];?></span>
	                                                	<input class="span6" type="text" size="12" name="pmt" />
	                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span12 margin200">
                                            <button class="btn btn-realto" name="cmdCalc" type="button" onClick="cmdCalc_Click(this.form)"><?php _e("Calculate","realto")?></button>
                                        </div>
                                    </div>
                                   
                                </form>
                            </div>
                     
					 <?php endwhile; ?>
                     <?php wp_reset_query(); ?>
                        
                    </div>
                </div>
            </div>
            <!-- .span8 -->
            <div class="span4 widget">
                
                <?php get_sidebar("page");?>
                
            </div>
            <!-- .span4 -->
        </div>
        <!-- .row -->
</div>

<!-- Page Content -->
<div class="container">
    <div class="row">
	<?php while(have_posts()):the_post(); ?>
                            
            <?php the_content(); ?>
                
     <?php endwhile; ?>
     <?php wp_reset_query(); ?>
	</div>
</div>

<?php
get_footer();
?>