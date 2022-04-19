<?php 

function getPhysicianSchedule($conn){
    $sql ="Select p.first_name, p.last_name , p.degree , p.speciality , ps.appt_date , ps.appt_day ,ps.start_time ,ps.appt_end_time from physciaian_schedule ps INNER join physician p on ps.physician_id=p.id;";
    echo $result;
    $result = mysqli_query($conn, $sql);
    echo $result;
    $resultCheck = mysqli_num_rows($result);
    // echo $sql;

    if ($resultCheck > 0 )
    {
        return "results";
    } 
    else{
        echo $resultCheck;
        return "no_results";
    }
    // Close connection
    mysqli_close($conn);
}

function createAppointment($conn,$service,$other,$date_app,$patientid){
    $sql = "INSERT INTO appointment SET
        service = '$service',
        other = '$other',
        date_app = '$date_app',
        patient_id = $patientid,
        physician_id = 1;
        ";

        $result = mysqli_query($conn, $sql);
        if($result)
        {
            header("location: ../appointment.php?error=none");
            exit();
        }
        else{
            header("location: ../appointment.php?error=failed");
            exit();
        }
// Close connection
mysqli_close($conn);
}

function loginUser($conn, $email, $pw)
{
    $emailExists= emailExist($conn, $email);

    if ($emailExists === NULL)
    {
        header("location: ../patient_login.php?error=wrongemail");
        exit();
    }

    $pwd = trim($emailExists["password"]);

    if (strcmp($pwd,$pw) != 0)
    {
        header("location: ../patient_login.php?error=wrongpassword");
        exit();
    }
    
    if (strcmp($pw,$pwd) == 0)
    {
        session_start();
        $_SESSION["patientID"] = $emailExists["id"];
        header("location: ../home_patient.php");
        echo $_SESSION["patientID"];
        exit();
    }
     echo "pass1";
      

}

function emailExist($conn, $email)
{
    $sql ="SELECT * FROM patient where email= '$email' ;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck != 0 )
    {
        while($row = mysqli_fetch_assoc($result))
        {
            return $row;
        }
    }          
    else {
        return false;
    }
}

function createPatientUser($conn,$email,$password,$first_name, $last_name, $dob, $contact_num, $gender, $marital_status, $address )
{
    $middleName="";
    echo $first_name;
    echo $last_name;
    $email=mysqli_real_escape_string($conn,$email);

    $sql ="INSERT INTO patient (first_name,last_name,middle_name, email, password, address, phone_number, dob, gender) values ('$first_name','$last_name','$middleName','$email','$password','$address','$contact_num','$dob','$gender');";
    $result = mysqli_query($conn, $sql);
    echo $sql;
    if($result)
    {
        header("location: ../signup.php?error=none");
        exit();
    }
    else{
        header("location: ../signup.php?error=failed");
        exit();
    }
    // Close connection
    mysqli_close($conn);
}
    
    