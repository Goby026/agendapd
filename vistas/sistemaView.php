<div class="container-fluid">
  <div class="row">
    <div class="col-md-2">
      <?php include 'sideBar.php'; ?>
    </div>
    <div class="col-md-10">
      <form class="form-horizontal" action="index.php?controller=sistema&action=get_datosS" method="POST">
        <fieldset>

          <!-- Form Name -->
          <legend>Gestión de Sistemas</legend>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="txtCodiSistema">Código de Sistema</label>  
            <div class="col-md-2">
              <input id="txtCodiSistema" name="txtCodiSistema" type="text" placeholder="código" class="form-control input-md" required="">

            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="txtNombre">Nombre Sistema</label>
            <div class="col-md-4">
              <input id="txtNombre" name="txtNombre" type="text" placeholder="sistema" class="form-control input-md" required="">

            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="txtNombreCorto">Nombre Corto</label>  
            <div class="col-md-4">
              <input id="txtNombreCorto" name="txtNombreCorto" type="text" placeholder="nombre corto" class="form-control input-md">

            </div>
          </div>

          <!-- Button -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="btnRegistrar">Registrar Sistema</label>
            <div class="col-md-4">
              <button id="singlebutton" name="btnRegistrar" class="btn btn-primary">Registrar</button>
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
              Sistema
            </th>
            <th>
              Nombre Breve
            </th>
            <th>
              Fecha Creación
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
              <td><?php echo $data['codiSistema']; ?></td>
              <td><?php echo $data['nombreSiste']; ?></td>
              <td><?php echo $data['nombreBreveSiste']; ?></td>
              <td><?php echo $data['fechaCreaSiste']; ?></td>
              <td>
                <?php
                if ($data['estaSiste'] == 1) {
                  # code...
                }
                 ?>
                <input type="checkbox" checked data-toggle="toggle">
                <!-- <?php echo $data['estaSiste']; ?> -->
              </td>
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


<!-- line modal -->
<div class="modal fade" id="squarespaceModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      <h3 class="modal-title" id="lineModalLabel">My Modal</h3>
    </div>
    <div class="modal-body">
      
            <!-- content goes here -->
      <form>
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
              </div>
              <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <input type="file" id="exampleInputFile">
                <p class="help-block">Example block-level help text here.</p>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox"> Check me out
                </label>
              </div>
              <button type="submit" class="btn btn-default">Submit</button>
            </form>

    </div>
    <div class="modal-footer">
      <div class="btn-group btn-group-justified" role="group" aria-label="group button">
        <div class="btn-group" role="group">
          <button type="button" class="btn btn-default" data-dismiss="modal"  role="button">Close</button>
        </div>
        <div class="btn-group btn-delete hidden" role="group">
          <button type="button" id="delImage" class="btn btn-default btn-hover-red" data-dismiss="modal"  role="button">Delete</button>
        </div>
        <div class="btn-group" role="group">
          <button type="button" id="saveImage" class="btn btn-default btn-hover-green" data-action="save" role="button">Save</button>
        </div>
      </div>
    </div>
  </div>
  </div>
</div>