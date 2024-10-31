<?php
session_start();
include("../../conexion.php");

// Get the user's email (you can modify this based on your session handling)
$email = $_SESSION['usuario'];

// Get the new password from the form (assuming it's submitted via POST)
$newPassword = $_POST['newpassword'];
$newPassword = hash('sha512', $newPassword);

// Update the password in the database
$sql = "UPDATE datosusuario SET contraseña = ? WHERE email = ?";
$statement = $conex->prepare($sql);
$statement->bind_param('ss', $newPassword, $email);

if ($statement->execute()) {
    session_start();
    session_destroy();
    echo '
        <script>
            alert("Datos Actualizados Correctamente. Por favor vuelve a ingresar");
            window.location = "../../login-register.php";
        </script>
    ';
        
} else {
    echo '
        <script>
            alert("Error: Vuelve a Intentarlo");
            window.location = "../login-registerU.php";
        </script>
        ';
}

// Close the database connection
$conex->close();
?>