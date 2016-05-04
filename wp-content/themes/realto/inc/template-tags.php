<?php
/**
 * Custom template tags for RealTo
 *
 * @package RealTo
 * @since RealTo 1.0
 */

/**
 * Get revolution slider
 * @since realto 1.2
 */
if (!function_exists('nt_get_revolution_slider'))
{
	function nt_get_revolution_slider()
	{
		$a = get_post_meta(get_the_ID(), 'nt_rev_slider',true);
	
		if (strstr($a,'revslider'))
		{
			$id = str_replace('revslider-','',$a);
			return do_shortcode('[rev_slider '.$id.']');
		}
	}
}

if ( ! function_exists( 'realto_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @since RealTo 1.0
 *
 * @return void
 */
function realto_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}

	$paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link = html_entity_decode( get_pagenum_link() );
	$query_args   = array();
	$url_parts    = explode( '?', $pagenum_link );

	if ( isset( $url_parts[1] ) ) {
		wp_parse_str( $url_parts[1], $query_args );
	}

	$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
	$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

	$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
	$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

	// Set up paginated links.
	$links = paginate_links( array(
		'base'     => $pagenum_link,
		'format'   => $format,
		'total'    => $GLOBALS['wp_query']->max_num_pages,
		'current'  => $paged,
		'mid_size' => 1,
		'add_args' => array_map( 'urlencode', $query_args ),
		'prev_text' => __( '&larr; Previous', 'realto' ),
		'next_text' => __( 'Next &rarr;', 'realto' ),
	) );

	if ( $links ) :

	?>
    <div class="span8">
	<nav class="navigation paging-navigation" role="navigation">
		<div class="pagination loop-pagination">
			<?php echo $links; ?>
		</div><!-- .pagination -->
	</nav><!-- .navigation -->
    </div>
	<?php
	endif;
}
endif;

if ( ! function_exists( 'realto_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 *
 * @since RealTo 1.0
 *
 * @return void
 */
function realto_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}

	?>
	<nav class="navigation post-navigation" role="navigation">
		<?php /*?><h1 class="screen-reader-text"><?php _e( 'Post navigation', 'realto' ); ?></h1><?php */?>
		<div class="nav-links">
			<?php
			if ( is_attachment() ) :
				previous_post_link( '%link', __( '<span class="meta-nav">Published In</span>%title', 'realto' ) );
			else :
				previous_post_link( '%link', __( '<span class="realto-prev meta-nav">Previous Post</span>', 'realto' ) );
				next_post_link( '%link', __( '<span class="realto-next meta-nav">Next Post</span>', 'realto' ) );
			endif;
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'realto_posted_on' ) ) :
/**
 * Print HTML with meta information for the current post-date/time and author.
 *
 * @since RealTo 1.0
 *
 * @return void
 */
function realto_posted_on() {
	if ( is_sticky() && is_home() && ! is_paged() ) {
		echo '<span class="featured-post">' . __( 'Sticky', 'realto' ) . '</span>';
	}

	// Set up and print post meta information.
	printf( '<span class="entry-date"><a href="%1$s" rel="bookmark"><time class="entry-date" datetime="%2$s">%3$s</time></a></span> <span class="byline"><span class="author vcard"><a class="url fn n" href="%4$s" rel="author">%5$s</a></span></span>',
		esc_url( get_permalink() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		get_the_author()
	);
}
endif;

/**
 * Find out if blog has more than one category.
 *
 * @since RealTo 1.0
 *
 * @return boolean true if blog has more than 1 category
 */
function realto_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'realto_category_count' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'realto_category_count', $all_the_cool_cats );
	}

	if ( 1 !== (int) $all_the_cool_cats ) {
		// This blog has more than 1 category so realto_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so realto_categorized_blog should return false
		return false;
	}
}

/**
 * Flush out the transients used in realto_categorized_blog.
 *
 * @since RealTo 1.0
 *
 * @return void
 */
function realto_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'realto_category_count' );
}
add_action( 'edit_category', 'realto_category_transient_flusher' );
add_action( 'save_post',     'realto_category_transient_flusher' );

/**
 * Display an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index
 * views, or a div element when on single views.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return void
*/
function realto_post_thumbnail() {
	if ( post_password_required() || ! has_post_thumbnail() ) {
		return;
	}

	if ( is_singular() ) :
	?>

	<?php
		
		the_post_thumbnail( 'realto-full-width' );
		
	?>
	

	<?php else : 
	
		if ( ( is_home() || is_page_template( 'page-templates/blog-layout-one.php' ) ) ) {?>
        	<a class="overlay" href="<?php the_permalink();?>">
    		<span class="more"></span>
				<?php the_post_thumbnail( 'blog-layout-one' );?>
			</a>
    <?php
								
		}else {
			the_post_thumbnail( 'blog-layout-one' );
		}
	?>
	
	<?php endif; // End is_singular()
}