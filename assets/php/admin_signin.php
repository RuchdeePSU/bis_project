<?php
    session_start();

    include_once 'dbconnect.php';
    include_once 'project_setting.php';
    //include_once 'users.php';

    // get connection
    $database = new Database();
    $db = $database->getConnection();

    // pass connection to project_student table
    $project_setting = new Project_Setting($db);

    if (isset($_POST['email']) && isset($_POST['password'])) {
        $project_setting->admin_email = $_POST['email'];
        $project_setting->admin_passwd = $_POST['password'];

        $test = md5($_POST['password']);

        $result = $project_setting->chk_admin_signin();

        if ($row = mysqli_fetch_array($result)) {
            $_SESSION['project_year'] = $row['project_year'];
            $_SESSION['admin_email'] = $row['admin_email'];
            header("Location: ../../main_admin.php");
        } else {
            header("Location: ../../login_admin.php?result=fail&passwd=" . $test);
        }
    }
?>
