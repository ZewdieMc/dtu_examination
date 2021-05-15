<!--ADDING CKEDITOR HERE-->
<script src="<?php echo SITEURL; ?>/assets/ckeditor/ckeditor.js"></script>
<!-- <div class="main">
            <div class="content">
                <div class="report">
                    
                    <form method="post" action="" class="forms" enctype="multipart/form-data">
                        <h2>Add Question</h2>
                        <?php
                        if (isset($_SESSION['add'])) {
                            echo $_SESSION['add'];
                            unset($_SESSION['add']);
                        }
                        if (isset($_SESSION['invalid'])) {
                            echo $_SESSION['invalid'];
                            unset($_SESSION['invalid']);
                        }
                        if (isset($_SESSION['upload'])) {
                            echo $_SESSION['upload'];
                            unset($_SESSION['upload']);
                        }
                        ?>
                        <span class="name">Question</span> <br />
                        <textarea name="question" placeholder="Add Your Question" required="true"></textarea> <br />
                        <script>
                            CKEDITOR.replace( 'question' );
                        </script>
                        
                        <span class="name">Image</span>
                        <input type="file" name="image" /><br />
                        
                        <span class="name">First Answer</span>
                        <input type="text" name="first_answer" placeholder="First Answer" required="true" /><br />
                        
                        <span class="name">Second Answer</span>
                        <input type="text" name="second_answer" placeholder="Second Answer" required="true" /><br />
                        
                        <span class="name">Third Answer</span>
                        <input type="text" name="third_answer" placeholder="Third Answer" required="true" /><br />
                        
                        <span class="name">Fourth Answer</span>
                        <input type="text" name="fourth_answer" placeholder="Fourth Answer" required="true" /><br />
                        
                         <span class="name">Fifth Answer</span>
                        <input type="text" name="fifth_answer" placeholder="Fifth Answer" required="true" /><br />
                       
                        
                        <span class="name">Answer</span>
                        <select name="answer">
                            <option value="1">First Answer</option>
                            <option value="2">Second Answer</option>
                            <option value="3">Third Answer</option>
                            <option value="4">Fourth Answer</option>
                            <option value="5">Fifth Answer</option>
                        </select>
                        <br />
                        
                        <span class="name">Reason</span><br />
                        <textarea name="reason" placeholder="Reason to be the answer"></textarea>
                        <script>
                            CKEDITOR.replace( 'reason' );
                        </script>
                        <br />
                        
                        <span class="name">Marks</span>
                        <input type="text" name="marks" placeholder="Marks for this question" />
                        <br />
                        
                        <span class="name">Category</span>
                        <select name="category">
                            <option value="English">English</option>
                            <option value="Math">Math</option>
                        </select>
                        <br />
                        
                        <span class="name">Faculty</span>
                        <select name="faculty">
                            <?php
                            //Get Faculties from database
                            $tbl_name = "tbl_faculty";
                            $query = $obj->select_data($tbl_name);
                            $res = $obj->execute_query($conn, $query);
                            $count_rows = $obj->num_rows($res);
                            if ($count_rows > 0) {
                                while ($row = $obj->fetch_data($res)) {
                                    $faculty_id = $row['faculty_id'];
                                    $faculty_name = $row['faculty_name'];
                            ?>
                                        <option value="<?php echo $faculty_id; ?>"><?php echo $faculty_name; ?></option>
                                        <?php
                                    }
                                } else {
                                        ?>
                                    <option value="0">Uncategorized</option>
                                    <?php
                                }
                                    ?>
                            
                        </select>
                        <br />
                        
                        <span class="name">Is Active?</span>
                        <input type="radio" name="is_active" value="yes" /> Yes 
                        <input type="radio" name="is_active" value="no" /> No
                        <br />
                        
                        <input type="submit" name="submit" value="Add Question" class="btn-add" style="margin-left: 15%;" />
                        <a href="<?php echo SITEURL; ?>admin/index.php?page=questions"><button type="button" class="btn-delete">Cancel</button></a>
                    </form>
                    
                    <?php
                    if (isset($_POST['submit'])) {
                        //echo "Clicked";
                        //Managing Question Images
                        if ($_FILES['image']['name'] != "") {
                            //echo "Book Cover is Available";
                            //Getting File Extension
                            $ext = end(explode('.', $_FILES['image']['name']));
                            //Checking if the file type is valid or not
                            $valid_file = $obj->check_image_type($ext);
                            if ($valid_file == false) {
                                $_SESSION['invalid'] = "<div class='error'>Invalid Image type. Please use JPG or PNG or GIF file type.</div>";
                                header('location:' . SITEURL . 'admin/index.php?page=add_question');
                                die();
                            }
                            //Uploading if the file is valid
                            //first changing image name
                            $new_name = 'Beyond_Boundaries_Question_' . $obj->uniqid();
                            $image_name = $new_name . '.' . $ext;
                            //Adding Watermark to the image fie too
                            $source = $_FILES['image']['tmp_name'];
                            $destination = "../images/questions/" . $image_name;
                            $upload = $obj->upload_file($source, $destination);
                            if ($upload == false) {
                                $_SESSION['upload'] = "<div class='error'>Failed to upload question image. Try again.</div>";
                                header('location:' . SITEURL . 'admin/index.php?page=add_question');
                                die();
                            }
                        } else {
                            $image_name = "";
                        }
                        //Get all values from the forms
                        $question = $obj->sanitize($conn, $_POST['question']);
                        $first_answer = $obj->sanitize($conn, $_POST['first_answer']);
                        $second_answer = $obj->sanitize($conn, $_POST['second_answer']);
                        $third_answer = $obj->sanitize($conn, $_POST['third_answer']);
                        $fourth_answer = $obj->sanitize($conn, $_POST['fourth_answer']);
                        $fifth_answer = $obj->sanitize($conn, $_POST['fifth_answer']);

                        $faculty = $obj->sanitize($conn, $_POST['faculty']);
                        if (isset($_POST['is_active'])) {
                            $is_active = $_POST['is_active'];
                        } else {
                            $is_active = 'yes';
                        }
                        $answer = $obj->sanitize($conn, $_POST['answer']);
                        $reason = $obj->sanitize($conn, $_POST['reason']);
                        $marks = $obj->sanitize($conn, $_POST['marks']);
                        $category = $obj->sanitize($conn, $_POST['category']);
                        $added_date = date('Y-m-d');

                        $tbl_name = 'tbl_question';
                        $data = "question='$question',
                                    first_answer='$first_answer',
                                    second_answer='$second_answer',
                                    third_answer='$third_answer',
                                    fourth_answer='$fourth_answer',
                                    fifth_answer='$fifth_answer',
                                    answer='$answer',
                                    reason='$reason',
                                    marks='$marks',
                                    category='$category',
                                    faculty='$faculty',
                                    is_active='$is_active',
                                    added_date='$added_date',
                                    updated_date='',
                                    image_name='$image_name'
                                    ";
                        $query = $obj->insert_data($tbl_name, $data);
                        $res = $obj->execute_query($conn, $query);
                        if ($res === true) {
                            $_SESSION['add'] = "<div class='success'>Question successfully added.</div>";
                            header('location:' . SITEURL . 'admin/index.php?page=questions');
                        } else {
                            $_SESSION['add'] = "<div class='error'>Failed to add question. Try again.</div>";
                            header('location:' . SITEURL . 'admin/index.php?page=add_question');
                        }
                    }
                    ?>
                </div>
            </div>
        </div> -->
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>DTU Exam | Teacher</title>

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
                        <form role="search" class="navbar-form-custom" action="http://webapplayers.com/inspinia_admin-v2.9.4/search_results.html">
                            <div class="form-group">
                                <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                            </div>
                        </form>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message">Welcome <?php echo $_SESSION['user'] ?>.</span>
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
                            <a href="<?php echo SITEURL ?>teacher/index.php?page=logout">
                                <i class="fa fa-sign-out"></i> Log out
                            </a>
                        </li>
                    </ul>

                </nav>
            </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-sm-4">
                    <h2>Your department</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?php echo SITEURL ?>teacher/index.php?page=dashboard">Home</a>
                        </li>
                        <!-- <li class="breadcrumb-item active">
                            <strong>Breadcrumb</strong>
                        </li> -->
                    </ol>
                </div>
                <div class="col-sm-8">
                    <div class="title-action">
                        <a href="#" class="btn btn-outline btn-rounded btn-primary">This is action area</a>
                    </div>
                </div>
            </div>

            <div class="wrapper wrapper-content">
                <!-- <div class="middle-box text-center animated fadeInRightBig"> -->
                <div class="report">

                    <form method="post" action="" class="forms" enctype="multipart/form-data">
                        <h2>Add Question</h2>
                        <?php
                        if (isset($_SESSION['add'])) {
                            echo $_SESSION['add'];
                            unset($_SESSION['add']);
                        }
                        if (isset($_SESSION['invalid'])) {
                            echo $_SESSION['invalid'];
                            unset($_SESSION['invalid']);
                        }
                        if (isset($_SESSION['upload'])) {
                            echo $_SESSION['upload'];
                            unset($_SESSION['upload']);
                        }
                        ?>
                        <div class="ibox">
                            <div class="ibox-title">
                                <h5> Add Question</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        <i class="fa fa-wrench"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-user">
                                        <li><a href="#" class="dropdown-item">Config option 1</a>
                                        </li>
                                        <li><a href="#" class="dropdown-item">Config option 2</a>
                                        </li>
                                    </ul>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <textarea name="question" placeholder="Add Your Question" required="true"></textarea> <br />
                            </div>
                        </div>
                        <script>
                            CKEDITOR.replace('question');
                        </script>

                        <div class="ibox">
                            <div class="ibox-title">
                                <h5> Add choices</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        <i class="fa fa-wrench"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-user">
                                        <li><a href="#" class="dropdown-item">Config option 1</a>
                                        </li>
                                        <li><a href="#" class="dropdown-item">Config option 2</a>
                                        </li>
                                    </ul>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">

                                <span class="name">Image</span>
                                <input type="file" name="image" /><br />

                                <span class="name">First Answer</span>
                                <input type="text" name="first_answer" placeholder="First Answer" required="true" /><br />

                                <span class="name">Second Answer</span>
                                <input type="text" name="second_answer" placeholder="Second Answer" required="true" /><br />

                                <span class="name">Third Answer</span>
                                <input type="text" name="third_answer" placeholder="Third Answer" required="true" /><br />

                                <span class="name">Fourth Answer</span>
                                <input type="text" name="fourth_answer" placeholder="Fourth Answer" required="true" /><br />

                                <span class="name">Fifth Answer</span>
                                <input type="text" name="fifth_answer" placeholder="Fifth Answer" required="true" /><br />


                                <span class="name">Answer</span>
                                <select name="answer">
                                    <option value="1">First Answer</option>
                                    <option value="2">Second Answer</option>
                                    <option value="3">Third Answer</option>
                                    <option value="4">Fourth Answer</option>
                                    <option value="5">Fifth Answer</option>
                                </select>
                                <br />
                            </div>
                        </div>


                        <div class="ibox">
                            <div class="ibox-title">
                                <h5> Answer Description</h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        <i class="fa fa-wrench"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-user">
                                        <li><a href="#" class="dropdown-item">Config option 1</a>
                                        </li>
                                        <li><a href="#" class="dropdown-item">Config option 2</a>
                                        </li>
                                    </ul>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <textarea name="reason" placeholder="Reason to be the answer"></textarea>
                            </div>
                        </div>
                        <script>
                            CKEDITOR.replace('reason');
                        </script>
                        <br />

                        <span class="name">Marks</span>
                        <input type="text" name="marks" placeholder="Marks for this question" />
                        <br />

                        <span class="name">Category</span>
                        <select name="category">
                            <option value="English">English</option>
                            <option value="Math">Math</option>
                        </select>
                        <br />

                        <span class="name">Faculty</span>
                        <select name="faculty">
                            <?php
                            //Get Faculties from database
                            $tbl_name = "tbl_faculty";
                            $query = $obj->select_data($tbl_name);
                            $res = $obj->execute_query($conn, $query);
                            $count_rows = $obj->num_rows($res);
                            if ($count_rows > 0) {
                                while ($row = $obj->fetch_data($res)) {
                                    $faculty_id = $row['faculty_id'];
                                    $faculty_name = $row['faculty_name'];
                            ?>
                                    <option value="<?php echo $faculty_id; ?>"><?php echo $faculty_name; ?></option>
                                <?php
                                }
                            } else {
                                ?>
                                <option value="0">Uncategorized</option>
                            <?php
                            }
                            ?>

                        </select>
                        <br />

                        <span class="name">Is Active?</span>
                        <input type="radio" name="is_active" value="yes" /> Yes
                        <input type="radio" name="is_active" value="no" /> No
                        <br />

                        <input type="submit" name="submit" value="Add Question" class="btn-add" style="margin-left: 15%;" />
                        <a href="<?php echo SITEURL; ?>admin/index.php?page=questions"><button type="button" class="btn-delete">Cancel</button></a>
                    </form>

                    <?php
                    if (isset($_POST['submit'])) {
                        //echo "Clicked";
                        //Managing Question Images
                        if ($_FILES['image']['name'] != "") {
                            //echo "Book Cover is Available";
                            //Getting File Extension
                            $ext = end(explode('.', $_FILES['image']['name']));
                            //Checking if the file type is valid or not
                            $valid_file = $obj->check_image_type($ext);
                            if ($valid_file == false) {
                                $_SESSION['invalid'] = "<div class='error'>Invalid Image type. Please use JPG or PNG or GIF file type.</div>";
                                header('location:' . SITEURL . 'admin/index.php?page=add_question');
                                die();
                            }
                            //Uploading if the file is valid
                            //first changing image name
                            $new_name = 'Beyond_Boundaries_Question_' . $obj->uniqid();
                            $image_name = $new_name . '.' . $ext;
                            //Adding Watermark to the image fie too
                            $source = $_FILES['image']['tmp_name'];
                            $destination = "../images/questions/" . $image_name;
                            $upload = $obj->upload_file($source, $destination);
                            if ($upload == false) {
                                $_SESSION['upload'] = "<div class='error'>Failed to upload question image. Try again.</div>";
                                header('location:' . SITEURL . 'admin/index.php?page=add_question');
                                die();
                            }
                        } else {
                            $image_name = "";
                        }
                        //Get all values from the forms
                        $question = $obj->sanitize($conn, $_POST['question']);
                        $first_answer = $obj->sanitize($conn, $_POST['first_answer']);
                        $second_answer = $obj->sanitize($conn, $_POST['second_answer']);
                        $third_answer = $obj->sanitize($conn, $_POST['third_answer']);
                        $fourth_answer = $obj->sanitize($conn, $_POST['fourth_answer']);
                        $fifth_answer = $obj->sanitize($conn, $_POST['fifth_answer']);

                        $faculty = $obj->sanitize($conn, $_POST['faculty']);
                        if (isset($_POST['is_active'])) {
                            $is_active = $_POST['is_active'];
                        } else {
                            $is_active = 'yes';
                        }
                        $answer = $obj->sanitize($conn, $_POST['answer']);
                        $reason = $obj->sanitize($conn, $_POST['reason']);
                        $marks = $obj->sanitize($conn, $_POST['marks']);
                        $category = $obj->sanitize($conn, $_POST['category']);
                        $added_date = date('Y-m-d');

                        $tbl_name = 'tbl_question';
                        $data = "question='$question',
                                    first_answer='$first_answer',
                                    second_answer='$second_answer',
                                    third_answer='$third_answer',
                                    fourth_answer='$fourth_answer',
                                    fifth_answer='$fifth_answer',
                                    answer='$answer',
                                    reason='$reason',
                                    marks='$marks',
                                    category='$category',
                                    faculty='$faculty',
                                    is_active='$is_active',
                                    added_date='$added_date',
                                    updated_date='',
                                    image_name='$image_name'
                                    ";
                        $query = $obj->insert_data($tbl_name, $data);
                        $res = $obj->execute_query($conn, $query);
                        if ($res === true) {
                            $_SESSION['add'] = "<div class='success'>Question successfully added.</div>";
                            header('location:' . SITEURL . 'admin/index.php?page=questions');
                        } else {
                            $_SESSION['add'] = "<div class='error'>Failed to add question. Try again.</div>";
                            header('location:' . SITEURL . 'admin/index.php?page=add_question');
                        }
                    }
                    ?>
                </div>
                <!-- </div> -->
            </div>
        </div>


    </div>
    </div>

    <?php include("includes/scripts3.php") ?>
</body>



</html>

<!--Body Ends Here-->