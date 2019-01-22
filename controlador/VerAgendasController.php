<?php 
    require_once('modelo/Colaborador.php');
    require_once('modelo/Actividad.php');
    require_once('modelo/Area.php');

    class VerAgendasController{

        public $model_col;
        private $model_area;
        private $model_ac;

        function __construct(){
            $this->model_col=new Colaborador();
            $this->model_area= new Area();
            $this->model_ac= new Actividad();
        }

        function index(){
            if (!isset($_REQUEST['codiArea']) || !isset($_REQUEST['codiEmpre'])) {
                $data['codiArea'] = 1;
                $data['codiEmpre'] = 1;
            }else{
                $data['codiArea'] = $_REQUEST['codiArea'];
                $data['codiEmpre'] = $_REQUEST['codiEmpre'];
            }

            $areas = $this->model_area->get();

            if ($_REQUEST['codiArea'] == 5) {
                $colaboradores =$this->model_col->getColCargo();
            }else{
                $colaboradores =$this->model_col->getByArea($data);
            }
            //include_once('vistas/header.php');
            include_once('vistas/verAgendasView.php');
            include_once('vistas/footer.php');
        }

        function verAgendaColaborador(){
            if (!isset($_REQUEST['codiCola'])) {
                $codiCola = 1;
            }else{
                $codiCola = $_REQUEST['codiCola'];
                $_SESSION['agendaCol'] = $codiCola;
            }
            $cola =$this->model_col->get_by_dni($codiCola);
            @$actividades = $this->model_ac->getActividadesPorColaborador($codiCola);
            @$cargo = $this->model_col->getCargoCola($codiCola);
            //include_once('vistas/header.php');
            include_once('vistas/calendario.php');
            include_once('vistas/footer.php');
        }

    }
?>