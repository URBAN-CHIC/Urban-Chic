<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "urban";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("La conexión ha fallado: " . mysqli_connect_error());
}


//eliminar registro
if (isset($_POST['id'])) {
  $id = $_POST['id'];

  $sql = "CALL deleteUser($id)";
  if (mysqli_query($conn, $sql)) {
    echo "Registro eliminado correctamente.";
  } else {
    echo "Error al eliminar el registro: " . mysqli_error($conn);
    exit;
  }
  exit;
}

//mostrar registros
$sql = "SELECT * FROM clientes"; 
$resultado = mysqli_query($conn, $sql);

if (mysqli_num_rows($resultado) > 0) {
    echo '<div class="table-responsive mt-5">';
    echo '<table class="table table-striped table-bordered">';
    echo '<thead class="thead-dark bg-dark text-white text-center"><tr><th>ID</th><th>Nombre</th><th>Apellido paterno</th><th>Apellido materno</th><th>Email</th><th>Teléfono</th><th>Sexo</th><th>Edad</th><th>Rol</th><th>Acciones</th></tr></thead>';
    echo '<tbody>';
    while($fila = mysqli_fetch_assoc($resultado)) {
      echo "<tr><td>" . $fila["id"] . "</td><td>" . $fila["nombre"] . "</td><td>" . $fila["apellidoPaterno"] . "</td><td>" . $fila["apellidoMaterno"] . "</td><td>" . $fila["email"] . "</td><td>" . $fila["telefono"] . "</td><td>" . $fila["sexo"] . "</td><td>" . $fila["edad"] . "</td><td>" . $fila["rol"] . "</td><td><div class='btn-group' role='group'><button type='button' class='btn btn-primary btn-editar' data-id='" . $fila["id"] . "'>Editar</button><button type='button' class='btn btn-danger btn-eliminar ms-2' data-id='" . $fila["id"] . "'>Eliminar</button></div></td></tr>";
    }
    echo '</tbody>';
    echo '</table>';
    echo '</div>';
} else {
    echo "No se encontraron resultados.";
}

//editar registros:



mysqli_close($conn);
?>

