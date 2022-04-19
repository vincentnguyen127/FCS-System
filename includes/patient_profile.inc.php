<?php

require_once "includes/dbh.inc.php";

$patientid = $_SESSION["patientID"];
$query= "select * from patient where id = '$patientid';";
$result = mysqli_query($conn, $query);
$resultCheck = mysqli_num_rows($result);


if ($resultCheck > 0 )
{
    while($row = mysqli_fetch_assoc($result))
    {
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $middle_name = $row['middle_name'];
        $email = $row['email'];
        $address = $row['address'];
        $phone = $row['phone_number'];
    }
} 
// Close connection
//  mysqli_close($conn);
?>
