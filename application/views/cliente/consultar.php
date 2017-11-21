 <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="<?=base_url()?>uploads/favicon.ico" type="image/gif">
<title>Consulta Citas</title>

<!-- Bootstrap -->
<link href="<?=base_url()?>assets/css/bootstrap.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>



<body>
	<h3><?php  foreach($nit as $usuario){ echo $usuario['Nombres'];  };  ?>   </h3>
	<form action="<?=base_url()?>index.php/Op_cliente"><input type="submit" id="volver" class="btn btn-danger" value="Regresar"></input></form>




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
  	<?php foreach($consulta as $valor){ ?>
  <form class="form-inline" action="cancela" method="post" id="form">
  			<tr>

  				<td><input type="text" id="id" name="id" class="form-control" readonly value="<?php echo $valor['Id_cita'];?>"></td>
  				<td><input type="text" name="fecha" class="form-control" readonly value="<?php echo $valor['Fecha_inicial'];?>"></td>
  				<td><input type="text" name="km" class="form-control" readonly value="<?php echo $valor['Kilometraje'];?>"></td>
  				<td><input type="text" name="notas" class="form-control" readonly value="<?php echo $valor['Notas'];?>"></td>
  				<td><input type="text" name="estado" class="form-control" readonly value="<?php echo $valor['Estado'];?>"></td>
  				<td><input type="text" name="placa" class="form-control" readonly value="<?php echo $valor['Vehiculos_Placa'];?>"></td>

  				<td>
  	<div class="btn-toolbar" role="toolbar">
        <?php if($valor['Estado']=="Pendiente"){?>
        <div class="btn-group">
  				<button type="submit" class="btn btn-danger" id="confirmar">
  					<span class="glyphicon glyphicon-remove"></span>
  				</button>

        </div>
      <?php };  ?>
  				</td>
  			</tr>
  </form>
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
