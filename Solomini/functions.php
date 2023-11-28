<?php

/**
 * Theme setup function to support various features
 */
function solo_theme_support()
{
    add_theme_support('title_tag');
}

add_action('after_setup_theme', 'solo_theme_support');

/**
 * Register navigation menus
 */
function solo_menu()
{
    $locations = array(
        'primary' => "Right top nav menu",
        'second_menu' => 'Center menu'
    );

    register_nav_menus($locations);
}

add_action('init', 'solo_menu');

/**
 * Enqueue styles for the theme
 */
function solo_register_styles()
{
    $version = wp_get_theme()->get("Version");
    wp_enqueue_style('solo-bootstrap', get_template_directory_uri() . "/dependencies/bootstrap.min.css", array(), "5.3.2", "all");
    wp_enqueue_style("solo-bootstrap-icons", "https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css", array(), "1.11.1", "all");
    wp_enqueue_style("solo-style", get_template_directory_uri() . "/style.css", array(), $version, 'all');
}

add_action('wp_enqueue_scripts', 'solo_register_styles');

/**
 * Enqueue scripts for the theme
 */
function solo_register_scripts()
{
    wp_enqueue_script('solo-bootstrap', get_template_directory_uri() . '/dependencies/bootstrap.min.js', array(), '5.3.2');
    wp_enqueue_script('solo-jquery', get_template_directory_uri() . '/dependencies/jquery.min.js', array(), '3.7.1');
}

add_action('wp_enqueue_scripts', 'solo_register_scripts');

/**
 * Add theme support for post thumbnails
 */
add_theme_support('post-thumbnails');

/**
 * Filter to customize the length of the excerpt
 *
 * @param int $length The number of words to display in the excerpt
 * @return int Modified length of the excerpt
 */
function wpdocs_custom_excerpt_length($length)
{
    return 30;
}

add_filter('excerpt_length', 'wpdocs_custom_excerpt_length', 999);

/**
 * Enqueue all JavaScript from script.js into the wp_footer
 */
function all_javascripts()
{
    wp_enqueue_script('no-spex-footer-js', get_template_directory_uri() . '/script.js', array('jquery'), null, true);
}

add_action('wp_enqueue_scripts', 'all_javascripts');

/**
 * Theme Check - Add support for title tag and automatic feed links
 */
add_theme_support('title-tag');
add_theme_support('automatic-feed-links');

$link_args = array(
    //
);
wp_link_pages($link_args);

/**
 * Customize search form
 *
 * @param string $form The default search form HTML
 * @return string Modified search form HTML
 */
function customize_search_form($form)
{
    $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url('/') . '">
                <div>
                    <label class="screen-reader-text" for="s">' . __('Search for:') . '</label>
                    <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="' . esc_attr__('Search...') . '">
                    <input type="submit" id="searchsubmit" value="' . esc_attr__('Search') . '">
                </div>
            </form>';

    return $form;
}
add_filter('get_search_form', 'customize_search_form');