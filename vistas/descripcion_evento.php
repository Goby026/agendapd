<?php
session_start();
/**
**
**  BY iCODEART
**
**********************************************************************
**                      REDES SOCIALES                            ****
**********************************************************************
**                                                                ****
** FACEBOOK: https://www.facebook.com/icodeart                    ****
** TWIITER: https://twitter.com/icodeart                          ****
** YOUTUBE: https://www.youtube.com/c/icodeartdeveloper           ****
** GITHUB: https://github.com/icodeart                            ****
** TELEGRAM: https://telegram.me/icodeart                         ****
** EMAIL: info@icodeart.com                                       ****
**                                                                ****
**********************************************************************
**********************************************************************
**/    
    //incluimos nuestro archivo config
    include '../controlador/config.php';

    // Incluimos nuestro archivo de funciones
    include '../controlador/funciones.php';

    // Obtenemos el id del evento
    $id  = evaluar($_GET['id']);

    // y lo buscamos en la base de dato
    $bd  = $conexion->query("SELECT a.title, a.body, a.inicio_normal, a.final_normal, c.nombreCola, c.apePaterCola, c.apeMaterCola, a.codiColaAsig, a.ubiActi
        FROM tacticola ac
        INNER JOIN tactividad a ON ac.id = a.id
        INNER JOIN tcolaborador c ON ac.codiCola = c.codiCola
        WHERE ac.id = $id GROUP BY a.title");

    //buscamos los datos de la persona que asigna una actividad
    $sql = $conexion->query("SELECT c.dniCola, c.nombreCola, c.apePaterCola, c.apeMaterCola
        FROM tactividad a
        INNER JOIN tcolaborador c ON a.codiColaAsig = c.codiCola
        WHERE a.id =$id ");

    // Obtenemos los datos
    $row = $bd->fetch_assoc();
    $rowColAsig = $sql->fetch_assoc();

    // titulo 
    $titulo=$row['title'];

    // cuerpo
    $evento=$row['body'];

    // Fecha inicio
    $inicio=$row['inicio_normal'];

    // Fecha Termino
    $final=$row['final_normal'];

    //ubicacion
    $lugar = $row['ubiActi'];

    //personal que asigna actividad
    $ColAsig=$rowColAsig['nombreCola']." ".$rowColAsig['apePaterCola']." ".$rowColAsig['apeMaterCola'];

 ?>

 <!DOCTYPE html>
 <html lang="es">
 <head>
   <meta charset="UTF-8">
   <title><?=$titulo?></title>
   <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

   <script
   src="https://code.jquery.com/jquery-3.3.1.min.js"
   integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
   crossorigin="anonymous"></script>
   <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
   <script src="//cdn.ckeditor.com/4.8.0/basic/ckeditor.js"></script>
 </head>
 <body>
  <center><h3><?=$titulo?></h3></center>
  <hr>
  <div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <table class="table">
        <tbody>
          <tr class="active">
            <td>
              <b>Fecha inicio:</b>
            </td>
            <td>
              <?=$inicio?>
            </td>
          </tr>
          <tr class="active">
            <td>
              <b>Fecha termino:</b>
            </td>
            <td>
              <?=$final?>
            </td>
          </tr>
          <tr class="active">
            <td>
              <label>Descripción</label>
            </td>
            <td>
              <?php 
              echo $evento;
              ?>
            </td>
          </tr>
          <tr class="active">
            <td>
              <label>Asignado por</label>
            </td>
            <td>
              <?php 
                echo $ColAsig;
               ?>
            </td>
          </tr>
          <tr class="active">
            <td>
              <label>Ubicación</label>
            </td>
            <td>
              <?php echo $lugar; ?>
            </td>
          </tr>
          <tr class="active">
            <?php if (!isset($_SESSION['agendaCol']))
              {
              ?>
            <td>
              <a href="../index.php?controller=posponer&id=<?php  echo $id;?>" class="btn btn-primary btn-warning posponer"><span class="glyphicon glyphicon-time"></span> Posponer</a>
            </td>
            <td>
                <form action="../index.php?controller=posponer&action=eliminar" method="post">
                  <button type="submit" class="btn btn-danger" name="eliminar_evento">Eliminar</button>
                  <input type="hidden" name="idActi" value="<?php  echo $id;?>">
                </form>
            </td>
            <?php
              }
              ?>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

</body>
</html>