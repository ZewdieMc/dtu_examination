<?php
include('config/apply.php');
$tbl_name = "tbl_department_head";
$head_id = $_POST['head_id'];
$where = "id=$head_id";
$query = $obj->select_data($tbl_name, $where);
$result = $obj->execute_query($conn, $query);
$row = $obj->fetch_data($result);
echo json_encode($row);
