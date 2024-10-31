<?php
session_start();
include("../../conexion.php");

// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Get the user's email
$email = $_SESSION['usuario'];

// Check if an image file was uploaded
if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
    // New image uploaded
    $newImage = $_FILES['image']['tmp_name'];
    $newImgContent = file_get_contents($newImage);

    // Update the image data in the database
    $sql = "UPDATE datosusuario SET image = ? WHERE email = ?";
    $statement = $conex->prepare($sql);
    if ($statement === false) {
        die('MySQL prepare error: ' . $conex->error);
    }
    $statement->bind_param('ss', $newImgContent, $email);
    $result = $statement->execute();
    
    if ($result) {
        echo '
        <script>
            alert("Imagen Cargada Exitosamente");
            window.location = "../login-registerU.php";
        </script>
        ';
    } else {
        echo '
        <script>
            alert("Error: Imagen No Cargada, Vuelve a Intentarlo");
            window.location = "../login-registerU.php";
        </script>
        ';
    }
} else {
    echo '
        <script>
            alert("Seleccionar una Imagen");
            window.location = "../login-registerU.php";
        </script>
    ';
}

// Close the database connection
$conex->close();
?>
