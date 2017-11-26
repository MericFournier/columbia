<?php get_header() ?>

<?php 

if ( have_posts() ){
   while ( have_posts() ) {
      the_post();
?>

<div class="contenu">
<div class="actu"> 
   <div class="actu__header">
      <div class="date"><span><?php the_date('d') ?></span><span><?php get_template_part('templates/misc/date') ?></span></div>
      <h1><?php the_title() ?></h1>
   </div>
   <div class="actu__hero">
      <a class="button__contact" href="#"><img src="img/letter.svg" alt=""></a>
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


<div class="slider slider__news js_slider">
   <div class="frame frame__news js_frame">
      <ul class="slides js_slides slides__news">
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
         ?>
            <li>
               <div class="slide__news js_slide">
                  <div class="data">
                     <span><span><?php the_date('d') ?></span><span><?php get_template_part('templates/misc/date') ?></span></span>
                     <a href="<?php the_permalink()?>"><?php the_title() ?></a>
                  </div>
                  <div class="img-responsive"><?php the_post_thumbnail(); ?></div>
               </div>
            </li>
         <?php
            }
                      /* Restore original Post Data */
            wp_reset_postdata();
            } else 
            {
                // no posts found
            }

         ?>
      </ul>
   </div>
   <span class="js_prev prev">
      <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 501.5 501.5"><g><path fill="#2E435A" d="M302.67 90.877l55.77 55.508L254.575 250.75 358.44 355.116l-55.77 55.506L143.56 250.75z"/></g></svg>
   </span>
   <span class="js_next next">
      <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 501.5 501.5"><g><path fill="#2E435A" d="M199.33 410.622l-55.77-55.508L247.425 250.75 143.56 146.384l55.77-55.507L358.44 250.75z"/></g></svg>
   </span>
</div>
</div>

<?php get_footer() ?>