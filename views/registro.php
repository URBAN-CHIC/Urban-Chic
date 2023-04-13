

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/registro.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.js"></script>
    <title>Crear Cuenta</title>
</head>
<body>

    <section>
        <div class="form-box">
            <div class="form-value">
                <form action="" method="POST">
                    <h2>Registro</h2>
                    
                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="text" name="nombre">
                        <label for="">Nombre</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="text" name="apellido_paterno">
                        <label for="">Apellido paterno</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="person-outline"></ion-icon>
                        <input type="text" name="apellido_materno">
                        <label for="">Apellido materno</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" name="email">
                        <label for="">Correo electrónico</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="password" name="pass">
                        <label for="">Contraseña</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="call-outline"></ion-icon>
                        <input type="tel" name="telefono">
                        <label for="">Número de celular</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="transgender-outline"></ion-icon>
                        <select name="sexo">
                            <option value="" disabled selected>Selecciona tu sexo</option>
                            <option value="femenino">Femenino</option>
                            <option value="masculino">Masculino</option>
                            <option value="otro">Otro</option>
                        </select>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="calendar-outline"></ion-icon>
                        <input type="number" min="1" max="120" name="edad">
                        <label for="">Edad</label>
                    </div>
                    <button type="submit" name="submit">Registrarse</button>
                    <div class="login" style="margin-top:20px">
                        <p>¿Ya tienes una cuenta? <a href="./login.html">Iniciar sesión</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <?php include("../back/register.php")?>
   
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>