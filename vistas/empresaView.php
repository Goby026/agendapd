<div class="container-fluid">
  <div class="row">
    <div class="col-md-2">
      <?php include 'sideBar.php'; ?>
    </div>
    <div class="col-md-10">
      <form class="form-horizontal">
        <fieldset>

          <!-- Form Name -->
          <legend>Registro de Empresa</legend>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="txtCodiEmpresa">Código Empresa</label>  
            <div class="col-md-2">
              <input id="txtCodiEmpresa" name="txtCodiEmpresa" type="text" placeholder="código" class="form-control input-md">

            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="txtNombreEmpresa">Empresa</label>  
            <div class="col-md-4">
              <input id="txtNombreEmpresa" name="txtNombreEmpresa" type="text" placeholder="empresa" class="form-control input-md">

            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="txtNomBreve">Nombre Breve</label>  
            <div class="col-md-4">
              <input id="txtNomBreve" name="txtNomBreve" type="text" placeholder="nombre breve" class="form-control input-md">

            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="txtRuc">RUC</label>  
            <div class="col-md-4">
              <input id="txtRuc" name="txtRuc" type="text" placeholder="número de ruc" class="form-control input-md">

            </div>
          </div>

          <!-- Select Basic -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="cmbDepartamento">Departamento</label>
            <div class="col-md-4">
              <select id="cmbDepartamento" name="cmbDepartamento" class="form-control">
                <option value="1">Option one</option>
              </select>
            </div>
          </div>

          <!-- Select Basic -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="cmbProvincia">Provincia</label>
            <div class="col-md-4">
              <select id="cmbProvincia" name="cmbProvincia" class="form-control">
                <option value="1">Option one</option>
              </select>
            </div>
          </div>

          <!-- Select Basic -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="cmbDistrito">Distrito</label>
            <div class="col-md-4">
              <select id="cmbDistrito" name="cmbDistrito" class="form-control">
                <option value="1">Option one</option>
              </select>
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="txtDieccion">Dirección</label>  
            <div class="col-md-4">
              <input id="txtDieccion" name="txtDieccion" type="text" placeholder="dirección" class="form-control input-md">

            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="txtTelefono01">Teléfono 01</label>  
            <div class="col-md-4">
              <input id="txtTelefono01" name="txtTelefono01" type="text" placeholder="teléfono 01" class="form-control input-md">

            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="txtTeléfono02">Teléfono 02</label>  
            <div class="col-md-4">
              <input id="txtTeléfono02" name="txtTeléfono02" type="text" placeholder="teléfono 02" class="form-control input-md">

            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class="col-md-4 control-label" for="txtWeb">WEB</label>  
            <div class="col-md-4">
              <input id="txtWeb" name="txtWeb" type="text" placeholder="web" class="form-control input-md">

            </div>
          </div>

          <!-- Button -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="btnGuardar">Registrar Empresa</label>
            <div class="col-md-4">
              <button id="btnGuardar" name="btnGuardar" class="btn btn-primary">Registrar</button>
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
              #
            </th>
            <th>
              Product
            </th>
            <th>
              Payment Taken
            </th>
            <th>
              Status
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              1
            </td>
            <td>
              TB - Monthly
            </td>
            <td>
              01/04/2012
            </td>
            <td>
              Default
            </td>
          </tr>
          <tr class="active">
            <td>
              1
            </td>
            <td>
              TB - Monthly
            </td>
            <td>
              01/04/2012
            </td>
            <td>
              Approved
            </td>
          </tr>
          <tr class="success">
            <td>
              2
            </td>
            <td>
              TB - Monthly
            </td>
            <td>
              02/04/2012
            </td>
            <td>
              Declined
            </td>
          </tr>
          <tr class="warning">
            <td>
              3
            </td>
            <td>
              TB - Monthly
            </td>
            <td>
              03/04/2012
            </td>
            <td>
              Pending
            </td>
          </tr>
          <tr class="danger">
            <td>
              4
            </td>
            <td>
              TB - Monthly
            </td>
            <td>
              04/04/2012
            </td>
            <td>
              Call in to confirm
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>