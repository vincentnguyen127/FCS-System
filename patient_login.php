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
                    <img src="images/logo.png" width="240" height="70">
                  </div>

                  <!-- Project Logo -->
                  <!-- <a class="navbar-brand" href="#">
                      <strong><span>Fairfax Clinic</span> Systems</strong>
                  </a> -->

                  <div class="d-none d-lg-block">
                      <a href="sign-in.php" class="bi-person custom-icon me-3"></a>
                  </div>

              </div>
          </nav><br><br>

            <section class="sign-in-form section-padding">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-8 mx-auto col-12">
                          <a class="navbar-brand">
                            <h1 class="hero-title text-center mb-5">Login to <strong><span>Patient Portal</span></strong></h1>
                          </a>

                            <div class="row">
                                <div class="col-lg-8 col-11 mx-auto">
                                  <?php
                                  if(!empty($login_err)){
                                      echo '<div class="alert alert-danger">' . $login_err . '</div>';
                                  }
                                  ?>
                                    <form action="includes/patient_login.inc.php" method="post">

                                        <div class="form-floating mb-4 p-0">
                                            <input type="email" name="email" id="email" pattern="[^ @]*@[^ @]*"  class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>"  placeholder="Email address" required>
                                            <span class="invalid-feedback"><?php echo $username_err; ?></span>
                                            <label for="email">Email address</label>
                                        </div>

                                        <div class="form-floating p-0">
                                            <input type="password" name="password" id="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" placeholder="Password" required>
                                            <span class="invalid-feedback"><?php echo $password_err; ?></span>
                                            <label for="password">Password</label>
                                        </div>

                                        <button type="submit" name="submit" class="btn custom-btn form-control mt-4 mb-3">
                                            Log In
                                        </button>

                                        <p class="text-center">Don’t have an account? <a href="sign-up.php">Create One</a></p>
                                        <p class="text-center">Login to <a href="doctor_signin.php">Physical/Doctor Portal</a></p>
                                        <p class="text-center"> <a href="#">Forgot password or email address</a></p>

                                    </form>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <?php 
                    if(isset($_GET["error"])){
                        if ($_GET["error"] == "wrongemail") {
                            echo '<p style="color:red;" class="text-center">Wrong Email!</p>';
                        }
                        elseif($_GET['error'] =="wrongpassword"){
                            echo '<p style="color:red;" class="text-center">Wrong Password</p>';
                        }
                    }
                ?>
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
