<?php
/*
Plugin Name: Sin Ruta
Plugin URI: http://www.bitcuantico.com
Description: Repara las Im&aacute;genes "rotas", que se provocaron al realizar un cambio de direcci&oacute;n en el Sitio.
Version: 1.0
Author: Jonathan Ramirez
Author URI: http://www.bitcuantico.com
License: Creative Commons 2.5 México - 2012
*/

function ruta(){
	global $wpdb; 
	$table_name = $wpdb->prefix . "ruta";
	$ruta= $wpdb->get_var("SELECT ruta FROM $table_name ORDER BY RAND() LIMIT 0, 1; " );
	include('Archivos/validacion.php');		
}
function ruta_instala(){
	global $wpdb; 
	$table_name= $wpdb->prefix . "ruta";
   $sql = " CREATE TABLE $table_name(
		id mediumint( 9 ) NOT NULL AUTO_INCREMENT ,
		ruta tinytext NOT NULL ,
		PRIMARY KEY ( `id` )	
	) ;";
	$wpdb->query($sql);
	$sql = "INSERT INTO $table_name (ruta) VALUES ('Hola Mundo! n_n');";
	$wpdb->query($sql);
}
function ruta_desinstala(){
	global $wpdb; 
	$table_name = $wpdb->prefix . "ruta";
	$sql = "DROP TABLE $table_name";
	$wpdb->query($sql);
}	
function ruta_panel(){
	include('Archivos/panel.php');			
	$table_name = $wpdb->prefix . "ruta";
	if(isset($_POST['nueva'])){
		include('Archivos/validacion.php');
	}
}
function ruta_add_menu(){	
	if (function_exists('add_options_page')) {
		//add_menu_page
		add_options_page('Sin Ruta', 'Sin Ruta', 8, basename(__FILE__), 'ruta_panel');
	}
}
if (function_exists('add_action')) {
	add_action('admin_menu', 'ruta_add_menu'); 
}
add_action('activate_SinRuta/SinRuta.php','ruta_instala');
add_action('deactivate_SinRuta/SinRuta.php', 'ruta_desinstala');
 
?>