<?php
  session_start();

  //Supression des variables de session
  session_destroy();
  //Redirection sur index
  header('Location: http://localhost:8888/index.php');
?>
