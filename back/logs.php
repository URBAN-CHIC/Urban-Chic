<?php 

function registrarLog($tipo, $mensaje, $ip) {
    $conexion = mysqli_connect("localhost", "root", "", "urban");
    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    $mensaje = mysqli_real_escape_string($conexion, $mensaje);
    $fecha_actual = date('Y-m-d H:i:s');
    $consulta = "INSERT INTO logs (fecha, tipo, mensaje, ip) VALUES ('$fecha_actual', '$tipo', '$mensaje', '$ip')";
    if (mysqli_query($conexion, $consulta)) {
        echo "Registro de log exitoso.";
    } else {
        echo "Error al registrar el log: " . mysqli_error($conexion);
    }
    mysqli_close($conexion);
}

?>