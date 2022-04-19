<?php
// Initialize the session
session_start();

// Check if the user is logged in, otherwise redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

// Include config file
require_once "config.php";

// Define variables and initialize with empty values
//$email = $password = $confirm_password = "";

$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate new password
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Please enter the new password.";
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $new_password_err = "Password must have atleast 6 characters.";
    } else{
        $new_password = trim($_POST["new_password"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm the password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    // Check input errors before updating the database
    if(empty($new_password_err) && empty($confirm_password_err)){
        // Prepare an update statement
        $sql = "UPDATE Login1 SET password = ? WHERE id = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);

            // Set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Password updated successfully. Destroy the session, and redirect to login page
                session_destroy();
                header("location: login.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($link);
}
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="">
        <meta name="author" content="">

        <title>FCS Portal</title>

        <!-- CSS FILES -->
        <link rel="preconnect" href="https://fonts.googleapis.com">

        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;300;400;700;900&display=swap" rel="stylesheet">

        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/bootstrap-icons.css" rel="stylesheet">

        <link rel="stylesheet" href="css/slick.css"/>

        <link href="css/tooplate-little-fashion.css" rel="stylesheet">


    </head>

    <body>

        <section class="preloader">
            <div class="spinner">
                <span class="sk-inner-circle"></span>
            </div>
        </section>

        <main>

          <nav class="navbar navbar-expand-lg">
              <div class="container">
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                  </button>

                  <!-- Project Logo -->
                  <div class="header">
                    <img src="images/logo.png">
                  </div>

                  <!-- Project Logo -->
                  <!-- <a class="navbar-brand" href="#">
                      <strong><span>Fairfax Clinic</span> Systems</strong>
                  </a> -->

                  <div class="d-none d-lg-block">
                      <a href="sign-in.php" class="bi-person custom-icon me-3"></a>
                  </div>

              </div>
          </nav>

            <section class="sign-in-form section-padding">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-8 mx-auto col-12">

                            <h1 class="hero-title text-center mb-5">Forgot <span>Password</span></h1>

                            <div class="row">
                                <div class="col-lg-8 col-11 mx-auto">
                                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                                        <div class="form-floating">
                                            <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>" placeholder="Email address" required>
                                            <span class="invalid-feedback"><?php echo $username_err; ?></span>
                                            <label for="email">Email address</label>
                                        </div>

                                        <div class="form-floating my-4">
                                            <input type="password" name="password" id="password" pattern="[0-9a-zA-Z]{4,10}" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>" placeholder="Password" required>
                                            <span class="invalid-feedback"><?php echo $password_err; ?></span>
                                            <label for="password">Password</label>

                                        </div>

                                        <div class="form-floating">
                                            <input type="password" name="confirm_password" id="confirm_password" pattern="[0-9a-zA-Z]{4,10}" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>" placeholder="Password" required>
                                            <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                                            <label for="confirm_password">Password Confirmation</label>
                                        </div>

                                      <!--  <button type="submit" class="btn custom-btn form-control mt-4 mb-3" value="Submit">
                                            Create account
                                        </button> -->
                                        <input type="submit" class="btn custom-btn form-control mt-4 mb-3" value="Submit">

                                        <p class="text-center">Already have an account? Please <a href="sign-in.php">Sign In</a></p>

                                    </form>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </section>

        </main>

        <!-- JAVASCRIPT FILES -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/Headroom.js"></script>
        <script src="js/jQuery.headroom.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/custom.js"></script>

    </body>
</html>
