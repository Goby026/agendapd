<?php
date_default_timezone_set('America/Lima');
    // require_once('bd/conexion.php');
    // require_once('controlador/estudiante_controller.php');

    // $controller= new estudiante_controller();

    // if(!empty($_REQUEST['m'])){
    //     $metodo=$_REQUEST['m'];
    //     if (method_exists($controller, $metodo)) {
    //         $controller->$metodo();
    //     }else{
    //         $controller->index();
    //     }
    // }else{
    //     $controller->index();
    // }
ob_start();
session_start();

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');

    //CONFIGURACION GLOBAL
require_once "./config/globales.php";

    //BASE PARA LOS CONTROLADORES
require_once "./core/ControladorBase.php";

    //FUNCIONES PARA EL CONTROLADOR FRONTAL
require_once "./core/ControladorFrontal.func.php";

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio</title>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style/css/menu.css">
    <link rel="stylesheet" type="text/css" href="style/css/calendar.css">
    <link rel="stylesheet" type="text/css" href="style/css/main.css">
    <script type="text/javascript" src="style/js/es-ES.js"></script>
    <script src="style/js/jquery.min.js"></script>
    <script src="style/js/moment.js"></script>
    <script src="style/js/bootstrap.min.js"></script>
    <script src="style/js/bootstrap-datetimepicker.js"></script>
    <link rel="stylesheet" href="style/css/bootstrap-datetimepicker.min.css" />
    <script src="style/js/bootstrap-datetimepicker.es.js"></script>
    <script type="text/javascript" src="style/js/menu.js"></script>
    <script src="style/js/underscore-min.js"></script>
    <script src="style/js/calendar.js"></script>
    <script src="style/js/jquery.quicksearch.js"></script>
    <script src="style/js/push.min.js"></script>
    
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <link rel="shortcut icon" href="style/img/favicon.png" type="image/png">
    <!-- <script src="//cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script> -->
    <script type="text/javascript" src="style/js/ckeditor/ckeditor.js"></script>
    <!-- angular JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
    <script type="text/javascript" src="app/MisActividadesCtrl.js"></script>

</head>
<body style="background-image: url('style/img/background.png');">
    <?php
    //CARGAR CONTROLADORES Y ACCIONES
    if (isset($_GET['controller'])) {
        $controllerObj = cargarControlador($_GET["controller"]);
        lanzarAccion($controllerObj);
    }else{
        $controllerObj = cargarControlador(CONTROLADOR_DEFECTO);
        lanzarAccion($controllerObj);
    }
    ob_end_flush();
    ?>
</body>
</html>