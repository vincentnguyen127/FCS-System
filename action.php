<?php 
session_start();
header("Content-type: application/json; charset=utf-8");
$result = ['status' => 0];
    function pr($t){echo'<pre>';print_r($t);echo'</pre>';} 
    pr($_POST);
echo $_POST['hidden_physician_schedule_id'];
echo 'abc';
if(!empty($_POST['hidden_physician_schedule_id'])){
    $physician_schedule_id=$_POST['hidden_physician_schedule_id'];
    $patient_id = $_SESSION["patientID"];
    $service = $_SESSION["service"];
    $other_reason = $_SESSION["other_reason"];
    require_once './includes/dbh.inc.php';

$query = "INSERT INTO appointment 
(service, other, patient_Id, physician_schedule_id) 
VALUES ( '$service','$other', $patient_id,$physician_schedule_id);";
$get = mysqli_query($conn, $query);
// $row = mysqli_fetch_assoc($get);

// Close connection
mysqli_close($conn);
// if(!empty($row)){
//     //Chay lenh update o day
//     $reason = $_POST['reason_for_appointment'];
//     mysqli_query($db , "INSERT INTO `ps`.`` (`reason`) VALUES ($reason);");
//     $result['status'] = 1;
// }
}
echo json_encode($result);
echo json_encode($query);
    