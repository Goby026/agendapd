<?php
require_once 'bd/conexion.php';

class Provincia{
	private $DB;
	private $provincias;

	function __construct(){
		$this->DB=Database::connect();
	}

	function get(){
		$sql= 'SELECT * FROM tprovincia';
		$fila=$this->DB->query($sql);
		$this->provincias=$fila;
		return  $this->provincias;
	}
}
?>