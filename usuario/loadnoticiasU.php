<?php
// Conexión a la base de datos
include("../conexion.php");
// Consulta SQL para obtener los datos
$sql = "SELECT titulo, fecha, des, img FROM tabnoticias";
$result = $conex->query($sql);
// Imprimir los datos en forma de HTML
echo '   <div class="about-bg">';
echo '      <div class="container">';
echo '          <div class="row">';
echo '              <div class="col-md-12">';
echo '                  <div class="aboutheading">';
echo '                       <h3>Instalacion</h3>';
echo '                  </div>';
echo '              </div>';
echo '          </div>';
echo '      </div>';
echo '  </div>';

// Verificar si hay resultados
$count = 0;

// Verificar si hay resultados
if ($result->num_rows > 0) {
    // Iterar sobre cada fila de resultados
    while($row = $result->fetch_assoc()) {
        // Abrir una nueva fila cada 3 entradas
        if ($count % 2 == 0) {
            echo '<div class="section layout_padding dark_bg">
                <div class="container">
                    <div class="row cc">
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
                    <div class="row cc">
                    <div class="col-md-6">
                        <div class="full blog_cont_5">
                            <h3>' . $row["titulo"] . '</h3>
                            <h5>' . $row["fecha"] . '</h5>
                            <p class="black_font">' . $row["des"] . '</p>
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


} else {
    echo "No se encontraron resultados.";
}

// Cerrar la sección layout_padding
$conex->close();
?>
