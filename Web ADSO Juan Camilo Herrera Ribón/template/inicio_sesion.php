<h1?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INICIO_SESIÓN</title>
    <link rel="stylesheet" href="../style/login.css">
</head>
<body>
    
<div class="container">
        <nav class="nav-pri">
            <img src="" alt="DreamStore" class="pri-brand">
            <ul class="nav-sec">
                <p>DreamStore</p>
            </ul>
        </nav>
        <hr>

        <div class="form-container">
            <div class="form-content">
            <form action="../config/login_process.php" method="POST">
                <h1>INICIAR SESIÓN</h1>
                <?php if (isset($_SESSION['mensaje_error'])): ?>
                    <div class="error"><?php echo $_SESSION['mensaje_error']; ?></div>
                <?php unset($_SESSION['mensaje_error']); endif; ?>
                <div class="input-box">
                    <input type="email" id="correo" name="correo" placeholder="correo electrónico" required><br>
                </div>
                <div class="input-box">
                    <input type="password" id="password" name="cedula" placeholder="cedula" required><br>
                </div>
                <div class="remember-forgot">
                </div>
                <div class="button-center">
                    <button class="btn">Continuar</button>
                </div>
            </form>
            </div>
        </div>
</div>

</body>
</html>