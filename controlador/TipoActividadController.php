<?php 
require_once('modelo/tipoActividad.php');
require_once('modelo/Colaborador.php');

class tipoActividadController{

	private $model_ta;
	private $model_c;
	private $model_p;

	function __construct(){
		$this->model_ta=new TipoActividad();
		$this->model_c = new Colaborador();
	}

	function index(){
		$query =$this->model_ta->get();
		$colaborador = $this->model_c->get_by_dni($_SESSION["poo_agenda=user"]);//colaborador logeado
		//include_once('vistas/header.php');
		include_once('vistas/tipoActividadView.php');
		include_once('vistas/footer.php');
	}

	function tipoActividad(){
		$data=NULL;
		if(isset($_REQUEST['id'])){
			$data=$this->model_ta->get_id($_REQUEST['id']);
		}
		$query=$this->model_ta->get();
		//include_once('vistas/header.php');
		include_once('vistas/sistemaView.php');
		include_once('vistas/footer.php');
	}

	function get_datosTA(){

		$time = date('Y-m-d', time());

		$data['codiTipoActi']=$_REQUEST['txtCodiTipoActividad'];
		$data['nombreTipoActi']=$_REQUEST['txtNombre'];
		$data['nombreBreveTipoActi']=$_REQUEST['txtNombreBreve'];
		$data['colorActi']=$_REQUEST['txtColorActividad'];
		$data['estaActi']=1;

		if ($_REQUEST['id']=="") {
			$this->model_ta->create($data);
		}

		if($_REQUEST['id']!=""){
			$date=$_REQUEST['id'];
			$this->model_ta->update($data,$date);
		}

		header("Location:index.php?controller=tipoActividad");

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