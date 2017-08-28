<?php
    session_start();

    include_once 'dbconnect.php';
    include_once 'project_student.php';
    include_once 'project_setting.php';
    //include_once 'users.php';

    // get connection
    $database = new Database();
    $db = $database->getConnection();

    // pass connection to project_student table
    $project_student = new Project_Student($db);
    $project_setting = new Project_Setting($db);

    $_SESSION['project_year'] = $project_setting->readproject_year();

    if (isset($_POST['email']) && isset($_POST['password'])) {
        $project_student->student_email = $_POST['email'];
        //$passwd = $_POST['password'];

        $project_student->project_year = $_SESSION['project_year'];

        $result = $project_student->readone();

        if ($row = mysqli_fetch_array($result)) {
            $_SESSION['student_id'] = $row['student_id'];
            $_SESSION['student_fullname'] = $row['student_fullname'];
            $_SESSION['student_email'] = $row['student_email'];
            $_SESSION['topic_id'] = $row['topic_id'];
            header("Location: ../../main.php");
        } else {
            header("Location: ../../index.php?result=fail");
        }
    }
?>
