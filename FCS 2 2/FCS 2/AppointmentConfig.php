<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title> Appointment Form </title>
</head>
<body>

<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'itsm6213');
define('DB_PASSWORD', 'goodle40');
define('DB_NAME', 'FCSLogin');

/* Attempt to connect to MySQL database */
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

//Select database
mysqli_select_db ($conn, 'appointment' );

$dob = date('Y-m-d', strtotime($_POST['date']));

$query = "INSERT INTO appointment_info SET
FIRST_NAME = '$_POST[firstname]',
LAST_NAME = '$_POST[lastname]',
SERVICE = '$_POST[service]',
OTHER = '$_POST[other]',
DATE_APP = '$dob'";


// Insert SQL data in MySQL database table
if(mysqli_query($conn, $query)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $query. " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>

</body>
</html>
