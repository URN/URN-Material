<?php

add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style('main-style', get_stylesheet_uri());
    wp_enqueue_style('google-fonts', 'http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400italic,600,600italic,700,700italic|Raleway:300');

    wp_enqueue_script('main', get_template_directory_uri() . '/js/nav-overflow.js', array('jquery'), false, true);
});

?>
