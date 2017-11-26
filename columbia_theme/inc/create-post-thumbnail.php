<?php

function add_thumbnail()
{
	add_image_size('post-thumbnail', $width = 0, $height = 0, $crop = true);
}
add_action('after_setup_theme', "add_thumbnail");
