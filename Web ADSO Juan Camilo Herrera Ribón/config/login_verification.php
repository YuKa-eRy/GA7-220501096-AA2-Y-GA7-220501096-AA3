<?php
session_start();

// Verificación de inicio de sesión del usuario
if (!isset($_SESSION['correo'])) {
    header("Location: ../template/inicio_sesion.php"); // Redirección a inicio de sesión
    exit;
}
?>