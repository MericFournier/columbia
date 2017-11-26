<?php
function my_connection_types() {
	p2p_register_connection_type( array(
		'name' => 'album_to_artist',
		'from' => 'artiste',
		'to' => 'album'
	) );
	p2p_register_connection_type( array(
		'name' => 'post_to_artist',
		'from' => 'artiste',
		'to' => 'post'
	) );
}
add_action( 'p2p_init', 'my_connection_types' );

