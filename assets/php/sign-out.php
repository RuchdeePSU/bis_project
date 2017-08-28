<?php
    session_start();
    // clear session variables
    if (isset($_SESSION['student_email'])) {
      session_destroy();
      //session_unset();
      unset($_SESSION['student_id']);
      unset($_SESSION['student_email']);
      unset($_SESSION['student_fullname']);
      header("Location: ../../index.php");
    } else {
      header("Location: ../../index.php");
    }
?>
