<?php 
require_once('modelo/Calendario.php');
require_once('modelo/TipoActividad.php');
require_once('modelo/Colaborador.php');
require_once('modelo/Actividad.php');
require_once 'modelo/ActiCola.php';

class calendarioController{

	private $model_c;//modelo de calendario
	private $model_col;//modelo de colaborador
	private $model_ta;//modelo tipo de actividad
	private $model_ac;//modelo Actividad
	private $model_actiCola;//modelo tabla intermedia

	function __construct(){
		$this->model_c= new Calendario();
		$this->model_ta= new TipoActividad();
		$this->model_col= new Colaborador();
		$this->model_ac= new Actividad();
		$this->model_actiCola = new ActiCola();
	}

	function index(){
		if (isset($_SESSION['agendaCol'])) {
			unset($_SESSION['agendaCol']);
		}

        //$query =$this->model_c->get();//obtiene los eventos
        $tipoActividades = $this->model_ta->get();//obtiene los tipos de actividad
        @$colaborador = $this->model_col->get_by_dni($_SESSION["poo_agenda=user"]);
        @$cargoCola = $this->model_col->getCargoCola($_SESSION["poo_agenda=user"]);
        //obtiene los datos de colaborador segun el inicio de sesion
        @$actividades = $this->model_ac->getActividadesPorColaborador($_SESSION["poo_agenda=user"]);

            //include_once('vistas/header.php');
		include_once('vistas/calendario.php');
		include_once('vistas/footer.php');
	}

	function get_datosC(){

		$fecha = date('Y-m-d', time());
		$hora = date('G:i:s', time());

		// Recibimos el fecha de inicio y la fecha final desde el form
		$inicio = $this->_formatear($_REQUEST['from']);
        // y la formateamos con la funcion _formatear

		$final  = $this->_formatear($_REQUEST['to']);
        // Recibimos el fecha de inicio y la fecha final desde el form

		$inicio_normal = $_REQUEST['from'];
        // y la formateamos con la funcion _formatear
		$final_normal  = $_REQUEST['to'];

        // Recibimos los demas datos desde el form
		$titulo = $this->evaluar($_REQUEST['title']);

        // y con la funcion evaluar
		$body = $_REQUEST['event'];

		//para leer el mensaje sin etiquetas html usamos strip_tags();
		$notaActi = strip_tags($body);

        // reemplazamos los caracteres no permitidos
		$clase  = $this->evaluar($_REQUEST['imporActi']);

		$data['codiTipoActi']=$_REQUEST['codiTipoActi'];		
		$data['title']=$titulo;
		$data['body']=$body;
		$data['url']='';
		$data['class']=$clase;
		$data['start']=$inicio;
		$data['end']=$final;
		$data['inicio_normal']=$inicio_normal;
		$data['horaIniActi']=$hora;
		$data['final_normal']=$final_normal;
		$data['horaFinActi']=NULL;
		$data['notaActi']=$notaActi;
		$data['imporActi']=$_REQUEST['imporActi'];
		$data['aviActi']=NULL;
		if ($_REQUEST['ubiActi']!="") {
			$data['ubiActi']= $_REQUEST['ubiActi'];
		} else {
			$data['ubiActi']= $_REQUEST['cmbUbiActi'];
		}
		$data['codiEstaActi']=2;
		$data['porcenAvanActi']=0;
		if (isset($_REQUEST['txtColAsig'])) {
			$data['codiColaAsig']=$_REQUEST['txtColAsig'];//si estoy asignando a varios
		}else{
			$data['codiColaAsig']=$_REQUEST['codiCola'];//si yo mismo me asigno
		}
		
		$data['fullDayActi']=0;
		$data['estado']=1;
		$data['leido'] = NULL;

		$this->model_c->create($data);//OK
		$id = $this->model_c->get_last_id();
		$this->model_c->set_link_event($id);

		//registrar la actividad en la tabla tActiCola
		
		$actiCola['codiCola'] = $_REQUEST['codiCola'];
		$actiCola['id'] = $id;
		$actiCola['codiEstaActi'] = 2;
		$actiCola['porcenAvanActi'] = 0;
		$actiCola['estado'] = 1;
		$this->model_actiCola->create($actiCola);
		//$this->enviarCorreo($data, $colaborador['correoCorpoCola']);
		
		header("Location:index.php?controller=calendario");
	}

	function actualizarAvance(){

		if ($_REQUEST['valorAvance']>=0 && $_REQUEST['valorAvance']<100) {
			$codiEstaActi = 2;
		}else{
			$codiEstaActi = 3;
		}

		$porcentaje['porcenAvanActi'] = $_REQUEST['valorAvance'];
		$porcentaje['id'] = $_REQUEST['txtIdActividad'];
		$porcentaje['codiEstaActi'] = $codiEstaActi;
		$this->model_ac->updatePorcentaje($porcentaje);

		header("Location:index.php?controller=calendario");

	}

	// Evaluar los datos que ingresa el usuario y eliminamos caracteres no deseados.
    function evaluar($valor){
        $nopermitido = array("'",'\\','<','>',"\"");
        $valor = str_replace($nopermitido, "", $valor);
        return $valor;
    }

	// Formatear una fecha a microtime para añadir al evento, tipo 1401517498985.
    function _formatear($fecha)
    {
        return strtotime(substr($fecha, 6, 4)."-".substr($fecha, 3, 2)."-".substr($fecha, 0, 2)." " .substr($fecha, 10, 6)) * 1000;
    }

    //metodo para verificar si el colaborador ya tiene tareas asignadas segun el horario que se quiera asignar
    function getCalendario(){
  		// $data['inicio'] = $this->_formatear($_REQUEST['from']);
		// $data['fin'] = $this->_formatear($_REQUEST['to']);
		// $data['codiCola'] = '78987898';

		// $this->model_c->verificar_agenda($data);
    }

}
?>