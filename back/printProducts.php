<?php

error_reporting(0);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "urban";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("La conexión ha fallado: " . mysqli_connect_error());
}

$sql = "SELECT * FROM ropa";
$result = $conn->query($sql);
?>

<div class="row">
  <?php
  while($row = $result->fetch_assoc()) {
    ?>
    <div class="col-sm-6 mt-4 mb-5 ms-5 col-md-4 col-lg-3">
      <div class="card d-flex justify-content-center">
       <center> <img src="../productos/<?php echo $row['imagen']; ?>" class="card-img-top img-fluid" alt="Imagen del producto" style="width: 250px; heigght: 100px;"></center>
        <div class="card-body">
          <h5 class="card-title"><?php echo $row['nombre']; ?></h5>
          <p class="card-text"><?php echo $row['marca']; ?></p>
          <p class="card-text"><?php echo $row['talla']; ?></p>
          <p class="card-text"><?php echo $row['precio']; ?></p>
          <p class="card-text"><?php echo $row['categoria']; ?></p>
          <button class="btn btn-success">comprar</button>
          <button class="btn btn-success">añadir al carrito</button>
        </div>
      </div>
    </div>
    <?php
  }
  ?>
</div>

<?php

$conn->close();
?>
