<!DOCTYPE html>

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
                    <h2>Admin</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.php">Home</a>
                        </li>

                        <li class="active">
                            <strong>Dean lists</strong>
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
                                &nbsp;&nbsp;&nbsp;
                                <button class="btn  btn-sm btn-primary btn-rounded btn-outline" data-toggle="modal" id='add_dean' data-target="#add_faculty"><span class="fa fa-plus"></span>&nbsp;Faculty Dean</button>
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
                                                <th>User ID</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th>Username</th>
                                                <th>Faculty</th>
                                                <th>Update</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>

                                        <tfoot>
                                            <tr>
                                                <th>User ID</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th>Username</th>
                                                <th>Faculty</th>
                                                <th>Update</th>
                                                <th>Delete</th>
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

    <div class="modal inmodal fade" id="add_faculty" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Add Dean</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" id="dean_form">
                        <div class="form-group"><label>First Name</label>
                            <input class="form-control input-sm validate[required]" name="first_name" id="first_name" type="text" placeholder=" Enter First Name">
                        </div>
                        <div class="form-group"><label>Last Name</label>
                            <input class="form-control input-sm validate[required]" name="last_name" id="last_name" type="text" placeholder=" Enter Last Name">
                        </div>

                        <div class="form-group"><label>Email</label>
                            <input class="input-sm validate[required] form-control" name="email" id="email" type="email" placeholder=" Enter Email">
                        </div>

                        <div class="form-group"><label>Username</label>
                            <input class="input-sm form-control" name="username" id="username" type="text" placeholder=" Enter Username">
                        </div>

                        <div class="form-group"><label>Faculty</label>
                            <select class="form-control select2 validate[required]" name="faculty">
                                <option></option>
                                <?php
                                $tbl_name = "faculty";
                                $query = $obj->select_data($tbl_name);
                                $res = $obj->execute_query($conn, $query);
                                $count_rows = $obj->num_rows($res);
                                if ($count_rows > 0) {
                                    while ($row = $obj->fetch_data($res)) {
                                ?>
                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['faculty_name'] ?></option>
                                <?php }
                                } ?>
                            </select>
                        </div>
                        <div class="form-group"><label>Password</label>
                            <input class="input-sm form-control" name="password" id="password" type="password" value="dtu1234" placeholder=" Enter Username">
                        </div>
                        <div id="add_information">
                        </div>
                        <input type="hidden" name="deanid" id="deanid" value="" />

                        <input type="submit" name="insert_dean" value="Insert dean" id="insert" class="btn  btn-outline  btn-success btn-rounded" />
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function() {
            var dataTable = $('.dataTables-example').DataTable({
                "processing": true,
                "serverSide": true,
                "order": [],
                "ajax": {
                    url: "<?php echo SITEURL; ?>admin/get_faculty.php",
                    type: "POST",
                    data: {
                        action: 'fetch',
                        page: 'dean'
                    }
                },
                "columnDefs": [{
                    "targets": [0, 5],
                    "orderable": false,
                }],
                "dom": '<"html5buttons"B>lTfgitp',
                "buttons": [{
                        "extend": 'copy'
                    },
                    {
                        extend: 'csv'
                    },
                    {
                        extend: 'excel',
                        title: 'faculties'
                    },
                    {
                        extend: 'pdf',
                        title: 'faculties'
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
                ],

            });

            /* Init DataTables */
            var oTable = $('#editable').DataTable();

            /* Apply the jEditable handlers to the table */
            oTable.$('td').editable('http://webapplayers.com/example_ajax.php', {
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
            $('#add_dean').on('click', function() {
                $("#insert").val("Insert Dean");
                $('#dean_form')[0].reset();

            });
            $(document).on('click', '#delete_dean', function() {
                var userId = $(this).data('id');
                confirmDelete(userId);
                e.preventDefault();

            });
            $('#insert').on('click', function(event) {
                event.preventDefault();
                $.ajax({
                    url: "<?php echo SITEURL; ?>admin/faculty_dean_add.php",
                    data: $('#dean_form').serialize(),
                    type: 'POST',
                    cache: false,
                    beforeSend: function() {
                        // $("#insert").val("Inserting");
                    },
                    complete: function(response, status) {
                        if (status != "error" && status != "timeout") {
                            // $("#insert").val("Inserted");
                            $('#add_information').html(response.responseText);
                            $("#add_faculty").modal('toggle');
                            $('.dataTables-example').DataTable().ajax.reload();


                        }
                    },
                    error: function(responseObj) {
                        alert("Something went wrong while processing your request.\n\nError => " +
                            responseObj.responseText);
                    }
                });
            });


            $(document).on('click', '.edit-data', function() {
                var id = $(this).attr("id");
                $.ajax({
                    url: "<?php echo SITEURL; ?>admin/faculty_dean_fetch.php",
                    method: "POST",
                    data: {
                        dean_id: id
                    },
                    dataType: "json",
                    success: function(data) {
                        $('#first_name').val(data.first_name);
                        $('#last_name').val(data.last_name);
                        $('#email').val(data.email);
                        $('#faculty').val(data.faculty_id);
                        $('#username').val(data.username);
                        $('#deanid').val(data.dean_id);
                        $('#insert').val("Update");
                        // alert($('#deanid').attr("value"));
                        $('#add_faculty').modal('show');
                    },
                    error: function(responseObj) {
                        alert("Something went wrong while processing your request.\n\nError => " +
                            responseObj.responseText);
                    }
                });




            });

            function SwalDelete(productId) {
                swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                    showLoaderOnConfirm: true,
                    closeOnConfirm: false,
                    closeOnCancel: false,
                    preConfirm: function() {
                        return new Promise(function(resolve) {
                            $.ajax({
                                    url: '<?php echo SITEURL ?>admin/faculty_dean_delete.php',
                                    type: 'POST',
                                    data: 'delete=' + productId,
                                    dataType: 'json'
                                })
                                .done(function(response) {
                                    swal('Deleted!', response.message, response.status);
                                    $('.dataTables-example').DataTable().ajax.reload();
                                })
                                .fail(function() {
                                    swal('Oops...', 'Something went wrong with ajax !', 'error');
                                });
                        });
                    },
                    allowOutsideClick: false
                });
            }

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
                                url: '<?php echo SITEURL ?>admin/faculty_dean_delete.php',
                                type: "POST",
                                data: {
                                    id: userid
                                },
                                dataType: "json",
                                success: function() {
                                    swal("Done!", "User succesfully deleted!", "success");
                                    $('.dataTables-example').DataTable().ajax.reload();

                                }
                            });
                        } else {
                            swal("Cancelled", "Operation cancelled! :)", "error");
                        }
                    })
            }

        });
    </script>

</body>

</html>