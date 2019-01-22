<?php 
require_once('modelo/Area.php');

    class areaController{
        
        private $model_a;

        function __construct(){
            $this->model_a = new Area();
        }

        function index(){
            $areas = $this->model_a->get();

            //include_once('vistas/header.php');
            include_once('vistas/areaView.php');
            include_once('vistas/footer.php');
        }

    }
?>