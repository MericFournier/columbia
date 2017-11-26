
<div class="grid__item newsList__item">
  <div class="newslist__item__content--image">
    <?php if(has_post_thumbnail){ ?> 
    	<?php the_post_thumbnail(); ?>
    <?php } ?>
  </div>
  <div class="newsList__item__content--data">
     <span class="newsList__item__content--date"><span><?php the_date('d'); ?></span><span><?php get_template_part('templates/misc/date') ?></span></span>
     <div class="newsList__item__content--title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></div>
  </div>
</div>