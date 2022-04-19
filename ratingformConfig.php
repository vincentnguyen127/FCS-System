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
mysqli_select_db ($conn, 'rating_form' );

if(isset($_POST['rating']))
{

  $query = "INSERT INTO `rating_form`
  (`DOCTOR_NAME`, `RATING`, `IMPROVEMENT`, `OTHER`, `FEEDBACK`)
  VALUES ('$_POST[doctorname]','$_POST[ratings]','$_POST[recommend]','$_POST[prefer]','$_POST[feedback]')";

}
// Insert SQL data in MySQL database table
if(mysqli_query($conn, $query)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $query. " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);


 ?>
