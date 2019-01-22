<?php

require_once 'bd/conexion.php';

class Cargo{
    private $DB;
    private $cargos;

    function __construct(){
         $this->DB=Database::connect();
    }

    function get(){
        $sql= 'SELECT * FROM tcargo';
        $fila=$this->DB->query($sql);
        $this->cargos=$fila;
        return  $this->cargos;
    }

    // function getCargo($us, $ps){
    //     $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //     $sql = "SELECT * FROM tcolaborador where dniCola = ? AND contraCola = ? ";
    //     $q = $this->DB->prepare($sql);
    //     $q->execute(array($us, $ps));
    //     $data = $q->fetch(PDO::FETCH_ASSOC);
    //     return $data;
    // }

    function create($data){

        $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="INSERT INTO estudiante(id,cedula,nombre,apellidos,promedio,edad,fecha)VALUES (?,?,?,?,?,?,?)";

        $query = $this->DB->prepare($sql);
        $query->execute(array($data['id'],$data['cedula'],$data['nombre'],$data['apellidos'],$data['promedio'],$data['edad'],$data['fecha']));
        Database::disconnect();
    }

    function get_by_id($id){
        $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM tcargo where codiCola = ?";
        $q = $this->DB->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    function update($data,$date){
        $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE estudiante  set  cedula=?, nombre =?, apellidos=?,promedio=?, edad=?, fecha=? WHERE id = ? ";
        $q = $this->DB->prepare($sql);
        $q->execute(array($data['cedula'],$data['nombre'],$data['apellidos'],$data['promedio'],$data['edad'],$data['fecha'], $date));
        Database::disconnect();
    }

    function delete($date){
        $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="DELETE FROM estudiante where id=?";
        $q=$this->DB->prepare($sql);
        $q->execute(array($date));
        Database::disconnect();
    }
}
?>

