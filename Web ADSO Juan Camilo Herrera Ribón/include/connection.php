<?php

$servername = "localhost";
$username = "root"; //reemplazar con el usuario propio del localhost
$password = "Misterg12004"; //reemplazar con la contraseña respectiva
$dbname = "mydb"; //reemplazar con el nombre de la base de datos

//creación de conexión
$conn = new mysqli($servername, $username, $password, $dbname);

//verificación de conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

?>