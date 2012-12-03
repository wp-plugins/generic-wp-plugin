<?php
/**
 * Example of a WP plugin implementation.
 *
 * @author Freelance Soft www.freelance-soft.com
 * @version 0.1
 */
class hello_world_plugin extends fs_generic_wp_plugin{
    
    public function createMenus(){
        
        $this->registerMenu($this->translate("Example Plugin"), 
                            $this->translate("Menu Title"), 0, 
                            "generic-plugin-menu");
        $this->registerSubMenu("generic-plugin-menu", 
                            $this->translate("Admin page 1"), 
                            $this->translate("Submenu 1"), 0, "generic-plugin-submenu-1", 
                            "adminPage1");
    }
    
    public function adminPage1(){
        echo "<h2>".$this->translate("Admin Page 1")."</h2>";
        
    }
    
    /*
     * public function optionsIndex(){
     * 
     * }
     */
    
    public function hello_world($atts, $content = null){
        echo '<div style="padding: 5px; border: 1px solid #CC0000; color: #CC0000">';
        echo $this->translate("Hello World from Generic Plugin!").'</div>';
    }
    
    public function web_init(){
        parent::web_init();
        
        $this->registerShortcode("hello_world_generic_plugin", "hello_world");
    }
    
    public function admin_init(){
        parent::admin_init();
    }

    public function __construct($name, $context="") {
        $this->slug = $name;
   
        if($context == 'admin'){
            add_action('plugins_loaded', array($this, 'admin_init'));
        } else {
            add_action('plugins_loaded', array($this, 'web_init'));
        }        
              
        //Attach action: create menu on Wordpress Dashboard
        add_action('admin_menu', array($this,'createMenus'));       
    }
}

?>