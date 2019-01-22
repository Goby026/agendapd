<?php
date_default_timezone_set("America/Lima");
require_once 'bd/conexion.php';

class TipoContrato{
    private $DB;
    private $tipoContratos;

    function __construct(){
       $this->DB=Database::connect();
   }

   function get(){
    $sql= 'SELECT * FROM ttipocontrato';
    $fila=$this->DB->query($sql);
    $this->tipoContratos=$fila;
    return  $this->tipoContratos;
}

function create($data){

    $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql="INSERT INTO ttipocontrato(codiTipoActi,codiCola,title,body,url,class,start,end,inicio_normal,horaIniActi,final_normal,horaFinActi,notaActi,imporActi,aviActi,ubiActi,codiEstaActi,porcenAvanActi,codiColaAsig,fullDayActi)VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

    $query = $this->DB->prepare($sql);
    $query->execute(array(
        $data['codiTipoActi'],
        $data['codiCola'],
        $data['title'],
        $data['body'],
        $data['url'],
        $data['class'],
        $data['start'],
        $data['end'],
        $data['inicio_normal'],
        $data['horaIniActi'],
        $data['final_normal'],
        $data['horaFinActi'],
        $data['notaActi'],
        $data['imporActi'],
        $data['aviActi'],
        $data['ubiActi'],
        $data['codiEstaActi'],
        $data['porcenAvanActi'],
        $data['codiColaAsig'],
        $data['fullDayActi']
    ));
    Database::disconnect();
}

function get_id($codiCola){
    $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM tactividad where codiCola = ?";
    $q = $this->DB->prepare($sql);
    $q->execute(array($codiCola));
    $data = $q->fetch(PDO::FETCH_ASSOC);
    return $data;
}

function update($data,$date){
    $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE tsistema  nombreSistema =?, nombreBreveSistema=? WHERE codiSistema = ? ";
    $q = $this->DB->prepare($sql);
    $q->execute(array($data['nombreSiste'],$data['nombreBreveSiste'],$data['codiSistema']));
    Database::disconnect();
}

function delete($date){
    $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql="DELETE FROM tsistema where id=?";
    $q=$this->DB->prepare($sql);
    $q->execute(array($date));
    Database::disconnect();
}

function get_last_id(){

    $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT MAX(id) AS id FROM tactividad";
    $q = $this->DB->prepare($sql);
    $q->execute();
    $data = $q->fetch(PDO::FETCH_ASSOC);
        return $data['id'];//devuelve el ultimo id OK
    }

    function set_link_event($id){
        $base_url="http://localhost/poo_agenda/vistas/";
        $link = "$base_url"."descripcion_evento.php?id=$id";
        $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // $sql = "UPDATE tsistema  nombreSistema =?, nombreBreveSistema=? WHERE codiSistema = ? ";
        $sql = "UPDATE tactividad SET url = '$link' WHERE id = ?";
        $q = $this->DB->prepare($sql);
        $q->execute(array($id));
        Database::disconnect();
    }

}
?>

