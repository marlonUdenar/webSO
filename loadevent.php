<?php
// Conexión a la base de datos
include("conexion.php");

// Consulta SQL para obtener los datos
$sql = "SELECT titulo, fecha, des, img, url FROM tabevento";
$result = $conex->query($sql);

// Imprimir los datos en forma de HTML
echo '<div id="wrapper">';
echo '  <div id="main">';

// Verificar si hay resultados
if ($result->num_rows > 0) {
    // Iterar sobre cada fila de resultados
    while($row = $result->fetch_assoc()) {
        echo '  <article class="thumb">';
        echo '      <a href="' . $row["url"] . '" class="image">';
        echo '          <img src="data:image/png;base64,' . base64_encode($row["img"]) . '" alt="" />';
        echo '      </a>';
        echo '      <a href="' . $row["url"] . '" class="content-link">';
        echo '          <h2>' . $row["titulo"] . '</h2>';
        echo '          <p>' . $row["des"] . '</p>';
        echo '      </a>';
        echo '  </article>';
    }
    echo '  </div>';
    echo '</div>';
} else {
    echo "No se encontraron resultados.";
}

$conex->close();
?>
