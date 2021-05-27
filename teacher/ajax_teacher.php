<?php
include('config/apply.php');
function Get_exam_question_limit($exam_id, $conn, $obj)
{
    $tbl_name = "tbl_exam";
    $where = "exam_id = '$exam_id'";
    $query = $obj->select_data($tbl_name, $where);

    $result = $obj->execute_query($conn, $query);

    foreach ($result as $row) {
        return $row['qns_per_set'];
    }
}

function Get_exam_total_question($exam_id, $conn, $obj)
{

    $tbl_name = "tbl_question";
    $where = "exam_id = '$exam_id'";
    $query = $obj->select_data($tbl_name, $where);
    $res = $obj->execute_query($conn, $query);
    return $obj->num_rows($res);
}
function Is_allowed_add_question($exam_id, $conn, $obj)
{
    $exam_question_limit = Get_exam_question_limit($exam_id, $conn, $obj);

    $exam_total_question = Get_exam_total_question($exam_id, $conn, $obj);

    if ($exam_total_question >= $exam_question_limit) {
        return false;
    }
    return true;
}
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
        $output = "";
        if ($_FILES['question_image']['name'] != "") {
            //Getting File Extension
            $value = explode('.', $_FILES['question_image']['name']);
            $ext = end($value);
            //Checking if the file type is valid or not
            $valid_file = $obj->check_image_type($ext);
            if ($valid_file == false) {
                $output = "<div class='error'>Invalid Image type. Please use JPG or PNG or GIF file type.</div>";
                die();
            }
            //Uploading if the file is valid
            //first changing image name
            $new_name = 'DTU_exam_' . $obj->uniqid();
            $image_name = $new_name . '.' . $ext;
            //Adding Watermark to the image fie too
            $source = $_FILES['question_image']['tmp_name'];
            $destination = "../images/questions/" . $image_name;
            $upload = $obj->upload_file($source, $destination);
            if ($upload == false) {
                $output = "<div class='error'>Failed to upload question image. Try again.</div>";
                // header('location:' . SITEURL . 'teacher/index.php?page=add_question&exam_code=' . $_GET['exam_code'] . '');
                die();
            }
        } else {
            $image_name = "";
        }
        //Get all values from the forms
        $question = $obj->sanitize($conn, $_POST['question']);
        $first_answer = $obj->sanitize($conn, $_POST['first_answer']);
        $second_answer = $obj->sanitize($conn, $_POST['second_answer']);
        $third_answer = $obj->sanitize($conn, $_POST['third_answer']);
        $fourth_answer = $obj->sanitize($conn, $_POST['fourth_answer']);
        $fifth_answer = $obj->sanitize($conn, $_POST['fifth_answer']);
        $answer = $obj->sanitize($conn, $_POST['answer']);
        $reason = $obj->sanitize($conn, $_POST['reason']);
        $exam_code = $_POST['exam_id'];
        $marks = $obj->sanitize($conn, $_POST['marks']);
        // $category = $obj->sanitize($conn, $_POST['category']);
        $added_date = date('Y-m-d');

        $tbl_name = 'tbl_question';
        $data = "question='$question',
                                    first_answer='$first_answer',
                                    second_answer='$second_answer',
                                    third_answer='$third_answer',
                                    fourth_answer='$fourth_answer',
                                    fifth_answer='$fifth_answer',
                                    answer='$answer',
                                    reason='$reason',
                                    exam_id='$exam_code',
                                    marks='$marks',
                                    is_active='yes',
                                    added_date='$added_date',
                                    updated_date='',
                                    image_name='$image_name'
                                    ";
        $query = $obj->insert_data($tbl_name, $data);
        $res = $obj->execute_query($conn, $query);
        if ($res === true) {
            $where = "exam_id = '" . $_POST['exam_id'] . "'";
            $query = $obj->select_data($tbl_name, $where);
            $res = $obj->execute_query($conn, $query);
            $counter  = 0;
            while ($row = $obj->fetch_data($res)) {
                $counter++;
                $output .= '<button class="btn btn-primary btn-circle btn-outline btn-sm edit-question" data-question_id = "'.$row['question_id'].'">'.$counter.'</button>&nbsp;';
            }
            $counter = 0;
        } else {
            $output =  "Failed to add the question. Please try again";
        }
        echo $output;
    }
}

// update
if ($_POST['action'] == 'update') {
}
// delete
if ($_POST['action'] == 'delete') {
    if ($_POST['page']=='question') {
        $tbl_name = "tbl_question";
        $where = "question_id = '".$_POST['question_id']."' and exam_id = '".$_POST['exam_id']."'";
        $query = $obj->delete_data($tbl_name,$where);
        $res = $obj->execute_query($conn,$query);
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
            if (Is_allowed_add_question($row['exam_id'], $conn, $obj)) {
                # code...
                $sub_array[] .= '<button type="button" class="btn btn-primary btn-outline btn-circle add-question" data-toggle="tooltip" data-placement="top" title="Click to add Question" id="' . $row['exam_id'] . '"><i class="fa fa-plus "> </i></button>';
            } else {
                $sub_array[] .= '<button type="button" class="btn btn-danger  btn-circle view-question" data-toggle="tooltip" data-placement="top" title="Click to view Questions" id="' . $row['exam_id'] . '"><i class="fa fa-eye "> </i></button>';
            }

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
    if ($_POST['page'] == "load_question") {
        $tbl_name = "tbl_question";
        $other = "";
        if ($_POST['question_id'] == '') {
            $where = "exam_id = '" . $_POST['exam_id'] . "'";
            $other .= "ORDER BY question_id ASC LIMIT 1";
            // display the first question
        } else {
            $where = "question_id = '" . $_POST["question_id"] . "'";
        }
        $query  = $obj->select_data($tbl_name, $where, $other);
        $res = $obj->execute_query($conn, $query);


        $output = '';
        $prev_next = '';
        while ($row = $obj->fetch_data($res)) {
            $output .= ' <h4>' . $row["question"] . '(<font color = "green">' . $row['marks'] . ' marks</font>)
            <a class="delete_question" id="' . $row['question_id'] . '"><i class="fa fa-trash fa-lg "data-toggle="tooltip" data-placement="top"  title="Click to delete the question" style="color:red"></i></a>
            </h4>
				<hr />
				<br />';
                if ($row['image_name']!="") {
                    $output .= '<img src="'.SITEURL.'images/questions/'.$row['image_name']. '" class="rounded" alt="Supplementary Image" height="100%" width = "100%"/><hr>';
                }
				$output .= '<div class="row">';

            $output .= '
                        <div class="col-md-6" style="margin-bottom:32px;">
                            <div class="radio">
                                <label><h4><input type="radio" name="option_1" class="answer_option" data-question_id="' . $row["question_id"] . '" data-id="1"/>&nbsp;' . $row["first_answer"] . '</h4></label>
                            </div>
                        </div>';
            $output .= '
                        <div class="col-md-6" style="margin-bottom:32px;">
                            <div class="radio">
                                <label><h4><input type="radio" name="option_1" class="answer_option" data-question_id="' . $row["question_id"] . '" data-id="1"/>&nbsp;' . $row["second_answer"] . '</h4></label>
                            </div>
                        </div>';
            $output .= '
                        <div class="col-md-6" style="margin-bottom:32px;">
                            <div class="radio">
                                <label><h4><input type="radio" name="option_1" class="answer_option" data-question_id="' . $row["question_id"] . '" data-id="1"/>&nbsp;' . $row["third_answer"] . '</h4></label>
                            </div>
                        </div>';
            $output .= '
                        <div class="col-md-6" style="margin-bottom:32px;">
                            <div class="radio">
                                <label><h4><input type="radio" name="option_1" class="answer_option" data-question_id="' . $row["question_id"] . '" data-id="1"/>&nbsp;' . $row["fourth_answer"] . '</h4></label>
                            </div>
                        </div>';
            $output .= '
                        <div class="col-md-6" style="margin-bottom:32px;">
                            <div class="radio">
                                <label><h4><input type="radio" name="option_1" class="answer_option" data-question_id="' . $row["question_id"] . '" data-id="1"/>&nbsp;' . $row["fifth_answer"] . '</h4></label>
                            </div>
                        </div>';

            $output .= '
				</div>
				';
            $tbl_name = "tbl_question";
            $where = "
				question_id < '" . $row['question_id'] . "' 
				AND exam_id = '" . $_POST["exam_id"] . "'  
				order by question_id DESC LIMIT 1";
            $query = $obj->select_data($tbl_name, $where);
            $res = $obj->execute_query($conn, $query);
            $previous_row = $obj->fetch_data($res);

            $previous_id = '';
            $next_id = '';
            $previous_id = $previous_row['question_id'];

            $where = "
				question_id > '" . $row['question_id'] . "' 
				AND exam_id = '" . $_POST["exam_id"] . "' 
				ORDER BY   question_id ASC LIMIT 1";
            $query = $obj->select_data($tbl_name, $where);
            $ress = $obj->execute_query($conn, $query);
            $next_row = $obj->fetch_data($ress);

            $next_id = $next_row['question_id'];

            $if_previous_disable = '';
            $if_next_disable = '';

            if ($previous_id == "") {
                $if_previous_disable = 'disabled';
            }

            if ($next_id == "") {
                $if_next_disable = 'disabled';
            }

            $prev_next = '
					<br /><br />
				  	<div align="center">
				   		<button type="button" name="previous" class="btn btn-sm btn-primary btn-outline btn-rounded btn-lg previous" id="' . $previous_id . '" ' . $if_previous_disable . '>Previous</button>
				   		<button type="button" name="next" class="btn btn-primary btn-sm btn-lg btn-outline btn-rounded next" id="' . $next_id . '" ' . $if_next_disable . '>Next</button>
				  	</div>
				  	<br /><br />';
                      $output .= $prev_next;
        }
        $data = array(
            "question" =>$output,
            "nav" => $prev_next
        );

        echo json_encode($data);
    }
    if ($_POST['page'] == "navigation") {
        # code...
        $tbl_name = "tbl_question";
        $where = "
				exam_id = '" . $_POST["exam_id"] . "' 
				ORDER BY question_id ASC 
				";
        $query = $obj->select_data($tbl_name, $where);
        $res = $obj->execute_query($conn, $query);
        // $result = $obj->fetch_data($res);
        $output = '
			<div class="card">
				<div class="card-header bg-success">Question Navigation</div>
				<div class="card-body">
					<div class="row">
			';
        $count = 1;
        while ($row = $obj->fetch_data($res)) {
            $output .= '
				<div class="col-sm-2" style="margin-bottom:10px;">
					<button type="button" class="btn btn-primary btn-sm btn-circle btn-outline question_navigation" data-question_id="' . $row["question_id"] . '">' . $count . '</button>
				</div>
				';
            $count++;
        }
        $output .= '
				</div>
			</div></div>
			';
        echo $output;
    }
}
// edit_fetch
if ($_POST['action'] == 'edit_fetch') {
    if ($_POST['page']='question') {
        # code...
    }
}
