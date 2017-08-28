<?php
    include_once 'dbconnect.php';
    include_once 'project_topic.php';
    include_once 'project_student.php';
    include_once 'project_topic_advisor.php';

    // get connection
    $database = new Database();
    $db = $database->getConnection();

    // pass connection to property_types table
    $project_topic = new Project_Topic($db);
    $project_student = new Project_Student($db);
    $project_topic_advisor = new Project_Topic_Advisor($db);

    // form is submitted
    if (isset($_POST['project-topic-submit'])) {
        // insert into project_topic table
        $project_topic->title_th = $_POST['title_th'];
        $project_topic->title_en = $_POST['title_en'];
        $project_topic->abstract = "";
        $project_topic->project_year = $_SESSION['project_year'];
        $project_topic->status = 3;       // รอพิจาราณา
        $project_topic->comment = "";
        $project_topic->created_date = date("Y/m/d");

        // insert into project_topic table
        if (!$project_topic->create()) {
            header("Location: ../../project_info_error.php");
        }
        // update project_students table
        // 1st member
        $project_student->student_id = $_SESSION['student_id'];
        $project_student->topic_id = $_SESSION['topic_id'];
        if (!$project_student->update_topic_id()) {
            header("Location: ../../project_info_error.php");
        }
        // 2nd member
        if ($_POST['ddl_member_2'] != " ") {
            $project_student->student_id = $_POST['ddl_member_2'];
            if (!$project_student->update_topic_id()) {
                header("Location: ../../project_info_error.php");
            }
        }
        // 3rd member
        if ($_POST['ddl_member_3'] != " ") {
            $project_student->student_id = $_POST['ddl_member_3'];
            if (!$project_student->update_topic_id()) {
                header("Location: ../../project_info_error.php");
            }
        }
        // insert into project_topics_advisors table
        $project_topic_advisor->topic_id = $_SESSION['topic_id'];
        $project_topic_advisor->advisor_id = $_POST['ddl_advisor'];
        $project_topic_advisor->advisor_type = 1;
        if ($project_topic_advisor->create()) {
            header("Location: ../../project_info.php");
        }
    }
?>
