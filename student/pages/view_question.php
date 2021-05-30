<?php
include('../config/apply.php');
if (isset($_REQUEST['id']) && $_REQUEST['direction']) {
    $id  = $_REQUEST['id']; #question_id
    $direction = $_REQUEST['direction'];
} else {
    $id = 1; #the first question
}
$tbl_name = "tbl_question";
if ($direction == 'Next') {
    #save answer to database.
    $where = "is_active='yes' && question_id >" . $id . " order by question_id asc";
} elseif ($direction == 'Previous') {
    $where = "is_active='yes'  && question_id <" . $id . " order by question_id desc";
}
$limit = 1;
$query =  $obj->select_random_row($tbl_name, $where, $limit);
$result = $obj->execute_query($conn, $query);
$row = null;
if ($result == true && $obj->num_rows($result) > 0) {
    $row = $obj->fetch_data($result);
    $_SESSION['question_id'] = $row['question_id'];
    echo "<div class='col'>";
    echo "<span class ='badge badge-primary 'style ='padding:10px;'>Question <font color='yellow', size = 10px;>" . $row['question_id'] . "</font></span>";
    echo $row['question'] . "<br>";
    if ($row['image_name'] != '') {
        echo "<img src ='" . SITEURL . "/images/questions/" . $row['image_name'] . "' alt='Supplementary Image'/>";
    }
    echo "</div>";
    echo "<div class='col'>";
    echo "<input type = 'radio' name = 'answer' value = '1' required='true'/><span class ='radio-ans'> " . $row['first_answer'] . "</span><hr /><br />";
    echo "<input type = 'radio' name = 'answer' value = '2' required='true'/><span class ='radio-ans'> " . $row['second_answer'] . "</span><hr /><br />";
    echo "<input type = 'radio' name = 'answer' value = '3' required='true'/><span class ='radio-ans'> " . $row['third_answer'] . "</span><hr /><br />";
    echo "<input type = 'radio' name = 'answer' value = '4' required='true'/><span class ='radio-ans'> " . $row['fourth_answer'] . "</span><hr /><br />";
    echo "<input type = 'radio' name = 'answer' value = '5' required='true'/><span class ='radio-ans'> " . $row['fifth_answer'] . "</span><hr /><br />";
    echo "<input type = 'hidden' name = 'question_id' id='q_id' value = '" . $row['question_id'] . "'/>";
    echo "<input type = 'hidden' name = 'right_answer' value = '" . $row['answer'] . "'/>";
    echo "<input type = 'hidden' name = 'marks' value = '" . $row['marks'] . "'/>";
    echo "</div>";
} else {
    echo "No previous question.";
}

?>
<!-- question -->