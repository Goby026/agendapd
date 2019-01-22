<?php
// var_dump($_GET);
date_default_timezone_set('America/Lima');
// echo "El id de usuario es: ".$_GET['id'];
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-2">
			<?php include 'sideBar.php'; ?>
		</div>
		<div class="col-md-10">
			<div class="page-header">
				<h1>
					Asignar <small>Colaborador(es)</small>
				</h1>
			</div>
			<div class="row">
				<div class="col-md-8">
				<?php 
					if (count($col)<=1){
						?>
						<form action="index.php?controller=Calendario&action=get_datosC" method="POST">
						<?php
					}else{
						?>
						<form action="index.php?controller=AsignarVarios&action=regActiColaboradores" method="POST">
						<?php
					}
				 ?>
						<div class="modal-body">
							<?php if (count($col)<=1) {
								foreach ($col as $val) {
								?>
								<label for="txtColaborador">Colaborador</label>
								<input type="text" name="txtColaborador" value="<?php echo $val['nombreCola']." ".$val['apePaterCola']; ?>" class="form-control">
								<input type="hidden" id="codiCola" name='codiCola' value='<?php echo $val['codiCola']; ?>'>
								<?php
								}
							}else{
								?>
								<label for="txtColaborador">Colaboradores</label>
								<input type="text" value="VARIOS" class="form-control">
								<input type="hidden" name="codiCola" value='<?php echo base64_encode(serialize($col)); ?>' class="form-control">
								<?php
							} ?>
							<label for="from">Inicio</label>
							<div class='input-group date' id='from'>
								<input type='text' id="from" name="from" class="form-control" />
								<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
							</div>

							<label for="to">Final</label>
							<div class='input-group date' id='to'>
								<input type='text' name="to" id="to" class="form-control" />
								<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
							</div>
							<label for="tipo">Tipo de Actividad</label>
							<select class="form-control" name="codiTipoActi" id="tipo">
								<?php foreach($tipoActividades as $data): ?>
									<option value="<?php echo $data['codiTipoActi'];?> "><?php echo $data['nombreTipoActi']; ?></option>
								<?php endforeach; ?>
							</select>
							<br>
							<label for="tipo">Relevancia</label>
							<select class="form-control" name="imporActi" id="imporActi">
								<option value="event-success">Baja</option>
		                        <option value="event-warning">Media</option>
		                        <option value="event-important">Alta</option>
							</select>
							<label for="title">Título</label>
							<input type="text" required autocomplete="off" name="title" class="form-control" id="title" placeholder="Introduce un título">
							<label for="body">Evento</label>
							<!-- <textarea id="body" name="event" required class="form-control" rows="3"></textarea> -->
							<textarea id="body" name="event" required rows="2"></textarea>
							<label for="ubiActi">Ubicación</label>
							<!-- Select Basic -->
							<select id="cmbUbiActi" name="cmbUbiActi" class="form-control">
								<option value="Sala de reuniones Perú Data">Sala de reuniones Perú Data</option>
								<option value="Banco Crédito del Perú (BCP)">Banco Crédito del Perú (BCP)</option>
								<option value="Cámara de comercio Huancayo">Cámara de comercio Huancayo</option>
								<option value="Oficina Lima">Oficina Lima</option>
								<option value="otro">Otro</option>
							</select>
							<br>
							<input type="text" required autocomplete="off" name="ubiActi" class="form-control" id="ubiActi" placeholder="Ubicación" disabled="">
							<input type="hidden" name="txtColAsig" value="<?php echo $_SESSION['poo_agenda=user']; ?>"> <!-- el usuario DEBE ser el dni sino se rompe la asignacion -->
							<script type="text/javascript">
								$(function () {
									$('#from').datetimepicker({
										language: 'es',
										//minDate: new Date()
									});
									$('#to').datetimepicker({
										language: 'es',
										//minDate: new Date()
									});

								});
							</script>

						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Agregar</button>
						</div>
					</form>
				</div>
				<div class="col-md-4">
					<h3>
						Colaborador(es)<a id="modal-437785" href="#modal-container-437785" role="button" class="btn btn-primary btn-warning pull-right" data-toggle="modal"><span class="glyphicon glyphicon-user"></span>+</a>
					</h3>
					<div class="row">
						<div class="col-md-12">
							<table class="table">
								<tbody>
									<?php
									foreach ($col as $val) {
										?>
										<tr class="success">
											<td>
												<?php echo $val['nombreCola']." ".$val['apePaterCola']."<br>"; ?>
											</td>
											<td>
												<!-- <a href="#" class="btn btn-xs btn-danger pull-right"><span class="glyphicon glyphicon-trash"></span> </a> -->
											</td>
										</tr>
										<?php								
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modal-container-437785" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">

				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					×
				</button>
				<h4 class="modal-title" id="myModalLabel">
					Añadir colaboradores
				</h4>				
			</div>
			<div class="modal-body">
				<table class="table">
					<tbody>
						<?php foreach ($colaboradores as $data) { ?>
						<tr class="active">
							<td>
								<?php echo $data['nombreCola']; ?>
							</td>
							<td>
								<?php echo $data['apePaterCola']; ?>
							</td>
							<td>
								<?php echo $data['apeMaterCola']; ?>
							</td>
							<td>
							<form action="index.php?controller=AsignarVarios&action=AddCol" method="POST">
								<input type="submit" class="btn btn-success" value="+">
								<input type="hidden" name="mas" value="<?php echo $data['dniCola']; ?>">
								<input type="hidden" name="cbCola" value='<?php echo base64_encode(serialize($col)); ?>'>
							</form>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
			<div class="modal-footer">

				<button type="button" class="btn btn-default" data-dismiss="modal">
					Cerrar
				</button> 
				<!-- <button type="button" class="btn btn-primary">
					Save changes
				</button> -->
			</div>
		</div>

	</div>

</div>

<script type="text/javascript">	
	$(document).ready(function(){
		CKEDITOR.replace( 'body' );
		$("select[name=cmbUbiActi]").change(function(){
			//alert($('select[name=cmbUbiActi]').val());
			if ($('select[name=cmbUbiActi]').val()=='otro') {
				$("#ubiActi").removeAttr("disabled");
			}else{
				$("#ubiActi").attr('disabled', 'disabled');
			}
			//var a = $('input[name=cmbUbiActi]').val($(this).val());			
		});
	});
</script>
