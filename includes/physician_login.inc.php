<?php
    if(isset($_POST["submit"])){
        $email = $_POST['email'];
        $password = $_POST['password'];
    
        require_once 'dbh.inc.php';
        require_once 'functions.inc.php';

        loginPhysician($conn,$email,$password);
    }
    else{
        header("location: ../physician_login.php");
        exit();
    }
?>