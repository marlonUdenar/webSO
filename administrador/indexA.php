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

<?php require('./layouts/headerA.php') ?>

<script>
const homeLink = document.getElementById("index");
homeLink.classList.add("active");
</script>

      <div class="about-bg">
         <div class="container">
             <div class="row">
                 <div class="col-md-12">
                     <div class="aboutheading">
                         <img src="../images/logolong4.png" alt="Logo de E-Sports-Epicenter">
                     </div>
                 </div>
             </div>
         </div>
     </div>
     
      <!--CAROUSEL START-->
      <section class="slider-container">
         <div class="slider-images">
           <div class="slider-img">
             <img src="../images/war.png" alt="1" />
             <h1>Warzone</h1>
             <div class="details">
               <h2>Warzone</h2>
               <p>Battle Royale Shooter</p>
             </div>
           </div>
           <div class="slider-img">
             <img src="../images/cs24.png" alt="2" />
             <h1>CS2</h1>
             <div class="details">
               <h2>Counter Strike 2</Strike></h2>
               <p>Shooter Tactico</p>
             </div>
           </div>
           <div class="slider-img">
             <img src="../images/gta5car.png" alt="3" />
             <h1>gta vi</h1>
             <div class="details">
               <h2>Grand Theft Auto VI</h2>
               <p>Rpg Mundo Abierto</p>
             </div>
           </div>
           <div class="slider-img active">
             <img src="../images/cyber.jpg" alt="4" />
             <h1>2077</h1>
             <div class="details">
               <h2>CyberPunk 2077</h2>
               <p>Rpg / Juego de Rol</p>
             </div>
           </div>
           <div class="slider-img">
             <img src="../images/fallout.jpeg" alt="5" />
             <h1>Fallout</h1>
             <div class="details">
               <h2>Nueva Serie de Fallout</h2>
               <p>Una serie de amazon prime del popular juego de rol</p>
             </div>
           </div>
           <div class="slider-img">
             <img src="../images/tekken.jpg" alt="6" />
             <h1>Tekken</h1>
             <div class="details">
               <h2>Tekken 8</h2>
               <p>Buenas Criticas de la Nueva entrega</p>
             </div>
           </div>
           <div class="slider-img">
             <img src="../images/fifa.jpg" alt="7" />
             <h1>FC24</h1>
             <div class="details">
               <h2>EA FC24</h2>
               <p>La Ultima Entrega del popular juego esta en descuento</p>
             </div>
           </div>
         </div>
       </section>
       <script src="../js/jQuery.js"></script>
       <script>
         jQuery(document).ready(function ($) {
           $(".slider-img").on("click", function () {
             $(".slider-img").removeClass("active");
             $(this).addClass("active");
           });
         });
       </script>
      <!--CAROUSEL END-->

      <!-- section --> 
      <?php require('loadgamesindexA.php') ?> 
      <!-- end section -->
      <!-- section --> 
      <?php require('../loadnoticiasindex.php')?>
      <!-- end section -->
      
      <!-- section --> 
      <div class="section layout_padding blog_blue_bg purp_silver">
         <div class="container">
            <div class="row">
               <div class="col-md-8 offset-md-2">
                  <div class="heading">
                     <h3>Blog</h3>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-8 offset-md-2">
                  <div class="full">
                     <div class="big_blog">
                        <img class="img-responsive" src="../images/blog_1.png" alt="#" />
                     </div>
                     <div class="blog_cont_2">
                        <h3>Comienza la Nueva Temporada de League Of Legends</h3>
                        <p class="sublittle">Marzo 19 2023  5 Leidos</p>
                        <p>¡Empezamos este año con todo trayéndoles una gran actualización de jugabilidad! ¡Tenemos Vacuolarvas, Vacuomitas, Monstruos Vacuonatos, tres formas distintas del Barón Nashor con fosas personalizadas, cambios al mapa en la jungla y los carriles, más de 100 cambios a objetos (incluidos objetos nuevos), una mejora a Hwei, música dinámica, nuevas misiones dentro del juego, CHOQUES DE PUÑOS y mucho más!
                        </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end section -->
      <!-- section -->
      <section class="layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="heading" style="padding-left: 15px;padding-right: 15px;">
                     <h4 style="border-bottom: solid #333 1px;">Comentarios / 2</h4>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="full comment_blog_line">
                     <div class="row">
                        <div class="col-md-1">
                           <img src="../images/c_1.png" alt="#" />
                        </div>
                        <div class="col-md-9">
                           <div class="full contact_text">
                              <h3>Juan</h3>
                              <h4>Publicado en Junio 15 / 2023 a las 08:15 pm</h4>
                              <p>He estado usando este sitio web de noticias de juegos durante un tiempo y me ha encantado. Siempre está actualizado con las últimas noticias, anuncios y rumores de la industria. El equipo editorial hace un gran trabajo al seleccionar contenido de alta calidad y atractivo.
                              </p>
                           </div>
                        </div>
                        <div class="col-md-2">
                           <a class="reply_bt" href="#">Responder</a>
                        </div>
                     </div>
                  </div>
                  <div class="full comment_blog_line">
                     <div class="row">
                        <div class="col-md-1">
                           <img src="../images/c_2.png" alt="#" />
                        </div>
                        <div class="col-md-9">
                           <div class="full contact_text">
                              <h3>Paula</h3>
                              <h4>Publicado en enero 10 / 2023 a las 06:53 am</h4>
                              <p>Soy una gran aficionada a los videojuegos y siempre estoy buscando información sobre nuevos lanzamientos, próximos eventos y noticias de la industria en general. He probado muchos sitios web de noticias de juegos, pero este es sin duda mi favorito.
                              </p>
                           </div>
                        </div>
                        <div class="col-md-2">
                           <a class="reply_bt" href="#">Responder</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
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
                     <form action="index.php">
                        <fieldset>
                           <div class="col-md-12">
                              <div class="row">
                                 <div class="col-md-6">
                                    <input type="text" name="name" placeholder="Nombre" required="#" />
                                    <input type="email" name="email" placeholder="Email" required="#" />
                                 </div>
                                 <div class="col-md-6">
                                    <textarea placeholder="Comentario"></textarea>
                                 </div>
                              </div>
                              <div class="row margin_top_30">
                                 <div class="col-md-12">
                                    <div class="center">
                                       <button>Enviar</button>
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

<?php require('./layouts/footerA.php') ?>