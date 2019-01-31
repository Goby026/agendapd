<?php 

require_once 'modelo/Colaborador.php';
require_once 'modelo/TipoActividad.php';
require_once 'modelo/Calendario.php';
require_once 'modelo/Actividad.php';
require_once 'modelo/ActiCola.php';

class AsignarVariosController{

        private $model_col;//modelo de colaborador
        private $model_ta;
        private $model_cal;
        private $model_actividad;
        private $model_actiCola;

        function __construct(){
            $this->model_col= new Colaborador();
            $this->model_ta = new TipoActividad();
            $this->model_cal = new Calendario();
            $this->model_actividad = new Actividad();
            $this->model_actiCola = new ActiCola();
        }

        function index(){
            if (count($_REQUEST['cbCola']) > 0 ) {
                $col = array();
                foreach ($_REQUEST['cbCola'] as $value) {
                    $col[] =$this->model_col->get_by_dni($value);
                }                
                $tipoActividades = $this->model_ta->get();
                $colaboradores = $this->model_col->get();
                //include_once('vistas/header.php');
                include_once('vistas/asignarVariosView.php');
                include_once('vistas/footer.php');
            }else{
                header("Location:index.php?controller=asignacion");
            }
        }

        //metodo para agregar un colaborador a la lista de los YA seleccionados
        public function AddCol(){
            if (count($_REQUEST['cbCola']) > 0 ) {
                $col = unserialize(base64_decode(stripslashes($_REQUEST['cbCola'])));

                $newCola = $this->model_col->get_by_dni($_REQUEST['mas']);
                
                array_push($col, $newCola);

                $tipoActividades = $this->model_ta->get();
                $colaboradores = $this->model_col->get();

                include_once('vistas/asignarVariosView.php');
                include_once('vistas/footer.php');
            }else{
                header("Location:index.php?controller=asignacion");
            }
        }

    function regActiColaboradores(){

        //primero registrar la actividad normal

            $fecha = date('Y-m-d', time());
            $hora = date('G:i:s', time());

        // Recibimos el fecha de inicio y la fecha final desde el form
            $inicio = $this->_formatear($_REQUEST['from']);
        // y la formateamos con la funcion _formatear

            $final  = $this->_formatear($_REQUEST['to']);
        // Recibimos el fecha de inicio y la fecha final desde el form

            $inicio_normal = $_REQUEST['from'];
        // y la formateamos con la funcion _formatear
            $final_normal  = $_REQUEST['to'];

        // Recibimos los demas datos desde el form
            $titulo = $this->evaluar($_REQUEST['title']);

        // y con la funcion evaluar
            $body   = $_REQUEST['event'];

        //para leer el mensaje sin etiquetas html usamos strip_tags();
            $notaActi = strip_tags($body);

        // reemplazamos los caracteres no permitidos
            $clase  = $this->evaluar($_REQUEST['imporActi']);

            $data['codiTipoActi']=$_REQUEST['codiTipoActi'];
            $data['codiCola']=$_SESSION["poo_agenda=user"];
            $data['title']=$titulo;
            $data['body']=$body;
            $data['url']='';
            $data['class']=$clase;
            $data['start']=$inicio;
            $data['end']=$final;
            $data['inicio_normal']=$inicio_normal;
            $data['horaIniActi']=$hora;
            $data['final_normal']=$final_normal;
            $data['horaFinActi']=NULL;
            $data['notaActi']=$notaActi;
            $data['imporActi']=$_REQUEST['imporActi'];
            $data['aviActi']=NULL;
            if ($_REQUEST['ubiActi']!="") {
                $data['ubiActi']= $_REQUEST['ubiActi'];
            } else {
                $data['ubiActi']= $_REQUEST['cmbUbiActi'];
            }
            $data['codiEstaActi']=2;
            $data['porcenAvanActi']=0;
            if (isset($_REQUEST['txtColAsig'])) {
                $data['codiColaAsig']=$_REQUEST['txtColAsig'];
            }else{
                $data['codiColaAsig']=$_REQUEST['codiCola'];
            }

            $data['fullDayActi']=0;
            $data['estado']=1;
            $data['leido'] = NULL;
            
            $this->model_cal->create($data);//OK
            $id = $this->model_cal->get_last_id();
            $this->model_cal->set_link_event($id);
            //obtener los datos del la persona que asigna
            $data['codiActi'] = $id;
            $colAsig = $this->model_actividad->getColaAsig($data);

            $data['cuerpo'] = "<table class='table'>
                                <tbody>
                                  <tr class='info'>
                                    <td><h4>TITULO</h4></td>
                                    <td>".$data['title']."</td>
                                  </tr>
                                  <tr class='info'>
                                    <td><h4>ASIGNADO POR</h4></td>
                                    <td>".$colAsig['nombreCola']." ".$colAsig['apePaterCola']." ".$colAsig['apeMaterCola']."</td>
                                  </tr>
                                  <tr class='info'>
                                    <td><h4>FECHA DE INICIO</h4></td>
                                    <td>".$data['inicio_normal']."</td>
                                  </tr>
                                  <tr class='info'>
                                    <td><h4>FECHA TERMINO</h4></td>
                                    <td>".$data['final_normal']."</td>
                                  </tr>
                                  <tr class='info'>
                                    <td><h4>DESCRIPCION</h4></td>
                                    <td>".$data['notaActi']."</td>
                                  </tr>
                                  <tr class='info'>
                                    <td><h4>LUGAR</h4></td>
                                    <td>".$data['ubiActi']."</td>
                                  </tr>
                                </tbody>
                              </table>";

        //luego registrar en la tabla tActiCola
        $miArray = unserialize(base64_decode(stripslashes($_POST['codiCola'])));
        foreach ($miArray as $value) {//itera cuantos dni se hayan seleccionado para registrar la actividad
            $colaborador = $this->model_col->get_by_dni($value['codiCola']);
            $actiCola['codiCola'] = $value['codiCola'];
            $actiCola['id'] = $id;
            $actiCola['codiEstaActi'] = 2;
            $actiCola['porcenAvanActi'] = 0;
            $actiCola['estado'] = 1;
            $this->model_actiCola->create($actiCola);
            $this->enviarCorreo($data, $colaborador['correoCorpoCola']);
        }

        header("Location:index.php?controller=asignacion");

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

    function enviarCorreo($data, $correo){
        //Titulo
        $titulo = $data['title'];
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