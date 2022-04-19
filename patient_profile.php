
<?php 
    include_once('header.php');
    require_once "includes/patient_profile.inc.php";
?>
<body>
      <div class="row">
        <div class="col-md-12">
            <h1>My Profile</h1>
            <p></p>
            <p>
                Your profile information is shown
                below. Please click the edit link to update this information
            </p>
          <div class="card">
            <div class="card-header p-3 mb-2 bg-dark text-white">Patient Information</div>
            <div class="card-body">
              <p class="card-text">
                  <div class="container">
                    <table class="table table-striped table-hover">
                        <tbody>
                            <tr>
                                <td>First Name</td>
                                <td><?php echo $first_name ?></td>
                            </tr>
                            <tr>
                                <td>Last Name</td>
                                <td><?php echo $last_name ?></td>
                            </tr>
                            <tr>
                                <td>Middle Name</td>
                                <td><?php echo $middle_name ?></td>
                            </tr>
                            <tr>
                                <td>email</td>
                                <td><?php echo $email ?></td>
                            </tr>
                            <tr>
                                <td>address</td>
                                <td><?php echo $address ?></td>
                            </tr>
                            <tr>
                                <td>phone</td>
                                <td><?php echo $phone ?></td>
                            </tr>
                        </tbody>
                    </table>
                  </div>
              </p>
            </div>
            <div class="card">
                <div class="card-header p-3 mb-2 bg-dark text-white">Billing Information</div>
                <div class="card-body">
                  <p class="card-text">
                      <div class="container">
                        <table class="table table-striped table-hover">
                            <tbody>
                                <tr>
                                    <td>Card Number</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Address</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Billing Phone</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Billing Email</td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                      </div>
                  </p>
                </div>
                <div class="card">
                    <div class="card-header p-3 mb-2 bg-dark text-white">Phone</div>
                    <div class="card-body">
                      <p class="card-text">
                          <div class="container">
                            <table class="table table-striped table-hover">
                                <tbody>
                                    <tr>
                                        <td>Home phone</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Mobile phone</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>Work phone</td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                          </div>
                      </p>
                    </div>
                    <div class="card">
                        <div class="card-header p-3 mb-2 bg-dark text-white">Email Address</div>
                        <div class="card-body">
                          <p class="card-text">
                              <div class="container">
                                <table class="table table-striped table-hover">
                                    <tbody>
                                        <tr>
                                            <td>Email</td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                              </div>
                          </p>
                        </div>
                        <div class="card">
                            <div class="card-header p-3 mb-2 bg-dark text-white">Emergency Contact</div>
                            <div class="card-body">
                              <p class="card-text">
                                  <div class="container">
                                    <table class="table table-striped table-hover">
                                        <tbody>
                                            <tr>
                                                <td>Name</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Relationship to patient</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Home phone</td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>Mobil phone</td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                  </div>
                              </p>
                            </div>
          </div>
        </div>
      </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"></script>

</body>
<?php 
    include_once('footer.php');
?>
