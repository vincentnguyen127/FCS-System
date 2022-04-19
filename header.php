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
    <link rel="stylesheet" href="/css/Home_Patient.css" />
    <link rel="stylesheet" type="text/css" href="css/Appointment.css">
    <title></title>
    <div class="header">
     <img src="/images/logo.png">
    </div>
    
<div class="navbar row">
    <ul>
        <?php 
          if (isset($_SESSION["patientID"])){
            echo "<li><a href='home_patient.php'>Home</a></li>";
            echo "<li><a href='book_appointment.php'>Book Appointment</a></li>";
            echo "<li><a href='Appointment.php'>Appointment</a></li>";
            echo "<li><a href='Past_Appointment.html'>Rating</a></li>";
            echo "<li><a href='patient_profile.php'>Profile</a></li>";
            echo "<li><a href='patient_login.php'>Log Out</a></li>";  
          }
          else{
            echo "<li><a href='singup.php'>Sign up</a></li>";
            echo "<li><a href='login.php'>Log In</a></li>";
          }
        ?>
              
      </ul>
</div>
</head>