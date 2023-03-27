<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "urban";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("La conexión ha fallado: " . mysqli_connect_error());
}

if (isset($_POST['id'])) {
  $id = $_POST['id'];

  $sql1 = "DELETE FROM users WHERE id_cliente = $id";
  if (mysqli_query($conn, $sql1)) {
    echo "Registro eliminado.";
  } else {
    echo "Error al eliminar el registro " . mysqli_error($conn);
    exit;
  }
  $sql2 = "DELETE FROM clientes WHERE id = $id";
  if (mysqli_query($conn, $sql2)) {
    echo "Registro eliminado de la tabla usuarios.";
  } else {
    echo "Error al eliminar el registro de la tabla usuarios: " . mysqli_error($conn);
    exit;
  }

  exit;
}

$sql = "SELECT * FROM clientes"; 
$resultado = mysqli_query($conn, $sql);

if (mysqli_num_rows($resultado) > 0) {
    echo '<div class="table-responsive mt-5">';
    echo '<table class="table table-striped table-bordered">';
    echo '<thead class="thead-dark bg-dark text-white text-center"><tr><th>ID</th><th>Nombre</th><th>Apellido paterno</th><th>Apellido materno</th><th>Email</th><th>Teléfono</th><th>Sexo</th><th>Edad</th><th>Rol</th><th>Acciones</th></tr></thead>';
    echo '<tbody>';
    while($fila = mysqli_fetch_assoc($resultado)) {
      echo "<tr><td>" . $fila["id"] . "</td><td>" . $fila["nombre"] . "</td><td>" . $fila["apellidoPaterno"] . "</td><td>" . $fila["apellidoMaterno"] . "</td><td>" . $fila["email"] . "</td><td>" . $fila["telefono"] . "</td><td>" . $fila["sexo"] . "</td><td>" . $fila["edad"] . "</td><td>" . $fila["rol"] . "</td><td><div class='btn-group' role='group'><button type='button' class='btn btn-primary' data-id='" . $fila["id"] . "'>Editar</button><button type='button' class='btn btn-danger btn-eliminar' data-id='" . $fila["id"] . "'>Eliminar</button></div></td></tr>";
    }
    echo '</tbody>';
    echo '</table>';
    echo '</div>';
} else {
    echo "No se encontraron resultados.";
}

mysqli_close($conn);
?>
