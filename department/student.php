<!DOCTYPE html>

<html>

<head>
  <link rel="shortcut icon" HREF="img/dtu.png" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>DTU Exam</title>
  <?php include('./includes/css2.php') ?>
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
              <strong>Students</strong>
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
                    <div class="col-md-2"> <button class="btn  btn-sm btn-primary btn-rounded btn-outline" data-toggle="modal" id='add_de' data-target="#add_department"><span class="fa fa-plus"></span>&nbsp;Student</button>
                    </div>
                    <div class="col-md-6 head panel panel-primary" id="importform" style="padding: 15px;display:none">
                      <form method="POST" action="student_upload.php" id="upload_form" enctype="multipart/form-data">
                        <div class="col-md-6">
                          <input type="file" name="file" class="form-control-file" id="upload_student">
                        </div>
                        <div class="col-md-2">
                          <input type="submit" value="Import" name="uploadstudent" class="btn btn-primary btn-outline " id='cvs_upload' />
                        </div>
                      </form>
                    </div>
                    <div class="col-md-2">
                      <a href="javascript:void(0);" class=" btn btn-sm btn-primary btn-outline btn-rounded " onclick="formToggle('importform');"><span class=" fa fa-upload"></span> Import CSV </a>
                    </div>
                    <div class="col" style="padding: 15px;">
                      <?php
                      if (isset($_GET['status'])) {
                        if ($_GET['status'] == 'succ') {
                          echo '<span class ="alert alert-success">File imported successfully.</span>';
                        } elseif ($_GET['status'] == 'invalid_file') {
                          echo '<span class ="alert alert-danger">Please upload valid file.</span>';
                        } elseif ($_GET['status'] == 'err') {
                          echo '<span class ="alert alert-danger">The file uploaded is not CSV file.</span>';
                        }
                      }
                      ?>
                    </div>
                  </div>
                  <span id="upload_information" class=" alert alert-primary"></span>
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
                        <th>Contact</th>
                        <th>Gender</th>
                        <th>Study Year</th>
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
                        <th>Contact</th>
                        <th>Gender</th>
                        <th>Study Year</th>
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
  <div class="modal inmodal fade" id="add_department" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title">Add Student</h4>
        </div>
        <div class="modal-body">
          <form method="POST" id="insert_form">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group"><label>First Name</label>
                  <input class="form-control input-sm validate[required]" name="first_name" id="first_name" type="text" placeholder=" Enter First Name">
                </div>
                <div class="form-group"><label>Lasts Name</label>
                  <input class="form-control input-sm validate[required]" name="last_name" id="last_name" type="text" placeholder=" Enter Last Name">
                </div>
                <div class="form-group"><label> Username</label>
                  <input class="form-control input-sm validate[required]" name="username" id="username" type="text" placeholder=" Enter Username">
                </div>
                <div class="form-group"><label> Email</label>
                  <input class="form-control input-sm validate[required]" name="email" id="email" type="email" placeholder=" Enter Email">
                </div>
                <div class="form-group"><label> Password</label>
                  <input class="form-control input-sm validate[required]" name="password" value="dtu1234" id="password" type="password" placeholder=" Password">
                </div>
                <div class="form-group"><label> Contact Number</label>
                  <input class="form-control input-sm validate[required]" name="contact" id="contact" type="text" placeholder=" Enter Contact Number">
                </div>
                <div id="add_information" class="form-group"></div>
                <input type="hidden" name="student_id" id="student_id" value="" />
                <input type="hidden" name="page" value="student" />
                <input type="hidden" name="action" id="action" value="Add" />
                <input type="submit" name="insert" value="Insert Student" id="insert" class="btn  btn-outline  btn-primary btn-rounded" />

              </div>
              <div class="col-md-6">
                <div class="form-group"><label> Gender</label>
                  <select class="form-control" name="gender">
                    <option>Male</option>
                    <option>Female</option>
                    <option>Other</option>
                  </select>
                </div>

                <div class="form-group"><label> Study Year</label>
                  <select class="form-control" name="study_year">
                    <option></option>
                    <?php
                    $tbl_name  = "tbl_year_study";
                    $query = $obj->select_data($tbl_name);
                    $res = $obj->execute_query($conn, $query);
                    while ($row = $obj->fetch_data($res)) {
                    ?>
                      <option value="<?php echo $row['study_year_id'] ?>"><?php echo $row['year'] ?></option>
                    <?php } ?>
                  </select>
                </div>
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
  <?php include("./includes/scripts2.php") ?>



  <!-- Page-Level Scripts -->
  <script>
    $(document).ready(function() {

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
      $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-white btn-sm';

      var dataTable = $('.dataTables-example').DataTable({
        "processing": true,
        "serverSide": true,
        "order": [],
        responsive: true,
        "ajax": {
          url: "<?php echo SITEURL; ?>department/ajax_department.php",
          type: "POST",
          data: {
            action: 'fetch',
            page: 'student'
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
            title: 'Students'
          },
          {
            extend: 'excel',
            title: 'Students'
          },
          {
            extend: 'pdf',
            title: 'Students'
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
        $("#insert").val("Insert Student");
        $('#insert_form')[0].reset();

      });
      $(document).on('click', '#delete_student', function() {
        var student_id = $(this).data('id');
        confirmDelete(student_id);
        e.preventDefault();

      });
      $(document).on('click', '.edit-data', function() {
        var student_id = $(this).attr("id");
        $.ajax({
          url: "<?php echo SITEURL; ?>department/ajax_department.php",
          method: "POST",
          data: {
            page: "student",
            action: "edit_fetch",
            student_id: student_id
          },
          dataType: "json",
          success: function(data) {
            $('#first_name').val(data.first_name);
            $('#last_name').val(data.last_name);
            $('#email').val(data.email);
            $('#username').val(data.username);
            $('#contact').val(data.contact);
            $('#student_id').val(student_id);
            $('#add_department').on('show.bs.modal', function(event) {
              $(this).find('h4.modal-title').text("Update student");
            });
            $('#insert').val("Update Student");
            // alert($('#deanid').attr("value"));
            $('#action').val("update");
            $('.modal_title').text('Edit Student');
            $('#add_department').modal('show');
          },
          error: function(responseObj) {
            alert("Something went wrong while processing your requestt.\n\nError => " +
              responseObj.responseText);
          }
        });
      });
    });

    // function formToggle(importform) {
    //   var element = document.getElementById(importform);
    //   if (element.style.display = "none") {
    //     element.style.display = "block";
    //   } else {
    //     element.style.display = "none";
    //   }
    // }

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
                student_id: userid,
                page: "student",
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