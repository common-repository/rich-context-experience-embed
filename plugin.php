<?php
  require_once('lib/RC_Shortcode.php');
  require_once('lib/RC_Embed_Widget.php');
  require_once('lib/RC_Admin_Pages.php');
  require_once('lib/RC_Utils.php');

   /*
   Plugin Name: Rich Context Experience Embed
   Plugin URI: https://richcontext.com/?from=embed_plugin
   description: Plugin used to embed a Rich Context Experience
   Version: 1.0.4
   Author: richcontext, cwhittl
   Author URI: https://richcontext.com
   License: MIT
   */

   class RC_Embed_Plugin
   {
     function __construct()
     {
       add_action( 'wp_enqueue_scripts', function (){
         wp_register_script( RC_Utils::$shortcodeName, 'https://cdn.richcontext.com/wm-js/v2/embed.js?embed=1&fromplugin=true&wrap=true', [], '1', true);
       });

       // Register the shortcode and admin pages
       add_action( 'init', function() {
         new RC_Shortcode();
         new RC_Admin_Pages(plugin_basename(__FILE__));
       });

       // Register the widget
       add_action( 'widgets_init', function() {
       	register_widget( 'RC_Embed_Widget' );
       });
     }
   }

   new RC_Embed_Plugin();
?>
