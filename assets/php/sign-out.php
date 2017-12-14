<?php
    session_start();
    // clear student's session variables
    if (isset($_SESSION['student_email'])) {
        session_destroy();
        //session_unset();
        unset($_SESSION['student_id']);
        unset($_SESSION['student_email']);
        unset($_SESSION['student_fullname']);
        unset($_SESSION['topic_id']);
        unset($_SESSION['project_year']);
        header("Location: ../../index.php");
    }
    // clear admin's session
    if (isset($_SESSION['admin_email'])) {
        session_destroy();
        unset($_SESSION['admin_email']);
        unset($_SESSION['project_year']);
        header("Location: ../../index.php");
    } else {
        header("Location: ../../index.php");
    }

?>
