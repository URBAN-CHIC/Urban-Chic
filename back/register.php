<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "urban";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("La conexión ha fallado: " . mysqli_connect_error());
}

$nombre = $_POST['nombre'];
$apellidoPaterno = $_POST['apellido_paterno'];
$apellidoMaterno = $_POST['apellido_materno'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$telefono = $_POST['telefono'];
$sexo = $_POST['sexo'];
$edad = $_POST['edad'];

$sql = "CALL registro('$nombre', '$apellidoPaterno', '$apellidoMaterno', '$email', '$pass', '$telefono', '$sexo', $edad)";

if (mysqli_query($conn, $sql)) {
  echo "Usuario registrado correctamente";
} else {
  echo "Error al registrar el usuario: " . mysqli_error($conn);
}

mysqli_close($conn);
?>