<?php
include("conexion.php");

// Consulta SQL para obtener los comentarios
$sql = "SELECT id, fecha, des, correo FROM comment WHERE idbl = $id";
$result = $conex->query($sql);

$numb = $result->num_rows;
if ($result->num_rows > 0) {
    echo '<section class="layout_padding">' . "\n";
    echo '    <div class="container">' . "\n";
    echo '        <div class="row">' . "\n";
    echo '            <div class="col-md-12">' . "\n";
    echo '                <div class="heading" style="padding-left: 15px;padding-right: 15px;">' . "\n";
    echo '                    <h4 style="border-bottom: solid #333 1px;">Comentarios / ' . $numb . '</h4>' . "\n";

    echo '                </div>' . "\n";
    echo '            </div>' . "\n";
    echo '        </div>' . "\n";
    
    // Iterar sobre cada comentario
    while($row = $result->fetch_assoc()) {
        echo '        <div class="row">' . "\n";
        echo '            <div class="col-md-12">' . "\n";
        echo '                <div class="full comment_blog_line">' . "\n";
        echo '                    <div class="row">' . "\n";
        echo '                        <div class="col-md-1">' . "\n";
        
        // Consulta SQL para obtener la imagen y el nombre del usuario
        $sql_usuario = "SELECT image, nombre FROM datosusuario WHERE email = '" . $row["correo"] . "'";
        $result_usuario = $conex->query($sql_usuario);
        
        if ($result_usuario->num_rows > 0) {
            $usuario = $result_usuario->fetch_assoc();
            $img_data = $usuario["image"];
            $nombre = $usuario["nombre"];
            if ($img_data == NULL) {

                // Si no hay resultados, mostrar una imagen por defecto o un mensaje de error
                // Puedes personalizar esto según tus necesidades
                echo '                            <img src="images/profile.png" alt="User Profile Image">' . "\n";
            }else{
                echo '                            <img src="data:image/png;base64,' . base64_encode($img_data) . '" alt="User Profile Image">' . "\n";
            }
        }
        // Consulta SQL para obtener las respuestas asociadas a este comentario
        $sql_respuestas = "SELECT des FROM respuestas WHERE id = '" . $row["id"] . "'";
        $result_respuestas = $conex->query($sql_respuestas);
        if ($result_respuestas->num_rows > 0) {
            echo '                        </div>' . "\n";
            echo '                        <div class="col-md-9">' . "\n";
            echo '                            <div class="full contact_text">' . "\n";
            echo '                                <h3>'.$nombre.'</h3>' . "\n";
            echo '                                <h4>'.$row["fecha"].'</h4>' . "\n";
            echo '                                <p> '.$row["des"].'</p>' . "\n";
            //Mostrar las respuestas
            while ($respuesta = $result_respuestas->fetch_assoc()) {
                echo '                                <p>'.$respuesta["des"].'</p>' . "\n";
            }
            
            echo '                            </div>' . "\n";
            echo '                        </div>' . "\n";

        } else {
            // Si no hay respuestas, mostrar solo el comentario
            echo '                        </div>' . "\n";
            echo '                        <div class="col-md-9">' . "\n";
            echo '                            <div class="full contact_text">' . "\n";
            echo '                                <h3>'.$nombre.'</h3>' . "\n";
            echo '                                <h4>'.$row["fecha"].'</h4>' . "\n";
            echo '                                <p> '.$row["des"].'</p>' . "\n";
            echo '                            </div>' . "\n";
            echo '                        </div>' . "\n";

        }
        
        echo '                    </div>' . "\n";
        echo '                </div>' . "\n";
        echo '            </div>' . "\n";
        echo '        </div>' . "\n";
    }
    
}else{
    echo '<section class="layout_padding">' . "\n";
    echo '    <div class="container">' . "\n";
    echo '        <div class="row">' . "\n";
    echo '            <div class="col-md-12">' . "\n";
    echo '                <div class="heading" style="padding-left: 15px;padding-right: 15px;">' . "\n";
    echo '                    <h4 style="border-bottom: solid #333 1px;">Comentarios / ' . $numb . '</h4>' . "\n";
    echo '                </div>' . "\n";
    echo '            </div>' . "\n";
    echo '        </div>' . "\n";
}
?>
