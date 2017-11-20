<!DOCTYPE html>
<html lang="en"><head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="icon" href="<?=base_url()?>uploads/favicon.ico" type="image/gif">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Menu Clientes</title>

<!-- Bootstrap -->
<link href="<?=base_url()?>assets/css/bootstrap.css" rel="stylesheet"/>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<link rel='stylesheet' href='<?=base_url()?>assets/css/fullcalendar.css' />
<link href='<?=base_url()?>assets/css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
<script src="<?=base_url()?>assets/js/jquery.min.js"></script>
<script src="<?=base_url()?>assets/js/moment.min.js"></script>
<script src="<?=base_url()?>assets/js/fullcalendar.js"></script>
<script src="<?=base_url()?>assets/js/es.js"></script>

<script>
	$(document).ready(function(){
		$.post('Op_Cliente/geteventos',
			function(data){
			
		
		
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay,listWeek'
			},
			defaultDate: new Date(),
				navLinks: true, // can click day/week names to navigate views
				editable: true,
				eventLimit: true, // allow "more" link when too many events
				events: $.parseJSON(data),
				eventDrop: function(event,delta,revertFunc){
					var id=event.id;
					var fein=event.start.format();
					var fefi=event.end.format();
					
					if(!confirm("¿Esta seguro de cambiar la fecha?")){
					   revertFunc();
					   }else{
						$.post('Op_Cliente/upevent',
						{
							id:id,
							fecin:fein,
							fecfi:fefi
						},
						function(data){
							if(data==1){
								alert('Se actualizo correctamente');
							}else{
								alert('Error');
							}
						});
					
					}
				},
				dayClick: function(date,jsEvent,view){
					$('#asignar').modal();
				}
			});
		});
	});


</script>
</head>
<body>


<?php if($this->session->userdata('Nit')){ ?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Caldas Motor</a></div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="defaultNavbar1">
      <ul class="nav navbar-nav">
        <li><a href="Op_Cliente/agendar_view">Agendar Cita</a></li>
        <li><a href="Op_Cliente/consultar_view">Consultar Citas</a></li>
        <li><a href="Op_Cliente/actualizar_view"  >Actualizar Datos</a>   </li>
        <li><a href="Op_Cliente/vehiculos_view"  >Vehiculos</a>   </li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li><h3><?php  foreach($nit as $usuario){ echo $usuario['Nombres'];  };  ?>   </h3></li>


        <li><a href="<?=site_url('Login/logout')?>">Cerrar Sesion</li></a>

     	 	</ul>
    </div>
    <!-- /.navbar-collapse -->
  </div>
  <!-- /.container-fluid -->
</nav>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
		<div id="calendar"></div>
    </div>
  </div>
<!--formulario de agendamiento-->
 <div class="modal" id="asignar" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title">Asignar</h2>
      </div>
      <div class="modal-body">
		<form action="asignar" id="registrar" method="post">	
				<input type="text" class="form-control" id="nit" value="<?php  foreach($nit as $usuario){ echo $usuario['Nit'];  };  ?>" readonly></br>
				<select class="form-control" id="sede">
					<?php foreach($sede as $dato){ ?>
					<option value="<?php echo $dato['Id'];?>">  <?php echo $dato['Nombre'];?>  </option>
					<?php }; ?>
				</select></br>
				<select class="form-control" id="placa">
					<?php foreach($placa as $dato){ ?>
					<option value="<?php echo $dato['Placa'];?>">  <?php echo $dato['Placa'];?>  </option>
					<?php }; ?>
				</select></br>
				<input  type="text" class="form-control" id="km" placeholder="Ingrese el kilometraje"></br>
				<input  type="time" class="form-control" id="hora"></br>
				<select class="form-control" id="operacion">
					<?php foreach($conjunto as $op){ ?>
					<option value="<?php echo $op['Id_operacion'];?>">  <?php echo $op['Descripcion'];?> </option>
					<?php }; ?>
				</select></br>
				<textarea maxlength="200" class="form-control" placeholder="Adicional" id="notas"></textarea></br>
				<input  type="text" class="form-control" id="responsable"placeholder="Persona Responsable del Vehiculo">
			
	

      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-success" value="Aceptar">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
      </form>


<?php } else {

redirect(site_url());
}
?>



<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?=base_url()?>assets/js/bootstrap.js"></script>
</body>
</html>
