<?php
    if(isset($_POST["submit"])){
        $rating = $_POST['rating'];
        $headline = $_POST['headline'];
        $feedback = $_POST['feedback'];
        $appointment_id= $_POST['appointment_id'];
        $physician_schedule_id= $_POST['physician_schedule_id'];

        // echo $appointment_id;
        echo $physician_schedule_id;

        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        createRating($conn,$rating,$headline,$feedback,$appointment_id,$physician_schedule_id);
        
    }
    else{
        // header("location: ../physician_login.php");
        exit();
    }
?>