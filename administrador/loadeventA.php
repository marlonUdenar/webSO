<?php
// Conexión a la base de datos
include("../conexion.php");
// Consulta SQL para obtener los datos
$sql = "SELECT id, titulo, fecha, des, img, url FROM tabevento";
$result = $conex->query($sql);
// Imprimir los datos en forma de HTML
echo '  <div id="wrapper">';
echo '      <div id="main">';
// Verificar si hay resultados
$count = 0;

// Verificar si hay resultados
if ($result->num_rows > 0) {
    // Iterar sobre cada fila de resultados
    while($row = $result->fetch_assoc()) {
        // Abrir una nueva fila cada 3 entradas

        // Agregar el contenido de la entrada
        echo '          <article class="thumb">';
        echo '              <a href="data:image/png;base64,' . base64_encode($row["img"]) . '" class="image"><img src="data:image/png;base64,' . base64_encode($row["img"]) . '" alt="" /></a>';
        echo '                  <h2>'.$row["titulo"].'<br>ID del Juego: '.$row["id"].'</h2>';
        echo '              <a href="'.$row["url"].'">';
        echo '                  <p>'.$row["des"].'</p>';
        echo '              </a>';
        echo '          </article>';


        // Incrementar el contador
        $count++;
    }
    echo '      </div>';
    echo '  </div>';

} else {
    echo "No se encontraron resultados.";
}

$conex->close();
?>
