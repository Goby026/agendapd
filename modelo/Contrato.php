<?php

require_once 'bd/conexion.php';

class Contrato{
    private $DB;
    private $contratos;

    function __construct(){
         $this->DB=Database::connect();
    }

    function get(){
        $sql= 'SELECT * FROM tcontrato';
        $fila=$this->DB->query($sql);
        $this->contratos=$fila;
        return  $this->contratos;
    }

    function create($data){
        $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="INSERT INTO tarea(codiSistema,nombreSiste,nombreBreveSiste,fechaCreaSiste,estaSiste)VALUES (?,?,?,?,?)";

        $query = $this->DB->prepare($sql);
        $query->execute(array($data['codiSistema'],$data['nombreSiste'],$data['nombreBreveSiste'],$data['fechaCreaSiste'],$data['estaSiste']));
        Database::disconnect();
    }

    function get_id($id){
        $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM tarea where codiArea = ?";
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

