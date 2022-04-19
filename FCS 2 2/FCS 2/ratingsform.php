<?php require('config.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Rating Form</title>
    <link rel="stylesheet" href="css3/form.css">
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
          <li><a href="Appointment.html">Appointment</a></li>
          <li><a href="Past_Appointment.html">Rating</a></li>
          <li><a href="Profile.html">Profile</a></li>
          <li><a href="logout.php">Log Out</a></li>
        </ul>
      </div>

    <div class="container">
        <header class="header">
            <h2>Let us know how we can improve your satisfaction!</h2>
        </header>
        <form method="post" action="ratingformConfig.php">
        <fieldset>
            <legend>FCS Rating Form</legend>

           <p>
            <label>Doctor: </label><br/>
            <input type="text" name="doctorname" require>
           </p>

            <p>
                <label>How well did the doctor and staff work together in their care for you?</label>
                <select name="ratings" required>
                    <option value="" disabled selected>Select rating</option>
                    <option value="Excellent">Excellent</option>
                    <option value="Good">Good</option>
                    <option value="Fair">Fair</option>
                    <option value="Poor">Poor</option>
                    <option value="Not Applicable">Not Applicable</option>
                </select>
            </p>

            <p>How do you know about FCS?</p>
            <input type="radio" value="Recommended by friend or family member" id="html" name="recommend" >
            <label>Recommended by friend or family member</label><br>

            <input type="radio" value="Search Engine" id="css" name="recommend" >
            <label>Search Engine</label><br>

            <input type="radio" value="Social Media" id="socialmedia" name="recommend" >
            <label>Social Media</label><br>

            <input type="radio" value="Blog or Publication" id="blog" name="recommend" >
            <label>Blog or Publication</label><br>

            <input type="radio" value="Search Engine" id="css" name="recommend">
            <label>Search Engine</label><br>

            <input type="radio" value="" id="css" name="recommend">
            <label>Others</label>
            <input type="text" id="other" value="recommend">


            <p id="quest">What should we improve in the future?</p>
            <label for="">
            <input type="checkbox" name="prefer" class="checkbox" value="Schedule urgent appointment">Schedule urgent appointment
            </label><br>

            <label for="">
            <input type="checkbox" name="prefer" class="checkbox" value="Staff and office environment">Staff and office environment
            </label><br>

            <label for="">
            <input type="checkbox" name="prefer" class="checkbox" value="Punctuality-Less wait-time (waiting and exam room)">Punctuality-Less wait-time (waiting and exam room)
            </label><br>

            <label for="">
            <input type="checkbox" name="prefer" class="checkbox" value="Billing and Administration">Billing and Administration
            </label><br>

            <label for="">
            <input type="checkbox" name="prefer" class="checkbox" value="Doctors spend more time with me">Doctors spend more time with me
            </label><br>

            <input type="checkbox" id="css" name="others">
            <label>Others</label>
            <input type="text" id="other" value="Please type here">

            <p id="quest">Give us your feeback</p>
                <textarea name="feedback" id="" cols="70" rows="10" class="textarea" placeholder="Enter your feedback here..."></textarea>

            <input type="submit" name="rating" />
    </div>
</fieldset>
</form>

    <div>
    <h1 class="container" style="font-size: 24pt; text-align: center;">Office Hours</h1>
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

    <div class="footer">
  <p>ISTM 6210 Capstone Project | Spring 2022</p>
  <!-- Show current Date & Time -->
  <p id="date" style="text-align: center; color: white; font-size: 10pt"></p>
  <script>
    document.getElementById("date").innerHTML = Date();
  </script>
</div>
</body>
</html>
