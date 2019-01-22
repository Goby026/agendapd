<?php 

    class PruebaController{

        function __construct(){            
        }

        function index(){
            //$query =$this->model_col->get();

            //include_once('vistas/header.php');            
            include_once('vistas/prueba.php');
            include_once('vistas/footer.php');
        }

    }
?>