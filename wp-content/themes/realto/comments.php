<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package RealTo
 * @since RealTo 1.0
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comment-container span8">

	<?php if ( have_comments() ) : ?>

	<h3 class="serif italic">
		<?php
			printf( _n( '1 Responses to &ldquo;%2$s&rdquo;', '%1$s Responses to &ldquo;%2$s&rdquo;', get_comments_number(), 'realto' ),
				number_format_i18n( get_comments_number() ), get_the_title() );
		?>
	</h3>

	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'realto' ); ?></h1>
		<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'realto' ) ); ?></div>
		<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'realto' ) ); ?></div>
	</nav><!-- #comment-nav-above -->
	<?php endif; // Check for comment navigation. ?>
	
    <div class="comments">
        <ul class="media-list">
            <?php
                wp_list_comments( array(
                    'style'      => 'ul',
                    'short_ping' => true,
                    'avatar_size'=> 90,
                ) );
            ?>
        </ol><!-- .comment-list -->
	</div>
	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
	<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'realto' ); ?></h1>
		<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'realto' ) ); ?></div>
		<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'realto' ) ); ?></div>
	</nav><!-- #comment-nav-below -->
	<?php endif; // Check for comment navigation. ?>

	<?php if ( ! comments_open() ) : ?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'realto' ); ?></p>
	<?php endif; ?>

	<?php endif; // have_comments() ?>
	
    <?php
	
		
		//Custom Fields
		$fields =  array(
			'author'=> '<div class="input-prepend">
                        <span class="add-on">
                            <i class="icon-user"></i>
                        </span>
                        <input class="span4" name="author" id="author" value="" placeholder="'.__('Name','realto').'" type="text" />
                    </div>',
			
			'email' => '<div class="input-prepend">
                        <span class="add-on">
                            <i class="icon-envelope"></i>
                        </span>
                        <input class="span4" name="email" id="email" placeholder="'.__('Email','realto').'" type="text" />
                    </div>',
			
			'url' 	=> '<div class="input-prepend">
                        <span class="add-on">
                            <i class="icon-link"></i>
                        </span>
                        <input class="span4" name="url" id="url" placeholder="'.__('Website','realto').'" type="text">
                    </div>',
		);

		//Comment Form Args
        $comments_args = array(
			'fields' => $fields,
			'title_reply'=>'<h3 class="title"><span>'. __('Leave A Comment', 'realto') .'</span></h4>',
			'comment_notes_before' => '<p class="comment-notes">' . __( 'Your email address will not be published.','realto' ). '</p>',
			'comment_notes_after' => '',
			'comment_field' => '<textarea name="comment" id="comment" class="span6" placeholder="Your comment" rows="6"></textarea>',
			'label_submit' => __('Post Comment','realto')
		);
		
		// Show Comment Form
		comment_form($comments_args); 
	?>
	
</div><!-- #comments -->
