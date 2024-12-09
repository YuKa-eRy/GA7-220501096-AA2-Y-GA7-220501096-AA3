<?php 
session_start();

include('../include/connection.php'); //conexión con base de datos.

/* ELIMINACIÓN DE USUARIOS DE LA BASE DE DATOS */

$user_id = $_GET['user_id']; //Obtención de id de usuario.

$sql = "DELETE FROM cuentas WHERE user_id='$user_id'";

//función reutilizada para realizar la conexión entre la base de datos y la página.
$query = mysqli_query($conn,$sql);

//Si hay un transporte de datos de la página a la base de datos, se actualizará la página mostrando la cuenta editada.
if($query){
    header("Location: ../template/cuentas.php");
    exit();
};

?>