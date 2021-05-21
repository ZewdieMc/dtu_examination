<!--ADDING CKEDITOR HERE-->
<script src="<?php echo SITEURL; ?>/assets/ckeditor/ckeditor.js"></script>

<!DOCTYPE html>
<html>



<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>DTU Exam | Teacher</title>
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
                                    <h5>Wizard with Validation</h5>
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
                                    <h2>
                                        Validation Wizard Form
                                    </h2>
                                    <p>
                                        This example show how to use Steps with jQuery Validation plugin.
                                    </p>

                                    <form id="form" method="POST" action="#" class="wizard-big">
                                        <h1>Profile</h1>
                                        <fieldset>
                                            <h2>Profile Information</h2>


                                            <label>Address *</label>
                                            <textarea name="question" placeholder="Add Your Question" required="true"></textarea>
                                        </fieldset>
                                        <h1>Account</h1>
                                        <fieldset>
                                            <h2>Account Information</h2>
                                            <div class="row">
                                                <div class="col-lg-12">

                                                    <div class="form-group">
                                                        <span class="name">Image</span>
                                                        <!-- <input type="file" class="form-control" name="image" /><br /> -->
                                                        <div class="custom-file">
                                                            <input id="logo" type="file" name="image" class="custom-file-input">
                                                            <label for="logo" class="custom-file-label">Choose file...</label>
                                                        </div>
                                                        <span class="name">First Answer(*)</span>
                                                        <input type="text" name="first_answer" class="form-control" placeholder="First Answer" required="true" /><br />

                                                        <span class="name">Second Answer</span>
                                                        <input type="text" name="second_answer" class="form-control" placeholder="Second Answer" required="true" /><br />

                                                        <span class="name">Third Answer</span>
                                                        <input type="text" name="third_answer" class="form-control" placeholder="Third Answer" required="true" /><br />

                                                        <span class="name">Fourth Answer</span>
                                                        <input type="text" name="fourth_answer" class="form-control" placeholder="Fourth Answer" required="true" /><br />

                                                        <span class="name">Fifth Answer</span>
                                                        <input type="text" name="fifth_answer" class="form-control" placeholder="Fifth Answer" required="true" /><br />

                                                        <span class="name">Answer</span>
                                                        <select name="answer" class="form-control select2_answer" required="true" style="width: 100%;">
                                                            <option value=""></option>
                                                            <option value="1">First Answer</option>
                                                            <option value="2">Second Answer</option>
                                                            <option value="3">Third Answer</option>
                                                            <option value="4">Fourth Answer</option>
                                                            <option value="5">Fifth Answer</option>
                                                        </select>
                                                        <span class="name">Marks</span>
                                                        <input type="number" name="marks" class="form-control" required="true" placeholder="Marks for this question" />
                                                        <br />
                                                    </div>
                                                </div>

                                            </div>

                                        </fieldset>

                                        <h1>Reason</h1>
                                        <fieldset>

                                            <label>Address *</label>
                                            <textarea name="reason" placeholder="Add Your Question" required="true"></textarea>
                                        </fieldset>

                                        <h1>Finish</h1>
                                        <fieldset>
                                            <h2>Terms and Conditions</h2>
                                            <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required"> <label for="acceptTerms">I agree with the Terms and Conditions.</label>
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
    }
</style>
<script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip({});
        // $(".select2_answer").select2({
        // });


        $("#form").steps({
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

                // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                if (currentIndex === 2 && priorIndex === 3) {
                    $(this).steps("previous");
                }
            },
            onFinishing: function(event, currentIndex) {
                var form = $(this);

                // Disable validation on fields that are disabled.
                // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                form.validate().settings.ignore = ":disabled";

                // Start validation; Prevent form submission if false
                return form.valid();
            },
            onFinished: function(event, currentIndex) {
                var form = $(this);

                // Submit form input send ajax
                form.submit();
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

        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
        CKEDITOR.replace('question');
        CKEDITOR.replace('reason');
    });
</script>

</html>