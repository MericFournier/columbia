<?php get_header() ?>
<?php $pattern = "/".$_GET['s']."/i"; ?>
<div class="search__page">
	<h2 class="search__title">Artistes</h2>
	<div class="artist__list">
		<?php

		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

		$args = array(
			"post_type" => "artiste",
			"posts_per_page" => 6,
			"paged" => $paged,
		);

		// The Query
		$the_query = new WP_Query( $args );

		// The Loop
		if ( $the_query->have_posts() ) {

		    while ( $the_query->have_posts() ) {
		        $the_query->the_post();
		        if (preg_match($pattern, get_the_title())) {
		        	get_template_part('templates/misc/artist');
		        }
		    }
		    /* Restore original Post Data */
		    wp_reset_postdata();
		} else {
		    // no posts found
		}

		?>
	</div>

	<h2 class="search__title">Articles relatifs à <?= $_GET['s']?></h2>
	<div class="contenu">
		<div class="grid__template newsList__grid">
		<div class="grid__sizer"></div>
		<?php

		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

		$args = array(
			"post_type" => "post",
			"posts_per_page" => 3,
			"paged" => $paged,
		);

		// The Query
		$the_query = new WP_Query( $args );

		// The Loop
		if ( $the_query->have_posts() ) {

		    while ( $the_query->have_posts() ) {
		        $the_query->the_post();
		        if (preg_match($pattern, get_field('artiste_concerne'))) {
		        	get_template_part('templates/misc/article');
		        }
		    }
		    /* Restore original Post Data */
		    wp_reset_postdata();
		} else {
		    // no posts found
		}

		?>
		</div>
	</div>
</div
<?php get_footer() ?>