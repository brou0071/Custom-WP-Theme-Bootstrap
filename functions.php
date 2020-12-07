<?php

function followdave_theme_support(){
    //adds dynamic title tag
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');

}

add_action('after_setup_theme','followdave_theme_support');


function followdave_menus(){
    $locations = array(

        'primary' => "Left Sidebar Menu",
        'footer' => "Footer Menu Items",
    );

    register_nav_menus($locations);
}

add_action('init','followdave_menus');


function followdave_register_styles(){

    $version = wp_get_theme()->get( 'Version' );

    wp_enqueue_style('followdave-style', get_template_directory_uri() . "/style.css", array('followdave-bootstrap'), $version, 'all');
    wp_enqueue_style('followdave-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css", array(), '4.4.1', 'all');
    wp_enqueue_style('followdave-fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array(), '5.13.0', 'all');
}

add_action('wp_enqueue_scripts', 'followdave_register_styles');


function followdave_register_scripts(){

    wp_enqueue_script('followdave-jquery', "https://code.jquery.com/jquery-3.4.1.slim.min.js", array(), '3.4.1', true);
    wp_enqueue_script('followdave-popper', "https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js", array(), '1.16.0', true);
    wp_enqueue_script('followdave-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js", array(), '4.4.1', true);
    wp_enqueue_script('followdave-main', get_template_directory_uri() . "/assets/js/main.js", array('followdave-bootstrap'), $version, 'all');

}

add_action('wp_enqueue_scripts', 'followdave_register_scripts');


function followdave_widget_areas(){

    register_sidebar(
        array(
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '<ul class="social-list list-inline py-3 mx-auto">',
            'after_widget' => '</ul>',
            'name' => 'Sidebar Area',
            'id' => 'sidebar-1',
            'description' => 'Sidebar Widget Area'
        )
    );

    register_sidebar(
        array(
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '<ul class="meta-list list-inline py-3 mx-auto">',
            'after_widget' => '</ul>',
            'name' => 'Sidebar Area 2',
            'id' => 'sidebar-2',
            'description' => 'Sidebar Widget Area 2'
        )
    );
    
    register_sidebar(
        array(
            'before_title' => '',
            'after_title' => '',
            'before_widget' => '',
            'after_widget' => '',
            'name' => 'Footer Area',
            'id' => 'footer-1',
            'description' => 'Footer Widget Area'
        )
    );
}

add_action('widgets_init', 'followdave_widget_areas');

//get current year shortcode
function currentYear(){
    return date('Y');
}
add_shortcode( 'year', 'currentYear' );

?>