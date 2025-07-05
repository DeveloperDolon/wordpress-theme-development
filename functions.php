<?php

/*
* My First theme
*/

add_theme_support("title-tag");

// theme css and jquery file calling
function all_css_js_file_calling() {
    wp_enqueue_style('first-theme-style', get_stylesheet_uri());
    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), '4.0.0', 'all');
    wp_register_style('custom', get_template_directory_uri() . '/css/custom.css', array(), '1.0.0', 'all');

    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap', get_template_directory().'/js/bootstrap.js', array(), '4.0.0', 'true');
    wp_enqueue_script('main', get_template_directory().'/js/main.js', array(), '1.0.0', 'true');
};

add_action('wp_enqueue_scripts', 'all_css_js_file_calling');