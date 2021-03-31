<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" href="<?php echo SITEURL ?>images/dtu.png" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>DTU Examination | password</title>
    <?php include('./includes/css2.php'); ?>
    <link href="<?php echo SITEURL ?>asset/copy/css/form.min.css" rel="stylesheet">
    <style type="text/css">
        .c-block {
            display: inline-block;
            width: 100%;
        }

        .validation-clear {
            margin-left: 2px;
        }
    </style>

</head>

<body>

    <div id="wrapper">

        <?php include('sidenav.php'); ?>

        <div id="page-wrapper" class="gray-bg dashbard-1">
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
                            <strong>Change Password</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row" style="margin-left:75px;margin-top:30px" ;>
                    <div class="col-md-9">
                        <div class="ibox">
                            <div class="ibox-title">
                                <span class="pull-right"><strong></strong> Change</span>
                                <h5>Change Password</h5>
                            </div>
                            <div class="ibox-content">
                                <div class="table-responsive">
                                    <form role="form" class="form-validation-2" method="post" enctype="multipart/form-data">
                                        <?php
                                        if (isset($_POST['Change_password'])) {
                                            $tbl_name = "tbl_admin";
                                            $user_id = $_SESSION['user_id'];
                                            $where = "id='$user_id'" ;
                                            $query = $obj->select_data($tbl_name, $where);
                                            $res = $obj->execute_query($conn, $query);
                                            $row = $obj->fetch_data($res);
                                            $oldpassword_db = $row['password'];

                                            $newpassword = md5($obj->sanitize($conn, $_POST['newpassword']));
                                            $data = "password='$newpassword'";

                                            if ($oldpassword_db != md5($obj->sanitize($conn, $_POST['oldpassword']))) {
                                                echo '<div class="alert alert-dismissable alert-danger">';
                                                echo '<strong>' . '<center>' . "You have inserted incorrect old password!" . '</center>' . '<strong>';
                                                echo '</div>';
                                            } else {
                                                $query = $obj->update_data($tbl_name, $data, $where);
                                                $res = $obj->execute_query($conn, $query);
                                                if ($res) {
                                                    echo '<div class="alert alert-dismissable alert-success">';
                                                    echo '<strong>' . '<center>' . "You have changed your password successfully!!!" . '</center>' . '<strong>';
                                                    echo '</div>';
                                                } else {
                                                    echo '<div class="alert alert-dismissable alert-danger">';
                                                    echo '<strong>' . '<center>' . "Something went wrong! Password not updated" . '</center>' . '<strong>';
                                                    echo '</div>';
                                                }
                                            }
                                        }
                                        ?>
                                        <!--<form role="form" id="form">-->
                                        <div class="form-group"><label>Current Password</label>
                                            <input class="form-control input-sm validate[required]" name="oldpassword" id="oldpassword" type="text" placeholder=" Enter Current Password">
                                        </div>

                                        <div class="form-group"><label>New Password</label>
                                            <input class="input-sm validate[required] form-control" name="newpassword" id="newpassword" type="password" placeholder=" Enter New Password">
                                        </div>

                                        <div class="form-group"><label>Confirm Password</label>
                                            <input class="input-sm validate[required,equals[newpassword]] form-control" name="confirmpassword" id="confirmpassword" type="password" placeholder="Confirm password">
                                        </div>
                                </div>
                                <div>
                                    <button class="btn btn-sm btn-primary m-t-n-xs" name="Change_password" type="submit" style="margin-left:635px" ;><strong>Change</strong></button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php include('./includes/scripts2.php'); ?>




</body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.5/ecommerce-cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 06 May 2016 04:00:29 GMT -->

</html>