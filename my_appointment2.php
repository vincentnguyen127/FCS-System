<?php
//require("book_appointment_config.php");
include_once('header.php');
require_once './includes/dbh.inc.php';
  $patient_id = $_SESSION["patientID"];
//require("book_appointment_config.php");

  $query = "SELECT ps.id as psid ,apt.id, phy.first_name, phy.last_name,
  ps.appt_date, ps.start_time, ps.appt_end_time, ps.appt_day,
  ps.appt_status from appointment apt
  INNER join patient p on p.id = apt.patient_Id
  INNER JOIN physician_schedule ps on ps.id = apt.physician_schedule_id
  INNER join physician phy on ps.physician_id = phy.id
  where p.id=$patient_id and appt_status in ('Booked','Cancel','Completed');";

  $query_run = mysqli_query($conn, $query);

  // Close connection
  mysqli_close($conn);

?>

<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Delete Student Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="AppointmentDelete.php" method="GET">

                    <div class="modal-body">

                        <input type="hidden" name="id" id="cancel_id">

                        <h4> Do you want to cancel this appointment?</h4>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> CLOSE </button>
                        <button type="submit" name="deletedata" class="btn btn-danger">CANCEL</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <div class="modal fade" id="reviewmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> REVIEW</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="includes/rating.inc.php" method="post">

                    <div class="modal-body">

                        <input type="hidden" name="physician_schedule_id" id="physician_schedule_id">
                        <input type="hidden" name="appointment_id" id="appointment_id">

                        <!-- <h4> Are you going to the review page?</h4> -->
                        <div class="form-group">
                    	<label><b>Rating your Physician:</b></label>
						<select id="rating" name="rating">
							<option value="Excellent">Excellent</option>
							<option value="Good">Good</option>
							<option value="Fair">Fair</option>		<option value="Fair">Poor</option>		
						</select>
                        <label><b>Headline:</b></label>
                        <input type="text" name="headline" require>
						<label><b>Feedback: </b></label><br/>
                    	<textarea name="feedback" id="feedBack" class="form-control"  rows="5"></textarea>
                    </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> CLOSE </button>
                        <button type="submit" name="submit" class="btn btn-primary">RATE</button>
                    </div>

                </form>

            </div>
        </div>
    </div>

<body>
<div class="card">
		      		<!-- <form method="post"  > -->
			      		<div class="card-header"><h3><b>Physician Schedule List </b></h3></div>
			      		<div class="card-body">
		      				<div class="table-responsive">
		      					<table class="table table-striped table-bordered">
		      						<tr>
										<th>Appointment No.</th>
										<th>Physician Name</th>
										<th>Appointment Date</th>
										<th>Appointment Time</th>
										<th>Appointment Day</th>
										<th>Appointment Status</th>
										<th>Action</th>
		      						</tr>
                      <?php
                        while($row = mysqli_fetch_assoc($query_run)){
		      							echo '
		      							<tr>
                                              <td>'.$row["id"].'</td>
		      								<td>'.$row["first_name"].' '.$row["last_name"].'</td>
											<td>'.$row["appt_date"].'</td>
											<td>'.$row["start_time"].' - '.$row["appt_end_time"].'</td>
		      								<td>'.$row["appt_day"].'</td>
                                           <td>'.$row["appt_status"].'</td> 		      							 
                                          ';
                                        if ( $row["appt_status"]=="Booked")
                                          echo '
                                        <td><button type="button" name="cancel_appointment" class="btn btn-danger btn-sm p-3 cancel_appointment" data-id="'.$row["psid"].'">Cancel</button></td>';
                                        if ( $row["appt_status"]=="Completed")
                                        echo '
                                        <td><button type="button" name="review_appointment" class="btn btn-primary btn-sm p-3 review_appointment"
                                        data-psId="'.$row["psid"].'"
                                        
                                        >Review</button></td>';
                                                                             
                                        echo '
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

 <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>



<script>
        $(document).ready(function () {
            $('.cancel_appointment').on('click', function () {

                var appointmentID = $(this).data('id')
                $('#deletemodal').modal('show');

                // $tr = $(this).closest('tr');

                // var data = $tr.children("td").map(function () {
                //     return $(this).text();
                // }).get();

                // console.log(data);
                
                // $('#delete_id').val(data[1]);
                $('#cancel_id').val(appointmentID);

            });
        });
    </script>

<script>
            $(document).ready(function () {

                $('.review_appointment').on('click', function () {
                    var  physician_schedule_id = $(this).data('psid')
                    $('#reviewmodal').modal('show');
                    $tr = $(this).closest('tr');

                    var data = $tr.children("td").map(function () {
                        return $(this).text();
                    }).get();
                    $('#appointment_id').val(data[0]);
                    $('#physician_schedule_id').val(physician_schedule_id);

                });
            });
        </script>
