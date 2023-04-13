<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "urban";

// Conectarse a la base de datos
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar si la conexión ha fallado
if (!$conn) {
    die("La conexión ha fallado: " . mysqli_connect_error());
}

// Seleccionar los registros de la tabla de logs
$sql = "SELECT * FROM logs";
$resultado = mysqli_query($conn, $sql);

// Verificar si se encontraron registros
if (mysqli_num_rows($resultado) > 0) {
    // Mostrar los registros en una tabla HTML
    echo '<div class="table-responsive mt-5">';
    echo '<table class="table table-striped table-bordered">';
    echo '<thead class="thead-dark bg-dark text-white text-center"><tr><th>ID</th><th>Fecha</th><th>Tipo</th><th>Mensaje</th><th>IP</th></tr></thead>';
    echo '<tbody>';
    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo "<tr><td>" . $fila["id"] . "</td><td>" . $fila["fecha"] . "</td><td>" . $fila["tipo"] . "</td><td>" . $fila["mensaje"] . "</td><td>" . $fila["ip"] . "</td></tr>";
    }
    echo '</tbody>';
    echo '</table>';
    echo '</div>';
} else {
    // Mostrar un mensaje si no se encontraron registros
    echo "No se encontraron registros.";
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>
