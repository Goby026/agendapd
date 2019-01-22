<?php

require_once 'bd/conexion.php';

class AccesoSistema{
    private $DB;
    private $accesos;

    function __construct(){
       $this->DB=Database::connect();
   }

   function get(){
    $sql= 'SELECT * FROM tcolaborador';
    $fila=$this->DB->query($sql);
    $this->accesos=$fila;
    return  $this->accesos;
    }

    function validarAcceso($us, $ps){
        $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM tcolaborador where dniCola = ? AND contraCola = ? ";
        $q = $this->DB->prepare($sql);
        $q->execute(array($us, $ps));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    function create($data){

        $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="INSERT INTO taccesosistema(
        codiAcceSiste, codiSistema, codiCargo,
        codiArea, codiCola, codiEmpre,
        codiTipoContra, fechaAcceSiste, fechaFinAcceSiste,
        estaAcceSiste
    )VALUES (?,?,?,?,?,?,?,?,?,?)";

    $query = $this->DB->prepare($sql);
    $query->execute(array(
        $data['codiAcceSiste'],
        $data['codiSistema'],
        $data['codiCargo'],
        $data['codiArea'],
        $data['codiCola'],
        $data['codiEmpre'],
        $data['codiTipoContra'],
        $data['fechaAcceSiste'],
        $data['fechaFinAcceSiste'],
        $data['estaAcceSiste']
    ));
    Database::disconnect();
    }

    function get_by_codi($dni){
        $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM tcolaborador where dniCola = ?";
        $q = $this->DB->prepare($sql);
        $q->execute(array($dni));
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

