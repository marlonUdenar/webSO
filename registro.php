<?php 
    include("conexion.php");
    $mensaje = "ó usa tus redes para registrarte";
    if (isset($_POST['registerF'])){
        if (preg_match('/^.+@.+$/', $_POST['email'])) {
            if(
                strlen($_POST['name']) >= 1 &&
                strlen($_POST['email']) >= 1 &&
                strlen($_POST['password']) >= 1 &&
                preg_match('/.{8,}/', $_POST['password']) && // At least 8 characters
                preg_match('/[^a-zA-Z0-9]/', $_POST['password']) // At least one symbol
                ) {
                    $name = trim($_POST['name']);
                    $email = trim($_POST['email']);
                    $password = trim($_POST['password']);
                    $password = hash('sha512', $password);
                    $fecha = date("d/m/y");

                    $consulta = "INSERT INTO datosusuario(nombre, email, contraseña, fecha)
                        VALUES('$name', '$email', '$password', '$fecha')";

                    //validacion correo repetido
                    $verificar_correo = mysqli_query($conex, "SELECT * FROM datosusuario WHERE email = '$email' ");
                    if (mysqli_num_rows($verificar_correo) > 0) {
                        $mensaje = ("Correo ya Registrado");
                        exit();
                    }

                    $resultado = mysqli_query($conex, $consulta);

                    if ($resultado) {
                        echo '
                        <script>document.addEventListener("DOMContentLoaded", function() {
                            const container = document.getElementById("containerlog");
                            container.classList.add("active");
                        });</script>
                        ';
                        $mensaje = "Correo Registrado Correctamente";
                    } else {
                        echo '
                        <script>document.addEventListener("DOMContentLoaded", function() {
                            const container = document.getElementById("containerlog");
                            container.classList.add("active");
                        });</script>
                        ';
                        $mensaje = "Credenciales Invalidas";
                    }

            }else{
                echo '
                <script>document.addEventListener("DOMContentLoaded", function() {
                    const container = document.getElementById("containerlog");
                    container.classList.add("active");
                });</script>
                ';
                $mensaje = "Credenciales Invalidas";
            }
        } else {
            echo '
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                const container = document.getElementById("containerlog");
                container.classList.add("active");
                });
            </script>
            ';
            $mensaje = "Por favor ingresa un correo electrónico válido";
        } 
    }     
?>