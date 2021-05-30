<?php
// include_once('../config/apply.php');

?>
<!DOCTYPE html>
<html>



<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>DTU Exam | Teacher | Login </title>

    <link href="<?php echo SITEURL ?>asset2/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo SITEURL ?>asset2/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo SITEURL ?>asset2/css/animate.css" rel="stylesheet">
    <link href="<?php echo SITEURL ?>asset2/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg top-navigation">
    <nav class="navbar navbar-expand-lg navbar-static-top" role="navigation">

        <a href="#" class="navbar-brand">DTU Exam</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-reorder"></i>
        </button>

        <div class="navbar-collapse collapse" id="navbar">
            <ul class="nav navbar-nav mr-auto">

                <li class="dropdown">
                    <a aria-expanded="false" role="button" href="#" class="dropdown-toggle text-white bg-primary" data-toggle="dropdown"> Login</a>
                    <ul role="menu" class="dropdown-menu">
                        <li><a href="<?php echo SITEURL; ?>admin/index.php?page=login">Admin</a></li>
                        <li><a href="<?php echo SITEURL; ?>faculty/index.php?page=login">Faculty</a></li>
                        <li><a href="<?php echo SITEURL; ?>department/index.php?page=login">Department</a></li>
                        <li><a href="<?php echo SITEURL; ?>teacher/index.php?page=login">Teacher</a></li>
                        <li><a href="<?php echo SITEURL; ?>student/index.php?page=login">Student</a></li>
                    </ul>
                </li>


            </ul>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <a class="bg-primary text-white" href="login.html">
                        <i class="fa fa-sign-out active"></i> Univeristy website
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="loginColumns animated fadeInDown">
        <div class="row">

            <div class="col-md-6">
                <h2 class="font-bold">Student</h2>

                <p>
                    Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.
                </p>

                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.
                </p>

                <p>
                    When an unknown printer took a galley of type and scrambled it to make a type specimen book.
                </p>

                <p>
                    <small>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</small>
                </p>

            </div>
            <div class="col-md-6">
                <center><img src="<?php echo SITEURL; ?>images/logo.jpg" class="img-circle" height="100" width="100"></center>
                <div class="ibox-content">
                    <span id="message"></span>
                    <form class="m-t" role="form" data-parsley-validate id="teacher_login_form" action="" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                        </div>
                        <!-- <center><input type="submit" name="submit" value="Log In" class="btn btn-lg btn-primary btn-rounded btn-outline " /></center> -->
                        <div class="form-group">
                            <input type="hidden" name="page" value="student" />
                            <input type="hidden" name="action" value="login" />
                            <input type="submit" name="submit" value="Sign In" id="teacher_login" class="btn btn-lg btn-primary btn-rounded btn-outline " />
                        </div>
                        <br>
                        <a href="#">
                            <small>Forgot password?</small>
                        </a>
                    </form>

                    <!-- <?php
                            if (isset($_POST['submit'])) {
                                //echo "Clicked";
                                $username = $obj->sanitize($conn, $_POST['username']);
                                // $password_db = md5($obj->sanitize($conn, $_POST['password']));
                                $password_db = $obj->sanitize($conn, $_POST['password']);

                                if (($username == "") or ($password = "")) {
                                    $_SESSION['validation'] = "<div class='alert alert-danger'>Username or Password is Empty</div>";
                                    header('location:' . SITEURL . 'teacher/index.php?page=login');
                                }
                                $tbl_name = "tbl_teacher";
                                $where = "username='$username' AND password='$password_db'";
                                $query = $obj->select_data($tbl_name, $where);
                                $res = $obj->execute_query($conn, $query);
                                $row = $obj->fetch_data($res);
                                $count_rows = $obj->num_rows($res);
                                if ($count_rows == 1) {
                                    $_SESSION['user'] = $username;
                                    $_SESSION['teacher_id'] = $row['id'];
                                    $_SESSION['dept_id'] = $row['department_id'];
                                    $_SESSION['success'] = "<div class='alert alert-success'>Login Successful. Welcome " . $username . " to dashboard.</div>";
                                    header('location:' . SITEURL . 'teacher/index.php?page=dashboard');
                                } else {
                                    $_SESSION['fail'] = "<div class='alert alert-danger'>Username or Password is invalid. Please try again.</div>";
                                    header('location:' . SITEURL . 'teacher/index.php?page=login');
                                }
                            }
                            ?> -->
                </div>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-md-6">
                Copyright Debre Tabor Univeristy
            </div>
            <div class="col-md-6 text-right">
                <small>© <?php echo date('Y'); ?></small>
            </div>
        </div>
    </div>

</body>
<script src="<?php echo SITEURL ?>asset2/js/jquery-3.1.1.min.js"></script>
<script src="<?php echo SITEURL ?>asset2/js/parsley.js"></script>
<script src="<?php echo SITEURL ?>asset2/js/popper.min.js"></script>
<script src="<?php echo SITEURL ?>asset2/js/bootstrap.js"></script>
<script src="<?php echo SITEURL ?>asset2/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="<?php echo SITEURL ?>asset2/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="<?php echo SITEURL ?>asset2/js/inspinia.js"></script>
<script src="<?php echo SITEURL ?>asset2/js/plugins/pace/pace.min.js"></script>



<script>
    $(document).ready(function() {
        // $('#admin_login_form').parsley();
        $('#teacher_login_form').on('submit', function(event) {
            event.preventDefault();
            $('#username').attr('required', 'required');
            $('#password').attr('required', 'required');
            if ($('#teacher_login_form').parsley().validate()) {
                $.ajax({
                    url: "<?php echo SITEURL ?>student/ajax_student.php",
                    method: "POST",
                    data: $(this).serialize(),
                    dataType: "json",
                    beforeSend: function() {
                        $('#teacher_login').attr('disabled', 'disabled');
                        $('#teacher_login').val('Signing In...');
                    },
                    success: function(data) {
                        if (data.success) {
                            location.href = "<?php echo SITEURL ?>student/index.php?page=welcome";
                        } else {
                            $('#message').html('<div class="alert alert-danger">' + data.error + '</div>');
                        }
                        $('#teacher_login').attr('disabled', false);
                        $('#teacher_login').val('Sign In');
                    },
                    error: function(responseObj) {
                        alert("Something went wrong while processing your request.\n\nError => " +
                            responseObj.responseText);
                    }
                });
            }
        });

    });
</script>

</html>