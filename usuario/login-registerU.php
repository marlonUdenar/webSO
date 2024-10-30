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
const homeLink = document.getElementById("login-color");
homeLink.classList.add("active");
</script>

<!-- SECTION START -->
<section id="inicio" class="inicio">
        <div class="contenido-banner">
            <div class="contenedor-img">
            <?php
                include("../conexion.php");
                $email = $_SESSION['usuario'];
                $sql = "SELECT image FROM datosusuario WHERE email = ?";
                $statement = $conex->prepare($sql);
                $statement->bind_param('s', $email);
                $statement->execute();
                $statement->bind_result($imgContent);
                $statement->fetch();
                if ($imgContent) {
                    // Display the user's profile image
                    echo '<img src="data:image/png;base64,' . base64_encode($imgContent) . '" alt="User Profile Image">';
                } else {
                    echo 'No image uploaded yet.';
                }
                $conex->close();
            ?>
            </div>
            <a href="" >✎</a>
            <?php echo ' <h1>' . $_SESSION['name'] . '</h1>';?>
            <?php echo ' <h2>Email: ' . $_SESSION['usuario'] . '</h2>';?>
            <h2>Contraseña: ○○○○○○</h2>
            <div class="redes">
                <a href="../cerrar-sesion.php">Cerrar Sesión</a>
            </div>
        </div>

        <!--datos del usuario para modificar-->
        <div class="contenido-banner2">
            <?php echo ' <h1>Datos de ' . $_SESSION['name'] . '</h1>';?>
            <form action="cargas/updateEmail.php" method="POST">
                <p class="inputAcount">
                        <input type="text" name='newemail' placeholder="Correo Electronico">
                        <button type='submit' name='emailChange'>Cambiar Correo</button>
                </p>
            </form>
            <form action="cargas/updateName.php" method="POST">
                <p class="inputAcount">
                        <input type="text" name='newname' placeholder="Nombre">
                        <button type='submit' name='nameChange'>Cambiar Nombre</button>
                </p>
            </form>
            <form action="cargas/updatePass.php" method="POST">
                <p class="inputAcount">
                        <input type="password" name='newpassword' placeholder="Constraseña">
                        <button type='submit' name='passChange'>Cambiar Contraseña</button>
                </p>
            </form>

            <form action="cargas/uploadimage.php" method="POST" enctype="multipart/form-data">
                <p class="inputAcount">
                    <input type="file" name="image" accept="image/*">
                    <button type='submit' name='imgChange'>Cambiar Foto</button>
                </p>
            </form>
            
            <div class="redes2">
            </div>
        </div>
</section>
<!-- SECTION END -->

<?php require('./layouts/footerU.php') ?>
