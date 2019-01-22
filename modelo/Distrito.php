<?php
require_once 'bd/conexion.php';

class Distrito{
	private $DB;
	private $distritos;

	function __construct(){
		$this->DB=Database::connect();
	}

	function get(){
		$sql= 'SELECT * FROM tdistrito';
		$fila=$this->DB->query($sql);
		$this->distritos=$fila;
		return  $this->distritos;
	}
}
?>