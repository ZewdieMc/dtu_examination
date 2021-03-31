<!DOCTYPE html>

<html>

<head>
  <link rel="shortcut icon" HREF="img/dtu.png" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>DTU Examination</title>
  <?php include('./includes/css2.php') ?>
</head>

<body>

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
              <strong>Faculty lists</strong>
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
                <button class="btn  btn-sm btn-primary" data-toggle="modal" data-target="#add_faculty"><span class="fa fa-plus"></span>&nbsp;Faculty</button>
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
                        <th>Faculty ID</th>
                        <th>Faculty Name</th>
                        <th>Descrition</th>
                        <th>Location</th>
                        <th>Update</th>
                        <th>Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $tbl_name = "faculty";
                      $query = $obj->select_data($tbl_name);
                      $res = $obj->execute_query($conn, $query);
                      $count_rows = $obj->num_rows($res);
                      if ($count_rows > 0) {
                        while ($row = $obj->fetch_data($res)) {
                      ?>
                          <tr class="gradeX">

                            <td>
                              <?php echo $row['id'] ?>
                            </td>
                            <td>
                              <?php echo $row['faculty_name'] ?>
                            </td>
                            <td>
                              <?php echo $row['Description'] ?>
                            </td>
                            <td><?php echo $row['Location'] ?></td>
                            <td class="center"><a data-toggle="modal" data-target="#update_faculty-<?php echo $row['id'] ?>"><i class="fa fa-pencil fa-lg text-blue"></i> </a></td>
                            <td class="center"><a data-toggle="modal" data-target="#myModal5"><i class="glyphicon glyphicon-remove text-red"></i> </a></td>
                            <div class="modal inmodal fade" id="update_faculty-<?php echo $row['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                    <h4 class="modal-title">Update Faculty</h4>
                                  </div>
                                  <div class="modal-body">
                                    <div class="form-group"><label>Faculty Name</label>
                                      <input class="form-control input-sm validate[required]" value="<?php echo $row['faculty_name'] ?>" name="faculty_name" id="oldpassword" type="text" placeholder=" EnterFaculty Name">
                                    </div>

                                    <div class="form-group"><label>Description</label>
                                      <input class="input-sm validate[required] form-control" value="<?php echo $row['Description'] ?>" name="faculty_description" id="newpassword" type="text" placeholder=" Enter Faculty Description">
                                    </div>

                                    <div class="form-group"><label>Location</label>
                                      <input class="input-sm form-control" name="location" value="<?php echo $row['Location'] ?>" id="confirmpassword" type="text" placeholder="Enter Faculty Location">
                                    </div>
                                  </div>

                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                    <a type="button" href="<?php echo SITEURL ?>admin/index.php?page=faculty" name="update" class="btn btn-primary">Update</a>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </tr>


                      <?php }
                      } else
                        echo "no data";
                      ?>


                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Faculty ID</th>
                        <th>Faculty Name</th>
                        <th>Descrition</th>
                        <th>Location</th>
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
<div class="modal inmodal fade" id="add_faculty" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Add Faculty</h4>
      </div>
      <div class="modal-body">
        <div class="form-group"><label>Faculty Name</label>
          <input class="form-control input-sm validate[required]" name="faculty_name" id="oldpassword" type="text" placeholder=" EnterFaculty Name">
        </div>

        <div class="form-group"><label>Description</label>
          <input class="input-sm validate[required] form-control" name="faculty_description" id="newpassword" type="password" placeholder=" Enter Faculty Description">
        </div>

        <div class="form-group"><label>Location</label>
          <input class="input-sm form-control" name="location" id="confirmpassword" type="password" placeholder="Enter Faculty Location">
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
        <a type="button" href="<?php echo SITEURL ?>admin/index.php?page=faculty" name="update" class="btn btn-primary">Add</a>
      </div>
    </div>
  </div>
</div>