<?php
session_start();

include('../include/connection.php');

// Verificar si hay una sesión iniciada
if (isset($_SESSION['usuario_rol'])) {
    // Si el usuario NO es un administrador, redirigirlo a una página de acceso denegado o a una página adecuada para el Usuario
    if ($_SESSION['usuario_rol'] !== 'Administrador') {
        header("Location: ../template/inicio_sesion.php"); // Ruta para la página de acceso denegado
        exit();
    }
} else {
    // Si no hay una sesión iniciada, redirigir al usuario al formulario de inicio de sesión
    header("Location: ../template/inicio_sesion.php"); // Ruta para el formulario de inicio de sesión
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/menu_admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.0/css/all.min.css"
        integrity="sha512-9xKTRVabjVeZmc+GUW8GgSmcREDunMM+Dt/GrzchfN8tkwHizc5RP4Ok/MXFFy5rIjJjzhndFScTceq5e6GvVQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>MENÚ ADMIN</title>
</head>

<body>

    <header class="header">
        <div class="container">
            <nav class="nav-pri">
                <img src="../images/png-transparent-smiley-face-happy-faces-s-face-smiley-emoticon.png" alt="DreamStore" class="pri-brand">
                    <ul class="nav-sec">
                            <h3>DreamStore</h3>
                            <p>Menú principal de funciones para administrador</p>
                    </ul>
            </nav>
        </div>
        <hr>
    </header>

    <aside class="sidebar">
        <ul class="sidebar_list">
            <li class="sidebar_element">

                <img src="../svg/bxs-store.svg" class="sidebar_icon sidebar_icon--logo">
                <div class="sidebar_hide">
                    <h2 class="sidebar_logo">OPERACIONES</h2>
                </div>

            </li>
            <li class="sidebar_element">

                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="sidebar_icon">
                    <path
                        d="M20 2H8a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zm-6 2.5a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5zM19 15H9v-.25C9 12.901 11.254 11 14 11s5 1.901 5 3.75V15z" />
                    <path d="M4 8H2v12c0 1.103.897 2 2 2h12v-2H4V8z" />
                </svg>
                <div class="sidebar_hide">
                    <a class="sidebar_text" href="cuentas.php">Cuentas</a>
                </div>

            </li>
            <li class="sidebar_element">

                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="sidebar_icon">
                    <path
                        d="M5 22h14c1.103 0 2-.897 2-2V9a1 1 0 0 0-1-1h-3V7c0-2.757-2.243-5-5-5S7 4.243 7 7v1H4a1 1 0 0 0-1 1v11c0 1.103.897 2 2 2zM9 7c0-1.654 1.346-3 3-3s3 1.346 3 3v1H9V7zm-4 3h2v2h2v-2h6v2h2v-2h2l.002 10H5V10z" />
                </svg>
                <div class="sidebar_hide">
                    <a class="sidebar_text" href="inventario.php">Inventario</a>
                </div>

            </li>
            <li class="sidebar_element">

                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="sidebar_icon">
                    <path
                        d="M20 6h-3V4c0-1.103-.897-2-2-2H9c-1.103 0-2 .897-2 2v2H4c-1.103 0-2 .897-2 2v11c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2V8c0-1.103-.897-2-2-2zM6 8h2v11H6V8zm12 11h-2V8h2v11zM15 4v2H9V4h6z" />
                </svg>
                <div class="sidebar_hide">
                    <a class="sidebar_text" href="mov_ingreso.php">Mov. Ingreso</a>
                </div>

            </li>
            <li class="sidebar_element">

                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="sidebar_icon">
                    <path
                        d="M15.999 8.5h2c0-2.837-2.755-4.131-5-4.429V2h-2v2.071c-2.245.298-5 1.592-5 4.429 0 2.706 2.666 4.113 5 4.43v4.97c-1.448-.251-3-1.024-3-2.4h-2c0 2.589 2.425 4.119 5 4.436V22h2v-2.07c2.245-.298 5-1.593 5-4.43s-2.755-4.131-5-4.429V6.1c1.33.239 3 .941 3 2.4zm-8 0c0-1.459 1.67-2.161 3-2.4v4.799c-1.371-.253-3-1.002-3-2.399zm8 7c0 1.459-1.67 2.161-3 2.4v-4.8c1.33.239 3 .941 3 2.4z" />
                </svg>
                <div class="sidebar_hide">
                    <a class="sidebar_text" href="vista_ingreso.php">Vista Ingreso</a>
                </div>

            </li>
            <li class="sidebar_element">

                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="sidebar_icon">
                    <path
                        d="M20 6h-3V4c0-1.103-.897-2-2-2H9c-1.103 0-2 .897-2 2v2H4c-1.103 0-2 .897-2 2v3h20V8c0-1.103-.897-2-2-2zM9 4h6v2H9V4zm5 10h-4v-2H2v7c0 1.103.897 2 2 2h16c1.103 0 2-.897 2-2v-7h-8v2z" />
                </svg>
                <div class="sidebar_hide">
                    <a class="sidebar_text" href="mov_egreso.php">Mov. Egreso</a>
                </div>

            </li>
            <li class="sidebar_element">

                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="sidebar_icon">
                    <path
                        d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm1 14.915V18h-2v-1.08c-2.339-.367-3-2.002-3-2.92h2c.011.143.159 1 2 1 1.38 0 2-.585 2-1 0-.324 0-1-2-1-3.48 0-4-1.88-4-3 0-1.288 1.029-2.584 3-2.915V6.012h2v1.109c1.734.41 2.4 1.853 2.4 2.879h-1l-1 .018C13.386 9.638 13.185 9 12 9c-1.299 0-2 .516-2 1 0 .374 0 1 2 1 3.48 0 4 1.88 4 3 0 1.288-1.029 2.584-3 2.915z" />
                </svg>
                <div class="sidebar_hide">
                    <a class="sidebar_text" href="vista_egreso.php">Vista Egreso</a>
                </div>

            </li>
            <li class="sidebar_element">

                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="sidebar_icon">
                    <path
                        d="M3.433 17.325 3.079 19.8a1 1 0 0 0 1.131 1.131l2.475-.354C7.06 20.524 8 18 8 18s.472.405.665.466c.412.13.813-.274.948-.684L10 16.01s.577.292.786.335c.266.055.524-.109.707-.293a.988.988 0 0 0 .241-.391L12 14.01s.675.187.906.214c.263.03.519-.104.707-.293l1.138-1.137a5.502 5.502 0 0 0 5.581-1.338 5.507 5.507 0 0 0 0-7.778 5.507 5.507 0 0 0-7.778 0 5.5 5.5 0 0 0-1.338 5.581l-7.501 7.5a.994.994 0 0 0-.282.566zM18.504 5.506a2.919 2.919 0 0 1 0 4.122l-4.122-4.122a2.919 2.919 0 0 1 4.122 0z" />
                </svg>
                <div class="sidebar_hide">
                    <a class="sidebar_text" href="cierre_caja.php">Cierre caja</a>
                </div>

            </li>
            <li class="sidebar_element sidebar_element--avatar">

                <img src="../svg/bxs-user.svg" class="sidebar_icon sidebar_icon--avatar">
                <div class="sidebar_hide">
                    <a class="sidebar_title" href="../config/logout.php">Cerrar sesión</a>
                    <h3 class="sidebar_info">Juan Camilo Herrera</h3>
                    <p class="sidebar_info">Administrador</p>
                </div>

            </li>
        </ul>
    </aside>

</body>

</html>