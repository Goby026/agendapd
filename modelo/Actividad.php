<?php

require_once 'bd/conexion.php';

class Actividad{
    private $DB;
    private $actividades;

    function __construct(){
         $this->DB=Database::connect();
    }

    function get(){
        $sql= 'SELECT * FROM tactividad';
        $fila=$this->DB->query($sql);
        $this->actividades=$fila;
        return  $this->actividades;
    }

    //metodo para obtener el historial de un determinado colaborador
    function getByColaborator($codiCola){
        $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT a.inicio_normal, a.final_normal, ta.nombreTipoActi, a.title, a.body,a.notaActi ,a.ubiActi, a.porcenAvanActi
            FROM tacticola ac
            INNER JOIN tactividad a ON ac.id = a.id
            INNER JOIN ttipoactividad ta ON a.codiTipoActi = ta.codiTipoActi
            WHERE ac.codiCola = ? ORDER BY a.inicio_normal DESC";
        $q = $this->DB->prepare($sql);
        $q->execute(array($codiCola));
        $data = $q->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

        //metodo para obtener las actividades del dia del colaborador
    function getActividadesPorColaborador($codiCola){
        $fecha = date('d/m/Y', time());
        $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT a.id, a.title, a.ubiActi, a.inicio_normal, a.final_normal, a.fullDayActi, a.body, a.notaActi,a.porcenAvanActi, a.codiEstaActi,ea.nombreEstaActi, c.nombreCola, a.estado AS EstaActi
                FROM tactividad a
                inner join ttipoactividad ta on a.codiTipoActi = ta.codiTipoActi
                inner join testaacti ea on a.codiEstaActi = ea.codiEstaActi
                inner join tacticola ac on a.id =ac.id
                inner join tcolaborador c on ac.codiCola = c.codiCola
                where ac.codiCola = ? and a.final_normal like '%$fecha%'";
        $q = $this->DB->prepare($sql);
        $q->execute(array($codiCola));
        $data = $q->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    function getRangoActividadesPorColaborador($data){
        $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        if ($data['inicio'] != "" && $data['final'] != "") {
            $sql = "SELECT * 
                FROM tacticola ac
                INNER JOIN tcolaborador c on ac.codiCola = c.codiCola
                INNER JOIN tactividad a on ac.id = a.id
                INNER JOIN ttipoactividad ta on a.codiTipoActi = ta.codiTipoActi
                INNER JOIN testaacti ea on a.codiEstaActi = ea.codiEstaActi
                WHERE a.inicio_normal 
                BETWEEN ? AND ? AND c.codiCola = ?
                ORDER BY a.start DESC";
            $q = $this->DB->prepare($sql);
            $q->execute(array($data['inicio'], $data['final'], $data['codiCola']));
        } else {
            $sql = "SELECT * 
                FROM tacticola ac
                INNER JOIN tcolaborador c on ac.codiCola = c.codiCola
                INNER JOIN tactividad a on ac.id = a.id
                INNER JOIN ttipoactividad ta on a.codiTipoActi = ta.codiTipoActi
                INNER JOIN testaacti ea on a.codiEstaActi = ea.codiEstaActi
                WHERE c.codiCola = ?
                ORDER BY a.start DESC";
            $q = $this->DB->prepare($sql);
            $q->execute(array($data['codiCola']));
        }        
        $data = $q->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
    
    function getParticipantes($data){
        $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT c.codiCola, c.nombreCola, c.apePaterCola, c.apeMaterCola, c.correoCorpoCola
            FROM tacticola ac
            INNER JOIN tactividad a ON ac.id = a.id
            INNER JOIN tcolaborador c ON ac.codiCola = c.codiCola
            WHERE ac.id = ? AND ac.estado = 1";
        $q = $this->DB->prepare($sql);
        $q->execute(array($data['id']));
        $data = $q->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    //metodo para AngularJS (prueba)
    function get_Participantes($data){
        $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT c.codiCola, c.nombreCola, c.apePaterCola, c.apeMaterCola, c.correoCorpoCola FROM tactividad a
            INNER JOIN tcolaborador c ON a.codiCola = c.codiCola
            WHERE a.title = ? AND a.ubiActi = ? AND a.horaIniActi = ?";
        $q = $this->DB->prepare($sql);
        $q->execute(array($data['title'], $data['ubiActi'], $data['horaIniActi']));
        $data = $q->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($data);
    }
    //FIN metodo para AngularJS (prueba)

    function create($data){
        $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="INSERT INTO tsistema(codiSistema,nombreSiste,nombreBreveSiste,fechaCreaSiste,estaSiste)VALUES (?,?,?,?,?)";

        $query = $this->DB->prepare($sql);
        $query->execute(array($data['codiSistema'],$data['nombreSiste'],$data['nombreBreveSiste'],$data['fechaCreaSiste'],$data['estaSiste']));
        Database::disconnect();
    }

    function get_id($id){
        $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM tactividad where id = ?";
        $q = $this->DB->prepare($sql);
        $q->execute(array($id['id']));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    //metodo para ANGULAR JS
    function getByid($id){
        $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM tactividad where id = ?";
        $q = $this->DB->prepare($sql);
        $q->execute(array($id['id']));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        return json_encode($data);
    }
    //FIN metodo para ANGULAR JS

    //metodo para obtener el usuario que asigna una actividad
    function getColaAsig($data){
        $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //buscamos los datos de la persona que asigna una actividad
        $sql = "SELECT c.dniCola, c.nombreCola, c.apePaterCola, c.apeMaterCola
        FROM tactividad a
        INNER JOIN tcolaborador c ON a.codiColaAsig = c.codiCola
        WHERE a.id = ? ";
        $q = $this->DB->prepare($sql);
        $q->execute(array($data['codiActi']));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    //modificar datos de actividad de la vista MisActividadesView
    function modificar_miActividad($data){
        $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE tactividad SET title =?, body=?, start=?, end=?,inicio_normal=?,final_normal=?, notaActi=?, ubiActi=? WHERE id = ? ";
        $q = $this->DB->prepare($sql);
        $notaActi = strip_tags($data['body']);
        if ($q->execute(array($data['title'],$data['body'],$data['start'],$data['end'],$data['inicio_normal'],$data['final_normal'],$notaActi,$data['ubiActi'],$data['id']))) {
            return 1;
            Database::disconnect();
        }else{
            return 0;
            Database::disconnect();
        }
    }

    function updatePorcentaje($data){
        $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE tactividad SET porcenAvanActi =?, codiEstaActi = ? WHERE id = ?";
        $q = $this->DB->prepare($sql);
        $q->execute(array($data['porcenAvanActi'],$data['codiEstaActi'], $data['id']));
        Database::disconnect();
    }

    //metodo para quitar(estado = 0) la actividad de un determinado colaborador
    function quitarActiCola($data){
        $this->DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql="UPDATE tactividad SET estado = 0, codiEstaActi = 5 WHERE id = ?";
        $q=$this->DB->prepare($sql);
        $q->execute(array($data['id']));
        Database::disconnect();
    }
    
}
?>

