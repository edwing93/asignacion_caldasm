<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="<?=base_url()?>uploads/favicon.ico" type="image/gif">
<title>Consulta Cliente</title>

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
    <div class="row">
      <div class="col-sm-6 col-md-4 col-md-offset-4">
		<div class="form-group">
      <input type="text" class="form-control" placeholder="Digite el Nit"></input>
    </div>
      <div class="form-group">
		      <input type="submit" class="btn btn-primary btn-lg btn-block" value="Buscar"></input>
		  </div>
    </div>
  </div>
<div class="divider"></div>
<div class="panel panel-default">



  <table class="table table-striped">
		<thead>
		<tr>
			<th>Nit</th>
			<th>Nombres</th>
			<th>Fecha de Nacimiento</th>
			<th>Direccion</th>
			<th>Telefono</th>
			<th>Telefono</th>
			<th>Correo</th>
		</tr>
	</thead>
	<tbody>
		<?php	foreach($prds as $valor){ ?>

      <tr>
        <td><?php echo $valor['codigo']; ?></td>
        <td><?php echo $valor['nombre']; ?></td>
        <td><?php echo $valor['cantidad']; ?></td>
      </tr>
		<?php }; ?>
		</tbody>
  </table>
</div>

</div>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?=base_url()?>assets/js/jquery-1.11.3.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?=base_url()?>assets/js/bootstrap.js"></script>
</body>
</html>
