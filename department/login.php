<?php

?>
<style type="text/css">
    body {
        background-image: url('../images/sched_back.jpg');
    }
</style>
<div class="container" style="margin-top: 10px">
    <div class="row justify-content-center">
        <!-- <div class="col"></div> -->
        <div class="col-md-4">
            <!--Body Starts Here-->
            <div class="card">
                <div class="card-body">
                    <form method="post" action="">
                        <h2>Department | Log In</h2>
                        <?php
                        if (isset($_SESSION['validation'])) {
                            echo $_SESSION['validation'];
                            unset($_SESSION['vaidation']);
                        }
                        if (isset($_SESSION['fail'])) {
                            echo $_SESSION['fail'];
                            unset($_SESSION['fail']);
                        }
                        if (isset($_SESSION['xss'])) {
                            echo $_SESSION['xss'];
                            unset($_SESSION['xss']);
                        }
                        ?>
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" placeholder="Username" required="true" />
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password" required="true" />
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" value="Log In" class="btn btn-lg btn-primary form-control" />
                        </div>
                        <div>
                            <input type="reset" name="reset" value="Reset" class="btn btn-lg btn-danger form-control" />
                        </div>
                    </form>
                    <?php
                    if (isset($_POST['submit'])) {
                        //echo "Clicked";
                        $username = $obj->sanitize($conn, $_POST['username']);
                        $password_db = md5($obj->sanitize($conn, $_POST['password']));

                        if (($username == "") or ($password = "")) {
                            $_SESSION['validation'] = "<div class='alert alert-danger'>Username or Password is Empty</div>";
                            header('location:' . SITEURL . 'department/index.php?page=login');
                        }
                        $tbl_name = "tbl_department_head";
                        $where = "username='$username' AND password='$password_db'";
                        $query = $obj->select_data($tbl_name, $where);
                        $res = $obj->execute_query($conn, $query);
                        $row = $obj->fetch_data($res);
                        $count_rows = $obj->num_rows($res);
                        if ($count_rows == 1) {
                            $_SESSION['user'] = $username;
                            $_SESSION['id'] = $row['id'];
                            $_SESSION['dept_id'] = $row['dept_id'];
                            $_SESSION['success'] = "<div class='alert alert-success'>Login Successful. Welcome " . $username . " to dashboard.</div>";
                            header('location:' . SITEURL . 'department/index.php?page=home');
                        } else {
                            $_SESSION['fail'] = "<div class='alert alert-danger'>Username or Password is invalid. Please try again.</div>";
                            header('location:' . SITEURL . 'department/index.php?page=login');
                        }
                    }
                    ?>
                </div>
            </div>
            <!--Body Ends Here-->
        </div>
        <!-- <div class="col"></div> -->
    </div>

</div>

<?php
include('../box/footer.php');
?>