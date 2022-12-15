<?php

add_action('admin_enqueue_scripts', function() {
	
	wp_enqueue_script( 'pfw-admin', get_stylesheet_directory_uri() . '/js/pcswc-admin.js', array('jquery'), filemtime(get_stylesheet_directory_uri() . '/js/pcswc-admin.js'), true);

    wp_localize_script( 'pfw-admin', 'main_vars', array(
        'search' => __('Cerca', 'pcswc'),
    ));

}, 100);