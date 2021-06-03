<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>DTU Exam | Student | Question </title>

    <link href="<?php echo SITEURL ?>asset2/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo SITEURL ?>asset2/css/TimeCircles.css" rel="stylesheet">
    <link href="<?php echo SITEURL ?>asset2/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo SITEURL ?>asset2/css/plugins/iCheck/custom.css" rel="stylesheet">

    <link href="<?php echo SITEURL ?>asset2/css/animate.css" rel="stylesheet">
    <link href="<?php echo SITEURL ?>asset2/css/style.css" rel="stylesheet">
    <?php
    if (!isset($_SESSION['student'])) {
        header('location:' . SITEURL . 'student/index.php?page=login');
    }

    $remaining_minutes = '';
    $examm_id = '';
    $exam_status = '';
    $exam_date = '';

    $tbl_name = "tbl_exam";
    $where = "exam_id = '" . $_GET['exam_code'] . "'";
    $query = $obj->select_data($tbl_name, $where);
    $res = $obj->execute_query($conn, $query);
    if ($res) {
        $row = $obj->fetch_data($res);
        $exam_star_time  = $row['exam_date'];
        $exam_date  = $row['exam_date'];
        $exam_status = $row['status'];
        $duration = $row['time_duration'] . ' minute';
        $exam_end_time = strtotime($exam_star_time . '+' . $duration);

        $exam_end_time = date('Y-m-d H:i:s', $exam_end_time);
        $remaining_minutes = strtotime($exam_end_time) - time();
        $until_start = strtotime($exam_star_time) - time();
    }
    ?>
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
                    <a class="bg-primary text-white" href="<?php echo SITEURL; ?>student/index.php?page=login">
                        <i class="fa fa-sign-out active"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <?php
    if ($exam_status == 'started') {
    ?>
        <div class="wrapper wrapper-content">
            <div class="animated fadeInRightBig">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="card">
                            <div class="card-header ">Question</div>
                            <div class="card-body">
                                <div id="single_question_area">
                                    <!--The question gets displayed here. -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">

                        <div id="question_navigation_area">
                            <!-- List of all questions appears here. -->
                        </div>
                        <div id="prev_next"></div>
                        <div id="user_details_area"></div>
                        <?php
                        if ($until_start > 0) {
                        ?>
                            <div id="exam_notifier" style="max-width:400px; width: 100%; height: 200px;"><?php echo "<h3>Exam will start in <b>" . round($until_start / 60) . " </b>Minutes</h3>" ?></div>

                        <?php
                        } else {
                        ?>
                            <div id="exam_timer" data-timer="<?php echo $remaining_minutes ?>" style="max-width:400px; width: 100%; height: 200px;">
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } elseif ($exam_status == "completed") {
    ?>

        <div class="middle-box text-center" id="exam_notifier" style=" margin-top: 20px;; max-width:400px; width: 100%; height: 200px;"><?php echo "<h3><font color='red'>Exam time Over!</font></h3> " ?><a class="btn btn-primary btn-rounded text-white" href="<?php echo SITEURL?>student/index.php?page=exams">Exams</a></div>
    <?php  } else {
    ?>
        <div class="middle-box alert alert-danger text-center" id="exam_countdown" style=" margin-top: 20px;; max-width:400px; width: 100%; height: 200px;"></div>
        <script>

        </script>
    <?php } ?>
    </div>
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
<script src="<?php echo SITEURL ?>asset2/js/TimeCircles.js"></script>

<!-- Custom and plugin javascript -->
<script src="<?php echo SITEURL ?>asset2/js/inspinia.js"></script>
<script src="<?php echo SITEURL ?>asset2/js/plugins/pace/pace.min.js"></script>

<!-- iCheck -->
<script src="<?php echo SITEURL ?>asset2/js/plugins/iCheck/icheck.min.js"></script>




<script>
    $(document).ready(function() {
        $("#exam_timer").TimeCircles({
            time: {
                Days: {
                    show: false,
                    color: "#1AB394"
                },
                Hours: {
                    show: true,
                    color: "#1AB394"
                },
                Minutes: {
                    color: "#1AB394"
                },
                Seconds: {
                    color: "#1AB394"
                }
            },

            circle_bg_color: "#FFF",
            // use_background: false

        });

        setInterval(function() {
            var remaining_second = $("#exam_timer").TimeCircles().getTime();
            if (remaining_second < 1) {
                // alert('Exam time over');
                location.reload();
            }
        }, 1000);

        var exam_id = 1; //"<?php // echo $_GET['exam_code']; ex
                            ?>";
        question_navigation();
        load_question();

        function remaining_seconds(exam_id) {
            $.ajax({
                url: "<?php echo SITEURL; ?>student/ajax_student.php",
                type: 'POST',
                cache: false,
                data: {
                    exam_id: exam_id,
                    page: 'time_counter',
                    action: 'fetch'
                },
                success: function(minute) {
                    $('#exam_timer').data("data-timer", minute);
                }

            });
        }
        load_user_details();



        function load_question(question_id = '') {
            $.ajax({
                url: "<?php echo SITEURL; ?>student/ajax_student.php",
                type: 'POST',
                cache: false,
                data: {
                    exam_id: exam_id,
                    question_id: question_id,
                    page: 'load_question',
                    action: 'fetch'
                },
                success: function(data) {
                    var res = JSON.parse(data);
                    if (res.question_id != "") {
                        $('#single_question_area').html(res.question);
                    } else {
                        $('#single_question_area').html("<font color='red'><b>No Question exists for this examination.</b></font>");
                    }
                    $('#prev_next').html(res.nav);
                    $('#question_navigation_area .btn').removeClass("active");
                    $('#question_navigation_area #' + res.question_id).addClass("active");
                    $('#single_question_area').iCheck({
                        checkboxClass: 'icheckbox_square-green',
                        radioClass: 'iradio_square-green',
                    });
                },
                error: function(response) {
                    $('#single_question_area').html(response.responseText);
                }
            })
        }

        function question_navigation() {
            $.ajax({
                url: "<?php echo SITEURL; ?>student/ajax_student.php",
                type: "POST",
                data: {
                    exam_id: 1,
                    page: 'navigation',
                    action: 'fetch'
                },
                success: function(data) {
                    $('#question_navigation_area').html(data);
                }
            })
        }

        function load_user_details() {
            $.ajax({
                url: "<?php echo SITEURL ?>student/ajax_student.php",
                method: "POST",
                data: {
                    page: 'user_detail',
                    action: 'fetch'
                },
                success: function(data) {
                    $('#user_details_area').html(data);
                }
            })
        }

        function countdown_timer() {
            var countDownDate = new Date('<?php echo $exam_date; ?>').getTime();
            var x = setInterval(function() {
                // alert(<>);
                // Get today's date and time
                var now = new Date().getTime();

                // Find the distance between now and the count down date
                var distance = countDownDate - now;
                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Display the result in the element with id="demo"
                document.getElementById("exam_countdown").innerHTML = "<h3>Exam will start after<br>" + days + " days : " + hours + " hours : " +
                    minutes + " minutes : " + seconds + " seconds </h3>";

                // If the count down is finished, write some text
                if (distance < 0) {
                    clearInterval(x);
                   location.reload();
                }
            }, 1000);
        }
        countdown_timer();
        $(document).on('click', '.next', function() {
            var question_id = $(this).attr('id');
            // $('#' + question_id).toggleClass('active');
            load_question(question_id);
        });
        $(document).on('click', '.previous', function() {
            var question_id = $(this).attr('id');
            load_question(question_id);
        });

        $(document).on('click', '.question_navigation', function() {
            var question_id = $(this).data('question_id');
            load_question(question_id);
        });
    });
</script>

</html>