

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="../styles/style.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <title>Iniciar sesion</title>
</head>
<body>

   <section>
    <div class="form-box">
        <div class="form-value">
            <form action="" method="POST">
                <h2>Login</h2>

                <div class="inputbox">
                    <ion-icon name="mail-outline"></ion-icon>
                    <input type="email" name="email" required>
                    <label for="">Email</label>
                </div>
                <div class="inputbox">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input type="password" name="password" required>
                    <label for="">Password</label>
                </div>

                <div class="mb-3">
                    <div class="g-recaptcha" data-sitekey="6LdhGIYlAAAAACbzCJ0bXP_phx4FivJSPfI213Wi" required></div>
                </div>

                <button type="submit" name="login">Log in</button>
            </form>
        </div>
    </div>
</section>

    <?php include("../back/login.php")?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>