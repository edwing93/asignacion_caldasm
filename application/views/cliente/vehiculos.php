<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="icon" href="<?=base_url()?>uploads/favicon.ico" type="image/gif">
<title>Vehiculos</title>

<!-- Bootstrap -->
<link href="<?=base_url()?>assets/css/bootstrap.css" rel="stylesheet">

<script>
$(document).ready(function(){


	$("#registrar").click(function(){
		var registrar= "registrar_vh";
		 $("#form").attr("action",registrar);
 });

	$("#eliminar").click(function(){
		var eliminar= "eliminar";
		 $("#form").attr("action",eliminar);
 });
 $("#modificar").click(function(){
	 var modificar	= "update_vehiculo";
		$("#form").attr("action",modificar);
});
 $("#btn_consultar").click(function(){
	 var busca	= "index.php/Validar/consulta";
		$("#form").attr("action",busca);
});
});

</script>

</head>
<body>

	<h3><?php  foreach($nit as $usuario){ echo $usuario['Nombres'];  };  ?>   </h3>
	<form action="<?=base_url()?>index.php/Op_cliente"><input type="submit" id="volver" class="btn btn-danger" value="Regresar"></input></form>

	<form action="" method="post" id="form">
<h1>Modulo de gestion de Vehiculos</h1>
      <div class="container">
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">

						<input  type="text" class="form-control" name="placa" value="" placeholder="Placa del Vehiculo">
						<input  type="text" class="form-control" name="referencia" value="" placeholder="Referencia del Vehiculo">
						<input  type="text" class="form-control" name="modelo" value="" placeholder="Modelo del Vehiculo">
						<input type="text" class="form-control" name="nit" value="<?php  foreach($nit as $usuario){ echo $usuario['Nit'];  };  ?>" readonly>

						<br><br>

						<input  type="submit" class="btn btn-success"  value="Registrar" id="registrar">
						<input  type="submit" class="btn btn-info"  value="Modificar" id="modificar">
						<input  type="submit" class="btn btn-danger"  value="Eliminar" id="eliminar">
        </div>

    </div>

</form>

<table border="2">
	<tr>
		<td>Placa</td>
		<td>Referencia</td>
		<td>Modelo</td>
	</tr>
	<tr>
		<?php foreach($consulta as $valor){ ?>
			<td><?php echo $valor['Placa']; ?></td>
			<td><?php echo $valor['Descripcion']; ?></td>
			<td><?php echo $valor['Modelo']; ?></td>
	</tr>
<?php }; ?>
</table>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?=base_url()?>assets/js/jquery-1.11.3.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?=base_url()?>assets/js/bootstrap.js"></script>
</body>
</html>
