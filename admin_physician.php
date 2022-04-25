<?php
//require("book_appointment_config.php");
include_once('header.php');
require_once './includes/dbh.inc.php';


  $query = "Select * from physician";
  $query_run = mysqli_query($conn, $query);

  // Close connection
  mysqli_close($conn);

?>
<body>
<div class="card">
		      		<!-- <form method="post"  > -->
			      		<div class="card-header"><h3><b>Patient List</b></h3></div>
			      		<div class="card-body">
		      				<div class="table-responsive">
		      					<table class="table table-striped table-bordered">
		      						<tr>
									  <th>First Name </th>
		      							<th>Last Name</th>
		      							<th>Middle Name</th>
		      							<th>Email</th>
		      							<!-- <th>Password</th> -->
		      							<th>degree</th>
		      							<th>Phone Number</th>
										<th>Date Of Birth</th>
										<th>speciality</th>
		      						</tr>

                      <?php
function pr($t){echo'<pre>';print_r($t);echo'</pre>';} 
                        while($row = mysqli_fetch_assoc($query_run)){
		      							echo '
		      							<tr>
											  <td>'.$row["first_name"].'</td>
											  <td>'.$row["last_name"].'</td>
		      								<td>'.$row["middle_name"].'</td>
		      								<td>'.$row["email"].'</td>
		      								<td>'.$row["degree"].'</td>
		      								<td>'.$row["phone_number"].'</td>
											  <td>'.$row["dob"].'</td>
											  <td>'.$row["speciality"].'</td>
		      							 <td><button type="button" name="physician" class="btn btn-primary btn-sm p-3 physician" data-id="'.$row["id"].'">Edit</button></td>
		      							</tr>
		      							';
		      						}
		      						?>
		      					</table>
		      				</div>
		      			</div>
		      		<!-- </form> -->
                  </div>
</body>
<?php
    include_once('footer.php');
?>

<div id="physicianModal" class="modal fade">
  	<div class="modal-dialog">
    	<form action="includes/edit_physician.inc.php" method="post" id="appointment_form">
      		<div class="modal-content">
        		<div class="modal-header">
          			<h4 class="modal-title" id="modal_title"></h4>
          			<button type="button" class="close" data-dismiss="modal">&times;</button>
        		</div>
        		<div class="modal-body">
        			<span id="form_message"></span>
                    <div id="appointment_detail">
					<h4 class="text-center">Physician Details</h4>
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
                        <label>degree</label>
                        <div class="input-group">           
                            <textarea  name="degree" id="degree" class="form-control" row="5"></textarea>
                        </div>
                    </div>						
					</div>                 
        		</div>
        		<div class="modal-footer">
          			<input type="hidden" name="patient_id" id="patient_id" />
					  <div class="text-right">
					  <input type="submit" name="submit" id="submit_button" class="btn btn-success" value="Book" />
					  </div>       				
          			<button type="reset" class="btn btn-success btn-lg" data-dismiss="modal">Close</button>
        		</div>
      		</div>
    	</form>
  	</div>
</div>

<script>

$(document).ready(function(){
	$(document).on('click', '.physician', function(){

		var patient_id = $(this).data('id');

		$.ajax({
			url:"physician_detail.php",
			method:"POST",
			data:{id:patient_id},
			success:function(res)
			{
				if(res.status == 1){
					var data = res['patient_data'];	
					$('#physicianModal').modal('show');

					$('#first_name').val(data['first_name']);
					$('#last_name').val(data['last_name']);
					$('#middle_name').val(data['middle_name']);
					$('#email').val(data['email']);
					$('#degree').val(data['degree']);
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

