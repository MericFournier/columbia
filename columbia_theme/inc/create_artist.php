<?php
function ajout_custom_type_init() {
$post_type = "artiste";
$labels = array(
      'name'               => 'Artistes',
      'singular_name'      => 'Artiste',
      'all_items'          => 'Tous les artistes',
      'add_new'            => 'Ajouter un artiste',
      'add_new_item'       => 'Ajouter un nouvel artiste',
      'edit_item'          => "Editer l'artiste'",
      'new_item'           => 'Nouvel artiste',
      'view_item'          => "Voir l'artiste",
      'search_items'       => 'Chercher un artiste',
      'not_found'          => 'Pas de résultat',
      'not_found_in_trash' => 'Pas de résultat',
      'parent_item_colon'  => 'Artiste parent :',
      'menu_name'          => 'Artistes',
  );

  $args = array(
      'labels'              => $labels,
      'hierarchical'        => false,
      'supports'            => array( 'title','thumbnail','editor', 'excerpt', 'revisions'),
      'public'              => true,
      'show_ui'             => true,
      'show_in_menu'        => true,
      'menu_position'       => 0,
      'menu_icon'           => 'dashicons-businessman',
      'show_in_nav_menus'   => true,
      'publicly_queryable'  => true,
      'exclude_from_search' => false,
      'has_archive'         => false,
      'query_var'           => true,
      'can_export'          => true,
      'rewrite'             => array( 'slug' => $post_type )
  );

  register_post_type($post_type, $args );

  $taxonomy="pays";
  $object_type = array("artiste");
  $args = array(
          'label' => __( 'Pays' ),
          'rewrite' => array( 'slug' => 'pays' ),
          'hierarchical' => false,
      );
  register_taxonomy( $taxonomy, $object_type, $args );

  $taxonomy="genre";
  $object_type = array("artiste");
  $args = array(
          'label' => __( 'Genre' ),
          'rewrite' => array( 'slug' => 'genre' ),
          'hierarchical' => true,
      );
  register_taxonomy( $taxonomy, $object_type, $args );

}
add_action( 'init', 'ajout_custom_type_init' );
