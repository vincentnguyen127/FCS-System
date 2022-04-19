<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$email = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate username
    if(empty(trim($_POST["email"]))){
        $username_err = "Please enter a email.";
    } elseif(!preg_match('/^[^ @]*@[^ @]+$/', trim($_POST["email"]))){
        $username_err = "Email can only contain letters, numbers, and underscores.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM Login2 WHERE email = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["email"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This email is already taken.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){

        // Prepare an insert statement
        $sql = "INSERT INTO Login2 (email, password) VALUES (?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

            // Set parameters
            $param_username = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: sign-in.php");
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

        <link href="css2/bootstrap.min.css" rel="stylesheet">
        <link href="css2/bootstrap-icons.css" rel="stylesheet">

        <link rel="stylesheet" href="css2/slick.css"/>

        <link href="css2/tooplate-little-fashion.css" rel="stylesheet">


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
                    <img src="images/logo.png" width="260" height="80">
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

                            <h1 class="hero-title text-center mb-5">Create <span>Account</span></h1>

                            <div class="social-login d-flex flex-column w-50 m-auto">

                                <a href="#" class="btn custom-btn social-btn mb-4">
                                    <i class="bi bi-google me-3"></i>

                                    Continue with Google
                                </a>

                                <a href="#" class="btn custom-btn social-btn">
                                    <i class="bi bi-facebook me-3"></i>

                                    Continue with Facebook
                                </a>
                            </div>

                            <div class="div-separator w-50 m-auto my-5"><span>or</span></div>

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
