<?php
function ajout_custom_type_news() {
$post_type = "news";
$labels = array(
      'name'               => 'news',
      'singular_name'      => 'news',
      'all_items'          => 'Tous les news',
      'add_new'            => 'Ajouter un news',
      'add_new_item'       => 'Ajouter un nouveau news',
      'edit_item'          => "Editer le news",
      'new_item'           => 'Nouveau news',
      'view_item'          => "Voir le news",
      'search_items'       => 'Chercher un news',
      'not_found'          => 'Pas de résultat',
      'not_found_in_trash' => 'Pas de résultat',
      'parent_item_colon'  => 'news parent :',
      'menu_name'          => 'news',
  );

  $args = array(
      'labels'              => $labels,
      'hierarchical'        => true,
      'supports'            => array( 'title','thumbnail','editor', 'excerpt', 'revisions'),
      'public'              => true,
      'show_ui'             => true,
      'show_in_menu'        => true,
      'menu_position'       => 0,
      'menu_icon'           => 'dashicons-welcome-write-blog',
      'show_in_nav_menus'   => true,
      'publicly_queryable'  => true,
      'exclude_from_search' => false,
      'has_archive'         => false,
      'query_var'           => true,
      'can_export'          => true,
      /*'capabilities' => array(
                        'edit_post'          => 'edit_movie',
                        'read_post'          => 'read_movie',
                        'delete_post'        => 'delete_movie',
                        'edit_posts'         => 'edit_movies',
                        'edit_others_posts'  => 'edit_others_movies',
                        'publish_posts'      => 'publish_movies',
                        'read_private_posts' => 'read_private_movies',
                        'create_posts'       => 'edit_movies',
                      ),*/
      'rewrite'             => array( 'slug' => $post_type )
  );

  register_post_type($post_type, $args );

  $taxonomy="genre";
  $object_type = array("artiste");
  $args = array(
          'label' => __( 'Genre' ),
          'rewrite' => array( 'slug' => 'genre' ),
          'hierarchical' => true,
      );
  register_taxonomy( $taxonomy, $object_type, $args );

  $taxonomy="pays";
  $object_type = array("artiste");
  $args = array(
          'label' => __( 'Pays' ),
          'rewrite' => array( 'slug' => 'pays' ),
          'hierarchical' => false,
      );
  register_taxonomy( $taxonomy, $object_type, $args );
}
add_action( 'init', 'ajout_custom_type_news' );
