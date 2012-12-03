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

Plugin genérico para el desarrollo de plugins orientados a objeto.

== Description ==

Contenido:
   /classes/fs_generic_wp_plugin.php
     Clase abstracta con soporte para:
       * Activar, Desactivar, Desinstalar el plugin.
       * Múltiples Idiomas.
       * Registrar Menus y submenus en el panel de wordpress.
       * Registrar shortcode.
  
   /classes/fs_translator.php
     Clase para de Internalization.

   /classes/hello_world_plugin.php
     Implementación de fs_generic_wp_plugin de ejemplo.

   /lang
     Archivos .po para internalization.

   /sql
     Archivos .sql para crear y eliminar tablas de la BD para el uso del plugin:
       *plugin_tables.sql: script que será ejecutado cada vez que se active el plugin
       *plugin_tables_uninstall.sql: script que será ejecutado al eliminar el plugin,
                                     por ejemplo para eliminar las tablas creadas.

   /generic-wp-plugin.php
      Script principal del plugin.

   /uninstall.php
      Script a ser ejecutado cuando se elimina el plugin.

== Installation ==
Este plugin es para desarrollo, debe subir el zip o los archivos al directorio
/wp-content/plugins/ de su wordpress y modificarlos para desarrollar el suyo.

Modo de Uso:       
Para implementar un nuevo plugin se deben seguir los siguientes pasos:
1- Renombrar el directorio generic-wp-plugin y el script contenido generic-wp-plugin 
   con el mismo nombre que desee para su plugin.

2- Extender la clase fs_generic_wp_plugin como en el ejemplo de hello_world_plugin
   o renombre esta para utilizarla directamente.

3- Modifique los script uninstall.php y el script principal (generic-wp-plugin) 
   que acaba de renombrar para instanciar su nueva implementación de plugin.

4- Modifique los scripts en /sql si va a utilizar tablas propias para su plugin
   o dejelos vacios.
   Los nombres de las tablas deben precederse con el tag %%WP_PREFIX%% que será
   instanciado al momento de ejecución con el prefijo utilizado por Wordpress.

== Support ==

Para más información dirígase al sitio web
www.freelance-soft.com/productos/wordpress/generic-plugin
o escríbanos a info@freelance-soft.com

== Changelog ==

= 0.1 =
* Primer versión con la implementación básica de un plugin de WP en la clase abstracta fs_generic_wp_plugin