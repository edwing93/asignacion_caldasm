<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="icon" href="<?=base_url()?>uploads/favicon.ico" type="image/gif">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Menu Usuarios</title>

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
  <?php if($this->session->userdata('Nit')){ ?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Caldas Motor</a></div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="defaultNavbar1">
      <ul class="nav navbar-nav">
        <li><a href="Op_usuarios/gestion_citas">Gestionar Citas</a></li>
        <li><a href="#">Agendar Cita</a></li>
        <li><a href="Op_usuarios/consultas">Consultas</a></li>
        <li><a href="#"  >Gestionar Informes</a>   </li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li><h3><?php  foreach($cedula as $usuario){ echo $usuario['Nombres'];  };  ?>   </h3></li>


        <li><a href="<?=site_url('Login/logout')?>">Cerrar Sesion</li></a>

      </ul>
    </div>
    <!-- /.navbar-collapse -->
  </div>
  <!-- /.container-fluid -->
</nav>
<div class="container-fluid">


  <?php } else {

  redirect(site_url());
  }
  ?>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="<?=base_url()?>assets/js/jquery-1.11.3.min.js"></script>

<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?=base_url()?>assets/js/bootstrap.js"></script>
</body>
</html>
