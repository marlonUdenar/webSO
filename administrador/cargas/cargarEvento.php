<?php
    include("../../conexion.php");

    if (
        strlen($_POST['tituloE']) >= 1 &&
        strlen($_POST['linkE']) >= 1 &&
        strlen($_POST['descripcionE']) >= 1
    ) {
        $name = trim($_POST['tituloE']);
        $link = trim($_POST['linkE']);
        $description = trim($_POST['descripcionE']);

        // Check if an image file was uploaded
        if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
            // New image uploaded
            $newImage = $_FILES['image']['tmp_name'];
            $newImgContent = file_get_contents($newImage);

            $fecha = date("d/m/y");

            $consulta = "INSERT INTO tabevento(titulo, fecha, des, img, url)
                VALUES(?, ?, ?, ?, ?)";

            // Validating duplicate game titles
            $verificar_juego = mysqli_query($conex, "SELECT * FROM tabevento WHERE titulo = '$name' ");
            if (mysqli_num_rows($verificar_juego) > 0) {
                echo '
                    <script>
                        alert("Evento Ya Publicado");
                    </script>
                ';
                exit();
            }

            $statement = $conex->prepare($consulta);
            $statement->bind_param('sssss', $name, $fecha, $description, $newImgContent, $link);
            $result = $statement->execute();

            if ($result) {
                echo '
                    <script>
                        alert("Evento Publicado Correctamente");
                        window.location = "../contactA.php";
                    </script>
                ';
            } else {
                echo '
                    <script>
                        alert("Error");
                    </script>
                ';
            }


        } else {
            echo '
                <script>
                    alert("Seleccionar una imagen");
                    window.location = "../contactA.php";
                </script>
            ';
            exit();
        }

        
    } else {
        echo '
            <script>
                alert("Por Favor LLenar Todos los Campos");
                window.location = "../contactA.php";
            </script>
        ';
    }

    // Close the database connection
    $conex->close();
?>