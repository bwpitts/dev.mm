<?php

/*
Plugin Name: Stock Widget
Plugin URI: dev.moneymorning.com/ben
Description: Get up to date information on a stock ticker.
Version: 1.0
Author: Ben Pitts
Author URI: dev.moneymorning.com/ben
License: none
*/


//loads scripts
require_once(plugin_dir_path(__FILE__).'/includes/stock-plugin-scripts.php');

//load class
require_once(plugin_dir_path(__FILE__).'/includes/stock-plugin-class.php');

//load shortcode
require_once(plugin_dir_path(__FILE__).'/includes/stock-plugin-shortcode.php');

//load Alert cpt
require_once(plugin_dir_path(__FILE__).'/includes/alert-cpt.php');

//load meta
//require_once(plugin_dir_path(__FILE__).'/includes/alert-fields.php');

//register widget
function register_stockwidget(){
	register_widget('Stock_Widget');
}

//hook function
add_action('widgets_init', 'register_stockwidget');