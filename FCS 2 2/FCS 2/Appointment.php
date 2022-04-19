<?php require('config.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Book an Appointment</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="css/Appointment.css">
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
      <li><a href="Rating.php">Rating</a></li>
      <li><a href="Profile.html">Profile</a></li>
      <li><a href="logout.php">Log Out</a></li>
    </ul>
  </div>
  <div class="container">
    <h2>Appointment Reminder</h2>
        <p>Your appointment is confirmed on Friday, March 23rd, 2022 at 7 PM with Dr. ABCXYZ.</p>
  </div>
  <form method="post" action="AppointmentConfig.php">
  <fieldset>
      <legend>Book an Appointment</legend>
      <p>
         <label>First Name: </label><br/>
         <input type="text" name="firstname">

      </p>
      <p>
         <label>Last Name: </label><br/>
         <input type="text" name="lastname">
      </p>
      <p>
         <label>Reasons for Your Visit: </label><br/>
          <select id="service" name="service">
            <option value="checkup">Annual Check Up</option>
            <option value="skin">Skin Disorders</option>
            <option value="nephrology">Nephrology</option>
            <option value="internal">Internal Medicine</option>
            <option value="DOT">DOT Physical Exams</option>
            <option value="USCIS">Immigration Physical Exams</option>
          </select>
      </p>
      <p>
         <label>Other Reasons: </label><br/>
         <input type="text" name="other">
      </p>
      <p>
         <label>Date: </label><br/>
         <input type="date" name="date">
        <input type="reset" name="Clear" value="Clear">
      </p>
      <input type="submit"/>
  </fieldset>
</form>


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
  <p>ISTM 6210 Capstone Project | Spring 2022</p>
  <!-- Show current Date & Time -->
  <p id="date" style="text-align: center; color: white; font-size: 10pt"></p>
  <script>
    document.getElementById("date").innerHTML = Date();
  </script>
</div>
</html>
