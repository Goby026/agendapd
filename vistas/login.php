
<!-- Second navbar for sign in -->
    <nav class="navbar navbar-default">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-2">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Peru Data</a>
        </div>
    
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-collapse-2">
          <ul class="nav navbar-nav navbar-right">
            <!-- <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Works</a></li>
            <li><a href="#">News</a></li>
            <li><a href="#">Contact</a></li> -->
            <li>
              <!-- <a class="btn btn-default btn-outline btn-circle"  data-toggle="collapse" href="modal-container-895355" aria-expanded="false" aria-controls="nav-collapse2">Login</a> -->
              <a id="modal-895355" href="#modal-container-895355" role="button" class="btn btn-default btn-outline btn-circle" data-toggle="modal">Ingresar</a>
            </li>
          </ul>
          <!-- <div class="collapse nav navbar-nav nav-collapse" id="nav-collapse2">
            <form class="navbar-form navbar-right form-inline" role="form">
              <div class="form-group">
                <label class="sr-only" for="Email">Email</label>
                <input type="email" class="form-control" id="Email" placeholder="Email" autofocus required />
              </div>
              <div class="form-group">
                <label class="sr-only" for="Password">Password</label>
                <input type="password" class="form-control" id="Password" placeholder="Password" required />
              </div>
              <button type="submit" class="btn btn-success">Sign in</button>
            </form>
          </div> -->
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->

<style type="text/css">
	.text_slider{
		color: #3C3A3A;
	}
</style>

<!-- Carousel
	================================================== -->
	<div id="myCarousel" class="carousel slide" data-interval="false">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner">
			<div class="item active">
				<img src="style/img/Agenda.png" style="width:100%" class="img-responsive">
				<div class="container">
					<div class="carousel-caption">
						<h1 class="text_slider">Agenda Corporativa</h1>
						<p></p>
						<p class="text_slider">Aplicación para seguimiento de actividades</a>
						</p>
					</div>
				</div>
			</div>
			<div class="item">
				<img src="style/img/agenda2.png" style="width:100%" class="img-responsive">
				<div class="container">
					<div class="carousel-caption">
						<h1 class="text_slider">Control de Actividades</h1>
						<p class="text_slider">Asignación de actividades</p>
						<p class="text_slider">Creación de actividades</a></p>
					</div>
				</div>
			</div>
			<div class="item">
				<img src="style/img/agenda3.png" style="width:100%" class="img-responsive">
				<div class="container">
					<div class="carousel-caption">
						<h1 class="text_slider">Porcentaje de avance</h1>
						<p class="text_slider">Seguimiento de cada actividad.</p>
						<p class="text_slider">Avisos de las actividades</a></p>
					</div>
				</div>
			</div>
		</div>
		<!-- Controls -->
		<a class="left carousel-control" href="#myCarousel" data-slide="prev">
			<span class="icon-prev"></span>
		</a>
		<a class="right carousel-control" href="#myCarousel" data-slide="next">
			<span class="icon-next"></span>
		</a>  
	</div>
	<!-- /.carousel -->

<center><h3>Crear actividad</h3></center>
<!-- Marketing messaging and featurettes
	================================================== -->
	<!-- Wrap the rest of the page in another container to center all the content. -->

	<div class="container marketing">

		<!-- Three columns of text below the carousel -->
		<div class="row">
			<div class="col-md-4 text-center">
				<img class="img-circle" src="style/img/agenda.jpg" style="width: 60%; height: 185px;">
				<h2>Añadir Actividad</h2>
				<p>Se encuentra en la parte superior derecha del calendario interactivo.</p>
				<p><a class="btn btn-default" role="button" data-toggle="modal" href="#modal-container-001">Ver »</a></p>
			</div>
			<div class="col-md-4 text-center">
				<img class="img-circle" src="style/img/agenda2.jpg" style="width: 60%; height: 185px;">
				<h2>Parámetros de actividad</h2>
				<p>Indicar inicio, final, importacia, descripción, ubicación de la actividad.</p>
				<p><a class="btn btn-default" role="button" data-toggle="modal" href="#modal-container-002">Ver »</a></p>
			</div>
			<div class="col-md-4 text-center">
				<img class="img-circle" src="style/img/agenda3.jpg" style="width: 60%; height: 185px;">
				<h2>Controlar Avances</h2>
				<p>Ingresa el porcentaje de avance de acuerdo al desarrollo de tu actividad.</p>
				<p><a class="btn btn-default" role="button" data-toggle="modal" href="#modal-container-003">Ver »</a></p>
			</div>
		</div><!-- /.row -->

		<!-- FOOTER -->
		<footer class="footer" style="margin-top: 25px;">
			<center><p>2018 - <a href="http://www.perudataconsult.net">Perú Data Huancayo</a></p></center>
		</footer>

</div><!-- /.container -->

<!-- modal login -->
<div class="modal fade" id="modal-container-895355" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">

				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					×
				</button>
				<h4 class="modal-title" id="myModalLabel">
					Inicio de sesión
				</h4>
			</div>
			<form action="index.php?controller=login&action=access" method="post" role="form">
			<div class="modal-body">
				<center><img alt="" src="style/img/imagotipo -13.png"  class="logo" /></center>
				
					<div class="form-group">

						<label for="exampleInputEmail1">
							Usuario
						</label>
						<input type="text" class="form-control" id="exampleInputEmail1" name="txtUsuario"/>
					</div>
					<div class="form-group">

						<label for="exampleInputPassword1">
							Contraseña
						</label>
						<input type="password" class="form-control" id="exampleInputPassword1" name="txtPass"/>
					</div>
			</div>
			<div class="modal-footer">

				<button type="button" class="btn btn-default" data-dismiss="modal">
					Cerrar
				</button> 
				<button type="submit" class="btn btn-primary">
					Ingresar
				</button>
			</div>
			</form>
		</div>

	</div>

</div>
<!-- fin modal login -->

<!-- 1er modal -->
<div class="modal fade" id="modal-container-001" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">							 
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					×
				</button>
				<h4 class="modal-title" id="myModalLabel">
					Añadir Actividad
				</h4>
			</div>
			<div class="modal-body">
				<img src="style/img/add_actividad.png" style="width: 100%;">
			</div>
			<div class="modal-footer">				
				<button type="button" class="btn btn-default" data-dismiss="modal">
					Cerrar
				</button>
			</div>
		</div>		
	</div>	
</div>
<!-- fin 1er modal -->

<!-- 2do modal -->
<div class="modal fade" id="modal-container-002" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">							 
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					×
				</button>
				<h4 class="modal-title" id="myModalLabel">
					Parámetros de actividad
				</h4>
			</div>
			<div class="modal-body">
				<img src="style/img/param_actividad.png" style="width: 100%;">
			</div>
			<div class="modal-footer">
				
				<button type="button" class="btn btn-default" data-dismiss="modal">
					Cerrar
				</button>
			</div>
		</div>		
	</div>	
</div>
<!-- fin 2do modal -->

<!-- 3er modal -->
<div class="modal fade" id="modal-container-003" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">							 
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					×
				</button>
				<h4 class="modal-title" id="myModalLabel">
					Control avances
				</h4>
			</div>
			<div class="modal-body">
				<img src="style/img/control_actividad.png" style="width: 100%;">
			</div>
			<div class="modal-footer">
				
				<button type="button" class="btn btn-default" data-dismiss="modal">
					Close
				</button>
			</div>
		</div>
	</div>	
</div>
<!-- fin 3er modal -->
<script type="text/javascript">
	$('#modal-container-895355').on('shown.bs.modal', function () {
	    $('#exampleInputEmail1').focus();
	})
</script>