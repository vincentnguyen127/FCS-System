<?php
    include_once('header.php');
    require_once "includes/book_appointment.inc.php";
?>
<body>
<div class="card">
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
		      						foreach($result as $row)
		      						{                                         
		      							echo '
		      							<tr>
		      								<td>'.$row["first_name"] + $row["last_name"].'</td>
		      								<td>'.$row["degree"].'</td>
		      								<td>'.$row["speciality"].'</td>
		      								<td>'.$row["appt_date"].'</td>
		      								<td>'.$row["appt_day"].'</td>
		      								<td>'.$row["start_time"].' - '.$row["appt_end_time"].'</td>
		      								// <td><button type="button" name="get_appointment" class="btn btn-primary btn-sm get_appointment" data-id="'.$row["doctor_schedule_id"].'">Get Appointment</button></td>
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