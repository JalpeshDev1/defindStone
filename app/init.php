<?php

class THEME_INIT
{
  /**
   * Init
   */
  public static function init()
  {
    self::includes();
    self::init_hooks();
  }

  /**
   * Include core files
   */
  public static function includes()
  {
    include_once __DIR__ . '/functions/register-menus.php';
    include_once __DIR__ . '/functions/custom-nav-walker.php';
    include_once __DIR__ . '/functions/site-options.php';
    include_once __DIR__ . '/functions/oo-images.php';
    include_once __DIR__ . '/functions/filters.php';
    include_once __DIR__ . '/functions/cpt-testimonials.php';
    include_once __DIR__ . '/functions/cpt-products.php';
    include_once __DIR__ . '/functions/cpt-projects.php';
  }

  /**
   * Hook into actions and filters.
   *
   */
  public static function init_hooks()
  {
    //Actions
    add_action('init', [__CLASS__, 'theme_init']);
    add_action('after_setup_theme', [__CLASS__, 'setup_theme']);
    add_action('wp_head', [__CLASS__, 'dev_vite_scripts']);
    add_action('wp_head', [__CLASS__, 'include_ajax_url'], 2);
    add_action('wp_enqueue_scripts', [__CLASS__, 'theme_enqueue_scripts']);
    add_action('gform_enqueue_scripts', [__CLASS__, 'gform_enqueue_scripts']);
    add_action('body_class', [__CLASS__, 'body_class']);

    //Filters
    remove_filter('template_redirect', 'redirect_canonical');
    add_filter('xmlrpc_enabled', '__return_false');
    add_filter('upload_mimes', [__CLASS__, 'upload_mimes']);
    add_filter('use_block_editor_for_post', '__return_false', 10);
  }

  /**
   * Theme Setup
   */
  public static function setup_theme()
  {
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
  }

  /**
   * Theme init
   */
  public static function theme_init()
  {
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'feed_links_extra');
    remove_action('wp_head', 'feed_links');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'index_rel_link');
    remove_action('wp_head', 'parent_post_rel_link');
    remove_action('wp_head', 'start_post_rel_link');
    remove_action('wp_head', 'wp_shortlink_wp_head');
    remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
    remove_action('wp_head', 'wp_generator');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('welcome_panel', 'wp_welcome_panel');

    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');

    add_filter('emoji_svg_url', '__return_false');

    wp_deregister_script('wp-embed');

    //remove content as we are using flexible blocks
    //remove_post_type_support('page', 'editor');

    //add post type support
    add_post_type_support('page', 'excerpt');
  }

  /**
   * Add custom body class
   */
  public static function body_class($classes)
  {
    return $classes;
  }

  /**
   * Allow upload mimes types
   *
   */
  public static function upload_mimes($mimes)
  {
    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    $mimes['doc'] = 'application/msword';

    unset($mimes['exe']);

    return $mimes;
  }

  /**
   * Enqueue scripts
   *
   */
  public static function theme_enqueue_scripts()
  {
    //Deregister wp scripts and styles
    wp_deregister_style('wp-block-library');
    wp_deregister_style('wp-block-library-theme');
    //wp_deregister_style( 'wc-blocks-style' );
    wp_deregister_style('classic-theme-styles');
    //wp_deregister_style( 'global-styles-inline-css' );

    //load theme style
    wp_enqueue_style('main', get_template_directory_uri() . '/style.css?ver=1.0.0');

    if (defined('WP_DEVELOPMENT_MODE') && WP_DEVELOPMENT_MODE === true) {
      return;
    }

    if (is_admin()) {
      return;
    }

    //load main scripts and styles
    $manifest = json_decode(file_get_contents(get_template_directory() . '/dist/manifest.json'), true);

    if (is_array($manifest)) {
      foreach ($manifest as $key => $output) {
        if (str_contains($key, '.scss')) {
          wp_enqueue_style('theme', get_template_directory_uri() . '/dist' . '/' . $output['file'], [], null);
        }

        if (str_contains($key, '.js')) {
          wp_enqueue_script('theme', get_template_directory_uri() . '/dist' . '/' . $output['file'], [], null, true);
        }
      }
    }
  }

  /**
   * Add ajax url to body
   */
  public static function include_ajax_url()
  {
    ?>
    <script type="type/javascript">
              var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
            </script>
    <?php
  }

  /**
   * Gravity Forms scripts
   */
  public static function gform_enqueue_scripts()
  {
    wp_deregister_style('gravity_forms_theme_reset');
    wp_deregister_style('gravity_forms_theme_foundation');
    wp_deregister_style('gravity_forms_theme_framework');
    wp_deregister_style('gravity_forms_orbital_theme');
  }

  /**
   * Load vite scripts in development mode
   *
   */
  public static function dev_vite_scripts()
  {
    if (defined('WP_DEVELOPMENT_MODE') && WP_DEVELOPMENT_MODE === true) { ?>
      <script type="module" src="http://localhost:5173/@vite/client"></script>
      <script type="module" crossorigin src="http://localhost:5173/resources/js/app.js"></script>
      <link rel="stylesheet" href="http://localhost:5173/resources/sass/app.scss" />
    <?php }
  }


}

THEME_INIT::init();
