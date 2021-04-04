<?php
include('check.php');
?>
<!--Body Starts Here-->
<div class="main">
    <div class="content">
        <div class="welcome">
            <?php
            if (isset($_SESSION['login'])) {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
            //Setting Time Limit Here
            if (!isset($_SESSION['start_time'])) {
                //$_SESSION['start_time']=
            }
            ?>
            Hello <span class="heavy"><?php echo $_SESSION['student']; ?></span>. Welcome to online examination Portal.<br />

            <div class="alert alert-success">
                <p style="text-align: left;">
                    Here, an input field for the examination code should be prepared.
                </p>
            </div>

            <a href="<?php echo SITEURL; ?>student/index.php?page=Questions">
                <button type="button" class="btn btn-lg btn-success">Start Exam</button>
            </a>
            <a href="<?php echo SITEURL; ?>student/index.php?page=logout">
                <button type="button" class="btn btn-lg btn-danger">&nbsp; Quit &nbsp;</button>
            </a>
        </div>
    </div>
</div>
<!--Body Ends Here-->