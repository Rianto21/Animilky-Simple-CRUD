<?php
  session_start();

  unset($_SESSION['logedin']);
  session_destroy();
  header('Location: index.php');
  exit();
?>