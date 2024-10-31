<?php 
    $conex = mysqli_connect("auth-db1389.hstgr.io", "u284478885_admin", "Solutiong3", "u284478885_main");
    
    if ($conex -> connect_error) {
        die("pta m".$conex -> connect_error);
    }
    echo '<script>alert("nice")'

?>

