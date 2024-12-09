<?php
session_start();

include('../include/connection.php'); //conexión con base de datos.

/* EDICIÓN DE USUARIOS DE LA BASE DE DATOS */

$user_id = $_GET['user_id']; //Obtención de id de usuario.

//Sentencia SQL para seleccionar los datos en específico por el método GET en la base de datos.
$sql = "SELECT * FROM cuentas WHERE user_id='$user_id'";

//función reutilizada para asegurar la conexión entre la base de datos y la página.
$query = mysqli_query($conn,$sql);

//Función para traer los datos necesarios de la tabla "cuentas".
$row = mysqli_fetch_array($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITAR USUARIO</title>
</head>
<body>
    <div>
        <h1>Cuentas</h1>
            <form action="edit_user.php" method="POST">
                <h2>Edición de usuario</h2>

                <input type="hidden" name="id" value="<?= $row['user_id'] ?>">
                <input type="text" name="nombre" placeholder="Nombre de usuario" value="<?= $row['nombre'] ?>">
                <input type="number" name="telefono" placeholder="Número de teléfono" value="<?= $row['telefono'] ?>">
                <input type="email" name="correo" placeholder="Correo electrónico" value="<?= $row['correo'] ?>">
                <input type="number" name="password" placeholder="cédula" value="<?= $row['cedula'] ?>">
                <input type="number" name="rol"  placeholder="Rol de usuario" value="<?= $row['id_rol'] ?>">

                <input type="submit" value="Confirmar edición">
            </form>
    </div>
</body>
</html>