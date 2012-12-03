<?php
/**
 * Internalization plugin support
 *
 * @author Freelance Soft www.freelance-soft.com
 * @version 0.1
 */
if (!class_exists('fs_translator')) {
class fs_translator {
    protected $il8n_domain; //for internalization desambiguation 
    protected $lang_path;
    
    public function translate($text){
        return __($text,$this->il8n_domain);
    }
    
    private function loadLang(){        
	load_plugin_textdomain($this->il8n_domain, false, $this->lang_path);
    }
    
    public function __construct($domain, $slug) {
        $this->il8n_domain = $domain;
        $this->lang_path = $slug . "/lang/";
        
        $this->loadLang();
    }
}
}
?>