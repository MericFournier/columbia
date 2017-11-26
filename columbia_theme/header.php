<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @private
 * @version     0.5.1
 * @property    undefined
 * @package     WordPress
 * @subpackage  firstPixel
 * @since       0.1
 */
?>
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
	      <?php wp_head() ?>
	      <!-- endbuild -->

	   </head>
	   <body>

	      <div class="header">
	         <section class="header__topBar">

	            <ul class="topBar__list">
	               <li>
	                  <a href="#"><img src="<?php echo IMG_URL."/facebook.svg" ?>" alt="Columbia sur facebook"></a>
	               </li>
	               <li>
	                  <a href="#"><img src="<?php echo IMG_URL."/twitter.svg"?>" alt="Columbia sur Twitter"></a>
	               </li>
	               <li>
	                  <a href="#"><img src="<?php echo IMG_URL."/instagram.svg"?>" alt="Columbia sur instagram"></a>
	               </li>
	            </ul>
	         </section>
			

	         <div class="header__hero">
	            <section class="header__logo">
	                <div class="img-responsive">
	                	<a href="<?= site_url() ?>"><img src="<?= IMG_URL ?>/logo.png" alt=""></a>
	                </div>
	                <p>music moving forward</p>
                </section>
	            <section class="header__navigation">
	               <div class="search"></div>
	               <nav class="header__nav">
	                  <ul>
	                     <?php
						$menu = array(
										'theme_location' => 'header',
										'container'      => 'nav'
										);
						wp_nav_menu($menu);
						 ?>
	                  </ul>
	               </nav>
	            </section>
	         </div>

	      </div>
	      <!-- END HEADER MOBILE -->