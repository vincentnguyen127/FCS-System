<?php

require('config.php');
session_start();

#for Registration
if(isset($_POST['appointments']))
{
  $dob = date('Y-m-d', strtotime($_POST['date']));

  $query = "INSERT INTO `appointment_info`
  (`FIRST_NAME`, `LAST_NAME`, `SERVICE`, `OTHER`, `DATE_APP`)
  VALUES ('$_POST[firstname]','$_POST[lastname]','$_POST[service]','$_POST[other]','$dob')";
  
  if(mysqli_query($link,$query))
  {
      #if data inserted successfully
    echo"
      <script>
        alert('Appointment successfully');
        window.location.herf='appointment.php';
      </script>
    ";
  }
    else
    {
      #if data cannot be inserted
      echo"
        <script>
          alert('Cannot Run Query2');
          window.location.herf='appointment.php';
        </script>
      ";
    }
  }
 ?>
