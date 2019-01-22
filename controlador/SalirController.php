<?php 

    class salirController{

        function __construct(){            
        }

        function index(){
            //$query =$this->model_col->get();

            //include_once('vistas/header.php');            
            include_once('vistas/login.php');
            include_once('vistas/footer.php');
        }

        public function salir(){
            unset($_SESSION["poo_agenda=user"]);
            //unset($_SESSION["codiEmpresa"]);
            session_destroy();
            header('Location: index.php?controller=login');
        }

    }
?>