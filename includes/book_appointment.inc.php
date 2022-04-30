<?php 
session_start();
require_once 'dbh.inc.php';
require_once 'functions.inc.php';
if(isset($_POST["submit"])){
    $patient_id = $_SESSION["patientID"];
    echo $patient_id;
    $physician_schedule_id = $_POST["hidden_physician_schedule_id"];
    $service = $_POST["service"];  
    $other_reason = $_POST["other_reason"];
   
    $query = "INSERT INTO appointment 
(service, other, patient_Id, physician_schedule_id) 
VALUES ( '$service','$other', $patient_id,$physician_schedule_id);";

$result = mysqli_query($conn, $query);
if($result)
{
    $sql = "UPDATE physician_schedule set appt_status='Booked' where id=$physician_schedule_id";
    mysqli_query($conn,$sql);
    echo '<script> alert("Your Appointment is Booked"); </script>';
    header("location: ../book_appointment.php?error=none");
    exit();
}
else{
    echo '<script> alert("You can not book an appointment at this time"); </script>';
    header("location: ../book_appointment.php?error=failed");
    exit();
}
}


else{
    // header("location: ../patient_login.php");
    exit();
}

// $query_run = getPhysicianSchedule($conn); 

mysqli_close($conn);
?>