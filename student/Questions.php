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
    <link href="<?php echo SITEURL ?>asset2/css/plugins/toastr/toastr.min.css" rel="stylesheet">

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

    $tbl_name = "tbl_exam join tbl_course on tbl_exam.course_id=tbl_course.course_id";
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
        $_SESSION['exam_cocurse_name'] = $row['course_name'];
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
                    <a class="bg-primary text-white " href="<?php echo SITEURL; ?>student/index.php?page=logout">
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
                            <div class="card-header "><b>Question</b></div>
                            <div class="card-body">
                                <div><button class="btn btn-outline btn-rounded btn-primary" id="full_screen">Full Screen</button></div>
                                <div id="single_question_area">
                                    <!--The question gets displayed here. -->
                                </div>
                            </div>
                            <div class="card-footer"></div>
                        </div>
                    </div>
                    <div class="col-sm-4">

                        <div id="question_navigation_area">
                            <!-- List of all questions appears here. -->
                        </div>
                        <div id="prev_next"></div>
                        <div id="user_details_area"></div>
                        <div id="exam_timer" data-timer="<?php echo $remaining_minutes ?>" style="max-width:400px; width: 100%; height: 200px;">
                        </div>
                        <script>
                            setInterval(function() {
                                var remaining_second = $("#exam_timer").TimeCircles().getTime();
                                if (remaining_second < 1) {
                                    location.reload();
                                }
                            }, 1000);
                        </script>

                    </div>
                </div>
            </div>
        </div>
    <?php } elseif ($exam_status == "completed") {
    ?>

        <div class="middle-box text-center" id="exam_notifier" style=" margin-top: 20px;; max-width:400px; width: 100%; height: 200px;"><?php echo "<h3><font color='red'>Exam time Over!</font></h3> " ?><a class="btn btn-primary btn-rounded text-white" href="<?php echo SITEURL ?>student/index.php?page=exams">Click here to see result</a></div>
    <?php  } else {
    ?>
        <div class="middle-box alert alert-success text-center" id="exam_countdown" style=" margin-top: 20px;; max-width:400px; width: 100%; height: 200px;"></div>
        <script>
            var countDownDate = new Date('<?php echo $exam_date; ?>').getTime();
            var x = setInterval(function() {
                var now = new Date().getTime();

                var distance = countDownDate - now;
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // hours = hours < 10 ? "0" + hours : hours;
                // days = days < 10 ? "0" + days : days;
                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;
                // if (distance >= 0)
                document.getElementById("exam_countdown").innerHTML = "<h3>Exam will start after<br>" + days + " days : " + hours + " hours : " +
                    minutes + " minutes : " + seconds + " seconds </h3>";

                if (distance < 0) {
                    clearInterval(x);
                    location.reload();
                }
            }, 1000);
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
<script src="<?php echo SITEURL ?>asset2/js/plugins/toastr/toastr.min.js"></script>
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


        // toggleFullScreen();
        // fullScreenListener();
        question_navigation();
        load_question();

        $(document).on('click', '#full_screen', function name(params) {
            toggleFullScreen();
        });
        //disable exitFullScreen
        $(document).on("keydown", function(ev) {
            console.log(ev.keyCode);
            if (ev.keyCode === 18 || ev.keyCode === 122) return false
        })

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


        function toggleFullScreen() {
            if (!document.fullscreenElement && // alternative standard method
                !document.mozFullScreenElement && !document.webkitFullscreenElement && !document.msFullscreenElement) { // current working methods
                if (document.documentElement.requestFullscreen) {
                    document.documentElement.requestFullscreen();
                } else if (document.documentElement.msRequestFullscreen) {
                    document.documentElement.msRequestFullscreen();
                } else if (document.documentElement.mozRequestFullScreen) {
                    document.documentElement.mozRequestFullScreen();
                } else if (document.documentElement.webkitRequestFullscreen) {
                    document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
                }
            } else {
                if (document.exitFullscreen) {
                    document.exitFullscreen();
                } else if (document.msExitFullscreen) {
                    document.msExitFullscreen();
                } else if (document.mozCancelFullScreen) {
                    document.mozCancelFullScreen();
                } else if (document.webkitExitFullscreen) {
                    document.webkitExitFullscreen();
                }
            }
        }

        function fullScreenListener() {
            document.addEventListener('fullscreenchange', (event) => {

                if (document.fullscreenElement) {
                    console.log(`Element: ${document.fullscreenElement.id} entered full-screen mode.`);
                } else {
                    console.log('Leaving full-screen mode.');
                }
            });
        }

        function load_question(question_id = '') {
            $.ajax({
                url: "<?php echo SITEURL; ?>student/ajax_student.php",
                type: 'POST',
                cache: false,
                data: {
                    exam_id: "<?php echo $_GET['exam_code'] ?>",
                    question_id: question_id,
                    page: 'load_question',
                    action: 'fetch'
                },
                success: function(data) {
                    var res = JSON.parse(data);
                    if (res.question_id != "") {
                        $('#single_question_area').html(res.question);
                    }
                    else if(res.question_id==0){
                        $('#single_question_area').html("<font color='red'><b>No more question in this direction.</b></font>");
                 
                    }
                     else {
                        $('#single_question_area').html("<font color='red'><b>No Question exists for this examination.</b></font>");
                    }
                    $('#prev_next').html(res.nav);
                    $('#question_navigation_area .btn').removeClass("active");
                    if ($('#question_navigation_area #' + res.question_id).hasClass('btn-danger'))
                        $('#question_navigation_area #' + res.question_id).removeClass('btn-danger');
                    $('#question_navigation_area #' + res.question_id).addClass(res.class);
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
                    exam_id: "<?php echo $_GET['exam_code'] ?>",
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
                    exam_id: "<?php echo $_GET['exam_code'] ?>",
                    page: 'user_detail',
                    action: 'fetch'
                },
                success: function(data) {
                    $('#user_details_area').html(data);
                }
            })
        }

        function countdown_timer() {

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
            if ($('#question_navigation_area #' + question_id).hasClass('btn-danger')) {
                $('#question_navigation_area #' + question_id).removeClass("btn-danger");
                $('#question_navigation_area #' + question_id).addClass("btn-warning");
            }
            load_question(question_id);
        });
        $(document).on('ifClicked', '.answer_option', function() {
            var exam_id = "<?php echo $_GET['exam_code'] ?>";
            var question_id = $(this).data('question_id');
            var user_answer = $(this).val();
            var right_answer = $('#right_answer').val();
            var marks = $('#marks').val();
            $.ajax({
                url: "<?php echo SITEURL ?>student/ajax_student.php",
                method: "POST",
                dataType: 'json',
                data: {
                    exam_id: exam_id,
                    question_id: question_id,
                    user_answer: user_answer,
                    right_answer: right_answer,
                    marks: marks,
                    page: 'answer_option',
                    action: 'Add'
                },
                success: function(data) {
                    toastr.options = {
                        'closeButton': true,
                        'debug': false,
                        "timeOut": "3000",
                        'positionClass': 'toast-bottom-left'
                    }
                    if (data.success == 'insert')
                        toastr.success('Your answer is saved!.');
                    else
                        toastr.warning("You updated your answer!");
                    if ($('#question_navigation_area #' + question_id).hasClass('btn-warning')) {
                        $('#question_navigation_area #' + question_id).removeClass('btn-warning');
                    }
                    $('#question_navigation_area #' + question_id).addClass(data.class);


                }
            })
        });



    });
</script>

</html>