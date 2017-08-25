<?php
    session_start();

    include_once 'dbconnect.php';
    include_once 'admin.php';
    //include_once 'users.php';

    // get connection
    $database = new Database();
    $db = $database->getConnection();

    // pass connection to tbl_admin table
    $admin = new Admin($db);

    if (isset($_POST['email']) && isset($_POST['password'])) {
        $admin->email = $_POST['email'];
        $admin->passwd = $_POST['password'];

        $result = $admin->readone();

        if ($row = mysqli_fetch_array($result)) {
            $_SESSION['email'] = $row['email'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['user_type'] = "admin";
            header("Location: ../../profile.php");
        } else {
            header("Location: ../../sign-in.php?result=fail");
        }
    }
?>
