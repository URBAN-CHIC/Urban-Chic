<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <title>Iniciar sesion</title>
</head>
<body>

   <section>
    <div class="form-box">
        <div class="form-value">
            <form action="../back/login.php" method="post">
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
                <div class="forget">
                    <label for=""><input type="checkbox" name="remember">Remember me  <a href="">Forget password</a></label>
                </div>
                <button type="submit" name="login">Log in</button>
                <div class="register">
                    <p>Don't have an account <a href="./registro.php">Register</a></p>
                </div>
            </form>
        </div>
    </div>
</section>




    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>