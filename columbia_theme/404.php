<?php get_header() ?>

<div class="error__container">
   <div class="error">
      <h1>404</h1>
      <p>Hello ! </br>Is it me you looking for ?</p>
      <a class="button__error" href="<?= site_url() ?>"><?php _e("back to news", "columbia") ?></a>
      <div class="img-responsive">
         <img src="<?= IMG_URL ?>/lionel-large.png">
      </div>
   </div>
</div>

<?php get_footer() ?>