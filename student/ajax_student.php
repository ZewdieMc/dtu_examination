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
function change_exam_status($student_id, $conn, $obj)
{
    $current_datetime = date('Y-m-d H:i:s');
    $tbl_name = "tbl_student_exam_enrol inner join tbl_exam on tbl_student_exam_enrol.exam_id = tbl_exam.exam_id";
    $where = "tbl_student_exam_enrol.student_id = '$student_id'"; //thinnk of the where clause the next time.
    $query = $obj->select_data($tbl_name, $where);
    $res = $obj->execute_query($conn, $query);

    while ($row = $obj->fetch_data($res)) {
        $exam_start_time  = $row['exam_date'];
        $duration = $row['time_duration'] . ' minute';
        $exam_end_time = strtotime($exam_start_time . '+' . $duration);
        $exam_end_time = date('Y-m-d H:i:s', $exam_end_time);
        if ($current_datetime >= $exam_start_time && $current_datetime <= $exam_end_time) {
            $data = "status = 'started'";
            $query = $obj->update_data($tbl_name, $data, $where);
            $ress = $obj->execute_query($conn, $query);
        } elseif ($current_datetime > $exam_end_time) {
            $data = "status='completed'";
            $query = $obj->update_data($tbl_name, $data, $where);
            $ress = $obj->execute_query($conn, $query);
        } elseif ($current_datetime < $exam_start_time) {
            $data = "status='created'";
            $query = $obj->update_data($tbl_name, $data, $where);
            $ress = $obj->execute_query($conn, $query);
        }
    }
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
function If_user_already_enroll_exam($conn, $obj, $exam_id, $student_id)
{
    $tbl_name = 'tbl_student_exam_enrol';
    $where = 'exam_id = "' . $exam_id . '" and student_id="' . $student_id . '"';
    $query = $obj->select_data($tbl_name, $where);
    $res = $obj->execute_query($conn, $query);
    if ($obj->num_rows($res) > 0) {
        return true;
    }
    return false;
}
// login
if ($_POST['action'] == 'login') {
    if ($_POST['page'] == 'student') {
        # code...
        $username = $_POST['username'];
        $password = $_POST['password'];
        $tbl_name = "tbl_student";
        $where = "username='$username' and password ='$password'";
        $query = $obj->select_data($tbl_name, $where);
        $res = $obj->execute_query($conn, $query);
        $row = $obj->fetch_data($res);
        $count_rows = $obj->num_rows($res);
        if ($count_rows == 1) {
            $_SESSION['student'] = $username;
            $_SESSION['student_id'] = $row['student_id'];
            $_SESSION['dept_id'] = $row['department_id'];
            $_SESSION['full_name'] = $row['first_name'] . " " . $row['last_name'];
            $_SESSION['study_year'] = $row['study_year'];
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
                "error" => "Username or Password is invalid. Please try againn."
            );
        }
        echo json_encode($output);
    }
}
if ($_POST['action'] == "fetch") {
    if ($_POST['page'] == "load_question") {
        change_exam_status($_SESSION['student_id'], $conn, $obj);
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
        $var = '';
        while ($row = $obj->fetch_data($res)) {
            $output .= ' <h4>' . $row["question"] . '(<font color = "green">' . $row['marks'] . ' marks</font>)</h4>
				<div class = "hr-line-solid"></div>
				<br />';
            if ($row['image_name'] != "") {
                $output .= '<img src="' . SITEURL . 'images/questions/' . $row['image_name'] . '" class="rounded" alt="Supplementary Image" height="100%" width = "100%"/><hr>';
            }
            $output .= '<div class="row">';

            $output .= '<div class="col-md-6" >
                            <div class="i-checks">
                                <label><h4><input type="radio" name="option_1" class="answer_option" data-question_id="' . $row["question_id"] . '" required = "true"/>&nbsp;' . $row["first_answer"] . '</h4></label>
                            </div>
                        </div>';
            $output .= '<div class="col-md-6">
                            <div class="i-checks">
                                <label><h4><input type="radio" name="option_1" class="answer_option" data-question_id="' . $row["question_id"] . '" required ="true"/>&nbsp;' . $row["second_answer"] . '</h4></label>
                            </div>
                        </div>';
            $output .= '<div class="col-md-6">
                            <div class="i-checks">
                                <label><h4><input type="radio" name="option_1" class="answer_option" data-question_id="' . $row["question_id"] . '"required ="true" />&nbsp;' . $row["third_answer"] . '</h4></label>
                            </div>
                        </div>';
            $output .= '<div class="col-md-6">
                            <div class="i-checks">
                                <label><h4><input type="radio" name="option_1" class="answer_option" data-question_id="' . $row["question_id"] . '"required ="true"/>&nbsp;' . $row["fourth_answer"] . '</h4></label>
                            </div>
                        </div>';
            $output .= '<div class="col-md-6">
                            <div class="i-checks">
                                <label ><h4><input type="radio" name="option_1" class="answer_option" data-question_id="' . $row["question_id"] . '" required ="true"/>&nbsp;' . $row["fifth_answer"] . '</h4></label>
                            </div>
                        </div>';

            $output .= '</div>';
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
					<br />
				  	<div align="center">
				   		<button type="button" name="previous" class="btn  btn-primary btn-outline btn-rounded btn-lg previous" id="' . $previous_id . '" ' . $if_previous_disable . '>Previous</button>
				   		<button type="button" name="next" class="btn btn-primary  btn-lg btn-outline btn-rounded next" id="' . $next_id . '" ' . $if_next_disable . '>Next</button>
				  	</div>
				  	<br />';
            // $output .= $prev_next;
            $var = $row['question_id'];
        }
        $data = array(
            "question" => $output,
            "nav" => $prev_next,
            "question_id" => $var
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
				<div class="card-header bg-info .b-r-md">Question Navigation</div>
				<div class="card-body">
					<div class="row">
			';
        $count = 1;
        while ($row = $obj->fetch_data($res)) {
            if ($row['question_id']) {
                $output .= '
                    <div class="col-sm-2" style="margin-bottom:10px;">
                        <button type="button" class="btn btn-primary btn-sm btn-circle btn-outline question_navigation" data-question_id="' . $row["question_id"] . '" id="' . $row["question_id"] . '">' . $count . '</button>
                    </div>
                    ';
                $count++;
            } else {
                break;
            }
        }
        if ($count == 1)
            $output = '';
        else
            $output .= '
				</div>
			</div></div>
			';
        echo $output;
    }
    if ($_POST['page'] == 'exam') {
        change_exam_status($_SESSION['student_id'], $conn, $obj);
        $tbl_name = "(tbl_exam join tbl_course on tbl_exam.course_id=tbl_course.course_id)
                      join tbl_year_study on tbl_course.study_year=tbl_year_study.study_year_id
                      join tbl_teacher on tbl_course.teacher_id = tbl_teacher.id
                      join tbl_student_exam_enrol on tbl_exam.exam_id = tbl_student_exam_enrol.exam_id";
        //   left join tbl_invigilator on tbl_exam.examiner_id=tbl_invigilator.examiner_id";
        $where = "tbl_course.department_id = '" . $_SESSION['dept_id'] . "' and tbl_student_exam_enrol.student_id='".$_SESSION['student_id']."' AND ";
        if (isset($_POST['search']['value'])) {
            $where .= "(";
            // $where .= 'exam_id LIKE "%' . $_POST["search"]["value"] . '%" ';
            $where .= 'course_name LIKE "%' . $_POST["search"]["value"] . '%" ';
            $where .= 'OR first_name LIKE "%' . $_POST["search"]["value"] . '%" ';
            $where .= 'OR last_name LIKE "%' . $_POST["search"]["value"] . '%" ';
            $where .= 'OR exam_date LIKE "%' . $_POST["search"]["value"] . '%" ';
            $where .= 'OR year LIKE "%' . $_POST["search"]["value"] . '%" ';
            $where .= ")";
        }
        if (isset($_POST['order'])) {
            $where .= 'ORDER BY ' . $_POST['order']['0']['column'] . ' ' . $_POST['order']['0']['dir'] . ' ';
        } else {
            $where .= ' ORDER BY course_name ASC ';
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
            // $sub_array[] .= $row['exam_id'];
            $sub_array[] .= $row['course_name'];
            // $sub_array[] .= $row['first_name'] . " " . $row['last_name'];
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

            if ($row['status'] == "started") {
                # code...
                $sub_array[] .= ''; // '<a type="button" class="btn btn-primary btn-rounded btn-outline view_exam" data-toggle="tooltip" data-placement="top" title="Click to work on the exam." id="' . $row['exam_id'] . '">Start</a>';
                $sub_array[] .= '<a href = "' . SITEURL . 'student/index.php?page=Questions&exam_code=' . $row['exam_id'] . '" class="btn btn-primary  btn-circle start_exam" data-toggle="tooltip" data-placement="top" title="Click to see Questions" ><i class="fa fa-eye "> </i></a>';
                // $sub_array[] .= '<button type="button" class="btn btn-primary btn-sm btn-rounded btn-outline view_exam" data-toggle="tooltip" data-placement="top" title="Click to see your result" id="' . $row['exam_id'] . '">View Result</button>';
            } elseif ($row['status'] == "completed") {
                # code...
                $sub_array[] .= '<button type="button" class="btn btn-primary btn-sm btn-rounded btn-outline view_exam" data-toggle="tooltip" data-placement="top" title="Click to see your result" id="' . $row['exam_id'] . '"> Result</button>';
                $sub_array[] .= '';
            } elseif ($row['status'] == "created") {
                # code...
                $sub_array[] .= '';
                $sub_array[] .= '';
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
    if ($_POST['page'] == 'exam_list') {
        $tbl_name = "tbl_exam inner join tbl_course on tbl_exam.course_id = tbl_course.course_id";
        $where = '
        tbl_course.department_id = "' . $_SESSION['dept_id'] . '" and tbl_course.study_year = "' . $_SESSION['study_year'] . '"
        ';
        $query = $obj->select_data($tbl_name, $where);
        $res = $obj->execute_query($conn, $query);
        $result = '<option></option>';
        while ($row = $obj->fetch_data($res)) {
            $result .= "<option value = " . $row['exam_id'] . ">" . $row['course_name'] . "</option>";
        }
        echo $result;
    }
    if ($_POST['page'] == 'exam_detail') {
        $tbl_name = 'tbl_exam inner join tbl_course on tbl_exam.course_id = tbl_course.course_id';
        $where  = 'exam_id = ' . $_POST['exam_id'] . '';
        $query = $obj->select_data($tbl_name, $where);
        $res = $obj->execute_query($conn, $query);
        $output = '
			<div class="card">
				<div class="card-header">Exam Details</div>
				<div class="card-body">
					<table class="table table-striped table-hover table-bordered">
			';
        if ($res) {
            $row = $obj->fetch_data($res);
            $output .= '
				<tr>
					<td><b>Exam Title</b></td>
					<td>' . $row["course_name"] . '</td>
				</tr>
				<tr>
					<td><b>Exam Date & Time</b></td>
					<td>' . $row["exam_date"] . '</td>
				</tr>
				<tr>
					<td><b>Exam Duration</b></td>
					<td>' . $row["time_duration"] . ' Minute</td>
				</tr>
				<tr>
					<td><b>Exam Total Question</b></td>
					<td>' . $row["qns_per_set"] . ' </td>
				</tr>
				
				';
            if (If_user_already_enroll_exam($conn, $obj, $_POST['exam_id'], $_SESSION['student_id'])) {
                $enroll_button = '
					<tr>
						<td colspan="2" align="center">
							<button type="button" name="enroll_button" class="alert alert-danger b-r-xl">Aleady Enrolled</button>
						</td>
					</tr>
					';
            } else {
                $enroll_button = '
					<tr>
						<td colspan="2" align="center">
							<button type="button" name="enroll_button" id="enroll_button" class="btn btn-success btn-rounded btn-outline" data-exam_id="' . $row['exam_id'] . '">Enroll </button>
						</td>
					</tr>
					';
            }
            $output .= $enroll_button;
            $output .= '</table></div></div></div>';
        } else
            $output = "";
        echo $output;
    }
    if ($_POST['page'] == 'user_detail') {
        $tbl_name = 'tbl_student';
        $where = 'student_id = "' . $_SESSION['student_id'] . '"';
        $query = $obj->select_data($tbl_name, $where);
        $res = $obj->execute_query($conn, $query);
        $output = '
			<div class="card">
				<div class="card-header bg-primary text-white">User Details</div>
				<div class="card-body">
					<div class="row">
			';
        if ($res) {
            $row = $obj->fetch_data($res);
            $output .= '

				<div class="col-sm-12">
					<table class="table table-bordered">
						<tr>
							<th>Name</th>
							<td>' . $row["username"] . '</td>
						</tr>
						<tr>
							<th>Email ID</th>
							<td>' . $row["email"] . '</td>
						</tr>
						<tr>
							<th>Gendar</th>
							<td>' . $row["gender"] . '</td>
						</tr>
					</table>
				</div>
				';
        }
        $output .= '</div></div></div>';
        echo $output;
    }
}

if ($_POST['action'] == 'Add') {
    if ($_POST['page'] == 'exam_enrol') {
        if ($_POST['exam_id'] != '' && !If_user_already_enroll_exam($conn, $obj, $_POST['exam_id'], $_SESSION['student_id'])) {
            $tbl_name = "tbl_student_exam_enrol";
            $data = "
                student_id ='" . $_SESSION['student_id'] . "',
                exam_id = '" . $_POST['exam_id'] . "' 
                ";
            $query = $obj->insert_data($tbl_name, $data);
            $res = $obj->execute_query($conn, $query);
            if ($res) {
                echo "Student enrolled to the exam";
            } else {
                echo "Enrollement failed";
            }
        }
        else{
            echo "Your are already enrolled for this course.";
        }
    }
}
