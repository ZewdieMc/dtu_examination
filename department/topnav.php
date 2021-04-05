<div class="navbar-header">
    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
    <form role="search" class="navbar-form-custom" action="http://webapplayers.com/inspinia_admin-v2.5/search_results.html">
        <div class="form-group" style="margin-top:10%" ;>
            <Strong>
                <h4>
                    <p>DTU Examination System</p>
                </h4>

            </strong>

        </div>
    </form>
</div>
<?php
// $query=mysql_query("select * from userinformation where user_id='$session_id'")or die(mysql_error());
//  $row=mysql_fetch_array($query);
//  $pic=$row["image"];
// 
?>

<ul class="nav navbar-top-links navbar-right">
    <li>
        <span class="m-r-sm text-muted welcome-message">Welcome <?php echo $_SESSION['user'] ?></span>
    </li>

    <li>
        <a href="<?php echo SITEURL ?>department/index.php?page=logout">
            <i class="fa fa-sign-out"></i> Log out
        </a>
    </li>
    <li>
        <a class="right-sidebar-toggle">
            <i class="fa fa-tasks"></i>
        </a>
    </li>
</ul>