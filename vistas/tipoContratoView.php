<div class="container-fluid">
  <div class="row">
    <div class="col-md-2">
      <?php include 'sideBar.php'; ?>
    </div>
    <div class="col-md-10">
      <form class="form-horizontal">
        <fieldset>

          <!-- Form Name -->
          <legend>Tipo de Contrato</legend>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="txtCodigo">Código tipo de contrato</label>  
            <div class="col-md-2">
              <input id="txtCodigo" name="txtCodigo" type="text" placeholder="código" class="form-control input-md">

            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="txtTipoContrato">Tipo de Contrato</label>  
            <div class="col-md-4">
              <input id="txtTipoContrato" name="txtTipoContrato" type="text" placeholder="tipo de contrato" class="form-control input-md">

            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="txtNomCorto">Nombre Breve</label>  
            <div class="col-md-4">
              <input id="txtNomCorto" name="txtNomCorto" type="text" placeholder="abreviación" class="form-control input-md">

            </div>
          </div>

          <!-- Button -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="btnRegistrar">Registrar</label>
            <div class="col-md-4">
              <button id="btnRegistrar" name="btnRegistrar" class="btn btn-primary">Registrar</button>
            </div>
          </div>

        </fieldset>
      </form>
    </div>
  </div>
</div>

<hr>

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
              Tipo Contrato
            </th>
            <th>
              Nombre Breve
            </th>
            <th>
              Estado
            </th>
            <th>
              Accion
            </th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($tipoContratos as $data): ?>
            <tr class="active">
              <td><?php echo $data['codiTipoContra']; ?></td>
              <td><?php echo $data['nombreTipoContra']; ?></td>
              <td><?php echo $data['nombreBreveTipoContra']; ?></td>              
              <td>
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