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


<?php foreach($consulta as $valor){ ?>

<div class="container text-center">
	<div style="padding-top:30px" class="panel-body" >
	  <div class="row">
	<form class="form-inline" role="form" action="cancela" method="post">
  <div class="form-group">
    <span class="help-block text-muted small-font" >  Codigo</span>
    <input type="text" class="form-control" name="id" readonly value="<?php echo $valor['Id_cita'];?>">
  </div>
  <div class="form-group">
    <span class="help-block text-muted small-font" >  Fecha</span>
    <input type="text" class="form-control" name="fecha"readonly value="<?php echo $valor['Fecha_inicial'];?>">
  </div>
  <div class="form-group">
    <span class="help-block text-muted small-font" >  Km</span>
    <input type="text" class="form-control" name="km"readonly value="<?php echo $valor['Kilometraje'];?>">
  </div>
  <div class="form-group">

		<span class="help-block text-muted small-font" >  Estado</span>
    <input type="text" class="form-control" name="estado"readonly  value="<?php echo $valor['Estado'];?>">
  </div>
  <div class="form-group">

		<span class="help-block text-muted small-font" >  Placa</span>
    <input type="text" class="form-control" name="placa"readonly  value="<?php echo $valor['Vehiculos_Placa'];?>">
  </div>
	<input type="submit" class="btn btn-danger" value="Cancelar cita"></input>
  </div>

	</form>
	</div>
	</div>




<?php }; ?>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?=base_url()?>assets/js/jquery-1.11.3.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?=base_url()?>assets/js/bootstrap.js"></script>
</body>
</html>
