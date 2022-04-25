<?php
    if(isset($_POST["submit"])){

        $patient_id = $_POST[patient_id];
        $first_name = $_POST[first_name];
        $middle_name = $_POST[middle_name];
        $last_name = $_POST[last_name];
        $degree = $_POST[degree];
        $email = $_POST[email];

        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';
    
        editPhysician($conn,$first_name,$middle_name,$last_name,$degree,$email,$patient_id);

    }
    else{
        header("location: ../admin_patient.php");
        exit();
    }


?>