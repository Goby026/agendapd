<?php
date_default_timezone_set('America/Lima');
/**
**
**  BY iCODEART
**
**********************************************************************
**                      REDES SOCIALES                            ****
**********************************************************************
**                                                                ****
** FACEBOOK: https://www.facebook.com/icodeart                    ****
** TWIITER: https://twitter.com/icodeart                          ****
** YOUTUBE: https://www.youtube.com/c/icodeartdeveloper           ****
** GITHUB: https://github.com/icodeart                            ****
** TELEGRAM: https://telegram.me/icodeart                         ****
** EMAIL: info@icodeart.com                                       ****
**                                                                ****
**********************************************************************
**********************************************************************
**/

// Datos de conexion a la base de datos local
$servidor='localhost';
$usuario='root';
$pass='';
//$bd='agendacoo';
$bd='wilsonvr_agendapd';

// Datos de conexion a la base de datos del hosting
// $servidor='localhost';
// $usuario='wilsonvr_agenda';
// $pass='WZV@EROUgSn!';
// $bd='wilsonvr_agendapd';


// Nos conectamos a la base de datos
$conexion = new mysqli($servidor, $usuario, $pass, $bd);

// Definimos que nuestros datos vengan en utf8
$conexion->set_charset('utf8');

// verificamos si hubo algun error y lo mostramos
if ($conexion->connect_errno) {
	echo "Error al conectar la base de datos {$conexion->connect_errno}";
}

// Url donde estara el proyecto, debe terminar con un "/" al final
//$base_url="http://localhost/poo_agenda/vistas/";

?>
