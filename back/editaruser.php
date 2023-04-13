<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "urban";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (mysqli_connect_errno()) {
  die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
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
}

if (isset($_POST['guardar'])) {
  $id = mysqli_real_escape_string($conn, $_POST['id']);
  $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
  $apellidoPaterno = mysqli_real_escape_string($conn, $_POST['apellidoPaterno']);
  $apellidoMaterno = mysqli_real_escape_string($conn, $_POST['apellidoMaterno']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $telefono = mysqli_real_escape_string($conn, $_POST['telefono']);
  $sexo = mysqli_real_escape_string($conn, $_POST['sexo']);
  $edad = mysqli_real_escape_string($conn, $_POST['edad']);
  $rol = mysqli_real_escape_string($conn, $_POST['rol']);

  $query = "CALL updateUser($id, '$nombre', '$apellidoPaterno', '$apellidoMaterno', '$email', '$telefono', '$sexo', $edad, '$rol')";
  $result = mysqli_query($conn, $query);

  if ($result) {
    echo "Los datos se actualizaron correctamente.";
  } else {
    echo "Error al actualizar los datos: " . mysqli_error($conn);
  }
}

mysqli_close($conn);
?>
<link rel="stylesheet" href="../styles/editaruser.css">
<h1>Editar usuario</h1>
<?php if (isset($_GET['id'])) { ?>
  <form action="" method="POST">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" value="<?php echo $nombre; ?>"><br>
    <label for="apellidoPaterno">Apellido paterno:</label>
<input type="text" name="apellidoPaterno" value="<?php echo $apellidoPaterno; ?>"><br>

<label for="apellidoMaterno">Apellido materno:</label>
<input type="text" name="apellidoMaterno" value="<?php echo $apellidoMaterno; ?>"><br>

<label for="email">Email:</label>
<input type="email" name="email" value="<?php echo $email; ?>"><br>

<label for="telefono">Teléfono:</label>
<input type="text" name="telefono" value="<?php echo $telefono; ?>"><br>

<label for="sexo">Sexo:</label>
<input type="radio" name="sexo" value="Femenino" <?php if ($sexo == "Femenino") echo "checked"; ?>>Femenino
<input type="radio" name="sexo" value="Masculino" <?php if ($sexo == "Masculino") echo "checked"; ?>>Masculino<br>

<label for="edad">Edad:</label>
<input type="number" name="edad" value="<?php echo $edad; ?>"><br>

<label for="rol">Rol:</label>
<select name="rol">
  <option value="cliente" <?php if ($rol == "cliente") echo "selected"; ?>>cliente</option>
  <option value="admin" <?php if ($rol == "admin") echo "selected"; ?>>admin</option>
</select><br>

<input type="submit" name="guardar" value="Guardar cambios">
</form>
<?php } else {
  echo "Debe especificar un ID de usuario.";
} ?>
