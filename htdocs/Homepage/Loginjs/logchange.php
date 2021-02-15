<?php
  session_start();
  $pwtest = $_POST['pwtest'];

  if ($pwtest == true){
    $_SESSION['logged'] = 1;
  } else {
    $_SESSION['logged'] = 0;
  }
?>
