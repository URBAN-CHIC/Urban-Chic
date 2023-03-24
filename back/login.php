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

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $hash = $row['pass'];

    if (password_verify($password, $hash)) {
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
            header('Location: ../admin/paneladmin.php');
            exit;
        } else {
            header('Location: ../views/urbanChics.html');
            exit;
        }
    } else {
        echo "Error: Usuario o contraseña incorrectos.";
    }
}

mysqli_close($conn);
?>