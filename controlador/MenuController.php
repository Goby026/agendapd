<?php 
    //require_once('modelo/Colaborador.php');

    class menuController{


        function __construct(){
            //$this->model_e=new estudiante_model();
        }

        function index(){
            //$query =$this->model_e->get();

            include_once('vistas/header.php');
            include_once('vistas/menu.php');
            include_once('vistas/footer.php');
        }
        
        function estudiante(){
            $data=NULL;
            if(isset($_REQUEST['id'])){
                $data=$this->model_e->get_id($_REQUEST['id']);
            }
            $query=$this->model_e->get();
            include_once('vistas/header.php');
            include_once('vistas/estudiante.php');
            include_once('vistas/footer.php');
        }

        public function access(){

            $colaborador = new Colaborador();

            $data['dni']=$_REQUEST['txtUsuario'];
            $data['pass']=$_REQUEST['txtPass'];

            $save = $colaborador->ValidaAcceso($data);
            if ($save > 0) {
                $codiLogin = sha1($user);
                $_SESSION["poo_agenda=user"]=$codiLogin;
                include_once('vistas/header.php');
                include_once('vistas/estudiante.php');
                include_once('vistas/footer.php');
            }
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
                $this->model_e->create($data);
            }
            
            if($_REQUEST['id']!=""){
                $date=$_REQUEST['id'];
                $this->model_e->update($data,$date);
            }
            
            header("Location:index.php");

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


    }
?>