<?php
include('config/apply.php');
$tbl_name = "tbl_department";
$dept_id = $_POST['dept_id'];
$where = "dept_id=$dept_id";
$query = $obj->select_data($tbl_name, $where);
$result = $obj->execute_query($conn, $query);
$row = $obj->fetch_data($result);
echo json_encode($row);
