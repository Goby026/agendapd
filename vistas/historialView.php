<div class="container-fluid">
	<div class="row">
		<div class="col-md-2">
			<?php include 'sideBar.php'; ?>
		</div>
		<div class="col-md-10">
			<div class="row">
				<div class="row">
					<div class="col-md-10">
						<div class="page-header">
							<h1>
								Historial de: <small><?php echo $col['nombreCola']." ".$col['apePaterCola']; ?></small>
							</h1>
						</div>
					</div>
					<div class="col-md-2">
						<img alt="Bootstrap Image Preview" style="width: 40%; float: right; margin-right: 30px;" src="style/img/colaboradores/<?php echo $col['fotoCola'];?>" />						
					</div>
				</div>
			<span class="divider"></span>
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
					<?php foreach($his as $data):?>
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
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>