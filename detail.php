<?php 
header("Content-type: application/json; charset=utf-8");
$result = ['status' => 0, 'data' => []];
    function pr($t){echo'<pre>';print_r($t);echo'</pre>';} 
    require_once './includes/dbh.inc.php';
if(!empty($_POST['id'])){
    $id=$_POST['id'];

    $query = "Select ps.id ,p.first_name, p.last_name, p.degree, p.speciality, ps.appt_date, ps.appt_day, ps.start_time, ps.appt_end_time
    from physician_schedule ps
    INNER join physician p on ps.physician_id=p.id
    where ps.id=".$id;
    $get = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($get);
    // Close connection
    mysqli_close($conn);
    if(!empty($row)){
        $result['status'] = 1;
        $result['physician_schedule_data'] = $row;
    }
}

echo json_encode($result);
    