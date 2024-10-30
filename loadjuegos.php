<?php
// Conexión a la base de datos
include("conexion.php");
// Consulta SQL para obtener los datos
$sql = "SELECT titulo, precio, des, img, url FROM tabjuegos";
$result = $conex->query($sql);
// Imprimir los datos en forma de HTML
echo '   <div class="about-bg">';
echo '      <div class="container">';
echo '          <div class="row">';
echo '              <div class="col-md-12">';
echo '                  <div class="aboutheading">';
echo '                       <h3>Juegos</h3>';
echo '                  </div>';
echo '              </div>';
echo '          </div>';
echo '      </div>';
echo '  </div>';

echo '<div class="section layout_padding">';
echo '    <div class="container">';
echo '        <div class="row">';
echo '            <div class="col-md-12">';
// Verificar si hay resultados
$count = 0;

// Verificar si hay resultados
if ($result->num_rows > 0) {
    // Iterar sobre cada fila de resultados
    while($row = $result->fetch_assoc()) {
        // Abrir una nueva fila cada 3 entradas
        if ($count % 3 == 0) {
            echo '                <div class="row">';
        }

        // Agregar el contenido de la entrada
        echo '                    <div class="col-md-4">';
        echo '                        <div class="container dk">';
        echo '                           <a href="' . $row["url"] . '">';
        echo '<img src="data:image/png;base64,' . base64_encode($row["img"]) . '" alt="User Profile Image">';
        echo '                           </a>';
        echo '                           <div class="full blog_cont">';
        echo '                               <h4>' . $row["titulo"] . '</h4>';
        echo '                               <h5>' . $row["precio"] . '</h5>';
        echo '                               <p>' . $row["des"] . '</p>';
        echo '                           </div>';
        echo '                        </div>';
        echo '                    </div>';

        // Cerrar la fila cada 3 entradas
        if ($count % 3 == 2) {
            echo '                </div>';
        }

        // Incrementar el contador
        $count++;
    }

    // Cerrar la fila si hay menos de 3 entradas en la última fila
    if ($count % 3 != 0) {
        echo '                </div>';
    }
} else {
    echo "No se encontraron resultados.";
}

$conex->close();
?>
