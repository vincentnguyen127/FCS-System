<?php
//require("book_appointment_config.php");
include_once('header.php');
require_once './includes/dbh.inc.php';
$physician_id = $_SESSION["physicianID"];

$query = "Select * from physician_schedule
  where physician_id = $physician_id and appt_status like 'In Process';";

  $query_run = mysqli_query($conn, $query);
  // Close connection
  mysqli_close($conn);

?>
<div id="doctor_scheduleModal" class="modal fade">
  	<div class="modal-dialog">
    	<form action="includes/add_physician_schedule.inc.php" method="post" id="doctor_schedule_form">
      		<div class="modal-content">
        		<div class="modal-header">
          			<h4 class="modal-title" id="modal_title">Add Physician Schedule</h4>
          			<button type="button" class="close" data-dismiss="modal">&times;</button>
        		</div>
        		<div class="modal-body">
                    <div class="form-group">
                        <label>Schedule Date</label>
                        <div class="input-group">
                            <input type="date" name="doctor_schedule_date" id="doctor_schedule_date" class="form-control" required  />
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Schedule Day</label>

                        <input type="hidden" name="id" id="add_id">

                        <div class="input-group">
                          <select id="service" name="doctor_schedule_day" id="doctor_schedule_day" class="form-control datetimepicker-input" >
                            <option value="None"></option>
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                            <option value="Satursday">Satursday</option>
                            <option value="Sunday">Sunday</option>
                          </select>
                        </div>
                    </div>
		          	<div class="form-group">
		          		<label>Start Time</label>
                        <div class="input-group">
		          		    <input type="time" name="doctor_schedule_start_time" id="doctor_schedule_start_time" class="form-control datetimepicker-input"  />
                        </div>
		          	</div>
                    <div class="form-group">
                        <label>End Time</label>
                        <div class="input-group">
                            <input type="time" name="doctor_schedule_end_time" id="doctor_schedule_end_time" class="form-control datetimepicker-input"  />
                        </div>
                    </div>
        		</div>
        		<div class="modal-footer">
          			<input type="hidden" name="hidden_id" id="hidden_id" />
          			<input type="hidden" name="action" id="action" value="Add"/>
          			<input type="submit" name="submit" id="submit_button" class="btn btn-success" value="Add" />
          			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        		</div>
      		</div>
    	</form>
  	</div>
</div>
<body>
<div class="card">

				<?php 
                    if(isset($_GET["error"])){
						if($_GET['error'] =="none")
						{
							echo '<div class="alert alert-success">Physician Schedule Added Successfully</div>';
						}
                    }
                ?>
		      		<!-- <form method="post"  > -->
							<div class="card-header">
							<div class="row">
								<div class="col">
								<h3><b>Physician Schedule List</b></h3>
								</div>
								<div class="col" align="right">
                            		<button type="button" name="add_doctor_schedule" id="add_doctor_schedule" class="btn btn-primary btn-circle btn-sm  add_doctor_schedule">Add</button>
                            	</div>
							</div>
							
							</div>
									      								  
			      		<div class="card-body">
		      				<div class="table-responsive">
		      					<table class="table table-striped table-bordered">
		      						<tr>
									  <th>Schedule Date </th>
		      							<th>Schedule Day</th>
		      							<th>Start Time</th>
		      							<th>End Time</th>
		      							<th>Status</th>
		      						</tr>
                      <?php
function pr($t){echo'<pre>';print_r($t);echo'</pre>';} 
                        while($row = mysqli_fetch_assoc($query_run)){
		      							echo '
		      							<tr>
		      								<td>'.$row["appt_date"].'</td>
		      								<td>'.$row["appt_day"].'</td>
		      								<td>'.$row["start_time"].'</td>
		      								<td>'.$row["appt_end_time"].'</td>
		      								<td>'.$row["appt_status"].'</td>		
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
