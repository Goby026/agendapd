	<?php 
	if (isset($_REQUEST['eliminar_evento'])) {	
		?>
		<div class="page-header">
			<h1>
				Eliminar <small>actividad</small>
			</h1>
		</div>
		<form action="index.php?controller=posponer&action=eliminar" method="POST">
			<label for="to">Motivo</label>
			<textarea name="motivoEliminar" id="editor1" rows="10" cols="80" required="">
			</textarea>
			<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
			<div class="modal-footer">
				<button type="submit" class="btn btn-danger"><i class="fa fa-trash-o"></i> Eliminar</button>
			</div>
		</form>
		<?php
	}else {
		?>
		<div class="page-header">
			<h1>
				Posponer <small>actividad</small>
			</h1>
		</div>
		<form action="index.php?controller=posponer&action=posponer" method="POST">
			<div class="modal-body">
				<label for="from">Inicio</label>
				<div class='input-group date' id='from'>
					<input type='text' id="from" name="from" class="form-control" required/>
					<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
				</div>

				<label for="to">Final</label>
				<div class='input-group date' id='to'>
					<input type='text' name="to" id="to" class="form-control" required="" />
					<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
				</div>
				<script type="text/javascript">
					$(function () {
						$('#from').datetimepicker({
							language: 'es',
							minDate: new Date()
						});
						$('#to').datetimepicker({
							language: 'es',
							minDate: new Date()
						});

					});
				</script>
			</div>
			<label for="to">Motivo</label>
			<textarea name="motivoPosponet" id="editor1" rows="10" cols="80">
			</textarea>
			<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
			<div class="modal-footer">
				<button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Posponer</button>
			</div>
		</form>
		<?php
	} 
	?>
	

	<script type="text/javascript">
		CKEDITOR.replace( 'editor1' );
	</script>