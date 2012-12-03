<?php
/*
Plugin Name: FS Generic Object Oriented WP Plugin
Plugin URI: http://www.freelance-soft.com/productos/wp/generic-plugin/ 
Version: 0.1
Description: A generic Object Oriented WP Plugin for developer use.
Author: Freelance Soft
Author URI: http://www.freelance-soft.com
*/
/*  Copyright 2012  Freelance Soft  (email: info@freelance-soft.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
/*
 *  For debug uncomment these lines.
 */
//error_reporting(E_ALL);
//ini_set("display_errors", 1);

require("classes/fs_generic_wp_plugin.php");
require("classes/hello_world_plugin.php");


//Plugin name must be same of plugin directory name.
$plugin_name = basename(__FILE__, '.php');

// Code for Admin Panel
if(is_admin()){
   
   $example_plugin = new hello_world_plugin($plugin_name,"admin");  
    
  //Wordpress Plugin activation/deactivation/uninstall callbacks
  register_activation_hook(__FILE__,array($example_plugin,'activate'));
  register_deactivation_hook(__FILE__, array($example_plugin, 'deactivate'));
} 

// Code for website
else {
   $example_plugin = new hello_world_plugin($plugin_name,"web");
}

?>