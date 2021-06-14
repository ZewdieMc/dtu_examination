<link href="<?php echo SITEURL ?>asset2/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo SITEURL ?>asset2/font-awesome/css/font-awesome.css" rel="stylesheet">
<link href="<?php echo SITEURL ?>asset2/css/animate.css" rel="stylesheet">
<link href="<?php echo SITEURL ?>asset2/css/style.css" rel="stylesheet">
<link href="<?php echo SITEURL ?>asset2/css/plugins/dataTables/datatables.min.css" rel="stylesheet">

<!-- Toastr style -->
<link href="<?php echo SITEURL ?>asset2/css/plugins/toastr/toastr.min.css" rel="stylesheet">

<!-- Gritter -->
<link href="<?php echo SITEURL ?>asset2/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">
<link href="<?php echo SITEURL ?>asset2/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
<link href="<?php echo SITEURL ?>asset2/css/plugins/select2/select2.min.css" rel="stylesheet">
<link href="<?php echo SITEURL ?>asset2/css/plugins/select2/select2-bootstrap4.min.css" rel="stylesheet">
<link href="<?php echo SITEURL ?>asset2/css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">
<?php
if (!isset($_SESSION['head'])) {
    header('location:' . SITEURL . 'department/index.php?page=login');
}
?>