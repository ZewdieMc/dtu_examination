<!DOCTYPE html>
<?php
if (!isset($_SESSION['head'])) {
    header('location:' . SITEURL . 'department/index.php?page=login');
}
?>
<html>

<head>
    <link rel="shortcut icon" HREF="img/dtu.png" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>DTU Examination</title>
    <?php include('./includes/css3.php') ?>
</head>

<body class="md-skin pace-done">

    <div id="wrapper">

        <?php include('sidenav.php'); ?>

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">

                    <?php include('topnav.php');  ?>
                </nav>
            </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Dept. Head</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.php">Home</a>
                        </li>

                        <li class="breadcrumb-item ">
                            View
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Exams list</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

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
                                                <th>Exam Code</th>
                                                <th>Course Name</th>
                                                <th>Created By</th>
                                                <th>Total Questions</th>
                                                <th>Status</th>
                                                <th>Total Time</th>
                                                <th>Exam Date</th>
                                                <th>Study Year</th>
                                                <th>Invigilator</th>
                                            </tr>
                                            </thead>

                                        <tfoot>
                                            <tr>
                                                <th>Exam Code</th>
                                                <th>Course Name</th>
                                                <th>Created By</th>
                                                <th>Total Questions</th>
                                                <th>Status</th>
                                                <th>Total Time</th>
                                                <th>Total Date</th>
                                                <th>Study Year</th>
                                                <th>Invigilator</th>

                                            </tr>
                                        </tfoot>
                                    </table>

                                </div>

                            </div>

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
            // $('[data-toggle="tooltip"]').tooltip();
            $("body").tooltip({
                selector: '[data-toggle=tooltip]'
            });

            $('.dataTables-example').DataTable({
                "processing": true,
                "serverSide": true,
                "order": [],
                responsive: true,
                "ajax": {
                    url: "<?php echo SITEURL; ?>department/ajax_department.php",
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


        });

        // function fnClickAddRow() {
        //   $('#editable').dataTable().fnAddData([
        //     "Custom row",
        //     "New row",
        //     "New row",
        //     "New row",
        //     "New row"
        //   ]);

        // }
    </script>

</body>

</html>