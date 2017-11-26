<?php

function my_style() {
    $file = 'app.css';
    wp_enqueue_style( 'style-main', CSS_URL . '/' . $file );

}
add_action( 'wp_enqueue_scripts',  'my_style' );


function my_script() {
    // bundle
    $file = 'app.js';
    wp_enqueue_script( 'main', JS_URL . '/' . $file, $dependencies, null, true );
    wp_localize_script( 'main', 'ajaxurl', admin_url( 'admin-ajax.php' ) );
}
add_action( 'wp_enqueue_scripts', 'my_script' );

register_nav_menus( array(
    'header' => __( 'Header main menu','firstPixel' ),
    'footer' => __('Footer menu','firstPixel')
) );


function firstPixel_theme_support() {
    /**
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
     */
    load_theme_textdomain( 'columbia', THEME_PATH . '/languages' );

    /**
     *  Set up the WordPress core custom background feature.
     */
    add_theme_support( 'custom-background', apply_filters( 'test_custom_background_args', array(
        'default-color' => 'ffffff',
        'default-image' => '',
    ) ) );

    /**
	 * Let WordPress manage the document title.
     */
    add_theme_support( 'title-tag' );

    /**
	 * Enable support for Post Thumbnails on posts and pages.
     */
    add_theme_support( 'post-thumbnails' );

	 /**
	  * Enable support for woocommerce on posts and pages.
      */
    add_theme_support( 'wooocommerce' );

    /**
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ) );
}
add_action( 'after_setup_theme', 'firstPixel_theme_support' );

wp_register_script( 'lory', 'https://cdnjs.cloudflare.com/ajax/libs/lory.js/2.2.0/lory.min.js', null, null, true);
wp_enqueue_script('lory');
wp_register_script( 'masonry', 'https://masonry.desandro.com/masonry.pkgd.js', null, null, true);
wp_enqueue_script('masonry');

