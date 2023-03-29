<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "urban";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (mysqli_connect_errno()) {
  die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

// if (!$conn) {
//   die("La conexión ha fallado: " . mysqli_connect_error());
// }

$id = mysqli_real_escape_string($conn, $_GET['id']);

$sql = "SELECT * FROM clientes WHERE id = $id";
$resultado = mysqli_query($conn, $sql);

if (!$resultado) {
  die("Error al ejecutar la consulta: " . mysqli_error($conn));
}

if (mysqli_num_rows($resultado) > 0) {
  $fila = mysqli_fetch_assoc($resultado);
  $nombre = $fila['nombre'];
  $apellidoPaterno = $fila['apellidoPaterno'];
  $apellidoMaterno = $fila['apellidoMaterno'];
  $email = $fila['email'];
  $telefono = $fila['telefono'];
  $sexo = $fila['sexo'];
  $edad = $fila['edad'];
  $rol = $fila['rol'];
  
} else {
  echo "No se encontró el registro con ID $id.";
}
?>


<h1>Editar usuario</h1>
  <form action="" method="POST">
  <input type="hidden" name="id" value="<?php echo $id ?>">
  <label for="nombre">Nombre:</label>
  <input type="text" name="nombre" value="<?php echo $nombre ?>">
  <label for="apellidoPaterno">Apellido paterno:</label>
  <input type="text" name="apellidoPaterno" value="<?php echo $apellidoPaterno ?>">
  <label for="text">Apellido materno:</label>
  <input type="text" name="apellidoMaterno" value="<?php echo $apellidoMaterno ?>">
  <label for="email">Email:</label>
  <input type="email" name="email" value="<?php echo $email ?>">
  <label for="telefono">Telefono:</label>
  <input type="text" name="telefono" value="<?php echo $telefono ?>">
  <label for="sexo">Sexo:</label>
  <input type="text" name="sexo" value="<?php echo $sexo ?>">
  <label for="edad">Edad:</label>
  <input type="text" name="edad" value="<?php echo $edad ?>">
  <label for="rol">Rol:</label>
  <input type="text" name="rol" value="<?php echo $rol ?>">

  <button type="submit">Guardar cambios</button>
</form>

