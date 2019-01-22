<div class="container-fluid">
  <div class="row">
    <div class="col-md-2">
      <?php include 'sideBar.php'; ?>
    </div>
    <div class="col-md-10">      
      <form class="form-horizontal" action="index.php?controller=colaborador&action=get_datosColaborador" method="POST" enctype="multipart/form-data">
        <fieldset>

          <!-- Form Name -->
          <legend>Registro de Colaboradores</legend>

          <!-- Text input-->
          <!-- <div class="form-group">
            <label class="col-md-4 control-label" for="txtCodiCola">Código Colaborador</label>
            <div class="col-md-2">
              <input id="txtCodiCola" name="txtCodiCola" type="text" placeholder="código" class="form-control input-md" required="">

            </div>
          </div> -->

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="txtApePaterno">Apellido Paterno</label>  
            <div class="col-md-4">
              <input id="txtApePaterno" name="txtApePaterno" type="text" placeholder="apellido paterno" class="form-control input-md">

            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="txtApeMaterno">Apellido Materno</label>  
            <div class="col-md-4">
              <input id="txtApeMaterno" name="txtApeMaterno" type="text" placeholder="apellido materno" class="form-control input-md">

            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="txtNomCola">Nombres</label>  
            <div class="col-md-4">
              <input id="txtNomCola" name="txtNomCola" type="text" placeholder="nombres" class="form-control input-md">

            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="txtDni">DNI</label>  
            <div class="col-md-4">
              <input id="txtDni" name="txtDni" type="text" placeholder="dni" class="form-control input-md" required="">

            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="fechaNac">Fecha de Nacimiento</label>  
            <div class="col-md-4">
              <input id="fechaNac" name="fechaNac" type="date" placeholder="fecha de nacimiento" class="form-control input-md">

            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="txtCorreoCorpo">Correo Corporativo</label>  
            <div class="col-md-4">
              <input id="txtCorreoCorpo" name="txtCorreoCorpo" type="email" placeholder="correo corporativo" class="form-control input-md">

            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="txtCorreoPersonal">Correo Personal</label>  
            <div class="col-md-4">
              <input id="txtCorreoPersonal" name="txtCorreoPersonal" type="email" placeholder="correo personal" class="form-control input-md">

            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="txtCelCorpo">Número Cel. Corporativo</label>  
            <div class="col-md-4">
              <input id="txtCelCorpo" name="txtCelCorpo" type="text" placeholder="celular corporativo" class="form-control input-md">

            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="txtCelPersonal">Número Cel. Personal</label>  
            <div class="col-md-4">
              <input id="txtCelPersonal" name="txtCelPersonal" type="text" placeholder="celular personal" class="form-control input-md">

            </div>
          </div>

          <!-- Select Basic -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="cmbDepartamento">Departamento</label>
            <div class="col-md-4">
              <select id="cmbDepartamento" name="cmbDepartamento" class="form-control">

          <?php foreach($departamentos as $data): ?>
            <option value="<?php echo $data['codiDepar']; ?>"><?php echo $data['nombreDepar']; ?></option>
          <?php endforeach; ?>
                
              </select>
            </div>
          </div>

          <!-- Select Basic -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="cmbProvincia">Provincia</label>
            <div class="col-md-4">
              <select id="cmbProvincia" name="cmbProvincia" class="form-control">
                <?php foreach($provincias as $data): ?>
            <option value="<?php echo $data['codiProvin']; ?>"><?php echo $data['nombreProvin']; ?></option>
          <?php endforeach; ?>
              </select>
            </div>
          </div>

          <!-- Select Basic -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="cmbDistrito">Distrito</label>
            <div class="col-md-4">
              <select id="cmbDistrito" name="cmbDistrito" class="form-control">
                <?php foreach($distritos as $data): ?>
            <option value="<?php echo $data['codiDistri']; ?>"><?php echo $data['nombreDistri']; ?></option>
          <?php endforeach; ?>
              </select>
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="txtDireccion">Dirección</label>  
            <div class="col-md-4">
              <input id="txtDireccion" name="txtDireccion" type="text" placeholder="direccion" class="form-control input-md">

            </div>
          </div>

          <!-- File Button --> 
          <div class="form-group">
            <label class="col-md-4 control-label" for="txtImg">Imagen</label>
            <div class="col-md-4">
              <input id="txtImg" name="txtImg" class="input-file" type="file">
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="txtPass">Contraseña</label>  
            <div class="col-md-4">
              <input id="txtPass" name="txtPass" type="text" placeholder="contraseña" class="form-control input-md">

            </div>
          </div>

          <!-- Button -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="btnRegistrar">Registrar Colaborador</label>
            <div class="col-md-4">
              <button id="btnRegistrar" name="btnRegistrar" class="btn btn-default">Registrar</button>
            </div>
          </div>

        </fieldset>
      </form>


    </div>
  </div>
</div>

<hr>

<!-- tabla de colaboradores -->
<div class="container-fluid">
  <div class="row">
    <div class="col-md-2">
    </div>
    <div class="col-md-10">
      <table class="table">
        <thead>
          <tr>
            <th>
              APELLIDOS
            </th>
            <th>
              NOMBRES
            </th>
            <th>
              DNI
            </th>
            <th>
              CORREO COO.
            </th>
            <th>
              ESTADO
            </th>
            <th>
              ACCION
            </th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($colaboradores as $data): ?>
            <tr class="active">
              <td><?php echo $data['apePaterCola']." ".$data['apeMaterCola']; ?></td>
              <td><?php echo $data['nombreCola']; ?></td>
              <td><?php echo $data['dniCola']; ?></td>
              <td><?php echo $data['correoCorpoCola']; ?></td>
              <td>
                <?php
                if ($data['estado'] == 1) {
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

<!-- formulario de prueba para subir imagenes -->
<!-- <form action="index.php?controller=colaborador&action=get_datosColaborador" method="POST" enctype="multipart/form-data"> -->
  <!-- File Button --> 
          <!-- <div class="form-group">
            <label class="col-md-4 control-label" for="txtImg">Imagen</label>
            <div class="col-md-4">
              <input id="txtImg" name="txtImg" class="input-file" type="file">
            </div>
          </div>
        <input type="submit" name="" value="ENVIAR">
  
</form> -->
