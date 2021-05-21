<?php
include('config/apply.php');
// login
if ($_POST['action'] == 'login') {
    if ($_POST['page'] == 'teacher') {
        # code...
        $username = $_POST['username'];
        $password = $_POST['password'];
        $tbl_name = "tbl_teacher";
        $where = "username='$username' and password ='$password'";
        $query = $obj->select_data($tbl_name, $where);
        $res = $obj->execute_query($conn, $query);
        $row = $obj->fetch_data($res);
        $count_rows = $obj->num_rows($res);
        if ($count_rows == 1) {
            $_SESSION['teacher'] = $username;
            $_SESSION['teacher_id'] = $row['id'];
            $_SESSION['dept_id'] = $row['department_id'];
            $_SESSION['full_name'] = $row['first_name'] . " " . $row['last_name'];
            $output = array(
                'success'    =>    true
            );
            $tbl_name = "tbl_department";
            $where = "dept_id= '" . $_SESSION['dept_id'] . "'";
            $query = $obj->select_data($tbl_name, $where);
            $res = $obj->execute_query($conn, $query);
            $row = $obj->fetch_data($res);
            $_SESSION['dept_name'] = $row['department_name'];
        } else {
            $output = array(
                "error" => "Username or Password is invalid. Please try again."
            );
        }
        echo json_encode($output);
    }
}
// add
if ($_POST['action'] == 'Add') {
    if ($_POST['page'] == 'exam') {
        $tbl_name = "tbl_exam";
        $data = "
        course_id='" . $_POST['course_id'] . "',
        time_duration='" . $_POST['online_exam_duration'] . "',
        qns_per_set='" . $_POST['total_questions'] . "',
        status='created',
        added_date='" . date('y-m-d') . "',
        exam_date='" . $_POST['online_exam_datetime'] . "'
        ";
        $query = $obj->insert_data($tbl_name, $data);
        $res = $obj->execute_query($conn, $query);
        if ($res) {
            # code...
            $output = array(
                'success'    =>    'Exam saved'
            );
            echo json_encode($output);
        } else {
            echo json_encode(array("error" => "action failed"));
        }
    }
    if ($_POST['page'] == 'question') {
        #code ...
    }
}

// update
if ($_POST['action'] == 'update') {
}
// delete
if ($_POST['action'] == 'delete') {
}
// fetch
if ($_POST['action'] == 'fetch') {
    if ($_POST['page'] == 'course') {
        $tbl_name = "tbl_course join tbl_teacher on tbl_course.teacher_id = tbl_teacher.id join tbl_year_study on tbl_course.study_year=tbl_year_study.study_year_id
        join tbl_department on tbl_course.department_id=tbl_department.dept_id";
        $where = "tbl_course.teacher_id = '" . $_SESSION['teacher_id'] . "' AND ";
        if (isset($_POST['search']['value'])) {
            $where .= "(";
            $where .= 'course_code LIKE "%' . $_POST["search"]["value"] . '%" ';
            $where .= 'OR course_name LIKE "%' . $_POST["search"]["value"] . '%" ';
            $where .= 'OR first_name LIKE "%' . $_POST["search"]["value"] . '%" ';
            $where .= 'OR last_name LIKE "%' . $_POST["search"]["value"] . '%" ';
            $where .= 'OR year LIKE "%' . $_POST["search"]["value"] . '%" ';
            $where .= ")";
        }
        if (isset($_POST['order'])) {
            $where .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {
            $where .= 'ORDER BY course_id ASC ';
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
            $sub_array[] .= $row['first_name'] . " " . $row['last_name'];
            $sub_array[] .= $row['year'];
            $edit_button = '<button type="button" class="btn btn-primary btn-circle btn-outline edit-data" data-toggle="tooltip" data-placement="top"  title="Click the button to add exam for ' . $row['course_name'] . '" id="' . $row['course_id'] . '"><i class="fa fa-plus fa-lg"> </i></button>';
            $delete_button = $row['department_name'];
            $sub_array[] .= $delete_button;
            $sub_array[] .= $edit_button;
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
    if ($_POST['page'] == 'exam') {
        $tbl_name = "(tbl_exam join tbl_course on tbl_exam.course_id=tbl_course.course_id)
                      join tbl_year_study on tbl_course.study_year=tbl_year_study.study_year_id
                      join tbl_teacher on tbl_course.teacher_id = tbl_teacher.id";
        //   left join tbl_invigilator on tbl_exam.examiner_id=tbl_invigilator.examiner_id";
        $where = "tbl_course.teacher_id = '" . $_SESSION['teacher_id'] . "' AND ";
        if (isset($_POST['search']['value'])) {
            $where .= "(";
            $where .= 'exam_id LIKE "%' . $_POST["search"]["value"] . '%" ';
            $where .= 'OR course_name LIKE "%' . $_POST["search"]["value"] . '%" ';
            $where .= 'OR first_name LIKE "%' . $_POST["search"]["value"] . '%" ';
            $where .= 'OR last_name LIKE "%' . $_POST["search"]["value"] . '%" ';
            $where .= 'OR year LIKE "%' . $_POST["search"]["value"] . '%" ';
            $where .= ")";
        }
        if (isset($_POST['order'])) {
            $where .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {
            $where .= ' ORDER BY exam_id ASC ';
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
            $sub_array[] .= $row['exam_id'];
            $sub_array[] .= $row['course_name'];
            $sub_array[] .= $row['first_name'] . " " . $row['last_name'];
            $sub_array[] .= $row['qns_per_set'];
            if ($row['status'] == "created") {
                $sub_array[] .= "<span class='badge badge-success'>" . $row['status'] . "</span>";
            } elseif ($row['status'] == "started") {
                $sub_array[] .= "<span class='badge badge-primary'>" . $row['status'] . "</span>";
            } elseif ($row['status'] == "completed") {
                $sub_array[] .= "<span class='badge badge-danger'>" . $row['status'] . "</span>";
            }
            $sub_array[] .= $row['time_duration'] . " minutes";;
            $sub_array[] .= $row['exam_date'];
            $sub_array[] .= $row['year'];
            $sub_array[] .= '<button type="button" class="btn btn-primary btn-outline btn-circle add-question" data-toggle="tooltip" data-placement="top" title="Click to add Question" id="' . $row['exam_id'] . '"><i class="fa fa-plus "> </i></button>';

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
}
