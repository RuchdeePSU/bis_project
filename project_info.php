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

    if ($_SESSION['topic_id'] == "") {
      $addproj = true;
    } else {
      $addproj = false;
      $project_topic->topic_id = $_SESSION['topic_id'];
      $project_topic->project_year = $_SESSION['project_year'];
      // get project topic
      $result_topic = $project_topic->readone();

      // get students according to topic id
      $project_student->topic_id = $_SESSION['topic_id'];
      $result_student = $project_student->readgroup();

      // get advisors information
      $project_topic_advisor->topic_id = $_SESSION['topic_id'];
      $result_topic_advisor = $project_topic_advisor->readone();
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
        h1, h2, h3, h4, h5, h6, legend, a, .btn, ul, th, td, address, span { font-family: 'Pridi', serif; }
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
              <?php if (!$addproj) { ?>
                  <div class="add-your-property">
                      <a href="project_info_add.php" class="btn btn-default"><i class="fa fa-plus"></i><span class="text">เพิ่มโครงงาน</span></a>
                  </div>
              <?php } ?>
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
              <li class="active">1. บันทึกข้อมูลโครงงาน</li>
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
                        <header><h1>1. บันทึกข้อมูลโครงงาน</h1></header>
                        <div class="my-properties">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>รหัสโครงงาน</th>
                                                <th>หัวข้อโครงงาน</th>
                                                <th class="center">สถานะหัวข้อโครงงาน</th>
                                                <th class="center">แก้ไขโครงงาน</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php while ($row_topic = mysqli_fetch_array($result_topic)) {
                                              $comment = $row_topic['comment']; ?>
                                            <tr>
                                                <td>&nbsp;&nbsp;<?php echo $row_topic['topic_id']; ?></td>
                                                <td><?php echo $row_topic['title_th']; ?></td>
                                                <td class="center"><?php if ($row_topic['status'] == 0) {
                                                    echo "<span class='label label-danger'>ไม่ผ่าน</span>";
                                                } elseif ($row_topic['status'] == 1) {
                                                    echo "<span class='label label-success'>ผ่าน</span>";
                                                } elseif ($row_topic['status'] == 2) {
                                                      echo "<span class='label label-warning'>ผ่านแบบมีเงื่อนไข</span>&nbsp;<a href='#' data-toggle='modal' data-target='#display-warning'><i class='fa fa-file-text'></i></a>";
                                                } else { echo "<span class='label label-default'>รอพิจารณา</span>"; }?></td>
                                                <td class="center">
                                                    <a href="project_info_update.php?topic_id=<?php echo $row_topic['topic_id']; ?>" class="edit"><i class="fa fa-pencil"></i></a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                            <?php if ($addproj) { ?>
                                                <tr>
                                                    <td colspan="4" class="center">
                                                        <span class="label label-danger">ไม่พบข้อมูลโครงงาน</span>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div><!-- /.table-responsive -->
                                </div><!-- /.col-md-9 -->
                            </div><!-- /.row -->
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <header><h3>สมาชิกกลุ่มโครงงาน</h3></header>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>รหัสนักศึกษา</th>
                                                <th>ชื่อ-นามสกุล</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php while ($row_student = mysqli_fetch_array($result_student)) { ?>
                                            <tr>
                                                <td>&nbsp;&nbsp;<?php echo $row_student['student_id']; ?></td>
                                                <td><?php echo $row_student['student_fullname']; ?></td>
                                            </tr>
                                            <?php } ?>
                                            <?php if ($addproj) { ?>
                                                <tr>
                                                    <td colspan="2" class="center">
                                                        <span class="label label-danger">ไม่พบข้อมูลกลุ่มโครงงาน</span>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div><!-- /.table-responsive -->
                                </div>
                                <div class="col-md-6 col-sm-6">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <header><h3>อาจารย์ที่ปรึกษาและกรรมการผู้ประเมินโครงงาน</h3></header>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>ชื่อ-นามสกุล</th>
                                                <th class="center">ประเภท</th>
                                                <th class="center">ติดต่อ</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php while ($row_topic_advisor = mysqli_fetch_array($result_topic_advisor)) {
                                                $project_advisor->advisor_id = $row_topic_advisor['advisor_id'];
                                                $result_advisor = $project_advisor->readone();
                                                $row_advisor = mysqli_fetch_assoc($result_advisor);
                                            ?>
                                            <tr>
                                                <td>&nbsp;&nbsp;<?php echo $row_advisor['advisor_fullname']; ?></td>
                                                <td class="center"><?php if ($row_topic_advisor['advisor_type'] == 0) {
                                                    echo "กรรมการ";
                                                } else { echo "อาจารย์ที่ปรึกษา"; }?></td>
                                                <td class="center"><a href="mailto:<?php echo $row_advisor['advisor_email']; ?>"><i class="fa fa-envelope"></i></a></td>
                                            </tr>
                                            <?php } ?>
                                            <?php if ($addproj) { ?>
                                                <tr>
                                                    <td colspan="2" class="center">
                                                        <span class="label label-danger">ไม่พบข้อมูล</span>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div><!-- /.table-responsive -->

                                </div>
                                <div class="col-md-6 col-sm-6">
                                </div>
                            </div>
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

<!-- Modal Dialog -->
<div class="modal fade" id="display-warning" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">ผ่านแบบมีเงื่อนไข</h4>
        </div>
        <div class="modal-body">
          <p><?php echo $comment; ?></p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">ปิดหน้าต่าง</button>
        </div>
    </div>
</div>
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
