<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package RealTo
 * @since RealTo 1.0
 */
?>
<!-- begin footer -->
<footer id="footer" style="background-color: #3a3a3a">
    <div class="container">
        <div class="row">
            <div class="span3"><?php dynamic_sidebar("footer widget 1");?></div>
            <!-- .span3 -->
            <div class="span3"><?php dynamic_sidebar("footer widget 2");?></div>
            <!-- .span3 -->
            <div class="span3"><?php dynamic_sidebar("footer widget 3");?></div>
            <!-- .span3 -->
            <div class="span3"><?php dynamic_sidebar("footer widget 4");?></div>
            
            <!-- .span3 -->
        </div>
    </div>
</footer>
<!-- end footer -->
		

	<?php wp_footer(); ?>
</body>
</html>