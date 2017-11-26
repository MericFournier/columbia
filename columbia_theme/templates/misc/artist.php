<div class="artist__list__item">
   <div class="artist__list__data">
      <a href="<?php the_permalink() ?>"><p><?php the_title() ?></p></a>
      <ul class="artist__list__social">
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
   </div>
   <a href="<?php the_permalink() ?>">
   <div class="img-responsive">
      <?php the_post_thumbnail(); ?>
   </div>
   </a>
</div>