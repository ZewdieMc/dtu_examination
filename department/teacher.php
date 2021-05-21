<!DOCTYPE html>

<html>

<head>
    <link rel="shortcut icon" HREF="img/dtu.png" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>DTU Exam</title>
    <?php include('./includes/css3.php') ?>
</head>
<script>
    function formToggle(ID) {
        var element = document.getElementById(ID);
        if (element.style.display === "none") {
            element.style.display = "block";
        } else {
            element.style.display = "none";
        }
    }
</script>

<body class="md-skin pace-done">
    <!-- light-skin pace-done -->
    <!-- class=" md-skin pace-done" -->

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

                        <li class="breadcrumb-item active">
                            <strong>Teachers</strong>
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
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-2"> <button class="btn  btn-sm btn-primary btn-rounded btn-outline" data-toggle="modal" id='add_de' data-target="#add_teacher"><span class="fa fa-plus"></span>&nbsp;Teacher</button>
                                        </div>
                                        <div class="col-md-6 head panel panel-primary" id="importform" style="padding: 10px;display:none">
                                            <form method="POST" action="teacher_upload.php" id="upload_form" enctype="multipart/form-data">
                                                <div class="col-md-6">
                                                    <input type="file" name="file" class="form-control-file" id="upload_teacher">
                                                </div>
                                                <div class="col-md-2">
                                                    <input type="submit" value="Import" name="uploadstudent" class="btn btn-primary btn-outline " id='cvs_upload' />
                                                </div>
                                                <!-- upload -->
                                            </form>
                                        </div>
                                        <div class="col-md-2">
                                            <a href="javascript:void(0);" class=" btn btn-sm btn-primary btn-outline btn-rounded " onclick="formToggle('importform');"><span class=" fa fa-upload"></span> Import CSV </a>
                                        </div>
                                    </div>
                                    <!-- <span id="upload_information" class=" alert alert-primary"></span> -->
                                </div>
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
                                                <th>ID</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th>Username</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th>Username</th>
                                                <th></th>
                                                <th></th>
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
    <div class="modal inmodal fade" id="add_teacher" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Add Teacher</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" id="insert_form">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group"><label>First Name</label>
                                    <input class="form-control input-sm validate[required]" name="first_name" id="first_name" type="text" placeholder=" Enter First Name" required />
                                </div>
                                <div class="form-group"><label>Lasts Name</label>
                                    <input class="form-control input-sm validate[required]" name="last_name" id="last_name" type="text" placeholder=" Enter Last Name" required />
                                </div>
                                <div class="form-group"><label> Username</label>
                                    <input class="form-control input-sm validate[required]" name="username" id="username" type="text" placeholder=" Enter Username" required />
                                </div>
                                <div class="form-group"><label> Email</label>
                                    <input class="form-control input-sm validate[required]" name="email" id="email" type="email" placeholder=" Enter Email" required />
                                </div>
                                <div class="form-group"><label> Password</label>
                                    <input class="form-control input-sm validate[required]" name="password" value="dtu1234" id="password" type="password" placeholder=" Password" required />
                                </div>

                                <div id="add_information" class="form-group"></div>
                                <input type="hidden" name="teacher_id" id="teacher_id" value="" />
                                <input type="hidden" name="page" value="teacher" />
                                <input type="hidden" name="action" id="action" value="Add" />
                                <input type="submit" name="insert" value="Insert Teacher" id="insert" class="btn  btn-outline  btn-primary btn-rounded" />

                            </div>

                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
            // ========================

            // ========================

            // $('#cvs_upload').on('click', function(event) {
            //     // code
            //     event.preventDefault();
            //     $.ajax({
            //         url: "<?php echo SITEURL; ?>department/student_upload.php",
            //         method: "POST",
            //         data: $('#upload_form').serialize(),
            //         dataType: "json",
            //         success: function(data) {
            //           $('.dataTables-example').DataTable().ajax.reload();
            //           $("#upload_information").html(data.success);
            //             },
            //             error: function(responseObj) {
            //               alert("Something went wrong while processing your requestt.\n\nError => " +
            //                 responseObj.responseText);
            //             }

            //         });
            //     });

            var dataTable = $('.dataTables-example').DataTable({
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    url: "<?php echo SITEURL; ?>department/ajax_department.php",
                    type: "POST",
                    data: {
                        action: 'fetch',
                        page: 'teacher'
                    }
                },
                "columnDefs": [{
                    "targets": [0, 6],
                    "orderable": false,
                }],
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [{
                        extend: 'copy'
                    },
                    {
                        extend: 'csv',
                        title: 'Teachers'
                    },
                    {
                        extend: 'excel',
                        title: 'Teachers'
                    },
                    {
                        extend: 'pdf',
                        title: 'Teachers'
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


            // ++++++++++++++++form validator+++++++++++++++
            // $('# insert_form').validate({
            //     rules: {
            //         password: {
            //             required: true,
            //             minlength: 6
            //         },
            //         email: {
            //             required: true,
            //             email: true
            //         },
            //         first_name: {
            //             required: true
            //         },
            //         last_name: {
            //             required: true
            //         },
            //         username: {
            //             required: true,
            //             minlength: 3
            //         }
            //     }
            // });
            // ++++++++++++endform validator+++++++++++++++

            $('#insert').on("click", function(event) {
                event.preventDefault();
                $.ajax({
                    url: "<?php echo SITEURL; ?>department/ajax_department.php",
                    data: $('#insert_form').serialize(),
                    type: 'POST',
                    cache: false,
                    beforeSend: function() {
                        //$("#insert").val("Inserting");
                    },
                    complete: function(status) {
                        if (status != "error" && status != "timeout") {
                            //$("#insert").val("Inserted");
                            $('#add_information').html("Operation successful");
                            $('.dataTables-example').DataTable().ajax.reload();
                            // $("#add_faculty").modal('toggle');

                        }
                    },
                    error: function(responseObj) {
                        alert("Something went wrong while processing your request.\n\nError => " +
                            responseObj.error);
                    }
                });

            });

            $('#add_de').on('click', function() {
                $("#insert").val("Insert Teacher");
                $('#insert_form')[0].reset();

            });
            $(document).on('click', '#delete_teacher', function() {
                var teacher_id = $(this).data('id');
                confirmDelete(teacher_id);
                e.preventDefault();

            });
            $(document).on('click', '.edit-data', function() {
                var teacher_id = $(this).attr("id");
                $.ajax({
                    url: "<?php echo SITEURL; ?>department/ajax_department.php",
                    method: "POST",
                    data: {
                        page: "teacher",
                        action: "edit_fetch",
                        teacher_id: teacher_id
                    },
                    dataType: "json",
                    success: function(data) {
                        $('#first_name').val(data.first_name);
                        $('#last_name').val(data.last_name);
                        $('#email').val(data.email);
                        $('#username').val(data.username);
                        $('#teacher_id').val(teacher_id);
                        $('#add_teacher').on('show.bs.modal', function(event) {
                            $(this).find('h4.modal-title').text("Update teacher");
                        });
                        $('#insert').val("Update Teacher");
                        // alert($('#deanid').attr("value"));
                        $('#action').val("update");
                        $('.modal_title').text('Edit Teacher');
                        $('#add_teacher').modal('show');
                    },
                    error: function(responseObj) {
                        alert("Something went wrong while processing your requestt.\n\nError => " +
                            responseObj.responseText);
                    }
                });
            });
        });



        function confirmDelete(userid) {
            swal({
                    title: "Are you sure?",
                    text: "You will not be able to undo this.",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "green",
                    cancelButtonColor: "red",
                    confirmButtonText: "Delete!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            url: '<?php echo SITEURL ?>department/ajax_department.php',
                            type: "POST",
                            data: {
                                teacher_id: userid,
                                page: "teacher",
                                action: "delete"
                            },
                            dataType: "json",
                            success: function(response) {
                                swal("Done!", response.message, response.status);
                                $('.dataTables-example').DataTable().ajax.reload();
                            }
                        });
                    } else {
                        swal("Cancelled", "Operation cancelled! :)", "error");
                    }
                })
        }
    </script>


</body>

</html>