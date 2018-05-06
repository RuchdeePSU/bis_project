<?php
    session_start();

    // if (isset($_SESSION['email'])) {
    //     header("Location: index.php");
    // }
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="ThemeStarz">

    <link href='http://fonts.googleapis.com/css?family=Roboto:300,400,700' rel='stylesheet' type='text/css'>
    <link href="assets/fonts/font-awesome.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="assets/css/bootstrap-select.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="assets/css/jquery.slider.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Pridi:300,400">
    <style>
        h1, h2, h3, h4, h5, h6, legend, a, li, .alert, input, .btn, label, span { font-family: 'Pridi', serif; }
    </style>

    <title>BIS Student Project Management System | ลงชื่อเข้าใช้</title>

</head>

<body class="page-sub-page page-sign-in page-account" id="page-top">
<!-- Wrapper -->
<div class="wrapper">
    <!-- Navigation -->
    <div class="navigation">
        <div class="container">
            <header class="navbar" id="top" role="banner">
                <div class="navbar-header">
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="navbar-brand nav" id="brand">
                        <!--
                        <a href="index-google-map-fullscreen.html"><img src="assets/img/logo.png" alt="brand"></a>
                      -->
                        <legend>
                          BIS Student Project Management System
                        </legend>
                    </div>
                </div>
                <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">นักศึกษา</a></li>
                        <li class="active"><a href="login_advisor.php">อาจารย์ที่ปรึกษา</a></li>
                        <li><a href="login_admin.php">ผู้ดูแลระบบ</a></li>
                    </ul>
                </nav><!-- /.navbar collapse-->
                <!-- <div class="add-your-property">
                    <a href="submit.html" class="btn btn-default"><i class="fa fa-plus"></i><span class="text">เพิ่มโครงการ</span></a>
                </div> -->
            </header><!-- /.navbar -->
        </div><!-- /.container -->
    </div><!-- /.navigation -->
    <!-- end Navigation -->
    <!-- Page Content -->
    <div id="page-content">
        <!-- Breadcrumb -->
        <div class="container">
            <ol class="breadcrumb">
                <li>หน้าแรก</li>
                <li class="active">ลงชื่อเข้าใช้สำหรับอาจารย์ที่ปรึกษา (Sign In)</li>
            </ol>
        </div>
        <!-- end Breadcrumb -->

        <div class="container">
            <header><h1>ลงชื่อเข้าใช้สำหรับอาจารย์ที่ปรึกษา (Sign In)</h1></header>
            <div class="row">
                <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                    <form role="form" id="form-create-account" method="post" action="assets/php/advisor_signin.php">
                        <div class="form-group">
                            <label for="form-create-account-email">Email:</label>
                            <input type="email" class="form-control" id="form-create-account-email" name="email" required>
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            <label for="form-create-account-password">Password:</label>
                            <input type="password" class="form-control" id="form-create-account-password" name="password" required>
                        </div><!-- /.form-group -->
                        <div class="form-group clearfix">
                            <span class="center"><a href="#">ลืมรหัสผ่าน?</a></span>
                            <button type="submit" class="btn pull-right btn-default" id="account-submit" name="submit">ลงชื่อเข้าใช้</button>
                        </div><!-- /.form-group -->
                    </form>
                    <?php
                        if (isset($_GET['result'])) {
                            if ($_GET['result'] == 'fail') {
                                echo "<div class='alert alert-danger text-center' role='alert'>อีเมลหรือรหัสผ่านไม่ถูกต้อง!</div>";
                            }
                        }
                    ?>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div>
    <!-- end Page Content -->
    <!-- Page Footer -->
    <footer id="page-footer">
        <div class="inner">
            <section id="footer-copyright">
                <div class="container">
                    <span>Copyright © 2017 สาขาระบบสารสนเทศทางธุรกิจ ภาควิชาบริหารธุรกิจ คณะวิทยาการจัดการ. All Rights Reserved.</span>
                    <span class="pull-right"><a href="#page-top" class="roll">Go to top</a></span>
                </div>
            </section>
        </div><!-- /.inner -->
    </footer>
    <!-- end Page Footer -->
</div>

<script type="text/javascript" src="assets/js/jquery-2.1.0.min.js"></script>
<script type="text/javascript" src="assets/js/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/smoothscroll.js"></script>
<script type="text/javascript" src="assets/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="assets/js/icheck.min.js"></script>
<script type="text/javascript" src="assets/js/retina-1.1.0.min.js"></script>
<script type="text/javascript" src="assets/js/custom.js"></script>
<!--[if gt IE 8]>
<script type="text/javascript" src="assets/js/ie.js"></script>
<![endif]-->


</body>
</html>
