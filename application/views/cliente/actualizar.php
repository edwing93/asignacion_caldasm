<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="icon" href="<?=base_url()?>uploads/favicon.ico" type="image/gif">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Registro Clientes</title>

<!-- Bootstrap -->
<link href="<?=base_url()?>assets/css/bootstrap.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<form action="<?=base_url()?>index.php/Op_cliente"><input type="submit" id="volver" class="btn btn-danger" value="Regresar"></input></form>
 <body>

      <div class="container">
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info" >
              <div class="panel-heading">
                <div class="panel-title">Modulo Actualizacion de Datos</div>
                    </div>

                    <?php foreach ($nit as $valor): ?>



                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                        <form id="loginform" class="form-horizontal" role="form" method="post" action="actualizar">

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-cog"></i></span>
                                        <input readonly type="text" class="form-control" name="nit" value="<?php echo $valor['Nit'];?>"></input>
                                    </div>

                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="nombres" type="text" class="form-control" name="nombres" value="<?php echo $valor['Nombres'];?>"></input>
                                    </div>

                       		<div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="razon_social" type="text" class="form-control" name="razon_social" value="<?php echo $valor['Razon_social'];?>">
                                    </div>

                       		<div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-plus"></i></span>
                                        <input id="fecha_nacimiento" type="date" class="form-control" name="fecha_nacimiento" value="<?php echo $valor['Fecha_nacimiento'];?>">
                                    </div>

                       		<div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-road"></i></span>
                                        <input id="direccion" type="text" class="form-control" name="direccion" value="<?php echo $valor['Direccion'];?>">
                                    </div>

                       		<div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                                        <input id="telefono1" type="text" class="form-control" name="telefono1" value="<?php echo $valor['Telefono1'];?>">
                                    </div>
                                    <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                                        <input id="telefono2" type="text" class="form-control" name="telefono2" value="<?php echo $valor['Telefono2'];?>">
                                    </div>
                                    <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                        <input id="correo" type="email" class="form-control" name="correo" value="<?php echo $valor['Correo'];?>">
                                    </div>

                                    <?php endforeach;
                                    foreach ($contrasena as $dato):?>
                                    <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-eye-close"></i></span>
                                        <input id="contrasena" type="text" class="form-control" name="contrasena" value="<?php echo $dato['Contrasena'];?>">
                                    </div>


                                  <?php endforeach; ?>


                                <div style="margin-top:10px" class="form-group">
                                    <!-- Button -->

                                    <div class="col-sm-12 controls">
                                      <button class="btn btn-primary btn-lg btn-block">Actualizar</button>
                                    </div>

                                </div>

                            </form>



                        </div>
                    </div>
        </div>

    </div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?=base_url()?>assets/js/jquery-1.11.3.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?=base_url()?>assets/js/bootstrap.js"></script>
</body>
</html>
