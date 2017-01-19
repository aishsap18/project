<?php 
	include("include/config.php");
	session_start();
	session_destroy();
	mysqli_close($db);
	header("location: index.php");
 ?>