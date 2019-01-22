<?php

require_once 'bd/conexion.php';

class Colaborador{
    private $DB;
    private $colaboradores;

    function __construct(){
         $this->DB=Database::connect();
    }
    
//    el estado 3 de un colaborador indica que esta fuera de la empresa    

    function get(){
        $sql= 'SELECT * FROM tcolaborador WHERE estado != 3 ORDER BY nombreCola';
        $fila=$this->DB->query($sql);
        $this->colaboradores=$fila;
        return  $this->colaboradores;
    }

    function validarAcceso($us, $ps){
        $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM tcolaborador where dniCola = ? AND contraCola = ? AND estado != 3";
        $q = $this->DB->prepare($sql);
        $q->execute(array($us, $ps));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    function create($data){

        $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="INSERT INTO tcolaborador(
        codiCola, apePaterCola, apeMaterCola,
        nombreCola, dniCola, fechaNaciCola,
        correoCorpoCola, correoPersoCola, celuCorpoCola,
        celuPersoCola, codiDepar, codiProvin,
        codiDistri, direcCola, fotoCola,
        fechaRegisCola, contraCola, estado
    )VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

        $query = $this->DB->prepare($sql);
        $query->execute(array(
            $data['codiCola'],
            $data['apePaterCola'],
            $data['apeMaterCola'],
            $data['nombreCola'],
            $data['dniCola'],
            $data['fechaNaciCola'],
            $data['correoCorpoCola'],
            $data['correoPersoCola'],
            $data['celuCorpoCola'],
            $data['celuPersoCola'],
            $data['codiDepar'],
            $data['codiProvin'],
            $data['codiDistri'],
            $data['direcCola'],
            $data['fotoCola'],
            $data['fechaRegisCola'],
            $data['contraCola'],
            $data['estado']
        ));
        Database::disconnect();
    }
    
    //devuelve solo 1 arreglo con los datos del colaborador
    function get_by_dni($dni){
        $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM tcolaborador where codiCola = ?";
        $q = $this->DB->prepare($sql);
        $q->execute(array($dni));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    function getByArea($data){
        $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if ($data['codiArea']!='' && $data['codiEmpre']!='') {
            $sql = "SELECT *
            FROM tcargo car
            INNER JOIN tcontrato con ON car.codiCargo = con.codicargo
            INNER JOIN tcolaborador col ON con.codicola = col.codicola
            INNER JOIN tempresa e on con.codiEmpre = e.codiEmpre            
            WHERE car.codiarea = ? AND e.codiEmpre = ? AND col.estado != 3
            ORDER BY col.nombreCola";
            $q = $this->DB->prepare($sql);
            $q->execute(array($data['codiArea'], $data['codiEmpre']));
        }else{
            $sql = "SELECT *
            FROM tcargo car
            INNER JOIN tcontrato con ON car.codiCargo = con.codicargo
            INNER JOIN tcolaborador col ON con.codicola = col.codicola
            INNER JOIN tempresa e on con.codiEmpre = e.codiEmpre
            WHERE car.codiarea = ? AND col.estado != 3
            ORDER BY col.nombreCola";
            $q = $this->DB->prepare($sql);
            $q->execute(array($data['codiArea']));
        }
        $data = $q->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    function getColCargo(){
        $sql = "SELECT *
        FROM tcargo car
        INNER JOIN tcontrato con ON car.codiCargo = con.codicargo
        INNER JOIN tcolaborador col ON con.codicola = col.codicola
        INNER JOIN tempresa e on con.codiEmpre = e.codiEmpre 
        WHERE col.estado != 3";
        $fila=$this->DB->query($sql);
        $this->colaboradores=$fila;
        return  $this->colaboradores;
    }

    function getCargoCola($dni){
        $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT car.nombreCargo
        FROM tcargo car
        INNER JOIN tcontrato con ON car.codiCargo = con.codicargo
        INNER JOIN tcolaborador col ON con.codicola = col.codicola
        WHERE col.codiCola = ? AND col.estado != 3";
        $q = $this->DB->prepare($sql);
        $q->execute(array($dni));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    function update($data){
        $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE tcolaborador set
        nombreCola=?, apePaterCola =?, apeMaterCola=?,correoCorpoCola=?, correoPersoCola=?, celuCorpoCola=?, celuPersoCola=?,fotoCola=?
        WHERE codiCola = ? ";
        $q = $this->DB->prepare($sql);
        $q->execute(array(
            $data['nombreCola'],
            $data['apePaterCola'],
            $data['apeMaterCola'],
            $data['correoCorpoCola'],
            $data['correoPersoCola'],
            $data['celuCorpoCola'], 
            $data['celuPersoCola'],
            $data['fotoCola'],
            $data['codiCola']
        ));            
        Database::disconnect();
    }

    function updatePass($data){
        $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE tcolaborador set contraCola = ? WHERE codiCola = ? ";
        $q = $this->DB->prepare($sql);
        $q->execute(array($data['contraCola'], $data['codiCola']));
        Database::disconnect();
    }
}
?>

