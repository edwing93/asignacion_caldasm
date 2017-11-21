<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="<?=base_url()?>uploads/favicon.ico" type="image/gif">
<title>Proximas Citas</title>

<!-- Bootstrap -->
<link href="<?=base_url()?>assets/css/bootstrap.css" rel="stylesheet">

</head>
<script>
$(document).ready(function(){



 $('#aplazar').click(function(){
	 $('#fecha').modal();
 });


});

</script>


<body>

	<form action="<?=base_url()?>index.php/Op_usuarios/gestion_citas"><input type="submit" id="volver" class="btn btn-danger" value="Regresar"></input></form>

<div class="container">

	<div class="panel panel-default">

	  <div class="panel-heading">Proximas Citas</div>

	  <table class="table table-striped">
			<thead>
			<tr>
				<th>Codigo</th>
				<th>Fecha</th>
				<th>Km</th>
				<th>Notas</th>
				<th>Estado</th>
				<th>Placa</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
	<?php foreach($proximas as $valor){ ?>
<form class="form-inline" action="confirmar_cita" method="post" id="form">
			<tr>

				<td><input type="text" id="id" name="id" class="form-control" readonly value="<?php echo $valor['Id_cita'];?>"></td>
				<td><input type="text" name="fecha" class="form-control" readonly value="<?php echo $valor['Fecha_inicial'];?>"></td>
				<td><input type="text" name="km" class="form-control" readonly value="<?php echo $valor['Kilometraje'];?>"></td>
				<td><input type="text" name="notas" class="form-control" readonly value="<?php echo $valor['Notas'];?>"></td>
				<td><input type="text" name="estado" class="form-control" readonly value="<?php echo $valor['Estado'];?>"></td>
				<td><input type="text" name="placa" class="form-control" readonly value="<?php echo $valor['Vehiculos_Placa'];?>"></td>

				<td>
	<div class="btn-toolbar" role="toolbar">
			<div class="btn-group">
				<button type="submit" class="btn btn-success" id="confirmar">
					<span class="glyphicon glyphicon-ok"></span>
				</button>
				</form>
				<button type="submit" class="btn btn-info" id="aplazar">
					<span class="glyphicon glyphicon-transfer"></span>
				</button>
 			</div>

				</td>
			</tr>
			<!-- Ventana Emergente para Aplazar -->
			<div class="modal" id="fecha" tabindex="-1" role="dialog">
			 <div class="modal-dialog" role="document">
			   <div class="modal-content">
			     <div class="modal-header">
			       <h2 class="modal-title">Aplazar Cita</h2>
			     </div>
			     <div class="modal-body">
			   <div class="container">
			     <form class="form-inline" action="aplazar_cita" method="post">
			       <div class="form-group">
							<label>Cita</label> <input type="text" id="id" name="id" class="form-control" readonly value="<?php echo $valor['Id_cita'];?>">
			         <label>Fecha</label>
			         <input type="date" class="form-control" name="fecini"></input>
			       </div>
			   </div>
			     </div>
			     <div class="modal-footer">
			       <input id="enviar" type="submit" class="btn btn-success" value="Aceptar"></input>
			       <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
			     </div>
			     </form>
				 	</div>
				</div>
			</div>


			<!-- Ventana Emergente para Aplazar -->


		<?php }; ?>
				</tbody>
			</table>
		</div>

	</div>


	</div>







<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?=base_url()?>assets/js/jquery-1.11.3.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?=base_url()?>assets/js/bootstrap.js"></script>
</body>
</html>
