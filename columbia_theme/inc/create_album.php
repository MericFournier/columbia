<?php
function add_custom_type_init() {
$post_type = "album";
$labels = array(
      'name'               => 'Albums',
      'singular_name'      => 'Album',
      'all_items'          => 'Tous les albums',
      'add_new'            => 'Ajouter un album',
      'add_new_item'       => 'Ajouter un nouvel album',
      'edit_item'          => "Editer l'album'",
      'new_item'           => 'Nouvel album',
      'view_item'          => "Voir l'album",
      'search_items'       => 'Chercher un album',
      'not_found'          => 'Pas de résultat',
      'not_found_in_trash' => 'Pas de résultat',
      'parent_item_colon'  => 'Album parent :',
      'menu_name'          => 'Albums',
  );

  $args = array(
      'labels'              => $labels,
      'hierarchical'        => false,
      'supports'            => array( 'title','thumbnail','editor', 'excerpt', 'revisions'),
      'public'              => true,
      'show_ui'             => true,
      'show_in_menu'        => true,
      'menu_position'       => 0,
      'menu_icon'           => 'dashicons-format-audio',
      'show_in_nav_menus'   => true,
      'publicly_queryable'  => true,
      'exclude_from_search' => false,
      'has_archive'         => false,
      'query_var'           => true,
      'can_export'          => true,
      'rewrite'             => array( 'slug' => $post_type )
  );

  register_post_type($post_type, $args );

  $taxonomy="genre_album";
  $object_type = array("album");
  $args = array(
          'label' => __( 'Genre' ),
          'rewrite' => array( 'slug' => 'genre_album' ),
          'hierarchical' => true,
      );
  register_taxonomy( $taxonomy, $object_type, $args );
}
add_action( 'init', 'add_custom_type_init' );
