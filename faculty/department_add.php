<?php
include('config/apply.php');
$tbl_name = "tbl_department";
$department_name = $_POST['insert_dept_name'];
$faculty_id = $_SESSION['faculty_id'];
$dept_id = $_POST['dept_id'];
$data = "department_name='$department_name',faculty_id='$faculty_id'";

$where = "dept_id ='$dept_id'";

$nessage = "";
$query = "";
if (!empty($dept_id)) {
    $query = $obj->update_data($tbl_name, $data, $where);
    $message =
        "<div class='alert alert-success alert-dismissable'>
                                <button aria-hidden='true data-dismiss='alert' class='close' type='button'>×</button>
                               <b> $department_name updated successfully</b>.
                            </div>";
} else {
    $query = $obj->insert_data($tbl_name, $data);
    $message =
        "<div class='alert alert-success alert-dismissable'>
                                <button aria-hidden='true data-dismiss='alert' class='close' type='button'>×</button>
                                $department_name saved successfully.
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
