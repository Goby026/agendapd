<?php 
if (!isset($_SESSION["poo_agenda=user"])) {
    ?>
      <div class="container">
        <br><br><br>
        <div class="row">
          <div class="col-xs-12 col-md-3"></div>
          <div class="col-xs-12 col-md-6">
            <div class="alert alert-danger alert-dismissible fade in" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
              <h3 class="text-danger text-center"><b>ACCESO DENEGADO</b></h3>
              <p class="text-center">Para acceder a esta página debe iniciar sesión. Si el problema persiste comuníquese con el administrador del sistema.</p>
              <p class="text-center">
                <a href="inicio.php?controller=login" class="btn btn-danger btn-md">Inicio</a>
              </p>
            </div>
          </div>
          <div class="col-xs-12 col-md-3"></div>
        </div>
      </div>
    <?php
  exit();
  }else{
    // obtener los datos del usuario logeado
    $usuario = new Colaborador();

    $colaborador = $usuario->get_by_dni($_SESSION["poo_agenda=user"]);

    $acti = 0;

  }

?>

<div>
  <img src="style/img/imagotipo -13.png" class="logo">
  <center><h4>Agenda Corporativa</h4></center>
</div>

  <nav class="navbar navbar-default sidebar" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>      
<!-- gestion de menu -->
<?php 
if ($colaborador['estado']==0) {//jefe de area
  # code...?>
<div id="divActi" style="display: none;">
  <?php
    foreach ($actividades as $value) {
      echo $value['id'];
    }
  ?>
</div>
<!-- <div><button class="btnON">ON</button></div> -->
<div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
  <ul class="nav navbar-nav menu">
    <li class="menu-item"><a href="index.php?controller=inicio">Inicio<span style="font-size:16px;" class="pull-right hidden-xs showopacity fa fa-home"></span></a></li>    
    <li class="menu-item"><a href="index.php?controller=calendario">Mi agenda<span style="font-size:16px;" class="pull-right hidden-xs showopacity fa fa-calendar"></span></a></li>
    <li class="menu-item"><a href="index.php?controller=MisActividades">Mis actividades<span style="font-size:16px;" class="pull-right hidden-xs showopacity fa fa-laptop"></span></a></li>
    <li class="menu-item"><a href="index.php?controller=asignacion">Asignación/Historial<span style="font-size:16px;" class="pull-right hidden-xs showopacity fa fa-edit"></span></a></li>
    <!-- <li ><a >Visualizar Agendas<span style="font-size:16px;" class="pull-right hidden-xs showopacity fa fa-calendar-o"></span></a>
    </li> -->
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Visualizar Agendas <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a>
      <ul class="dropdown-menu forAnimate" role="menu">
        <!-- <li><a href="{{URL::to('createusuario')}}">Crear</a></li> -->
        <li><a href="index.php?controller=VerAgendas&codiArea=1&codiEmpre=1">Huancayo</a></li>
        <li><a href="index.php?controller=VerAgendas&codiArea=1&codiEmpre=2">Lima</a></li>
      </ul>
    </li>
    <li class="menu-item"><a href="index.php?controller=Configuracion">Configuración<span style="font-size:16px;" class="pull-right hidden-xs showopacity fa fa-cogs"></span></a></li>
    <li class="menu-item manual"><a href="">Manual de usuario<span style="font-size:16px;" class="pull-right hidden-xs showopacity fa fa-file-pdf-o"></span></a></li>
  </ul>
</div>
  <?php
}else if($colaborador['estado']==1){//colaborador
?>
<div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
  <ul class="nav navbar-nav menu">
    <li class="menu-item"><a href="index.php?controller=inicio">Inicio<span style="font-size:16px;" class="pull-right hidden-xs showopacity fa fa-home"></span></a></li>    
    <li class="menu-item"><a href="index.php?controller=calendario">Mi agenda<span style="font-size:16px;" class="pull-right hidden-xs showopacity fa fa-calendar"></span></a></li><li class="menu-item"><a href="index.php?controller=MisActividades">Mis actividades<span style="font-size:16px;" class="pull-right hidden-xs showopacity fa fa-laptop"></span></a></li>
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Visualizar Agendas <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a>
      <ul class="dropdown-menu forAnimate" role="menu">
        <!-- <li><a href="{{URL::to('createusuario')}}">Crear</a></li> -->
        <li><a href="index.php?controller=VerAgendas&codiArea=1&codiEmpre=1">Huancayo</a></li>
        <li><a href="index.php?controller=VerAgendas&codiArea=1&codiEmpre=2">Lima</a></li>
      </ul>
    </li>
    <li class="menu-item"><a href="index.php?controller=Configuracion">Configuración<span style="font-size:16px;" class="pull-right hidden-xs showopacity fa fa-cogs"></span></a></li>
    <li class="menu-item manual"><a href="">Manual de usuario<span style="font-size:16px;" class="pull-right hidden-xs showopacity fa fa-file-pdf-o"></span></a></li>
  </ul>
</div>
<?php
}else if($colaborador['estado'] == 2){//admin
?>
<div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
  <ul class="nav navbar-nav">
    <a href="index.php?controller=Prueba">CORREO</a>
    <li class="active"><a href="index.php?controller=inicio">Inicio<span style="font-size:16px;" class="pull-right hidden-xs showopacity fa fa-home"></span></a></li>    
    <li><a href="index.php?controller=calendario">Mi agenda<span style="font-size:16px;" class="pull-right hidden-xs showopacity fa fa-calendar"></span></a></li>
    <li class="menu-item"><a href="index.php?controller=MisActividades">Mis actividades<span style="font-size:16px;" class="pull-right hidden-xs showopacity fa fa-laptop"></span></a></li>
    <li ><a href="index.php?controller=colaborador">Colaboradores<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
    <li ><a href="index.php?controller=tipoContrato">Tipo de Contratos<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-list-alt"></span></a></li>
    <li ><a href="index.php?controller=empresa">Empresas<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-briefcase"></span></a></li>
    <li ><a href="index.php?controller=tipoActividad">Tipo de Actividad<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-pushpin"></span></a></li>
    <li class="dropdown">
      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Visualizar Agendas <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a>
      <ul class="dropdown-menu forAnimate" role="menu">
        <!-- <li><a href="{{URL::to('createusuario')}}">Crear</a></li> -->
        <li><a href="index.php?controller=VerAgendas&codiArea=1&codiEmpre=1">Huancayo</a></li>
        <li><a href="index.php?controller=VerAgendas&codiArea=1&codiEmpre=2">Lima</a></li>
      </ul>
    </li>
    <li ><a href="index.php?controller=sistema">Sistemas<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-th-list"></span></a></li>
    <li ><a href="index.php?controller=verAgendas">Visualizar Agendas<span style="font-size:16px;" class="pull-right hidden-xs showopacity fa fa-calendar-o"></span></a></li>
    <li ><a href="index.php?controller=Configuracion">Configuración<span style="font-size:16px;" class="pull-right hidden-xs showopacity fa fa-cogs"></span></a></li>
    <li class="menu-item manual"><a href="">Manual de usuario<span style="font-size:16px;" class="pull-right hidden-xs showopacity fa fa-file-pdf-o"></span></a></li>
  </ul>
</div>
<?php
}
 ?>      
    </div>
  </nav>
<hr>

<div>
  <center>
    <img src="style/img/colaboradores/<?php echo $colaborador['fotoCola']; ?>" style="width: 40%; margin-top:20px;">
    <br>
    <span><strong><?php echo $colaborador['nombreCola']." ".$colaborador['apePaterCola']; ?></strong></span>
    <br>
    <span><a href="index.php?controller=salir&action=salir" class="btn btn-default">Cerrar Sesion</a></span>
  </center>
</div>

<script type="text/javascript" charset="utf-8">
  $(document).ready(function(){
    var loc = window.location.pathname.substring(1);
    $('.menu').find('.menu-item').each(function() {
      var href = $(this).find('a').attr('href');
      if (href == loc) {
        $(this).addClass('active');
      }
    });
  setTimeout('document.location.reload()',600000);
    // setInterval(function(){
    //   Push.create('Notificacion',{
    //     body :'',
    //     icon : 'style/img/favicon.png',
    //     timeout : 4000,
    //     onClick : function(){
    //       alert('click en notificacion');
    //     }
    //   });
    // },5000);
    $('.btnON').click(function(){
      var valor = $('#divActi').val();
      alert(valor);
    });
  });

  $(".manual").click(function(){
    //alert("Manual de usuario");
    window.open('style/Manual de usuario Agenda Corporativa.pdf', '_blank');
  });

  
</script>
