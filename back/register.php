
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "urban";

$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
  die("La conexión ha fallado: " . mysqli_connect_error());
}

if(isset($_POST['submit'])) {

  $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
  $apellidoPaterno = mysqli_real_escape_string($conn, $_POST['apellido_paterno']);
  $apellidoMaterno = mysqli_real_escape_string($conn, $_POST['apellido_materno']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $pass = mysqli_real_escape_string($conn, $_POST['pass']);
  $telefono = mysqli_real_escape_string($conn, $_POST['telefono']);
  $sexo = mysqli_real_escape_string($conn, $_POST['sexo']);
  $edad = mysqli_real_escape_string($conn, $_POST['edad']);
  $rol = "cliente";

  if (empty($_POST['nombre']) || empty($_POST['apellido_paterno']) || empty($_POST['apellido_materno']) || empty($_POST['email']) || empty($_POST['pass']) || empty($_POST['telefono'])  || empty($_POST['sexo'])  || empty($_POST['edad']) ) {
    echo "<script>
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Por favor, complete todos los campos obligatorios.'
    });
  </script>";
  exit;
  }

  $sql_verificar_email = "SELECT email FROM usuarios WHERE email='$email'";
$resultado = mysqli_query($conn, $sql_verificar_email);

if (mysqli_num_rows($resultado) > 0) {
  echo "<script>
  Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: 'El email ingresado ya está registrado. Por favor, ingrese un email diferente.'
  });
  </script>";
  exit;
}

$sql_verificar_telefono = "SELECT telefono FROM clientes WHERE telefono='$telefono'";
$resultado = mysqli_query($conn, $sql_verificar_telefono);

if (mysqli_num_rows($resultado) > 0) {
  echo "<script>
  Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: 'El numero de telefono ingresado ya está registrado. Por favor, ingrese un numero diferente.'
  });
  </script>";
  exit;
}

$pass_length = strlen($pass);
if ($pass_length < 8) {
  echo "<script>
  Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: 'La contraseña debe tener al menos 8 caracteres.'
  });
</script>";
exit;
} elseif (!preg_match('/^(?=.*[A-Z])(?=.*[0-9])/', $pass)) {
  echo "<script>
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'La contraseña debe contener al menos una letra mayúscula y un número.'
          });
        </script>";
  exit;
}

$pass = password_hash($pass, PASSWORD_DEFAULT);

$sql = "CALL registerUser('$nombre', '$apellidoPaterno', '$apellidoMaterno', '$email', '$pass', '$telefono', '$sexo', $edad, '$rol')";

if (mysqli_query($conn, $sql)) {
  echo "<script>
  Swal.fire({
    icon: 'success',
    title: 'Usuario registrado correctamente'
  });
</script>";
} else {
  echo "<script>
  Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: 'Error al registrar el usuario: ".mysqli_error($conn)."'
  });
</script>";
}


}

mysqli_close($conn);
?>