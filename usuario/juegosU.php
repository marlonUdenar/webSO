<?php require('./layouts/headerU.php') ?> 

<script>
const homeLink = document.getElementById("juegos");
homeLink.classList.add("active");
</script>

<?php require('loadjuegos.php') ?> 

     
<?php require('./layouts/footerU.php') ?>
