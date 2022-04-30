<?php 
  session_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
 <!-- Required meta tags -->
 <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" type="text/css" href="css/Appointment.css">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="./css/Home_Patient.css" />
    <link rel="stylesheet" type="text/css" href="css/Appointment.css">
    <script
			  src="https://code.jquery.com/jquery-3.6.0.min.js"
			  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
			  crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title></title>
    <div class="header">
     <img src="./images/logo.png">
    </div>
    
<div class="navbar row">
    <ul>
        <?php
          if (isset($_SESSION["patientID"])){
            echo '<p class="h3 text-danger">Welcome Patient: '.$_SESSION["patientName"].'</p>';
            echo "<li><a href='home_patient.php'>Home</a></li>";
            echo "<li><a href='book_appointment.php'>Book Appointment</a></li>";
            echo "<li><a href='my_appointment2.php'>My Appointment</a></li>";
            echo "<li><a href='patient_profile.php'>Profile</a></li>";
            echo "<li><a href='index.php'>Log Out</a></li>";  
          }
          else if (isset($_SESSION["physicianID"])){
            echo '<p class="h3 text-danger">Welcome Physician: '.$_SESSION["physicianName"].'</p>';
            echo "<li><a href='home_patient.php'>Home</a></li>";
            echo "<li><a href='physician_schedule.php'>Physician Schedule</a></li>";
            echo "<li><a href='physician_rating.php'>Rating</a></li>";
            echo "<li><a href='index.php'>Log Out</a></li>";
            // echo "<li><a href='physician_profile.php'>Profile</a></li>";
            // echo "<li><a href='my_appointment2.php'>My Appointment</a></li>";
            // echo "<li><a href='Past_Appointment.html'>Rating</a></li>";
            // echo "<li><a href='patient_profile.php'>Profile</a></li>";
            // echo "<li><a href='patient_login.php'>Log Out</a></li>";  
          }
          else if (isset($_SESSION["adminID"])){
            echo $_SESSION["adminID"];
            echo "<p>Admin </p>";
            echo "<li><a href='home_patient.php'>Home</a></li>";
            echo "<li><a href='admin_patient.php'>Patient</a></li>";
            echo "<li><a href='admin_physician.php'>Physician</a></li>";
            echo "<li><a href='index.php'>Log Out</a></li>";
          }
          else{
            echo "<li><a href='register.php'>Sign up</a></li>";
            echo "<li><a href='patient_login.php'>Patient Login</a></li>";
            echo "<li><a href='physician_login.php'>Physician Login</a></li>";
          }
        ?>
              
      </ul>
</div>
</head>