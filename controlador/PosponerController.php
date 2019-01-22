<?php 
require_once('modelo/Colaborador.php');
require_once('modelo/Calendario.php');
require_once('modelo/ActiCola.php');
require_once('modelo/Actividad.php');
    class PosponerController{
        private $model_cal;
        private $model_actiCola;
        private $model_actividad;

        function __construct(){
            $this->model_cal = new Calendario();
            $this->model_actiCola = new ActiCola();
            $this->model_actividad = new Actividad();
        }

        function index(){
            //$query =$this->model_col->get();

            //include_once('vistas/header.php');
            include_once('vistas/posponerView.php');
            include_once('vistas/footer.php');
        }

        //el inicio y final deben terner formato microtime
        function posponer(){
            $inicio_mt = $this->_formatear($_REQUEST['from']);
            $fin_mt = $this->_formatear($_REQUEST['to']);
            $id = $_REQUEST['id'];
            $data['inicio_normal']=$_REQUEST['from'];
            $data['final_normal']=$_REQUEST['to'];
            $data['start']=$inicio_mt;
            $data['end']=$fin_mt;
            // $data['motivo']
            $data['id'] = $id;

            $this->model_cal->posponer($data);

            header('Location: index.php?controller=calendario');
        }

        function eliminar(){
            // Eliminar evento
            if (isset($_POST['eliminar_evento'])){
                $data['id']  = $this->evaluar($_POST['idActi']);
                $this->model_actividad->quitarActiCola($data);
                $this->model_actiCola->updateActiCola($data);                
            }
        }

        // Evaluar los datos que ingresa el usuario y eliminamos caracteres no deseados.
        function evaluar($valor)
        {
            $nopermitido = array("'",'\\','<','>',"\"");
            $valor = str_replace($nopermitido, "", $valor);
            return $valor;
        }

    // Formatear una fecha a microtime para añadir al evento, tipo 1401517498985.
        function _formatear($fecha)
        {
            return strtotime(substr($fecha, 6, 4)."-".substr($fecha, 3, 2)."-".substr($fecha, 0, 2)." " .substr($fecha, 10, 6)) * 1000;
        }

        function motivoCancelar(){

            include_once('vistas/posponerView.php');
            include_once('vistas/footer.php');
        }

    }
?>