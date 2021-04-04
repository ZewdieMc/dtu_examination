<?php
include('config/apply.php');
$tbl_name = "tbl_department_head";
$response = array();
if (isset($_POST['id'])) {
    $head_id = $_POST['id'];
    $where = "id=$head_id";
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
