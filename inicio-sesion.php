<?php
    session_start();
    include("conexion.php");
        $ema = trim($_POST['ema']);
        $pass = trim($_POST['pass']);
        $pass = hash('sha512', $pass);
        
        $result = mysqli_query($conex, "SELECT * FROM datosusuario WHERE email='$ema' AND contraseña='$pass'");
        $resultAdmin = mysqli_query($conex, "SELECT * FROM datosusuario WHERE email='admin@gmail.com' AND contraseña ='$pass'");
        //consulta para buscar el nombre del usuario
        $name = mysqli_query($conex, "SELECT nombre FROM datosusuario WHERE email='$ema' ");
        

        //guardar el nombre del usuario convirtiendo la consulta en un string
        $nameToUse = ''; 
        while($row = mysqli_fetch_assoc($name))
        {
        $nameToUse = $row['nombre'];
        }

        if (mysqli_num_rows($result) > 0) {
            if ($ema=='admin@gmail.com' && (mysqli_num_rows($resultAdmin) > 0)) {
                $_SESSION['usuario'] = $ema;
                $_SESSION['name'] = $nameToUse;
                echo '
                    <script>
                        window.location = "administrador/indexA.php";
                    </script>
                ';
                exit();
            } else {
                $_SESSION['usuario'] = $ema;
                $_SESSION['name'] = $nameToUse;
                echo '
                    <script>    
                        window.location = "usuario/indexU.php";
                    </script>
                ';
                exit();
            }
            
        } else {
            echo '
                <script>
                    alert("Credenciales Incorrectas");
                    window.location = "login-register.php";
                </script>
            ';
            exit();
        }
?>
