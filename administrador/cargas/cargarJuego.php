<?php
    include("../../conexion.php");

    if (
        strlen($_POST['nombreJ']) >= 1 &&
        strlen($_POST['precioJ']) >= 1 &&
        strlen($_POST['linkJ']) >= 1 &&
        strlen($_POST['descripcionJ']) >= 1
    ) {
        $name = trim($_POST['nombreJ']);
        $price = trim($_POST['precioJ']);
        $link = trim($_POST['linkJ']);
        $description = trim($_POST['descripcionJ']);

        // Check if an image file was uploaded
        if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
            // New image uploaded
            $newImage = $_FILES['image']['tmp_name'];
            $newImgContent = file_get_contents($newImage);

            $fecha = date("d/m/y");

            $consulta = "INSERT INTO tabjuegos(titulo, precio, fecha, des, img, url)
                VALUES(?, ?, ?, ?, ?, ?)";

            // Validating duplicate game titles
            $verificar_juego = mysqli_query($conex, "SELECT * FROM tabjuegos WHERE titulo = '$name' ");
            if (mysqli_num_rows($verificar_juego) > 0) {
                echo '
                    <script>
                        alert("Juego Ya Publicado");
                    </script>
                ';
                exit();
            }

            $statement = $conex->prepare($consulta);
            $statement->bind_param('ssssss', $name, $price, $fecha, $description, $newImgContent, $link);
            $result = $statement->execute();

            if ($result) {
                echo '
                    <script>
                        alert("Juego Publicado Correctamente");
                        window.location = "../juegosA.php";
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
                    window.location = "../juegosA.php";
                </script>
            ';
            exit();
        }

        
    } else {
        echo '
            <script>
                alert("Por Favor LLenar Todos los Campos");
                window.location = "../juegosA.php";
            </script>
        ';
    }

    // Close the database connection
    $conex->close();
?>