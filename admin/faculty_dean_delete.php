<?php
include('config/apply.php');
$tbl_name = "tbl_faculty_dean";
$response = array();
if (isset($_POST['id'])) {
    $dean_id = $_POST['id'];
    $where = "dean_id=$dean_id";
    $query = $obj->delete_data($tbl_name, $where);
    $res = $obj->execute_query($conn, $query);
    if ($res) {
        $response['status'] = 'success';
        $response['message'] = 'user deleted successfully';
    } else {
        $response['status'] = "error";
        $response['message'] = "unable to delete the user";
    }
    echo json_encode($response);
}
