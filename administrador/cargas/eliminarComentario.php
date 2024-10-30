<?php
    include("../../conexion.php");
    if (isset($_POST['deleteB'])){
        if (isset($_POST['idB'])) {
            $idToDelete = $_POST['idB']; // Get the ID of the event to delete
            
            $consultaRes = mysqli_query($conex, "SELECT * FROM respuestas WHERE idc=$idToDelete");
            if($consultaRes->num_rows > 0) {
                $deleteRes = mysqli_query($conex, "DELETE FROM respuestas WHERE idc=$idToDelete");
                $consulta = "DELETE FROM comment WHERE id=?";
                $statement = $conex->prepare($consulta);
                $statement->bind_param('i', $idToDelete);
                $result = $statement->execute();
        
                if ($result) {
                    echo '
                        <script>
                            alert("Comentario Eliminado Correctamente");
                            window.location = "../blogA.php";
                        </script>
                    ';
                } else {
                    echo '
                        <script>
                            alert("Error al Eliminar");
                        </script>
                    ';
                }
            }else {
                $consulta = "DELETE FROM comment WHERE id=?";
                $statement = $conex->prepare($consulta);
                $statement->bind_param('i', $idToDelete);
                $result = $statement->execute();
        
                if ($result) {
                    echo '
                        <script>
                            alert("Comentario Eliminado Correctamente");
                            window.location = "../blogA.php";
                        </script>
                    ';
                } else {
                    echo '
                        <script>
                            alert("Error al Eliminar");
                        </script>
                    ';
                }
            }
        } else {
            echo '
                <script>
                    alert("ID del Comentario no proporcionado");
                    window.location = "../blogA.php";
                </script>
            ';
        }

    }else{
        echo '
            <script>
                alert("Seleccionar un ID");
            </script>
        ';
    }
    
        

    // Close the database connection
    $conex->close();
?>