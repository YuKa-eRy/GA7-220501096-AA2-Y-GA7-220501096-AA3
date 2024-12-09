<?php
session_start();

include('../include/connection.php');

$sql = "SELECT * FROM cuentas"; //Selección de la tabla 'cuentas' para la búsqueda de los datos.
$query = mysqli_query($conn,$sql); //conexión que permite obtener los datos de la base de datos a la página.

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
    <title>CUENTAS</title>
</head>
<body>
    <div>
        <h1>Cuentas</h1>
            <form action="../config/insert_user.php" method="POST">
                <h2>Creación de usurarios</h2>

                <input type="text" name="nombre" placeholder="Nombre de usuario">
                <input type="number" name="telefono" placeholder="Número de teléfono">
                <input type="email" name="correo" placeholder="Correo electrónico">
                <input type="number" name="password" placeholder="cédula">
                <input type="number" name="rol"  placeholder="Rol de usuario">

                <input type="submit" value="Agregar nuevo usuario">
            </form>
    </div>

    <div>
        <h2>Usuarios existentes</h2>
        <table>
            <thead>
                <tr>Id</tr>
                <tr>Nombre</tr>
                <tr>Teléfono</tr>
                <tr>Correo</tr>
                <tr>Cédula</tr>
                <tr>Rol</tr>
                <th></th>
                <th></th>
            </thead>

            <tbody>
                <?php while($row = mysqli_fetch_array($query)):?>
                <tr>
                    <th> <?= $row['user_id'] ?> </th>
                    <th> <?= $row['nombre'] ?> </th>
                    <th> <?= $row['telefono'] ?> </th>
                    <th> <?= $row['correo'] ?> </th>
                    <th> <?= $row['cedula'] ?> </th>
                    <th> <?= $row['id_rol'] ?> </th>

                    <th><a href="../config/update.php?user_id=<?= $row['user_id'] ?> ">Editar</a></th>
                    <th><a href="../config/delete_user.php?user_id=<?= $row['user_id'] ?>">Eliminar</a></th>
                </tr>
                <?php endwhile;?>
            </tbody>
        </table>
    </div>
</body>
</html>