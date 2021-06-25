<!--ADDING CKEDITOR HERE-->
<!-- <script src="<?php echo SITEURL; ?>/asset2/ckeditor5/ckeditor.js"></script> -->
<script src="<?php echo SITEURL; ?>/assets/ckeditor/ckeditor.js"></script>

<!DOCTYPE html>
<html>



<head>
    <link rel="shortcut icon" href="<?php echo SITEURL ?>images/logo.jpg" />

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>DTU Exam | Teacher | Add question</title>
    <link href="<?php echo SITEURL ?>asset2/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo SITEURL ?>asset2/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo SITEURL ?>asset2/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="<?php echo SITEURL ?>asset2/css/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">
    <link href="<?php echo SITEURL ?>asset2/css/plugins/colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet">
    <link href="<?php echo SITEURL ?>asset2/css/plugins/cropper/cropper.min.css" rel="stylesheet">
    <link href="<?php echo SITEURL ?>asset2/css/plugins/switchery/switchery.css" rel="stylesheet">
    <link href="<?php echo SITEURL ?>asset2/css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo SITEURL ?>asset2/css/plugins/nouslider/jquery.nouislider.css" rel="stylesheet">
    <link href="<?php echo SITEURL ?>asset2/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <link href="<?php echo SITEURL ?>asset2/css/plugins/ionRangeSlider/ion.rangeSlider.css" rel="stylesheet">
    <link href="<?php echo SITEURL ?>asset2/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
    <link href="<?php echo SITEURL ?>asset2/css/plugins/clockpicker/clockpicker.css" rel="stylesheet">
    <link href="<?php echo SITEURL ?>asset2/css/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet">
    <link href="<?php echo SITEURL ?>asset2/css/plugins/select2/select2.min.css" rel="stylesheet">
    <link href="<?php echo SITEURL ?>asset2/css/plugins/select2/select2-bootstrap4.min.css" rel="stylesheet">
    <link href="<?php echo SITEURL ?>asset2/css/plugins/touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet">
    <link href="<?php echo SITEURL ?>asset2/css/plugins/dualListbox/bootstrap-duallistbox.min.css" rel="stylesheet">
    <link href="<?php echo SITEURL ?>asset2/css/plugins/steps/jquery.steps.css" rel="stylesheet">
    <link href="<?php echo SITEURL ?>asset2/css/animate.css" rel="stylesheet">
    <link href="<?php echo SITEURL ?>asset2/css/style.css" rel="stylesheet">


</head>

<body class="md-skin pace-done">

    <div id="wrapper">
        <?php include('sidenav.php'); ?>


        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                        <form role="search" class="navbar-form-custom" action="#">
                            <div class="form-group">
                                <input type="text" placeholder="<?php echo $_SESSION['full_name'] ?>" class="form-control" name="top-search" id="top-search">
                            </div>
                        </form>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="label label-info"> <?php echo $_SESSION['full_name'] ?></span>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-envelope"></i> <span class="label label-warning">3</span>
                            </a>
                            <ul class="dropdown-menu dropdown-messages">
                                <li>
                                    <div class="dropdown-messages-box">
                                        <a class="dropdown-item float-left" href="profile.html">
                                            <img alt="image" class="rounded-circle" src="<?php echo SITEURL; ?>images/logo.jpg">
                                        </a>
                                        <div class="media-body">
                                            <small class="float-right">46h ago</small>
                                            <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                            <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <div class="dropdown-messages-box">
                                        <a class="dropdown-item float-left" href="profile.html">
                                            <img alt="image" class="rounded-circle" src="<?php echo SITEURL; ?>images/logo.jpg">
                                        </a>
                                        <div class="media-body ">
                                            <small class="float-right text-navy">5h ago</small>
                                            <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                            <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <div class="dropdown-messages-box">
                                        <a class="dropdown-item float-left" href="profile.html">
                                            <img alt="image" class="rounded-circle" src="<?php echo SITEURL; ?>images/logo.jpg">
                                        </a>
                                        <div class="media-body ">
                                            <small class="float-right">23h ago</small>
                                            <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                            <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <div class="text-center link-block">
                                        <a href="mailbox.html" class="dropdown-item">
                                            <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-bell"></i> <span class="label label-danger">8</span>
                            </a>
                            <ul class="dropdown-menu dropdown-alerts">
                                <li>
                                    <a href="mailbox.html" class="dropdown-item">
                                        <div>
                                            <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                            <span class="float-right text-muted small">4 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <a href="profile.html" class="dropdown-item">
                                        <div>
                                            <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                            <span class="float-right text-muted small">12 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <a href="grid_options.html" class="dropdown-item">
                                        <div>
                                            <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                            <span class="float-right text-muted small">4 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <div class="text-center link-block">
                                        <a href="notifications.html" class="dropdown-item">
                                            <strong>See All notifications</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>


                        <li>
                            <a href="<?php echo SITEURL ?>teacher/index.php?page=logout">
                                <i class="fa fa-sign-out"></i> Log out
                            </a>
                        </li>
                    </ul>

                </nav>
            </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h4><span class="label label-info"> <?php echo $_SESSION['dept_name']; ?></span></h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo SITEURL; ?>teacher/index.php?page=dashboard">Home</a>
                        </li>

                    </ol>
                </div>
                <div class="col-sm-8">
                    <div class="title-action">
                        <a href="#" class="btn btn-outline btn-rounded btn-primary">Check Invigilation</a>
                    </div>
                </div>
            </div>

            <div class="wrapper wrapper-content">
                <div class=" animated fadeInRightBig">


                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox">
                                <div class="ibox-title">
                                    <?php
                                    $tbl_name = "tbl_exam join tbl_course on tbl_exam.course_id=tbl_course.course_id";
                                    $where = "exam_id = '" . $_GET['exam_code'] . "'";
                                    $query = $obj->select_data($tbl_name, $where);
                                    $res = $obj->execute_query($conn, $query);
                                    $row = $obj->fetch_data($res);
                                    ?>
                                    <h5><?php echo $row['course_name'] ?></h5>
                                    <hr>

                                    <div class="ibox-tools">
                                        <a class="collapse-link">
                                            <i class="fa fa-chevron-up"></i>
                                        </a>
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                            <i class="fa fa-wrench"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-user">
                                            <li><a href="#" class="dropdown-item">Config option 1</a>
                                            </li>
                                            <li><a href="#" class="dropdown-item">Config option 2</a>
                                            </li>
                                        </ul>
                                        <a class="close-link">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="ibox-content">
                                    <h4>
                                        Add Question Here
                                    </h4>
                                    <p>
                                        Carefully fill each fields
                                        <br>
                                        <button class="btn btn-primary btn-md btn-outline btn-rounded float-right" id="new_questionn"><i class="fa fa-plus"></i> Question</button>
                                        <br>
                                        <small>Question Lists</small><br>
                                    <div id="questions_list">
                                        <?php
                                        $tbl_name = "tbl_question";
                                        $where = "exam_id = '" . $_GET['exam_code'] . "'";
                                        $query = $obj->select_data($tbl_name, $where);
                                        $res = $obj->execute_query($conn, $query);
                                        $counter  = 0;
                                        while ($row = $obj->fetch_data($res)) {
                                            $counter++; ?>
                                            <button class="btn btn-primary btn-circle btn-outline btn-sm edit-question" id='question-<?php echo $row['question_id'] ?>' data-question_id="<?php echo $row['question_id'] ?>"> <?php echo $counter; ?></button>&nbsp;
                                        <?php
                                        }
                                        $counter = 0;
                                        ?>
                                    </div>
                                    </p>

                                    <form id="choice_form" method="POST" action="#" class="wizard-big" enctype="multipart/form-data">
                                        <h1>Question</h1>
                                        <fieldset>
                                            <h4>Write the Question in the editor</h4>

                                            <textarea id="question" placeholder="Add Your Question" required="true"></textarea>
                                        </fieldset>
                                        <h1>Choices</h1>
                                        <fieldset>
                                            <h4>Add Multiple Choice options</h4>
                                            <div class="row">
                                                <div class="col-lg-6">

                                                    <div class="form-group">
                                                        <spans>Image</span>
                                                            <!-- <input type="file" class="form-control" name="image" /><br /> -->
                                                            <div class="custom-file">
                                                                <input id="logo" type="file" name="question_image" class="custom-file-input form-control">
                                                                <label for="logo" class="custom-file-label">Choose file...</label>
                                                            </div>
                                                            <span class="name">First Answer</span>
                                                            <input type="text" name="first_answer" id="first_answer" class="form-control" placeholder="First Answer" required="true" /><br />

                                                            <span class="name">Second Answer</span>
                                                            <input type="text" name="second_answer" id="second_answer" class=" form-control" placeholder="Second Answer" required="true" /><br />

                                                            <span class="name">Third Answer</span>
                                                            <input type="text" name="third_answer" id="third_answer" class="form-control" placeholder="Third Answer" required="true" /><br />

                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <span class="name">Fourth Answer</span>
                                                        <input type="text" name="fourth_answer" id="fourth_answer" class="form-control" placeholder="Fourth Answer" required="true" /><br />

                                                        <span class="name">Fifth Answer</span>
                                                        <input type="text" name="fifth_answer" id="fifth_answer" class="form-control" placeholder="Fifth Answer" /><br />


                                                        <span class="name">Answer</span>
                                                        <select name="answer" class="form-control select2_answer" id="right_answer" required="true" style="width: 100%;">
                                                            <option value=""></option>
                                                            <option value="1">First Answer</option>
                                                            <option value="2">Second Answer</option>
                                                            <option value="3">Third Answer</option>
                                                            <option value="4">Fourth Answer</option>
                                                            <option value="5">Fifth Answer</option>
                                                        </select>
                                                        <span class="name">Marks</span>
                                                        <input type="number" name="marks" id="marks" class="form-control" required="true" placeholder="Marks for this question" />
                                                        <input type="hidden" name="exam_id" id="exam_id" value="<?php echo $_GET['exam_code'] ?>" />
                                                        <input type="hidden" name="page" value="question" />
                                                        <input type="hidden" name="question_id" id='question_id' value="" />
                                                        <input type="hidden" name="action" id="action" value="Add" />
                                                        <br />
                                                    </div>
                                                </div>

                                            </div>

                                        </fieldset>

                                        <h1>Reason</h1>
                                        <fieldset>

                                            <h4>Add Description of the answer here</h4>
                                            <textarea id="reason" placeholder="Add Your Question" required="true"></textarea>
                                        </fieldset>

                                        <h1>Finish</h1>
                                        <fieldset>
                                            <h4>Question</h4>
                                            <span id="ques"></span>
                                            <hr>
                                            <h4>Multiple Choice Options</h4>
                                            <div class=" review_question row" style="margin-left: 10px;">
                                                <div class="i-checks col-lg-6"><input type="radio" name="options" class=" radio">&nbsp;<span id="option1"></span></div>
                                                <hr>
                                                <div class="i-checks col-lg-6"><input type="radio" name="options" class=" radio">&nbsp;<span id="option2"></span></div>
                                                <hr>
                                                <div class="i-checks col-lg-6"><input type="radio" name="options" class=" radio">&nbsp;<span id="option3"></span></div>
                                                <hr>
                                                <div class="i-checks col-lg-6"><input type="radio" name="options" class=" radio">&nbsp;<span id="option4"></span></div>
                                                <hr>
                                                <div class="i-checks col-lg-6"><input type="radio" name="options" class=" radio">&nbsp;<span id="option5"></span></div>
                                                <hr>
                                            </div>

                                            <h4>Answer Description</h4>
                                            <span id="desc"></span>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="footer">
                <div class="float-right">
                    Home
                </div>
                <div>
                    <strong>Copyright</strong> DTU &copy; <?php echo date("Y") ?>
                </div>
            </div>

        </div>
    </div>

    <?php include("includes/scripts3.php") ?>
    <!-- Steps -->
    <script src="<?php echo SITEURL ?>asset2/js/plugins/steps/jquery.steps.js"></script>

    <!-- Jquery Validate -->
    <script src="<?php echo SITEURL ?>asset2/js/plugins/validate/jquery.validate.min.js"></script>
</body>

<style>
    .wizard>.content>.body {
        float: left;
        width: 97%;
        /* height: auto; */

    }

    .wizard>.content {
        /* background: #eee;s */
        display: block;
        margin: 0.5em;

        /*min-height: 35em;*/

        overflow: hidden;
        position: relative;
        /* width: 100%; */
        border-radius: 5px;
    }

    fieldset {
        min-width: 0;
        padding: 0;
        margin: 10px;
        margin-bottom: 30px;
        border: 0;
    }
</style>
<script>
    $(document).ready(function() {
        $('#question-<?php echo $_GET['question_id'] ?>').addClass('active');
        $('#question-<?php echo $_GET['question_id'] ?>').trigger('click');
        $("#choice_form").steps({
            bodyTag: "fieldset",
            onStepChanging: function(event, currentIndex, newIndex) {
                // Always allow going backward even if the current step contains invalid fields!
                if (currentIndex > newIndex) {
                    return true;
                }

                // Forbid suppressing "Warning" step if the user is to young
                if (newIndex === 3 && Number($("#age").val()) < 18) {
                    return false;
                }

                var form = $(this);

                // Clean up if user went backward before
                if (currentIndex < newIndex) {
                    // To remove error styles
                    $(".body:eq(" + newIndex + ") label.error", form).remove();
                    $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                }

                // Disable validation on fields that are disabled or hidden.
                form.validate().settings.ignore = ":disabled,:hidden";

                // Start validation; Prevent going forward if false
                return form.valid();
            },
            onStepChanged: function(event, currentIndex, priorIndex) {
                // Suppress (skip) "Warning" step if the user is old enough.
                if (currentIndex === 2 && Number($("#age").val()) >= 18) {
                    $(this).steps("next");
                }
                if (currentIndex == 3) {
                    document.getElementById("option1").innerHTML = $('#first_answer').val();
                    document.getElementById("option2").innerHTML = $('#second_answer').val();
                    document.getElementById("option3").innerHTML = $('#third_answer').val();
                    document.getElementById("option4").innerHTML = $('#fourth_answer').val();
                    document.getElementById("option5").innerHTML = $('#fifth_answer').val();
                    document.getElementById("ques").innerHTML = CKEDITOR.instances['question'].getData();
                    document.getElementById("desc").innerHTML = CKEDITOR.instances['reason'].getData()
                }
                $('.review_question').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
                // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                if (currentIndex === 2 && priorIndex === 3) {
                    $(this).steps("previous");
                }

            },
            onFinishing: function(event, currentIndex) {
                var form = $(this);
                form.validate().settings.ignore = ":disabled";

                // Start validation; Prevent form submission if false
                return form.valid();
            },
            onFinished: function(event, currentIndex) {
                var form = $(this);

                // Submit form input send ajax
                // form.submit();
                var data = new FormData(this);
                data.append('question', CKEDITOR.instances['question'].getData());
                data.append('reason', CKEDITOR.instances['reason'].getData());

                $.ajax({
                    url: "<?php echo SITEURL; ?>teacher/ajax_teacher.php",
                    data: data,
                    type: 'POST',
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function() {},
                    complete: function(response, status) {
                        if (status != "error" && status != "timeout") {
                            // update the question lists here.
                            $('#questions_list').html(response.responseText);
                            // alert("questions list updated");
                        }
                    },
                    error: function(responseObj) {
                        alert("Something went wrong while processing your request.\n\nError => " +
                            responseObj.responseText);
                    }
                });
            }
        }).validate({
            errorPlacement: function(error, element) {
                element.before(error);
            },
            rules: {
                confirm: {
                    equalTo: "#password"
                }
            }
        });
        $(".select2_answer").select2({
            theme: 'bootstrap4',
            placeholder: "Select a right Answer",
            allowClear: true,
        });

        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
        $(document).on('click', '#new_questionn', function() {
            location.reload();
        });
        $(document).on('click', '.edit-question', function() {
            var question_id = $(this).data('question_id');
            // alert(question_id);
            $.ajax({
                url: "<?php echo SITEURL; ?>teacher/ajax_teacher.php",
                method: "POST",
                data: {
                    page: "question",
                    action: "edit_fetch",
                    question_id: question_id
                },
                dataType: "json",
                success: function(data) {
                    $('#question_id').val(question_id);
                    CKEDITOR.instances['question'].setData(data.question)
                    $('#action').val("update");
                    $('#first_answer').val(data.first_answer);
                    $('#second_answer').val(data.second_answer);
                    $('#second_answer').val(data.second_answer);
                    $('#third_answer').val(data.third_answer);
                    $('#fourth_answer').val(data.fourth_answer);
                    $('#fifth_answer').val(data.fifth_answer);
                    $('#marks').attr('value', data.marks);
                    $("#right_answer").val(data.answer);
                    $('#right_answer').select2({
                        theme: 'bootstrap4'
                    }).trigger('change');
                    CKEDITOR.instances['reason'].setData(data.reason)

                },
                error: function(responseObj) {
                    alert("Something went wrong while processing your request.\n\nError => " +
                        responseObj.responseText);
                }
            });
            //send an ajax request to bring all the question details and place them in the question area.
        });


        CKEDITOR.replace('question');
        CKEDITOR.replace('reason');

        // ClassicEditor
        //     .create(document.querySelector('#question'))
        //     .catch(error => {
        //         console.error(error);
        //     });

    });
</script>

</html>