<?php

/*
Template Name: Artistes
*/

?>

<?php get_header() ?>

<div class="artist__list">
<?php

	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

	$args = array(
		"post_type" => "artiste",
		"paged" => $paged,
	);

	// The Query
	$the_query = new WP_Query( $args );

	// The Loop
	if ( $the_query->have_posts() ) {

	    while ( $the_query->have_posts() ) {
	        $the_query->the_post();
	        get_template_part('templates/misc/artist');
	    }
	    /* Restore original Post Data */
	    wp_reset_postdata();
	} else {
	    // no posts found
	}

?>
</div>

<?php get_footer() ?>