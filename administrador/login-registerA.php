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
const homeLink = document.getElementById("login-color");
homeLink.classList.add("active");
</script>
    
<!-- SECCION INICIO -->
<section id="inicio" class="inicio">
        <div class="contenido-banner">
            <div class="contenedor-img">
                <img src="../images/3.png" alt="">
            </div>
            <?php echo ' <h1>' . $_SESSION['name'] . '</h1> '?>
            <?php echo ' <h2>Email: ' . $_SESSION['usuario'] . '</h2> '?>
            <h2>Contraseña: ○○○○○○</h2>
            <div class="redes">
                <a href="../cerrar-sesion.php">Cerrar Sesión</a>
            </div>
        </div>
</section>

    
        
<?php require('./layouts/footerA.php') ?>
