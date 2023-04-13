<?php
//Iniciar sesión
session_start();

//Verificar si el carrito está vacío
if (empty($_SESSION['carrito'])) {
  echo "<p>No hay productos en el carrito</p>";
} else {
  //Conectarse a la base de datos
  $db = mysqli_connect('localhost', 'usuario', 'contraseña', 'basededatos');

  //Obtener los detalles del carrito de la tabla de detalles de carrito
  $query = "SELECT * FROM detalles_carrito WHERE id_carrito = '{$_SESSION['carrito']}'";
  $result = mysqli_query($db, $query);
?>

<h1>Carrito de compras</h1>

<table>
  <thead>
    <tr>
      <th>Producto</th>
      <th>Precio</th>
      <th>Cantidad</th>
      <th>Total</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = mysqli_fetch_array($result)) : ?>
      <tr>
        <td><?php echo $row['producto']; ?></td>
        <td>$<?php echo $row['precio']; ?></td>
        <td><?php echo $row['cantidad']; ?></td>
        <td>$<?php echo $row['total']; ?></td>
        <td>
          <form method="post" action="carrito.php?action=remove&id=<?php echo $row['id']; ?>">
            <input type="submit" value="Eliminar">
          </form>
        </td>
      </tr>
    <?php endwhile; ?>
  </tbody>
  <tfoot>
    <tr>
      <td colspan="3"><strong>Total:</strong></td>
      <td>$<?php echo $_SESSION['total']; ?></td>
      <td>
        <form method="post" action="compra.php">
          <input type="submit" value="Realizar compra">
        </form>
      </td>
    </tr>
  </tfoot>
</table>

<?php } ?>
