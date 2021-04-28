<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'home';
}

switch ($page) {
    case "home": {
            include('dashboard.php');
        }
        break;

    case "login": {
            include('login.php');
        }
        break;

    case "add_user": {
            include('add_user.php');
        }
        break;

    case "courses": {
            include('course.php');
        }
        break;

    case "students": {
            include('student.php');
        }
        break;

    case "teachers": {
            include('teacher.php');
        }
        break;

    case "exams": {
            include('exam.php');
        }
        break;

    case "faculties": {
            include('faculties.php');
        }
        break;

    case "add_faculty": {
            include('add_faculty.php');
        }
        break;

    case "update_faculty": {
            include('update_faculty.php');
        }
        break;

    case "Questions": {
            include('Questions.php');
        }
        break;

    case "add_question": {
            include('add_question.php');
        }
        break;

    case "update_question": {
            include('update_question.php');
        }
        break;

    case "results": {
            include('results.php');
        }
        break;

    case "view_result": {
            include('view_result.php');
        }
        break;

    case "settings": {
            include('settings.php');
        }
        break;

    case "logout": {
            if (isset($_SESSION['user'])) {
                unset($_SESSION['user']);
                header('location:' . SITEURL . 'department/index.php?page=login');
            }
        }
        break;

    default: {
            include('dashboard.php');
        }
}
