<?php require('./layouts/headerA.php') ?> 

<script>
const homeLink = document.getElementById("juegos");
homeLink.classList.add("active");
</script>

<section>
    <div class="sectionJA">
        <h1>Publicar Juego</h2>
        <form action="cargas/cargarJuego.php" method="POST" enctype="multipart/form-data">
            <div class="dark_bg2">
                <div class="panel1">
                    <input type="text" name="nombreJ" placeholder="titulo">
                    <input type="text" name="precioJ" placeholder="precio">
                    <input type="text" name="linkJ" placeholder="sitio oficial">
                    <input type="file" name="image" accept="image/*">
                </div>

                <div class="panel2">
                    <textarea type="text" name="descripcionJ" rows="10" cols="40" placeholder="descripción"></textarea>
                </div>
            </div>   
            <div class="dark_bg2">
                <button type='submit' name='registerJ' >Publicar</button>
            </div>
        </form>
    </div>

</section>

<?php require('../usuario/loadjuegos.php') ?> 

<?php require('layouts/footerA.php') ?>