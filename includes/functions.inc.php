<?php 

function getPhysicianSchedule($conn){
    $sql ="Select p.first_name, p.last_name , p.degree , p.speciality , ps.appt_date , ps.appt_day ,ps.start_time ,ps.appt_end_time from physciaian_schedule ps INNER join physician p on ps.physician_id=p.id;";
    // echo $result;
    $result = mysqli_query($conn, $sql);
    // echo $result;
    // $resultCheck = mysqli_num_rows($result);
    // echo $sql;

    return $result;
    
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
        // id
        $_SESSION["patientID"] = $emailExists["id"];
        $_SESSION["physicianID"]=null;
        $_SESSION["adminID"] =null;
        // NAME
        $_SESSION["patientName"] = $emailExists["first_name"];
        $_SESSION["physicianName"]=null;
        $_SESSION["adminName"] =null;
        header("location: ../home_patient.php");
        exit();
    }
     echo "pass1";
      
}

function loginPhysician($conn, $email, $pw)
{
    $emailExists= physicianEmailExist($conn, $email);

    if ($emailExists === NULL)
    {
        header("location: ../physician_login.php?error=wrongemail");
        exit();
    }

    $pwd = trim($emailExists["password"]);
    
    if (strcmp($pwd,$pw) != 0)
    {
        echo strcmp($pwd,$pw);
        header("location: ../physician_login.php?error=wrongpassword");
        exit();
    }
    
    if (strcmp($pw,$pwd) == 0)
    {
        session_start();
        $_SESSION["physicianID"] = $emailExists["id"];
        $_SESSION["patientID"] = null;
        $_SESSION["adminID"] =null;

        $_SESSION["patientName"] = null;
        $_SESSION["physicianName"]=$emailExists["first_name"];
        $_SESSION["adminName"] =null;
        header("location: ../home_patient.php");
        exit();
    }  
}

function loginAdmin($conn,$email,$pw)
{
    $emailExists= AdminEmailExist($conn, $email);

    if ($emailExists === NULL)
    {
        header("location: ../admin_login.php?error=wrongemail");
        exit();
    }

    $pwd = trim($emailExists["password"]);
    if (strcmp($pwd,$pw) != 0)
    {
        echo strcmp($pwd,$pw);
        // header("location: ../admin_login.php?error=wrongpassword");
        exit();
    }
    
    if (strcmp($pw,$pwd) == 0)
    {
        session_start();
        $_SESSION["physicianID"] = null;
        $_SESSION["patientID"] = null;
        $_SESSION["adminID"] = $emailExists["id"];
        header("location: ../home_patient.php");
        exit();
    }
      
}

function AdminEmailExist($conn, $email)
{
    $sql ="SELECT * FROM admin where email= '$email' ;";
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

function physicianEmailExist($conn, $email)
{
    $sql ="SELECT * FROM physician where email= '$email' ;";
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
    $email=mysqli_real_escape_string($conn,$email);

    $sql ="INSERT INTO patient (first_name,last_name,middle_name, email, password, address, phone_number, dob, gender) values ('$first_name','$last_name','$middleName','$email','$password','$address','$contact_num','$dob','$gender');";
    $result = mysqli_query($conn, $sql);

    if($result)
    {
        header("location: ../register.php?error=none");
        exit();
    }
    else{
        header("location: ../register.php?error=failed");
        exit();
    }
    // Close connection
    mysqli_close($conn);
}

function createRating($conn,$rating,$headline,$feedback,$appointment_id,$physician_schedule_id)
{

    $sql ="INSERT INTO rating (rating,headline,feedback,appointment_id) values ('$rating','$headline','$feedback',$appointment_id);";

    $result = mysqli_query($conn, $sql);

    if($result)
    {
        $query = "UPDATE physician_schedule set appt_status='Reviewed' where id=".$physician_schedule_id;
        mysqli_query($conn, $query);
        header("location: ../my_appointment2.php?error=none");
        exit();
    }
    else{
        header("location: ../my_appointment2.php?error=failed");
        exit();
    }
    // Close connection
    mysqli_close($conn);
}

function editPatient($conn,$first_name,$middle_name,$last_name,$address,$email,$patient_id)
{

    $sql = "UPDATE patient set 
    first_name='$first_name',
    last_name='$last_name',
    middle_name='$middle_name',
    email='$email',
    address='$address'     
    where id=$patient_id;";

    $result = mysqli_query($conn, $sql);
    echo $sql;
    if($result)
    {
        header("location: ../admin_patient.php?error=none");
        exit();
    }
    else{
        header("location: ../admin_patient.php?error=failed");
        exit();
    }
    mysqli_close($conn);
}

function editPatientProfile($conn,$first_name,$middle_name,$last_name,$address,$email,$patient_id)
{

    $sql = "UPDATE patient set 
    first_name='$first_name',
    last_name='$last_name',
    middle_name='$middle_name',
    email='$email',
    address='$address'     
    where id=$patient_id;";

    $result = mysqli_query($conn, $sql);
    echo $sql;
    if($result)
    {
        header("location: ../patient_profile.php?error=none");
        exit();
    }
    else{
        header("location: ../patient_profile.php?error=failed");
        exit();
    }
    mysqli_close($conn);
}
function editPhysician($conn,$first_name,$middle_name,$last_name,$degree,$email,$patient_id)
{

    $sql = "UPDATE physician set 
    first_name='$first_name',
    last_name='$last_name',
    middle_name='$middle_name',
    email='$email',
    degree='$degree'     
    where id=$patient_id;";

    $result = mysqli_query($conn, $sql);
    echo $sql;
    if($result)
    {
        header("location: ../admin_physician.php?error=none");
        exit();
    }
    else{
        header("location: ../admin_physician.php?error=failed");
        exit();
    }
    mysqli_close($conn);
}
    
function createPhysicianSchedule($conn,$schedule_date,$schedule_start_time,$schedule_end_time,$physician_id,$schedule_day)
{

    $sql ="INSERT INTO physician_schedule (physician_id,appt_date,start_time, appt_end_time, appt_day, appt_status) values ($physician_id,'$schedule_date','$schedule_start_time','$schedule_end_time','$schedule_day','In Process');";
    $result = mysqli_query($conn, $sql);
    
    echo $sql;
    if($result)
    {
        header("location: ../physician_schedule.php?error=none");
        exit();
    }
    else{
        header("location: ../physician_schedule.php?error=failed");
        exit();
    }
    // Close connection
    mysqli_close($conn);
} 