<?php
include('config/apply.php');
// Read Operation
if ($_POST['action'] == 'fetch') {
    if ($_POST['page'] == 'student') {
        $output = array();
        $tbl_name = "tbl_student join tbl_year_study on tbl_student.study_year=tbl_year_study.study_year_id";
        $where = " tbl_student.department_id = '" . $_SESSION['dept_id'] . "' AND";
        if (isset($_POST['search']['value'])) {
            $where .= "(";
            $where .= 'first_name LIKE "%' . $_POST["search"]["value"] . '%" ';
            $where .= 'OR last_name LIKE "%' . $_POST["search"]["value"] . '%" ';
            $where .= 'OR email LIKE "%' . $_POST["search"]["value"] . '%" ';
            $where .= 'OR year LIKE "%' . $_POST["search"]["value"] . '%" ';
            $where .= 'OR gender LIKE "%' . $_POST["search"]["value"] . '%" ';
            $where .= 'OR contact LIKE "%' . $_POST["search"]["value"] . '%" ';
            $where .= 'OR student_id LIKE "%' . $_POST["search"]["value"] . '%" ';
            $where .= ")";
        }
        if (isset($_POST['order'])) {
            $where .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {
            $where .= 'ORDER BY student_id ASC ';
        }

        $other = '';

        if ($_POST['length'] != -1) {
            $other .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }

        $query = $obj->select_data($tbl_name, $where);
        $res = $obj->execute_query($conn, $query);
        $filtered_rows = $obj->num_rows($res);
        $data = array();
        while ($row = $obj->fetch_data($res)) {
            $sub_array = array();
            $sub_array[] .= $row['student_id'];
            $sub_array[] .= $row['first_name'];
            $sub_array[] .= $row['last_name'];
            $sub_array[] .= $row['email'];
            $sub_array[] .= $row['contact'];
            $sub_array[] .= $row['gender'];
            $sub_array[] .= $row['year'];
            $edit_button = '<a class="edit-data" id="' . $row['student_id'] . '"><i class="fa fa-pencil fa-lg text-blue "></i></a>';
            $delete_button = '<a id="delete_student" data-id="' . $row['student_id'] . '" ><i class="fa fa-trash fa-lg"></i></a>';
            $sub_array[] .= $edit_button;
            $sub_array[] .= $delete_button;
            $data[] = $sub_array;
        }
        $where = "";
        $query = $obj->select_data($tbl_name, $where);
        $res = $obj->execute_query($conn, $query);
        $total_rows = $obj->num_rows($res);
        $output = array(
            "draw"                =>    intval($_POST["draw"]),
            "recordsTotal"        =>    $total_rows,
            "recordsFiltered"    =>    $filtered_rows,
            "data"                =>    $data
        );
        echo json_encode($output);
    }
    if ($_POST['page'] == 'teacher') {
        $output = array();
        $tbl_name = "tbl_teacher join tbl_department on tbl_teacher.department_id=tbl_department.dept_id";
        $where = " tbl_teacher.department_id = '" . $_SESSION['dept_id'] . "' AND";
        if (isset($_POST['search']['value'])) {
            $where .= "(";
            $where .= 'first_name LIKE "%' . $_POST["search"]["value"] . '%" ';
            $where .= 'OR last_name LIKE "%' . $_POST["search"]["value"] . '%" ';
            $where .= 'OR email LIKE "%' . $_POST["search"]["value"] . '%" ';
            $where .= 'OR username LIKE "%' . $_POST["search"]["value"] . '%" ';
            $where .= 'OR id LIKE "%' . $_POST["search"]["value"] . '%" ';
            $where .= ")";
        }
        if (isset($_POST['order'])) {
            $where .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {
            $where .= 'ORDER BY id ASC ';
        }

        $other = '';

        if ($_POST['length'] != -1) {
            $other .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }

        $query = $obj->select_data($tbl_name, $where);
        $res = $obj->execute_query($conn, $query);
        $filtered_rows = $obj->num_rows($res);
        $data = array();
        while ($row = $obj->fetch_data($res)) {
            $sub_array = array();
            $sub_array[] .= $row['id'];
            $sub_array[] .= $row['first_name'];
            $sub_array[] .= $row['last_name'];
            $sub_array[] .= $row['email'];
            $sub_array[] .= $row['username'];
            $edit_button = '<a class="edit-data" id="' . $row['id'] . '"><i class="fa fa-pencil fa-lg text-blue"></i></a>';
            $delete_button = '<a id="delete_teacher" data-id="' . $row['id'] . '" ><i class="fa fa-trash fa-lg"></i></a>';
            $sub_array[] .= $edit_button;
            $sub_array[] .= $delete_button;
            $data[] = $sub_array;
        }
        $where = "";
        $query = $obj->select_data($tbl_name, $where);
        $res = $obj->execute_query($conn, $query);
        $total_rows = $obj->num_rows($res);
        $output = array(
            "draw"                =>    intval($_POST["draw"]),
            "recordsTotal"        =>    $total_rows,
            "recordsFiltered"    =>    $filtered_rows,
            "data"                =>    $data
        );
        echo json_encode($output);
    }
    if ($_POST['page'] == 'course') {
        $tbl_name = "tbl_course join tbl_teacher on tbl_course.teacher_id = tbl_teacher.id join tbl_year_study on tbl_course.study_year=tbl_year_study.study_year_id";
        $where = "tbl_course.department_id = '".$_SESSION['dept_id']."' AND";
        if (isset($_POST['search']['value'])) {
            $where .= "(";
            $where .= 'course_code LIKE "%' . $_POST["search"]["value"] . '%" ';
            $where .= 'OR course_name LIKE "%' . $_POST["search"]["value"] . '%" ';
            $where .= 'OR first_name LIKE "%' . $_POST["search"]["value"] . '%" ';
            $where .= 'OR year LIKE "%' . $_POST["search"]["value"] . '%" ';
            $where .= ")";
        }
        if (isset($_POST['order'])) {
            $where .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {
            $where .= 'ORDER BY course_id ASC ';
        }

        $other = '';

        if ($_POST['length'] != -1) {
            $other .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }

        $query = $obj->select_data($tbl_name, $where);
        $res = $obj->execute_query($conn, $query);
        $filtered_rows = $obj->num_rows($res);
        $data = array();
        while ($row = $obj->fetch_data($res)) {
            $sub_array = array();
            $sub_array[] .= $row['course_id'];
            $sub_array[] .= $row['course_code'];
            $sub_array[] .= $row['course_name'];
            $sub_array[] .= $row['first_name']." ".$row['last_name'];
            $sub_array[] .= $row['year'];
            $edit_button = '<a class="edit-data" id="' . $row['course_id'] . '"><i class="fa fa-pencil fa-lg text-blue "></i></a>';
            $delete_button = '<a id="delete_course" data-id="' . $row['course_id'] . '" ><i class="fa fa-trash fa-lg"></i></a>';
            $sub_array[] .= $edit_button;
            $sub_array[] .= $delete_button;
            $data[] = $sub_array;
        }
        $where = "";
        $query = $obj->select_data($tbl_name, $where);
        $res = $obj->execute_query($conn, $query);
        $total_rows = $obj->num_rows($res);
        $output = array(
            "draw"                =>    intval($_POST["draw"]),
            "recordsTotal"        =>    $total_rows,
            "recordsFiltered"    =>    $filtered_rows,
            "data"                =>    $data
        );
        echo json_encode($output);

    }
    if ($_POST['page'] == 'examiner') {
    }
}
// Read for update Operation
if ($_POST['action'] == 'edit_fetch') {
    if ($_POST['page'] == 'student') {
        $tbl_name = "tbl_student";
        $dept_id = $_SESSION['dept_id'];
        $where = "student_id ='" . $_POST['student_id'] . "'";
        $query = $obj->select_data($tbl_name, $where);
        $res = $obj->execute_query($conn, $query);
        while ($row = $obj->fetch_data($res)) {
            $output['first_name'] = $row['first_name'];
            $output['last_name'] = $row['last_name'];
            $output['username'] = $row['username'];
            $output['email'] = $row['email'];
            $output['contact'] = $row['contact'];
        }
        echo json_encode($output);
    }
    if ($_POST['page'] == 'teacher') {
        $tbl_name = "tbl_teacher";
        $where = "id ='" . $_POST['teacher_id'] . "'";
        $query = $obj->select_data($tbl_name, $where);
        $res = $obj->execute_query($conn, $query);
        while ($row = $obj->fetch_data($res)) {
            $output['first_name'] = $row['first_name'];
            $output['last_name'] = $row['last_name'];
            $output['username'] = $row['username'];
            $output['email'] = $row['email'];
        }
        echo json_encode($output);
    }
    if ($_POST['page'] == 'course') {
        $tbl_name = "tbl_course";
        $where = "course_id ='" . $_POST['course_id'] . "'";
        $query = $obj->select_data($tbl_name, $where);
        $res = $obj->execute_query($conn, $query);
        while ($row = $obj->fetch_data($res)) {
            $output['course_code'] = $row['course_code'];
            $output['course_name'] = $row['course_name'];
        }
        echo json_encode($output);
    }
}
// Update Opeartion
if ($_POST['action'] == 'update') {
    if ($_POST['page'] == 'student') {
        $tbl_name = "tbl_student";
        $data = "
        first_name = '" . $_POST["first_name"] . "',
        last_name = '" . $_POST["last_name"] . "',
        email = '" . $_POST["email"] . "',
        username = '" . $_POST["username"] . "',
        password = '" . $_POST["password"] . "',
        contact = '" . $_POST["contact"] . "',
        gender = '" . $_POST["gender"] . "',
        study_year = '" . $_POST["study_year"] . "',
        academic_year = '" . date("Y") . "',
        is_active = 'no',
        updated_date = '" . date("Y-m-d") . "'
        ";
        $where = "student_id='" . $_POST['student_id'] . "'";
        $query = $obj->update_data($tbl_name, $data, $where);
        $res = $obj->execute_query($conn, $query);
        if ($res) {
            # code...
            $output = array(
                'success'    =>    'Student Registered'
            );
            echo json_encode($output);
        } else {
            echo json_encode(array("error" => "Registration failed"));
        }
    }
    if ($_POST['page'] == 'teacher') {
        //
        $tbl_name = "tbl_teacher";
        $data = "
        first_name = '" . $_POST["first_name"] . "',
        last_name = '" . $_POST["last_name"] . "',
        email = '" . $_POST["email"] . "',
        username = '" . $_POST["username"] . "',
         password = '" . $_POST["password"] . "'
        ";
        $where = "id = '" . $_POST['teacher_id'] . "'";
        $query = $obj->update_data($tbl_name, $data, $where);
        $res = $obj->execute_query($conn, $query);
        if ($res) {
            # code...
            $output = array(
                'success'    =>    'Teacher Registered'
            );
            echo json_encode($output);
        } else {
            echo json_encode(array("error" => "Registration failed"));
        }
    }
    if ($_POST['page'] == 'course') {
        $tbl_name = "tbl_course";
        $data = "
        course_code = '" . $_POST["course_code"] . "',
        course_name = '" . $_POST["course_name"] . "',
        teacher_id = '" . $_POST["teacher"] . "',
        study_year = '" . $_POST["study_year"] . "' ";
        $where = "course_id = '".$_POST['course_id']."'";
        $query = $obj->update_data($tbl_name, $data,$where);
        $res = $obj->execute_query($conn, $query);
        if ($res) {
            # code...
            $output = array(
                'success'    =>    'Course Updated'
            );
            echo json_encode($output);
        } else {
            echo json_encode(array("error" => "action failed"));
        }
    }
}
// Create Operation
if ($_POST['action'] == 'Add') {
    if ($_POST['page'] == 'student') {
        #code...
        $tbl_name = "tbl_student";
        $data = "
        first_name = '" . $_POST["first_name"] . "',
        last_name = '" . $_POST["last_name"] . "',
        email = '" . $_POST["email"] . "',
        username = '" . $_POST["username"] . "',
        password = '" . $_POST["password"] . "',
        contact = '" . $_POST["contact"] . "',
        gender = '" . $_POST["gender"] . "',
        study_year = '" . $_POST["study_year"] . "',
        department_id = '" . $_SESSION["dept_id"] . "',
        academic_year = '" . date("Y") . "',
        is_active = 'no',
        added_date = '" . date("Y-m-d") . "'
        ";
        $query = $obj->insert_data($tbl_name, $data);
        $res = $obj->execute_query($conn, $query);
        if ($res) {
            # code...
            $output = array(
                'success'    =>    'Student Registered'
            );
            echo json_encode($output);
        } else {
            echo json_encode(array("error" => "Registration failed"));
        }
    }
    if ($_POST['page'] == 'teacher') {
        $tbl_name = "tbl_teacher";
        $data = "
        first_name = '" . $_POST["first_name"] . "',
        last_name = '" . $_POST["last_name"] . "',
        email = '" . $_POST["email"] . "',
        username = '" . $_POST["username"] . "',
        password = '" . $_POST["password"] . "',
        department_id = '" . $_SESSION["dept_id"] . "'
        ";
        $query = $obj->insert_data($tbl_name, $data);
        $res = $obj->execute_query($conn, $query);
        if ($res) {
            # code...
            $output = array(
                'success'    =>    'Teacher saved'
            );
            echo json_encode($output);
        } else {
            echo json_encode(array("error" => "action failed"));
        }
    }
    if ($_POST['page'] == 'course') {
        $tbl_name = "tbl_course";
        $data = "
        course_code = '" . $_POST["course_code"] . "',
        course_name = '" . $_POST["course_name"] . "',
        teacher_id = '" . $_POST["teacher"] . "',
        study_year = '" . $_POST["study_year"] . "',
        department_id = '" . $_SESSION["dept_id"] . "'
        ";
        $query = $obj->insert_data($tbl_name, $data);
        $res = $obj->execute_query($conn, $query);
        if ($res) {
            # code...
            $output = array(
                'success'    =>    'Course saved'
            );
            echo json_encode($output);
        } else {
            echo json_encode(array("error" => "action failed"));
        }
    }
}
// Delete Operation
if ($_POST['action'] == 'delete') {
    // delete student
    if ($_POST['page'] == 'student') {
        $tbl_name = "tbl_student";
        $where = "student_id='" . $_POST['student_id'] . "'";
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
    if ($_POST['page'] == 'teacher') {
        $tbl_name = "tbl_teacher";
        $where = "id='" . $_POST['teacher_id'] . "'";
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
    if ($_POST['page'] == 'course') {
        $tbl_name = "tbl_course";
        $where = "course_id='" . $_POST['course_id'] . "'";
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
}
