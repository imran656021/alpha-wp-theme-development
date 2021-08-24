<?php 
function aquala_theme_setup(){
    load_theme_textdomain("aquala");
    add_theme_support("post-thumbnails");
    add_theme_support("title-tag");
}
add_action("after_setup_theme", "aquala_theme_setup");

function aquala_assets(){
    wp_enqueue_style('bootstrap', '//cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css');
    wp_enqueue_style('style-css', get_stylesheet_uri());
    wp_enqueue_style('main-css', get_theme_file_uri('assets/main.css'));
    wp_enqueue_script('main-css', get_theme_file_uri('assets/main.js'), array('jquery'), time(), true);
    
}
add_action("wp_enqueue_scripts", "aquala_assets");