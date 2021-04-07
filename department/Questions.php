<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" HREF="img/dtu.png" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>DTU Examination</title>

    <?php include('./includes/css2.php') ?>

</head>

<body class="md-skin pace-done">
    <div id="wrapper">
        <?php include('sidenav.php'); ?>
        <?php
#global variables
//session_destroy();
#echo $_SESSION['sn'];

if (!isset($_SESSION['prev_disabled'])) {
    $_SESSION['prev_disabled'] = "disabled";
}
if (!isset($_SESSION['next_disabled'])) {
    $_SESSION['next_disabled'] = "";
}

if (!isset($_SESSION['question_id'])) {
    $_SESSION['question_id'] = 1;
}

if (!isset($_SESSION['next'])) {
    $_SESSION['next'] = 'ON';
}

#end of global variables

?>
<!-- Body starts here -->
    <!-- upper part..which contains information about the exam and time -->
    <?php

    $table_name = "tbl_student";
    $username = $_SESSION['student'];
    $where = "username='$username'";
    $result = $obj->execute_query($conn, $obj->select_data($table_name, $where));
    if ($result) {
        $row = $obj->fetch_data($result);
        $student_id = $row['student_id'];
        $full_name = $row['first_name'] . " " . $row['last_name'];
        $_SESSION['exam'] = $row['exam_id'];
        // $faculty = $row['exam_id'];
    }

    //get the questions and questions numbers department wise. 
    $tbl_name_qns = 'tbl_exam join tbl_course on tbl_exam.course_id=tbl_course.id';
    $where_qns = "tbl_exam.exam_id='$_SESSION[exam]'";
    $query_qns = $obj->select_data($tbl_name_qns, $where_qns);
    $res_qns = $obj->execute_query($conn, $query_qns);
    if ($res_qns == true) {
        $row_qns = $obj->fetch_data($res_qns);
        $course_name = $row_qns['course_name'];
        $_SESSION['courseName'] = $course_name;
        $time_duration = $row_qns['time_duration'];
        // $totalTime = $time_duration * 60;
        // $qns_per_page = $row_qns['qns_per_set'];
        // $total_english = $row_qns['total_english'];

        //echo $total_english;die();
    }
    if (!isset($_SESSION['strt_time'])) {
        $_SESSION['strt_time'] = date('h:i:s A');
    }
    if (!isset($_SESSION['end_time'])) {
        $_SESSION['end_time'] = date('h:i:s A', strtotime("+" . $time_duration . " minutes"));
    }

    ?>

        <div id="page-wrapper" class="gray-bg dashbard-1">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">

                    <?php include('topnav.php');  ?>

                </nav>
            </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Dept. Head</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?php echo SITEURL ?>department/index.php?page=dashboard">Home</a>
                        </li>

                    </ol>Examinee: <span class="heavy"><?php echo $full_name; ?></span>&nbsp;&nbsp;
        Course: <span class="heavy"><?php echo $course_name; ?></span>&nbsp;&nbsp;
        Start Time: <span class="heavy"><?php echo $_SESSION['strt_time']; ?></span>&nbsp;&nbsp;
        End Time: <span class="heavy"><?php echo $_SESSION['end_time']; ?></span>&nbsp;&nbsp;
            <?php
        //Getting Time Difference
        $startTime = strtotime($_SESSION['end_time']);
        // $startTime = strtotime(date('h:i:s A', strtotime("+" . $time_duration . " minutes")));
        $currentTime = strtotime(date('h:i:s A'));
        // $currentTime = strtotime(date('h:i:s A'));
        $timeDifference = $startTime - $currentTime;
        ?>
        <span class='badge-warning timer' style="border-radius: 5px;" data-seconds-left=<?php echo $timeDifference; ?>></span>

                </div>
                <div class="col-lg-2">

                </div>
            </div>
     <!-- The question and its answer options -->
    <form method="post" action="">
        <div class="row" id="question">
            <!-- question -->
            <div class="col">
                <?php
                if (!isset($_SESSION['all_qns'])) {
                    $_SESSION['all_qns'] = 0;
                }

                $tbl_name = "tbl_question";
                // if ($_SESSION['next'] == "ON") {
                $where = "is_active='yes' && exam_id='" . $_SESSION['exam'] . "' && question_id NOT IN (" . $_SESSION['all_qns'] . ")";
                // } else {
                //     $where = "is_active='yes' && category='Math' && faculty='" . $faculty . "' && question_id < '" . $_SESSION['question_id'] . "'order by question_id desc";
                // }

                $limit = 1;
                $query = $obj->select_random_row($tbl_name, $where, $limit);
                $res = $obj->execute_query($conn, $query);
                if ($res == true) {
                    $count_rows = $obj->num_rows($res);
                    if ($count_rows > 0) {
                        $row = $obj->fetch_data($res);
                        $_SESSION['question_id'] = $row['question_id'];
                        $question = $row['question'];
                        $first_answer = $row['first_answer'];
                        $second_answer = $row['second_answer'];
                        $third_answer = $row['third_answer'];
                        $fourth_answer = $row['fourth_answer'];
                        $fifth_answer = $row['fifth_answer'];
                        $answer = $row['answer'];
                        $marks = $row['marks'];
                        $image_name = $row['image_name'];
                    } else {
                        //echo "Error";
                        header('location:' . SITEURL . 'student/index.php?page=endSession');
                    }
                }

                ?>
                <!-- question number -->
                <span class='badge badge-primary' style="padding:10px;">Question <font color='yellow' , size=10px;><?php echo $row['question_id'] ?></font></span>
                <!-- the question -->
                <?php echo $question; ?><br />

                <?php
                if ($image_name != "") {
                ?>
                    <img src="<?php echo SITEURL; ?>images/questions/<?php echo $image_name; ?>" alt="Supplementary Image" />
                <?php
                }
                ?>
            </div>
            <!-- answer options -->
            <div class="col-lg-4">
                <input type="radio" name="answer" value="1" required="true" /> <span class="radio-ans"><?php echo $first_answer; ?></span>
                <hr /><br />
                <input type="radio" name="answer" value="2" required="true" /> <span class="radio-ans"><?php echo $second_answer; ?></span>
                <hr /><br />
                <input type="radio" name="answer" value="3" required="true" /> <span class="radio-ans"><?php echo $third_answer; ?></span>
                <hr /><br />
                <input type="radio" name="answer" value="4" required="true" /> <span class="radio-ans"><?php echo $fourth_answer; ?></span>
                <hr /><br />
                <input type="radio" name="answer" value="5" required="true" /> <span class="radio-ans"><?php echo $fifth_answer; ?>
                    <hr /><br />&nbsp;
                    <input type="hidden" name="question_id" id='q_id' value="<?php echo $_SESSION['question_id']; ?>" />
                    <input type="hidden" name="right_answer" value="<?php echo $answer; ?>" />
                    <input type="hidden" name="marks" value="<?php echo $marks; ?>" />
            </div>

        </div>

        <div class="row" style="margin-bottom: 10px">
            <div class="col"><button id="prev" <?php echo $_SESSION['prev_disabled']; ?> name="previous" class="btn btn-lg btn-success btn-rounded" formnovalidate>&laquo; Previous</button></div>
            <div class="col"><button <?php echo $_SESSION['next_disabled']; ?> name="next" class="btn btn-lg btn-success btn-rounded">&nbsp;&nbsp;&nbsp;&nbsp;Next&nbsp; &raquo; </button></div>
            <div class="col">
                <a href="<?php echo SITEURL; ?>index.php?page=logout">
                    <button type="button" class="btn btn-lg btn-danger" onclick="return confirm('Are you sure you want to Quit?')">&nbsp; Quit &nbsp;</button>
                </a>
            </div>
        </div>
    </form>
    <?php
    if (isset($_POST['next'])) {
        #save the values into db and getback to the page....
        $question_id = $_POST['question_id'];

        //Submitting Answers to the database
        if (isset($_POST['answer'])) {
            $user_answer = $obj->sanitize($conn, $_POST['answer']);
        } else {
            $user_answer = 0;
        }
        $right_answer = $obj->sanitize($conn, $_POST['right_answer']);
        $question_id = $obj->sanitize($conn, $_POST['question_id']);
        $username = $_SESSION['student'];
        $marks = $_POST['marks'];
        //Get User ID from username
        $tbl_name = "tbl_student";
        $student_id = $obj->get_userid($tbl_name, $username, $conn);
        $added_date = date('Y-m-d');
        //Now Adding Data to Database
        $tbl_name = "tbl_result";
        $data = "
                                student_id='$student_id',
                                question_id='$question_id',
                                user_answer='$user_answer',
                                right_answer='$right_answer',
                                added_date='$added_date'
                                ";
        //CHeck if the total score is set or not
        if (isset($_SESSION['totalScore'])) {
            $totalScore = $_SESSION['totalScore'];
        } else {
            $totalScore = 0;
        }

        //Check if the full marks is set or not
        if (isset($_SESSION['full_marks'])) {
            $full_marks = $_SESSION['full_marks'];
        } else {
            $full_marks = 0;
        }

        if ($user_answer == $right_answer) {
            $_SESSION['totalScore'] = $totalScore + $marks;
            $_SESSION['full_marks'] = $full_marks + $marks;
        } else {
            $_SESSION['totalScore'] = $totalScore + 0;
            $_SESSION['full_marks'] = $full_marks + $marks;
        }
        $query = $obj->insert_data($tbl_name, $data);
        //$res=true;
        $res = $obj->execute_query($conn, $query);
        if ($res === true) {

            include('pages/timeCheck.php');
            if (isset($_SESSION['all_qns'])) {
                $_SESSION['all_qns'] = $_SESSION['all_qns'] . ',' . $_SESSION['question_id'];
            } else {
                $_SESSION['all_qns'] = 0;
            }
            //Save the answer for result
            if (isset($_SESSION['sn'])) {
                $_SESSION['sn'] = $_SESSION['sn'] + 1;
            } else {
                $_SESSION['sn'] = 1;
            }

            #$_SESSION['qns']=$question_id;
            if ($_SESSION['prev_disabled'] != "") {
                $_SESSION['prev_disabled'] = "";
            }
            if ($_SESSION['next'] != "ON") {
                $_SESSION['next'] = "ON";
            }
            //Redirect to the question page
            header('location:' . SITEURL . 'student/index.php?page=Questions');
        } else {
            echo "Error";
        }
    }
    ?>
            <?php include('includes/scripts2.php') ?>

            <script>
                $(document).ready(function() {
                    setTimeout(function() {
                        toastr.options = {
                            closeButton: true,
                            progressBar: true,
                            showMethod: 'slideDown',
                            timeOut: 4000
                        };

                    }, 1300);


                    var data1 = [
                        [0, 4],
                        [1, 8],
                        [2, 5],
                        [3, 10],
                        [4, 4],
                        [5, 16],
                        [6, 5],
                        [7, 11],
                        [8, 6],
                        [9, 11],
                        [10, 30],
                        [11, 10],
                        [12, 13],
                        [13, 4],
                        [14, 3],
                        [15, 3],
                        [16, 6]
                    ];
                    var data2 = [
                        [0, 1],
                        [1, 0],
                        [2, 2],
                        [3, 0],
                        [4, 1],
                        [5, 3],
                        [6, 1],
                        [7, 5],
                        [8, 2],
                        [9, 3],
                        [10, 2],
                        [11, 1],
                        [12, 0],
                        [13, 2],
                        [14, 8],
                        [15, 0],
                        [16, 0]
                    ];
                    $("#flot-dashboard-chart").length && $.plot($("#flot-dashboard-chart"), [
                        data1, data2
                    ], {
                        series: {
                            lines: {
                                show: false,
                                fill: true
                            },
                            splines: {
                                show: true,
                                tension: 0.4,
                                lineWidth: 1,
                                fill: 0.4
                            },
                            points: {
                                radius: 0,
                                show: true
                            },
                            shadowSize: 2
                        },
                        grid: {
                            hoverable: true,
                            clickable: true,
                            tickColor: "#d5d5d5",
                            borderWidth: 1,
                            color: '#d5d5d5'
                        },
                        colors: ["#1ab394", "#1C84C6"],
                        xaxis: {},
                        yaxis: {
                            ticks: 4
                        },
                        tooltip: false
                    });
                    $('.dataTables-example').DataTable({
                        dom: '<"html5buttons"B>lTfgitp',
                        pageLength: 5,
                        buttons: [{
                                extend: 'copy'
                            },
                            {
                                extend: 'csv'
                            },
                            {
                                extend: 'excel',
                                title: 'ExampleFile'
                            },
                            {
                                extend: 'pdf',
                                title: 'ExampleFile'
                            },

                            {
                                extend: 'print',
                                customize: function(win) {
                                    $(win.document.body).addClass('white-bg');
                                    $(win.document.body).css('font-size', '10px');

                                    $(win.document.body).find('table')
                                        .addClass('compact')
                                        .css('font-size', 'inherit');
                                }
                            }
                        ]

                    });
                    var doughnutData = [{
                            value: 300,
                            color: "#a3e1d4",
                            highlight: "#1ab394",
                            label: "App"
                        },
                        {
                            value: 50,
                            color: "#dedede",
                            highlight: "#1ab394",
                            label: "Software"
                        },
                        {
                            value: 100,
                            color: "#A4CEE8",
                            highlight: "#1ab394",
                            label: "Laptop"
                        }
                    ];

                    var doughnutOptions = {
                        segmentShowStroke: true,
                        segmentStrokeColor: "#fff",
                        segmentStrokeWidth: 2,
                        percentageInnerCutout: 45, // This is 0 for Pie charts
                        animationSteps: 100,
                        animationEasing: "easeOutBounce",
                        animateRotate: true,
                        animateScale: false
                    };

                    var ctx = document.getElementById("doughnutChart").getContext("2d");
                    var DoughnutChart = new Chart(ctx).Doughnut(doughnutData, doughnutOptions);

                    var polarData = [{
                            value: 300,
                            color: "#a3e1d4",
                            highlight: "#1ab394",
                            label: "App"
                        },
                        {
                            value: 140,
                            color: "#dedede",
                            highlight: "#1ab394",
                            label: "Software"
                        },
                        {
                            value: 200,
                            color: "#A4CEE8",
                            highlight: "#1ab394",
                            label: "Laptop"
                        }
                    ];

                    var polarOptions = {
                        scaleShowLabelBackdrop: true,
                        scaleBackdropColor: "rgba(255,255,255,0.75)",
                        scaleBeginAtZero: true,
                        scaleBackdropPaddingY: 1,
                        scaleBackdropPaddingX: 1,
                        scaleShowLine: true,
                        segmentShowStroke: true,
                        segmentStrokeColor: "#fff",
                        segmentStrokeWidth: 2,
                        animationSteps: 100,
                        animationEasing: "easeOutBounce",
                        animateRotate: true,
                        animateScale: false
                    };
                    var ctx = document.getElementById("polarChart").getContext("2d");
                    var Polarchart = new Chart(ctx).PolarArea(polarData, polarOptions);

                });
            </script>
            <script>
                (function(i, s, o, g, r, a, m) {
                    i['GoogleAnalyticsObject'] = r;
                    i[r] = i[r] || function() {
                        (i[r].q = i[r].q || []).push(arguments)
                    }, i[r].l = 1 * new Date();
                    a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                    a.async = 1;
                    a.src = g;
                    m.parentNode.insertBefore(a, m)
                })(window, document, 'script', '../../www.google-analytics.com/analytics.js', 'ga');

                ga('create', 'UA-4625583-2', 'webapplayers.com');
                ga('send', 'pageview');
            </script>
</body>

<!-- Mirrored from webapplayers.com/inspinia_admin-v2.5/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 May 2016 03:55:13 GMT -->

</html>