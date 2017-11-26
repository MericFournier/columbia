<div class="contenu">
	<div class="grid__template newsList__grid">
	<div class="grid__sizer"></div>
	<?php

	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

	$args = array(
		"post_type" => "post",
		"posts_per_page" => 10,
		"paged" => $paged,
	);

	// The Query
	$the_query = new WP_Query( $args );

	// The Loop
	if ( $the_query->have_posts() ) {

	    while ( $the_query->have_posts() ) {
	        $the_query->the_post();
	        get_template_part('templates/misc/article');
	    }
	    /* Restore original Post Data */
	    wp_reset_postdata();
	} else {
	    // no posts found
	}

	?>
	</div>
</div>
		

<script>
	var current_page = <?php echo $paged; ?>;
   	var max_paged = <?= $the_query->max_num_pages; ?>
</script>