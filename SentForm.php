<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar datos del formulario
    $nombre = $_POST['name'];
    $email = $_POST['email'];
    $asunto = $_POST['subject'];
    $mensaje = $_POST['mensaje'];

    // Dirección de correo de destino
    $destinatario = "administracion@so-udenar-archlinux.site";

    // Asunto del correo
    $asunto_correo = "Nuevo mensaje de contacto: $asunto";

    // Cuerpo del correo
    $cuerpo = "Has recibido un nuevo mensaje de contacto:\n\n";
    $cuerpo .= "Nombre: $nombre\n";
    $cuerpo .= "Email: $email\n";
    $cuerpo .= "Mensaje:\n$mensaje\n";

    // Cabeceras del correo
    $cabeceras = "From: $email" . "\r\n" ;

    // Enviar el correo
    if (mail($destinatario, $asunto_correo, $cuerpo, $cabeceras)) {
        echo '<script>alert("Mensaje enviado exitosamente."); window.location = "tu_pagina_de_contacto.php";</script>';
    } else {
        echo '<script>alert("Hubo un error al enviar el mensaje. Intenta nuevamente."); window.location = "index.php";</script>';
    }
}
?>
