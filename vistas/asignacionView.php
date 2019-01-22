<div class="container-fluid">
	<div class="row">
		<div class="col-md-2">
			<?php include 'sideBar.php'; ?>
		</div>
		<div class="col-md-10">
			<div class="row">
				<div class="page-header">
					<h1 class="text-info">
						Asignación <small>Colaboradores</small>
					</h1>
				</div>
			<span class="divider"></span>
			<div class="row">
				<div class="col-md-4">
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
									<a href="index.php?controller=asignacion&action=filtrarArea&codiArea=<?php echo $area['codiArea'];?>"><?php echo $area['nombreArea']; ?></a>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
				<div class="col-md-4">
				</div>
			</div>
			<hr>
			<!-- tabla de colaboradores -->
			<input name="cbTodos" id="cbTodos" type="checkbox" onclick="marcar(this);" /><label for="cbTodos" style="color: #398ED0; cursor: pointer;">&nbsp;&nbsp;Todos</label>			
			
			<!-- <form role="form" action="index.php?controller=AsignarVarios" method="POST"> -->
			<form role="form" action="index.php?controller=asignarVarios" method="POST">
				<table class="table">
					<thead>
						<tr>
							<th>
								SEL.
							</th>
							<th>
								COLABORADOR
							</th>
							<th>
								HISTORIAL
							</th>
						</tr>
					</thead>
					<tbody>				
						<?php
						if (isset($colaboradorArea)) {
							foreach($colaboradorArea as $data):
								?>
								<tr class="active">
									<td>
										<input id="txtId[<?php echo $data['codiCola']; ?>]" type="checkbox" name="cbCola[]" value="<?php echo $data['codiCola']; ?>"><label for="txtId[<?php echo $data['codiCola']; ?>]" style="cursor: pointer;">&nbsp;&nbsp;Seleccionar</label>
									</td>
									<td><?php echo $data['nombreCola']." ".$data['apePaterCola']." ".$data['apeMaterCola']; ?></td>
									<td>
										<!-- <form action="index.php?controller=historial&action=histoCola" method="POST">
											<input type="hidden" name="txtCodiCola" value="<?php echo $data['codiCola']; ?>">
											<input type="submit" name="btnHistorial" value="Historial" class="btn btn-primary">
										</form> -->
										<a href="index.php?controller=historial&action=histoCola&txtCodiCola=<?php echo $data['codiCola']; ?>" class="btn btn-info">Historial</a>
									</td>
								</tr>
							<?php endforeach;
						}

						?>
					</tbody>
				</table>
				<button type="submit" class="btn btn-success">
						Asignar Actividad
				</button>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
	function marcar(source)
	{
		checkboxes=document.getElementsByTagName('input'); //obtenemos todos los controles del tipo Input
		for(i=0;i<checkboxes.length;i++) //recoremos todos los controles
		{
			if(checkboxes[i].type == "checkbox") //solo si es un checkbox entramos
			{
				checkboxes[i].checked=source.checked; //si es un checkbox le damos el valor del checkbox que lo llamó (Marcar/Desmarcar Todos)
			}
		}
	}
</script>