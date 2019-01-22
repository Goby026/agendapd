<?php
require_once('modelo/Colaborador.php');

    class ConfiguracionController{

        private $model_c;

        function __construct(){
            $this->model_c = new Colaborador();
        }

        function index(){
            //$query =$this->model_col->get();

            //include_once('vistas/header.php');            
            include_once('vistas/configuracionView.php');
            include_once('vistas/footer.php');
        }

        function actualizarDatos(){

            if ($this->subir_imagen() > 0) {
                
                $data['nombreCola'] = $_REQUEST['txtNombres'];
                $data['apePaterCola'] = $_REQUEST['txtApellidoPater'];
                $data['apeMaterCola'] = $_REQUEST['txtApellidoMater'];
                $data['correoCorpoCola'] = $_REQUEST['txtCorreoCorpo'];
                $data['correoPersoCola'] = $_REQUEST['txtCorreoPersonal'];
                $data['celuCorpoCola'] = $_REQUEST['txtCelularCorpo'];
                $data['celuPersoCola'] = $_REQUEST['txtCelularPersonal'];
                $data['contraCola'] = $_REQUEST['txtCelularPersonal'];
                if ($_FILES['imagen']['name'] != "") {
                    $data['fotoCola'] = $_FILES['imagen']['name'];
                }else{
                    $data['fotoCola'] = $_REQUEST['fotoActual'];
                }
                $data['codiCola'] = $_REQUEST['codiCola'];
                $this->model_c->update($data);
                header("Location:index.php?controller=Configuracion");
                //print_r($data);

            }
        }

        function modificarContra(){
            $data['contraAnterior'] = $_REQUEST['txtPassAnt'];
            $data['contraCola'] = $_REQUEST['txtNewPass'];
            $data['codiCola'] = $_REQUEST['txtCodiCola'];
            $oldPass = $this->model_c->get_by_dni($data['codiCola']);

            if ($data['contraAnterior'] == $oldPass['contraCola']) {
                $this->model_c->updatePass($data);
                header("Location:index.php?controller=Configuracion&error=1");
            } else {
                header("Location:index.php?controller=Configuracion&error=0");
            }
        }

        function subir_imagen(){
            $num = 0;
            $imgSize = $_FILES['imagen']['size'];
            $imgType = $_FILES['imagen']['type'];
            if ($_FILES['imagen']['name'] != "") {
                $nomImagen = $_FILES['imagen']['name'];
            }else{
                $nomImagen = $_REQUEST['fotoActual'];
            }

            if ($imgSize <= 1000000) {
                if ($imgType == 'image/jpeg' || $imgType == 'image/jpg' || $imgType == 'image/png' || $imgType == 'image/gif' || $imgType == '') {
                    //$carpeta_destino = $_SERVER['DOCUMENT_ROOT']."/poo_agenda/style/img/colaboradores/"; //configuracion local
                    $carpeta_destino = $_SERVER['DOCUMENT_ROOT']."/style/img/colaboradores/"; //cpnf hosting
                    move_uploaded_file($_FILES['imagen']['tmp_name'],$carpeta_destino.$nomImagen);
                    $num++;
                }else{
                    echo "El formato ingresado no esta permitido, solo imagenes JPEG, JPG, PNG, GIF";
                }
            }else{
                echo "El tamaño de la imagen es muy grande, max 1mb";
            }
            
            return $num;
        }

    }
?>