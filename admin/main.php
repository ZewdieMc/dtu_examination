<?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'home';
}


switch ($page) {
    case "home": {
            include('./dashboard.php');
        }
        break;
    case "faculty": {
            include("./faculty.php");
        }
        break;
    case "change_password": {
            include("./change_password.php");
        }
        break;
    case "change_profile": {
            include("./change_profile.php");
        }
        break;

    case "login": {
            include('login.php');
        }
        break;
    case "exams": {
            include('./exams.php');
        }
        break;

    case "deans": {
            include('./faculty_deans.php');
        }
        break;



    case "settings": {
            include('./settings.php');
        }
        break;

    case "logout": {
            if (isset($_SESSION['admin'])) {
                unset($_SESSION['admin']);
                header('location:' . SITEURL . 'admin/index.php?page=login');
            }
        }
        break;

    default: {
            include('dashboard.php');
        }
}
