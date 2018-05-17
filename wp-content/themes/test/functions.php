<?php

if (function_exists('add_theme_support'))
{
    add_theme_support('post-thumbnails');
}

function html5blank_header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

    	wp_register_script('conditionizr', get_template_directory_uri() . '/js/lib/conditionizr-4.3.0.min.js', array(), '4.3.0'); // Conditionizr
        wp_enqueue_script('conditionizr');

        wp_register_script('modernizr', get_template_directory_uri() . '/js/lib/modernizr-2.7.1.min.js', array(), '2.7.1'); // Modernizr
        wp_enqueue_script('modernizr');

        wp_register_script('html5blankscripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0'); // Custom scripts
        wp_enqueue_script('html5blankscripts');
    }
}

function html5blank_styles()
{
    wp_register_style('normalize', get_template_directory_uri() . '/normalize.css', array(), '1.0', 'all');
    wp_enqueue_style('normalize');

    wp_register_style('html5blank', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('html5blank');
}

add_action( 'wp_enqueue_scripts', 'html5blank_header_scripts' );
add_action( 'wp_enqueue_scripts', 'html5blank_styles' );

// Import Project custom post type
require_once('post-types/project.php');

function custom_excerpt_length( $length ) {
    return 19;
}

add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// Changing excerpt more
function new_excerpt_more($more) {
  global $post;
  remove_filter('excerpt_more', 'new_excerpt_more'); 
  return '';
}
add_filter('excerpt_more','new_excerpt_more',11);

?>
