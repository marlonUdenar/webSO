<?php
    include("../../conexion.php");

    if (
        strlen($_POST['tituloN']) >= 1 &&
        strlen($_POST['linkN']) >= 1 &&
        strlen($_POST['descripcionN']) >= 1
    ) {
        $name = trim($_POST['tituloN']);
        $link = trim($_POST['linkN']);
        $description = trim($_POST['descripcionN']);

        // Check if an image file was uploaded
        if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
            // New image uploaded
            $newImage = $_FILES['image']['tmp_name'];
            $newImgContent = file_get_contents($newImage);

            $fecha = date("d/m/y");

            $consulta = "INSERT INTO tabnoticias(titulo, fecha, des, img, link)
                VALUES(?, ?, ?, ?, ?)";

            // Validating duplicate game titles
            $verificar_juego = mysqli_query($conex, "SELECT * FROM tabnoticias WHERE titulo = '$name' ");
            if (mysqli_num_rows($verificar_juego) > 0) {
                echo '
                    <script>
                        alert("Noticia Ya Publicada");
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
                        alert("Noticia Publicada Correctamente");
                        window.location = "../noticiasA.php";
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
                    window.location = "../noticiasA.php";
                </script>
            ';
            exit();
        }

        
    } else {
        echo '
            <script>
                alert("Por Favor LLenar Todos los Campos");
                window.location = "../noticiasA.php";
            </script>
        ';
    }

    // Close the database connection
    $conex->close();
?>