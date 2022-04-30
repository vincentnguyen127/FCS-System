

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
s
        <link rel="stylesheet" href="css2/slick.css"/>

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
                    <img src="images/logo.png" width="260" height="80">
                  </div>

                  <!-- Project Logo -->
                  <!-- <a class="navbar-brand" href="#">
                      <strong><span>Fairfax Clinic</span> Systems</strong>
                  </a> -->

                  <div class="d-none d-lg-block">
                      <a href="patient_login.php" class="bi-person custom-icon me-3"></a>
                  </div>

              </div>
          </nav>

            <?php 
                    if(isset($_GET["error"])){
                        if ($_GET["error"] == "none") {
                            echo '<div class="alert alert-success">Your Account Has Been Created Successfully</div>';
                        }
                        elseif($_GET['error'] =="usernametaken"){
                            echo '<div class="alert alert-danger">Username/Email already taken</div>';
                        }
                    }
                ?>
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
                                  <!-- <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> -->
                                  <form action="includes/signup.inc.php" method="post">
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
                                        </div><br>

                                        <div class="form-floating">
                                            <input type="text" name="first_name" id="" class="form-control"placeholder="Patient First Name" required>
                                            <span class="invalid-feedback"></span>
                                            <label for="first_name">Patient First Name</label>
                                        </div><br>

                                        <div class="form-floating">
                                            <input type="text" name="last_name" id="" class="form-control"placeholder="Patient First Name" required>
                                            <span class="invalid-feedback"></span>
                                            <label for="last_name">Patient Last Name</label>
                                        </div><br>

                                        <div class="form-floating">
                                            <input type="date" name="dob" id="" class="form-control"placeholder="Patient Date of Birth" required>
                                            <span class="invalid-feedback"></span>
                                            <label for="date_of_birth">Patient Date of Birth</label>
                                        </div><br>

                                        <div class="form-floating">
                                            <input type="number" name="contact_num" id="" class="form-control"placeholder="Patient Contact No" required>
                                            <span class="invalid-feedback"></span>
                                            <label for="number">Patient Contact No</label>
                                        </div></br>


                                        <div class="form-floating">
                                          <label>Patient Gender</label>
                                           <select id="" name="gender" class="form-control">
                                             <option value="Select"></option>
                                             <option value="Male">Male</option>
                                             <option value="Female">Female</option>
                                           </select>
                                        </div><br>

                                        <div class="form-floating">
                                          <label>Patient Martial Status</label>
                                           <select id="" name="marital_status" class="form-control">
                                             <option value="Select"></option>
                                             <option value="Single">Single</option>
                                             <option value="Married">Married</option>
                                             <option value="Separated">Separated</option>
                                             <option value="Divorce">Divorce</option>
                                           </select>
                                        </div><br>

                                        <div class="form-floating">
                                            <input type="text" name="address" id="" class="form-control" placeholder="Patient Complete Address" required>
                                            <span class="invalid-feedback"></span>
                                            <label for="patient_complete_address">Patient Complete Address</label>
                                        </div>


                                      <!--  <button type="submit" class="btn custom-btn form-control mt-4 mb-3" value="Submit">
                                            Create account
                                        </button> -->
                                        <input type="submit" name="submit" class="btn custom-btn form-control mt-4 mb-3" value="Sign Up">

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
