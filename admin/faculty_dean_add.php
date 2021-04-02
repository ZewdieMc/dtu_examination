<?php
include('config/apply.php');
$tbl_name = "tbl_faculty_dean";
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$username = $_POST['username'];
$faculty = $_POST['faculty'];
$password = md5($_POST['password']);
$dean_id = $_POST['deanid'];

$data = "first_name='$first_name',
last_name='$last_name',
email='$email',
username='$username',
faculty_id='$faculty',
password='$password'";
$where = "dean_id ='$dean_id'";
$nessage = "";
$query = "";
if (!empty($dean_id)) {
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
                                $first_name saved successfully.
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
