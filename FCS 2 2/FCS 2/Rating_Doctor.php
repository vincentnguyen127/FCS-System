<!DOCTYPE html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>My Reviews</title>
   <!--StyleSheet------------------------------------->
   <link href="css3/DocRating.css" rel="stylesheet">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <!--Fav-icon-------------------------------------->
   <link rel="shortcut icon" href="fav-icon.png">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
   <!--poppins-font-family-------------------------->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@1,500&display=swap" rel="stylesheet">

   <!--using-Font-Awesonm----------------------------->
   <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>

   <!-- Project Logo -->
   <div class="header">
     <img src="images/logo.png">
   </div>
</head>


<body>
  <!-- Navigation Bar -->
  <div>
    <style type="text/css">
      /*Navigation Bar*/
      .navbar {
        overflow: hidden;
        float: center;
        list-style-type: none;
        background-color: #F2D349;
        text-align: center;
      }
      ul {
        list-style-type: none;
        float: center;
      }
      li {
        display: inline-block;
        border-left: solid 2pt;
      }
      ul li a {
        text-decoration: none;
        color: black;
        padding: 97px;
        font-size: 18px;
      }
      ul li a:hover {
        color: #5C6E58;
      }
    </style>

    <div class="navbar">
      <ul>
        <li><a href="Home_Doctor.php">Dashboard</a></li>
        <li><a href="AppointmentList.html">Appointment</a></li>
        <li><a href="#">Patients</a></li>
        <li><a href="Rating_Doctor.php">Patient Reviews</a></li>
        <li><a href="doctor_logout.php">Log Out</a></li>
      </ul>
    </div>

  <!--DoctorsRating--------------------->
  <section id="DocRating">

  <!--heading--------------------------->
  <div class="DocRating-heading">
    <h1>Patients Rating Reviews</h1>
  </div>

<!--DocRating-box-container-------------->
<div class="DocRating-box-container">

  <!--Box-1--------------------------->
  <div class="DocRating-box">

    <!--top------------------>
      <div class="box-top">

      <!--profile--------------->
        <div class="profile">

        <!--img--------->
        <div class="profile-img">
          <img src="images/avatar-1.jpg"/>
        </div>

        <!--name-and-user------->
        <div class="name-user">
          <strong>David Scott</strong>
          <span>Rating Dr. Jhon J. Smith</span>
        </div>
      </div>

        <!--reviews--------------------------->
        <div class="reviews">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="far fa-star"></i>
        </div>
      </div>

        <!--Comments------------------------>
        <div class="Patients-comment">
          <p>Dr. Smith did a great job with my first ever health exam. He explained everything to me in a very clear manner. He was also kind and friendly. All of the staff was great!</p>
        </div>
      </div>

      <!--Box-2--------------------------->
      <div class="DocRating-box">

      <!--top------------------>
      <div class="box-top">

      <!--profile--------------->
      <div class="profile">

        <!--img--------->
        <div class="profile-img">
          <img src="images/avatar-1.jpg"/>
        </div>

        <!--name-and-user------->
        <div class="name-user">
          <strong>Jeffery Harris</strong>
          <span>Rating Dr. Jhon J. Smith</span>
        </div>
      </div>

        <!--reviews---------------------->
        <div class="reviews">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
      </div>

        <!--Comments--------------------->
        <div class="Patients-comment">
          <p>Great Doctor, I recommend Dr. Smith for everyone. Wonderful and great experience from start to finish. I will continue to come to Fairfax clinic for future medical treatments.</p>
        </div>
      </div>

    <!--Box-3--------------------------->
    <div class="DocRating-box">

    <!--top------------------>
    <div class="box-top">

      <!--profile--------------->
      <div class="profile">

        <!--img-------------->
        <div class="profile-img">
          <img src="images/avatar-1.jpg"/>
        </div>

        <!--name-and-user------->
        <div class="name-user">
          <strong>Joe Jackson</strong>
          <span>Rating Dr. Jhon J. Smith</span>
        </div>
      </div>

        <!--reviews------------------------->
        <div class="reviews">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
        </div>
      </div>

        <!--Comments------------------------>
        <div class="Patients-comment">
          <p>I had a bad experience with this doctor, he charged me too much for my procedure compare to other clinics I used to visit. He did not show any compassion.</p>
        </div>
      </div>

      <!--Box-4--------------------------->
  <div class="DocRating-box">

    <!--top------------------>
    <div class="box-top">

      <!--profile--------------->
      <div class="profile">

        <!--img--------->
        <div class="profile-img">
          <img src="images/avatar-1.jpg"/>
        </div>

        <!--name-and-user--------->
        <div class="name-user">
          <strong>William Young</strong>
          <span>Rating Dr. Jhon J. Smith</span>
        </div>
      </div>

        <!--reviews--------------------------->
        <div class="reviews">
            <i class="fas fa-star"></i>
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
            <i class="far fa-star"></i>
        </div>
      </div>

        <!--Comments------------------------>
        <div class="Patients-comment">
          <p>This doctor was very rude and did not respect patients' time. I had an early morning appointment, I was there for five hours, but left the clinic without getting seen. Terrible!</p>
        </div>
      </div>

    <div class="footer">
      <style type="text/css">
        .footer {
          padding: 15px;
          margin-top: 20px;
          background-color: #5C6E58;
          color: white;
          text-align: center;
          width: 100%;
        }
      </style>
      <p>ISTM 6210 Capstone Project | Spring 2022</p>
      <!-- Show current Date & Time -->
      <p id="date" style="text-align: center; color: white; font-size: 10pt"></p>
      <script>
        document.getElementById("date").innerHTML = Date();
      </script>
    </div>
</body>
</html>
