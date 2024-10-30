<?php
    include("../../conexion.php");
    if(){
        
    }
    else{    
        if (
            strlen($_POST['tituloB']) >= 1 &&
            strlen($_POST['descripcionB']) >= 1
        ) {
            $name = trim($_POST['tituloB']);
            $description = trim($_POST['descripcionB']);

            // Check if an image file was uploaded
            if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
                // New image uploaded
                $newImage = $_FILES['image']['tmp_name'];
                $newImgContent = file_get_contents($newImage);

                $fecha = date("d/m/y");

                $consulta = "INSERT INTO tablog(titulo, fecha, des, img)
                    VALUES(?, ?, ?, ?)";

                // Validating duplicate game titles
                $verificar_juego = mysqli_query($conex, "SELECT * FROM tablog WHERE titulo = '$name' ");
                if (mysqli_num_rows($verificar_juego) > 0) {
                    echo '
                        <script>
                            alert("Entrada Ya Publicada");
                        </script>
                    ';
                    exit();
                }

                $statement = $conex->prepare($consulta);
                $statement->bind_param('ssss', $name, $fecha, $description, $newImgContent);
                $result = $statement->execute();

                if ($result) {
                    echo '
                        <script>
                            alert("Entrada Publicada Correctamente");
                            window.location = "../blogA.php";
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
                        window.location = "../blogA.php";
                    </script>
                ';
                exit();
            }

            
        } else {
            echo '
                <script>
                    alert("Por Favor LLenar Todos los Campos");
                    window.location = "../blogA.php";
                </script>
            ';
        }
    }

    // Close the database connection
    $conex->close();
?>