<?php 
// Add scripts

function sw_add_scripts(){
	//add main css
	wp_enqueue_style('sw_add_style', plugins_url().'/stock-plugin/CSS/style.css');
	//add main js
	wp_enqueue_script('sw_add_script', plugins_url().'/stock-plugin/JS/main.js');
}

add_action('wp_enqueue_scripts', 'sw_add_scripts');
?>