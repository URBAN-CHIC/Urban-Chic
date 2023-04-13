<?php 
include "../back/checkSession.php"; 
include "../back/rolVerify.php";

$userId = isset($_GET['id']) ? $_GET['id'] : null;
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
    <link rel="shortcut icon" href="favicon.png">
    <title>Perfil</title>
</head>

<style>
  ::-webkit-scrollbar{
    display: none;
  }
  </style>
<body class="bg-dark bg-gradient">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><img style="width: 100px;" class="img-fluid" src="../img/logoNF.png" alt=""></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link text-white" aria-current="page" href="urbanChics.php">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="#">Ver pedidos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="../back/logout.php">Cerrar sesion</a>
              </li>
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </nav>

      <div class="container" style="margin-top: 90px; margin-bottom: 20px;">
        <div class="row">

          <div class="col-md-4"></div>
          <div class="col-md-4 text-center bg-info p-5 rounded-5">

          <h4><?php echo $_SESSION['nombre'] . ' ' . $_SESSION['apellido_paterno'] . ' ' . $_SESSION['apellido_materno'] ; ?></h4>
            <center><img src="../img/avatar.png" style="width: 200px; height: 200px; margin: 0;" alt="Foto de perfil" class="text-center img-fluid rounded-circle "></center> 
                   <h3>Datos Personales:</h3>
                   <button type="button" id="editProfile" class="text-center btn btn-success" style="font-size: 12px; width: 130px; height: 40px;">Editar informacion</button>
                   <button type="button" class="text-center btn btn-success" style="font-size: 11px; width: 130px; height: 40px;">Cambiar contraseña</button> 
                   <li class="list-group-item">id: <?php echo $_SESSION['id']; ?></li>
                   <li class="list-group-item">Email: <?php echo $_SESSION['email']; ?></li>
                   <li class="list-group-item">Telefono: <?php echo $_SESSION['telefono']; ?></li>
                   <li class="list-group-item">Sexo: <?php echo $_SESSION['sexo']; ?></li>
                   <li class="list-group-item">Edad: <?php echo $_SESSION['edad']; ?></li>
               </div>
               <div class="col-md-4"></div>
           </div>
          
       </div>





  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
  <script >
document.addEventListener("DOMContentLoaded", function() {
  document.getElementById("editProfile").addEventListener("click", function() {
    let userId = <?php echo isset($_GET['email']) ? $_GET['ema'] : 'null'; ?>;
    if (userId !== null) {
      window.location.href = "../back/editProfile.php?id=" + userId;
    } else {
      alert("Debe especificar un ID de usuario.");
    }
  });
});
  </script>
</body>
</html>