<?php
if(defined('ABSPATH')){
	require_once(ABSPATH.'wp-load.php');
}else{
	require_once('../wp-load.php'); 
}

global $wpdb;
$nuevaurl = $_POST["nueva"]; 
$viejaurl = $_POST["antigua"]; 
$prefijo= $wpdb->prefix . 'posts';

/*	::Configuración Manual::
//Intruduzca la Nueva URL o Ruta del Sitio.
$nuevaurl="/hola";

//Intruduzca la Anterior URL o Ruta del Sitio.
$viejaurl="/wordpress";

//Intruduzca la Anterior URL o Ruta del Sitio.
$prefijo="wp_posts";
*/

$cambiar_url = 'UPDATE '.$prefijo.' SET post_content = REPLACE(post_content, "'.$viejaurl.'", "'.$nuevaurl.'")';
$resultado = $wpdb->query( $cambiar_url );

if (!$resultado) {
 echo '<br/><hr width="40" align="left"><font face="verdana">';
 echo '<h1>Ouch!, ha Ocurrido un Error :(</h1>Me temo que no se han cambiado ';
 echo "las URL's, verifique que escribio correctamente todos los Datos.</font>";
 } else {
 echo '<br/><hr width="40" align="left"><font face="verdana"><h1>&Eacute;xito! n_n</h1>';
 echo "Las URL's de las Im&aacute;genes han sido Cambiadas.</font>";
 }
?>