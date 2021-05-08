<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                        <?php
                        // $query=mysql_query("select * from userinformation where user_id='$session_id'")or die(mysql_error());
                        // $row=mysql_fetch_array($query);
                        // $pic=$row["image"];
                        ?>

                        <img class='img-circle' alt="image" style="width:80px;height:80px;" ; src="<?php echo SITEURL; ?>images/logo.jpg" /><span></span>
                    </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $_SESSION['user'] ?></strong>
                            </span> <span class="text-muted text-xs block">Teacher <b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="<?php echo SITEURL; ?>department/index.php?page=change_password">Change Password</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo SITEURL; ?>department/index.php?page=change_profile">Change Profile</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo SITEURL; ?>department/index.php?page=logout">Logout</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <a href="<?php echo SITEURL ?>department/index.php?page=dashboard"><i class="fa fa-dashboard"></i> <span class="nav-label">Home</span></a>
            </li>

            <li>
            <li>
                <a href="#"><i class="fa fa-tasks"></i> <span class="nav-label">Dept. Managment</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="<?php echo SITEURL ?>department/index.php?page=teachers"><i class="fa fa-pencil"></i>Teachers </a>
                    <li><a href="<?php echo SITEURL ?>department/index.php?page=courses"><i class="fa fa-book"></i>Courses</a>
                    <li><a href="<?php echo SITEURL ?>department/index.php?page=students"><i class="fa fa-users"></i>Students</a>
                    <li><a href="<?php echo SITEURL ?>department/index.php?page=examiner"><i class="fa fa-users"></i>Invigilators</a>

                    <li>

                        <a href="#"><i class="fa fa-eye"></i>View<span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li><a href="<?php echo SITEURL ?>department/index.php?page=exams"><i class="fa fa-pencil"></i>Exams</a></li>
                            <li><a href="<?php echo SITEURL ?>department/index.php?page=dashboard"><i class="fa fa-file-text"></i>Report</a></li>
                            <!-- <li><a href="addcollege.php"><i class="fa fa-plus"></i>Report</a></li> -->
                        </ul>
                    </li>
            </li>
            </li>
            </li>
        </ul>
    </div>
</nav>