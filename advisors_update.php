<?php
    session_start();

    if (!isset($_SESSION['admin_email'])) {
        header("Location: login_admin.php");
    }

    include_once 'assets/php/dbconnect.php';
    include_once 'assets/php/project_advisor.php';

    // get connection
    $database = new Database();
    $db = $database->getConnection();

    $project_advisor = new Project_Advisor($db);
    $project_advisor->advisor_id = $_GET['advisor_id'];
    $result = $project_advisor->readone();
    $row = mysqli_fetch_array($result);

    // form is submitted
    if (isset($_POST['btn_advisors_update'])) {
        $project_advisor->advisor_id = $_GET['advisor_id'];
        $project_advisor->advisor_title =$_POST['ddl_advisor_title'];
        $project_advisor->advisor_fullname = $_POST['advisor_fullname'];
        $project_advisor->advisor_email = $_POST['advisor_email'];
        $project_advisor->status = $_POST['ddl_status'];
        if ($project_advisor->update()) {
            $success = true;
            header("Location: advisors_list.php");
        } else {
            $success = false;
        }
    }

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
        h1, h2, h3, h4, h5, h6, legend, a, .btn, strong, ul, label, input, address, span { font-family: 'Pridi', serif; }
    </style>

    <title>BIS Student Project Management System | อาจารย์ที่ปรึกษาโครงงาน</title>

</head>

<body class="page-sub-page page-profile page-account" id="page-top">
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
                            if (isset($_SESSION['admin_email'])) {
                                echo "<li>" . $_SESSION['admin_email'] . "<a href='assets/php/sign-out.php'>[ออกจากระบบ]</a></li>";
                            } else {
                                echo "<li><a href='index.php'>ลงชื่อเข้าใช้</a></li>";
                            }
                        ?>
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
                <li class="active">แก้ไขอาจารย์ที่ปรึกษาโครงงาน</li>
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
                            <li><a href="main_admin.php"><i class="fa fa-gear"></i><span>การตั้งค่า (Settings)</span></a></li>
                            <li><a href="students_list.php"><i class="fa fa-users"></i><span>นักศึกษาโครงงาน</span></a></li>
                            <li class="active"><a href="advisors_list.php"><i class="fa fa-users"></i><span>อาจารย์ที่ปรึกษาโครงงาน</span></a></li>
                            <li><a href="#"><i class="fa fa-calendar"></i><span>ข่าวสารและประกาศ</span></a></li>
                            <li><a href="#"><i class="fa fa-flag"></i><span>หัวข้อโครงงานย้อนหลัง</span></a></li>
                        </ul>
                    </aside>
                </section><!-- /#sidebar -->
            </div><!-- /.col-md-3 -->
            <!-- end Sidebar -->
                <!-- My Properties -->
                <div class="col-md-9 col-sm-10">
                    <section id="profile">
                        <header><h1>แก้ไขอาจารย์ที่ปรึกษาโครงงาน</h1></header>
                        <div class="account-profile">
                            <div class="row">
                                <div class="col-md-10 col-sm-10">
                                  <form role="form" id="form_advisors_update" method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
                                      <section id="contact">
                                          <div class="row">
                                              <div class="col-md-2 col-sm-2">
                                                  <div class="form-group">
                                                      <div class="input-group">
                                                          <label for="ddl_advisor_title">คำนำหน้าชื่อ
                                                          <select name="ddl_advisor_title" id="ddl_advisor_title">
                                                              <option value="ผศ.ดร." <?php if ($row['advisor_title'] == 'ผศ.ดร.') {
                                                                  echo "selected";
                                                              } ?>>ผศ.ดร.</option>
                                                              <option value="ผศ." <?php if ($row['advisor_title'] == 'ผศ.') {
                                                                  echo "selected";
                                                              } ?>>ผศ.</option>
                                                              <option value="ดร." <?php if ($row['advisor_title'] == 'ดร.') {
                                                                  echo "selected";
                                                              } ?>>ดร.</option>
                                                              <option value="อ." <?php if ($row['advisor_title'] == 'อ.') {
                                                                  echo "selected";
                                                              } ?>>อ.</option>
                                                          </select></label>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-md-8 col-sm-8">
                                                  <div class="form-group">
                                                      <label for="advisor_fullname">ชื่อ - นามสกุล
                                                      <input type="text" class="form-control" id="advisor_fullname" name="advisor_fullname" value="<?php echo $row['advisor_fullname']; ?>"></label>
                                                  </div><!-- /.form-group -->
                                              </div>
                                              <div class="col-md-2 col-sm-2">
                                              </div>
                                          </div>
                                          <div class="row">
                                              <div class="col-md-6 col-sm-6">
                                                  <div class="form-group">
                                                      <label for="advisor_email">อีเมล
                                                      <input type="text" class="form-control" id="advisor_email" name="advisor_email" value="<?php echo $row['advisor_email']; ?>"></label>
                                                  </div><!-- /.form-group -->
                                              </div>
                                              <div class="col-md-4 col-sm-4">
                                                  <div class="form-group">
                                                      <div class="input-group">
                                                          <label for="ddl_status">สถานะ
                                                          <select name="ddl_status" id="ddl_status">
                                                              <option value="1" selected>เป็นอาจารย์ที่ปรึกษาได้</option>
                                                              <option value="0">ไม่สามารถเป็นอาจารย์ที่ปรึกษาได้</option>
                                                          </select></label>
                                                      </div>
                                                  </div><!-- /.form-group -->
                                              </div>
                                              <div class="col-md-2 col-sm-2">
                                              </div>
                                          </div>
                                          <hr />
                                          <div class="row">
                                              <div class="block">
                                                  <div class="col-md-12 col-sm-12">
                                                      <div class="center">
                                                          <div class="form-group">
                                                              <button type="submit" class="btn btn-default large" name="btn_advisors_update">บันทึกข้อมูล</button>
                                                          </div><!-- /.form-group -->
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </section>
                                  </form><!-- /#form-contact -->

                                </div><!-- /.col-md-9 -->
                                <div class="col-md-2 col-sm-2">
                                </div>
                                <div class="row">
                                  <div class="col-md-12 col-sm-12">
                                      <div class="center-block">
                                          <?php
                                            if (isset($success)) {
                                                if ($success) {
                                                    echo "<div class='alert alert-success text-center'>บันทึกข้อมูลเรียบร้อยแล้ว</div>";
                                                } else {
                                                    echo "<div class='alert alert-danger text-center'>พบข้อผิดพลาด! ไม่สามารถบันทึกข้อมูลได้</div>";
                                                }
                                            }
                                          ?>
                                      </div>
                                  </div>
                                </div>
                            </div><!-- /.row -->

                        </div><!-- /.account-profile -->
                    </section><!-- /#profile -->
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
<script type="text/javascript" src="assets/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="assets/js/icheck.min.js"></script>
<script type="text/javascript" src="assets/js/retina-1.1.0.min.js"></script>
<script type="text/javascript" src="assets/js/custom.js"></script>
<script type="text/javascript" src="assets/js/md5.min.js"></script>
<!--[if gt IE 8]>
<script type="text/javascript" src="assets/js/ie.js"></script>
<![endif]-->

</body>
</html>
