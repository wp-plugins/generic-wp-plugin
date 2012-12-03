<?php

require_once("fs_translator.php");

/**
 * Not change this code, extends this with your class.
 *
 * @author Freelance Soft www.freelance-soft.com
 * @version 0.1.1
 */
if (!class_exists('fs_generic_wp_plugin')) {

    abstract class fs_generic_wp_plugin {
        protected $plugin_path; 
        protected $plugin_url;        
        protected $translator;
        protected $slug;
        
        public function getPluginPath(){
            return $this->plugin_path;
        }
        
        public function getPluginUrl(){
            return $this->plugin_url;
        }
        
        public function getIl8nDomain(){
            return $this->il8n_domain;
        }
        
        public function translate($text){            
            return $this->translator->translate($text);
        }
        
        /**
         * @param $title The title of your plugin (Displayed on browser title)
         * @param $menu_title Menu title (Displayed on dashboard menu)
         * @param $capability The capability required for this menu to be displayed to the user. More info: codex.wordpress.org/Roles_and_Capabilities
         * @param $menu_slug Unique ID for your menu
         * @param $menu_position Position of Menu. Default 3. More info: codex.wordpress.org/Function_Reference/add_menu_page
         * @param $icon Icon of Menu. Default: images/menu-icon.png
         */        
        public function registerMenu($title,$menu_title,$capability,$menu_slug,$menu_position=false,$icon="images/menu-icon.png"){
          if($menu_position){                        
            add_menu_page($title,$menu_title, 
                  $capability,$menu_slug, 
                  array($this,'optionsIndex'), 
                  $this->plugin_url.$icon, $menu_position);
          } else {
             add_menu_page($title,$menu_title, 
                  $capability,$menu_slug, 
                  array($this,'optionsIndex'), 
                  $this->plugin_url.$icon); 
          }
        }
        
        /**         
         * @param $parent_slug Slug ID of Parent Menu
         * @param $title The title of Admin Page (Displayed on browser title)
         * @param $menu_title SubMenu title (Displayed on dashboard menu)
         * @param $capability The capability required for this menu to be displayed to the user. More info: codex.wordpress.org/Roles_and_Capabilities
         * @param $menu_slug Unique ID for your submenu
         * @param $method Admin page method name of your implementation class
         */ 
        public function registerSubMenu($parent_slug, $title, $menu_title, $capability, $menu_slug, $method){
            add_submenu_page($parent_slug, 
                             $title,$menu_title, 
                             $capability, $menu_slug, 
                             array($this,$method));
        }
        
        /**
         * Register a shortcode callback function
         * @param String $shortcode The shortcode name
         * @param String $method Method name on your implemented plugin class
         */        
        public function registerShortcode($shortcode, $method){
            
            add_shortcode($shortcode, array($this, $method));
        }
        
        public function installDB(){
            global $wpdb;
            if(file_exists($this->plugin_path."/sql/plugin_tables.sql")){
                $sql = file_get_contents($this->plugin_path."/sql/plugin_tables.sql");
                $sql = str_replace("%%WP_PREFIX%%",$wpdb->prefix,$sql);   
                
                require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
                dbDelta($sql);
            }
        }
        
        public function uninstallDB(){
            global $wpdb;
            
            echo "Eliminando plugin...  ";
            
            if(file_exists($this->plugin_path."/sql/plugin_tables_uninstall.sql")){
                $sql = file_get_contents($this->plugin_path."/sql/plugin_tables_uninstall.sql");
               echo $sql = str_replace("%%WP_PREFIX%%",$wpdb->prefix,$sql);   
                
                require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
                
                $wpdb->query($sql);
                $wpdb->print_error();
            } 
        }
        
        
        public function activate(){     
            $this->admin_init();
            $this->installDB();
        }
        
        public function deactivate(){
            $this->admin_init();
        }
        
        public function uninstall(){
            if (!defined( 'WP_UNINSTALL_PLUGIN' )){
                exit();
            }
            
            $this->admin_init();
            $this->uninstallDB();
        }
        
        public function optionsIndex(){
            echo "<h2>".$this->translate("Plugin Admin")."</h2>";
            echo "<p>".$this->translate("Implements this page on your plugin class -> method: \"optionsIndex\"")."</p>";
        }
        
        private function init(){             
            $this->plugin_path=dirname(dirname(__FILE__));
            $this->plugin_url=WP_PLUGIN_URL.'/'.$this->slug.'/';
            $this->translator = new fs_translator('il8n-'.$this->slug, $this->slug);
        }
        
        public function admin_init(){
            $this->init();
        }
        
        public function web_init(){
            $this->init();
        }
    }

}
?>