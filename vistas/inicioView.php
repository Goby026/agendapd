<style type="text/css">
  .texto_grande {
    font-size: 2.5rem;
    color: white;
} 
#icone_grande {
    font-size: 8rem;
    color:#fff;
} 
</style>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-2">
      <?php include 'sideBar.php'; ?>
    </div>
    <div class="col-md-10">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-5">
            <!-- <center><h1>Agenda<small> Corporativa</small></h1></center> -->
          </div>
          <div class="col-md-2">
            <center><h1>Agenda<small> Corporativa</small></h1></center>
            <center><img src="style/img/logo_calendario3.png" style="width: 100%;"></center>
          </div>
          <div class="col-md-5">
            <!-- <center><h1>Agenda<small> Corporativa</small></h1></center> -->
          </div>
        </div>
      </div>
        <div class="container" style="margin-top: 100px;">
           <div class="col-md-3">
              <a class="btn btn-block btn-lg btn-success" href="index.php?controller=calendario">
                  <i class="fa fa-book" id="icone_grande"></i> <br><br>
                  <span class="texto_grande"><i class="fa fa-calendar"></i> Mi agenda</span></a>
            </div>
            <div class="col-md-3">
              <a class="btn btn-block btn-lg btn-danger" href="index.php?controller=verAgendas&codiEmpre=001">
                  <i class="fa fa-group" id="icone_grande"></i> <br><br>
                  <span class="texto_grande"><i class="fa fa-calendar-check-o"></i> Ver Agendas</span></a>
            </div>
            <div class="col-md-3">
              <a class="btn btn-block btn-lg btn-primary" href="index.php?controller=configuracion">
                  <i class="fa fa-cog fa-spin" id="icone_grande"></i> <br><br>
                  <span class="texto_grande"><i class="fa fa-edit"></i> Configuración</span></a>
            </div>
            <div class="col-md-3">
              <a class="btn btn-block btn-lg btn-warning" data-toggle="modal" data-target="#mymodal">
                  <i class="fa fa-pied-piper-alt" id="icone_grande"></i> <br><br>
                  <span class="texto_grande"><i class="fa fa-list-ul"></i> LIST Usuários</span></a>
            </div>
        </div>        
    </div>
  </div>
</div>