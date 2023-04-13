<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "urban";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("La conexión ha fallado: " . mysqli_connect_error());
}
else{
    echo "Conexión exitosa";
}

if (isset($_POST['nombre']) && isset($_POST['marca']) && isset($_POST['talla']) && isset($_POST['precio']) && isset($_POST['categoria']) && isset($_FILES['imagen'])) {
    $nombre = $_POST['nombre'];
    $marca = $_POST['marca'];
    $talla = $_POST['talla'];
    $precio = $_POST['precio'];
    $categoria = $_POST['categoria'];
    $imagen = $_FILES['imagen']['name'];
    $imagen_temp = $_FILES['imagen']['tmp_name'];
    $carpeta_destino = "../productos/";
    $ruta_imagen = $carpeta_destino . $imagen;

    if (move_uploaded_file($imagen_temp, $ruta_imagen)) {
        $sql = "INSERT INTO ropa (nombre, marca, talla, precio, categoria, imagen) VALUES ('$nombre', '$marca', '$talla', '$precio', '$categoria', '$imagen')";

        if (mysqli_query($conn, $sql)) {
            $exito = true;
        } else {
            $exito = false;
        }
    } else {
        $exito = false;
    }
}

?>

<div class="container mt-5">
    <h2>Agregar Producto</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
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
        <div class="form-group">
            <label for="imagen">Imagen:</label>
            <input type="file" class="form-control" id="imagen" name="imagen" required>
        </div>
        <button type="submit" class="btn btn-primary">Agregar</button>
        <?php if (isset($_POST['nombre']) && isset($_POST['marca']) && isset($_POST['talla']) && isset($_POST['precio']) && isset($_POST['categoria']) && isset($_FILES['imagen'])) {
            if ($exito) {
                echo '<p class="text-success">Producto agregado correctamente.</p>';
                header("Location: ../admin/paneladmin.php");
                mysqli_close($conn);

            } else {
                echo '<p class="text-danger">Error al agregar el producto: ' . mysqli_error($conn) . '</p>';
            }
        } ?>
    </form>
</div>