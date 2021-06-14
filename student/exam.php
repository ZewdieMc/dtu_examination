<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" HREF="<?php SITEURL ?>images/logo.jpg" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>DTU Exam | Student | Exams</title>
    <?php include('./includes/css3.php') ?>
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
                            <a href="<?php echo SITEURL ?>student/index.php?page=logout">
                                <i class="fa fa-sign-out"></i> Log out
                            </a>
                        </li>
                    </ul>

                </nav>
            </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">

                    <h4><span class="label label-info"><?php echo $_SESSION['dept_name'] ?></span></h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo SITEURL; ?>student/index.php?page=dashboard">Home</a>
                        </li>
                        <li class="breadcrumb-item active">
                            Exams
                        </li>

                    </ol>
                </div>
                <div class="col-sm-8">
                    <div class="title-action">
                        <a href="#" class="btn btn-outline btn-rounded btn-primary">Check Invigilation</a>
                    </div>
                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">

                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        <i class="fa fa-wrench"></i>
                                    </a>

                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">

                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover dataTables-example">
                                        <thead>
                                            <tr>
                                                <!-- <th>Exam Code</th> -->
                                                <th>Course Name</th>
                                                <!-- <th>Invigilator</th> -->
                                                <th>Total Questions</th>
                                                <th>Status</th>
                                                <th>Total Time</th>
                                                <th>Exam Date</th>
                                                <th>Study Year</th>
                                                <th>Result</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tfoot>
                                            <tr>
                                                <!-- <th>Exam Code</th> -->
                                                <th>Course Name</th>
                                                <!-- <th>Invigilator</th> -->
                                                <th>Total Questions</th>
                                                <th>Status</th>
                                                <th>Total Time</th>
                                                <th>Exam Date</th>
                                                <th>Study Year</th>
                                                <th>Result</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="modal inmodal fade" id="result_modal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h1 class="modal-title"><i class="fa fa-check-circle fa-lg" style="color: green;"></i></h1>
                        </div>
                        <div class="modal-body">
                            <h3>
                                <div id="course_name" class="alert alert-info"></div><br>
                                <div>
                                    <canvas id="myChart" ></canvas>
                                </div>
                            </h3>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                            <a id="detailed_result" data-exam-id-detail="" class="btn  btn-rounded btn-primary text-white">See Detailed Result</a>
                            <!-- this button has to be changed to anchor and the href should include exam_id and student_id -->
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>


    <div class="middle-box text-center loginscreen animated fadeInDown" style="width:300px;">

    </div>
    <?php include("./includes/scripts3.php") ?>


    <!-- Page-Level Scripts -->
    <script>
        $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-white btn-sm';
        $(document).ready(function() {
            $("body").tooltip({
                selector: '[data-toggle=tooltip]'
            });

            $('.dataTables-example').DataTable({
                "processing": true,
                "serverSide": true,
                "order": [],
                responsive: true,
                "ajax": {
                    url: "<?php echo SITEURL; ?>student/ajax_student.php",
                    type: "POST",
                    data: {
                        action: 'fetch',
                        page: 'exam'
                    }
                },
                dom: '<"html5buttons"B>lTfgitp',
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

            $(document).on('click', '#view_result', function() {
                var exam_id = $(this).data('exam-id');
                var student_id = '<?php echo $_SESSION['student_id']; ?>';
                $.ajax({
                    url: "<?php echo SITEURL ?>student/ajax_student.php",
                    method: "POST",
                    dataType: 'json',
                    data: {
                        exam_id: exam_id,
                        page: 'student_result',
                        action: 'fetch'
                    },
                    success: function(data) {
                        var ctx = $('#myChart');
                        var unattempted = parseInt(data.ques_total) - parseInt(data.ques_attempted);
                        var data_chart = {
                            labels: [
                                'Attempted Qns',
                                'Total Qns',
                                'Unattempted Qns'
                            ],
                            datasets: [{
                                label: 'My First Dataset',
                                data: [data.ques_attempted, data.ques_total, unattempted],
                                backgroundColor: [
                                    '#1bb394',
                                    '#727d7b',
                                    '#bd527f'
                                ],
                                hoverOffset: 4
                            }]
                        };

                        var myChart = new Chart(ctx, {
                            type: 'doughnut',
                            data: data_chart

                        });
                        $('#course_name').html( data.course+"<hr>You Scored "+data.score + " out of " + data.weight);
                        $('#detailed_result').data('exam-id-detail', exam_id);

                        $('#result_modal').modal('show');
                    }
                })
            });
            $(document).on('click', '#detailed_result', function(params) {
                var exam_id = $(this).data('exam-id-detail');
                location.href = "<?php echo SITEURL ?>student/index.php?page=result_detail&exam_id=" + exam_id;
            })
        });
    </script>

</body>

</html>