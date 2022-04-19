<?php
    session_start();
    if(isset($_POST["submit"])){

        $patientid = $_SESSION["patientID"];
        $service = $_POST[service];
        $other = $_POST[other];
        $date_app = date('Y-m-d', strtotime($_POST['date']));

        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        createAppointment($conn,$service,$other,$date_app,$patientid);
    }
    else{
        header("location: ../appointment.php");
        exit();
    }


?>