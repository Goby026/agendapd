<div class="container-fluid">
	<div class="row">
		<div class="col-md-2">
			<?php include 'sideBar.php'; ?>
		</div>
		<div class="col-md-10">
			<form class="form-horizontal" action="index.php?controller=tipoActividad&action=get_datosTA" method="POST">
				<fieldset>

					<!-- Form Name -->
					<legend>Registrar Tipo de Actividad</legend>

					<!-- Text input-->
					<div class="form-group">
						<label class="col-md-4 control-label" for="txtCodiTipoActividad">Código Tipo Actividad</label>  
						<div class="col-md-2">
							<input id="txtCodiTipoActividad" name="txtCodiTipoActividad" type="text" placeholder="código" class="form-control input-md">

						</div>
					</div>

					<!-- Text input-->
					<div class="form-group">
						<label class="col-md-4 control-label" for="txtNombre">Nombre Tipo Actividad</label>  
						<div class="col-md-4">
							<input id="txtNombre" name="txtNombre" type="text" placeholder="tipo de actividad" class="form-control input-md">

						</div>
					</div>

					<!-- Text input-->
					<div class="form-group">
						<label class="col-md-4 control-label" for="txtNombreBreve">Nombre Breve</label>  
						<div class="col-md-4">
							<input id="txtNombreBreve" name="txtNombreBreve" type="text" placeholder="nombre breve" class="form-control input-md">

						</div>
					</div>

					<!-- Text input-->
					<div class="form-group">
						<label class="col-md-4 control-label" for="txtColorActividad">Relevancia Actividad</label>  
						<div class="col-md-4">
							<!-- <input id="txtColorActividad" name="txtColorActividad" type="text" placeholder="color" class="form-control input-md"> -->

              <select class="form-control" name="txtColorActividad" id="txtColorActividad">
                <option value="event-info">Información</option>
                <option value="event-success">Exito</option>
                <option value="event-important">Importante</option>
                <option value="event-warning">Advertencia</option>
                <option value="event-special">Especial</option>
              </select>

						</div>
					</div>

					<!-- Button -->
					<div class="form-group">
						<label class="col-md-4 control-label" for="btnRegistrar">Registrar Tipo Actividad</label>
						<div class="col-md-4">
							<button id="btnRegistrar" name="btnRegistrar" class="btn btn-primary">Registrar</button>
						</div>
					</div>

				</fieldset>
			</form>

		</div>
	</div>
</div>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-10">
      <table class="table">
        <thead>
          <tr>
            <th>
              Código
            </th>
            <th>
              Nombre Actividad
            </th>
            <th>
              Nombre Breve
            </th>
            <th>
              Color
            </th>
            <th>
              Estado
            </th>
            <th>
              Acción
            </th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($query as $data): ?>
            <tr class="active">
              <td><?php echo $data['codiTipoActi']; ?></td>
              <td><?php echo $data['nombreTipoActi']; ?></td>
              <td><?php echo $data['nombreBreveTipoActi']; ?></td>
              <td><?php echo $data['colorActi']; ?></td>
              <td>
                <?php 
                if ($data['estaActi'] == 1) {
                  # code...
                }
                 ?>
                <input type="checkbox" checked data-toggle="toggle">
                <!-- <?php echo $data['estaSiste']; ?> --></td>
              <td>
                <!-- <a href="index.php?controller=sistema&action=get_datosS&id=<?php echo $data['codiSistema']?>" class="btn btn-primary">Editar</a> -->                
                <a href="#squarespaceModal" data-toggle="modal" class="btn btn-primary">Editar</a>
                <a href="#squarespaceModal" data-toggle="modal" class="btn btn-danger">Eliminar</a>
                <!-- <a href="index.php?controller=confirmarDelete&id=<?php echo $data['id']?>" class="btn btn-danger">Eliminar</a> -->
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>