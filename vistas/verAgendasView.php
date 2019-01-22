<div class="container-fluid">
	<div class="row">
		<div class="col-md-2">
			<?php include 'sideBar.php'; ?>
		</div>
		<div class="col-md-10">
			<div class="row">
				<div class="page-header">
				<h1 class="text-info">
					Calendarios <small>Colaboradores</small>
				</h1>
			</div>
			<span class="divider"></span>
			<div class="row">
				<div class="col-md-4">
					<label>Sede:</label><small> <?php echo $_GET['codiEmpre']; ?></small>
				</div>
				<div class="col-md-4">
					<div class="btn-group">						 
						<button class="btn btn-default">
							Seleccionar Area
						</button>
						<button data-toggle="dropdown" class="btn btn-default dropdown-toggle">
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu">
							<?php foreach($areas as $area):?>
								<li>
									<a href="index.php?controller=verAgendas&codiArea=<?php echo $area['codiArea'];?>&codiEmpre=<?php echo $_GET['codiEmpre']; ?>"><?php echo $area['nombreArea']; ?></a>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
				<div class="col-md-4">
					<!-- buscador -->
					<form class="form-horizontal">
						<fieldset>
							<!-- Search input-->
							<div class="form-group">
								<label class="col-md-4 control-label" for="txtBuscar">Colaborador</label>
								<div class="col-md-6">
									<input id="txtBuscar" name="txtBuscar" type="search" placeholder="nombre" class="form-control input-md">
								</div>
							</div>
						</fieldset>
					</form>
					<!-- FIN buscador -->
				</div>
			</div>
			</div>
			<div class="row">
				<table class="table">
					<thead>
						<tr>
							<th class="text-primary">
								IMAGEN
							</th>
							<th class="text-primary">
								NOMBRES Y APELLIDOS
							</th class="text-primary">
							<th class="text-primary">
								CARGO
							</th>
							<th class="text-primary">
								ACCION
							</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($colaboradores as $data):?>
							<tr class="active">
								<td>
									<img alt="Bootstrap Thumbnail First" src="style/img/colaboradores/<?php echo $data['fotoCola']; ?>" style="width: 50px;"/>
								</td>
								<td class="text-dark">									
										<?php echo $data['apePaterCola']." ".$data['apeMaterCola']." ".$data['nombreCola']; ?>
								</td>
								<td class="text-dark">
									<?php echo $data['nombreCargo']; ?>
								</td>
								<td class="text-dark">
									<a class="btn btn-primary" href="index.php?controller=VerAgendas&action=verAgendaColaborador&codiCola=<?php echo $data['codiCola']?>">Ver Agenda</a>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>				
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$('input#txtBuscar').quicksearch('table tbody tr');
</script>