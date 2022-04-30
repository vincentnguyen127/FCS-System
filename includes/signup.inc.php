<?php

if (isset($_POST["submit"])){
    $email= $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST['confirm_password'];
    $first_name= $_POST['first_name'];
    $last_name= $_POST['last_name'];
    $dob= $_POST['dob'];
    $contact_num= $_POST['contact_num'];
    $gender= $_POST['gender'];
    $marital_status= $_POST['marital_status'];
    $address= $_POST['address'];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    // check if email is exist
    if (emailExist($conn, $email) !== false) {
        header("location: ../signup.php?error=usernametaken");
        exit();
    }
    // if email is not exist, create it
    createPatientUser($conn,$email,$password,$first_name, $last_name, $dob, $contact_num, $gender, $marital_status, $address );
}
else {
    header("location: ../register.php");
}
?>