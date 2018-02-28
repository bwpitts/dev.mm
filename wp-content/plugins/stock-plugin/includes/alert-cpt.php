<?php
//registers Alert post type
add_action('init', 'alert_register_post_type');
//registers stock taxonomy
add_action('init', 'stock_register_taxonomy');
//adds meta box
add_action('add_meta_boxes', 'alert_add_meta_box');
//changes the columns in the alerts section
add_filter( 'manage_alert_posts_columns', 'alert_set_meta_columns');
add_action( 'manage_alert_posts_custom_column', 'alert_meta_custom_column', 10,2);
//saves meta data AKA Alert Stock
add_action( 'save_post', 'alert_meta_save_data');

function alert_register_post_type(){
	
	$singular = 'Alert';
	$plural = 'Alerts';
	
	$labels = array(
		'name' => $plural,
		'singular_name' => $singular,
		'add_name' => 'Add New',
		'add_new_item' => 'Add New ' . $singular,
		'edit' => 'Edit',
		'edit_item' => 'Edit ' . $singular,
		'new_item' => 'New ' . $singular,
		'view' => 'View ' . $singular,
		'view_item' => 'View ' . $singular,
		'search_term' => 'Search ' . $plural,
		'parent' => 'Parent ' . $singular,
		'not_found' => 'No ' . $plural,
		'not_found_in_trash' => 'No ' . $plural . ' in Trash',
	);
	
	
	$args = array(
		'labels' => $labels,
		'public' => true,
		'has_archive' => true,
	    'publicly_queryable' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'supports' => array( 
	        	'title', 
	        	'editor',
				'excerpt',
				'thumbnail',
				'revisions',
	        ),
		//'taxomonies' => array('category', 'post_tag'),
		'menu_position' => 10,	    
	    'menu_icon' => 'dashicons-email-alt',
		'exclude_from_search' => false    
	    //'map_meta_cap' => true,
	    // 'capabilities' => array(),
	    
		
	);
	
	register_post_type('alert', $args);
}


function stock_register_taxonomy(){
	$singular = 'Stock';
	$plural = 'Stocks';
	
	$labels = array(
		'search_items' => 'Search ' . $plural,
        'popular_items' => 'Popular ' . $plural,
        'all_items' => 'All ' . $plural,
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => 'Edit ' . $singular,
        'update_item' => 'Update ' . $singular,
        'add_new_item' => 'Add New ' . $singular,
        'new_item_name' => 'New ' . $singular . ' Name',
        'separate_items_with_commas' => 'Separate ' . $plural . ' with commas',
        'add_or_remove_items' => 'Add or remove ' . $plural,
        'choose_from_most_used' => 'Choose from the most used ' . $plural,
        'not_found' => 'No ' . $plural . ' found.',
        'menu_name' => $plural,
	);
	$args = array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => 'true',
		'query_var' => 'true',
		'rewrite' => array('slug', 'stocks')
	);
	
	register_taxonomy('stocks', array('alert'), $args);
	
}


function alert_set_meta_columns( $columns ){
	$newColumns = array();
	$newColumns['title'] = 'Alert';
	$newColumns['message'] = 'Message';
	$newColumns['category'] = 'Category';
	$newColumns['alertstock'] = 'Alert Stock';
	$newColumns['date'] = 'Date';
	return $newColumns;
}

function alert_meta_custom_column( $column, $post_id ){
	switch( $column ){
		case 'message' :
			echo get_the_excerpt();
			break;
		case 'alertstock' :
			$alertstockid = get_post_meta($post_id, '_alert_meta_value_key', true);
			echo $alertstockid;
			break;
	}
}

function alert_add_meta_box(){
	add_meta_box(
		'alert_meta',
		'Alert Meta',
		'alert_meta_callback',
		'alert',
		'side',
		'high'
	);
}

function alert_meta_callback( $post ){
	wp_nonce_field('alert_meta_save_data', 'alert_meta_box_nonce');
	
	$value = get_post_meta( $post->ID, '_alert_meta_value_key', true);
	
	echo '<label for="alert-id">Alert Stock:</label>';
	echo '<input type="text" id="alert-id" name="alert-id" value="' . esc_attr($value) . '" size="25"/>';
	//<input type="button" name="saveAlert" id="saveAlert" value="Save" onClick="saveAlert"/>
	//<label for="alert-id"><strong>Alert Author</strong></label>
	//<input type="text" name="alert-author-id" id="alert-author-id" value=""/>
	//<input type="button" name="saveAlert" id="saveAlert" value="Save" onClick="saveAlert"/>';	
}

function alert_meta_save_data( $post_id ){
	if( ! isset( $_POST['alert_meta_box_nonce'])){
		return;
	}
	
	if( ! wp_verify_nonce( $_POST['alert_meta_box_nonce'], 'alert_meta_save_data')){
		return;
	}
	//checks for autosave
	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
		return;
	} 
	//if can't edit don't save
	if( ! current_user_can( 'edit_post', $post_id)){
		return;
	}
	if( ! isset( $_POST['alert-id'])){
		return;
	}
	
	$my_data = sanitize_text_field($_POST['alert-id']);
	
	update_post_meta($post_id, '_alert_meta_value_key', $my_data);
	
}

