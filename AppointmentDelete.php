<?php
require_once './includes/dbh.inc.php';

if(isset($_GET['deletedata']))
{
    #$id = $_GET['id'];
    echo $_GET['id'];

    // $query = "DELETE FROM appointment WHERE id=".$_GET['id'];
    $query = "UPDATE physician_schedule set appt_status='Cancel' where id=".$_GET['id'];

    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        echo '<script> alert("Data Deleted"); </script>';
        header("Location:my_appointment2.php");
    }
    else
    {
        echo '<script> alert("Data Not Deleted"); </script>';
        #header("Location:my_appointment2.php");
    }
}

?>
