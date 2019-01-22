<?php
require_once 'bd/conexion.php';

class Departamento{
	private $DB;
	private $departamentos;

	function __construct(){
		$this->DB=Database::connect();
	}

	function get(){
		$sql= 'SELECT * FROM tdepartamento';
		$fila=$this->DB->query($sql);
		$this->departamentos=$fila;
		return  $this->departamentos;
	}
}
?>