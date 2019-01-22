<?php 
require_once('modelo/Sistema.php');

class sistemaController{

	private $model_s;
	private $model_p;

	function __construct(){
		$this->model_s=new Sistema();
	}

	function index(){
		$query =$this->model_s->get();
		//include_once('vistas/header.php');
		include_once('vistas/sistemaView.php');
		include_once('vistas/footer.php');
	}

	function sistema(){
		$data=NULL;
		if(isset($_REQUEST['id'])){
			$data=$this->model_s->get_id($_REQUEST['id']);
		}
		$query=$this->model_s->get();
		//include_once('vistas/header.php');
		include_once('vistas/sistemaView.php');
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
			$this->model_s->create($data);
		}

		if($_REQUEST['id']!=""){
			$date=$_REQUEST['id'];
			$this->model_s->update($data,$date);
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