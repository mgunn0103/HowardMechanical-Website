<?php
/**
 * The archive property page
 *
 * @package RealTo
 * @since 	RealTo 1.0
**/
global $nt_option;
?>

<?php get_header(); ?>

<?php
global $query_string;
	$args = array(
			'post_type' => 'property',
			'posts_per_page' => '-1'
		);
	if(isset($_GET['beds']) && $_GET['beds']!="") {
		$args['meta_query'][] = array(
			'key' => 'nt_bedrooms',
			'value' => $_GET['beds'],
			'compare' => '>=',
			'type' => 'numeric'
		);
	}
	if(isset($_GET['baths']) && $_GET['baths']!="") {
		$args['meta_query'][] = array(
			'key' => 'nt_bathrooms',
			'value' => $_GET['baths'],
			'compare' => '>=',
			'type' => 'numeric'
		);
	}
	if(isset($_GET['property_type']) && $_GET['property_type']!="") {
		$args['tax_query'][] = array(
			'taxonomy' => 'property-type',
			'field' => 'slug',
			'terms' => $_GET['property_type']
		);
	}
	if(isset($_GET['locations']) && $_GET['locations']!="") {
		$args['tax_query'][] = array(
			'taxonomy' => 'location',
			'field' => 'slug',
			'terms' => $_GET['locations']
		);
	}
	
	if(isset($_GET['status']) && $_GET['status']!="") {
		$args['meta_query'][] = array(
			'key' => 'nt_status',
			'value' => $_GET['status'],
			'compare' => '=',
			'type' => 'CHAR'
		);
	}
	if(isset($_GET['min-price']) && $_GET['min-price']!="") {
		$min_price = preg_replace("/[^A-Za-z0-9]/", "", $_GET['min-price']);
		$args['meta_query'][] = array(
			'key' => 'nt_listprice',
			'value' => $min_price,
			'compare' => '>=',
			'type' => 'numeric'
		);
	}
	if(isset($_GET['max-price']) && $_GET['max-price']!="") {
		$max_price = preg_replace("/[^A-Za-z0-9]/", "", $_GET['max-price']);
		
		$args['meta_query'][] = array(
			'key' => 'nt_listprice',
			'value' => $max_price,
			'compare' => '<=',
			'type' => 'numeric'
		);
	}
	if(isset($_GET['search_keyword']) && $_GET['search_keyword']!="") {
		$args['meta_query'][] = array(
			'key' => 'nt_gmap',
			'value' => $_GET['search_keyword'],
			'compare' => 'LIKE',
			'type' => 'CHAR'
		);
	}
query_posts( $args );
?>
     
<div class="container page-content">
<div class="row">
<div class="span8">
    <div class="row">
        
        <?php
        if ( have_posts() ) :
            // Start the Loop.
            
            while ( have_posts() ) : the_post();
                
				if($nt_option["listing-search-layout"]=="search-list-layout"):
				
					get_template_part( 'property', 'searchlist' );
				
				else:
					
					get_template_part( 'property', 'searchgrid' );
				
				endif;
            
       	   endwhile; ?>
              
              <div class="span8"> <?php //nt_pagination(); ?></div>
              
       <?php else : 
            // If no content, include the "No posts found" template.
            get_template_part( 'property', 'noresult' );

        endif;
        ?>
    </div>
    <!-- .row -->
</div>
<!-- .span8 -->
<div class="span4">
    
    <?php get_sidebar("search");?>
    
</div>
<!-- .span4 -->

</div>
<!-- .row -->
</div>
<!-- .container --> 

<?php get_footer(); ?>
