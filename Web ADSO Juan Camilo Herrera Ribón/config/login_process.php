<?php 
session_start();

include('../include/connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $correo = $_POST["correo"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT c.correo, c.cedula, r.rol AS roles FROM cuentas c JOIN roles r ON c.id_rol = r.id_rol WHERE c.correo = ?");
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        //verificación de la cédula
        if ($password === $row['password']) {
            //permiso para continuar e identificación y sepación de ruta por rol (datos correctos)
            $_SESSION['usuario_rol'] = $row['roles'];

            if ($row['roles'] === 'Administrador') {
                header("Location: ../template/menu_admin.php"); //Ruta para menú principal de administrador
            } elseif ($row['roles'] === 'Usuario') {
                header("Location: ../template/menu_user.php"); //Ruta para menú principal usuario
            }
            exit();
        } else {
            //permiso para continuar denegado (datos incorrectos)
            $_SESSION['mensaje_error'] = "Datos de usuario incorrectos";
            header("Location: ../template/inicio_sesion.php"); //Redirección al login para intentar un nuevo ingreso
            exit();
        } 
    } else {
            //en caso de que los datos no existan
            $_SESSION['mensaje_error'] = "Usuario no encontrado";
            header("Location: ../template/inicio_sesion.php"); //Redirección al login para intentar un nuevo ingreso        
            exit();
    }

}

$conn->close();
?>