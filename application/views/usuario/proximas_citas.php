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
		$("#buscar").click(function(){
			var codigo = $('#id').val();

			var param={"codigo":codigo};

			$.ajax({
				data:param,
				url: '<?=base_url()?>index.php/Consultas_ajax/ir_cita',
				type:'post',
				beforeSend:function(){
					$('#resultado').html("procesando");
				},
				success:function(response){
					$("#resultado").html(response);
				}
			});
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
				<th>Estado</th>
				<th>Placa</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
	<?php foreach($proximas as $valor){ ?>

			<tr>

				<td><input type="text" id="id" name="id" class="form-control" readonly value="<?php echo $valor['Id_cita'];?>"></td>
				<td><input type="text" name="fecha" class="form-control" readonly value="<?php echo $valor['Fecha_inicial'];?>"></td>
				<td><input type="text" name="km" class="form-control" readonly value="<?php echo $valor['Kilometraje'];?>"></td>
				<td><input type="text" name="estado" class="form-control" readonly value="<?php echo $valor['Estado'];?>"></td>
				<td><input type="text" name="placa" class="form-control" readonly value="<?php echo $valor['Vehiculos_Placa'];?>"></td>

				<td>
	<div class="btn-toolbar" role="toolbar">
			<div class="btn-group">
				<button type="submit" class="btn btn-primary btn-lg active" id="buscar">
					<span class="glyphicon glyphicon-circle-arrow-right">    Ir</span>
				</button>
 </div>

				</td>
			</tr>

			<?php }; ?>
		</tbody>
	</table>
</div>




</div>

		<div>
			<div class="panel panel-default">



				<table class="table table-striped">
					<thead>
					<tr>
						<th>Notas</th>
						<th>Hora</th>
						<th>Operacion</th>
						<th>Responsable</th>


					</tr>
				</thead>
				<tbody>


					<tr id="resultado">



					</tr>


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
