<?php 
require_once('modelo/Colaborador.php');
require_once('modelo/Departamento.php');
require_once('modelo/Provincia.php');
require_once('modelo/Distrito.php');

class colaboradorController{

	private $model_c;//modelo de colaborador
	private $model_d;//modelo de departamento
	private $model_p;//modelo de provincia
	private $model_dis;//modelo de distrito

	function __construct(){
        $this->model_c = new Colaborador();
        $this->model_d = new Departamento();
        $this->model_p = new Provincia();
        $this->model_dis = new Distrito();
	}

	function index(){
        $colaboradores =$this->model_c->get();//todos los colaboradores
        $colaborador = $this->model_c->get_by_dni($_SESSION["poo_agenda=user"]);//colaborador logeado
        $departamentos = $this->model_d->get();//todos los departamentos
        $provincias = $this->model_p->get();//todas las provincias
        $distritos = $this->model_dis->get();//todos los distritos
        //include_once('vistas/header.php');
		include_once('vistas/colaboradorView.php');
		include_once('vistas/footer.php');
	}

	//metodo para capturar los datos del formulario y registrarlos en el modelo
	function get_datosColaborador(){
		
		if ($this->subir_imagen() > 0) {
			$time = date('Y-m-d', time());

			$data['codiCola']=$_REQUEST['txtDni'];
			$data['apePaterCola']=$_REQUEST['txtApePaterno'];
			$data['apeMaterCola']=$_REQUEST['txtApeMaterno'];
			$data['nombreCola']=$_REQUEST['txtNomCola'];
			$data['dniCola']=$_REQUEST['txtDni'];
			$data['fechaNaciCola']=$_REQUEST['fechaNac'];
			$data['correoCorpoCola']=$_REQUEST['txtCorreoCorpo'];
			$data['correoPersoCola']=$_REQUEST['txtCorreoPersonal'];
			$data['celuCorpoCola']=$_REQUEST['txtCelCorpo'];
			$data['celuPersoCola']=$_REQUEST['txtCelPersonal'];
			$data['codiDepar']=$_REQUEST['cmbDepartamento'];
			$data['codiProvin']=$_REQUEST['cmbProvincia'];
			$data['codiDistri']=$_REQUEST['cmbDistrito'];
			$data['direcCola']=$_REQUEST['txtDireccion'];
			$data['fotoCola']=$_FILES['txtImg']['name'];//nombre del archivo que se subirá
			$data['fechaRegisCola']= $time;
			$data['contraCola']=$_REQUEST['txtPass'];
			$data['estado']=1;

			$this->model_c->create($data);
			header("Location:index.php?controller=colaborador");
		}
	}

	function subir_imagen(){
		$num = 0;
		$imgSize = $_FILES['txtImg']['size'];
		$imgType = $_FILES['txtImg']['type'];
		if ($imgSize <= 1000000) {
			if ($imgType == 'image/jpeg' || $imgType == 'image/jpg' || $imgType == 'image/png' || $imgType == 'image/gif') {
				$nomImagen = $_FILES['txtImg']['name'];
				$carpeta_destino = $_SERVER['DOCUMENT_ROOT']."/poo_agenda/style/img/colaboradores/";
				move_uploaded_file($_FILES['txtImg']['tmp_name'],$carpeta_destino.$nomImagen);
				$num++;
			}else{
				echo "El formato ingresado no esta permitido, solo imagenes JPEG, JPG, PNG, GIF";
			}
		}else{
			echo "El tamaño de la imagen es muy grande, max 1mb";
		}
		return $num;
	}

	function update_estado(){

	}

}
?>