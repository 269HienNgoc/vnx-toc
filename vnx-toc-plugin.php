<?php

/**
 * Plugin Name: VNX TOC
 * Description: Insert Table Of Contents - VNX
 * Version: 1.0.0
 */

/**ADD CUSTOMS DISPLAY TOC*/
require_once(plugin_dir_path(__FILE__) . '/inc/vnx-customs-display-toc.php');
require_once(plugin_dir_path(__FILE__) . '/inc/data.php');


if (!class_exists('Vnx_Toc')) {
  class Vnx_Toc
  {

    function __construct()
    {
      $this->define_plugin_hooks();
    }
    /**
     * HANDLE HOOK ACTION
     */
    private function define_plugin_hooks()
    {
      add_action('admin_menu', array($this, 'menu_page'));
      add_action('wp_enqueue_scripts', array($this, 'vnx_enqueue_script'), 999999);
      add_action('admin_enqueue_scripts', array($this, 'custom_color_picker'), 999999);
      add_action('wp_default_scripts', 'wp_default_custom_scripts');
      add_action('admin_init', array($this, 'add_setting_page'));
      add_action('init', array($this, 'vnx_customs_dasboard_toc'));
      add_action('init', array($this, 'shortcode_toc'));
    }
    /**
     * The code run when activate plugin
     */
    function activate()
    {
      $this->menu_page();
      flush_rewrite_rules();
    }
    /**
     * The code run when deactivate plugin
     */
    function deactivate()
    {
      flush_rewrite_rules();
    }
    /**
     * Function add menu admin Vnx TOC
     */
    function menu_page()
    {
      add_menu_page('Vnx-Toc Admin Options', 'Vnx TOC', 'manage_options', 'work-plugin-options', array($this, 'config_page_general'), 'dashicons-ellipsis', 2);
      add_submenu_page('work-plugin-options', 'Display', 'Display Option', 'manage_options', 'display-work-plugin-options', array($this, 'config_display'));
    }
    /**
     * Function customs box TOC
     */
    function vnx_customs_dasboard_toc()
    {
      require_once(plugin_dir_path(__FILE__) . '/inc/vnx-customs-admin-toc.php');
      new VnxCustomContent();
    }
    /**
     * Function call shortcode
     */
    function shortcode_toc()
    {
      require_once(plugin_dir_path(__FILE__) . '/inc/vnx-shortcode-toc.php');
    }
    /**
     * Function add setting filed in setting page display and Toc 
     */
    function add_setting_page()
    {
      require_once(plugin_dir_path(__FILE__) . '/inc/vnx-admin-setting.php');
      require_once(plugin_dir_path(__FILE__) . '/inc/vnx-display-setting.php');
    }

    /**
     * Function run when click button "Save Change" and save data in wp-option.php.
     */
    function config_page_general()
    {
      require_once(plugin_dir_path(__FILE__) . '/inc/admin-form-page.php');
    }
    function config_display()
    {
      require_once(plugin_dir_path(__FILE__) . '/inc/display-form-page.php');
    }

    /**
     * Function run css vs js
     */
    function vnx_enqueue_script()
    {
      wp_enqueue_style('style_TOC', plugins_url('./assets/css/vnx-toc.css', __FILE__));
      wp_enqueue_script('script_TOC', plugins_url('./assets/js/vnx-toc.js', __FILE__));
    }
    function custom_color_picker()
    {
      wp_enqueue_script('wp-color-picker');
      wp_enqueue_style('wp-color-picker');
    }
  }

  $vnx_toc = new Vnx_Toc();
  //activation
  register_activation_hook(__FILE__, array($vnx_toc, 'activate'));
  //deactivation
  register_deactivation_hook(__FILE__, array($vnx_toc, 'deactivate'));
}
