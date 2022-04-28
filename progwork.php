<?php
ob_start();
require('admintools/dbconn.php');
if (isset($_GET['forwardata'])) {
	echo $probdataid = $_GET['forwardata'];
	$progsql = "UPDATE `messages` SET `workstatus`= '1' WHERE `id`='$probdataid'";
	if($runprog = mysqli_query($connect,$progsql)){
		header('location: readworksmsg.php');
	}

}

/*
  $getforprogwork = "SELECT * FROM `messages` WHERE `id`= '$probdataid'";
  $rungetforprogwork = mysqli_query($connect,$getforprogwork);
  $data = mysqli_fetch_array($rungetforprogwork);
  $prob = $data['nature_of_problem'];
  $location = $data['district'];
  $message = $data['message'];


  $locsql = "SELECT * FROM `district` WHERE `id`= '$location'";
  $runlocsql = mysqli_query($connect, $locsql);
  $info = mysqli_fetch_array($runlocsql);
  echo $theprobloc = $info['districts'];

  $addprob = "INSERT INTO `progwork` VALUES('','$theprobloc','$prob','$message')";
*/
  ?>