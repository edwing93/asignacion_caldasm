<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="icon" href="<?=base_url()?>uploads/favicon.ico" type="image/gif">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Tecnicos</title>

<!-- Bootstrap -->
<link href="<?=base_url()?>assets/css/bootstrap.css" rel="stylesheet">

<script>
	$(document).ready(function(){
		$("#nombres").readonly;
	});
</script>


<body>
	<div class="page-header">
		<form action="<?=base_url()?>index.php/Op_usuarios/consultas"><input type="submit" id="volver" class="btn btn-danger" value="Regresar"></input></form>
	</div>

</div>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel-group">
			 <div class="panel panel-default">
				 <div class="panel-heading">
					 <h4 class="panel-title">
						 <a data-toggle="collapse" href="#collapse0">Agregar Tecnicos</a>
					 </h4>
				 </div>
				 <div id="collapse0" class="panel-collapse collapse">
					 <form class="form-inline" action="agregar_tecnico" method="post">
            <div class="form-group">
						<label>Cedula:&nbsp; </label><input type="text" name="cedula" class="form-control" placeholder="Aqui el Numero de Cedula"></input>
						<label>Nombre:&nbsp; </label><input type="text" name="nombre" class="form-control" placeholder="Aqui el Nombre"></input>

						<input type="submit" name="buscar" value="Agregar Tecnico" class="btn btn-success" ></input>
            </div>

					 </form>

				 </div>
			 </div>
		 </div>



		</div>
		</div>




<div class="divider"></div>
<div class="panel panel-default">

  <div class="panel-heading">Todos los Tecnicos</div>

  <table class="table table-striped">
		<thead>
		<tr>
			<th>Cedula</th>
			<th>Nombre</th>
			<th>Estado</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
		<?php	foreach($tecnicos as $valor){ ?>

      <tr>
				<form class="form-inline">
					  <div class="form-group">
        <td><input type="text" name="cedula" id="cedula" class="form-control" value="<?php echo $valor['Cedula']; ?>"></input></td>
        <td><input type="text" name="nombres" id="nombres"class="form-control" value="<?php echo $valor['Nombres']; ?>"></input></td>
        <td><select name="estado" class="form-control">
						<option value="<?php echo $valor['Estado']; ?>"><?php echo $valor['Estado']; ?></option>
						<option value="Inactivo">Inactivo</option>
					</select>
				</td>

        <td>
					          <div class="btn-toolbar" role="toolbar">
					  <div class="btn-group">
					    <button type="button" class="btn btn-warning" alt="Editar">
					      <span class="glyphicon glyphicon-pencil"></span>
					    </button>

					    <button type="button" class="btn btn-danger">
					      <span class="glyphicon glyphicon-remove"></span>
					    </button>
					 </div>
					 </div>



        </td>
			</div>
				</form>
      </tr>
		<?php }; ?>
		</tbody>
  </table>
</div>



</div>






<script src="<?=base_url()?>assets/js/jquery-1.11.3.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?=base_url()?>assets/js/bootstrap.js"></script>
</body>
</html>
