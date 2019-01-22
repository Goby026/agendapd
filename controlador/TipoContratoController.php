<?php 
    require_once('modelo/TipoContrato.php');

    class tipoContratoController{

        private $model_tc;

        function __construct(){
            $this->model_tc=new TipoContrato();
        }

        function index(){
            $tipoContratos =$this->model_tc->get();

            //include_once('vistas/header.php');
            include_once('vistas/tipoContratoView.php');
            include_once('vistas/footer.php');
        }
        
        function estudiante(){
            $data=NULL;
            if(isset($_REQUEST['id'])){
                $data=$this->model_tc->get_id($_REQUEST['id']);    
            }
            $query=$this->model_tc->get();
            include_once('vistas/header.php');
            include_once('vistas/estudiante.php');
            include_once('vistas/footer.php');
        }

        function get_datosE(){

            
            $data['id']=$_REQUEST['txt_id'];
            $data['cedula']=$_REQUEST['txt_cedula'];
            $data['nombre']=$_REQUEST['txt_nombre'];
            $data['apellidos']=$_REQUEST['txt_apellidos'];
            $data['promedio']=$_REQUEST['txt_promedio'];
            $data['edad']=$_REQUEST['txt_edad'];
            $data['fecha']=$_REQUEST['txt_fecha'];

            if ($_REQUEST['id']=="") {
                $this->model_tc->create($data);
            }
            
            if($_REQUEST['id']!=""){
                $date=$_REQUEST['id'];
                $this->model_tc->update($data,$date);
            }
            
            header("Location:index.php");

        }

        function confirmarDelete(){

            $data=NULL;

            if ($_REQUEST['id']!=0) {
               $data=$this->model_tc->get_id($_REQUEST['id']);
            }

            if ($_REQUEST['id']==0) {
                $date['id']=$_REQUEST['txt_id'];
                $this->model_tc->delete($date['id']);
                header("Location:index.php");
            }

            include_once('vistas/header.php');
            include_once('vistas/confirm.php');
            include_once('vistas/footer.php');

        }


    }
?>