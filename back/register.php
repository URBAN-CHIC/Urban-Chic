<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "urban";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("La conexión ha fallado: " . mysqli_connect_error());
}

if (empty($_POST['nombre']) || empty($_POST['apellido_paterno']) || empty($_POST['email']) || empty($_POST['pass'])) {
  die("Por favor, complete todos los campos obligatorios.");
}

$nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
$apellidoPaterno = mysqli_real_escape_string($conn, $_POST['apellido_paterno']);
$apellidoMaterno = mysqli_real_escape_string($conn, $_POST['apellido_materno']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$pass = mysqli_real_escape_string($conn, $_POST['pass']);
$telefono = mysqli_real_escape_string($conn, $_POST['telefono']);
$sexo = mysqli_real_escape_string($conn, $_POST['sexo']);
$edad = mysqli_real_escape_string($conn, $_POST['edad']);
$rol = "cliente";

$pass_length = strlen($pass);
if ($pass_length < 8) {
  die("La contraseña debe tener al menos 8 caracteres.");
} elseif (!preg_match('/^(?=.*[A-Z])(?=.*[0-9])/', $pass)) {
  die("La contraseña debe contener al menos una letra mayúscula y un número.");
}

$pass = password_hash($pass, PASSWORD_DEFAULT);

$sql = "CALL registro('$nombre', '$apellidoPaterno', '$apellidoMaterno', '$email', '$pass', '$telefono', '$sexo', $edad, '$rol')";

if (mysqli_query($conn, $sql)) {
  echo "Usuario registrado correctamente";
} else {
  echo "Error al registrar el usuario: " . mysqli_error($conn);
}

mysqli_close($conn);
?>