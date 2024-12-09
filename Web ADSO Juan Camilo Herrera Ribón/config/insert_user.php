<?php
session_start();

include('../include/connection.php'); //conexión con base de datos.

/* INSERCIÓN DE USUARIOS A LA BASE DE DATOS */

//definición de variables.
$user_id = null;
$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$cedula = $_POST['password'];
$id_rol = $_POST['rol'];

//Sentencia SQL para insertar los datos enviardos por método POST a la base de datos.
$sql = "INSERT INTO cuentas VALUES('$user_id', '$nombre', '$telefono', '$correo', '$cedula', '$id_rol')";

//función reutilizada para asegurar la conexión entre la base de datos y la página.
$query = mysqli_query($conn,$sql);

//En caso de que el número insertado que define los roles NO SEA 0 (Usuario) u 1(Administrador), se dará un aviso para re insertar el código del rol.
if($id_rol){$id_rol != 0|1;
    echo("Rol de usuario no válido");
};
//Si hay un transporte de datos de la página a la base de datos, se actualizará la página mostrando la cuenta creada.
if($query){
    header("Location: ../template/cuentas.php");
    exit();
};



/* INSERCIÓN DE MERCANCÍA A LA BASE DE DATOS (? */

?>