<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="<?=base_url()?>uploads/favicon.ico" type="image/gif">
<title>Gestion Informes</title>

<!-- Bootstrap -->
<link href="<?=base_url()?>assets/css/bootstrap.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<script>
  $(document).ready(function(){
    $('#citas_c').click(function(){
      $('#fechas').modal();
    });
  });
</script>


<body>

  <div class="page-header">
		<form action="<?=base_url()?>index.php/Op_usuarios"><input type="submit" id="volver" class="btn btn-danger" value="Regresar"></input></form>
	</div>
	<div class="container">

		<a href="#"><button type="button" class="btn btn-success btn-lg btn-block" id="citas_c">Citas Canceladas</button></a>
		<a href="#"><button type="button" class="btn btn-default btn-lg btn-block">Tecnicos</button></a>

</div>

<div class="modal" id="fechas" tabindex="-1" role="dialog">
 <div class="modal-dialog" role="document">
   <div class="modal-content">
     <div class="modal-header">
       <h2 class="modal-title">Rango</h2>
     </div>
     <div class="modal-body">
   <div class="container">
     <form class="form-inline" action="info_canceladas" method="post">
       <div class="form-group">
         <label>Fecha Inicial</label>
         <input type="date" class="form-control" name="fecini"></input>
       </div>
       <div class="form-group">
         <label>Fecha Final</label>
         <input type="date" class="form-control" name="fecfin"></input>
       </div>
   </div>
     </div>
     <div class="modal-footer">
       <input id="enviar" type="submit" class="btn btn-success" value="Aceptar"></input>
       <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
     </div>
     </form>
</div></div></div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?=base_url()?>assets/js/jquery-1.11.3.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?=base_url()?>assets/js/bootstrap.js"></script>
</body>
</html>
