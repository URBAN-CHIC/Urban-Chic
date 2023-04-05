<?php
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

    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
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
            $_SESSION['email'] = $row['email'];
            if ($remember) {
                setcookie('remember_email', $email, time() + 3600 * 24 * 7);
            } else {
                setcookie('remember_email', '', time() - 3600);
            }
            if ($row['rol'] == 'admin') {
                echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Bienvenido!!',
                    text: 'Ha iniciado sesión correctamente como administrador.',
                }).then(function() {
                    window.location.href = '../admin/paneladmin.php';
                  });
                </script>";
                exit;       
            } else {
                echo "<script>
                Swal.fire({
                    icon: 'success',
                    title: 'Bienvenido!!',
                    text: 'Ha iniciado sesión correctamente como usuario.',
                }).then(function() {
                    window.location.href = '../views/urbanChics.php';
                  });
                </script>";
                exit;
            }
        }
    } else {
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