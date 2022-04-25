<?php
//require("book_appointment_config.php");
include_once('header.php');
require_once './includes/dbh.inc.php';
$physician_id = $_SESSION["physicianID"];

$query = "Select r.id,r.rating,r.headline,r.feedback,r.appointment_id, ps.physician_id, a.service,ps.appt_date,ps.start_time from rating r INNER join appointment a on r.appointment_id=a.id INNER join physician_schedule ps on a.physician_schedule_id=ps.id
where ps.physician_id=".$physician_id;

  $query_run = mysqli_query($conn, $query);
  // Close connection
  mysqli_close($conn);

?>
<body>
<div class="card">
		      		<!-- <form method="post"  > -->
							<div class="card-header">
							<div class="row">
								<div class="col">
								<h3><b>Your Rating</b></h3>
								</div>
								
							</div>
							
							</div>
									      								  
			      		<div class="card-body">
		      				<div class="table-responsive">
		      					<table class="table table-striped table-bordered">
		      						<tr>
									  <th>id</th>
		      							<th>Rating</th>
		      							<th>Headline</th>
		      							<th>Feedback</th>
		      							<th>Appointment ID</th>
										<th>Physician ID</th>
										<th>Service</th>
										<th>Appointment Date</th>
										<th>Start Time</th>
		      						</tr>
                      <?php
function pr($t){echo'<pre>';print_r($t);echo'</pre>';} 
                        while($row = mysqli_fetch_assoc($query_run)){
		      							echo '
		      							<tr>
		      								<td>'.$row["id"].'</td>
		      								<td>'.$row["rating"].'</td>
		      								<td>'.$row["headline"].'</td>
		      								<td>'.$row["feedback"].'</td>
											<td>'.$row["appointment_id"].'</td>
											<td>'.$row["physician_id"].'</td>	<td>'.$row["service"].'</td>	
											<td>'.$row["appt_date"].'</td>	
											<td>'.$row["start_time"].'</td>		
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

<script>
        $(document).ready(function () {
            $('.add_doctor_schedule').on('click', function () {
				console.log('vincent');
                // var appointmentID = $(this).data('id')
                $('#doctor_scheduleModal').modal('show');

                // $tr = $(this).closest('tr');

                // var data = $tr.children("td").map(function () {
                //     return $(this).text();
                // }).get();

                // console.log(data);
                
                // $('#delete_id').val(data[1]);
                // $('#cancel_id').val(appointmentID);

            });
        });
    </script>
