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
if ($_POST['action']=="fetch") {
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
        $var = '';
        while ($row = $obj->fetch_data($res)) {
            $output .= ' <h4>' . $row["question"] . '(<font color = "green">' . $row['marks'] . ' marks</font>)</h4>
				<hr />
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
				   		<button type="button" name="previous" class="btn btn-sm btn-primary btn-outline btn-rounded btn-lg previous" id="' . $previous_id . '" ' . $if_previous_disable . '>Previous</button>
				   		<button type="button" name="next" class="btn btn-primary btn-sm btn-lg btn-outline btn-rounded next" id="' . $next_id . '" ' . $if_next_disable . '>Next</button>
				  	</div>
				  	<br />';
            $output .= $prev_next;
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
}

?>