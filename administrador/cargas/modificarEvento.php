<?php
    include("../../conexion.php");
    if (isset($_POST['deleteE'])){
        if (isset($_POST['idE'])) {
            $idToDelete = $_POST['idE']; // Get the ID of the event to delete
    
            $consulta = "DELETE FROM tabevento WHERE id=?";
    
            $statement = $conex->prepare($consulta);
            $statement->bind_param('i', $idToDelete);
            $result = $statement->execute();
    
            if ($result) {
                echo '
                    <script>
                        alert("Evento Eliminado Correctamente");
                        window.location = "../contactA.php";
                    </script>
                ';
            } else {
                echo '
                    <script>
                        alert("Error al Eliminar");
                    </script>
                ';
            }
        } else {
            echo '
                <script>
                    alert("ID del Evento no proporcionado");
                    window.location = "../contactA.php";
                </script>
            ';
        }


    }
    else{
        if (isset($_POST['idE'])) { // Ensure the ID is also provided
            $id = $_POST['idE']; // Get the ID of the event to update
    
            // Fetch current data
            $stmt = $conex->prepare("SELECT * FROM tabevento WHERE id=?");
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $result = $stmt->get_result();
            $currentData = $result->fetch_assoc();
    
            // If new value is empty, use current value
            $name = empty(trim($_POST['tituloE'])) ? $currentData['titulo'] : trim($_POST['tituloE']);
            $link = empty(trim($_POST['linkE'])) ? $currentData['url'] : trim($_POST['linkE']);
            $description = empty(trim($_POST['descripcionE'])) ? $currentData['des'] : trim($_POST['descripcionE']);
    
            // Check if an image file was uploaded
            if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
                // New image uploaded
                $newImage = $_FILES['image']['tmp_name'];
                $newImgContent = file_get_contents($newImage);
            } else {
                // No new image, use current image
                $newImgContent = $currentData['img'];
            }
    
            $fecha = date("d/m/y");
    
            // Update query
            $consulta = "UPDATE tabevento SET titulo=?, fecha=?, des=?, img=?, url=? WHERE id=?";
            $statement = $conex->prepare($consulta);
            $statement->bind_param('sssssi', $name, $fecha, $description, $newImgContent, $link, $id);
            $result = $statement->execute();
    
            if ($result) {
                echo '
                    <script>
                        alert("Evento Actualizado Correctamente");
                        window.location = "../contactA.php";
                    </script>
                ';
            } else {
                echo '
                    <script>
                        alert("Error al Actualizar");
                    </script>
                ';
            }
        } else {
            echo '
                <script>
                    alert("Por Favor LLenar Todos los Campos");
                    window.location = "../contactA.php";
                </script>
            ';
        }
    }

    // Close the database connection
    $conex->close();
?>