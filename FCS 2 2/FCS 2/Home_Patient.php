<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: sign-in.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Patient | FCS Home</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/Home_Patient.css">
<!-- Project Logo -->
<div class="header">
  <img src="images/logo.png">
</div>
</head>

<body>
  <!-- Navigation Bar -->
  <div class="navbar">
    <ul>
      <li><a href="Home_Patient.php">Home</a></li>
      <li><a href="Appointment.php">Appointment</a></li>
      <li><a href="Past_Appointment.html">Rating</a></li>
      <li><a href="Profile.html">Profile</a></li>
      <li><a href="logout.php">Log Out</a></li>
    </ul>
  </div>
  <div class="container">
    <h1>COVID-19 Updates</h1>
        <p>Our clinic continues to be guided and followed by Virginia Department of Health and CDC. As of now, patients are <span style="color: red;">REQUIRED </span>to wear masks in health care facilities in Fairfax County. For more information, please visit <a href="https://www.fairfaxcounty.gov/covid19/face-coverings">Fairfax County</a> website.</p>
  </div>

  <div class="container">
    <img src="images/system.png" >
    <h1>Select a Service</h1>
  </div>

  <div class="row">
    <div class="column">
      <button class="block" onclick="window.location.href = 'Appointment.html';">Book an Appointment</button>
    </div>
    <div class="column">
      <button class="block" onclick="window.location.href = 'Rating.php';">Rate Our Service</button>
    </div>
  </div>

  <div>
    <h1 class="container" style="font-size: 24pt;">Office Hours</h1>
    <div class="column">
      <p>Address: 6408 Seven Corners Place, Suite C</p>
        <p>Falls Church, VA 22044</p>
        <p>Phone Number: (703) 532-1909</p>
        <p>Hours:</p>
        <div style="padding-left: 50px;">
          <p>Monday 8:30 am - 5:30 pm</p>
        <p>Tuesday 8:30 am - 5:30 pm</p>
        <p>Wednesday 8:30 am - 5:30 pm</p>
        <p>Thursday 8:30 am - 5:30 pm</p>
        <p>Friday Appointments Only</p>
        <p>Saturday Appointments Only</p>
        </div>

    </div>

        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3106.313517528128!2d-77.16091878437318!3d38.871068256100294!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89b7b48e54f3269f%3A0x1441015418083613!2sFairfax%20Clinic!5e0!3m2!1sen!2sus!4v1646683168940!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy">
        </iframe>
  </div>

</body>

<div class="footer">
  <p>ISTM 6210 Capstone Project | Spring 2022 --</p>
  <!-- Show current Date & Time -->
  <p id="date" style="text-align: center; color: white; font-size: 10pt"></p>
  <script>
    document.getElementById("date").innerHTML = Date();
  </script>
</div>
</html>
