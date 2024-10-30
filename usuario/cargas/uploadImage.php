<?php
session_start();
include("../../conexion.php");

// Get the user's email (you can modify this based on your session handling)
$email = $_SESSION['usuario'];

// Check if an image file was uploaded
if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
    // New image uploaded
    $newImage = $_FILES['image']['tmp_name'];
    $newImgContent = file_get_contents($newImage);

    // Update the image data in the database
    $sql = "UPDATE datosusuario SET image = ? WHERE email = ?";
    $statement = $conex->prepare($sql);
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