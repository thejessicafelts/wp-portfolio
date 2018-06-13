<?php

  /* ===========================================================================
    Removing the WordPress Admin Bar
  =========================================================================== */

  add_filter('show_admin_bar', '__return_false');

  /* ===========================================================================
    Including Custom Styles and Scripts
  =========================================================================== */

  function portfolio_script_enqueue(){

    // Styles
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/vendors/bootstrap/css/bootstrap.min.css', array(), '4.0.0', 'all');
    wp_enqueue_style('bootstrap-grid', get_template_directory_uri() . '/vendors/bootstrap/css/bootstrap-grid.min.css', array(), '4.0.0', 'all');
    wp_enqueue_style('bootstrap-reboot', get_template_directory_uri() . '/vendors/bootstrap/css/bootstrap-reboot.min.css', array(), '4.0.0', 'all');
    wp_enqueue_style('fontawesome', get_template_directory_uri() . '/vendors/fontawesome/css/font-awesome.min.css', array(), '4.7.0', 'all');
    wp_enqueue_style('slick', get_template_directory_uri() . '/vendors/slick/css/slick.css', array(), '', 'all');
    wp_enqueue_style('slick-theme', get_template_directory_uri() . '/vendors/slick/css/slick-theme.css', array(), '', 'all');
    wp_enqueue_style('customstyles', get_template_directory_uri() . '/assets/css/main.css', array(), '1.0.0', 'all');

    // Scripts
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/vendors/bootstrap/js/bootstrap.min.js', array(), '4.0.0', 'all');
    wp_enqueue_script('bootstrap-bundle', get_template_directory_uri() . '/vendors/bootstrap/js/bootstrap.bundle.min.js', array(), '4.0.0', 'all');
    wp_enqueue_script('slick', get_template_directory_uri() . '/vendors/slick/js/slick.min.js', array(), '', 'all');
    wp_enqueue_script('customscripts', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0.0', 'all');

  }
  add_action('wp_enqueue_scripts', 'portfolio_script_enqueue');

  /* ===========================================================================
    Menus
  =========================================================================== */

  function portfolio_theme_setup(){
    add_theme_support('menus');
    register_nav_menu('primary','Primary Navigation');
    register_nav_menu('footer','Footer Navigation');
  }
  add_action('init', 'portfolio_theme_setup');

  /* ===========================================================================
    Theme Support
  =========================================================================== */

  // Custom Background Image
  add_theme_support('custom-background');

  // Custom Header
  $defaults = array(
    'default-image'           => '',
    'width'                   => '',
    'height'                  => '',
    'flex-height'             => '',
    'flex-width'              => '',
    'uploads'                 => '',
    'random-default'          => '',
    'header-text'             => '',
    'default-text-color'      => '',
    'wp-head-callback'        => '',
    'admin-head-callback'     => '',
    'admin-preview-callback'  => '',
  );
  add_theme_support('custom-header');

  // Custom Post Thumbnails
  add_theme_support('post-thumbnails');

  /* ===========================================================================
    Custom Image Sizes
  =========================================================================== */

  // Custom Image Sizes
  function add_image_sizes_setup(){

  }
  add_action('after_setup_theme', 'add_image_sizes_setup');

  /* ===========================================================================
    Sidebars and Widgetized Areas
  =========================================================================== */

  function portfolio_widgets_init(){

  }
  add_action('widgets_init', 'portfolio_widgets_init');

  /* ===========================================================================
     Limiting Excerpt Length
  =========================================================================== */

  // Original Source: https://bavotasan.com/2009/limiting-the-number-of-words-in-your-excerpt-or-content-in-wordpress/
  // With Custom Edits

  function excerpt($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
      array_pop($excerpt);
      $excerpt = implode(" ",$excerpt).'...<br><a class="readmore" href="' . get_permalink() . '">Read More</a>';
    } else {
      $excerpt = implode(" ",$excerpt);
    }
    $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
    return $excerpt;
  }

  function content($limit) {
    $content = explode(' ', get_the_content(), $limit);
    if (count($content)>=$limit) {
      array_pop($content);
      $content = implode(" ",$content).'...<br><a class="readmore" href="' . get_permalink() . '">Read More</a>';
    } else {
      $content = implode(" ",$content);
    }
    $content = preg_replace('/[.+]/','', $content);
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    return $content;
  }

  /* ===========================================================================
     Custom Post Types
  =========================================================================== */

  /* ===========================================================================
     Error Handling
  =========================================================================== */

  if(!defined('ABSPATH')) exit;

  // CUSTOM WRITE LOG
  if (!function_exists('write_log')) {
    function write_log ($log) {
      if (is_array($log) || is_object($log)) {
        error_log(print_r($log,true));
      } else {
        error_log($log);
      }
    }
  }

?>
