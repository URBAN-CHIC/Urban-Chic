<?php


if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 15)) {
    session_unset();
    session_destroy();  
    ?>
    <script>
        Swal.fire({
            title: "La sesión ha caducado",
            text: "Por favor inicia sesión nuevamente",
            icon: "warning",
            confirmButtonText: "Aceptar"
        }).then(function() {
            window.location.href = "../views/loguear.php";
        });
    </script>
    <?php
}
$_SESSION['LAST_ACTIVITY'] = time(); // Actualizamos el último tiempo de actividad.
?>