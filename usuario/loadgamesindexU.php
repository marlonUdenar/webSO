<?php
// Conexión a la base de datos
include("../conexion.php");

// Consulta SQL para obtener los datos
$sql = "SELECT titulo, precio, des, img, url FROM tabjuegos";
$result = $conex->query($sql);

// Imprimir los datos en forma de HTML
echo '<div class="about-bg">';
echo '    <div class="container">';
echo '        <div class="row">';
echo '            <div class="col-md-12">';
echo '                <div class="aboutheading">';
echo '                    <h3>Juegos</h3>';
echo '                </div>';
echo '            </div>';
echo '        </div>';
echo '    </div>';
echo '</div>';

echo '<div class="section layout_padding">';
echo '    <div class="container">';
echo '        <div class="row">';
$count = 0;

// Verificar si hay resultados
if ($result->num_rows > 0) {
    // Iterar sobre cada fila de resultados
    while($row = $result->fetch_assoc()) {
        // Verificar si es la primera entrada en la fila
        if ($count != 3) {
            echo '                <div class="col-md-4">';
            echo '                    <div class="container dk">';
            echo '                        <a href="' . $row["url"] . '">';
            echo '<img src="data:image/png;base64,' . base64_encode($row["img"]) . '" alt="User Profile Image">';
            echo '                        </a>';
            echo '                        <div class="full blog_cont">';
            echo '                            <h4>' . $row["titulo"] . '</h4>';
            echo '                            <h5>' . $row["precio"] . '</h5>';
            echo '                            <p>' . $row["des"] . '</p>';
            echo '                       </div>';
            echo '                   </div>';
            $count++;
        }
        // Agregar el contenido de la entrada
        echo '            </div>';
    }
} else {
    echo "No se encontraron resultados.";
}
// Cerrar la sección layout_padding
echo '        </div>';
echo '        <div class="row margin_top_30">';
echo '            <div class="col-md-12">';
echo '                <div class="button_section full center margin_top_30">';
echo '                    <a style="margin:0;margin-bottom:101px;" href="juegosU.php">Leer Mas</a>';
echo '                </div>';
echo '            </div>';
echo '        </div>';
echo '    </div>';
echo '</div>';
echo '</div>';

$conex->close();
?>
