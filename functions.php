<?php

/*
 * My First theme
 */

add_theme_support("title-tag");

// theme css and jquery file calling
function all_css_js_file_calling()
{
    wp_enqueue_style('first-theme-style', get_stylesheet_uri());
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), '5.0.2', 'all');
    wp_enqueue_style('custom', get_template_directory_uri() . '/css/custom.css', array(), '1.0.0', 'all');

    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array('jquery'), '5.0.2', true);
    wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true);
}
;

add_action('wp_enqueue_scripts', 'all_css_js_file_calling');

// theme functon 
function first_logo_image_customizar_register($wp_customize)
{
    $wp_customize->add_section('first_header_area', array(
        'title' => __('Header Area', 'first-theme'),
        'description' => 'If you intersted to update your header area, you can do it here.',
    ));

    $wp_customize->add_setting('logo_setting', array(
        'default' => get_bloginfo('template_directory') . '/img/logo.png',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'logo_setting', array(
        'label' => 'Logo upload',
        'setting' => 'logo_setting',
        'section' => 'first_header_area'
    )));
}
;


function first_theme_google_fonts()
{
    wp_enqueue_style(
        'first_theme_google_fonts',
        'https://fonts.googleapis.com/css2?family=Tektur:wght@400..900&display=swap',
        false
    );
}

add_action('wp_enqueue_scripts', 'first_theme_google_fonts');

add_action('customize_register', 'first_logo_image_customizar_register');

// wordpress menu register
register_nav_menu( 'primay', __('Primary Manu', 'first-theme'));