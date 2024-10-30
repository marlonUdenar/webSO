<?php require('./layouts/headerA.php') ?> 

<script>
const homeLink = document.getElementById("contact");
homeLink.classList.add("active");
</script>

<section>
   <div class="main_event_edit">
      <div class="sectionEA">
         <h1>Publicar Evento</h2>
         <form action="cargas/cargarEvento.php" method="POST" enctype="multipart/form-data">
               <div class="dark_bg2E">
                  <div class="panel1E">
                     <input type="text" name="tituloE" placeholder="titulo">
                     <input type="text" name="linkE" placeholder="sitio">
                     <input type="file" name="image" accept="image/*">
                  </div>
                  <div class="panel2NE">
                     <textarea type="text" name="descripcionE" rows="10" cols="40" placeholder="descripción"></textarea>
                  </div>
               </div>   
               <div class="dark_bg2E">
                  <button type='submit' name='registerJ' >Publicar</button>
               </div>
         </form>
      </div>

      <div class="sectionEA">
         <h1>Modificar/Eliminar Evento</h2>
         <form action="cargas/modificarEvento.php" method="POST" enctype="multipart/form-data">
               <div class="dark_bg2E">
                  <div class="panel1E">
                     <div class="sellContainer" >
                        <select class="sell" name="idE" required>  
                           <?php //script para obtener el id de todos los juegos
                              include("../conexion.php");
                              $sql = "SELECT id FROM tabevento";
                              $result = $conex->query($sql);
                              $count = 0;
                              if ($result->num_rows > 0) {
                                 while($row = $result->fetch_assoc()) {
                                    echo ' <option value="'.$row["id"].'">'.$row["id"].'</option> ';
                                    $count++;
                                 }
                              }
                              $conex->close();
                           ?>
                        </select>
                        <button name="deleteE">Eliminar</button>
                       
                     </div>
                     <input type="text" name="tituloE" placeholder="titulo">
                     <input type="text" name="linkE" placeholder="sitio">
                     <input type="file" name="image" accept="image/*">
                  </div>
                  <div class="panel2NE">
                     <textarea type="text" name="descripcionE" rows="10" cols="40" placeholder="descripción"></textarea>
                  </div>
               </div>   
               <div class="dark_bg2E">
                  <button type='submit' name='modifyE' >Modificar</button>
               </div>
         </form>
      </div>
    </div>
</section>


      <!-- end header -->
      <div class="contact-bg">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="contactheading">
                     <h3>Eventos</h3>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!-- section -->
      <html>

	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="../css/main.css" />
		<noscript><link rel="stylesheet" href="../css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">



		<!-- Wrapper -->
      <?php require('loadeventA.php') ?> 

		<!-- Scripts -->
			<script src="../js/jqueryE.min.js"></script>
			<script src="../js/jqueryE.poptrox.min.js"></script>
			<script src="../js/browser.min.js"></script>
			<script src="../js/breakpoints.min.js"></script>
			<script src="../js/util.js"></script>
			<script src="../js/main.js"></script>

         </body>
</html>
      <!-- end section -->
      
      <!--footer-->
<?php require('./layouts/footerA.php') ?>
