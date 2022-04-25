<?php 
header("Content-type: application/json; charset=utf-8");
$result = ['status' => 0, 'data' => []];
    function pr($t){echo'<pre>';print_r($t);echo'</pre>';} 
    require_once './includes/dbh.inc.php';
if(!empty($_POST['id'])){
    $id=$_POST['id'];

    $query = "Select * from physician
    where id=".$id;
    $get = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($get);
    // Close connection
    mysqli_close($conn);
    if(!empty($row)){
        $result['status'] = 1;
        $result['patient_data'] = $row;
    }
}

echo json_encode($result);
    