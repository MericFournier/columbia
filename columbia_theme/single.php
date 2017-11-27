<?php get_header() ?>

<?php 

if ( have_posts() ){
   while ( have_posts() ) {
      the_post();
      $currentTitle = get_the_title();
?>

<div class="contenu">
<div class="actu"> 
   <div class="actu__header">
      <div class="date"><span><?php the_date('d') ?></span><span><?php get_template_part('templates/misc/date') ?></span></div>
      <h1><?php the_title() ?></h1>
   </div>
   <div class="actu__hero">
      <?php
         $connected = new WP_Query( array(
        'connected_type' => 'post_to_artist',
        'connected_items' => get_queried_object(),
        'nopaging' => true,
      ) );
      if ( $connected->have_posts() ) :
         while($connected->have_posts()):
            $connected->the_post();
      ?>
         <ul class="social__hero">
            <?php 
                  if(get_field('facebook')):
            ?>
               <li>
                  <a href="<?php the_field('facebook'); ?>" target="_blank">
                     <img src="<?php echo IMG_URL."/facebook.svg"?>" class="img-responsive">
                  </a>
               </li>
            <?php endif; ?>
            <?php if(get_field('chaine_youtube')):?>
               <li>
                  <a href="<?php the_field('chaine_youtube'); ?>" target="_blank">
                     <img src="<?php echo IMG_URL."/youtube.svg"?>" class="img-responsive">
                  </a>
               </li>
            <?php endif; ?>
            <?php if(get_field('twitter')): ?>
               <li>
                  <a href="<?php the_field('twitter'); ?>" target="_blank">
                     <img src="<?php echo IMG_URL."/twitter.svg"?>" class="img-responsive">
                  </a>
               </li>
            <?php endif; ?>
            <?php if(get_field('instagram')): ?>
               <li>
                  <a href="<?php the_field('instagram'); ?>" target="_blank">
                     <img src="<?php echo IMG_URL."/instagram.svg"?>" class="img-responsive">
                  </a>
               </li>
            <?php endif; ?>
         </ul>
      <?php
         endwhile;
         wp_reset_postdata();
         endif;
      ?>
   <div class="img-responsive">
      <?php the_post_thumbnail() ?>   
   </div>   
   </div>
   <div class="actu__main">
      <h2><?php the_field('sous-titre') ?></h2>
      <?php the_content() ?>
   </div>
</div>
<div class="artist__albums">
   <h2><?php _e('Suggestions', 'columbia') ?></h2>
   <div class="artist__albums__slider">
      <div class="artist__albums__item artist__album__item--clipSuggest">
         <iframe width="100%" height="100%" src="<?php the_field('related_clip')?>" frameborder="0" allowfullscreen></iframe>
      </div>
   </div>
</div>

<?php 
   }
}
?>

<div class="artist__actu actus__other">
   <h2>Autres Actualités</h2>
   <div class="slider__artiste__actu">
   
   <?php
      //Wordpress loop to show the other articles

      $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
      $count = 0;
      $args = array(
         "post_type" => "post",
         "posts_per_page" => 5,
         "paged" => $paged,
      );

      // The Query
      $the_query = new WP_Query( $args );

      // The Loop
      if ( $the_query->have_posts() ) {
          while ( $the_query->have_posts() ) {
              $the_query->the_post();
              if(get_the_title() != $currentTitle && $count < 4):
                  $count++;
   ?>
      <a href="<?php the_permalink() ?>" class="artist__actu__item">
         <?php if(has_post_thumbnail()): ?>
            <div class="img-responsive">
               <?php the_post_thumbnail() ?>
            </div>
         <?php endif; ?>
         <p class="date"><?php the_date('Y/m/d') ?></p>
         <p class="title"><?php the_title() ?></p>
      </a>
   <?php
      endif;
      }
         /* Restore original Post Data */
      wp_reset_postdata();
      } 
      else 
      {
      // no posts found
      }

   ?>
   </div>
</div>
</div>

<?php get_footer() ?>