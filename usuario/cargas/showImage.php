<?php
  session_start();
  include("../../conexion.php");

  // Get the user's email (you can modify this based on your session handling)
  $email = $_SESSION['usuario'];

  // Query to retrieve the image data based on the email
  $sql = "SELECT image FROM datosusuario WHERE email = ?";
  $statement = $conex->prepare($sql);
  $statement->bind_param('s', $email);
  $statement->execute();
  $statement->bind_result($imgContent);
  $statement->fetch();

  // Set appropriate headers for image display (assuming it's a JPEG image)
  header("Content-type: image/png");
  $image = file_get_contents($imgContent);
  echo $imgContent;

  // Close the database connection
  $conex->close();
?>