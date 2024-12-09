<?php
session_start();

include('../include/connection.php'); //conexión con base de datos.

/* LÓGICA DE EDICIÓN DE USUARIOS EN LA BASE DE DATOS */

//definición de variables.
$user_id = $_POST['id']; //se coloca "POST" ya que se necesita el user_id para localizar al usuario específica a editar.
$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$cedula = $_POST['password'];
$id_rol = $_POST['rol'];

//Sentencia SQL para insertar los datos de edición enviardos por método POST a la base de datos.
$sql = "UPDATE cuentas SET nombre= '$nombre', telefono= '$telefono', correo= '$correo', password= '$cedula', id_rol= '$id_rol' WHERE user_id= '$user_id'";

//función reutilizada para realizar la conexión entre la base de datos y la página.
$query = mysqli_query($conn,$sql);

//En caso de que el número editado que define los roles NO SEA 0 (Usuario) u 1(Administrador), se dará un aviso para re insertar el código del rol.
if($id_rol){$id_rol < 0|1;
    echo("Rol de usuario no válido");
};

//Si hay un transporte de datos de la página a la base de datos, se actualizará la página mostrando la cuenta editada.
if($query){
    header("Location: ../template/cuentas.php");
    exit();
};

?>