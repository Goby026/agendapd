<?php
    class ActividadReporte extends EntidadBase{
        private $codiActiRepor;
        private $codiActi;
        private $codiTipoActi;
        private $codiCola;
        private $fechaActiRepor;
        private $descripRepor;

        public function __construct($table,$adapter){
			$this->table=(string) $table;
			// require_once "Conectar.php";
			// $this->conectar = new Conectar();
			// $this->db = $this->conectar->conexion();
			$this->conectar = null;
        	$this->db = $adapter;
		}

		public function getConectar(){
			return $this->conectar;
		}

		public function db(){
			return $this->db;
		}

		//METODO PARA OBTENER TODOS LOS REGISTROS DE UNA ENTIDAD
		public function getAll($column){
			$query = "SELECT * FROM $this->table ORDER BY $column DESC";

			$sql = $this->db->query($query);
			//DEVOLVEMO EL RESUTADO-SET EN FORMA DE ARRAY DE OBJETOS
			while($row = $sql->fetch_object()){
				$resultSet[]=$row;
			}
			return @$resultSet;
		}

		//METODOS PARA OBTENER VARIOS DATOS DE UNA DETERMINADA CONDICION
		public function getBy($column, $value){
			$sql = $this->db->query("SELECT * FROM $this->table WHERE $column='$value' ");
			while($row = $sql->fetch_object()){
				$resultSet[]=$row;
			}
			return @$resultSet;
		}
		
		public function different($column, $value){
			$sql = $this->db->query("SELECT * FROM $this->table WHERE $column!='$value' ");
			while($row = $sql->fetch_object()){
				$resultSet[]=$row;
			}
			return @$resultSet;
		}

		// funcion para eliminar
		public function deleteBy($column, $value){
			$sql = "DELETE FROM $this->table WHERE $column='$value' ";
			$resultSet = $this->db->query($sql);
			return @$resultSet;
		}

		// CONTAR REGISTROS
		public function contarBy($column, $value){
			$sql = $this->db->query("SELECT COUNT(*) AS total FROM $this->table WHERE $column='$value' ");
			if ($row = $sql->fetch_object()) {
				$resultSet[] = $row;
			}
			return @$resultSet;
		}
		public function getOne($column){
			$sql = $this->db->query("SELECT * FROM $this->table ORDER BY $column ASC LIMIT 1");
			if ($row = $sql->fetch_object()) {
				$resultSet[] = $row;
			}
			return @$resultSet;
		}
		
		//REDIRECIONAR ERRORES
		public function error($ruta,$controller,$action){
			header("Location: ".$ruta.".php?controller=".$controller.'&msj='.$action);
		}

		public function success($ruta,$controller,$action){
			header("Location: ".$ruta.".php?controller=".$controller.'&service='.$action);
		}

		public function redirect($ruta,$controller,$action){
			header("Location: ".$ruta.".php?controller=".$controller.'&cc='.$action);
		}
    }
?>