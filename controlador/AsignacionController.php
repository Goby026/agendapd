<?php 
require_once('modelo/Colaborador.php');
require_once('modelo/Area.php');
require_once('modelo/TipoActividad.php');

    class asignacionController{

        private $model_c;
        private $model_a;
        private $model_ta;

        function __construct(){
            $this->model_c = new Colaborador();
            $this->model_a = new Area();
            $this->model_ta = new TipoActividad();
        }

        function index(){
            $colaboradores =$this->model_c->get();
            $areas = $this->model_a->get();
            $tipoActividades = $this->model_ta->get();

            //include_once('vistas/header.php');
            include_once('vistas/asignacionView.php');
            include_once('vistas/footer.php');
        }

        function filtrarArea(){
            $areas = $this->model_a->get();
            @$data['codiArea'] = $_REQUEST['codiArea'];
            @$data['codiEmpre'] = $_REQUEST['codiEmpre'];
            if ($data['codiArea'] == 5) {
                $colaboradorArea = $this->model_c->get();
            }else{
                $colaboradorArea = $this->model_c->getByArea($data);
            }
            //$tipoActividades = $this->model_ta->get();

            //include_once('vistas/header.php');
            include_once('vistas/asignacionView.php');
            include_once('vistas/footer.php');
        }

    }
?>