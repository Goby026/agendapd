<?php
	class ControladorBase{
		public function __construct(){
			require_once 'Conectar.php';
			require_once 'EntidadBase.php';
			require_once 'ModeloBase.php';
			//INCLUIR OTRO MODELOS

			foreach (glob("model/*.php") as $file) {
				require_once $file;
			}
		}

		//PLUGINS Y FUNCIONALIDADES
		//RENDERIZACION DE VISTAS
		public function view($vista, $datos){
			foreach ($datos as $id_assoc => $valor) {
				${$id_assoc} = $valor;
			}
			require_once("core/AyudaVistas.php");
			$helper = new AyudaVistas();
			require_once 'view/'.$vista.'View.php';

		}
		public function redirect($controlador=CONTROLADOR_DEFECTO, $accion=ACCION_DEFECTO){
			header("Location: index.php?controller=".$controlador.'&action='.$action);
			// echo "<script>";
			// echo "window.location='index.php?controller=".$controlador."&action=".$action."'";
			// echo "</script>";
		}
		//METODOS PARA LOS CONTROLADORES
	}
?>