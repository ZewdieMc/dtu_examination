<?php
include_once("./config/apply.php");

if (isset($_POST['uploadstudent'])) {
  $csvMimes = array(
    'text/x-comma-separated-values', 'text/comma-separated-values',
    'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv',
    'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain'
  );
  if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)) {


    // If the file is uploaded
    if (is_uploaded_file($_FILES['file']['tmp_name'])) {
      // Open uploaded CSV file with read-only mode
      $csvFile = fopen($_FILES['file']['tmp_name'], 'r');

      // Skip the first line
      fgetcsv($csvFile);
      while (($line = fgetcsv($csvFile)) !== FALSE) {
        // Get row data
        $id = $line[0];
        $first_name = $line[1];
        $last_name  = $line[2];
        $email  = $line[3];
        $contact = $line[4];
        $gender = $line[5];
        $study_year = $line[6][0];
        // Check whether member already exists in the database with the same email
        $tbl_name = "tbl_student";
        $data = "first_name = '$first_name',
      last_name = '$last_name',
      email = '$email',
      username = '$first_name',
      password = 'dtu1234',
      contact = '$contact',
      gender = '$gender',
      study_year = '$study_year',
      department_id = '" . $_SESSION['dept_id'] . "',
      academic_year = '" . date('Y') . "',
      is_active = 'no',
      added_date = '" . date('Y-m-d') . "',
      updated_date = '" . date('Y-m-d') . "'
      ";
        $where = "email = '$email'";
        $query = $obj->select_data($tbl_name, $where);
        $res = $obj->execute_query($conn, $query);
        $num_rows = $obj->num_rows($res);
        if ($num_rows > 0) {
          $query = $obj->update_data($tbl_name, $data, $where);
          $res = $obj->execute_query($conn, $query);
        } else {
          # code...
          $query = $obj->insert_data($tbl_name, $data);
          $res = $obj->execute_query($conn, $query);
          // if($res){
          //   echo json_encode(array("success"=>""));
          // }
          // else{

          // }
        }
      }
      // Close opened CSV file
      fclose($csvFile);

      $qstring = '?status=succ';
      // $message = array("success"=>"Imported successfully");
    } else {
      //  $message = array("error"=> "file not uploaded");
      $qstring = '?status=err';
    }
  } else {
    // $message = array("error"=> "Invalid file uploaded");
    $qstring = '?status=invalid_file';
  }# code...
}
// echo json_encode($message)
header('location:' . SITEURL . 'department/index.php?page=students&'.$qstring);
