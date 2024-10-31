<?php 
include("../conexion.php");

if (isset($_POST['ecoment'])) {
    $email = $_POST['usuario'];
    $fecha = date("Y-m-d"); // Formato de fecha para MySQL es 'YYYY-MM-DD'
    $des = $_POST['coment'];
    $ides = $_POST["id"];

    $consulta = "INSERT INTO comment (idbl, fecha, des, correo)
                 VALUES ('$ides', '$fecha', '$des', '$email')";

    // Ejecutar la consulta
    if (mysqli_query($conex, $consulta)) {
        // Imprimir mensaje en la consola del navegador
        echo "<script>console.log('Comentario insertado correctamente');</script>";
        enviarNotificacion($des, $email);
    } else {
        // Imprimir mensaje de error en la consola del navegador
        echo "<script>console.error('Error al insertar el comentario: " . mysqli_error($conex) . "');</script>";
    }
}
function enviarNotificacion($des,$email) {
    $to = "administracion@so-udenar-archlinux.site"; // Reemplaza con tu correo
    $subject = "Nuevo comentario recibido";
    $message = "Se ha recibido un nuevo comentario:\n\n" . $des;
    $headers = "From:  $email"; // Cambia esto según tu dominio

    if(mail($to, $subject, $message, $headers)) {
        echo "Notificación enviada.";
    } else {
        echo "Error al enviar la notificación.";
    }
}
echo '
                    <script>
                        alert("Comentario Publicado Correctamente");
                        window.location = "blogU.php";
                    </script>
                ';
$conex->close();
?>
