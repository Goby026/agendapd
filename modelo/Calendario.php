<?php
require_once 'bd/conexion.php';
date_default_timezone_set("America/Lima");

class Calendario{
    private $DB;
    private $calendarios;

    function __construct(){
         $this->DB=Database::connect();
    }

    function get(){
        $sql= 'SELECT * FROM tactividad';
        $fila=$this->DB->query($sql);
        $this->calendarios=$fila;
        return  $this->calendarios;
    }

    function create($data){

        $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="INSERT INTO tactividad(codiTipoActi,title,body,url,class,start,end,inicio_normal,horaIniActi,final_normal,horaFinActi,notaActi,imporActi,aviActi,ubiActi,codiEstaActi,porcenAvanActi,codiColaAsig,fullDayActi, estado, leido)VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

        $query = $this->DB->prepare($sql);
        $query->execute(array(
            $data['codiTipoActi'],
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
            $data['fullDayActi'],
            $data['estado'],
            $data['leido']
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

    function posponer($data){
        $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE tactividad SET inicio_normal =?, final_normal=?, start=?, end=? WHERE id = ? ";
        $q = $this->DB->prepare($sql);
        $q->execute(array($data['inicio_normal'],$data['final_normal'],$data['start'],$data['end'],$data['id']));
        Database::disconnect();
    }

    function delete($date){
        $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //$sql="DELETE FROM tsistema where id=?";
        $sql="UPDATE tactividad SET estado = 0, codiEstaActi = '005' WHERE id = $id";
        $q=$this->DB->prepare($sql);
        $q->execute(array($date));
        Database::disconnect();
    }

    function motivoDelete($data){
        $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="INSERT INTO tactividad(codiTipoActi,title,body,url,class,start,end,inicio_normal,horaIniActi,final_normal,horaFinActi,notaActi,imporActi,aviActi,ubiActi,codiEstaActi,porcenAvanActi,codiColaAsig,fullDayActi, estado, leido)VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

        $query = $this->DB->prepare($sql);
        $query->execute(array(
            $data['codiTipoActi'],
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
            $data['fullDayActi'],
            $data['estado'],
            $data['leido']
        ));
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
        $base_url="http://localhost/poo_agenda/vistas/";//url LOCAL
        //$base_url="http://www.agenda.perudataconsult.net/vistas/";//url Hosting
        $link = "$base_url"."descripcion_evento.php?id=$id";
        $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);        
        $sql = "UPDATE tactividad SET url = '$link', aviActi = '$id' WHERE id = ?";
        $q = $this->DB->prepare($sql);
        $q->execute(array($id));
        Database::disconnect();
    }

    function verificar_agenda($data){
        $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT *
        FROM tactividad
        where start between ? AND ?
        and codiCola = ?";
        $q = $this->DB->prepare($sql);
        $q->execute(array($data['inicio'], $data['fin'], $data['codiCola']));
        $data = $q->fetchAll(PDO::FETCH_ASSOC);
        //return $data;
        echo count($data);
    }

}
?>

