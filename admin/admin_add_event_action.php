<?php
	include("../include/config.php");
    session_start();

    echo $_POST['event'];
    $eventid = $_POST['event'];

  	$event_name = $_POST['event_name'];
  	$description = $_POST['description'];

    $sql = "INSERT INTO dms_event (eventname,description,parent_id,active) VALUES ( '$event_name','$description','$eventid',0 )";
    $result = mysqli_query($db,$sql);

    echo "<script>alert('Event added successfully.'); location.href=\"../admin/admin_events.php\"; </script>";

?>