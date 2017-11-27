<?php

/*
Template Name: Artistes
*/

?>

<?php get_header() ?>

<!-- Filter to search artists by taxonomies -->
<div class="filtre__section">
   <h2>Sélectionnez des filtres d'affichage</h2>
   <form method="get" action="" class="form__filtre">
      <div class="filtre__select">
         <input name="pays" type="text" id="filtre__country" placeholder="Choisissez un pays" class="filtre__select__input">
         <div class="filtre__select__div">choisissez un pays</div>
         <div class="filtre__select__input--arrow"></div>
         <div class="filtre__select__list">
            <ul>
                <li class="item_filtre">aucun</li>
            <?php
            /* Get country taxonomy */

	           	$terms = get_terms( array(
		            'taxonomy' => 'pays',
		            'hide_empty' => false,
		        ) );
				
				foreach($terms as $term):
			?>
               <li class="item_filtre"><?= $term -> name ?></li>
			<?php endforeach; ?>
            </ul>
         </div> 

      </div>
      <div class="filtre__select">
         <input name="genre" type="text" id="filtre__country" placeholder="Choisissez un pays" class="filtre__select__input">
         <div class="filtre__select__div">choisissez un genre</div>
         <div class="filtre__select__input--arrow"></div>
         <div class="filtre__select__list">
            <ul>
               <li class="item_filtre">aucun</li>
			<?php
            	/* Get genre taxonomy */

	           	$terms = get_terms( array(
		            'taxonomy' => 'genre',
		            'hide_empty' => false,
		        ) );
				
				foreach($terms as $term):
			?>
               <li class="item_filtre"><?= $term -> name ?></li>
			<?php endforeach; ?>

            </ul>
         </div> 

      </div>
      <button class="filtre__select__button" type="submit">Appliquer les filtres</button>
   </form>
</div>
<div class="artist__list">
<?php

	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

	if($_GET['pays'] != "" || $_GET['genre'] != "")
    {
      if($_GET['pays'] != "" && $_GET['genre'] != "" )
      {
        $args = array(
            'post_type' => 'artiste',
            'tax_query' => array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'genre',
                'field' => 'slug',
                'terms' => $_GET['genre'],
            ),
            array(
                'taxonomy' => 'pays',
                'field' => 'slug',
                'terms' => $_GET['pays'],
            )
          )
        );
      }
      else
      {
        if($_GET['pays'] != "")
        {
          $args = array(
            'post_type' => 'artiste',
            'tax_query' => array(
              array(
                  'taxonomy' => 'pays',
                  'field' => 'slug',
                  'terms' => $_GET['pays'],
              )
            )
          );
        }
        else
        {
          $args = array(
            'post_type' => 'artiste',
            'tax_query' => array(
              array(
                  'taxonomy' => 'genre',
                  'field' => 'slug',
                  'terms' => $_GET['genre'],
              )
            )
          );
        }
      }
    }
    else
    {
      $args = array(
        'post_type' => 'artiste',
        'paged' => $paged,
      );
    }

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
<script type="text/javascript">
   let lists = [];
   let filtre = function(item) { 
      let filtre = {}; 
      filtre.item = item;
      filtre.input = filtre.item.querySelector('.filtre__select__input');
      filtre.div = filtre.item.querySelector('.filtre__select__div');
      filtre.arrow = filtre.item.querySelector('.filtre__select__input--arrow');
      filtre.select = filtre.item.querySelector('.filtre__select__list');
      lists.push(filtre.select);
      filtre.items = filtre.select.querySelectorAll('.item_filtre');
      filtre.div.addEventListener('click',function() {
         filtre.select.classList.toggle('listIsOpen');
         filtre.arrow.classList.toggle('listIsOpen');
         filtre.open = filtre.select.classList.contains('listIsOpen')? true:false;
      });
      filtre.arrow.addEventListener('click',function() {
         filtre.select.classList.toggle('listIsOpen');
         filtre.arrow.classList.toggle('listIsOpen');
         filtre.open = filtre.select.classList.contains('listIsOpen')? true:false;
      });
      for ( let i = 0; i<filtre.items.length; i++) {
         filtre.items[i].onclick = function() {
            if ( i == 0) {
               filtre.input.value = filtre.div.innerHTML = "";
            }
            else {
               filtre.input.value = filtre.div.innerHTML = this.innerHTML;
            }
            filtre.select.classList.toggle('listIsOpen');
            filtre.arrow.classList.toggle('listIsOpen');
            filtre.open = filtre.select.classList.contains('listIsOpen')? true:false;
         }
      }
   }

   var filtres = document.querySelectorAll('.filtre__select');
   for ( let i = 0; i<filtres.length; i++) {
      filtre(filtres[i]);
   }
</script>

<?php get_footer() ?>