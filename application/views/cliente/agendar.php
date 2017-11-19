<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="<?=base_url()?>uploads/favicon.ico" type="image/gif">
<title>Agendar</title>

<!-- Bootstrap -->
<link href="<?=base_url()?>assets/css/bootstrap.css" rel="stylesheet">


</head>



<body>
<h3><?php  foreach($nit as $usuario){ echo $usuario['Nombres'];  };  ?>   </h3>
<form action="<?=base_url()?>index.php/Op_cliente"><input type="submit" id="volver" class="btn btn-danger" value="Regresar"></input></form>

<form action="agendar" method="post">
<h1>Modulo de Agendamiento de Citass</h1>
      <div class="container">
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
						<input type="text" class="form-control" name="cita" value="<?php  foreach($cita as $dato){ echo $dato['Id_cita']+1;  };  ?>" readonly>
						<input type="text" class="form-control" name="nit" value="<?php  foreach($nit as $usuario){ echo $usuario['Nit'];  };  ?>" readonly>
						<input  type="text" class="form-control" name="km" value="" placeholder="Aqui el Km Actual">
						<input  type="date" class="form-control" name="fecha" value="">
						<input  type="time" class="form-control" name="hora" value="">
						<textarea maxlength="200" class="form-control" placeholder="Aqui las Observaciones" name="notas"></textarea>
						<select class="form-control" name="operacion">
							<?php foreach($conjunto as $op){ ?>
							<option value="<?php echo $op['Id_operacion'];?>">  <?php echo $op['Descripcion'];?>  </option>
						<?php }; ?>
						</select>

						<select class="form-control" name="placa">
							<?php foreach($placa as $dato){ ?>
							<option value="<?php echo $dato['Placa'];?>">  <?php echo $dato['Placa'];?>  </option>
						<?php }; ?>
						</select>

						<select class="form-control" name="sede">
							<?php foreach($sede as $dato){ ?>
							<option value="<?php echo $dato['Id'];?>">  <?php echo $dato['Nombre'];?>  </option>
						<?php }; ?>
						</select>

						<input  type="text" class="form-control" name="responsable" value="" placeholder="Persona Responsable del Vehiculo">
        </div>
				<input  type="submit" class="btn btn-success"  value="Agendar" >

    </div>
</form>


<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?=base_url()?>assets/js/jquery-1.11.3.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?=base_url()?>assets/js/bootstrap.js"></script>
</body>
</html>
