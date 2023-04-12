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

  $sql = "SELECT * FROM ropa WHERE id = $id";
  $resultado = mysqli_query($conn, $sql);

  if (!$resultado) {
    die("Error al ejecutar la consulta: " . mysqli_error($conn));
  }

  if (mysqli_num_rows($resultado) > 0) {
    $fila = mysqli_fetch_assoc($resultado);
    $nombre = $fila['nombre'];
    $marca = $fila['marca'];
    $talla = $fila['talla'];
    $precio = $fila['precio'];
    $categoria = $fila['categoria'];
  } else {
    echo "No se encontró el registro con ID $id.";
  }
}

if (isset($_POST['guardar'])) {
  $id = mysqli_real_escape_string($conn, $_POST['id']);
  $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
  $marca = mysqli_real_escape_string($conn, $_POST['marca']);
  $talla = mysqli_real_escape_string($conn, $_POST['talla']);
  $precio = mysqli_real_escape_string($conn, $_POST['precio']);
  $categoria = mysqli_real_escape_string($conn, $_POST['categoria']);

  $query = "UPDATE ropa SET nombre = '$nombre', marca = '$marca', talla = '$talla', precio = $precio, categoria = '$categoria' WHERE id = $id";
  $result = mysqli_query($conn, $query);

  if ($result) {
    echo "Los datos se actualizaron correctamente.";
  } else {
    echo "Error al actualizar los datos: " . mysqli_error($conn);
  }
}

mysqli_close($conn);
?>

<h1>Editar ropa</h1>
<?php if (isset($_GET['id'])) { ?>
  <form action="" method="POST">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" value="<?php echo $nombre; ?>"><br>
    <label for="marca">Marca:</label>
    <input type="text" name="marca" value="<?php echo $marca; ?>"><br>
    <label for="talla">Talla:</label>
    <input type="text" name="talla" value="<?php echo $talla; ?>"><br>
    <label for="precio">Precio:</label>
    <input type="number" step="0.01" name="precio" value="<?php echo $precio; ?>"><br>
    <label for="categoria">Categoría:</label>
    <input type="text" name="categoria" value="<?php echo $categoria; ?>"><br>
    <input type="submit" name="guardar" value="Guardar cambios">
  </form>
<?php } else {
  echo "Debe especificar un ID de ropa.";
} ?>
