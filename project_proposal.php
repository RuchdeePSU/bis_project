<?php
    session_start();

    if (!isset($_SESSION['student_email'])) {
        header("Location: index.php");
    }

    include_once 'assets/php/dbconnect.php';

    // get connection
    $database = new Database();
    $db = $database->getConnection();

    // pass connection to property_types table
    // $property_type = new Property_type($db);
    //
    // $active = false;
    //
    // // read all records
    // $result = $property_type->readall($active);
    //
    // if (isset($_GET['type_id'])) {
    //     $property_type->prop_type_id = $_GET['type_id'];
    //     if ($property_type->delete()) {
    //         header("Location: property-types-listing.php");
    //     }
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
        h1, h2, h3, h4, h5, h6, legend, a, .btn, ul, th, td, address, span { font-family: 'Pridi', serif; }
    </style>

    <title>BIS Student Project Management System | 2. ส่งไฟล์โครงร่าง</title>

</head>

<body class="page-sub-page page-my-properties page-account" id="page-top">
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
                      <li><a href="#"></a></li>
                      <li><a href="#"></a></li>
                      <li><a href="#"></a></li>
                      <?php
                          if (isset($_SESSION['student_email']) && isset($_SESSION['student_fullname'])) {
                              echo "<li>" . $_SESSION['student_email'] . "<a href='assets/php/sign-out.php'>[ออกจากระบบ]</a></li>";
                          } else {
                              echo "<li><a href='index.php'>ลงชื่อเข้าใช้</a></li>";
                          }
                      ?>
                </ul>
              </nav><!-- /.navbar collapse-->
              <!-- <div class="add-your-property">
                  <a href="property-types-create.php" class="btn btn-default"><i class="fa fa-plus"></i><span class="text">เพิ่มประเภทอสังหาริมทรัพย์</span></a>
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
              <li class="active">2. ส่งไฟล์โครงร่าง</li>
            </ol>
        </div>
        <!-- end Breadcrumb -->

        <div class="container">
            <div class="row">
            <!-- sidebar -->
            <div class="col-md-3 col-sm-2">
                <section id="sidebar">
                    <header><h3>เมนูหลัก</h3></header>
                    <aside>
                        <ul class="sidebar-navigation">
                            <li><a href="main.php"><i class="fa fa-calendar"></i><span>ข่าวสารและประกาศ</span></a></li>
                            <li><a href="check_topic.php"><i class="fa fa-search"></i><span>ตรวจสอบหัวข้อโครงงาน</span></a></li>
                            <li><a href="project_info.php"><i class="fa fa-edit"></i><span>1. บันทึกข้อมูลโครงงาน</span></a></li>
                            <li class="active"><a href="project_proposal.php"><i class="fa fa-cloud-upload"></i><span>2. ส่งไฟล์โครงร่าง</span></a></li>
                            <li><a href="project_progress1.php"><i class="fa fa-bar-chart-o"></i><span>3. นำเสนอความก้าวหน้าครั้งที่ 1</span></a></li>
                            <li><a href="project_progress2.php"><i class="fa fa-bar-chart-o"></i><span>4. นำเสนอความก้าวหน้าครั้งที่ 2</span></a></li>
                            <li><a href="project_final.php"><i class="fa fa-check-square-o"></i><span>5. นำเสนอโครงงาน</span></a></li>
                        </ul>
                    </aside>
                </section><!-- /#sidebar -->
            </div><!-- /.col-md-3 -->
            <!-- end Sidebar -->
                <!-- My Properties -->
                <div class="col-md-9 col-sm-10">
                    <section id="my-properties">
                        <header><h1>2. ส่งไฟล์โครงร่าง</h1></header>
                        <div class="my-properties">
                            <div class="row">
                                <div class="col-md-10 col-sm-10">

                                </div><!-- /.col-md-9 -->
                                <div class="col-md-2 col-sm-2">
                                </div>
                            </div><!-- /.row -->
                        </div><!-- /.my-properties -->
                    </section><!-- /#my-properties -->
                </div><!-- /.col-md-9 -->
                <!-- end My Properties -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div>
    <!-- end Page Content -->
    <!-- Page Footer -->
    <footer id="page-footer">
        <div class="inner">
            <aside id="footer-copyright">
                <div class="container">
                    <span>Copyright © 2017 สาขาระบบสารสนเทศทางธุรกิจ ภาควิชาบริหารธุรกิจ คณะวิทยาการจัดการ. All Rights Reserved.</span>
                    <span class="pull-right"><a href="#page-top" class="roll">Go to top</a></span>
                </div>
            </aside>
        </div><!-- /.inner -->
    </footer>
    <!-- end Page Footer -->
</div>

<script type="text/javascript" src="assets/js/jquery-2.1.0.min.js"></script>
<script type="text/javascript" src="assets/js/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/smoothscroll.js"></script>
<script type="text/javascript" src="assets/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="assets/js/retina-1.1.0.min.js"></script>
<script type="text/javascript" src="assets/js/custom.js"></script>
<!--[if gt IE 8]>
<script type="text/javascript" src="assets/js/ie.js"></script>
<![endif]-->

</body>
</html>
