<?php 
   session_start();
   if(!isset($_SESSION['usuario'])) {
      echo '
      <script>
         alert("Por Favor Inicia Sesion");
         window.location = "../login-register.php";
      </script>
      ';
      session_destroy();
      die();
   }
?>

<?php require('./layouts/headerU.php') ?> 

<script>
const homeLink = document.getElementById("blog");
homeLink.classList.add("active");

document.addEventListener('DOMContentLoaded', (event) => {
    let commentId;  // Variable para guardar el commentId

    // Selecciona todos los botones de responder
    let replyButtons = document.querySelectorAll('.reply_bt');
    replyButtons.forEach((button) => {
        button.addEventListener('click', (event) => {
            event.preventDefault();
            commentId = event.target.getAttribute('data-id');
            let modal = new bootstrap.Modal(document.getElementById('commentModal'));
            modal.show();
        });
    });

    // Selecciona el botón de enviar
    let sendButton = document.getElementById('btnEnviar');
    sendButton.addEventListener('click', (event) => {
        event.preventDefault();
        enviarRespuesta(commentId);  // Llama a enviarRespuesta con commentId
    });
});



// JavaScript para enviar la respuesta
function enviarRespuesta(id) {
    var respuesta = document.getElementById("replyTextarea").value;
    var usuario = $("input[name='usuario']").val(); // Obtener el valor del campo oculto "usuario"
// Obtener el valor del campo oculto "id"
    console.log("begin.");
    console.log("Valor de id:", id);
    $.ajax({
    type: "POST", // Método de solicitud
    url: "12.php", // URL del archivo PHP que procesará los datos
    data: {
        respuesta: respuesta,
        usuario: usuario,
        id: id // Agregar los valores de los campos ocultos
    },
    success: function(response) {
        // La solicitud fue exitosa
        console.log("Respuesta del servidor:", response); // Log de la respuesta del servidor
        console.log("Respuesta enviada correctamente.");
        // Aquí puedes hacer cualquier otra cosa que necesites, como mostrar un mensaje al usuario o redirigirlo a otra página.
    },
    error: function(xhr, status, error) {
        // Ocurrió un error durante la solicitud AJAX
        console.error("Error al enviar la respuesta:", error);
        // Aquí puedes manejar el error de alguna manera, como mostrar un mensaje de error al usuario.
    }
});
    document.getElementById("replyTextarea").value = "";
    // Cierra el modal
    $('#commentModal').modal('hide');
    location.reload();
}



</script>
      <!-- revolution slider -->
<div class="Blog-bg">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="Blogheading">
               <h3>Blog </h3>
            </div>
         </div>
      </div>
   </div>
</div>

<?php
// Incluye tu archivo de conexión a la base de datos
include("../conexion.php");

// Establece el número de resultados por página
$resultados_por_pagina = 1;

$sql_total_filas = "SELECT COUNT(*) AS total_filas FROM tablog";
$result_total_filas = $conex->query($sql_total_filas);
$total_filas = $result_total_filas->fetch_assoc()['total_filas'];

// Obtiene la página actual, si no se establece, es la página 1
$pagina_actual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

if ($pagina_actual <= 0){
   $pagina_actual = 1;
} 

if ($pagina_actual > $total_filas){
   $pagina_actual = $total_filas;
}

// Calcula el offset para la consulta SQL
$offset = ($pagina_actual - 1);

// Consulta SQL para obtener los datos
$sql = "SELECT id,titulo, fecha, des,img FROM tablog LIMIT $resultados_por_pagina OFFSET $offset";
$result = $conex->query($sql);

// Verifica si hay resultados
if ($result->num_rows > 0) {
    // Obtiene la fila actual
    $row = $result->fetch_assoc();
    $titulo = $row['titulo'];
    $fecha = $row['fecha'];
    $descripcion = $row['des'];
    $img = $row["img"];
    $id = $row["id"];
}

// Cierra la conexión a la base de datos
$conex->close();
?>


      <!-- section --> 
   <div class="section layout_padding blog_blue_bg light_silver">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="full">
                    <div class="big_blog">
                        <?php echo ' <img src="data:image/png;base64,' . base64_encode($img) . '" alt="User Profile Image"> '; ?>
                    </div>
                    <div class="blog_cont_2">
                        <h3 class="black_font"><?php echo $titulo; ?></h3>
                        <h5 class="grey_font"><?php echo $fecha; ?></h5>
                        <p class="black_font"><?php echo $descripcion; ?></p>
                        <div class="navigation_buttons">
                            <a id="boton_anterior" href="?pagina=<?php echo ($pagina_actual - 1); ?>" class="btn btn-outline-primary mr-2"><i class="fas fa-chevron-left"></i></a>
                            <a id="boton_siguiente" href="?pagina=<?php echo ($pagina_actual + 1); ?>" class="btn btn-outline-primary"><i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

      <!-- end section -->
   
      <!-- end section -->
      <!-- HTML para el modal -->
<div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #07070A;">
                <h5 class="modal-title" id="exampleModalLabel">Responder al Comentario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" style="background-color: #07070A;">
                <textarea id="replyTextarea" class="form-control" rows="4"></textarea>
            </div>
            <div class="modal-footer" style="background-color: #07070A;">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" id="btnEnviar" class="btn btn-primary"  style="background-color: #FB8B24">Enviar</button>
            </div>
        </div>
    </div>
</div>
<!-- section -->
<?php require('../loadcomments.php') ?> 
<!-- section -->

        <div class="row margin_top_30">
               <div class="col-md-12 margin_top_30">
                  <div class="heading" style="padding-left: 15px;padding-right: 15px;">
                     <h4>Publica Tu Comentario</h4>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="full comment_form">
                     <form action="cargarcomments.php" method="POST">
                        <fieldset>
                           <div class="col-md-12">
                              <div class="row">
                                 <div class="col-md-6as">
                                    <input type="text" name="coment" placeholder="Comentario" style=" height: 150px;">
                                    <input type="hidden" name="usuario" value="<?php echo $_SESSION['usuario']; ?>">
                                    <!-- Campo oculto para enviar $id -->
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                 </div>
                              </div>
                              <div class="row margin_top_30">
                                 <div class="col-md-12">
                                    <div class="center">
                                       <button type="submit" name="ecoment">Enviar</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </fieldset>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end section -->

      
   
      
<?php require('./layouts/footerU.php') ?>
