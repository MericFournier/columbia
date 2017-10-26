<!DOCTYPE html>
<html <?php language_attributes(); ?>>
   <head>
      <meta charset="<?php bloginfo( 'charset' ); ?>" />

      <title>Columbia Records</title>

      <!-- SEO meta -->
      <meta name="robots" content="index, follow" />
      <meta name="description" content="Columbia Records - Music for life" />
      <!-- End SEO meta -->

      <!-- IE meta -->
      <meta content="IE=edge" http-equiv="X-UA-Compatible" />
      <meta name="msapplication-tap-highlight" content="no" />
      <!-- End IE meta -->

      <!-- Apple meta -->
      <meta name="apple-mobile-web-app-capable" content="yes" />
      <meta name="apple-mobile-web-app-status-bar-style" content="black" />
      <meta name="apple-mobile-web-app-title" content="" />
      <!-- End Apple meta -->

      <!-- Mobile meta -->
      <meta name="HandheldFriendly" content="true" />
      <meta name="format-detection" content="telephone=no" />
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui" />
      <!-- End mobile meta -->

      <!-- Facebook meta -->
      <meta property="og:type" content="website" />
      <meta property="og:url" content=""/>
      <meta property="og:title" content=""/>
      <meta property="og:image" content="" />
      <meta property="og:site_name" content=""/>
      <meta property="og:description" content=""/>
      <!-- End Facebook meta -->

      <!-- Twitter meta -->
      <meta name="twitter:card" content="summary" />
      <meta name="twitter:url" content="" />
      <meta name="twitter:title" content="" />
      <meta name="twitter:site" content="" />
      <meta name="twitter:image" content="" />
      <!-- End Twitter meta -->

      <!-- build:css -->
      <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700,700i,900,900i|Roboto:400,700" rel="stylesheet">
      <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
      <!-- endbuild -->
      <?php wp_head(); ?>
   </head>
   <body <?php body_class(); ?>>

      <header class="header">
         <section class="header__topBar">

            <ul class="topBar__list">
               <li>
                  <a href="#"><img src="<?= IMAGES_URL;?>/facebook.svg" alt="Columbia sur facebook"></a>
               </li>
               <li>
                  <a href="#"><img src="<?= IMAGES_URL;?>/twitter.svg" alt="Columbia sur Twitter"></a>
               </li>
               <li>
                  <a href="#"><img src="<?= IMAGES_URL;?>/instagram.svg" alt="Columbia sur instagram"></a>
               </li>
            </ul>
         </section>

         <div class="header__hero">
            <section class="header__logo">
            </section>
            <section class="header__navigation">
               <div class="search"></div>
               <nav class="header__nav">
                  <ul>
                     <?php // SYNTAXE : wp_nav_menu( array $args = array() )
                     $args=array(
                        'theme_location' => 'header', // nom du slug
                        'menu' => 'menu_main', // nom à donner cette occurence du menu
                        'menu_class' => 'header__nav', // class à attribuer au menu
                        'menu_id' => 'header__nav' // id à attribuer au menu
                        // voir les autres arguments possibles sur le codex
                     );
                     wp_nav_menu($args);
                     ?>

                     </nav>
                        </section>
                        </div>

                        </header>
