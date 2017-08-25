<?php
    session_start();
    // clear session variables
    if (isset($_SESSION['email'])) {
      session_destroy();
      //session_unset();
      unset($_SESSION['email']);
      unset($_SESSION['name']);
      header("Location: ../../sign-in.php");
    } else {
      header("Location: ../../index.php");
    }
?>
