<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: Home_Doctor.php");
    exit;
}

// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$email = $password = "";
$username_error = $password_error = $login_error = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["email"]))){
        $username_error = "Please enter email.";
    } else{
        $email = trim($_POST["email"]);
    }

    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_error = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Check if code is empty
  /* if(empty(trim($_POST["code"]))){
        $code_error = "Please enter your code.";
    } else{
        $code1 = trim($_POST["code"]);
    } */

    // Validate credentials
    if(empty($username_error) && empty($password_error)){
        // Prepare a select statement
        $sql = "SELECT id, email, password FROM doctor1 WHERE email = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = $email;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $email, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;
                            //$_SESSION["code"] = $code1;

                            // Redirect user to welcome page
                            header("location: Home_Doctor.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_error = "Invalid email or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_error = "Invalid email or password.";
                }
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

<!--

Tooplate 2127 Little Fashion

https://www.tooplate.com/view/2127-little-fashion

-->
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
                    <img src="images/logo.png" width="220" height="70">
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

                            <h1 class="hero-title text-center mb-5">Login to <span>Physican/Doctor Portal</span></h1>

                            <div class="row">
                                <div class="col-lg-8 col-11 mx-auto">

                                  <?php
                                  if(!empty($login_error)){
                                      echo '<div class="alert alert-danger">' . $login_error . '</div>';
                                  }
                                  ?>
                                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                                      <div class="form-floating mb-4 p-0">
                                          <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*"  class="form-control <?php echo (!empty($username_error)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>"  placeholder="Email address" required>
                                          <span class="invalid-feedback"><?php echo $username_error; ?></span>
                                          <label for="email">Email address</label>
                                      </div>

                                      <div class="form-floating p-0">
                                          <input type="password" name="password" id="password" class="form-control <?php echo (!empty($password_error)) ? 'is-invalid' : ''; ?>" placeholder="Password" required>
                                          <span class="invalid-feedback"><?php echo $password_error; ?></span>
                                          <label for="password">Password</label>
                                      </div><br>

                                    <!--  <div class="form-floating p-0">
                                          <input type="number" name="code" id="code" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Code" required>
                                          <span class="invalid-feedback"></span>
                                          <label for="email">Code</label>
                                      </div> -->

                                        <button type="submit" class="btn custom-btn form-control mt-4 mb-3">
                                            Sign in
                                        </button>

                                        <p class="text-center">Forgot password or code, Please email me at administrator@fcsystems.com</p>

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
</html>
