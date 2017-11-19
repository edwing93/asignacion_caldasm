<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="<?=base_url()?>uploads/favicon.ico" type="image/gif">
<title>Consultas</title>

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

  <div class="page-header">
		<form action="<?=base_url()?>index.php/Op_usuarios"><input type="submit" id="volver" class="btn btn-danger" value="Regresar"></input></form>
	</div>
	<div class="container">

		<a href="ver_tercero"><button type="button" class="btn btn-warning btn-lg btn-block">Consultar Terceros</button></a>
		<a href="#"><button type="button" class="btn btn-default btn-lg btn-block">Consultar Vehiculos</button></a>
		<a href="ver_tecnicos"><button type="button" class="btn btn-warning btn-lg btn-block">Consultar Tecnicos</button></a>
		<a href="#"><button type="button" class="btn btn-default btn-lg btn-block">Consultar Operarios</button></a>



</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?=base_url()?>assets/js/jquery-1.11.3.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?=base_url()?>assets/js/bootstrap.js"></script>
</body>
</html>
