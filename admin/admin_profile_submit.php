<?php
/**
 * Created by PhpStorm.
 * User: mayur
 * Date: 21-01-2017
 * Time: 18:24
 */

include("../include/admin_master.php");
$user = $_SESSION['user_id'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$abt_me = $_POST['abt_me'];
$bday = $_POST['bday'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$facebook = $_POST['fb'];
$twitter = $_POST['twitter'];
$degree = $_POST['degree'];
$status = $_POST['status'];

$query = "UPDATE dms_profile SET fname = '$fname',lname = '$lname' ,abt_me = '$abt_me' ,bday = '$bday' ,email = '$email',mobile = '$mobile' ,facebook = '$facebook',twitter = '$twitter',degree = '$degree' ,status = '$status' WHERE user_id = '$user'";

$result = mysqli_query($db, $query);
echo "<script>alert('Profile Updated.'); location.href=\"../admin/admin_profile.php\"; </script>";
?>