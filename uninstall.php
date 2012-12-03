<?php

/*
 * Uninstall Script
 * Change this code for use your plugin implemented class.
 *
 * @author Freelance Soft www.freelance-soft.com
 * @version 0.1
 */

require("classes/fs_generic_wp_plugin.php");
require("classes/hello_world_plugin.php");

if(is_admin()){
    
    if (!defined( 'WP_UNINSTALL_PLUGIN' )){
                exit();
    }
     
    //Plugin name must be same of plugin directory name.
    $plugin_name = basename(__FILE__, '.php');
    $example_plugin = new hello_world_plugin($plugin_name);

    $example_plugin->uninstall();

}

?>