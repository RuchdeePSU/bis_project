<?php
    session_start();

    if (!isset($_SESSION['student_email'])) {
        header("Location: index.php");
    }

    include_once 'assets/php/dbconnect.php';
    include_once 'assets/php/project_topic.php';
    include_once 'assets/php/project_student.php';
    include_once 'assets/php/project_topic_advisor.php';
    include_once 'assets/php/project_advisor.php';

    // get connection
    $database = new Database();
    $db = $database->getConnection();

    // pass connection to property_types table
    $project_topic = new Project_Topic($db);
    $project_student = new Project_Student($db);
    $project_topic_advisor = new Project_Topic_Advisor($db);
    $project_advisor = new Project_Advisor($db);

    $project_student->student_id = $_SESSION['student_id'];
    $result_students2 = $project_student->readforDDL();
    $result_students3 = $project_student->readforDDL();

    $result_advisors = $project_advisor->readforDDL();

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
        h1, h2, h3, h4, h5, h6, legend, a, .btn, ul, th, td, address, span, label, input, .panel { font-family: 'Pridi', serif; }
    </style>

    <title>BIS Student Project Management System | 1. บันทึกข้อมูลโครงงาน</title>

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
              <li class="active">เพิ่มโครงงาน</li>
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
                            <li class="active"><a href="project_info.php"><i class="fa fa-edit"></i><span>1. บันทึกข้อมูลโครงงาน</span></a></li>
                            <li><a href="project_proposal.php"><i class="fa fa-cloud-upload"></i><span>2. ส่งไฟล์โครงร่าง</span></a></li>
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
                        <header><h1>เพิ่มโครงงาน</h1></header>
                        <div class="my-properties">
                            <form role="form" id="project_topic_add" method="post" action="assets/php/project_info_save.php" data-toggle="validator">
                                <div class="row">
                                    <div class="col-md-9 col-sm-9">
                                        <div class="form-group">
                                            <label for="title_th">ชื่อโครงงาน (ภาษาไทย)</label>
                                            <input type="text" class="form-control" id="title_th" name="title_th" placeholder="ใส่ชื่อโครงงาน (ภาษาไทย)" maxlength="300" data-error="กรุณาใส่ชื่อโครงการ (ภาษาไทย)" required>
                                            <div class="help-block with-errors"></div>
                                        </div><!-- /.form-group -->
                                        <div class="form-group">
                                            <label for="title_en">ชื่อโครงงาน (English)</label>
                                            <input type="text" class="form-control" id="title_en" name="title_en" placeholder="ใส่ชื่อโครงงาน (English)" maxlength="300">
                                        </div><!-- /.form-group -->
                                    </div><!-- /.col-md-9 -->
                                    <div class="col-md-3 col-sm-3">
                                    </div>
                                </div><!-- /.row -->
                                <div class="row">
                                    <div class="col-md-9 col-sm-9">
                                        <header><h3>ประเภทโครงงาน</h3></header>
                                        <div class="form-group">
                                          <div class="form-check">
                                              <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" id="chk_web_app" name="chk_web_app">
                                                Web Application
                                              </label>&nbsp;&nbsp;&nbsp;
                                              <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" id="chk_mobile_app" name="chk_mobile_app">
                                                Mobile Application
                                              </label>&nbsp;&nbsp;&nbsp;
                                              <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" id="chk_other_app" name="chk_other_app">
                                                อื่นๆ
                                              </label>
                                            </div>
                                        </div><!-- /.form-group -->
                                    </div><!-- /.col-md-9 -->
                                    <div class="col-md-3 col-sm-3">
                                    </div>
                                </div><!-- /.row -->

                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <header><h3>สมาชิกกลุ่มโครงงาน</h3></header>
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                              <?php echo "1. " . $_SESSION['student_id'] . " " . $_SESSION['student_title'] . $_SESSION['student_fullname']; ?>
                                            </div>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                              <div id="selected_member_2"></div>
                                            </div>
                                        </div>
                                        <div class="form-group" style="display:flex;">
                                            <select name="ddl_member_2" id="ddl_member_2">
                                                <option value=" " selected>เลือกสมาชิกคนที่ 2</option>
                                                <?php while ($row_students = mysqli_fetch_array($result_students2)) {
                                                  echo "<option value=" . $row_students['student_id'] . ">" . $row_students['student_id'] . " " . $row_students['student_title'] . $row_students['student_fullname'] . "</option>";
                                                } ?>
                                            </select>
                                            <button type="button" class="btn btn-success" id="btn_member_2" name="btn_member_2">เพิ่ม</button>
                                        </div>
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                              <div id="selected_member_3"></div>
                                            </div>
                                        </div>
                                        <div class="form-group" style="display:flex;">
                                            <select name="ddl_member_3" id="ddl_member_3">
                                                <option value=" " selected>เลือกสมาชิกคนที่ 3</option>   <?php while ($row_students3 = mysqli_fetch_array($result_students3)) {
                                                  echo "<option value=" . $row_students3['student_id'] . ">" . $row_students3['student_id'] . " " . $row_students3['student_title'] . $row_students3['student_fullname'] . "</option>";
                                                } ?>
                                            </select>
                                            <button type="button" class="btn btn-success" id="btn_member_3" name="btn_member_3">เพิ่ม</button>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                    </div>
                                </div><!-- /.row -->
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <header><h3>อาจารย์ที่ปรึกษาโครงงาน</h3></header>
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                              <div id="selected_advisor"></div>
                                            </div>
                                        </div>
                                        <div class="form-group" style="display:flex;">
                                            <select name="ddl_advisor" id="ddl_advisor" data-error="กรุณาเลือกอาจารย์ที่ปรึกษา" required>
                                                <option value=" " selected>เลือกอาจารย์ที่ปรึกษา</option>
                                                <?php while ($row_advisors = mysqli_fetch_array($result_advisors)) {
                                                    echo "<option value=" . $row_advisors['advisor_id'] . ">" . $row_advisors['advisor_title'] . $row_advisors['advisor_fullname'] . "</option>";
                                                } ?>
                                            </select>
                                            <button type="button" class="btn btn-success" id="btn_advisor" name="btn_advisor">เพิ่ม</button>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                    </div>
                                </div><!-- /.row -->
                                <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="center-block">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-default large" name="project-topic-submit">บันทึกโครงงาน</button>
                                            </div><!-- /.form-group -->
                                        </div>
                                    </div>
                                </div>
                            </form>


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
<script type="text/javascript" src="assets/js/validator.min.js"></script>
<!--[if gt IE 8]>
<script type="text/javascript" src="assets/js/ie.js"></script>
<![endif]-->

<script>
$(document).ready(function(){
  $('#btn_member_2').click(function(){
      if ($('#ddl_member_2').val() != ' ') {
          if ($('#ddl_member_2').val() == $('#ddl_member_3').val()) {
              $("#selected_member_2").html("ไม่สามารถเพิ่มสมาชิกซ้ำได้");
              $("#ddl_member_2").get(0).selectedIndex = 0;
              $("#ddl_member_2").val(' ').change();
          } else {
              var gtxt = $("#ddl_member_2").find("option:selected").text();
              $("#selected_member_2").html("2. " + gtxt + " " + "<button type='button' class='btn btn-danger btn-xs' id='btn_member_2_del' name='btn_member_2_del'><i class='fa fa-trash-o'></i></button>");
          }
      }
  });
  $(document).on("click", "#btn_member_2_del", function() {
      $("#selected_member_2").html("");
      $("#ddl_member_2").get(0).selectedIndex = 0;
      $("#ddl_member_2").val(' ').change();
  });

  $('#btn_member_3').click(function(){
      if ($('#ddl_member_3').val() != ' ') {
          if ($('#ddl_member_3').val() == $('#ddl_member_2').val()) {
              $("#selected_member_3").html("ไม่สามารถเพิ่มสมาชิกซ้ำได้");
              $("#ddl_member_3").get(0).selectedIndex = 0;
              $("#ddl_member_3").val(' ').change();
          } else {
              var gtxt = $("#ddl_member_3").find("option:selected").text();
              $("#selected_member_3").html("3. " + gtxt + " " + "<button type='button' class='btn btn-danger btn-xs' id='btn_member_3_del' name='btn_member_3_del'><i class='fa fa-trash-o'></i></button>");
          }
      }
  });
  $(document).on("click", "#btn_member_3_del", function() {
      $("#selected_member_3").html("");
      $("#ddl_member_3").get(0).selectedIndex = 0;
      $("#ddl_member_3").val(' ').change();
  });

  $('#btn_advisor').click(function(){
      if ($('#ddl_advisor').val() != ' ') {
          var gtxt = $("#ddl_advisor").find("option:selected").text();
          $("#selected_advisor").html(gtxt + " " + "<button type='button' class='btn btn-danger btn-xs' id='btn_advisor_del' name='btn_advisor_del'><i class='fa fa-trash-o'></i></button>");
      }
  });
  $(document).on("click", "#btn_advisor_del", function() {
      $("#selected_advisor").html("");
      $("#ddl_advisor").get(0).selectedIndex = 0;
      $("#ddl_advisor").val(' ').change();
  });
});
</script>

</body>
</html>
