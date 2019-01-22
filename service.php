<?php
	ob_start();
	session_start();
	//CONFIGURACION GLOBAL
	require_once "config/globales.php";
	//BASE PARA LOS CONTROLADORES
	require_once "core/ControladorBase.php";
	//FUNCIONES PARA EL CONTROLADOR FRONTAL
	require_once "core/ControladorFrontal.func.php";
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