
<?php require('./layouts/header.php') ?> 

<script>
const homeLink = document.getElementById("index");
homeLink.classList.add("active");
</script>
      <div class="about-bg">
         <div class="container">
             <div class="row">
                 <div class="col-md-12">
                     <div class="aboutheading">
                         <img src="images/logolong2.png" alt="Logo de E-Sports-Epicenter">
                     </div>
                 </div>
             </div>
         </div>
     </div>
     
      <!--CAROUSEL START-->
      <section class="slider-container">
         <div class="slider-images">
           <div class="slider-img">
             <img src="images/war.png" alt="1" />
             <h1>Pacman</h1>
             <div class="details">
               <h2>Pacman</h2>
               <p>Gestor de paquetes Pacman eficiente</p>
             </div>
           </div>
           <div class="slider-img">
             <img src="images/cs24.png" alt="2" />
             <h1>Personalización</h1>
             <div class="details">
               <h2>Personalización</Strike></h2>
               <p>Altamente personalizable y flexible</p>
             </div>
           </div>
           <div class="slider-img">
             <img src="images/gta5car.png" alt="3" />
             <h1>Actualizaciones</h1>
             <div class="details">
               <h2>Actualizaciones</h2>
               <p>Rolling Release sin actualizaciones mayores</p>
             </div>
           </div>
           <div class="slider-img active">
             <img src="images/arch_Imagen.png" alt="4" />
             <h1>Simplicidad</h1>
             <div class="details">
               <h2>Simplicidad</h2>
               <p>Simplicidad y minimalismo extremo</p>
             </div>
           </div>
           <div class="slider-img">
             <img src="images/fallout.jpg" alt="5" />
             <h1>Comunidad</h1>
             <div class="details">
               <h2>Comunidad</h2>
               <p>Gran comunidad de soporte activo</p>
             </div>
           </div>
           <div class="slider-img">
             <img src="images/tekken.jpg" alt="6" />
             <h1>Documentación</h1>
             <div class="details">
               <h2>Documentación</h2>
               <p>Documentación detallada en Arch Wiki</p>
             </div>
           </div>
           <div class="slider-img">
             <img src="images/fifa.jpg" alt="7" />
             <h1>Conocimiento</h1>
             <div class="details">
               <h2>Conocimiento</h2>
               <p>Requiere conocimientos técnicos avanzados</p>
             </div>
           </div>
         </div>
       </section>
       <script src="js/jQuery.js"></script>
       <script>
         jQuery(document).ready(function ($) {
           $(".slider-img").on("click", function () {
             $(".slider-img").removeClass("active");
             $(this).addClass("active");
           });
         });
       </script>
      <!--CAROUSEL END-->


      <?php require('loadgamesindex.php') ?> 
      <!-- end section -->
      <!-- section --> 
      <?php require('loadnoticiasindex.php') ?> 
      <!-- end section -->
      <?php
      // Incluye tu archivo de conexión a la base de datos
      include("./conexion.php");

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
      <div class="section layout_padding blog_blue_bg purp_silver">
      <div class="container">
         <div class="row">
               <div class="col-md-8 offset-md-2">
                  <div class="full">
                     <div class="big_blog">
                        <?php echo ' <img src="data:image/png;base64,' . base64_encode($img) . '" alt="User Profile Image"> '; ?>
                    </div>
                     </div>
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
      <!-- section -->
      <?php require('loadcommentindx.php') ?> 
      <div class="row margin_top_30">
            <div class="col-md-12 margin_top_30">
                <div class="heading" style="padding-center: 15px;padding-right: 15px;">
                    <h4 class="text-center">Inicia Sesion para Publicar Tu Comentario</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="full comment_form">
                    <form action="usuario/indexU.php">
                        <fieldset>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="row margin_top_30">
                                        <div class="col-md-12">
                                            <div class="center">
                                                <button style="margin-left: 440px;">Iniciar Sesion</button>
                                            </div>
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

<!--footer-->
<?php require('./layouts/footer.php') ?>