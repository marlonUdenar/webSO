<?php 
include("../conexion.php");

if (isset($_POST['respuesta'])) {
    echo "<script>console.log('pass');</script>";
    // Obtén la respuesta del usuario y realiza cualquier validación necesaria
    $des = $_POST['respuesta'];
    $usr = $_POST['usuario'];
    $fecha = date("Y-m-d");
    $id = $_POST['id'];


    $consulta = "INSERT INTO respuestas (idc, fecha, des, correo)
                 VALUES ('$id', '$fecha', '$des', '$usr')";

    // Ejecutar la consulta
    if (mysqli_query($conex, $consulta)) {
        // Imprimir mensaje en la consola del navegador
        echo "<script>console.log('Comentario insertado correctamente');</script>";
    } else {
        // Imprimir mensaje de error en la consola del navegador
        echo "<script>console.error('Error al insertar el comentario: " . mysqli_error($conex) . "');</script>";
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

