<?php require('./layouts/header.php') ?> 
<script>
const homeLink = document.getElementById("noticias");
homeLink.classList.add("active");
</script>
<?php require('loadnoticias2.php') ?> 
      <!-- end section -->
      
<?php require('./layouts/footer.php') ?>