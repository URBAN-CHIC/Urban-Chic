<?php

session_start();

if (!isset($_SESSION['rol'])) {
    header('Location: ../views/404.html');
    exit;
}

if ($_SESSION['rol'] == 'admin') {
    $allowed_paths = array(
        '/urbanchic/admin/paneladmin.php',
        '/urbanchic/back/logout.php'
    );
} elseif ($_SESSION['rol'] == 'cliente') {
 
    $allowed_paths = array(
        '/urbanchic/views/urbanChics.php',
        '/urbanchic/back/logout.php'
    );
} else {

    header('Location: ../views/403.html');
    exit;
}

 $current_path = $_SERVER['PHP_SELF'];

 if (!in_array($current_path, $allowed_paths)) {
     header('Location: ../views/403.html');
      exit;
  }
?>