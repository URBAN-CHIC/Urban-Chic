<?php
include 'logs.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "urban";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("La conexión ha fallado: " . mysqli_connect_error());
}

if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $remember = isset($_POST['remember']);

    $sql = "SELECT usuarios.*, clientes.nombre, clientes.apellidoPaterno, clientes.apellidoMaterno, clientes.telefono, clientes.sexo, clientes.edad FROM usuarios 
        JOIN clientes ON usuarios.id_cliente = clientes.id 
        WHERE usuarios.email = '$email'";

    // $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Error en la consulta: " . mysqli_error($conn));
    }

    $row = mysqli_fetch_assoc($result);
    $hash = $row['pass'];

    if (password_verify($password, $hash)) {
        if ($row['estado'] == 'inactivo') {
            echo "<script>
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Usuario o contraseña incorrectos. revisa la informacion proporcionada.'
            });
          </script>";
        } else {
            session_start();

            $_SESSION['id'] = $row['id'];
            $_SESSION['rol'] = $row['rol'];
            $_SESSION['nombre'] = $row['nombre'];
            $_SESSION['apellido_paterno'] = $row['apellidoPaterno'];
            $_SESSION['apellido_materno'] = $row['apellidoMaterno'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['telefono'] = $row['telefono'];
            $_SESSION['sexo'] = $row['sexo'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['edad'] = $row['edad'];
          
            
            if ($remember) {
                setcookie('remember_email', $email, time() + 3600 * 24 * 7);
            } else {
                setcookie('remember_email', '', time() - 3600);
            }
            if ($row['rol'] == 'admin') {
                $ip_usuario = $_SERVER['REMOTE_ADDR'];
                registrarLog("login_success", "Inicio de sesión exitoso para el Administrador" . $_SESSION['nombre'], $ip_usuario);

               echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Bienvenido!!',
                    text: 'Ha iniciado sesión correctamente como " . $_SESSION['nombre'] . " " . $_SESSION['apellido_paterno'] . ".',
                }).then(function() {
                window.location.href = '../admin/paneladmin.php';
                  });
                </script>";
                exit;       
            } else {
                $ip_usuario = $_SERVER['REMOTE_ADDR'];
                registrarLog("login_success", "Inicio de sesión exitoso para el Usuario" . $_SESSION['nombre'], $ip_usuario);
                echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Bienvenido!!',
                    text: 'Ha iniciado sesión correctamente como " . $_SESSION['nombre'] . " " . $_SESSION['apellido_paterno'] . ".',
                }).then(function() {
                    window.location.href = '../views/urbanChics.php';
                });
            </script>";
                exit;
            }
        }
    } else {
        $ip_usuario = $_SERVER['REMOTE_ADDR'];
        registrarLog("login_failure", "Intento de inicio de sesión fallido para el usuario " . $_POST['email'], $ip_usuario);
        echo "<script>
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Usuario o contraseña incorrectos. revisa la informacion proporcionada.'
        });
      </script>";
    }

}



mysqli_close($conn);
?>