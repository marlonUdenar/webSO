<?php require('./layouts/headerA.php') ?> 

<script>
const homeLink = document.getElementById("noticias");
homeLink.classList.add("active");
</script>
      <!-- end header -->

<section>
    <div class="sectionJA">
        <h1>Publicar Noticia</h2>
        <form action="cargas/cargarNoticia.php" method="POST" enctype="multipart/form-data">
            <div class="dark_bg2">
                <div class="panel1">
                    <input type="text" name="tituloN" placeholder="titulo">
                    <input type="text" name="linkN" placeholder="sitio">
                    <input type="file" name="image" accept="image/*">
                </div>
                <div class="panel2N">
                    <textarea type="text" name="descripcionN" rows="10" cols="40" placeholder="descripción"></textarea>
                </div>
            </div>   
            <div class="dark_bg2">
                <button type='submit' name='registerJ' >Publicar</button>
            </div>
        </form>
    </div>

</section>

<?php require('../usuario/loadnoticiasU.php')?> 
      <!-- section --> 
      
      <!-- end section -->
      
<?php require('./layouts/footerA.php') ?>
