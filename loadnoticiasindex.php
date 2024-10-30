<?php
// Conexión a la base de datos
include("conexion.php");

// Consulta SQL para obtener los datos
$sql = "SELECT titulo, fecha, des, img FROM tabnoticias";
$result = $conex->query($sql);

// Imprimir los datos en forma de HTML
echo '<div class="about-bg">';
echo '    <div class="container">';
echo '        <div class="row">';
echo '            <div class="col-md-12">';
echo '                <div class="aboutheading">';
echo '                    <h3>Noticias</h3>';
echo '                </div>';
echo '            </div>';
echo '        </div>';
echo '    </div>';
echo '</div>';

$count = 0;

// Verificar si hay resultados
if ($result->num_rows > 0) {
    // Iterar sobre cada fila de resultados
    while($row = $result->fetch_assoc()) {
        // Verificar si es la primera entrada en la fila
        if ($count != 1) {
            if ($count % 2 == 0) {
                echo '<div class="section layout_padding dark_bg">
                    <div class="container">
                        <div class="row">
                        <div class="col-md-6">
                            <img src="data:image/png;base64,' . base64_encode($row["img"]) . '" alt="User Profile Image">
                        </div>
                        <div class="col-md-6">
                            <div class="full blog_cont">
                                <h3 class="white_font">' . $row["titulo"] . '</h3>
                                <h5 class="grey_font">' . $row["fecha"] . '</h5>
                                <p class="white_font">' . $row["des"] . '</p>
                            </div>
                        </div>
                        </div>
                        
                        </div>
                    </div>
                </div>';
                $count++;
            }else{
                echo '<div class="section layout_padding">
                    <div class="container">
                        <div class="row">
                        <div class="col-md-6">
                            <div class="full blog_cont">
                                <h3>' . $row["titulo"] . '</h3>
                                <h5>' . $row["fecha"] . '</h5>
                                <p class="white_font">' . $row["des"] . '</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <img src="data:image/png;base64,' . base64_encode($row["img"]) . '" alt="User Profile Image">
                        </div>
                        
                        </div>
                    </div>
                </div>';
                $count++;
            }
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
echo '                    <a style="margin:0;margin-bottom:101px;" href="noticias.php">Leer Mas</a>';
echo '                </div>';
echo '            </div>';
echo '        </div>';
echo '    </div>';
echo '</div>';

$conex->close();
?>
