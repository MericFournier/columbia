<?php get_header();?>

<?php 

if ( have_posts() ){
	while ( have_posts() ) {
		the_post();
      $currentArtist = get_the_title();
?>
<div class="artist__hero">
   <h1><?php the_title() ?></h1>
   <ul class="social">
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
   <div class="hero__overlay"></div>
   <?php if(has_post_thumbnail): ?>
		<div class="img-responsive"><?php the_post_thumbnail(); ?></div>
   <?php endif; ?>
</div>
<div class="artist__actu">
   <h2><?php _e('News', 'columbia') ?></h2>
   <div class="slider__artiste__actu">
      <?php
         $connected = new WP_Query( array(
        'connected_type' => 'post_to_artist',
        'connected_items' => get_queried_object(),
        'post_per_page' => 4,
      ) );
      if ( $connected->have_posts() ) :
         while($connected->have_posts()):
            $connected->the_post();
      ?>
      <div class="artist__actu__item">
         <div class="img-responsive"><?php the_post_thumbnail(); ?></div>
         <p class="type"><?php the_field('type'); ?></p>
         <p class="date"><?php the_date('d/m/Y'); ?></p>
         <a href="<?php the_permalink() ?>" class="title"><?php the_title() ?></a>
      </div>
      <?php
         endwhile;
          wp_reset_postdata();
         endif;
      ?>
   </div>
</div>
<div class="artist__biography">
   <h2><?php _e("Biography", 'columbia') ?></h2>
   <div class="content">
      <p><?php the_content() ?></p>
   </div>
</div>
<div class="artist__albums">
   <h2><?php _e('Albums', 'columbia') ?></h2>
   <div class="artist__albums__slider">
   	<?php
	   	$connected = new WP_Query( array(
		  'connected_type' => 'album_to_artist',
		  'connected_items' => get_queried_object(),
		  'nopaging' => true,
		));
		if ( $connected->have_posts() ) :
			while($connected->have_posts()):
				$connected->the_post();
   	?>
      <div class="artist__albums__item">
         <div class="cover">
            <a class="player" href="<?php the_permalink() ?>"><img src="<?php echo IMG_URL."/play-button.svg"?>"></a>
            <div class="img-responsive"><?php the_post_thumbnail(); ?></div>
         </div>
         <p class="title"><?php the_title() ?></p>
      </div>
      <?php
      	endwhile;
         wp_reset_postdata();
      	endif;
      ?>
   </div>
</div>
<div class="artist__similar">
   <h2><?php _e('Similar Artists', 'columbia') ?></h2>
  <div class="artist__similar__slider">
      <?php

   $count = 0;
    $args = array(
        'post_type' => 'artiste',
    );

    $the_query = new WP_Query( $args );
    // The Loop
    if ( $the_query->have_posts() ) {
        while ( $the_query->have_posts() && $count < 2) {
            $the_query->the_post();
            if(has_term('rap', 'genre') && get_the_title() != $currentArtist)
            {
               $count++;

    ?>
      <div class="artist__similar__item">
         <a class="title" href="<?php the_permalink() ?>"><p><? the_title(); ?></p></a>
         <div class="overlay"></div>
         <div class="img-responsive"><?php the_post_thumbnail(); ?></div>
      </div>
      <?php
      }
         }
         }
?>
   </div>
</div>
<?php
 }
 }
?>
<?php get_footer(); ?>