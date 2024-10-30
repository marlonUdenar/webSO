<?php require('./layouts/header.php') ?> 

<script>
const homeLink = document.getElementById("login-color");
homeLink.classList.add("active");
</script>
        <!-- section LOGIN-->
        <div class="section layout_padding dark_bg">
            <div class="container">
                <div class="containerlog" id="containerlog">
                    <div class="form-containerlog sign-up">
                        <form method="POST">
 
                        <?php
                            include("registro.php")
                        ?>

                            <h1>Crear Cuenta</h1>
                            <div class="social-icons">
                                <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                                <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                                <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                                <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                            </div>
                            <span><?php echo $mensaje; ?></span>
                            <input type="text" name='name' placeholder="Nombre">
                            <input type="text" name='email' placeholder="Correo Electronico">
                            <input type="password" name='password' placeholder="Constraseña">
                            <button type='submit' name='registerF'>Registrarce</button>
                            <!--<input class='btn' type="submit" name="registerF" value='Registrarce'>-->
                        </form>

                     
                        
                    </div>
                    <div class="form-containerlog sign-in">
                        <form action="inicio-sesion.php" method="POST">
                            <h1>Iniciar Sesión</h1>
                            <div class="social-icons">
                                <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                                <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                                <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                                <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
                            </div>
                            
                            <input type="text" name='ema' placeholder="Correo Electronico">
                            <input type="password" name='pass' placeholder="Constraseña">
                            <a href="#">olvidaste tu contraseña?</a>
                            <button type='submit' name='loginBut'>Iniciar Sesión</button>
                        </form>
                    </div>
                    <div class="toggle-containerlog">
                        <div class="toggle">
                            <div class="toggle-panel toggle-left">
                                <h1>Bienvenido</h1>
                                <p>Si ya tienes una cuenta inicia sesión para poder disfrutar de todo nuestro contenido</p>
                                <button class="hidden" id="login">Iniciar Sesión</button>
                            </div>
                            <div class="toggle-panel toggle-right">
                                <h1>Hola, Gamer</h1>
                                <p>Registrate con nostros y mantente actualizado de todo sobre tus video juegos favoritos</p>
                                <button class="hidden" id="register">Registrarse</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end section LOGIN-->
        


<?php require('./layouts/footer.php') ?>
