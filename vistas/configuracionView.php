<div class="container-fluid">
	<div class="row">
		<div class="col-md-2">
			<?php include 'sideBar.php'; ?>
		</div>
		<div class="col-md-10">
			<div class="row">
				<div class="page-header">
					<h1 class="text-info">
						Configuración <small>Colaborador</small>
						<a id="modal-518723" href="#modal-container-518723" role="button" class="btn btn-warning pull-right" data-toggle="modal" style="margin-right: 50px !important;"><span class="glyphicon glyphicon-lock"></span> Modificar Contraseña</a>						
					</h1>
					<?php 
					if (isset($_GET['error'])) {
						if ($_GET['error'] == 0) {
							?>
							<div class="container">
								<div class="row">
									<div class="alert alert-danger">
										<strong>Error!</strong> La contraseña ingresada no coincide con la anterior.
									</div>
								</div>
							</div>
							<?php
						}else if($_GET['error'] == 1){
							?>							
							<div class="container">
								<div class="row">
									<div class="alert alert-success">
										<strong>Correcto!</strong> Se modificó su contraseña.
									</div>
								</div>
							</div>
							<?php
						}
						 ?>
						
						
					 <?php } ?>					
				</div>
				<span class="divider"></span>
				<?php
					// datos del colaborador
					$codiCola = $colaborador['codiCola'];
					$nombres = $colaborador['nombreCola'];
					$apellidoPater = $colaborador['apePaterCola'];
					$apellidoMater = $colaborador['apeMaterCola'];
					$correoC = $colaborador['correoCorpoCola'];//correo corporativo
					$correoP = $colaborador['correoPersoCola'];//correo personal
					$celuP = $colaborador['celuPersoCola'];//correo personal
					$celuC = $colaborador['celuCorpoCola'];//correo personal

				 ?>
				<div class="col-md-6">
					<div class="row">
						<form action="index.php?controller=Configuracion&action=actualizarDatos" class="form-horizontal" method="POST" enctype="multipart/form-data">
							<fieldset>
								<!-- Form Name -->
								<legend>Mis Datos</legend>

								<input type="hidden" name="codiCola" value="<?php echo $codiCola; ?>">

								<!-- Text input-->
								<div class="form-group">
									<label class="col-md-4 control-label text-primary" for="txtNombres">Nombres</label>  
									<div class="col-md-4">
										<input id="txtNombres" name="txtNombres" type="text" placeholder="nombres" class="form-control input-md" readonly="" required="" value="<?php echo  $nombres;?>">

									</div>
								</div>

								<!-- Text input-->
								<div class="form-group">
									<label class="col-md-4 control-label text-primary" for="txtApellidoPater">Apellido Paterno</label>  
									<div class="col-md-4">
										<input id="txtApellidoPater" name="txtApellidoPater" type="text" placeholder="apellido paterno" class="form-control input-md" readonly="" value="<?php echo  $apellidoPater;?>">

									</div>
								</div>

								<!-- Text input-->
								<div class="form-group">
									<label class="col-md-4 control-label text-primary" for="txtApellidoMater">Apellido Materno</label> 
									<div class="col-md-4">
										<input id="txtApellidoMater" name="txtApellidoMater" type="text" placeholder="apellido materno" class="form-control input-md" readonly="" value="<?php echo  $apellidoMater;?>">

									</div>
								</div>

								<!-- Text input-->
								<div class="form-group">
									<label class="col-md-4 control-label text-primary" for="txtCorreoCorpo">Correo Corporativo</label>  
									<div class="col-md-6">
										<input id="txtCorreoCorpo" name="txtCorreoCorpo" type="text" placeholder="correo Perú data" class="form-control input-md" readonly="" value="<?php echo  $correoC;?>">

									</div>
								</div>

								<!-- Text input-->
								<div class="form-group">
									<label class="col-md-4 control-label text-primary" for="txtCorreoPersonal">Correo Personal</label>  
									<div class="col-md-6">
										<input id="txtCorreoPersonal" name="txtCorreoPersonal" type="text" placeholder="correo personal" class="form-control input-md" readonly="" value="<?php echo  $correoP;?>">

									</div>
								</div>

								<!-- Text input-->
								<div class="form-group">
									<label class="col-md-4 control-label text-primary" for="txtCelularCorpo">Celular Corporativo</label>  
									<div class="col-md-4">
										<input id="txtCelularCorpo" name="txtCelularCorpo" type="text" placeholder="celular Perú Data" class="form-control input-md" readonly="" value="<?php echo  $celuC;?>">

									</div>
								</div>

								<!-- Text input-->
								<div class="form-group">
									<label class="col-md-4 control-label text-primary" for="txtCelularPersonal">Celular Personal</label>  
									<div class="col-md-4">
										<input id="txtCelularPersonal" name="txtCelularPersonal" type="text" placeholder="celular personal" class="form-control input-md" value="<?php echo  $celuP;?>">

									</div>
								</div>

								<!-- File Button --> 
					          <!-- <div class="form-group">
					            <label class="col-md-4 control-label" for="imagen">Imagen</label>
					            <div class="col-md-4">
					              <input id="imagen" name="imagen" class="input-file" type="file">
								  <input type="hidden" name="fotoActual" value="<?php echo $colaborador['fotoCola']; ?>">
					            </div>
					          </div> -->

					          <div class="form-group">
									
									<div class="col-md-4">
										
									</div>
								</div>

								<!-- Button -->
								<div class="form-group">									
									<div class="col-md-4">										
									</div>
									<div class="col-md-4">
										<button id="btnActualizar" name="btnActualizar" class="btn btn-primary">Actualizar Datos</button>
									</div>
								</div>

							</fieldset>
						</form>
					</div><!-- /.row -->
				</div>
				<div class="col-md-6">
					<center>						
						<div class="row">
							<img alt="Bootstrap Image Preview" src="style/img/colaboradores/<?php echo $colaborador['fotoCola']; ?>" />
						</div>						
						<div class="row">
							
						</div>
					</center>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-container-518723" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form class="form-horizontal" action="index.php?controller=configuracion&action=modificarContra" method="POST">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						×
					</button>
					<h4 class="modal-title" id="myModalLabel">
						Modificar Contraseña
					</h4>
				</div>
				<div class="modal-body">

					<fieldset>
						<!-- Password input-->
						<div class="form-group">
							<label class="col-md-4 control-label" for="txtPassAnt">Contraseña anterior</label>
							<div class="col-md-4">
								<input id="txtPassAnt" name="txtPassAnt" type="password" placeholder="contraseña anterior" class="form-control input-md">

							</div>
						</div>

						<!-- Password input-->
						<div class="form-group">
							<label class="col-md-4 control-label" for="txtNewPass">Nueva contraseña</label>
							<div class="col-md-4">
								<input id="txtNewPass" name="txtNewPass" type="password" placeholder="nueva contraseña" class="form-control input-md">								
								<input type="hidden" name="txtCodiCola" value="<?php echo $codiCola; ?>">
							</div>
						</div>

					</fieldset>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">
						Cerrar
					</button> 
					<button type="submit" class="btn btn-primary">
						Guardar
					</button>
				</div>
			</form>
		</div>

	</div>

</div>