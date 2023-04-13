<?php 

include "../back/checkSession.php"; 
include "../back/rolVerify.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.js"></script>
    <link href="../styles/app.css" rel="stylesheet">
    <link rel="shortcut icon" href="favicon.png">
    <title>Panel de administracion</title>
</head>
<body>

<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="paneladmin.php">
          <span class="align-middle">UrbanChic</span>
        </a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						Administrar
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link d-page" data-view="productos">
            <i class="bi bi-bag"></i> <span class="align-middle">Productos</span>
            </a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link d-page" data-view="usuarios">
            <i class="bi bi-person"></i> <span class="align-middle">Usuarios</span>
            </a>
					</li>

          <li class="sidebar-item">
						<a class="sidebar-link d-page" data-view="logs">
            <i class="bi bi-person"></i> <span class="align-middle">Logs</span>
            </a>
					</li>
		</nav>

		<div class="main">

    <nav class="navbar navbar-expand-sm navbar-light navbar-bg">
   
    <a class="sidebar-toggle js-sidebar-toggle">
        <i class="hamburger align-self-center"></i>
    </a>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown" style="list-style:none;">
        <a class=" dropdown-toggle text-dark" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="position: relative;">
         <img src="../img/avatar.png" alt="Foto de perfil" style="width: 30px; height: 30px; border-radius: 50%;">
         <?php echo $_SESSION['nombre'] . ' ' . $_SESSION['apellido_paterno']; ?>
        </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink" style="position: absolute; right: 0;">
            <li><a class="dropdown-item" href="#">Ver perfil</a></li>
            <li><a class="dropdown-item" href="../back/logout.php">Cerrar Sesion</a></li>
          </ul>
        </li>
      </ul>
    </ul>
</nav>

        <div class="container">
          <div class="row">
            <div class="col-12">
            <div id="content"></div>


            </div>
          </div>
        </div>
	</div>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
  <script src="../js/index.js"></script>
  
  <script src="../js/app.js"></script>
</body>
</html>