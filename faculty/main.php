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
            include('./login.php');
        }
        break;

    case "department": {
            include('department.php');
        }
        break;

    case "exams": {
            include('exams.php');
        }
        break;

    case "heads": {
            include('dept_head.php');
        }
        break;

    case "logout": {
            if (isset($_SESSION['dean'])) {
                unset($_SESSION['dean']);
                header('location:' . SITEURL . 'faculty/index.php?page=login');
            }
        }
        break;

    default: {
            include('dashboard.php');
        }
}
