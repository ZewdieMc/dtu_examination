<!DOCTYPE html>
<?php
if (!isset($_SESSION['dean'])) {
    header('location:' . SITEURL . 'faculty/index.php?page=login');
}
?>
<html>

<head>
    <link rel="shortcut icon" HREF="img/dtu.png" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>DTU Examination</title>
    <?php include('./includes/css2.php') ?>
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
                    <h2>Faculty Dean</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.php">Home</a>
                        </li>

                        <li class="active">
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
                                List of Examinations
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
                                                <th>Department</th>
                                                <th>Total Questions</th>
                                                <th>Status</th>
                                                <th>Total Time</th>
                                                <th>Exam Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $tbl_name = "((tbl_exam join tbl_course on
                                            tbl_exam.course_id=tbl_course.course_id)join tbl_department on 
                                            tbl_course.department_id=tbl_department.dept_id) join 
                                            faculty on tbl_department.faculty_id=faculty.id";
                                            $faculty_id = $_SESSION['faculty_id'];
                                            $where = "faculty.id=$faculty_id";
                                            $query = $obj->select_data($tbl_name);
                                            $res = $obj->execute_query($conn, $query);
                                            $count_rows = $obj->num_rows($res);
                                            if ($count_rows > 0) {
                                                while ($row = $obj->fetch_data($res)) {
                                            ?>
                                                    <tr class="gradeX">

                                                        <td>
                                                            <?php echo $row['exam_id'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['course_name'] ?>
                                                        <td>
                                                            <?php echo $row['department_name'] ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['qns_per_set'] ?>
                                                        </td>
                                                        <td><?php 
                                                        if ($row['status']=='completed') {
                                                            echo "<span class='label label-danger'>" . $row['status'] . "</span>";
                                                        }
                                                        elseif ($row['status']=='created') {
                                                            echo "<span class='label label-success'>" . $row['status'] . "</span>";
                                                        }
                                                        elseif ($row['status']=='start') {
                                                            echo "<span class='label label-primary'>" . $row['status'] . "</span>";
                                                        }
                                                        ?></td>
                                                        <td><?php echo $row['time_duration']." Minutes" ?></td>
                                                        <td><?php echo $row['exam_date'] ?></td>
                                                    </tr>


                                            <?php }
                                            } else
                                                echo "no data";
                                            ?>


                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Exam Code</th>
                                                <th>Course Name</th>
                                                <th>Department</th>
                                                <th>Total Questions</th>
                                                <th>Status</th>
                                                <th>Total Time</th>
                                                <th>Total Date</th>
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
    <?php include("./includes/scripts2.php") ?>


    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function() {
            $('.dataTables-example').DataTable({
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

            /* Init DataTables */
            var oTable = $('#editable').DataTable();

            /* Apply the jEditable handlers to the table */
            oTable.$('td').editable('#', {
                "callback": function(sValue, y) {
                    var aPos = oTable.fnGetPosition(this);
                    oTable.fnUpdate(sValue, aPos[0], aPos[1]);
                },
                "submitdata": function(value, settings) {
                    return {
                        "row_id": this.parentNode.getAttribute('id'),
                        "column": oTable.fnGetPosition(this)[2]
                    };
                },

                "width": "90%",
                "height": "100%"
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