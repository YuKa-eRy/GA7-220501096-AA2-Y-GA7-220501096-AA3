<?php
session_start(); //para iniciar sesión si aún no está inciada

// Destruir todas las variables de sesión
$_SESSION = array();

// Si se quiere cerrar la sesión en su totalidad tambiénnse debe eliminar la cookie de sesión.
// cierre de sesión (no eliminación de la informaciónnde sesión).
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - mktime(1),
        $params["path"], $params["domain"],
            $params["secure"], $params["hhtponly"]
);
}

//Eliminación de la sesión.
session_destroy();

//Redirección al inicio de sesión.
header("Location:../template/inicio_sesion.php");
exit;
?>