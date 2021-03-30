<?php 
    if(!isset($_SESSION['user']))
    {
        $_SESSION['xss']="<div class='alert alert-danger'>Please login to access control panel</div>";
        header('location:'.SITEURL.'admin/index.php?page=login');
    }
?>


<nav class="navbar navbar-expand-sm bg-dark navbar-dark side-bar">
  <!-- Brand -->
  <a class="navbar-brand" href="<?php echo SITEURL; ?>admin/index.php?page=home">Home</a>

  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="<?php echo SITEURL; ?>admin/index.php?page=students">Students</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="<?php echo SITEURL; ?>admin/index.php?page=faculties">Faculities</a>
    </li>
  <li class="nav-item">
      <a class="nav-link" href="<?php echo SITEURL; ?>admin/index.php?page=questions">Questions</a>
    </li>
  <li class="nav-item">
      <a class="nav-link" href="<?php echo SITEURL; ?>admin/index.php?page=results">Results</a>
    </li>
  <li class="nav-item">
      <a class="nav-link" href="<?php echo SITEURL; ?>admin/index.php?page=results">Settings</a>
    </li>
  <li class="nav-item">
      <a class="nav-link" href="<?php echo SITEURL; ?>admin/index.php?page=logout">Log Out</a>
    </li>

  </ul>
</nav>
<?php
include('../assets/includes/css.php');
include('../assets/includes/side-bar.php');
include('../assets/includes/scripts.php');
?>
