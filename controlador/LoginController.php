<?php 
    require_once('modelo/Colaborador.php');
    require_once('modelo/TipoActividad.php');
    require_once('modelo/Actividad.php');

    class loginController{

        public $model_col;
        private $model_p;

        function __construct(){
            $this->model_col=new Colaborador();
            $this->model_ta= new TipoActividad();
            $this->model_ac= new Actividad();
        }

        function index(){
            //$query =$this->model_col->get();

            //include_once('vistas/header.php');            
            include_once('vistas/login.php');
            include_once('vistas/footer.php');
        }

        public function access(){

            $usuario = $_REQUEST['txtUsuario'];
            $pass=$_REQUEST['txtPass'];

            $save = $this->model_col->validarAcceso($usuario, $pass);
            //$save = $colaborador->get();

            if ($save) {

                $tipoActividades = $this->model_ta->get();//obtiene los tipos de actividad
                $colaborador = $this->model_col->get_by_dni($usuario);
                //obtiene los datos de colaborador segun el inicio de sesion
                $actividades = $this->model_ac->getActividadesPorColaborador($usuario);
                //$codiLogin = sha1($user);
                $_SESSION["poo_agenda=user"]=$usuario;
                @$cargoCola = $this->model_col->getCargoCola($_SESSION["poo_agenda=user"]);
                //include_once('vistas/header.php');
                //include_once('vistas/sideBar.php');
                include_once('vistas/calendario.php');
                include_once('vistas/footer.php');

                // echo "Datos colaborador ID: ".$save['codiCola'];
                // echo "<br>";
                // echo "Nombres y apellidos: ".$save['apePaterCola']." - ".$save['apeMaterCola']." - ".$save['nombreCola'];
                
            }else{
                header('Location: ../index.php?controller=login');
            }
        }

    }
?>