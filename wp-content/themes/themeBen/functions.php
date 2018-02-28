<?php

register_sidebar(array(
	'name' => '1st Right Sidebar',
	'id' => 'first-right-sidebar',
	'description' => 'The top bar',
	'before_widget' => '<div>',
	'after_widget' => '</div>',
));

register_sidebar(array(
	'name' => '2nd Right Sidebar',
	'id' => 'second-right-sidebar',
	'description' => 'The second bar',
	'before_widget' => '<div>',
	'after_widget' => '</div>',
));

function custom_new_menu(){
	register_nav_menu('my-top-menu',__( 'My Top Menu'));
}
add_action( 'init', 'custom_new_menu');