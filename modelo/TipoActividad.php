<?php

require_once 'bd/conexion.php';

class TipoActividad{
    private $DB;
    private $actividades;

    function __construct(){
         $this->DB=Database::connect();
    }

    function get(){
        $sql= 'SELECT * FROM ttipoactividad';
        $fila=$this->DB->query($sql);
        $this->actividades=$fila;
        return  $this->actividades;
    }

    function create($data){

        $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="INSERT INTO ttipoactividad(codiTipoActi,nombreTipoActi,nombreBreveTipoActi,colorActi,estaActi)VALUES (?,?,?,?,?)";

        $query = $this->DB->prepare($sql);
        $query->execute(array($data['codiTipoActi'],$data['nombreTipoActi'],$data['nombreBreveTipoActi'],$data['colorActi'],$data['estaActi']));
        Database::disconnect();

    }
    function get_id($id){
        $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM tsistema where codiSistema = ?";
        $q = $this->DB->prepare($sql);
        $q->execute(array($id));
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
}
?>

