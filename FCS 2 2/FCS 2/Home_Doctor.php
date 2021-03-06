<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: doctor_signin.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Doctor | Home</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/Home_Doctor.css">
<!-- Project Logo -->
<div class="header">
  <img src="images/logo.png">
</div>
</head>

<body>
  <!-- Navigation Bar -->
  <div class="navbar">
    <ul>
      <li><a href="Home_Doctor.php">Dashboard</a></li>
      <li><a href="AppointmentList.html">Appointment</a></li>
      <li><a href="#">Patients</a></li>
      <li><a href="Rating_Doctor.php">Patient Reviews</a></li>
      <li><a href="doctor_logout.php">Log Out</a></li>
    </ul>
  </div>
  <!-- Section 1 -->
  <div class="row">
    <div class="column">
      <h2>Upcoming Appointment</h2>
      <ol>
        <li>Patient's Name: Testing 1</li>
          <ul>
            <li>Date: </li>
            <li>Time: </li>
          </ul>
        <li>Patient's Name: Testing 2</li>
          <ul>
            <li>Date: </li>
            <li>Time: </li>
          </ul>
        <li>Patient's Name: Testing 3</li>
          <ul>
            <li>Date: </li>
            <li>Time: </li>
          </ul>
      </ol>

    </div>
    <div class="column">
      <h2>Latest Appointment</h2>
      <ol>
        <li>Patient's Name: Testing 1</li>
          <ul>
            <li>Date: </li>
            <li>Time: </li>
            <li>Status: </li>
          </ul>
        <li>Patient's Name: Testing 2</li>
          <ul>
            <li>Date: </li>
            <li>Time: </li>
            <li>Status: </li>
          </ul>
        <li>Patient's Name: Testing 3</li>
          <ul>
            <li>Date: </li>
            <li>Time: </li>
            <li>Status: </li>
          </ul>
      </ol>
    </div>


  </div>
</body>

<!-- Footer -->
<div class="footer">
  <p>ISTM 6210 Capstone Project | Spring 2022</p>
  <!-- Show current Date & Time -->
  <p id="date" style="text-align: center; color: white; font-size: 10pt"></p>
  <script>
    document.getElementById("date").innerHTML = Date();
  </script>
</div>

<!-- JAVASCRIPT FILES -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/Headroom.js"></script>
<script src="js/jQuery.headroom.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/custom.js"></script>

</html>
