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
    //$result = $project_student->readall();

    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    $project_student->perpage = 10;
    $project_student->start = ($page - 1) * $project_student->perpage;

    $notfound = false;
    if (isset($_POST['btn_search'])) {
        $project_student->project_year = $_POST['ddl_project_year'];
    } else {
        $project_student->project_year = $_SESSION['project_year'];
    }
    $result = $project_student->readyear();
    if (mysqli_num_rows($result) <= 0) {
        $notfound = true;
        $total_rows = 0;
    } else {
        $total_rows = mysqli_num_rows($result);
    }
    $total_pages = ceil($total_rows / $project_student->perpage);

    if (isset($_GET['student_id'])) {
        $project_student->student_id = $_GET['student_id'];
        if ($project_student->delete()) {
            header("Location: students_list.php");
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
        h1, h2, h3, h4, h5, h6, legend, a, .btn, strong, ul, label, input, address, span, th, td, p { font-family: 'Pridi', serif; }
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
                <div class="add-your-property">
                    <a href="students_add.php" class="btn btn-default"><i class="fa fa-plus"></i><span class="text">เพิ่มนักศึกษาโครงการ</span></a>
                </div>
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
                <li class="active">นักศึกษาโครงงาน</li>
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
                        <header><h1>นักศึกษาโครงงาน</h1></header>
                        <div class="my-properties">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                  <form class="form-inline" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                                    <div class="form-group">
                                      <div class="input-group">
                                        <select name="ddl_project_year" id="ddl_project_year">
                                            <option value="2560" selected>2560</option>
                                            <option value="2561">2561</option>
                                        </select>
                                      </div>
                                    </div>
                                    <button type="submit" class="btn btn-default" name="btn_search"><i class="glyphicon glyphicon-search"></i> ค้นหา</button>
                                  </form>
                                </div>
                            </div>
                            <br />
                            <div class="row">
                                <div class="col-md-10 col-sm-10">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>รหัสนักศึกษา</th>
                                                <th>ชื่อ - สกุล</th>
                                                <th class="center">ปีการศึกษา</th>
                                                <th class="center">แก้ไข</th>
                                                <th class="center">ลบ</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php while ($row = mysqli_fetch_array($result)) { ?>
                                            <tr>
                                                <td>&nbsp;<?php echo $row['student_id']; ?></td>
                                                <td><?php echo $row['student_title'] . $row['student_fullname']; ?></td>
                                                <td class="center"><?php echo $row['project_year']; ?></td>
                                                <td class="center">
                                                    <a href="students_update.php?student_id=<?php echo $row['student_id']; ?>" class="edit"><i class="fa fa-pencil"></i></a>
                                                </td>
                                                <td class="center">
                                                    <a href="#" class="delete" data-href="students_list.php?student_id=<?php echo $row['student_id']; ?>" data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                            <?php if (isset($notfound) && $notfound) { ?>
                                                <tr>
                                                    <td colspan="5" class="center">
                                                        <span class="label label-danger">ไม่พบข้อมูล</span>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div><!-- /.table-responsive -->

                                </div><!-- /.col-md-9 -->
                                <div class="col-md-2 col-sm-2">

                                </div>
                            </div><!-- /.row -->
                            <div class="row">
                                <div class="col-md-10 col-sm-10">
                                    <div class="center">
                                        <ul class="pagination">
                                            <?php for ($i=1; $i <= $total_pages; $i++) {
                                                if ($page == $i) {
                                                    echo "<li class='active'><a href='students_list.php?page=" . $i . "'>" . $i . "</a></li>";
                                                } else {
                                                    echo "<li><a href='students_list.php?page=" . $i . "'>" . $i . "</a></li>";
                                                }
                                            } ?>
                                        </ul><!-- /.pagination-->
                                    </div><!-- /.center-->
                                </div>
                                <div class="col-md-2 col-sm-2">
                                </div>
                            </div>

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

<!-- Modal Dialog -->
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">ยืนยันการลบข้อมูล</h4>
        </div>
        <div class="modal-body">
          <p>แน่ใจว่าต้องการลบข้อมูลนี้?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
            <a class="btn btn-danger" id="confirm">ลบข้อมูล</a>
        </div>
    </div>
</div>
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
  $('#confirm-delete').on('show.bs.modal', function(e) {
      $(this).find('#confirm').attr('href', $(e.relatedTarget).data('href'));
  });
</script>

</body>
</html>
