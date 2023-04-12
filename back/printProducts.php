<?php
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
    <div class="col-sm-6 mt-4 col-md-4 col-lg-3">
      <div class="card">
        <img src="#" class="card-img-top" alt="Imagen del producto">
        <div class="card-body">
          <h5 class="card-title"><?php echo $row['nombre']; ?></h5>
          <p class="card-text"><?php echo $row['marca']; ?></p>
          <p class="card-text"><?php echo $row['talla']; ?></p>
          <p class="card-text"><?php echo $row['precio']; ?></p>
          <p class="card-text"><?php echo $row['categoria']; ?></p>
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