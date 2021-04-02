<?php
include('config/apply.php');
$tbl_name = "faculty";
$faculty_name = $_POST['insert_faculty_name'];
$description = $_POST['insert_faculty_description'];
$location = $_POST['insert_faculty_location'];
$faculty_id = $_POST['faculty_id'];
$data = "faculty_name='$faculty_name',Description='$description',Location='$location'";

$where = "id ='$faculty_id'";

// $query = $obj->insert_data($tbl_name, $data);
// $res = $obj->execute_query($conn, $query);
// if ($res) {
//     echo "<div class = 'alert alert-success'><b> $faculty_name saved successfully<b></div>";
// } else {
//     echo "<div class = 'alert alert-danger'> failed to '$faculty_name'</div>";
// }

$nessage = "";
$query = "";
if (!empty($faculty_id)) {
    $query = $obj->update_data($tbl_name, $data, $where);
    $message =
        "<div class='alert alert-success alert-dismissable'>
                                <button aria-hidden='true data-dismiss='alert' class='close' type='button'>×</button>
                               <b> $faculty_name updated successfully</b>.
                            </div>";
} else {
    $query = $obj->insert_data($tbl_name, $data);
    $message =
        "<div class='alert alert-success alert-dismissable'>
                                <button aria-hidden='true data-dismiss='alert' class='close' type='button'>×</button>
                                $faculty_name saved successfully.
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
