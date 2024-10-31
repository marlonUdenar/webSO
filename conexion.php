<?php 
    $conex = mysqli_connect("mysql.hostinger.com", "u284478885_admin", "Solutiong3", "u284478885_main");
    
    if ($conex -> connect_error) {
        die("pta m".$conex -> connect_error);
    }
    echo '<script>alert("nice")'

?>

