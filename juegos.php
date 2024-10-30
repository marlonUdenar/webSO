<?php require('./layouts/header.php') ?> 
<script>
const homeLink = document.getElementById("juegos");
homeLink.classList.add("active");
</script>

      <!-- end section -->
<?php require('loadgamesindex.php') ?> 
      <!-- footer -->
<?php require('./layouts/footer.php') ?>
