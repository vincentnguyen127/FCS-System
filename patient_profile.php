
<?php 
    session_start();
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
          <div class="row">
          
          </div>
          
          
            <div class="card-header p-3 mb-2 bg-dark text-white">Patient Information</div>   
            <div class="pr-2"><button type="submit" id="patient"  name="patient" class="btn-sm btn-primary btn-sm p-3 patient pull-right" data-id=<?php echo $_SESSION["patientID"] ?>>Edit</button></div> 
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
<div id="patientModal" class="modal fade">
  	<div class="modal-dialog">
    	<form action="includes/edit_patient_profile.inc.php" method="post" id="appointment_form">
      		<div class="modal-content">
        		<div class="modal-header">
          			<h4 class="modal-title" id="modal_title"></h4>
          			<button type="button" class="close" data-dismiss="modal">&times;</button>
        		</div>
        		<div class="modal-body">
        			<span id="form_message"></span>
                    <div id="appointment_detail">
					<h4 class="text-center">Patient Details</h4>
					<div class="form-group">
                        <label>First Name</label>
                        <div class="input-group">           
                            <input type="text" name="first_name" id="first_name" class="form-control"  />
                        </div>
                    </div>
					<div class="form-group">
                        <label>Last Name</label>
                        <div class="input-group">           
                            <input type="text" name="last_name" id="last_name" class="form-control"  />
                        </div>
                    </div>
					<div class="form-group">
                        <label>Middle Name</label>
                        <div class="input-group">           
                            <input type="text" name="middle_name" id="middle_name" class="form-control"  />
                        </div>
                    </div>
					<div class="form-group">
                        <label>Email</label>
                        <div class="input-group">           
                            <input type="text" name="email" id="email" class="form-control"  />
                        </div>
                    </div>
					<div class="form-group">
                        <label>Address</label>
                        <div class="input-group">           
                            <textarea  name="address" id="address" class="form-control" row="5"></textarea>
                        </div>
                    </div>						
					</div>                 
        		</div>
        		<div class="modal-footer">
          			<input type="hidden" name="patient_id" id="patient_id" />
					  <div class="text-right">
					  <input type="submit" name="submit" id="submit_button" class="btn btn-success" value="Submit" />
					  </div>       				
          			<button type="reset" class="btn btn-success btn-lg" data-dismiss="modal">Close</button>
        		</div>
      		</div>
    	</form>
  	</div>
</div>
<script>

$(document).ready(function(){
	$(document).on('click', '.patient', function(){

		var patient_id = $(this).data('id');
        console.log(patient_id);
		$.ajax({
			url:"patient_detail.php",
			method:"POST",
			data:{id:patient_id},
			success:function(res)
			{
				if(res.status == 1){
					var data = res['patient_data'];	
					$('#patientModal').modal('show');

					$('#first_name').val(data['first_name']);
					$('#last_name').val(data['last_name']);
					$('#middle_name').val(data['middle_name']);
					$('#email').val(data['email']);
					$('#address').val(data['address']);
					$('#patient_id').val(data['id']);

					// $('#physician_name').html(data['first_name'] +' '+ data['last_name']);
					// $('#ava_time').html(data['start_time'] +'-'+ data['appt_end_time']);
					// $('#appt_date').html(data['appt_date']);
					// $('#appt_day').html(data['appt_day']);
				} else{
					alert('Empty data');
					
				}
			}
		});

	});

});

</script>
