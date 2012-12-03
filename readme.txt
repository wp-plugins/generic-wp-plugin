=== Plugin Name ===
Generic WP Plugin

Contributors: freelancesoft
Plugin URI: http://www.freelance-soft.com/productos/wp/generic-plugin/ 
Tags: develop, plugin, oriented object
Requires at least: 3.3
Tested up to: 3.4
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Generic Object-Oriented Wordpress plugin for developer use.

== Description ==

Files:
   /classes/fs_generic_wp_plugin.php
     Abstract class with support for:
       * Activate, deactivate and uninstall plugin.
       * Internalization.
       * Menu and submenu registry for wordpress dashboard.
       * Shortcode support.
  
   /classes/fs_translator.php
     Internalization class.

   /classes/hello_world_plugin.php
     Class example with implemented fs_generic_wp_plugin.

   /lang
     .po files for internalization use.

   /sql
     .sql files for create and delete DB tables:
       *plugin_tables.sql: this script will be executed on plugin activation 
       *plugin_tables_uninstall.sql: this script will be executed on plugin uninstall,
                                     for example: delete plugin tables.

   /generic-wp-plugin.php
      Main script plugin.

   /uninstall.php
      This script will be executed on plugin uninstall.

== Installation ==
This plugin is only for developer use, you must upload this files to
/wp-content/plugins/ wordpress directory and modify for develop your plugin.

How create new plugin:       

You must follow this steps:
1- Rename generic-wp-plugin and generic-wp-plugin.php main script with you plugin name.

2- Extend fs_generic_wp_plugin abstract class or modify example class hello_world_plugin.

3- Change uninstall.php and Main script (generic-wp-plugin.php, you renamed script) 
   for created class implemented on step 2.

4- Change script under /sql directory if your plugin use own database tables or
   simply leave these clean.
   Table names in these scripts must contain tag %%WP_PREFIX%% with will be instanciated
   on run-time with wordpress database prefix.

== Support ==

For more information visit this url:
www.freelance-soft.com/productos/wordpress/generic-plugin
or send an email to info@freelance-soft.com

== Changelog ==

= 0.1 =
* First version with basic plugin implementation on abstract class fs_generic_wp_plugin