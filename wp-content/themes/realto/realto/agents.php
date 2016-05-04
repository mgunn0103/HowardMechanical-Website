<?php
/**
 * Template Name: Agents
 *
 * @package RealTo
 * @since   RealTo 1.0
 */

get_header(); ?>

<?php
$args = array(
	'who' => 'authors'
);
$agents = get_users( $args );
?>

<div class="container page-content">
    <div class="row">
        <div class="span8">
            <div class="row">
                
					<?php foreach( $agents as $agent ) : ?>

						<?php $agent_url = get_author_posts_url( $agent->ID ); ?>
                             <div class="span8 box-container">   
                                <div class="agent row">
                                    <a class="span2 overlay" href="<?php echo $agent_url; ?>" title="<?php echo $agent->display_name; ?>">
                                        <span class="more"></span>
                                        <?php echo get_avatar($agent->ID, 600); ?>
                                    </a>
                                    <div class="span6">
                                        <div class="agent-content">
                                            <h3><?php echo $agent->display_name; ?></h3>
                                            <p><?php echo $agent->description; ?></p>
                                            <p class="margin0"><a class="serif italic" href="<?php echo $agent_url; ?>">
												<?php _e( 'Profile Page', 'realto' ); ?>
                                                &raquo;</a>
                                             </p>
                                        </div>
                                    </div>
                                </div>
                			</div>
                    <?php endforeach; ?>
                    
            </div>
            <!-- .row -->
        </div>
        <!-- .span8 -->
        <div class="span4">
            
            <?php get_sidebar("page");?>
            
        </div>
        <!-- .span4 -->
    </div>
    <!-- .row -->
</div>
<!-- .container -->

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