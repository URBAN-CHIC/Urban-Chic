<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "urban";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("La conexión ha fallado: " . mysqli_connect_error());
}

if (isset($_POST['nombre']) && isset($_POST['marca']) && isset($_POST['talla']) && isset($_POST['precio']) && isset($_POST['categoria'])) {
    $nombre = $_POST['nombre'];
    $marca = $_POST['marca'];
    $talla = $_POST['talla'];
    $precio = $_POST['precio'];
    $categoria = $_POST['categoria'];

    $sql = "INSERT INTO ropa (nombre, marca, talla, precio, categoria) VALUES ('$nombre', '$marca', '$talla', '$precio', '$categoria')";

    if (mysqli_query($conn, $sql)) {
        $exito = true;
    } else {
        $exito = false;
    }
}

mysqli_close($conn);
?>

<div class="container mt-5">
    <h2>Agregar Producto</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="marca">Marca:</label>
            <input type="text" class="form-control" id="marca" name="marca" required>
        </div>
        <div class="form-group">
            <label for="talla">Talla:</label>
            <input type="text" class="form-control" id="talla" name="talla" required>
        </div>
        <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="number" class="form-control" id="precio" name="precio" required>
        </div>
        <div class="form-group">
            <label for="categoria">Categoría:</label>
            <input type="text" class="form-control" id="categoria" name="categoria" required>
        </div>
        <button type="submit" class="btn btn-primary">Agregar</button>
        <?php if (isset($_POST['nombre']) && isset($_POST['marca']) && isset($_POST['talla']) && isset($_POST['precio']) && isset($_POST['categoria'])) {
            if ($exito) {
                echo '<p class="text-success">Producto agregado correctamente.</p>';
                header("Location: ../admin/paneladmin.php");
            } else {
                echo '<p class="text-danger">Error al agregar el producto: ' . mysqli_error($conn) . '</p>';
            }
        } ?>
    </form>
</div>
