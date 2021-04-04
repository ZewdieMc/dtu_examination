<?php
include('config/apply.php');
$tbl_name = "tbl_department";
$response = array();
if (isset($_POST['id'])) {
    $dept_id = $_POST['id'];
    $where = "dept_id=$dept_id";
    $query = $obj->delete_data($tbl_name, $where);
    $res = $obj->execute_query($conn, $query);
    if ($res) {
        $response['status'] = 'success';
        $response['message'] = 'Entity deleted successfully';
    } else {
        $response['status'] = "error";
        $response['message'] = "unable to delete the Entity";
    }
    echo json_encode($response);
}
