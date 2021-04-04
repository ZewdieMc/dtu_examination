<?php
include('config/apply.php');
$tbl_name = "tbl_department_head";
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$username = $_POST['username'];
$department = $_POST['department'];
$password = md5($_POST['password']);
$head_id = $_POST['headid'];

$data = "first_name='$first_name',
last_name='$last_name',
email='$email',
username='$username',
department_id='$department',
password='$password'";
$where = "id ='$head_id'";
$nessage = "";
$query = "";
if (!empty($head_id)) {
    $query = $obj->update_data($tbl_name, $data, $where);
    $message =
        "<div class='alert alert-success alert-dismissable'>
                                <button aria-hidden='true data-dismiss='alert' class='close' type='button'>×</button>
                               <b> $first_name updated successfully</b>.
                            </div>";
} else {
    $query = $obj->insert_data($tbl_name, $data);
    $message =
        "<div class='alert alert-success alert-dismissable'>
                                <button aria-hidden='true data-dismiss='alert' class='close' type='button'>×</button>
                               <b> $first_name saved successfully</b>.
                            </div>";
}
$res = $obj->execute_query($conn, $query);
if ($res) {
    echo $message;
} else {
    echo
    "<div class='alert alert-success alert-dismissable'>
                                <button aria-hidden='true data-dismiss='alert' class='close' type='button'>×</button>
                                Operation failed.
                            </div>";;
}
