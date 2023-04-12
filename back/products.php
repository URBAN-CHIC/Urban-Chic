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

    $sql = "SELECT imagen FROM ropa WHERE id = $id";
    $resultado = mysqli_query($conn, $sql);
    if ($resultado && mysqli_num_rows($resultado) > 0) {
        $fila = mysqli_fetch_assoc($resultado);
        $imagen = $fila['imagen'];
    }

    $sql = "DELETE FROM ropa WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
        $ruta_destino = '../productos/' . $imagen;
        unlink($ruta_destino);
        
        echo "Registro eliminado correctamente.";
    } else {
        echo "Error al eliminar el registro: " . mysqli_error($conn);
        exit;
    }
    exit;
}


//mostrar registros
$sql = "SELECT * FROM ropa";
$resultado = mysqli_query($conn, $sql);

if (mysqli_num_rows($resultado) > 0) {
    echo '<div class="table-responsive mt-5">';
    echo '<table class="table table-striped table-bordered">';
    echo '<thead class="thead-dark bg-dark text-white text-center"><tr><th>ID</th><th>Nombre</th><th>Marca</th><th>Talla</th><th>Precio</th><th>Categoría</th><th>Imagen</th><th>Acciones</th></tr></thead>';
    echo '<tbody>';
    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo "<tr><td>" . $fila["id"] . "</td><td>" . $fila["nombre"] . "</td><td>" . $fila["marca"] . "</td><td>" . $fila["talla"] . "</td><td>" . $fila["precio"] . "</td><td>" . $fila["categoria"] . "</td><td><img src='../productos/" . $fila["imagen"] . "' width='100px'></td><td><div class='btn-group' role='group'><button type='button' class='btn btn-primary editar-producto' data-id='" . $fila["id"] . "'>Editar</button><button type='button' class='btn btn-danger eliminar-producto ms-2' data-id='" . $fila["id"] . "'>Eliminar</button></div></td></tr>";
    }
    echo '</tbody>';
    echo '</table>';
    echo '</div>';
} else {
    echo "No se encontraron resultados.";
}
echo '<div class="mt-5"><button type="button" class="btn btn-success mb-5 agregar-producto" >Agregar Producto</button></div>';

mysqli_close($conn);
