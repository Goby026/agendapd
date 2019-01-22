<?php 
require_once('modelo/Actividad.php');
require_once('modelo/Colaborador.php');

class historialController{

	private $model_a;//modelo de actividad
	private $model_c;//modelo de colaborador

	function __construct(){
		$this->model_a =new Actividad();
		$this->model_c = new Colaborador();
	}

	function index(){
		//$query =$this->model_a->get();
		//include_once('vistas/header.php');
		include_once('vistas/historialView.php');
		include_once('vistas/footer.php');
	}

	//metodo para solicitar el historial al modelo, de un determinado colaborador
	function histoCola(){
		$codiCola = $_REQUEST['txtCodiCola'];
		$col = $this->model_c->get_by_dni($codiCola);//colaborador seleccionado
		$his =$this->model_a->getByColaborator($codiCola);
		//$query=$this->model_a->get();

		//print_r($historial);

		include_once('vistas/historialView.php');
		include_once('vistas/footer.php');
	}

	function get_datosS(){

		$time = date('Y-m-d', time());

		$data['codiSistema']=$_REQUEST['txtCodiSistema'];
		$data['nombreSiste']=$_REQUEST['txtNombre'];
		$data['nombreBreveSiste']=$_REQUEST['txtNombreCorto'];
		$data['fechaCreaSiste']=$time;
		$data['estaSiste']=1;

		if ($_REQUEST['id']=="") {
			$this->model_a->create($data);
		}

		if($_REQUEST['id']!=""){
			$date=$_REQUEST['id'];
			$this->model_a->update($data,$date);
		}

		header("Location:index.php?controller=sistema");

	}

	function confirmarDelete(){

            $data=NULL;

            if ($_REQUEST['id']!=0) {
               $data=$this->model_e->get_id($_REQUEST['id']);
            }

            if ($_REQUEST['id']==0) {
                $date['id']=$_REQUEST['txt_id'];
                $this->model_e->delete($date['id']);
                header("Location:index.php");
            }

            include_once('vistas/header.php');
            include_once('vistas/confirm.php');
            include_once('vistas/footer.php');

        }

	function update_estado(){

	}

}
?>