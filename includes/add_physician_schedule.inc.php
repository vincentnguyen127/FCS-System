<?php
    session_start();
    if(isset($_POST["submit"])){

        $physician_id = $_SESSION["physicianID"];
        $schedule_date=$_POST["doctor_schedule_date"];
        $schedule_start_time=$_POST["doctor_schedule_start_time"];
        $schedule_end_time=$_POST["doctor_schedule_end_time"];
        $schedule_day=$_POST["doctor_schedule_day"];

        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        createPhysicianSchedule($conn,$schedule_date,$schedule_start_time,$schedule_end_time,$physician_id,$schedule_day);
    }
    else{
        header("location: ../physician_schedule.php");
        exit();
    }
?>