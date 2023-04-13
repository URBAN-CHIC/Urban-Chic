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
    <link rel="stylesheet" href="../styles/urbanChics.css">
    <title>Urban Chic</title>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img style="width: 100px;" class="img-fluid" src="../img/logoNF.png" alt=""></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-white" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?php echo $_SESSION['nombre'] . ' ' . $_SESSION['apellido_paterno']; ?>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href=" profile.php">Ver perfil</a></li>
                <li><a class="dropdown-item" href="../back/logout.php">Cerrar Sesión</a></li>
              </ul>
            </li>
          </ul>
          
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Categorías
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Ropa Mujer</a></li>
              <li><a class="dropdown-item" href="#">Ropa Hombre</a></li>
              <li><a class="dropdown-item" href="#">Accesorios</a></li>
              <li><a class="dropdown-item" href="#">Calzado</a></li>
            </ul>
          </li>
         
          
        </ul>
        <a href=""><i class="bi bi-cart text-white me-3"></i></a>
      </div>
    </div>
  </nav>
  


<div class="container-fluid" style>
  <div class="row">
  <div class="col-md-12" style="margin-top: 80px; ">
                <h1 class="text-center">PRODUCTOS</h1>

                <?php include "../back/printProducts.php"; ?>

            </div>
  </div>
</div>
            
<!-- <footer class="bg-dark text-white fixed-bottom">
  <div class="container py-3">  
    <div class="row">
      <div class="col-md-3">
        <h4>Urban Chic</h4>
        <p>Encuentra la mejor ropa para ti en nuestra tienda en línea.</p>
      </div>
      <div class="col-md-3">  
        <h4>Suscribete</h4>
        <p>Recibe nuestras novedades y promociones en tu correo electrónico.</p>
        <form action="#" method="post">
          <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Correo electrónico" required>
          </div>
          <button type="submit" class="btn btn-primary">Suscribirse</button>
        </form>
      </div>
      <div class="col-md-3">
        <h4>Contáctanos</h4>
        <ul class="list-unstyled">
          <li><i class="bi bi-geo-alt-fill"></i> Calle 42 #25-21, Aguascalientes, México.</li>
          <li><i class="bi bi-telephone-fill"></i> +52 449 123 4567</li>
          <li><i class="bi bi-envelope-fill"></i> info@urbanchic.com</li>
        </ul>
      </div>
      
      <div class="col-md-3">
        <h4>Síguenos</h4>
        <ul class="list-unstyled">
          <li><a href="#"><i class="bi bi-facebook">urbanChic(Oficial)</i></a></li>
          <li><a href="#"><i class="bi bi-instagram">urbanChic(Oficial)</i></a></li>
          <li><a href="#"><i class="bi bi-twitter">urbanChic_Oficial</i></a></li>
          <li><a href="#"><i class="bi bi-whatsapp">+52 449 123 4567</i></a></li>
        </ul>
      </div>
      
    </div>
  </div>
  </div>
  
</footer> -->


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <script src="../js/ajax.js"></script>
</body>
</html>