<?php
//require("book_appointment_config.php");
include_once('header.php');
require_once './includes/dbh.inc.php';


  $query = "Select ps.id ,p.first_name, p.last_name, p.degree, p.speciality, ps.appt_date, ps.appt_day, ps.start_time, ps.appt_end_time
  from physician_schedule ps
  INNER join physician p on ps.physician_id=p.id
  where ps.appt_status like 'In Process';";
  $query_run = mysqli_query($conn, $query);

  // Close connection
  mysqli_close($conn);

?>
<body>
<div class="card">
				<?php 
                    if(isset($_GET["error"])){
						if($_GET['error'] =="none")
						{
							echo '<div class="alert alert-success">Your Appointment Has Been Booked </div>';
						}
                    }
                ?>
		      		<!-- <form method="post"  > -->
			      		<div class="card-header"><h3><b>Physician Schedule List</b></h3></div>
			      		<div class="card-body">
		      				<div class="table-responsive">
		      					<table class="table table-striped table-bordered">
		      						<tr>
									  <th>Physician Name </th>
		      							<th>Education</th>
		      							<th>Speciality</th>
		      							<th>Appointment Date</th>
		      							<th>Appointment Day</th>
		      							<th>Available Time</th>
		      							<th>Action</th>
		      						</tr>

                      <?php
function pr($t){echo'<pre>';print_r($t);echo'</pre>';} 
                        while($row = mysqli_fetch_assoc($query_run)){
		      							echo '
		      							<tr>
		      								<td>'.$row["first_name"].' '.$row["last_name"].'</td>
		      								<td>'.$row["degree"].'</td>
		      								<td>'.$row["speciality"].'</td>
		      								<td>'.$row["appt_date"].'</td>
		      								<td>'.$row["appt_day"].'</td>
		      								<td>'.$row["start_time"].' - '.$row["appt_end_time"].'</td>
		      							 <td><button type="button" name="book_appointment" class="btn btn-primary btn-sm p-3 book_appointment" data-id="'.$row["id"].'">Book</button></td>
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

<div id="appointmentModal" class="modal fade">
  	<div class="modal-dialog">
    	<form action="includes/book_appointment.inc.php" method="post" id="appointment_form">
      		<div class="modal-content">
        		<div class="modal-header">
          			<h4 class="modal-title" id="modal_title">Book Appointment</h4>
          			<button type="button" class="close" data-dismiss="modal">&times;</button>
        		</div>
        		<div class="modal-body">
        			<span id="form_message"></span>
                    <div id="appointment_detail">
					<h4 class="text-center">Patient Details</h4>
					<h4 class="text-center">Appointment Details</h4>
					<table class="table">
						<tr>
							<th width="40%" class="text-right">Physician Name</th>
							<td name="" id="physician_name"></td>
						</tr>
						<tr>
							<th width="40%" class="text-right">Appointment Date</th>
							<td name="" id="appt_date"></td>
						</tr>
						<tr>
							<th width="40%" class="text-right">Appointment Day</th>
							<td name="" id="appt_day"></td>
						</tr>
						<tr>
							<th width="40%" class="text-right">Available Time</th>
							<td name="" id="ava_time"></td>
						</tr>				
					</table>
					</div>
                    <div class="form-group">
                    	<label><b>Reasons for Your Visit:</b></label>
						<select id="service" name="service">
							<option value="checkup">Annual Check Up</option>
							<option value="skin">Skin Disorders</option>
							<option value="nephrology">Nephrology</option>
							<option value="internal">Internal Medicine</option>
							<option value="DOT">DOT Physical Exams</option>
							<option value="USCIS">Immigration Physical Exams</option>
						</select>
						<label>Other Reasons: </label><br/>
                    	<textarea name="other_reason" id="other_reason" class="form-control"  rows="5"></textarea>
                    </div>
        		</div>
        		<div class="modal-footer">
          			<input type="hidden" name="hidden_physician_schedule_id" id="hidden_physician_schedule_id" />
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

	// var dataTable = $('#appointment_list_table').DataTable({
	// 	"processing" : true,
	// 	"serverSide" : true,
	// 	"order" : [],
	// 	"ajax" : {
	// 		url:"action.php",
	// 		type:"POST",
	// 		data:{action:'fetch_schedule'}
	// 	},
	// 	"columnDefs":[
	// 		{
    //             "targets":[6],				
	// 			"orderable":false,
	// 		},s
	// 	],
	// });

	$(document).on('click', '.book_appointment', function(){

		var doctor_schedule_id = $(this).data('id');
		console.log(doctor_schedule_id);
		// var doctor_id = $(this).data('doctor_id');
		$.ajax({
			url:"detail.php",
			method:"POST",
			data:{action:'book_appointment',id:doctor_schedule_id},
			success:function(res)
			{
				if(res.status == 1){
					var data = res['physician_schedule_data'];	
					$('#appointmentModal').modal('show');
					$('#hidden_physician_schedule_id').val(doctor_schedule_id);
					$('#physician_name').html(data['first_name'] +' '+ data['last_name']);
					$('#ava_time').html(data['start_time'] +'-'+ data['appt_end_time']);
					$('#appt_date').html(data['appt_date']);
					$('#appt_day').html(data['appt_day']);
				} else{
					alert('Empty data');	
				}
			}
		});

	});

	// $('#appointment_form').parsley();

	// $('#appointment_form').on('submit', function(event){

	// 	event.preventDefault();
	
	// 		$.ajax({
	// 			url:"action.php",
	// 			method:"POST",
	// 			data:$(this).serialize(),
	// 			dataType:"json",
	// 			beforeSend:function(){
	// 				$('#submit_button').attr('disabled', 'disabled');
	// 				$('#submit_button').val('wait...');
	// 			},
	// 			success:function(data)
	// 			{
	// 				$('#submit_button').attr('disabled', false);
	// 				$('#submit_button').val('Book');
	// 				if(data.error != '')
	// 				{
	// 					$('#form_message').html(data.error);
	// 				}
	// 				else
	// 				{	
	// 					window.location.href="appointment.php";
	// 				}
	// 			}
	// 		})
	
	// })

});

</script>
