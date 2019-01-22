<?php
session_start();
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

// Incluimos nuestro archivo config
include '../controlador/config.php';

if (!isset($_SESSION["agendaCol"])) {
    $codiCola = $_SESSION["poo_agenda=user"];
}else{
    $codiCola = $_SESSION["agendaCol"];
}


// Sentencia sql para traer los eventos desde la base de datos
$sql="SELECT *
        FROM tactividad a
        INNER JOIN tacticola ac ON a.id = ac.id
        WHERE ac.codiCola = '$codiCola' AND ac.estado = 1";
//$sql="SELECT * FROM tactividad WHERE codiCola = '001'";

// Verificamos si existe un dato
if ($conexion->query($sql)->num_rows)
{
    // creamos un array
    $datos = array();

    //guardamos en un array multidimensional todos los datos de la consulta
    $i=0;

    // Ejecutamos nuestra sentencia sql
    $e = $conexion->query($sql);

    while($row=$e->fetch_array()) // realizamos un ciclo while para traer los eventos encontrados en la base de dato
    {
        // Alimentamos el array con los datos de los eventos
        $datos[$i] = $row;
        $i++;
    }

    // Transformamos los datos encontrado en la BD al formato JSON
        echo json_encode(
                array(
                    "success" => 1,
                    "result" => $datos
                )
            );

    }
    else
    {
        // Si no existen eventos mostramos este mensaje.
        echo "No hay datos"; 
    }


?>
