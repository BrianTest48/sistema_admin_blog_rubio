<?php 
  session_start();
  if(!isset($_SESSION["nombre"])) {
     header("location: ../../index.php");
  }
  $nombre = $_SESSION["nombre"];
  $id = $_SESSION["id"];
?>