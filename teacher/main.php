<?php 
    if(isset($_GET['page']))
    {
        $page=$_GET['page'];
    }
    else
    {
        $page='home';
    }
    
    switch($page)
    {
        case "dashboard":
        {
            include('dashboard.php');
        }
        break;
        
        case "login":
        {
            include('login.php');
        }
        break;
        
        case "exams":
        {
            include('exam.php');
        }
        break;
        
        case "question":
        {
            include('view_question.php');
        }
        break;
        
        case "courses":
        {
            include('course.php');
        }
        break;
        
        case "student_result":
        {
            include('student_result.php');
        }
        break;
        
        case "update_student":
        {
            include('update_student.php');
        }
        break;
        
        case "faculties":
        {
            include('faculties.php');
        }
        break;
        
        case "add_faculty":
        {
            include('add_faculty.php');
        }
        break;
        
        case "update_faculty":
        {
            include('update_faculty.php');
        }
        break;
        
        case "questions":
        {
            include('questions.php');
        }
        break;
        
        case "add_question":
        {
            include('add_question.php');
        }
        break;
        
        case "update_question":
        {
            include('update_question.php');
        }
        break;
        
        case "results":
        {
            include('results.php');
        }
        break;
        
        case "view_result":
        {
            include('view_result.php');
        }
        break;
        
        case "settings":
        {
            include('settings.php');
        }
        break;
        
        case "logout":
        {
            if(isset($_SESSION['teacher']))
            {
                unset($_SESSION['teacher']);
            header('location:'.SITEURL.'teacher/index.php?page=login');
            }
            
        }
        break;
        
        default:
        {
            include('dashboard.php');
        }
    }
?>