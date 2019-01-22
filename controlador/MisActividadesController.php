<?php 

require_once('modelo/Colaborador.php');
require_once('modelo/Actividad.php');
require_once('modelo/ActiCola.php');

    class MisActividadesController{
        private $model_a;//modelo de actividad
        private $model_c;//modelo de colaborador
        private $model_actiCola;//modelo de colaborador

        function __construct(){
            $this->model_a = new Actividad();
            $this->model_c = new Colaborador();
            $this->model_actiCola = new ActiCola();
        }

        function index(){
                $this->mostrarActividades();
                include_once('vistas/MisActividadesView.php');
                include_once('vistas/footer.php');
        }

        public function mostrarActividades(){
            @$data['inicio'] = $_REQUEST['inicio'];
            @$data['final'] = $_REQUEST['final'];
            @$data['title'] = $_REQUEST['title'];
            @$data['codiCola'] = $_SESSION["poo_agenda=user"];
            $col = $this->model_c->get_by_dni($data['codiCola']);//colaborador seleccionado
            $his =$this->model_a->getRangoActividadesPorColaborador($data);

            include_once('vistas/MisActividadesView.php');
            include_once('vistas/footer.php');
        }

        public function verParticipantes(){
            // @$data['title'] = $_REQUEST['title'];
            // @$data['ubiActi'] = $_REQUEST['ubiActi'];
            // @$data['horaIniActi'] = $_REQUEST['horaIniActi'];
            @$data['id'] = $_REQUEST['id'];
            @$participantes = $this->model_a->getParticipantes($data);
            @$actividad = $this->model_a->get_id($data);

            include_once('vistas/MisActividadesView.php');
            include_once('vistas/footer.php');
        }

        //método para obtener los participantes de una actividad para trabajarlo con AngularJS
        public function getParticipantes(){
            // $servicio = new Servicio();
            // $result = $servicio->getServicioCliente($_SESSION['codiSesion']);
            // echo $result;

            @$data['title'] = $_REQUEST['title'];
            @$data['ubiActi'] = $_REQUEST['ubiActi'];
            @$data['horaIniActi'] = $_REQUEST['horaIniActi'];
            @$data['id'] = $_REQUEST['id'];
            @$participantes = $this->model_a->get_Participantes($data);
            @$actividad = $this->model_a->get_id($data);
            echo $participantes;
        }
        //FIN metodo para obtener los participantes de una actividad para trabajarlo con AngularJS

        public function getActividad(){
            @$data['id'] = $_REQUEST['id'];
            @$actividad = $this->model_a->getByid($data);
            echo $actividad;
        }

        public function quitarColaborador(){
            $datos['id'] = $_REQUEST['txt_codiActi'];
            $datos['txt_codiCola'] = $_REQUEST['txt_codiCola'];
            $this->model_actiCola->deleteActiCola($datos);

            @$participantes = $this->model_a->getParticipantes($datos);
            @$actividad = $this->model_a->get_id($datos);

            include_once('vistas/MisActividadesView.php');
            include_once('vistas/footer.php');
        }

        public function modificarDetalleActi(){
            $datos['title'] = $_REQUEST['txt_Titulo'];
            $datos['inicio_normal'] = $_REQUEST['txt_Inicio'];
            $datos['final_normal'] = $_REQUEST['txt_Final'];
            $datos['start'] = $this->_formatear($_REQUEST['txt_Inicio']);
            $datos['end'] = $this->_formatear($_REQUEST['txt_Final']);
            $datos['body'] = $_REQUEST['txt_NotaActi'];
            $datos['ubiActi'] = $_REQUEST['txt_Lugar'];
            $datos['id'] = $_REQUEST['txt_idActi'];

            $id = $datos['id'];
            if($_POST['datos_cola_asig'] != 'noAsigno'){
                if ($this->model_a->modificar_miActividad($datos)==1) {
                    $error = 1;
                    $correos = unserialize(base64_decode(stripslashes($_POST['codiCola'])));
                    $datos['cuerpo'] = "<table class='table'>
                                    <tbody>
                                      <tr class='info'>
                                        <td><h4>TITULO</h4></td>
                                        <td>".$datos['title']."</td>
                                      </tr>
                                      <tr class='info'>
                                        <td><h4>ASIGNADO POR</h4></td>
                                        <td>".$_POST['datos_cola_asig']."</td>
                                      </tr>
                                      <tr class='info'>
                                        <td><h4>FECHA DE INICIO</h4></td>
                                        <td>".$datos['inicio_normal']."</td>
                                      </tr>
                                      <tr class='info'>
                                        <td><h4>FECHA TERMINO</h4></td>
                                        <td>".$datos['final_normal']."</td>
                                      </tr>
                                      <tr class='info'>
                                        <td><h4>DESCRIPCION</h4></td>
                                        <td>".$datos['body']."</td>
                                      </tr>
                                      <tr class='info'>
                                        <td><h4>LUGAR</h4></td>
                                        <td>".$datos['ubiActi']."</td>
                                      </tr>
                                    </tbody>
                                  </table>";
                    foreach($correos as $correo){
                        $this->enviarCorreo($datos,$correo);
                    }
                    header("Location:index.php?controller=MisActividades&action=verParticipantes&id=$id&error=$error");
                }else{
                    $error = 0;
                    header("Location:index.php?controller=MisActividades&action=verParticipantes&id=$id&error=$error");
                }
            }else{
                header("Location:index.php?controller=MisActividades&action=verParticipantes&id=$id&error=2");
            }           
        }

        // Formatear una fecha a microtime para añadir al evento, tipo 1401517498985.
        function _formatear($fecha){

            return strtotime(substr($fecha, 6, 4)."-".substr($fecha, 3, 2)."-".substr($fecha, 0, 2)." " .substr($fecha, 10, 6)) * 1000;
        }

        function enviarCorreo($data, $correo){
            //Titulo
            $titulo = "Modificación de Evento: ".$data['title'];
            //body
            $mail = $data['cuerpo'];
            $mail .= "<br><a href='http://agenda.perudataconsult.net'>Agenda Corporativa</a>";
            //cabecera
            $headers = "MIME-Version: 1.0\r\n"; 
            //$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
            $headers .= "Content-type: text/html; charset=utf-8\r\n"; 
            //dirección del remitente 
            $headers .= "From: Agenda Corporativa < agenda@perudataconsult.net >\r\n";
            //Enviamos el mensaje a tu_dirección_email 
            $bool = mail($correo,$titulo,$mail,$headers);
            if($bool){
                echo "Mensaje enviado";
            }else{
                echo "Mensaje no enviado";
            }
        }

    }
?>