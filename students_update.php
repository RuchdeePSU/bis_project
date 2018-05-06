<?php
    session_start();

    if (!isset($_SESSION['admin_email'])) {
        header("Location: login_admin.php");
    }

    include_once 'assets/php/dbconnect.php';
    include_once 'assets/php/project_student.php';

    // get connection
    $database = new Database();
    $db = $database->getConnection();

    $project_student = new Project_Student($db);
    $project_student->student_id = $_GET['student_id'];
    $result = $project_student->readoneforupdate();
    $row = mysqli_fetch_array($result);

    // form is submitted
    if (isset($_POST['btn_students_update'])) {
        $project_student->student_id = $_POST['student_id'];
        $project_student->student_title =$_POST['ddl_student_title'];
        $project_student->student_fullname = $_POST['student_fullname'];
        $project_student->student_email = $_POST['student_email'];
        $project_student->project_year = $_POST['project_year'];
        if ($project_student->update()) {
            $success = true;
            header("Location: students_list.php");
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

    <title>BIS Student Project Management System | นักศึกษาโครงงาน</title>

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
                <li class="active">แก้ไขนักศึกษาโครงงาน</li>
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
                            <li class="active"><a href="students_list.php"><i class="fa fa-users"></i><span>นักศึกษาโครงงาน</span></a></li>
                            <li><a href="advisors_list.php"><i class="fa fa-users"></i><span>อาจารย์ที่ปรึกษาโครงงาน</span></a></li>
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
                        <header><h1>แก้ไขนักศึกษาโครงงาน</h1></header>
                        <div class="account-profile">
                            <div class="row">
                                <div class="col-md-10 col-sm-10">
                                  <form role="form" id="form_students_update" method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
                                      <section id="contact">
                                          <div class="row">
                                              <div class="col-md-4 col-sm-4">
                                                  <div class="form-group">
                                                      <label for="student_id">รหัสนักศึกษา
                                                      <input type="text" class="form-control" id="student_id" name="student_id" value="<?php echo $row['student_id']; ?>" readonly></label>
                                                  </div><!-- /.form-group -->
                                              </div>
                                              <div class="col-md-2 col-sm-2">
                                                  <div class="form-group">
                                                      <div class="input-group">
                                                          <label for="ddl_student_title">คำนำหน้าชื่อ
                                                          <select name="ddl_student_title" id="ddl_student_title">
                                                              <option value="นาย"
                                                                <?php if ($row['student_title'] == 'นาย') {
                                                                  echo "selected";
                                                                }  ?>>นาย</option>
                                                              <option value="นางสาว" <?php if ($row['student_title'] == 'นางสาว') {
                                                                  echo "selected";
                                                              } ?>>นางสาว</option>
                                                          </select></label>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-md-6 col-sm-6">
                                                  <div class="form-group">
                                                      <label for="student_fullname">ชื่อ - นามสกุล
                                                      <input type="text" class="form-control" id="student_fullname" name="student_fullname" value="<?php echo $row['student_fullname']; ?>"></label>
                                                  </div><!-- /.form-group -->
                                              </div>
                                          </div>
                                          <div class="row">
                                              <div class="col-md-6 col-sm-6">
                                                  <div class="form-group">
                                                      <label for="student_email">อีเมล
                                                      <input type="text" class="form-control" id="student_email" name="student_email" value="<?php echo $row['student_email']; ?>"></label>
                                                  </div><!-- /.form-group -->
                                              </div>
                                              <div class="col-md-2 col-sm-2">
                                                  <div class="form-group">
                                                      <label for="project_year">ปีการศึกษา
                                                      <input type="number" class="form-control" id="project_year" name="project_year" value="<?php echo $_SESSION['project_year'] ?>"></label>
                                                  </div><!-- /.form-group -->
                                              </div>
                                              <div class="col-md-4 col-sm-4">
                                              </div>
                                          </div>
                                          <hr />
                                          <div class="row">
                                              <div class="block">
                                                  <div class="col-md-12 col-sm-12">
                                                      <div class="center">
                                                          <div class="form-group">
                                                              <button type="submit" class="btn btn-default large" name="btn_students_update">บันทึกข้อมูล</button>
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
<script>
    var password = document.getElementById("form-password-new"),
        confirm_password = document.getElementById("form-password-confirm");

    function validatePassword(){
      if(password.value != confirm_password.value) {
        confirm_password.setCustomValidity("ยืนยันรหัสผ่านไม่ตรงกัน!");
      } else {
        confirm_password.setCustomValidity('');
      }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;

    function validateCurrentPass(cpassword1) {
        var cpassword2 = document.getElementById("form-password-current");
        if (cpassword1 != md5(cpassword2.value)) {
            cpassword2.setCustomValidity("รหัสผ่านปัจจุบันไม่ถูกต้อง!");
        } else {
            cpassword2.setCustomValidity("");
        }
    }
</script>

</body>
</html>
