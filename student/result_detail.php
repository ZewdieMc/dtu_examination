<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>DTU Exam | Student | Result </title>

    <link href="<?php echo SITEURL ?>asset2/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo SITEURL ?>asset2/css/TimeCircles.css" rel="stylesheet">
    <link href="<?php echo SITEURL ?>asset2/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo SITEURL ?>asset2/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="<?php echo SITEURL ?>asset2/css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <link href="<?php echo SITEURL ?>asset2/css/animate.css" rel="stylesheet">
    <link href="<?php echo SITEURL ?>asset2/css/style.css" rel="stylesheet">
</head>

<body class="gray-bg top-navigation">
    <nav class="navbar navbar-expand-lg navbar-static-top" role="navigation">

        <a href="#" class="navbar-brand">DTU Exam</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-reorder"></i>
        </button>

        <div class="navbar-collapse collapse" id="navbar">
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <a class="bg-primary text-white " href="<?php echo SITEURL; ?>student/index.php?page=logout">
                        <i class="fa fa-sign-out active"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="wrapper wrapper-content">
        <div class="animated fadeInRightBig">
            <div class="container">
                <?php
                if (isset($_SESSION['student'])) {
                    $student_id = $_SESSION['student_id'];
                    $full_name = $obj->get_fullname('tbl_student', $student_id, $conn);
                    $tbl_name_course = 'tbl_exam join tbl_course on tbl_exam.course_id=tbl_course.course_id';
                    $where = 'tbl_exam.exam_id ="' . $_GET['exam_id'] . '"';
                    $query = $obj->select_data($tbl_name_course, $where);
                    $res_course = $obj->execute_query($conn, $query);
                    $row_course = $obj->fetch_data($res_course);
                    echo "<h2>" . $full_name . "'s Result</h2>";
                    echo "<h2>Course : <b>" . $row_course['course_name'] . '</b></h2><br>';
                } else {
                    header('location:' . SITEURL . 'student/index.php?page=logout');
                }
                $added_date = date('Y-m-d');
                //Now Getting VAlues Based on aded date and student id
                $tbl_name = "tbl_result";
                $where = "student_id='$student_id' and exam_id ='" . $_GET['exam_id'] . "'";
                $query = $obj->select_data($tbl_name, $where);
                $res = $obj->execute_query($conn, $query);
                $sn = 1;
                while ($row = $obj->fetch_data($res)) {
                    $student_id = $row['student_id'];
                    $question_id = $row['question_id'];
                    $user_answer = $row['user_answer'];
                    $right_answer = $row['right_answer'];

                    $added_date = $row['added_date'];
                    //Get all the question and answers detail
                    $tbl_name2 = "tbl_question";
                    $where2 = "question_id='$question_id'";
                    $query2 = $obj->select_data($tbl_name2, $where2);
                    $res2 = $obj->execute_query($conn, $query2);
                    $row2 = $obj->fetch_data($res2);
                    $question = $row2['question'];
                    $first_answer = $row2['first_answer'];
                    $second_answer = $row2['second_answer'];
                    $third_answer = $row2['third_answer'];
                    $fourth_answer = $row2['fourth_answer'];
                    $fifth_answer = $row2['fifth_answer'];
                    $reason = $row2['reason'];
                    $image = $row2['image_name'];
                    $mark = $row2['marks'];
                ?>
                    <label style="font-weight: bold;"><?php echo $sn++ . '. ' . $question . " (" . $mark . " mark/s)"; ?></label><br />
                    <?php
                    if ($image != '')
                        echo '<img src="' . SITEURL . 'images/questions/' . $image . '" class="rounded" alt="Supplementary Image" height="40%" width = "40%"/><hr>';
                    //To get usersAnswer
                    switch ($user_answer) {
                        case 0: {
                                $userAnswer = "None";
                            }
                            break;

                        case 1: {
                                $userAnswer = $first_answer;
                            }
                            break;
                        case 2: {
                                $userAnswer = $second_answer;
                            }
                            break;
                        case 3: {
                                $userAnswer = $third_answer;
                            }
                            break;
                        case 4: {
                                $userAnswer = $fourth_answer;
                            }
                            break;
                        case 5: {
                                $userAnswer = $fifth_answer;
                            }
                            break;
                    }
                    //To get rightAnswer
                    switch ($right_answer) {
                        case 0: {
                                $rightAnswer = "None";
                            }
                            break;

                        case 1: {
                                $rightAnswer = $first_answer;
                            }
                            break;
                        case 2: {
                                $rightAnswer = $second_answer;
                            }
                            break;
                        case 3: {
                                $rightAnswer = $third_answer;
                            }
                            break;
                        case 4: {
                                $rightAnswer = $fourth_answer;
                            }
                            break;
                        case 5: {
                                $rightAnswer = $fifth_answer;
                            }
                            break;
                    }
                    ?>
                    <label>Your Answer: </label>
                    <?php
                    if ($userAnswer == $rightAnswer) {
                    ?>
                        <label style="color: green;"><?php echo $userAnswer; ?></label>
                        <i class="fa fa-lg fa-check-circle fa-2x" style="color: green"></i>
                    <?php
                    } else {
                    ?>
                        <label style="color: red;"><?php echo $userAnswer; ?></label>
                        <i class="fa fa-lg fa-times-circle fa-2x" style="color: red"></i>
                    <?php
                    }
                    ?>

                    <br />
                    <label>Correct Answer:</label><label style="color: green;"><?php echo $rightAnswer; ?></label><br />
                    <?php if ($reason != '') { ?><div class=" alert alert-success"><?php echo $reason ?></div>
                        <hr />
                <?php
                    }
                }
                //
                ?>
                <center><a href="<?php echo SITEURL ?>student/index.php?page=exams" class="btn btn-primary btn-rounded text-white">Back to Exams</a></center>
            </div>
        </div>
    </div>
</body>
<script src="<?php echo SITEURL ?>asset2/js/jquery-3.1.1.min.js"></script>
<script src="<?php echo SITEURL ?>asset2/js/parsley.js"></script>
<script src="<?php echo SITEURL ?>asset2/js/popper.min.js"></script>
<script src="<?php echo SITEURL ?>asset2/js/bootstrap.js"></script>
<script src="<?php echo SITEURL ?>asset2/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?php echo SITEURL ?>asset2/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo SITEURL ?>asset2/js/plugins/toastr/toastr.min.js"></script>
<script src="<?php echo SITEURL ?>asset2/js/TimeCircles.js"></script>

<!-- Custom and plugin javascript -->
<script src="<?php echo SITEURL ?>asset2/js/inspinia.js"></script>
<script src="<?php echo SITEURL ?>asset2/js/plugins/pace/pace.min.js"></script>

<!-- iCheck -->
<script src="<?php echo SITEURL ?>asset2/js/plugins/iCheck/icheck.min.js"></script>


<!--Body Ends Here-->