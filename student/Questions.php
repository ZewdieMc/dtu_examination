<?php
// include_once('../config/apply.php');

?>
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
                    <a class="bg-primary text-white" href="login.html">
                        <i class="fa fa-sign-out active"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="wrapper wrapper-content">
        <div class="animated fadeInRightBig">
            <div class="row">
                <div class="col-sm-8">
                    <div class="card">
                        <div class="card-header ">Question navigation area</div>
                        <div class="card-body">
                            <div id="single_question_area">
                                <p>some information here.</p>
                                <p>some information here.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">

                    <div id="question_navigation_area">

                    </div>
                    <div id="next_prev"></div>
                    <div id="exam_timer" data-timer="<?php echo 180 * 60 ?>" style="max-width:400px; width: 100%; height: 200px;"></div>

                </div>
            </div>
        </div>
    </div>

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
                alert('Exam time over');
                // location.reload();
            }
        }, 1000);

        var exam_id = 1; //"<?php // echo $_GET['exam_code']; 
                            ?>";
        question_navigation();
        load_question();

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
                    var prev = question_id - 1;
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