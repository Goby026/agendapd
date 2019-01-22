<?php 
/*Clase intermedia entre tColaborador <-> tActividad para poder normalizar las actividades que se asignan a distintos colaboradores*/
require_once 'bd/conexion.php';

class ActiCola{
	private $DB;
    private $actiColas;

    function __construct(){
         $this->DB=Database::connect();
    }

	function index(){
	}

	function get(){
        $sql= 'SELECT * FROM tActiCola';
        $fila=$this->DB->query($sql);
        $this->actiColas=$fila;
        return  $this->actiColas;
    }

    function create($data){
        $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="INSERT INTO tacticola(codiCola,id,codiEstaActi,porcenAvanActi,estado)VALUES (?,?,?,?,?)";

        $query = $this->DB->prepare($sql);
        $query->execute(array($data['codiCola'],$data['id'],$data['codiEstaActi'],$data['porcenAvanActi'],$data['estado']));
        Database::disconnect();
    }

    //metodo para obtener el historial de un determinado colaborador
    function getByColaborator($codiCola){
        $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT a.inicio_normal, a.final_normal, ta.nombreTipoActi, a.title, a.body,a.notaActi ,a.ubiActi, a.porcenAvanActi
        FROM tactividad a
        inner join ttipoactividad ta on a.codiTipoActi = ta.codiTipoActi
        where a.codiCola = ? order by a.inicio_normal desc";
        $q = $this->DB->prepare($sql);
        $q->execute(array($codiCola));
        $data = $q->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    //metodo para cambiar el estado de la actividad de un colaborador
    function deleteActiCola($data){
        $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE tacticola SET estado = 0 WHERE codiCola = ? AND id = ?";        
        $q = $this->DB->prepare($sql);
        $q->execute(array($data['txt_codiCola'], $data['id']));
        Database::disconnect();
    }

    //metodo para cambiar el estado de toda una actividad
    function updateActiCola($data){
        $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE tacticola SET estado = 0, codiEstaActi = 5 WHERE id = ?";
        $q = $this->DB->prepare($sql);
        $q->execute(array($data['id']));
        Database::disconnect();
    }
	
}
?>
