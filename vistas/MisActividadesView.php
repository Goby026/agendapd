<div class="container-fluid">
	<div class="row">
		<div class="col-md-2">
			<?php include 'sideBar.php'; ?>
		</div>
		<?php $datos_cola = $colaborador['nombreCola']." ".$colaborador['apePaterCola']." ".$colaborador['apeMaterCola']; ?>
		<div class="col-md-10">
			<div class="page-header">
				<h1>
					Mis Actividades<small> <?php echo $datos_cola;?></small>
				</h1>
				<?php 
					if (isset($_GET['error'])) {

						if ($_GET['error'] == 1) {
							?>
							<div class="alert alert-success">
								<strong>Correcto!</strong> Se modificaron los datos de la actividad.
							</div>
							<?php
						}else if($_GET['error'] == 0){
							?>
							<div class="alert alert-danger">
								<strong>Error!</strong> No se pudo actualizar los datos.
							</div>
							<?php
						}else{
							?>
							<div class="alert alert-danger">
								<strong>Error!</strong> Usted no asignó la actividad, no puede modificar los datos.
							</div>
							<?php
						}
						?>
						<?php
					}
				 ?>
			</div>
			<div class="row">
				<form action="index.php?controller=MisActividades&action=mostrarActividades" method="POST">
					<div class="col-md-2">
						<!-- Desde: <input type="text" id="txtInicio" class="form-control" required="" name="txtInicio" placeholder="dd/MM/yyyy 00:00"> -->
						Desde:
						<div class='input-group date' id='txtInicio'>
							<input type='text' class="form-control" name="inicio"/>
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
					<div class="col-md-2">
						<!-- Hasta: <input type="text" id="txtFinal" class="form-control" required="" name="txtFinal" placeholder="dd/MM/yyyy 00:00"> -->
						Hasta:
						<div class='input-group date' id='txtFinal'>
							<input type='text' class="form-control" name="final" />
							<span class="input-group-addon">
								<span class="glyphicon glyphicon-calendar"></span>
							</span>
						</div>
					</div>
					<div class="col-md-4">
						<br>
						<button class="btn btn-primary">Mostrar</button>
					</div>
					<div class="col-md-4">
						<div class='col-sm-6'>
				            <div class="form-group">
				                
				            </div>
				        </div>
					</div>
				</form>				
			</div>
			<hr>
			<div class="row">
				<div class="col-md-12">
					<?php 
					if (isset($participantes)) {
					?>
						<div class="row" style="margin-top: 10px;">
							<div class="col-md-4">
							  <h4>Actividad</h4>
							  <hr>
							  <div class="form-group has-success has-feedback">
							  	<label class="control-label" for="inputSuccess2">TITULO</label>
							  	<input type="text" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status" value="<?php echo $actividad['title'];?>" readonly>							  	
							  	<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
							  	<span id="inputSuccess2Status" class="sr-only">(success)</span>
							  </div>
							  <div class="form-group has-success has-feedback">
							  	<label class="control-label" for="inputSuccess2">INICIO</label>
							  	<input type="text" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status" value="<?php echo $actividad['inicio_normal'];?>" readonly>
							  	<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
							  	<span id="inputSuccess2Status" class="sr-only">(success)</span>
							  </div>
							  <div class="form-group has-success has-feedback">
							  	<label class="control-label" for="inputSuccess2">FIN</label>
							  	<input type="text" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status" value="<?php echo $actividad['final_normal'];?>" readonly>
							  	<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
							  	<span id="inputSuccess2Status" class="sr-only">(success)</span>
							  </div>								
							  <div class="form-group has-warning has-feedback">
							  	<label class="control-label" for="inputWarning2">DESCRIPCION</label>
							  	<textarea class="form-control" rows="3"><?php echo $actividad['notaActi'];?></textarea>
							  	<span class="glyphicon glyphicon-warning-sign form-control-feedback" aria-hidden="true"></span>
							  	<span id="inputWarning2Status" class="sr-only">(warning)</span>
							  </div>
							  <div class="form-group has-success has-feedback">
							  	<label class="control-label" for="inputSuccess2">LUGAR</label>
							  	<input type="text" class="form-control" id="inputSuccess2" aria-describedby="inputSuccess2Status" value="<?php echo $actividad['ubiActi'];?>" readonly>
							  	<span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
							  	<span id="inputSuccess2Status" class="sr-only">(success)</span>
							  </div>
							  <div class="row">
							  	<a id="modal-758326" href="#modal-container-758326" role="button" class="btn btn-primary btn-warning" data-toggle="modal"><span class="glyphicon glyphicon-pencil"></span> Modificar</a>
							  </div>

							</div>
							<div class="col-md-4">
								<div class="row">
									<div class="col-md-4">
										<h4>Participante(s)</h4>
									</div>
									<div class="col-md-4">
									</div>
									<div class="col-md-4">
										<button style="float: right;" class="btn btn-success" onclick="verIdActi('<?php echo $actividad['id'];?>')">Agregar</button>
										<!-- <button style="float: right;" class="btn btn-warning" onclick="cuenta('<?php echo count($participantes);?>')">Contar</button> -->
									</div>
								</div>
								<hr>
								<table class="table">
									<thead>
										<tr>
											<th>
												Nombres
											</th>
											<th>
												Apellidos
											</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($participantes as $datos) { ?>
										<tr class="table-active">
											<td>
												<?php echo $datos['nombreCola']; ?>												
											</td>
											<td>
												<?php echo $datos['apePaterCola']." ".$datos['apeMaterCola'];?>
											</td>
											<td>
												<!-- <button class="btn btn-danger" onclick="quitarColaborador('<?php echo count($participantes);?>','<?php echo $datos['codiCola']; ?>')">Eliminar</button> -->
												<!-- <a href="index.php?controller=MisActividades&action=quitarColaborador" >Eliminar</a> -->
												<form action="index.php?controller=MisActividades&action=quitarColaborador" method="POST">
													<input type="hidden" name="txt_codiActi" value="<?php echo $actividad['id'];?>">
													<input type="hidden" name="txt_codiCola" value="<?php echo $datos['codiCola']; ?>">
													<input type="submit" class="btn btn-xs btn-danger" name="" value="Eliminar">
												</form>
											</td>
										</tr>
										<?php  } ?>
									</tbody>
								</table>
							</div>
							<div class="col-md-4">
							</div>
						</div>
						
					<?php
					}else{
					?>
					<table class="table">
						<thead>
							<tr>
								<th>
									Inicio
								</th>
								<th>
									Fin
								</th>
								<th>
									Tipo Actividad
								</th>
								<th>
									Asunto
								</th>
								<th>
									Descripción
								</th>
								<th>
									Ubicación
								</th>
								<th>
									Estado
								</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							if (isset($his)) {
							foreach($his as $data):
								?>
								<tr class="active">
									<td><?php echo $data['inicio_normal']; ?></td>
									<td><?php echo $data['final_normal']; ?></td>
									<td><?php echo $data['nombreTipoActi']; ?></td>
									<td><?php echo $data['title']; ?></td>
									<td><?php echo $data['notaActi']; ?></td>
									<td><?php echo $data['ubiActi']; ?></td>
									<?php 
									$avance = $data['porcenAvanActi'];
									if ($avance >= 0 && $avance < 40) {
										?>
											<td class="alert alert-danger" style="background-color: #F39C9C;"><?php echo " % ".$data['porcenAvanActi']; ?></td>
										<?php
									}else if ($avance >= 40 && $avance < 70) {
										?>
											<td class="alert alert-warning" style="background-color: #EAB45E;"><?php echo " % ".$data['porcenAvanActi']; ?></td>
										<?php
									}else if ($avance >= 70 && $avance < 101) {
										?>
											<td class="alert alert-succes" style="background-color: #6CE159;"><?php echo " % ".$data['porcenAvanActi']; ?></td>
									<?php
									}
								 	?>
								 	<td>
								 		<form action="index.php?controller=MisActividades&action=verParticipantes" method="POST">
								 			<input type="submit" name="<?php echo $data['id'];?>" value="Detalles" class="btn btn-success">
								 			<input type="hidden" name="title" value="<?php echo $data['title'];?>">
								 			<input type="hidden" name="ubiActi" value="<?php echo $data['ubiActi'];?>">
								 			<input type="hidden" name="horaIniActi" value="<?php echo $data['horaIniActi'];?>">
								 			<input type="hidden" name="id" value="<?php echo $data['id'];?>">
								 		</form>
								 		<!-- <a href="index.php?controller=MisActividades&action=verParticipantes" class="btn btn-success">Participantes</a> -->
									</td>
								</tr>
							<?php endforeach; 
						}?>
						</tbody>
					</table>
					<?php
					}
					 ?>					
				</div>
			</div>
		</div>
	</div>
</div>

<!-- modal modificar detalle de actividad -->
<div class="modal fade" id="modal-container-758326" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form role="form" action="index.php?controller=MisActividades&action=modificarDetalleActi" method="POST">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						×
					</button>
					<h4 class="modal-title" id="myModalLabel">
						Modificar parámetros de actividad
					</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="exampleInputEmail1">
							TITULO
						</label>
						<input type="" name="txt_Titulo" class="form-control" value="<?php echo $actividad['title'];?>">
						<input type="hidden" name="txt_idActi" value="<?php echo $actividad['id'];?> ">
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">
							INICIO
						</label>
						<input type="" name="txt_Inicio" class="form-control" value="<?php echo $actividad['inicio_normal'];?>">
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">
							FIN
						</label>
						<input type="" name="txt_Final" class="form-control" value="<?php echo $actividad['final_normal'];?>">
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">
							DESCRIPCION
						</label>
						<textarea class="form-control" name="txt_NotaActi" rows="3"><?php echo $actividad['body'];?></textarea>
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1">
							LUGAR
						</label>
						<input type="" name="txt_Lugar" class="form-control" value="<?php echo $actividad['ubiActi'];?>">
					</div>
					<!-- input para enviar los participantes -->
					<?php 
					$par = array(); 
					foreach ($participantes as $participante){
						$par[] = $participante['correoCorpoCola'];
					}
					?>
					<input type="hidden" name="codiCola" value='<?php echo base64_encode(serialize($par)); ?>'>
					<?php 
						if($actividad['codiColaAsig'] == $colaborador['codiCola']){
							?>
							<input type="hidden" name="datos_cola_asig" value="<?php echo $datos_cola;?>">
							<?php
						}else{
							?>
							<input type="hidden" name="datos_cola_asig" value="noAsigno">
							<?php
						}
					?>					
				</div>
				<div class="modal-footer">

					<button type="button" class="btn btn-default" data-dismiss="modal">
						Cerrar
					</button>
					<button type="submit" class="btn btn-primary">
						Modificar
					</button>
				</div>
			</form>	
		</div>

	</div>

</div>
<!-- FIN modal modificar detalle de actividad -->

<script type="text/javascript">
	$(function () {
		$('#txtInicio').datetimepicker({
			language: 'es'
		});
		$('#txtFinal').datetimepicker({
			language: 'es'
		});

	});

	CKEDITOR.replace( 'txt_NotaActi' );
	
</script>